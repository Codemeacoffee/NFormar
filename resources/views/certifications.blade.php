@extends('layout')

@section('title') NFORMAR - Nuestros certificados @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <certificate-container class="pt-lg-5 mt-lg-5 pt-2 mt-0"
        title="Certificado de accesibilidad"
        content="<p>Con el fin de ofrecer garantías para un acceso universal en el que cualquier persona, independientemente de su
            edad o discapacidad pueda acceder a cualquier parte o punto del interior y del exterior de nuestros centros de formación,
            <b>NFormar</b> posee las cédulas de certificación para la accesibilidad de personas con limitaciones motoras y/o de otras
            con mermas de tipo sensorial. Todo ello para que puedan desenvolverse de manera autónoma y no discriminativa en lugares públicos
            y privados comunes.</p><br>
            <p>Igualmente, la accesibilidad universal desarrollada conforme a la Norma <b>UNE 170001-2</b> para los entornos laborales, manifiesta
            nuestro compromiso por parte de nuestra organización con la sociedad, creando entornos donde cualquier trabajador
            independientemente de sus capacidades, pueda desarrollar sus actividades laborales en condiciones de igualdad de oportunidades
            que el resto de sus compañeros.</p>"
        image="{{asset('images/certificado_accesibilidad.png')}}"
        imageAlt="Certificado de accesibilidad"
    ></certificate-container>
    <certificate-container
        title="Certificado EFQM+500"
        content="<p>Este certificado, también conocido como sellos de la Excelencia, es otorgado por la Fundación Europea para
            la Gestión de la Calidad, y define el modelo de calidad adoptado por nuestra empresa.</p><br>
            <p>El <b>EFQM</b> está proyectado para ayudar a las organizaciones europeas más afianzadas en el mercado comunitario. Se centra
            en concreto en aquellas organizaciones que llevan a cabo los principios de la administración de la calidad total en su
            actividad diaria y en las relaciones con sus stakeholders u otros grupos.</p><br>
            <p>Desde <b>NFormar</b> entendemos la Excelencia como aquel modo sobresaliente de gestionar la organización y obtener
            resultados. Por lo tanto, una organización excelente es aquella que se esfuerza en satisfacer a todos sus stakeholders y
            cuyo éxito se mide en función de los resultados obtenidos.</p>"
        image="{{asset('images/certificado_EFQM.png')}}" 
        imageAlt="Certificado EFQM+500"
    ></certificate-container>
    <certificate-container
        title="Garantía de calidad y compromiso con el medio ambiente"
        content="<p>Conscientes de la importancia de mantener un desarrollo sostenible, y asumidos sus principios, los centros del
        grupo <b>Nformar</b> desarrollan un Sistema de Gestión Integrado tanto de Calidad como Ambiental que intenta prevenir los impactos
        sobre el entorno de sus actividades e instalaciones, según los estándares <b>ISO 14001:2015</b> e <b>ISO 9001:2015.</b></br></br> Los
        centros del grupo <b>Nformar</b> quieren conseguir que sus procesos y procedimientos de formación originen un mínimo impacto
        medioambiental, para ello previenen, controlan y minimizan los efectos medioambientales que sus actividades generan en el
        entorno, estudian y perfeccionan constantemente nuevos métodos para reducir el consumo de materias primas, las energía
        requerida para elaborar sus productos y las emisiones a la atmósfera de gases contaminantes producidas por su actividad.</p>"
        image="{{asset('images/ISO 9001+ISO 14001.jpg')}}"
        imageAlt="Certificados: ISO 9001, ISO 14001. UKAS Management Systems."
    ></certificate-container>
    <certificate-container
        title="Certificado ISO 27001"
        content="<p><b>ISO/IEC 27001</b> es un estándar para la seguridad de la información (Information Technology – Security techniques
            – Information security management systems – Requirements) aprobado y publicado en octubre de 2005 como estándar internacional
            por el International Organization for Standarization y por la comisión International Electrotechnical Commission.</p><br>
            <p><b>ISO 27001</b> es una norma internacional que permite el aseguramiento, la confidencialidad e integridad de los datos y
            de la información, así como de los sistemas que la procesan.</p><br>
            <p>El estándar <b>ISO 27001:2013</b> para los <b>Sistemas Gestión de la Seguridad de la Información</b> permite a las
            organizaciones la evaluación del riesgo y la aplicación de los controles necesarios para mitigarlos o eliminarlos.</p><br>
            <p>La aplicación de <b>ISO-27001</b> significa una diferenciación respecto al resto, que mejora la competitividad y la imagen
            de una organización.</p>"
        image="{{asset('images/certificado_oca.png')}}"
        imageAlt="Certificado ISO 27001"
    ></certificate-container>
    <certificate-container
        title="Manuales de buenas prácticas ambientales"
        content="<p>El antiguo Ministerio de Trabajo y Asuntos Sociales, a través de la Unidad Administradora para el Fondo Social
        Europeo y el antiguo Instituto Nacional de Empleo, en colaboración con la Red de Autoridades Ambientales elaboraron estos
        Manuales de Buenas Prácticas Ambientales para las diferentes Familias Profesionales en que se organiza la Formación Ocupacional.
        <br><br>Estos Manuales de Buenas Prácticas surgieron como complemento necesario al Módulo de Sensibilización Ambiental, dándole
        continuidad a una idea que, con carácter general y básico, integraban consideraciones ambientales transversales a los cursos
        de formación ocupacional.<br><br> Las Buenas Prácticas que se exponen en estos Manuales son muy útiles y sencillas de aplicar,
        tanto por su simplicidad como por los sorprendentes resultados que se obtienen, contribuyendo de esta manera a conseguir,
        entre todos, un objetivo fundamental: el Desarrollo Sostenible. Pincha en el siguiente enlace, donde podrás encontrar el
        manual de buenas prácticas asociado a la especialidad formativa que estás realizando.</p>"
        image="{{asset('images/certificados_3.jpg')}}"
        imageAlt="Certificado de buenas prácticas ambientales."
    ></certificate-container>
    <certificate-container
        title="Sensibilización ambiental"
        content="<p>Con el fin de sensibilizar a los alumnos de nuestras academias con el buen uso de nuestras instalaciones, y con las
       normas básicas para un futuro más sostenible contaremos en breve con una nueva campaña de sensibilización ambiental a través
       nuestro nuevo blog, con noticias, videos y un largo etc… </p>"
        image="{{asset('images/certificados_2.jpg')}}"
        imageAlt="Certificado EMAS; Verified Environmental Management."
    ></certificate-container>
@endsection
