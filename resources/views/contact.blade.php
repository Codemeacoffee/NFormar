@extends('layoutWithoutFormativeCenters')

@section('title') NFORMAR - Contacta con nosotros @endsection
@section('og:image') @endsection
@section('description') @endsection
@section('keywords') @endsection

@section('content')
    <contact-block class="pt-lg-5 mt-lg-5 pt-2 mt-0"
        image="{{asset('images/logos_color-1.png')}}"
        image-alt="Logo de Fuerteventura2000, consiste en el texto 'Fuerteventura2000' en color blanco sobre un fondo azul marino."
        text="Empresa primigenia del grupo con 26 años en el sector. Es dentro del grupo la que mayor amplitud de oferta de formación cumple, desde certificados de Administración, Recursos Humanos, o Comercio y Marketing, hasta ramas como la Seguridad Privada, Sociosanitario o Docencia. Cuenta con sedes en Puerto del Rosario y Las Palmas de Gran Canaria (Guanarteme), y cuenta en su haber con más de 50.000 alumnos formados."
        link="https://www.fuerteventura2000.com/"
        website="www.fuerteventura2000.com"
        :locations="[
                {id: 'FTV2000-FTV', tab: 'FTV2000-FTV-TAB', active: 'active', name: 'Fuerteventura', quarters: [
                    {index: 'Sede 1', phone: '928 86 10 48', location: 'Calle Gran Canaria, 54, Puerto del Rosario 35600', map: 'https://www.google.com/maps?ll=28.503418,-13.866524&z=13&t=m&hl=es-ES&gl=US&mapclient=embed&cid=17545045477778278932'},
                    {index: 'Sede 2', phone: '928 85 64 21', location: 'Calle Cisneros, 82, Puerto del Rosario 35600', map: 'https://www.google.com/maps?ll=28.505462,-13.851202&z=13&t=m&hl=es-ES&gl=US&mapclient=embed&cid=2250637476644160254'},
                ]},
                {id: 'FTV2000-GC', tab: 'FTV2000-GC-TAB', selected: true, name: 'Gran Canaria', quarters: [
                    {index: 'Sede 1', phone: '928 47 25 82', location: 'Calle Fernando Guanarteme, 44, 35010', map: 'https://www.google.com/maps/place/Fuerteventura+2000/@28.1358445,-15.4368695,15z/data=!4m2!3m1!1s0x0:0x463e8ac6d5dbc71d?sa=X&ved=2ahUKEwi_wurSt-LxAhVq7OAKHZ3vB5oQ_BIwFXoECFoQBQ'},
                ]},
                {id: 'FTV2000-TF', tab: 'FTV2000-TF-TAB', name: 'Tenerife', quarters: [
                    {index: 'Sede 1', phone: '922 65 82 17', location: 'Calle Rufino, 7, 38320', map: 'https://www.google.com/maps/place/Fuerteventura+2000/@28.4625995,-16.2945885,15z/data=!4m2!3m1!1s0x0:0xfcd752f37910e981?sa=X&ved=2ahUKEwj1-KX8t-LxAhUJ5uAKHc6MC-0Q_BIwFXoECFkQBQ'},
                ]}
            ]"
    ></contact-block>
    <contact-block
        image="{{asset('images/logos_color-2.png')}}"
        image-alt="Logo de Escuela de Hostelería Europea, consiste en un plato con un cuchillo y un tenedor encima en colores blaco y azul celeste."
        text="Una de las empresas con mayor peso del grupo dado que cubre por completo todo el espectro de la hostelería y el turismo. Con dos sedes, una en Pájara y otra en Las Palmas de Gran Canaria (Pérez del Toro), cubre certificados de profesionalidad como Cocina, Servicios de Restaurante y Bar, Recepción en Alojamientos, Pastelería, Repostería, Panadería, o Gestión de Pisos y Limpieza en Alojamientos."
        link="https://www.eheuropea.com/"
        website="www.eheuropea.com"
        :locations="[
                {id: 'EHE-GC', tab: 'EHE-GC-TAB', active: 'active', selected: true, name: 'Gran Canaria', quarters: [
                    {index: 'Sede 1', phone: '928 33 89 18', location: 'Calle Pérez del Toro, 54, 35004', map: 'https://www.google.com/maps?ll=28.116408,-15.426672&z=13&t=m&hl=es-ES&gl=US&mapclient=embed&q=Calle+de+P%C3%A9rez+del+Toro,+54+35004+Las+Palmas+de+Gran+Canaria+Las+Palmas'},
                ]},
                {id: 'EHE-FTV', tab: 'EHE-FTV-TAB', name: 'Fuerteventura', quarters: [
                    {index: 'Sede 1', phone: '828 91 67 93', location: 'Calle Lanzarote, Calle Butihondo, 1, 35625', map: 'https://www.google.com/maps/place/Escuela+de+Hosteler%C3%ADa+Europea/@28.0740525,-14.3091615,15z/data=!4m5!3m4!1s0x0:0x964f6ad5bf32c519!8m2!3d28.0740525!4d-14.3091615'},
                ]}
            ]"
    ></contact-block>
    <contact-block
        image="{{asset('images/logos_color-3.png')}}"
        image-alt="Logo de Centro de Hostelería y Turismo de Canarias, consiste en el texto 'CHT' en blanco sobre un fondo azul marino."
        text="La gran localización de este centro, en pleno corazón turístico de Maspalomas (Campo Internacional) es sin duda el mayor reclamo de este centro, abierto en 2014, y que desde entonces ha formado y sobre todo insertado exitosamente en el mercado laboral a cientos de alumnos en toda la amplia gama de Hostelería y Turismo."
        link="https://www.chtcanarias.com/"
        website="www.chtcanarias.com"
        :locations="[
                {id: 'CHT-GC', tab: 'CHT-GC-TAB', active: 'active', selected: true, name: 'Gran Canaria', quarters: [
                    {index: 'Sede 1', phone: '928 76 31 62', location: 'Av. Touroperador Tui, 33, 35100, Maspalomas', map: 'https://www.google.com/maps/place/CHT+CANARIAS/@27.7601227,-15.5964798,17z/data=!3m1!4b1!4m5!3m4!1s0xc3f7de33012796b:0xfdf8aaf07a7d503f!8m2!3d27.760118!4d-15.5942911'},
                ]}
            ]"
    ></contact-block>
    <contact-block
        image="{{asset('images/logos_color-4.png')}}"
        image-alt="Logo de Formación Profesional para el Empleo Europea, consiste en una representación artistica de un libro en colores azul y celeste con un arco de estrellas amarillas sobre el."
        text="FPEE es la segunda empresa, tras Fuerteventura 2000 con una mayor amplitud de oferta formativa en lo que a áreas profesionales se refiere. Esta empresa, que cuenta con sedes tanto en Puerto del Rosario como en Las Palmas de Gran Canaria, cubre Electricidad y Electrónica, Redes de Datos e Informática, Fontanería, Idiomas, Docencia, Administración y Recursos Humanos, sin olvidarse de impartir cursos de Hostelería y Turismo. Todo esto la convierte en una empresa potente del sector dado que los alumnos pueden formarse en una gran variedad de oferta con FPEE."
        link="https://www.fpeeuropea.com/"
        website="www.fpeeuropea.com"
        :locations="[
                {id: 'FPE-GC', tab: 'FPE-GC-TAB', active: 'active', selected: true, name: 'Gran Canaria', quarters: [
                    {index: 'Sede 1', phone: '660 87 27 77', location: 'Paseo Alonso Quesada, S/N, 35005', map: 'https://www.google.com/maps/place/TAO+Club+%26+Garden/@28.122481,-15.425982,13z/data=!4m5!3m4!1s0x0:0x9e8d4979f1966a75!8m2!3d28.1224809!4d-15.4259821?hl=es-ES'},
                    {index: 'Sede 2', phone: '928 60 90 20', location: 'C/Joaquín Blanco Torrent, S/N, 35005', map: 'https://www.google.com/maps/place/Calle+Joaqu%C3%ADn+Blanco+Torrent,+35005,+Las+Palmas,+Espa%C3%B1a/@28.125176,-15.426713,13z/data=!4m5!3m4!1s0xc409573ac0cd979:0x8ee2476f72596657!8m2!3d28.1251764!4d-15.4267134?hl=es-ES'}
                ]},
                {id: 'FPE-FTV', tab: 'FPE-FTV-TAB', name: 'Fuerteventura', quarters: [
                    {index: 'Sede 1', phone: '928 86 13 72', location: 'C/Manuel Velázquez Cabrera, 144 F, 35600 ', map: 'https://www.google.com/maps/place/Calle+Manuel+Vel%C3%A1zquez+Cabrera,+144f,+35600+Puerto+del+Rosario,+Las+Palmas,+Espa%C3%B1a/@28.506558,-13.849873,13z/data=!4m5!3m4!1s0xc47c62345537f25:0xf301858c0b0fa4e4!8m2!3d28.506558!4d-13.8498732?hl=es-ES'},
                ]}
            ]"
    ></contact-block>
    <contact-block
        image="{{asset('images/logos_color-5.png')}}"
        image-alt="Logo de Confederación Insular de Empresarios de Fuerteventura, consiste en el texto 'CONFUER' sobre un fondo verde con una espiral amarilla."
        text="La segunda empresa del grupo en cuanto a longevidad se refiere. En sus comienzos abarcaba tantas áreas profesionales como Fuerteventura 2000. Sin embargo, la gran demanda de cursos de Hostelería, Turismo y Restauración hizo que Confuer se especializase en este sector profesional, ofreciendo desde las Operaciones Básicas, Restaurante y Bar o Pastelería, hasta cursos más especializados como Sumillería, Recepción en Alojamientos o Gestión de Pisos en Alojamientos."
        link="https://www.e-confuer.com/"
        website="www.e-confuer.com"
        :locations="[
                {id: 'CONFUER-FTV', tab: 'CONFUER-FTV-TAB', active: 'active', name: 'Fuerteventura', quarters: [
                    {index: 'Sede 1', phone: '928 94 76 67', location: 'C/Los Hormiga nº1, 35600', map: 'https://www.google.com/maps/place/Calle+los+Hormiga,+35600+Puerto+del+Rosario,+Las+Palmas/@28.4978598,-13.8615148,17z/data=!3m1!4b1!4m8!1m2!2m1!1sC%2FLos+Hormiga+n%C2%BA1,+35600!3m4!1s0xc47c6372070f179:0xd8436eafeaa50114!8m2!3d28.4978551!4d-13.8593261'},
                ]}
            ]"
    ></contact-block>
    <contact-block
        image="{{asset('images/logos_color-6.png')}}"
        image-alt="Logo de Escuela Superior de Enseñanza de Fuerteventura, consiste en una representación artistica de la isla de Fuerteventura en colores azul, celeste, gris y blanco."
        text="Más conocido en la isla de Fuerteventura como ESENFUER, la Escuela Superior de Enseñanza de Fuerteventura, situada en la calle Mahán 154 (Gran Tarajal), es nuestro centro de excelencia en la especialización de la formación no reglada. Con un amplísimo abanico de posibilidades con certificados como Promoción para la Igualdad efectiva de mujeres y hombres, Inglés profesional para actividades comerciales,Actividades administrativas en la relación con el cliente, Gestión Integrada de Recursos Humanos o Montaje y Mantenimiento de Sistemas de Telefonía e Infraestructuras de Redes Locales de Datos. Certificados todos ellos que permiten al publico majorero formarse en profesiones muy específicas, de manera que su inserción y su impacto en el mundo laboral no pase desapercibido."
        link="https://www.esenfuer.com/"
        website="www.esenfuer.com"
        :locations="[
                {id: 'ESENFUER-FTV', tab: 'ESENFUER-FTV-TAB', active: 'active', selected: true, name: 'Fuerteventura', quarters: [
                    {index: 'Sede 1', phone: '928 162 637', location: 'C/Mahán, 154, Gran Tarajal, 35620', map: 'https://www.google.com/maps?ll=28.20868,-14.02779&z=17&t=m&hl=es&gl=ES&mapclient=embed&q=Calle+Mahan,+154+35620+Gran+Tarajal+Las+Palmas'},
                ]}
            ]"
    ></contact-block>
    <contact-block
        image="{{asset('images/logos_color-7.png')}}"
        image-alt="Logo de INCAEM, consiste en el texto 'INCAEM' sobre una representación artistica de una gráfica creciente."
        text="INCAEM, situado en pleno centro de Las Palmas de Gran Canaria (Calle Perojo, 16) es único en su especialización dentro de este gran grupo de formación, dado que sus sectores son muy poco comunes o inexistentes para el resto de empresas del grupo. INCAEM, en su caso, ofrece cursos como; SOLDADURA OXIGAS Y SOLDADURA MIG/MAG, OPERACIONES DE FONTANERÍA Y CALEFACCIÓN-CLIMATIZACIÓN DOMÉSTICA, OPERACIONES AUXILIARES DE MANTENIMIENTO EN ELECTROMECÁNICA DE VEHÍCULOS, pero a su vez, también son especialistas en el área Sociosanitario, con una gran variedad de cursos como ESTIMULACIÓN COGNITIVA Y MEJORA DE LA MEMORIA, APOYO DOMICILIARIO Y ALIMENTACIÓN FAMILIAR o ATENCIÓN Y APOYO PSICOSOCIAL DOMICILIARIO."
        link="https://www.incaem.com/"
        website="www.incaem.com"
        :locations="[
                {id: 'INCAEM-FTV', tab: 'INCAEM-FTV-TAB', active: 'active', selected: true, name: 'Gran Canaria', quarters: [
                    {index: 'Sede 1', phone: '928 37 07 48 / 620 41 42 62', location: 'Calle Perojo, 16, 35003', map: 'https://www.google.com/maps/place/Calle+Perojo,+16,+35003+Las+Palmas+de+Gran+Canaria,+Las+Palmas/data=!4m2!3m1!1s0xc40959b2f86d37d:0x68036294d73b664c?sa=X&ved=2ahUKEwjbg4Gqw-LxAhVDEWMBHTJPBYoQ8gEwAHoECA4QAQ'},
                ]}
            ]"
    ></contact-block>
    <contact-block
        image="{{asset('images/logos_color-8.png')}}"
        image-alt="Logo de Hotel Escuela El Mirador, consiste en una representación artistica de un libro al lado de un hotel en color amarillo anaranjado."
        text="El Hotel Escuela el Mirador de Fuerteventura, o HEM, como nos gusta llamarlo, es la última incorporación al grupo empresaria de GFEE dado que abrió sus puertas en el verano de 2018. En este caso, el grupo empresarial aprovechó la oportunidad de crear un centro de Hostelería que se encontrase completamente inmerso en la realidad laboral del sector, y por supuesto, el hotel El Mirador de Fuerteventura, nos brindó la oportunidad perfecta para unificar los dos pilares básicos de nuestro grupo empresarial, la formación, y la inserción laboral, de manera que nuestros alumnos, formados con nuestras técnicas pioneras y contrastadas con la amplia experiencia de la que disponemos, pudiesen incorporarse al sector que sigue siendo base de la economía insular."
        link="https://www.hotelescuelaelmirador.com/"
        website="www.hotelescuelaelmirador.com"
        :locations="[
                {id: 'HEM-FTV', tab: 'HEM-FTV-TAB', active: 'active', selected: true, name: 'Fuerteventura', quarters: [
                    {index: 'Sede 1', phone: '683 39 42 25 / 699 21 23 94', location: 'Paraje Carretera Playa Blanca, 45, 35600', map: 'https://www.google.com/maps/place/Hotel+El+Mirador+de+Fuerteventura/@28.473936,-13.865656,13z/data=!4m8!3m7!1s0x0:0xe7b53b10c6f3890b!5m2!4m1!1i2!8m2!3d28.4738065!4d-13.8656571?hl=es-ES'},
                ]}
            ]"
    ></contact-block>
@endsection
