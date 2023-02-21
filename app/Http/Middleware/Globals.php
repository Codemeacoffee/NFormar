<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Globals extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        $this->updateCourses();

        $email = $request->cookie('identifier');
        $rememberToken = $request->cookie('rememberToken');

        if($email && $rememberToken){
            $user = User::where('email', $email)->where('rememberToken', $rememberToken)->where('confirmed', true)->first();

            if($user) $request['validSession'] = 'true';
            else $request['validSession'] = 'false';
        }else $request['validSession'] = 'false';

        $request['categories'] = Course::all()->pluck('category')->unique()->toArray();

        if($request->cookie('cartContents')) $request['cartContents'] = $request->cookie('cartContents');
        else $request['cartContents'] = json_encode(['courses' => [], 'totalPrice' => 0]);

        return $next($request);
    }

    function updateCourses(){
        $response = Http::post($this->platformUrl.'getCourses', ['secret' => env('PLATFORM_SECRET')]);
        
        $platformData = json_decode($response->body(), true );
        
        // var_dump($response);
        // return $platformData;
        
        foreach ($platformData['courses'] as $data){
            $category = ucfirst(mb_strtolower(trim($data['category'])));

            foreach ($data['courses'] as $course){
                $existingCourse = Course::where('platformId', $course['id'])->first();
                $formativeInfo = [];

                foreach ($platformData['formativeInfo'] as $current) if($current['courseId'] == $course['id']) $formativeInfo = $current['sections'];

                $summary = preg_replace( "/\r|\n/", "", str_replace("'", "", str_replace('"', "", trim($course['summary']))));
                
                if($existingCourse){
                    $existingCourse->category = $category;
                    $existingCourse->name = trim($course['fullname']);
                    $existingCourse->description = $summary;
                    $existingCourse->formativeInfo = json_encode($formativeInfo);
                    $existingCourse->save();
                }else{
                    $fmt = numfmt_create( 'es_ES', \NumberFormatter::CURRENCY );
                    preg_match('/<h1 hidden=>(.*?)<\/h1>/', $summary, $match);
                
                    if(isset($match[1])) $price = $fmt->formatCurrency(5 * $match[1], "EUR");
                    else $price = null;
                    
                    Course::create([
                        'platformId' => $course['id'],
                        'category' => $category,
                        'name' => trim($course['fullname']),
                        'description' => $summary,
                        'price' => $price,
                        'formativeInfo' => json_encode($formativeInfo)
                    ]);
                }
            }
        }
    }
}
