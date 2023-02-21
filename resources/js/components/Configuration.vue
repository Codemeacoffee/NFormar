<template>
    <div class="col-lg-8 col-12 root">
        <h1 class="mb-4"><b>Configuración</b></h1>
        <div class="mb-4">
            <h4 class="mb-4"><b>Información de cuenta</b></h4>
            <p class="text-secondary">{{name}}</p>
            <p class="text-secondary">{{surnames}}</p>
            <p class="text-secondary">{{email}}</p>
            <p class="edit" data-toggle="modal" data-target="#editAccountInfo"><b>Editar</b></p>
        </div>
        <div>
            <h4 class="mb-4"><b>Dirección</b></h4>
            <p class="text-secondary">{{address}}</p>
            <p id="countryHolder" class="text-secondary" v-bind:data-content="country"></p>
            <p class="edit" data-toggle="modal" data-target="#editAddress"><b>Editar</b></p>
        </div>

        <div class="modal fade" id="editAccountInfo" tabindex="-1" role="dialog" aria-labelledby="editAccountInfoTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-center w-100" id="editAccountInfoTitle"><b>Editar información de cuenta</b></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" v-bind:action="editAccountInfoUrl">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" v-bind:placeholder="name">
                            </div>
                            <div class="form-group">
                                <label for="surnames">Apellidos</label>
                                <input type="text" class="form-control" id="surnames" name="surnames" v-bind:placeholder="surnames">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" v-bind:placeholder="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" aria-describedby="passwordHelp">
                                <small id="passwordHelp" class="form-text text-danger">La contraseña debe tener al menos 8 caracteres y debe contener un número y una mayúscula.</small>
                            </div>
                            <div class="form-group">
                                <label for="oldPassword">Antigua contraseña</label>
                                <input type="password" class="form-control" id="oldPassword" name="oldPassword" aria-describedby="oldPasswordHelp">
                                <small id="oldPasswordHelp" class="form-text text-danger">Si desea cambiar su contraseña o su correo deberá introducir su antigua contraseña.</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Cancelar</b></button>
                            <button type="submit" class="btn red"><b>Guardar</b></button>
                        </div>
                        <input type="hidden" name="_token" v-bind:value="csrf">
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editAddress" tabindex="-1" role="dialog" aria-labelledby="editAddressTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title text-center w-100" id="editAddressTitle"><b>Editar dirección</b></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" v-bind:action="editAddressUrl">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="address">Dirección</label>
                                <input type="text" class="form-control" id="address" name="address" v-bind:value="address" required>
                            </div>
                            <div class="form-group">
                                <label for="country">País</label>
                                <select class="form-control" name="country" id="country" required>
                                    <option value="AF">Afganistán</option>
                                    <option value="AL">Albania</option>
                                    <option value="DE">Alemania</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguila</option>
                                    <option value="AQ">Antártida</option>
                                    <option value="AG">Antigua y Barbuda</option>
                                    <option value="SA">Arabia Saudita</option>
                                    <option value="DZ">Argelia</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaiyán</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrein</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BE">Bélgica</option>
                                    <option value="BZ">Belice</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BY">Bielorrusia</option>
                                    <option value="BO">Bolivia, Estado Plurinacional de</option>
                                    <option value="BQ">Bonaire, San Eustaquio y Saba</option>
                                    <option value="BA">Bosnia y Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BR">Brasil</option>
                                    <option value="BN">Brunei Darussalam</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="BT">Bután</option>
                                    <option value="CV">Cabo Verde</option>
                                    <option value="KH">Camboya</option>
                                    <option value="CM">Camerún</option>
                                    <option value="CA">Canadá</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CY">Chipre</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoras</option>
                                    <option value="CG">Congo</option>
                                    <option value="CD">Congo, República Democrática del</option>
                                    <option value="KP">Corea del Norte</option>
                                    <option value="KR">Corea del Sur</option>
                                    <option value="CI">Costa de Marfil</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="HR">Croacia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CW">Curazao</option>
                                    <option value="DK">Dinamarca</option>
                                    <option value="DJ">Djibouti</option>
                                    <option value="DM">Dominica</option>
                                    <option value="EC">Ecuador</option>
                                    <option value="EG">Egipto</option>
                                    <option value="SV">El Salvador</option>
                                    <option value="VA">El Vaticano</option>
                                    <option value="AE">Emiratos Árabes Unidos</option>
                                    <option value="ER">Eritrea</option>
                                    <option value="SK">Eslovaquia</option>
                                    <option value="SI">Eslovenia</option>
                                    <option value="ES">España</option>
                                    <option value="US">Estados Unidos</option>
                                    <option value="EE">Estonia</option>
                                    <option value="ET">Etiopía</option>
                                    <option value="RU">Federación Rusa</option>
                                    <option value="FJ">Fiji</option>
                                    <option value="PH">Filipinas</option>
                                    <option value="FI">Finlandia</option>
                                    <option value="FR">Francia</option>
                                    <option value="GA">Gabón</option>
                                    <option value="GM">Gambia</option>
                                    <option value="GE">Georgia</option>
                                    <option value="GS">Georgia del Sur e Islas Sandwich del Sur</option>
                                    <option value="GH">Ghana</option>
                                    <option value="GI">Gibraltar</option>
                                    <option value="GD">Granada</option>
                                    <option value="GR">Grecia</option>
                                    <option value="GL">Groenlandia</option>
                                    <option value="GP">Guadalupe</option>
                                    <option value="GU">Guam</option>
                                    <option value="GT">Guatemala</option>
                                    <option value="GG">Guernsey</option>
                                    <option value="GN">Guinea</option>
                                    <option value="GQ">Guinea Ecuatorial</option>
                                    <option value="GW">Guinea-Bissau</option>
                                    <option value="GY">Guyana</option>
                                    <option value="GF">Guyana Francesa</option>
                                    <option value="HT">Haití</option>
                                    <option value="NL">Holanda</option>
                                    <option value="HN">Honduras</option>
                                    <option value="HK">Hong Kong</option>
                                    <option value="HU">Hungría</option>
                                    <option value="IN">India</option>
                                    <option value="ID">Indonesia</option>
                                    <option value="IQ">Irak</option>
                                    <option value="IR">Irán</option>
                                    <option value="IE">Irlanda</option>
                                    <option value="IM">Isla de Man</option>
                                    <option value="IS">Islandia</option>
                                    <option value="AX">Islas Åland</option>
                                    <option value="BV">Islas Bouvet</option>
                                    <option value="KY">Islas Caimán</option>
                                    <option value="CC">Islas Cocos</option>
                                    <option value="CK">Islas Cook</option>
                                    <option value="CX">Islas de Navidad</option>
                                    <option value="FO">Islas Faroe</option>
                                    <option value="HM">Islas Heard y McDonald</option>
                                    <option value="FK">Islas Malvinas</option>
                                    <option value="MP">Islas Marianas del Norte</option>
                                    <option value="MH">Islas Marshall</option>
                                    <option value="NF">Islas Norfolk</option>
                                    <option value="SB">Islas Salomón</option>
                                    <option value="SJ">Islas Svalbard y Jan Mayen</option>
                                    <option value="TC">Islas Turcas y Caicos</option>
                                    <option value="VI">Islas Vírgenes (Americanas)</option>
                                    <option value="VG">Islas Vírgenes (Británicas)</option>
                                    <option value="WF">Islas Wallis y Futuna</option>
                                    <option value="IL">Israel</option>
                                    <option value="IT">Italia</option>
                                    <option value="JM">Jamaica</option>
                                    <option value="JP">Japón</option>
                                    <option value="JE">Jersey</option>
                                    <option value="JO">Jordania</option>
                                    <option value="KZ">Kazajstán</option>
                                    <option value="KE">Kenia</option>
                                    <option value="KG">Kirguistán</option>
                                    <option value="KI">Kiribati</option>
                                    <option value="KW">Kuwait</option>
                                    <option value="LA">Laos</option>
                                    <option value="LV">Latvia</option>
                                    <option value="LS">Lesotho</option>
                                    <option value="LB">Líbano</option>
                                    <option value="LR">Liberia</option>
                                    <option value="LY">Libia</option>
                                    <option value="LI">Liechtenstein</option>
                                    <option value="LT">Lituania</option>
                                    <option value="LU">Luxemburgo</option>
                                    <option value="MO">Macao</option>
                                    <option value="MK">Macedonia</option>
                                    <option value="MG">Madagascar</option>
                                    <option value="MY">Malasia</option>
                                    <option value="MW">Malawi</option>
                                    <option value="MV">Maldivas</option>
                                    <option value="ML">Mali</option>
                                    <option value="MT">Malta</option>
                                    <option value="MA">Marruecos</option>
                                    <option value="MQ">Martinica</option>
                                    <option value="MU">Mauricio</option>
                                    <option value="MR">Mauritania</option>
                                    <option value="YT">Mayotte</option>
                                    <option value="MX">México</option>
                                    <option value="FM">Micronesia</option>
                                    <option value="MD">Moldovia</option>
                                    <option value="MC">Mónaco</option>
                                    <option value="MN">Mongolia</option>
                                    <option value="ME">Montenegro</option>
                                    <option value="MS">Montserrat</option>
                                    <option value="MZ">Mozambique</option>
                                    <option value="MM">Myanmar</option>
                                    <option value="NA">Namibia</option>
                                    <option value="NR">Naurú</option>
                                    <option value="NP">Nepal</option>
                                    <option value="NI">Nicaragua</option>
                                    <option value="NE">Níger</option>
                                    <option value="NG">Nigeria</option>
                                    <option value="NU">Niue</option>
                                    <option value="NO">Noruega</option>
                                    <option value="NC">Nueva Caledonia</option>
                                    <option value="NZ">Nueva Zelandia</option>
                                    <option value="OM">Omán</option>
                                    <option value="PK">Pakistán</option>
                                    <option value="PW">Palau</option>
                                    <option value="PS">Palestina, Estado de</option>
                                    <option value="PA">Panamá</option>
                                    <option value="PG">Papúa Nueva Guinea</option>
                                    <option value="PY">Paraguay</option>
                                    <option value="PE">Perú</option>
                                    <option value="PN">Pitcairn</option>
                                    <option value="PF">Polinesia Francesa</option>
                                    <option value="PL">Polonia</option>
                                    <option value="PT">Portugal</option>
                                    <option value="PR">Puerto Rico</option>
                                    <option value="QA">Qatar</option>
                                    <option value="GB">Reino Unido</option>
                                    <option value="CF">República Centroafricana</option>
                                    <option value="CZ">República Checa</option>
                                    <option value="DO">República Dominicana</option>
                                    <option value="RE">Reunión</option>
                                    <option value="RW">Ruanda</option>
                                    <option value="RO">Rumania</option>
                                    <option value="EH">Sahara Occidental</option>
                                    <option value="BL">Saint Barthélemy</option>
                                    <option value="WS">Samoa</option>
                                    <option value="AS">Samoa Americana</option>
                                    <option value="KN">San Cristóbal Nevis</option>
                                    <option value="SM">San Marino</option>
                                    <option value="SX">San Martín (parte holandesa)</option>
                                    <option value="MF">San Martín (zona Francesa)</option>
                                    <option value="PM">San Pedro y Miquelon</option>
                                    <option value="VC">San Vincente y Las Granadinas</option>
                                    <option value="SH">Santa Elena, Ascensión y Tristán de Acuña</option>
                                    <option value="LC">Santa Lucía</option>
                                    <option value="ST">Santo Tomé y Príncipe</option>
                                    <option value="SN">Senegal</option>
                                    <option value="RS">Serbia</option>
                                    <option value="SC">Seychelles</option>
                                    <option value="SL">Sierra Leona</option>
                                    <option value="SG">Singapur</option>
                                    <option value="SY">Siria</option>
                                    <option value="SO">Somalía</option>
                                    <option value="LK">Sri Lanka</option>
                                    <option value="ZA">Sudáfrica</option>
                                    <option value="SD">Sudán</option>
                                    <option value="SS">Sudán del Sur</option>
                                    <option value="SE">Suecia</option>
                                    <option value="CH">Suiza</option>
                                    <option value="SR">Surinam</option>
                                    <option value="SZ">Swazilandia</option>
                                    <option value="TH">Tailandia</option>
                                    <option value="TW">Taiwán</option>
                                    <option value="TZ">Tanzania</option>
                                    <option value="TJ">Tayikistán</option>
                                    <option value="IO">Territorio Británico del Océano Índico</option>
                                    <option value="TF">Territorios Franceses del Sur</option>
                                    <option value="TL">Timor-Leste</option>
                                    <option value="TG">Togo</option>
                                    <option value="TK">Tokelau</option>
                                    <option value="TO">Tonga</option>
                                    <option value="TT">Trinidad y Tobago</option>
                                    <option value="TN">Túnez</option>
                                    <option value="TM">Turkmenistán</option>
                                    <option value="TR">Turquía</option>
                                    <option value="TV">Tuvalu</option>
                                    <option value="UA">Ucrania</option>
                                    <option value="UG">Uganda</option>
                                    <option value="UM">United States Minor Outlying Islands</option>
                                    <option value="UY">Uruguay</option>
                                    <option value="UZ">Uzbekistan</option>
                                    <option value="VU">Vanuatu</option>
                                    <option value="VE">Venezuela, República Bolivariana de</option>
                                    <option value="VN">Vietnam</option>
                                    <option value="YE">Yemen</option>
                                    <option value="ZM">Zambia</option>
                                    <option value="ZW">Zimbawe</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Cancelar</b></button>
                            <button type="submit" class="btn red"><b>Guardar</b></button>
                        </div>
                        <input type="hidden" name="_token" v-bind:value="csrf">
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Configuration",
    props: {
        name: String,
        surnames: String,
        email: String,
        address: String,
        country: String,
        postalCode: String,
        csrf: String,
        editAccountInfoUrl: String,
        editAddressUrl: String,
    },
    mounted() {
        let countryHolder = $('#countryHolder');
        let country = countryHolder.attr('data-content');

        if(country.length < 1) country = 'ES';

        let option = $("#country option[value='"+country+"']");
        option.attr('selected', true);
        countryHolder.text(option.text());
    }
}
</script>

<style scoped>
    .root{
        margin-bottom: 6rem;
    }

    .edit{
        color: #D50006;
        cursor: pointer;
    }

    .btn{
        border-radius: 0;
    }

    .red{
        background-color: #D50006;
        color: white;
    }

    .modal-header{
        border-bottom: none;
    }

    .modal-footer{
        text-align: center;
        display: block;
        border-top: none;
    }

    @media screen and (max-width: 992px) {
        .root {
            margin-bottom: 2rem;
        }
    }
</style>
