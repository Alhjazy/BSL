@extends('layouts.app')
@section('content')
    <form method="post" action="/hrms/employee/register" enctype="multipart/form-data">
        @csrf
        <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
           Register Employee
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <button type="reset" class="button box text-gray-700 dark:text-gray-300 mr-2 flex items-center ml-auto sm:ml-0"> <i class="w-4 h-4 mr-2" data-feather="rotate-cw"></i> Reset </button>
            <button type="submit" class="button box text-white bg-theme-1 dark:text-gray-300 mr-2 flex items-center ml-auto sm:ml-0"> <i class="w-4 h-4 mr-2" data-feather="save"></i> Submit </button>
        </div>
        </div>
        <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
            <!-- BEGIN: Post Content -->
            <div class="col-span-12 lg:col-span-4">
                <div class="post intro-y overflow-hidden box p-2">
                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 dark:border-dark-5">
                        <h2 class="font-medium text-base mr-auto">
                            Display Information
                        </h2>
                    </div>
                    <div class="mt-3">
                        <div class="col-span-12 xl:col-span-4">
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    <img class="rounded-md" id="image" alt="" src="/resources/dist/images/profile-7.jpg">
                                    <div id="reset_image" style="display: none;" title="Remove this profile photo?" onclick="$('#fileInput').val('');$('#image').attr('src','/resources/dist/images/profile-7.jpg');$('#reset_image').hide();$('#btn_choose_image').show();" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div>
                                </div>
                                <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                    <button type="button" id="btn_choose_image" class="button w-full bg-theme-1 text-white" >Choose Employee Personal Photo</button>
                                    <input type="file" name="personal_image" id="fileInput" accept="image/*" class="w-full h-full top-0 left-0 absolute opacity-0" onchange="let file = document.getElementById('fileInput').files[0];

                                        var reader = new FileReader();
                                        reader.onload = function(e) {
                                              $('#image').attr('src', e.target.result);
                                            }
                                        reader.readAsDataURL(file);
                                        $('#reset_image').show();
                                        $('#btn_choose_image').hide();
                                    ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Title </label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2"> <input type="radio" value="Mr." class="input border mr-2" id="horizontal-radio-chris-evans" name="title" > <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">Mr.</label> </div>
                            <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0"> <input value="Mrs." type="radio" class="input border mr-2" id="horizontal-radio-liam-neeson" name="title" > <label class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">Mrs.</label> </div>
                            <div class="flex items-center text-gray-700 dark:text-gray-500 mr-2 mt-2 sm:mt-0"> <input value="Ms." type="radio" class="input border mr-2" id="horizontal-radio-daniel-craig" name="title" > <label class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">Ms.</label> </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Employee Name (English)</label>
                        <input name="name" class="input w-full border mt-2" data-single-mode="true">
                    </div>
                    <div class="mt-3">
                        <label>Employee Name (Arabic)</label>
                        <input name="ar_name" class="input w-full border mt-2" data-single-mode="true">
                    </div>
                    <div class="mt-3">
                        <label>Date of birth</label>
                        <input name="birth_date" class="datepicker input w-full border mt-2" data-format="YYYY-MM-DD" data-single-mode="true">
                    </div>
                    <div class="mt-3">
                        <label>Religion</label>
                        <div class="mt-2">
                            <select data-placeholder="Select categories" class="tail-select w-full" name="religion">
                                <option value="ISLAM" selected title="ISLAM">ISLAM</option>
                                <option value="OTHER" title="OTHER">OTHER</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Nationality</label>
                        <div class="mt-2">
                            <select data-placeholder="Select Nationality" class="tail-select w-full" name="nationality">
                                <option value="Afghanistan" title="Afghanistan">Afghanistan</option>
                                <option value="Ć…land Islands" title="Ć…land Islands">Aland Islands</option>
                                <option value="Albania" title="Albania">Albania</option>
                                <option value="Algeria" title="Algeria">Algeria</option>
                                <option value="American Samoa" title="American Samoa">American Samoa</option>
                                <option value="Andorra" title="Andorra">Andorra</option>
                                <option value="Angola" title="Angola">Angola</option>
                                <option value="Anguilla" title="Anguilla">Anguilla</option>
                                <option value="Antarctica" title="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda" title="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina" title="Argentina">Argentina</option>
                                <option value="Armenia" title="Armenia">Armenia</option>
                                <option value="Aruba" title="Aruba">Aruba</option>
                                <option value="Australia" title="Australia">Australia</option>
                                <option value="Austria" title="Austria">Austria</option>
                                <option value="Azerbaijan" title="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas" title="Bahamas">Bahamas</option>
                                <option value="Bahrain" title="Bahrain">Bahrain</option>
                                <option value="Bangladesh" title="Bangladesh">Bangladesh</option>
                                <option value="Barbados" title="Barbados">Barbados</option>
                                <option value="Belarus" title="Belarus">Belarus</option>
                                <option value="Belgium" title="Belgium">Belgium</option>
                                <option value="Belize" title="Belize">Belize</option>
                                <option value="Benin" title="Benin">Benin</option>
                                <option value="Bermuda" title="Bermuda">Bermuda</option>
                                <option value="Bhutan" title="Bhutan">Bhutan</option>
                                <option value="Bolivia, Plurinational State of" title="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                                <option value="Bonaire, Sint Eustatius and Saba" title="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                                <option value="Bosnia and Herzegovina" title="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana" title="Botswana">Botswana</option>
                                <option value="Bouvet Island" title="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil" title="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory" title="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam" title="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria" title="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso" title="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi" title="Burundi">Burundi</option>
                                <option value="Cambodia" title="Cambodia">Cambodia</option>
                                <option value="Cameroon" title="Cameroon">Cameroon</option>
                                <option value="Canada" title="Canada">Canada</option>
                                <option value="Cape Verde" title="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands" title="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic" title="Central African Republic">Central African Republic</option>
                                <option value="Chad" title="Chad">Chad</option>
                                <option value="Chile" title="Chile">Chile</option>
                                <option value="China" title="China">China</option>
                                <option value="Christmas Island" title="Christmas Island">Christmas Island</option>
                                <option value="Cocos (Keeling) Islands" title="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia" title="Colombia">Colombia</option>
                                <option value="Comoros" title="Comoros">Comoros</option>
                                <option value="Congo" title="Congo">Congo</option>
                                <option value="Congo, the Democratic Republic of the" title="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                                <option value="Cook Islands" title="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica" title="Costa Rica">Costa Rica</option>
                                <option value="CĆ´te d'Ivoire" title="CĆ´te d'Ivoire">CĆ´te d'Ivoire</option>
                                <option value="Croatia" title="Croatia">Croatia</option>
                                <option value="Cuba" title="Cuba">Cuba</option>
                                <option value="CuraĆ§ao" title="CuraĆ§ao">CuraĆ§ao</option>
                                <option value="Cyprus" title="Cyprus">Cyprus</option>
                                <option value="Czech Republic" title="Czech Republic">Czech Republic</option>
                                <option value="Denmark" title="Denmark">Denmark</option>
                                <option value="Djibouti" title="Djibouti">Djibouti</option>
                                <option value="Dominica" title="Dominica">Dominica</option>
                                <option value="Dominican Republic" title="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador" title="Ecuador">Ecuador</option>
                                <option value="Egypt" title="Egypt">Egypt</option>
                                <option value="El Salvador" title="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea" title="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea" title="Eritrea">Eritrea</option>
                                <option value="Estonia" title="Estonia">Estonia</option>
                                <option value="Ethiopia" title="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)" title="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands" title="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji" title="Fiji">Fiji</option>
                                <option value="Finland" title="Finland">Finland</option>
                                <option value="France" title="France">France</option>
                                <option value="French Guiana" title="French Guiana">French Guiana</option>
                                <option value="French Polynesia" title="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories" title="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon" title="Gabon">Gabon</option>
                                <option value="Gambia" title="Gambia">Gambia</option>
                                <option value="Georgia" title="Georgia">Georgia</option>
                                <option value="Germany" title="Germany">Germany</option>
                                <option value="Ghana" title="Ghana">Ghana</option>
                                <option value="Gibraltar" title="Gibraltar">Gibraltar</option>
                                <option value="Greece" title="Greece">Greece</option>
                                <option value="Greenland" title="Greenland">Greenland</option>
                                <option value="Grenada" title="Grenada">Grenada</option>
                                <option value="Guadeloupe" title="Guadeloupe">Guadeloupe</option>
                                <option value="Guam" title="Guam">Guam</option>
                                <option value="Guatemala" title="Guatemala">Guatemala</option>
                                <option value="Guernsey" title="Guernsey">Guernsey</option>
                                <option value="Guinea" title="Guinea">Guinea</option>
                                <option value="Guinea-Bissau" title="Guinea-Bissau">Guinea-Bissau</option>
                                <option value="Guyana" title="Guyana">Guyana</option>
                                <option value="Haiti" title="Haiti">Haiti</option>
                                <option value="Heard Island and McDonald Islands" title="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                                <option value="Holy See (Vatican City State)" title="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="Honduras" title="Honduras">Honduras</option>
                                <option value="Hong Kong" title="Hong Kong">Hong Kong</option>
                                <option value="Hungary" title="Hungary">Hungary</option>
                                <option value="Iceland" title="Iceland">Iceland</option>
                                <option value="India" title="India">India</option>
                                <option value="Indonesia" title="Indonesia">Indonesia</option>
                                <option value="Iran, Islamic Republic of" title="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                <option value="Iraq" title="Iraq">Iraq</option>
                                <option value="Ireland" title="Ireland">Ireland</option>
                                <option value="Isle of Man" title="Isle of Man">Isle of Man</option>
                                <option value="Israel" title="Israel">Israel</option>
                                <option value="Italy" title="Italy">Italy</option>
                                <option value="Jamaica" title="Jamaica">Jamaica</option>
                                <option value="Japan" title="Japan">Japan</option>
                                <option value="Jersey" title="Jersey">Jersey</option>
                                <option value="Jordan" title="Jordan">Jordan</option>
                                <option value="Kazakhstan" title="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya" title="Kenya">Kenya</option>
                                <option value="Kiribati" title="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People's Republic of" title="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                <option value="Korea, Republic of" title="Korea, Republic of">Korea, Republic of</option>
                                <option value="Kuwait" title="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan" title="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People's Democratic Republic" title="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                <option value="Latvia" title="Latvia">Latvia</option>
                                <option value="Lebanon" title="Lebanon">Lebanon</option>
                                <option value="Lesotho" title="Lesotho">Lesotho</option>
                                <option value="Liberia" title="Liberia">Liberia</option>
                                <option value="Libya" title="Libya">Libya</option>
                                <option value="Liechtenstein" title="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania" title="Lithuania">Lithuania</option>
                                <option value="Luxembourg" title="Luxembourg">Luxembourg</option>
                                <option value="Macao" title="Macao">Macao</option>
                                <option value="Macedonia, the former Yugoslav Republic of" title="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
                                <option value="Madagascar" title="Madagascar">Madagascar</option>
                                <option value="Malawi" title="Malawi">Malawi</option>
                                <option value="Malaysia" title="Malaysia">Malaysia</option>
                                <option value="Maldives" title="Maldives">Maldives</option>
                                <option value="Mali" title="Mali">Mali</option>
                                <option value="Malta" title="Malta">Malta</option>
                                <option value="Marshall Islands" title="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique" title="Martinique">Martinique</option>
                                <option value="Mauritania" title="Mauritania">Mauritania</option>
                                <option value="Mauritius" title="Mauritius">Mauritius</option>
                                <option value="Mayotte" title="Mayotte">Mayotte</option>
                                <option value="Mexico" title="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of" title="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option value="Moldova, Republic of" title="Moldova, Republic of">Moldova, Republic of</option>
                                <option value="Monaco" title="Monaco">Monaco</option>
                                <option value="Mongolia" title="Mongolia">Mongolia</option>
                                <option value="Montenegro" title="Montenegro">Montenegro</option>
                                <option value="Montserrat" title="Montserrat">Montserrat</option>
                                <option value="Morocco" title="Morocco">Morocco</option>
                                <option value="Mozambique" title="Mozambique">Mozambique</option>
                                <option value="Myanmar" title="Myanmar">Myanmar</option>
                                <option value="Namibia" title="Namibia">Namibia</option>
                                <option value="Nauru" title="Nauru">Nauru</option>
                                <option value="Nepal" title="Nepal">Nepal</option>
                                <option value="Netherlands" title="Netherlands">Netherlands</option>
                                <option value="New Caledonia" title="New Caledonia">New Caledonia</option>
                                <option value="New Zealand" title="New Zealand">New Zealand</option>
                                <option value="Nicaragua" title="Nicaragua">Nicaragua</option>
                                <option value="Niger" title="Niger">Niger</option>
                                <option value="Nigeria" title="Nigeria">Nigeria</option>
                                <option value="Niue" title="Niue">Niue</option>
                                <option value="Norfolk Island" title="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands" title="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway" title="Norway">Norway</option>
                                <option value="Oman" title="Oman">Oman</option>
                                <option value="Pakistan" title="Pakistan">Pakistan</option>
                                <option value="Palau" title="Palau">Palau</option>
                                <option value="Palestinian Territory, Occupied" title="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                <option value="Panama" title="Panama">Panama</option>
                                <option value="Papua New Guinea" title="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay" title="Paraguay">Paraguay</option>
                                <option value="Peru" title="Peru">Peru</option>
                                <option value="Philippines" title="Philippines">Philippines</option>
                                <option value="Pitcairn" title="Pitcairn">Pitcairn</option>
                                <option value="Poland" title="Poland">Poland</option>
                                <option value="Portugal" title="Portugal">Portugal</option>
                                <option value="Puerto Rico" title="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar" title="Qatar">Qatar</option>
                                <option value="RĆ©union" title="RĆ©union">RĆ©union</option>
                                <option value="Romania" title="Romania">Romania</option>
                                <option value="Russian Federation" title="Russian Federation">Russian Federation</option>
                                <option value="Rwanda" title="Rwanda">Rwanda</option>
                                <option value="Saint BarthĆ©lemy" title="Saint BarthĆ©lemy">Saint BarthĆ©lemy</option>
                                <option value="Saint Helena, Ascension and Tristan da Cunha" title="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
                                <option value="Saint Kitts and Nevis" title="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia" title="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Martin (French part)" title="Saint Martin (French part)">Saint Martin (French part)</option>
                                <option value="Saint Pierre and Miquelon" title="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and the Grenadines" title="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                <option value="Samoa" title="Samoa">Samoa</option>
                                <option value="San Marino" title="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe" title="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia" selected title="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal" title="Senegal">Senegal</option>
                                <option value="Serbia" title="Serbia">Serbia</option>
                                <option value="Seychelles" title="Seychelles">Seychelles</option>
                                <option value="Sierra Leone" title="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore" title="Singapore">Singapore</option>
                                <option value="Sint Maarten (Dutch part)" title="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                                <option value="Slovakia" title="Slovakia">Slovakia</option>
                                <option value="Slovenia" title="Slovenia">Slovenia</option>
                                <option value="Solomon Islands" title="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia" title="Somalia">Somalia</option>
                                <option value="South Africa" title="South Africa">South Africa</option>
                                <option value="South Georgia and the South Sandwich Islands" title="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                <option value="South Sudan" title="South Sudan">South Sudan</option>
                                <option value="Spain" title="Spain">Spain</option>
                                <option value="Sri Lanka" title="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan" title="Sudan">Sudan</option>
                                <option value="Suriname" title="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen" title="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland" title="Swaziland">Swaziland</option>
                                <option value="Sweden" title="Sweden">Sweden</option>
                                <option value="Switzerland" title="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic" title="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan, Province of China" title="Taiwan, Province of China">Taiwan, Province of China</option>
                                <option value="Tajikistan" title="Tajikistan">Tajikistan</option>
                                <option value="Tanzania, United Republic of" title="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                <option value="Thailand" title="Thailand">Thailand</option>
                                <option value="Timor-Leste" title="Timor-Leste">Timor-Leste</option>
                                <option value="Togo" title="Togo">Togo</option>
                                <option value="Tokelau" title="Tokelau">Tokelau</option>
                                <option value="Tonga" title="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago" title="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia" title="Tunisia">Tunisia</option>
                                <option value="Turkey" title="Turkey">Turkey</option>
                                <option value="Turkmenistan" title="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands" title="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="Tuvalu" title="Tuvalu">Tuvalu</option>
                                <option value="Uganda" title="Uganda">Uganda</option>
                                <option value="Ukraine" title="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates" title="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom" title="United Kingdom">United Kingdom</option>
                                <option value="United States" title="United States">United States</option>
                                <option value="United States Minor Outlying Islands" title="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option value="Uruguay" title="Uruguay">Uruguay</option>
                                <option value="Uzbekistan" title="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu" title="Vanuatu">Vanuatu</option>
                                <option value="Venezuela, Bolivarian Republic of" title="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                                <option value="Viet Nam" title="Viet Nam">Viet Nam</option>
                                <option value="Virgin Islands, British" title="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S." title="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna" title="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara" title="Western Sahara">Western Sahara</option>
                                <option value="Yemen" title="Yemen">Yemen</option>
                                <option value="Zambia" title="Zambia">Zambia</option>
                                <option value="Zimbabwe" title="Zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>Status</label>
                        <div class="mt-2">
                            <div class="mt-2">
                                <select data-placeholder="Select Status" class="tail-select w-full" name="status">
                                    <option value="ACTIVE" selected title="ACTIVE">ACTIVE</option>
                                    <option value="Un-Active" title="Un-Active">Un-Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Post Content -->
            <!-- BEGIN: Post Info -->
            <div class="col-span-12 lg:col-span-8">
                <div class="post intro-y overflow-hidden box mt-5">
                    <div class="post__tabs nav-tabs flex flex-col sm:flex-row bg-gray-300 dark:bg-dark-2 text-gray-600">
                        <a title="General Information" data-toggle="tab" data-target="#general" href="javascript:;" class="tooltip w-full sm:w-40 py-4 p-1 text-center flex justify-center items-center active"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> General Information </a>
                        <a title="Passport Details" data-toggle="tab" data-target="#passport" href="javascript:;" class="tooltip w-full sm:w-40 py-4 p-1 text-center flex justify-center items-center"> <i data-feather="code" class="w-4 h-4 mr-2"></i> Passport Details</a>
                        <a title="Contract Details" data-toggle="tab" data-target="#contract" href="javascript:;" class="tooltip w-full sm:w-40 py-4 p-1 text-center flex justify-center items-center"> <i data-feather="align-left" class="w-4 h-4 mr-2"></i> Contract Details </a>
                        <a title="Assignment Job/Role & Department Details" data-toggle="tab" data-target="#role" href="javascript:;" class="tooltip w-full sm:w-40 py-4 p-1 text-center flex justify-center items-center"><i data-feather="align-left" class="w-4 h-4 mr-2"></i>Job/Role/Department  </a>
                        <a title="Salary Details" data-toggle="tab" data-target="#salary" href="javascript:;" class="tooltip w-full sm:w-40 py-4 p-1 text-center flex justify-center items-center"> <i data-feather="align-left" class="w-4 h-4 mr-2"></i> Salary Details </a>
                        <a title="Bank Account Details" data-toggle="tab" data-target="#bank" href="javascript:;" class="tooltip w-full sm:w-40 py-4 p-1 text-center flex justify-center items-center"> <i data-feather="align-left" class="w-4 h-4 mr-2"></i> Bank Account </a>
                        <a title="Business License Details" data-toggle="tab" data-target="#BL" href="javascript:;" class="tooltip w-full sm:w-40 py-4 p-1 text-center flex justify-center items-center"> <i data-feather="align-left" class="w-4 h-4 mr-2"></i>Business License </a>
                    </div>
                    <div class="post__content tab-content">
                        <div class="tab-content__pane p-5 active" id="general">
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Contact Information </div>
                                <div class="mt-3">
                                    <div class="sm:grid grid-cols-2 gap-2">
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">E-mail</div>
                                            <div class="pl-6">
                                                <input type="text" name="email" class="input pl-16 w-full border col-span-4" placeholder="E-mail">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Mobile No.</div>
                                            <div class="pl-8">
                                                <input type="text" name="phone_number" class="input pl-20 w-full border col-span-4" placeholder="Mobile No.">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-200 dark:border-dark-5 mt-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> ID Information </div>
                                <div class="mt-3">
                                    <div class="grid grid-cols-3 gap-2">
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">ID Number</div>
                                            <div class="pl-6">
                                                <input type="text" name="id_number" class="input pl-20 w-full border col-span-4" placeholder=" ID Number">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">ID Type</div>
                                            <div class="pl-10">
                                                <input type="text" name="id_type" class="input pl-12 w-full border col-span-3" placeholder="ID Type">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">ID Copy Number</div>
                                            <div class="pl-16">
                                                <input type="text" name="id_copy_number" class="input pl-20 w-full border col-span-3" placeholder="ID Copy Number">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">ID Release Date</div>
                                            <div class="pl-16">
                                                <input type="text" name="id_release_date" data-format="YYYY-MM-DD" class="datepicker input pl-20 w-full border col-span-3" data-single-mode="true" placeholder="ID Release Date">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">ID Expiration Date</div>
                                            <div class="pl-20">
                                                <input type="text" name="id_expiration_date" class="datepicker input pl-20 w-full border col-span-3" data-format="YYYY-MM-DD" data-single-mode="true" placeholder="ID Expiration Date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> ID Copy File </div>
                                <div class="mt-5">
                                    <div>
                                        <label>Upload File</label>
                                        <input type="file" name="id_file" class="input w-full border mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content__pane p-5" id="passport">
                            <div class="border border-gray-200 dark:border-dark-5 mt-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Passport Details </div>
                                <div class="mt-3">
                                    <div class="grid grid-cols-3 gap-2">
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Passport Number</div>
                                            <div class="pl-6">
                                                <input type="text" name="passport_number" class="input pl-20 w-full border col-span-4" placeholder="Passport Number">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Passport Visa Number</div>
                                            <div class="pl-10">
                                                <input type="text" name="passport_visa_number" class="input pl-12 w-full border col-span-3" placeholder="Passport Visa Number">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Passport Release Date</div>
                                            <div class="pl-16">
                                                <input type="text" name="passport_release_date" class="datepicker input pl-20 w-full border col-span-3" data-format="YYYY-MM-DD" data-single-mode="true" placeholder="Passport Release Date">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Passport Expiration Date</div>
                                            <div class="pl-20">
                                                <input type="text" name="passport_expiration_date" class="datepicker input pl-20 w-full border col-span-3" data-format="YYYY-MM-DD" data-single-mode="true" placeholder="Passport Expiration Date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Passport Copy File </div>
                                <div class="mt-5">
                                    <div>
                                        <label>Upload File</label>
                                        <input type="file" name="passport_file" class="input w-full border mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content__pane p-5" id="contract">
                            <div class="border border-gray-200 dark:border-dark-5 mt-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Contract Details</div>
                                <div class="mt-3">
                                    <div class="grid grid-cols-3 gap-2">
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Contract Number/No.</div>
                                            <div class="pl-6">
                                                <input type="text" name="contract_no" class="input pl-20 w-full border col-span-4" placeholder="Contract Number/No.">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Contract Validation Date</div>
                                            <div class="pl-10">
                                                <input type="text" name="contract_validation_date" class="datepicker input pl-12 w-full border col-span-3" data-format="YYYY-MM-DD" placeholder="Contract Validation Date">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Contract Release Date</div>
                                            <div class="pl-16">
                                                <input type="text" name="contract_release_date" class="datepicker input pl-20 w-full border col-span-3" data-format="YYYY-MM-DD" data-single-mode="true" placeholder="Contract Release Date">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Contract Expiration Date</div>
                                            <div class="pl-20">
                                                <input type="text" name="contract_expiration_date" class="datepicker input pl-20 w-full border col-span-3" data-format="YYYY-MM-DD" data-single-mode="true" placeholder="Contract Expiration Date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Passport Copy File </div>
                                <div class="mt-5">
                                    <div>
                                        <label>Upload File</label>
                                        <input type="file" name="contract_file" class="input w-full border mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content__pane p-5" id="role">
                            <div class="border border-gray-200 dark:border-dark-5 mt-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Assignment Job/Role & Department Details</div>
                                <div class="mt-3 mb-10">
                                    <div class="grid grid-cols-3 gap-2">
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Department No.</div>
                                            <div class="pl-12">
                                                <select data-search="true" name="department_id" class="tail-select w-full">
                                                    @if($departments) @foreach($departments as $k => $v)
                                                        <option value="{{$v->id}}" title="{{$v->name}}">{{$v->name}}</option>
                                                    @endforeach @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Role Name/No</div>
                                            <div class="pl-12">
                                                <select data-search="true" name="role_id" class="tail-select w-full">
                                                    @if($roles) @foreach($roles as $k => $v)
                                                        <option value="{{$v->id}}" title="{{$v->title}}">{{$v->title}}</option>
                                                    @endforeach @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content__pane p-5" id="salary">
                            <div class="border border-gray-200 dark:border-dark-5 mt-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Salary Details</div>
                                <div class="mt-3">
                                    <div class="grid grid-cols-3 gap-2">
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Salary Basic Amount</div>
                                            <div class="pl-6">
                                                <input type="text" name="salary_basic" class="input pl-20 w-full border col-span-4" placeholder="Salary Basic Amount">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Salary Transport Amount</div>
                                            <div class="pl-10">
                                                <input type="text" name="salary_transport" class="input pl-12 w-full border col-span-3" placeholder="Salary Transport Amount">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Salary Housing Amount</div>
                                            <div class="pl-10">
                                                <input type="text" name="salary_housing" class="input pl-12 w-full border col-span-3" placeholder="Salary Housing Amount">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Salary Other Benefits Amount</div>
                                            <div class="pl-10">
                                                <input type="text" name="salary_other_benefits" class="input pl-12 w-full border col-span-3" placeholder="Salary Other Benefits Amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-3 gap-2">
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Salary Mobile Amount</div>
                                            <div class="pl-6">
                                                <input type="text" name="salary_mobile" class="input pl-20 w-full border col-span-4" placeholder="Salary Mobile Amount">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Salary Flaying Tickets Amount</div>
                                            <div class="pl-10">
                                                <input type="text" name="salary_flaying_Tickets" class="input pl-12 w-full border col-span-3" placeholder="Salary Flaying Tickets Amount">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Salary Gas Amount</div>
                                            <div class="pl-10">
                                                <input type="text" name="salary_gas" class="input pl-12 w-full border col-span-3" placeholder="Salary Gas Amount">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Salary Status</div>
                                            <div class="pl-10">
                                                <input type="text" name="salary_status" class="input pl-12 w-full border col-span-3" placeholder="Salary Status">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Salary Remarks/Description</div>
                                <div class="mt-5">
                                    <div class="editor" name="salary_description">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content__pane p-5" id="bank">
                            <div class="border border-gray-200 dark:border-dark-5 mt-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>Bank Account Details</div>
                                <div class="mt-3">
                                    <div class="grid grid-cols-3 gap-2">
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Bank Account Name</div>
                                            <div class="pl-6">
                                                <input type="text" name="bank_account_name" class="input pl-20 w-full border col-span-4" placeholder="Bank Account Name">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Bank Account Number</div>
                                            <div class="pl-10">
                                                <input type="text" name="bank_account_number" class="input pl-12 w-full border col-span-3" placeholder="Bank Account Number">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Bank Account IBAN Number</div>
                                            <div class="pl-16">
                                                <input type="text" name="bank_account_iban" class=" input pl-20 w-full border col-span-3"  placeholder="Bank Account IBAN Number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border border-gray-200 dark:border-dark-5 rounded-md p-5 mt-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> Bank Account Proof File </div>
                                <div class="mt-5">
                                    <div>
                                        <label>Upload File</label>
                                        <input type="file" name="bank_file" class="input w-full border mt-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content__pane p-5" id="BL">
                            <div class="border border-gray-200 dark:border-dark-5 mt-5 rounded-md p-5">
                                <div class="font-medium flex items-center border-b border-gray-200 dark:border-dark-5 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i>Business License Details</div>
                                <div class="mt-3">
                                    <div class="grid grid-cols-3 gap-2">
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Business License Number</div>
                                            <div class="pl-6">
                                                <input type="text" name="business_license_number" class="input pl-20 w-full border col-span-4" placeholder="Business License Number">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Business License Release Date</div>
                                            <div class="pl-10">
                                                <input type="text" name="business_license_release_date" class="datepicker input pl-12 w-full border col-span-3" data-format="YYYY-MM-DD" data-single-mode="true" placeholder="Business License Release Date">
                                            </div>
                                        </div>
                                        <div class="relative mt-2">
                                            <div class="absolute top-0 left-0 rounded-l px-4 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Business License Expiration Date</div>
                                            <div class="pl-10">
                                                <input type="text" name="business_license_expiration_date" class="datepicker input pl-12 w-full border col-span-3" data-format="YYYY-MM-DD" data-single-mode="true" placeholder="Business License Expiration Date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Post Info -->
        </div>
    </form>
@endsection