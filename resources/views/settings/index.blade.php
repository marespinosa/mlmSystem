
@php
    $pageTitle = 'HBWW International - Settings';
    $WelcomeNote = 'Settings';
    $alignment = 'alignleft';
    $user = auth()->user();
@endphp

@extends('admin.layouts')


@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    <div class="container-fluid">   
                
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10 col-xl-8 mx-auto">

                    @include('admin.title')

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                        {{ $message }}
                        </div>
                    @else
                        <div class="alert alert-success">
                               <p> Your Sponsor ID is: {{ $user->generatedId }} </p>
                        </div>       
                    @endif

                    <h5 class="my-3">Upload Image</h5>

                    @if(auth()->user()->profile_picture)

                        <!----- 
                        <img src="{{ asset('public/' . auth()->user()->profile_picture) }}" alt="Profile Picture">     
                        ------>
                        
						<img src="{{ asset( auth()->user()->profile_picture) }}" alt="Profile Picture" width="100"> 
                    @else
                        <img src="{{ asset('images/favicon.png') }}" alt="{{ $user->name }}"  class="rounded-circle img-fluid" style="width: 150px;">
                    @endif              
                                    
                    <form method="POST" action="{{ route('update.profiles',['id' => $user->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <label for="profile_picture">Profile Picture:</label>
                        <input type="file" name="profile_picture" id="profilePic" accept="image/*">
                        <button type="submit">Upload</button>
                    </form>
                
                
                    <hr class="my-4" />  
                    
                    <form action="{{ url('settings/'.$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                        
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="firstname">Firstname</label>
                    <input type="text" id="firstname"  class="form-control" name="name" value="{{ $user->name }}" />
                </div>
                <div class="form-group col-md-6">
                    <label for="lastname">Lastname</label>
                    <input type="text" id="lastname" class="form-control" name="lastname" value="{{ $user->lastname }}" />
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4"  name="email" value="{{ $user->email }}" />
            </div>
            <div class="form-group">
                <label for="inputAddress5">Address</label>
                <input type="text" class="form-control" id="inputAddress5" name="presentAddress" value="{{ $user->presentAddress }}" />
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <input type="text" id="status"  class="form-control" name="status" value="{{ $user->status }}" />
                </div>
                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <input type="text" id="gender" class="form-control" name="gender" value="{{ $user->gender }}" />
                </div>
            </div>

           


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="birthday">Birthday:</label>
                    <input type="text" id="birthday"  class="form-control" name="birthday"  value="{{ $user->birthday }}" />
                </div>
                <div class="form-group col-md-6">
                    <label for="nationality">Nationality</label>
                    <input type="text" id="nationality" class="form-control" name="nationality" value="{{ $user->nationality }}" />
                </div>
            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCompany5">Company</label>
                    <input type="text" class="form-control" id="inputCompany5" name="company" value="{{ $user->company }}" />
                </div>

                <div class="form-group col-md-6">
                    <label for="phoneNumber">PhoneNumber</label>
                    <input type="text" class="form-control" id="phoneNumber"  name="phoneNumber" value="{{ $user->phoneNumber }}">
                </div>
            </div>

        
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputZip5">Zip</label>
                    <input type="text" class="form-control" id="inputZip5" name="zipcode" value="{{ $user->zipcode }}"  />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputState5">City</label>
                    <select id="city" name="city"  id="inputState5" class="form-control">
                        <option value="{{ $user->city }}">{{ $user->city }}</option>
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


            <div class="p-btn text-center">
                <button type="submit" class="btn btn-primary btn-xl rounded-pill mt-5" id="myButton">Update Settings</button>
                
            </div>

        </form>



            <hr class="my-4" />
                <h5 class="my-3">Change Password</h5>
            <div class="row mb-4">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('changePassword') }}">

                        @csrf

                        <div class="form-group row margin-bottom">
                            <label for="old_password" class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                            <div class="col-md-6">
                                <input id="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" name="old_password" required autofocus>

                                @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row margin-bottom">
                            <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>

                                @if ($errors->has('new_password'))
                                    <div class="alert alert-danger">
                                        @if ($errors->first('new_password') == 'The new password format is invalid.')
                                            The new password cannot contain spaces.
                                        @else
                                            {{ $errors->first('new_password') }}
                                        @endif
                                    </div>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                            <div class="col-md-6">
                                <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4"></div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-xl rounded-pill" id="myButton">
                                    {{ __('Save Password') }}
                                </button>
                            </div>
                        </div>  
                    </form>
                </div>
                <div class="col-md-6">
                    @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @elseif (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    
                
                 
                    <p class="mb-2">Password requirements</p>
                    <p class="small text-muted mb-2">To create a new password, you have to meet all of the following requirements:</p>
                    <ul class="small text-muted pl-4 mb-0">
                        <li>Minimum 8 character</li>
                        <li>At least one special character</li>
                        <li>At least one number</li>
                        <li>Can't be the same as a previous password</li>
                    </ul>
                </div>
            </div>

            

                

                </div>
            </div>
    </div>



</div>
        


    


            </div>
        </div>
    </div>
</div>
    
               
@endsection


