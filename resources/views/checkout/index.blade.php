@php
    $pageTitle = 'Products';
    $WelcomeNote = 'Checkout Page';
    $alignment = 'aligncenter';
    $user = auth()->user();

@endphp

@extends('checkout.layouts')


@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    @include('tree.sub-content')


    <div class="container">

        <form action="{{ route('checkout.placeorder') }}" method="POST" enctype="multipart/form-data">
            @csrf


        <div class="row py-5">
            <div class="col-md-4 order-md-2 mb-4">
                @php

                $countSales = 0;

                @endphp

          

                
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                </h4>

                <ul class="list-group mb-3">

                @foreach ($cartDetails as $item)
         
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $item['name'] }}</h6>
                            <small class="text-muted">{{ $item['quantity'] }} x </small>
                            <small class="text-muted">{{ $item['price'] }}</small>
                        </div>
                        <span class="text-muted">{{ $item['subtotal'] }}</span>
                    </li>
                    @endforeach
                 
                   
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (PHP)</span>
                        <strong>PHP {{ $total }}</strong>
        
                    </li>
                </ul>
                
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Stockist Id">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Near You</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8 order-md-1 checkoutform">


                <h4 class="mb-3">Billing address</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="firstName">First name</label>
                            <input type="hidden" name="sponsor_id_number" value="{{  $user->sponsor_id_number }}" class="form-control">
                            <input type="text" name="firstName" value="{{  $user->name  }}" class="form-control" id="firstName">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName">Last name</label>
                            <input type="text" name="lastName" value="{{ $user->lastname }}" class="form-control" id="lastName">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phonenumber">Phone Number
                            <span class="text-muted"></span>
                        </label>
                        <input type="text" name="phonenumber" value="{{ $user->phoneNumber }}" class="form-control">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{ $user->presentAddress }}" class="form-control" id="address" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address2">Address 2
                            <span class="text-muted">(Optional)</span>
                        </label>
                        <input type="text" name="address2" class="form-control" id="address2" placeholder="Second Address" >
                    </div>

                    <div class="row">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputZip5">Zip</label>
                                <input type="text" name="zipcode" style=" padding: 10px; border-radius:999px" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState5">City</label>
                                <select id="city" name="city" style=" padding: 10px; border-radius:999px">
                                    <option value="Alejal">Alejal</option>
                                    <option value="Andili">Andili</option>
                                    <option value="Andop">Andop</option>
                                    <option value="Anibongan">Anibongan</option>
                                    <option value="Astorga">Astorga</option>
                                    <option value="Babag">Babag</option>
                                    <option value="Baculin">Baculin</option>
                                    <option value="Baganga">Baganga</option>
                                    <option value="Balagunan">Balagunan</option>
                                    <option value="Balangonan">Balangonan</option>
                                    <option value="Balutakay">Balutakay</option>
                                    <option value="Bansalan">Bansalan</option>
                                    <option value="Bantacan">Bantacan</option>
                                    <option value="Baon">Baon</option>
                                    <option value="Baracatan">Baracatan</option>
                                    <option value="Basiawan">Basiawan</option>
                                    <option value="Batiano">Batiano</option>
                                    <option value="Bato">Bato</option>
                                    <option value="Batobato">Batobato</option>
                                    <option value="Baylo">Baylo</option>
                                    <option value="Biao">Biao</option>
                                    <option value="Bincoñgan">Bincoñgan</option>
                                    <option value="Bitaogan">Bitaogan</option>
                                    <option value="Bobon">Bobon</option>
                                    <option value="Bolila">Bolila</option>
                                    <option value="Boston">Boston</option>
                                    <option value="Buclad">Buclad</option>
                                    <option value="Buhangin">Buhangin</option>
                                    <option value="Bukid">Bukid</option>
                                    <option value="Bulacan">Bulacan</option>
                                    <option value="Bungabon">Bungabon</option>
                                    <option value="Butulan">Butulan</option>
                                    <option value="Cabayangan">Cabayangan</option>
                                    <option value="Cabinuangan">Cabinuangan</option>
                                    <option value="Caburan">Caburan</option>
                                    <option value="Cambanugoy">Cambanugoy</option>
                                    <option value="Camudmud">Camudmud</option>
                                    <option value="Caraga">Caraga</option>
                                    <option value="Carmen">Carmen</option>
                                    <option value="Cateel">Cateel</option>
                                    <option value="Cogon">Cogon</option>
                                    <option value="Compostela">Compostela</option>
                                    <option value="Compostela Valley">Compostela Valley</option>
                                    <option value="Concepcion">Concepcion</option>
                                    <option value="Corocotan">Corocotan</option>
                                    <option value="Coronon">Coronon</option>
                                    <option value="Cuambog">Cuambog</option>
                                    <option value="Culaman">Culaman</option>
                                    <option value="Dacudao">Dacudao</option>
                                    <option value="Davan">Davan</option>
                                    <option value="Davao">Davao</option>
                                    <option value="Del Pilar">Del Pilar</option>
                                    <option value="Digos">Digos</option>
                                    <option value="Dolo">Dolo</option>
                                    <option value="Dumlan">Dumlan</option>
                                    <option value="Esperanza">Esperanza</option>
                                    <option value="Gabi">Gabi</option>
                                    <option value="Gabuyan">Gabuyan</option>
                                    <option value="Goma">Goma</option>
                                    <option value="Guihing Proper">Guihing Proper</option>
                                    <option value="Gumalang">Gumalang</option>
                                    <option value="Gupitan">Gupitan</option>
                                    <option value="Hagonoy">Hagonoy</option>
                                    <option value="Hiju, Maco">Hiju, Maco</option>
                                    <option value="Ignit">Ignit</option>
                                    <option value="Ilangay">Ilangay</option>
                                    <option value="Inawayan">Inawayan</option>
                                    <option value="Jovellar">Jovellar</option>
                                    <option value="Kalbay">Kalbay</option>
                                    <option value="Kalian">Kalian</option>
                                    <option value="Kaligutan">Kaligutan</option>
                                    <option value="Kapalong">Kapalong</option>
                                    <option value="Katipunan">Katipunan</option>
                                    <option value="Kiblawan">Kiblawan</option>
                                    <option value="Kinablangan">Kinablangan</option>
                                    <option value="Kinamayan">Kinamayan</option>
                                    <option value="Kinangan">Kinangan</option>
                                    <option value="La Libertad">La Libertad</option>
                                    <option value="La Paz">La Paz</option>
                                    <option value="La Union">La Union</option>
                                    <option value="Lacaron">Lacaron</option>
                                    <option value="Lacson">Lacson</option>
                                    <option value="Lais">Lais</option>
                                    <option value="Lamitan">Lamitan</option>
                                    <option value="Lapuan">Lapuan</option>
                                    <option value="Lasang">Lasang</option>
                                    <option value="Libuganon">Libuganon</option>
                                    <option value="Limao">Limao</option>
                                    <option value="Limot">Limot</option>
                                    <option value="Linao">Linao</option>
                                    <option value="Linoan">Linoan</option>
                                    <option value="Lukatan">Lukatan</option>
                                    <option value="Luna">Luna</option>
                                    <option value="Lungaog">Lungaog</option>
                                    <option value="Lupon">Lupon</option>
                                    <option value="Luzon">Luzon</option>
                                    <option value="Mabini">Mabini</option>
                                    <option value="Mabuhay">Mabuhay</option>
                                    <option value="Maco">Maco</option>
                                    <option value="Maduao">Maduao</option>
                                    <option value="Magatos">Magatos</option>
                                    <option value="Magdug">Magdug</option>
                                    <option value="Magnaga">Magnaga</option>
                                    <option value="Magsaysay">Magsaysay</option>
                                    <option value="Magugpo Poblacion">Magugpo Poblacion</option>
                                    <option value="Mahanob">Mahanob</option>
                                    <option value="Mahayag">Mahayag</option>
                                    <option value="Malagos">Malagos</option>
                                    <option value="Malalag">Malalag</option>
                                    <option value="Malinao">Malinao</option>
                                    <option value="Malita">Malita</option>
                                    <option value="Mambago">Mambago</option>
                                    <option value="Managa">Managa</option>
                                    <option value="Manaloal">Manaloal</option>
                                    <option value="Manat">Manat</option>
                                    <option value="Manay">Manay</option>
                                    <option value="Mangili">Mangili</option>
                                    <option value="Manikling">Manikling</option>
                                    <option value="Matanao">Matanao</option>
                                    <option value="Mati">Mati</option>
                                    <option value="Matiao">Matiao</option>
                                    <option value="Matti">Matti</option>
                                    <option value="Mawab">Mawab</option>
                                    <option value="Mayo">Mayo</option>
                                    <option value="Monkayo">Monkayo</option>
                                    <option value="Montevista">Montevista</option>
                                    <option value="Nabunturan">Nabunturan</option>
                                    <option value="Nangan">Nangan</option>
                                    <option value="Nanyo">Nanyo</option>
                                    <option value="New Baclayon">New Baclayon</option>
                                    <option value="New Bohol">New Bohol</option>
                                    <option value="New Corella">New Corella</option>
                                    <option value="New Leyte">New Leyte</option>
                                    <option value="New Sibonga">New Sibonga</option>
                                    <option value="New Visayas">New Visayas</option>
                                    <option value="Nuing">Nuing</option>
                                    <option value="Padada">Padada</option>
                                    <option value="Pag-asa">Pag-asa</option>
                                    <option value="Pagsabangan">Pagsabangan</option>
                                    <option value="Palma Gil">Palma Gil</option>
                                    <option value="Panabo">Panabo</option>
                                    <option value="Pandasan">Pandasan</option>
                                    <option value="Pangian">Pangian</option>
                                    <option value="Panikian">Panikian</option>
                                    <option value="Pantukan">Pantukan</option>
                                    <option value="Pasian">Pasian</option>
                                    <option value="Pondaguitan">Pondaguitan</option>
                                    <option value="Province of Davao del Norte">Province of Davao del Norte</option>
                                    <option value="Province of Davao del Sur">Province of Davao del Sur</option>
                                    <option value="Province of Davao Oriental">Province of Davao Oriental</option>
                                    <option value="Pung-Pang">Pung-Pang</option>
                                    <option value="Samal">Samal</option>
                                    <option value="Sampao">Sampao</option>
                                    <option value="San Alfonso">San Alfonso</option>
                                    <option value="San Antonio">San Antonio</option>
                                    <option value="San Ignacio">San Ignacio</option>
                                    <option value="San Luis">San Luis</option>
                                    <option value="San Mariano">San Mariano</option>
                                    <option value="San Miguel">San Miguel</option>
                                    <option value="San Pedro">San Pedro</option>
                                    <option value="San Rafael">San Rafael</option>
                                    <option value="San Remigio">San Remigio</option>
                                    <option value="Santa Cruz">Santa Cruz</option>
                                    <option value="Santa Maria">Santa Maria</option>
                                    <option value="Santiago">Santiago</option>
                                    <option value="Santo Niño">Santo Niño</option>
                                    <option value="Sarangani">Sarangani</option>
                                    <option value="Sibulan">Sibulan</option>
                                    <option value="Sigaboy">Sigaboy</option>
                                    <option value="Simod">Simod</option>
                                    <option value="Sinawilan">Sinawilan</option>
                                    <option value="Sinayawan">Sinayawan</option>
                                    <option value="Sirib">Sirib</option>
                                    <option value="Sugal">Sugal</option>
                                    <option value="Sulop">Sulop</option>
                                    <option value="Surup">Surup</option>
                                    <option value="Suz-on">Suz-on</option>
                                    <option value="Tagakpan">Tagakpan</option>
                                    <option value="Tagdanua">Tagdanua</option>
                                    <option value="Tagnanan">Tagnanan</option>
                                    <option value="Takub">Takub</option>
                                    <option value="Talagutong">Talagutong</option>
                                    <option value="Talisay">Talisay</option>
                                    <option value="Talomo">Talomo</option>
                                    <option value="Tamayong">Tamayong</option>
                                    <option value="Tambo">Tambo</option>
                                    <option value="Tamisan">Tamisan</option>
                                    <option value="Tamugan">Tamugan</option>
                                    <option value="Tanlad">Tanlad</option>
                                    <option value="Tapia">Tapia</option>
                                    <option value="Tarragona">Tarragona</option>
                                    <option value="Tawan tawan">Tawan tawan</option>
                                    <option value="Taytayan">Taytayan</option>
                                    <option value="Tibagon">Tibagon</option>
                                    <option value="Tibanbang">Tibanbang</option>
                                    <option value="Tiblawan">Tiblawan</option>
                                    <option value="Tombongon">Tombongon</option>
                                    <option value="Tubalan">Tubalan</option>
                                    <option value="Tuban">Tuban</option>
                                    <option value="Tubod">Tubod</option>
                                    <option value="Tuganay">Tuganay</option>
                                    <option value="Tuli">Tuli</option>
                                    <option value="Ula">Ula</option>
                                    <option value="Wañgan">Wañgan</option>
                                    <option value="Wines">Wines</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                     
                        <div class="d-block my-3">
                            <div class="control-payments custom-radio">
                              <input id="NearestStock" name="payments" type="radio" class="custom-control-input" value="Nearest Stockist in your area" checked>
                              <label class="custom-control-label" for="NearestStock">Nearest Stockist in your area</label>
                              <div class="form-group col-md-6">
                                <label for="citybelongto">Select City</label>
                                <select id="citybelongto" name="citybelongto" style=" padding: 10px; border-radius:999px">
                                    <option value=""> </option>
                                    <option value="Alejal">Alejal</option>
                                    <option value="Andili">Andili</option>
                                    <option value="Andop">Andop</option>
                                    <option value="Anibongan">Anibongan</option>
                                    <option value="Astorga">Astorga</option>
                                    <option value="Babag">Babag</option>
                                    <option value="Baculin">Baculin</option>
                                    <option value="Baganga">Baganga</option>
                                    <option value="Balagunan">Balagunan</option>
                                    <option value="Balangonan">Balangonan</option>
                                    <option value="Balutakay">Balutakay</option>
                                    <option value="Bansalan">Bansalan</option>
                                    <option value="Bantacan">Bantacan</option>
                                    <option value="Baon">Baon</option>
                                    <option value="Baracatan">Baracatan</option>
                                    <option value="Basiawan">Basiawan</option>
                                    <option value="Batiano">Batiano</option>
                                    <option value="Bato">Bato</option>
                                    <option value="Batobato">Batobato</option>
                                    <option value="Baylo">Baylo</option>
                                    <option value="Biao">Biao</option>
                                    <option value="Bincoñgan">Bincoñgan</option>
                                    <option value="Bitaogan">Bitaogan</option>
                                    <option value="Bobon">Bobon</option>
                                    <option value="Bolila">Bolila</option>
                                    <option value="Boston">Boston</option>
                                    <option value="Buclad">Buclad</option>
                                    <option value="Buhangin">Buhangin</option>
                                    <option value="Bukid">Bukid</option>
                                    <option value="Bulacan">Bulacan</option>
                                    <option value="Bungabon">Bungabon</option>
                                    <option value="Butulan">Butulan</option>
                                    <option value="Cabayangan">Cabayangan</option>
                                    <option value="Cabinuangan">Cabinuangan</option>
                                    <option value="Caburan">Caburan</option>
                                    <option value="Cambanugoy">Cambanugoy</option>
                                    <option value="Camudmud">Camudmud</option>
                                    <option value="Caraga">Caraga</option>
                                    <option value="Carmen">Carmen</option>
                                    <option value="Cateel">Cateel</option>
                                    <option value="Cogon">Cogon</option>
                                    <option value="Compostela">Compostela</option>
                                    <option value="Compostela Valley">Compostela Valley</option>
                                    <option value="Concepcion">Concepcion</option>
                                    <option value="Corocotan">Corocotan</option>
                                    <option value="Coronon">Coronon</option>
                                    <option value="Cuambog">Cuambog</option>
                                    <option value="Culaman">Culaman</option>
                                    <option value="Dacudao">Dacudao</option>
                                    <option value="Davan">Davan</option>
                                    <option value="Davao">Davao</option>
                                    <option value="Del Pilar">Del Pilar</option>
                                    <option value="Digos">Digos</option>
                                    <option value="Dolo">Dolo</option>
                                    <option value="Dumlan">Dumlan</option>
                                    <option value="Esperanza">Esperanza</option>
                                    <option value="Gabi">Gabi</option>
                                    <option value="Gabuyan">Gabuyan</option>
                                    <option value="Goma">Goma</option>
                                    <option value="Guihing Proper">Guihing Proper</option>
                                    <option value="Gumalang">Gumalang</option>
                                    <option value="Gupitan">Gupitan</option>
                                    <option value="Hagonoy">Hagonoy</option>
                                    <option value="Hiju, Maco">Hiju, Maco</option>
                                    <option value="Ignit">Ignit</option>
                                    <option value="Ilangay">Ilangay</option>
                                    <option value="Inawayan">Inawayan</option>
                                    <option value="Jovellar">Jovellar</option>
                                    <option value="Kalbay">Kalbay</option>
                                    <option value="Kalian">Kalian</option>
                                    <option value="Kaligutan">Kaligutan</option>
                                    <option value="Kapalong">Kapalong</option>
                                    <option value="Katipunan">Katipunan</option>
                                    <option value="Kiblawan">Kiblawan</option>
                                    <option value="Kinablangan">Kinablangan</option>
                                    <option value="Kinamayan">Kinamayan</option>
                                    <option value="Kinangan">Kinangan</option>
                                    <option value="La Libertad">La Libertad</option>
                                    <option value="La Paz">La Paz</option>
                                    <option value="La Union">La Union</option>
                                    <option value="Lacaron">Lacaron</option>
                                    <option value="Lacson">Lacson</option>
                                    <option value="Lais">Lais</option>
                                    <option value="Lamitan">Lamitan</option>
                                    <option value="Lapuan">Lapuan</option>
                                    <option value="Lasang">Lasang</option>
                                    <option value="Libuganon">Libuganon</option>
                                    <option value="Limao">Limao</option>
                                    <option value="Limot">Limot</option>
                                    <option value="Linao">Linao</option>
                                    <option value="Linoan">Linoan</option>
                                    <option value="Lukatan">Lukatan</option>
                                    <option value="Luna">Luna</option>
                                    <option value="Lungaog">Lungaog</option>
                                    <option value="Lupon">Lupon</option>
                                    <option value="Luzon">Luzon</option>
                                    <option value="Mabini">Mabini</option>
                                    <option value="Mabuhay">Mabuhay</option>
                                    <option value="Maco">Maco</option>
                                    <option value="Maduao">Maduao</option>
                                    <option value="Magatos">Magatos</option>
                                    <option value="Magdug">Magdug</option>
                                    <option value="Magnaga">Magnaga</option>
                                    <option value="Magsaysay">Magsaysay</option>
                                    <option value="Magugpo Poblacion">Magugpo Poblacion</option>
                                    <option value="Mahanob">Mahanob</option>
                                    <option value="Mahayag">Mahayag</option>
                                    <option value="Malagos">Malagos</option>
                                    <option value="Malalag">Malalag</option>
                                    <option value="Malinao">Malinao</option>
                                    <option value="Malita">Malita</option>
                                    <option value="Mambago">Mambago</option>
                                    <option value="Managa">Managa</option>
                                    <option value="Manaloal">Manaloal</option>
                                    <option value="Manat">Manat</option>
                                    <option value="Manay">Manay</option>
                                    <option value="Mangili">Mangili</option>
                                    <option value="Manikling">Manikling</option>
                                    <option value="Matanao">Matanao</option>
                                    <option value="Mati">Mati</option>
                                    <option value="Matiao">Matiao</option>
                                    <option value="Matti">Matti</option>
                                    <option value="Mawab">Mawab</option>
                                    <option value="Mayo">Mayo</option>
                                    <option value="Monkayo">Monkayo</option>
                                    <option value="Montevista">Montevista</option>
                                    <option value="Nabunturan">Nabunturan</option>
                                    <option value="Nangan">Nangan</option>
                                    <option value="Nanyo">Nanyo</option>
                                    <option value="New Baclayon">New Baclayon</option>
                                    <option value="New Bohol">New Bohol</option>
                                    <option value="New Corella">New Corella</option>
                                    <option value="New Leyte">New Leyte</option>
                                    <option value="New Sibonga">New Sibonga</option>
                                    <option value="New Visayas">New Visayas</option>
                                    <option value="Nuing">Nuing</option>
                                    <option value="Padada">Padada</option>
                                    <option value="Pag-asa">Pag-asa</option>
                                    <option value="Pagsabangan">Pagsabangan</option>
                                    <option value="Palma Gil">Palma Gil</option>
                                    <option value="Panabo">Panabo</option>
                                    <option value="Pandasan">Pandasan</option>
                                    <option value="Pangian">Pangian</option>
                                    <option value="Panikian">Panikian</option>
                                    <option value="Pantukan">Pantukan</option>
                                    <option value="Pasian">Pasian</option>
                                    <option value="Pondaguitan">Pondaguitan</option>
                                    <option value="Province of Davao del Norte">Province of Davao del Norte</option>
                                    <option value="Province of Davao del Sur">Province of Davao del Sur</option>
                                    <option value="Province of Davao Oriental">Province of Davao Oriental</option>
                                    <option value="Pung-Pang">Pung-Pang</option>
                                    <option value="Samal">Samal</option>
                                    <option value="Sampao">Sampao</option>
                                    <option value="San Alfonso">San Alfonso</option>
                                    <option value="San Antonio">San Antonio</option>
                                    <option value="San Ignacio">San Ignacio</option>
                                    <option value="San Luis">San Luis</option>
                                    <option value="San Mariano">San Mariano</option>
                                    <option value="San Miguel">San Miguel</option>
                                    <option value="San Pedro">San Pedro</option>
                                    <option value="San Rafael">San Rafael</option>
                                    <option value="San Remigio">San Remigio</option>
                                    <option value="Santa Cruz">Santa Cruz</option>
                                    <option value="Santa Maria">Santa Maria</option>
                                    <option value="Santiago">Santiago</option>
                                    <option value="Santo Niño">Santo Niño</option>
                                    <option value="Sarangani">Sarangani</option>
                                    <option value="Sibulan">Sibulan</option>
                                    <option value="Sigaboy">Sigaboy</option>
                                    <option value="Simod">Simod</option>
                                    <option value="Sinawilan">Sinawilan</option>
                                    <option value="Sinayawan">Sinayawan</option>
                                    <option value="Sirib">Sirib</option>
                                    <option value="Sugal">Sugal</option>
                                    <option value="Sulop">Sulop</option>
                                    <option value="Surup">Surup</option>
                                    <option value="Suz-on">Suz-on</option>
                                    <option value="Tagakpan">Tagakpan</option>
                                    <option value="Tagdanua">Tagdanua</option>
                                    <option value="Tagnanan">Tagnanan</option>
                                    <option value="Takub">Takub</option>
                                    <option value="Talagutong">Talagutong</option>
                                    <option value="Talisay">Talisay</option>
                                    <option value="Talomo">Talomo</option>
                                    <option value="Tamayong">Tamayong</option>
                                    <option value="Tambo">Tambo</option>
                                    <option value="Tamisan">Tamisan</option>
                                    <option value="Tamugan">Tamugan</option>
                                    <option value="Tanlad">Tanlad</option>
                                    <option value="Tapia">Tapia</option>
                                    <option value="Tarragona">Tarragona</option>
                                    <option value="Tawan tawan">Tawan tawan</option>
                                    <option value="Taytayan">Taytayan</option>
                                    <option value="Tibagon">Tibagon</option>
                                    <option value="Tibanbang">Tibanbang</option>
                                    <option value="Tiblawan">Tiblawan</option>
                                    <option value="Tombongon">Tombongon</option>
                                    <option value="Tubalan">Tubalan</option>
                                    <option value="Tuban">Tuban</option>
                                    <option value="Tubod">Tubod</option>
                                    <option value="Tuganay">Tuganay</option>
                                    <option value="Tuli">Tuli</option>
                                    <option value="Ula">Ula</option>
                                    <option value="Wañgan">Wañgan</option>
                                    <option value="Wines">Wines</option>
                                </select>
                            </div>

                            </div>
                            <div class="control-payments custom-radio">
                                <input id="overcounter" name="payments" type="radio" class="custom-control-input" value="Cash over the counter" checked>                                
                                <label class="custom-control-label" for="overcounter">Cash over the counter</label>
                                <p>Payment through main office</p>
                            </div>

                            <div class="control-payments custom-radio">
                              <input id="Gcash" name="payments" type="radio" class="custom-control-input" value="Gcash">
                              <label class="custom-control-label" for="Gcash">Gcash - 09483969466 or 09369610882</label>
                              <p>Send thru gcash, once paid attach receipt</p>
                            </div>
                           
                            

                          </div>
                          
                    </div>

                    <div id="gcashForm" style="display: none;">

                        <label for="attachedPayments">Upload Image:</label>
                        <input type="file" name="attachedPayments" accept="image/*">
                        
                        @error('attachedPayments')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      
                    </div>
                   
                   
                    <hr class="mb-4">
                 
                    <button type="submit">Complete Purchase</button>
                </form>
            </div>
        </div>
    </div>

   


    

        



      
    </div>

   

@endsection


   
