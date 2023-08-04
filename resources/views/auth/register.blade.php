@php
    $pageTitle = 'HBWW International - Register';
    $WelcomeNote = 'Create Your Account';
@endphp


@extends('auth.layouts')

@section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create Your Account</h1>
                        </div>

                        <form action="{{ route('store') }}" method="post" class="user">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 ">
                                    <input type="text"  class="form-control form-control-user @error('name') is-invalid @enderror" id="name"  name="name" value="{{ old('name') }}" placeholder="First Name" required />
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <input type="text"  class="form-control form-control-user @error('lastname') is-invalid @enderror" id="lastname" name="lastname" value="{{ old('lastname') }}" placeholder="Last Name"  required />
                                    @if ($errors->has('lastname'))
                                        <span class="text-danger">{{ $errors->first('lastname') }}</span>
                                    @endif
                                </div>
                            </div>

                       
                            <div class="form-group row ">

                            <div class="col-sm-6 mb-3">
                           
                                <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror" id="username"  name="username" value="{{ old('username') }}" placeholder="Username" required />
                                @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif

                           

                         </div>

                            <div class="col-sm-6">
                                <select name="userlevel" class="border-raduis">
                                    <option value="Member">Type Membership</option>
                                    <option value="Member">Member</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Stockies">Stockies</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group width97">
                                                       <input type="email" class="form-control form-control-user" id="email" name="email" value="{{ old('email') }}" placeholder="Email" />
                        </div>

                        <div class="form-group row width97">
                                <input type="text" class="form-control form-control-user @error('presentAddress') is-invalid @enderror" id="presentAddress" name="presentAddress" placeholder="Present Address"  />
                                @if ($errors->has('presentAddress'))
                                    <span class="text-danger">{{ $errors->first('presentAddress') }}</span>
                                @endif
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <label class="padding-left">Birthday</label>
                                <input type="date"  class="form-control form-control-user @error('birthday') is-invalid @enderror" id="birthday"  name="birthday" value="{{ old('birthday') }}" />
                                    @if ($errors->has('birthday'))
                                        <span class="text-danger">{{ $errors->first('birthday') }}</span>
                                    @endif
                            </div>
                            <div class="col-sm-6">
                                <label class="padding-left">Status</label>
                                <select name="status" class="border-raduis">
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <select name="gender" class="border-raduis">
                                    <option selected>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text"  class="form-control form-control-user @error('nationality') is-invalid @enderror" id="nationality"  name="nationality" value="{{ old('nationality') }}" placeholder="Nationality" />
                                    @if ($errors->has('nationality'))
                                        <span class="text-danger">{{ $errors->first('nationality') }}</span>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <input type="text"  class="form-control form-control-user @error('sponsor_id_number') is-invalid @enderror" id="sponsor_id_number"  name="sponsor_id_number" value="{{ old('sponsor_id_number') }}" placeholder="Sponsor Id Number" />
                                @if ($errors->has('sponsor_id_number'))
                                    <span class="text-danger">{{ $errors->first('sponsor_id_number') }}</span>
                                @endif
                            </div>
                            <div class="col-sm-6">
                                <input type="text"  class="form-control form-control-user @error('phoneNumber') is-invalid @enderror" id="phoneNumber"  name="phoneNumber" value="{{ old('phoneNumber') }}" placeholder="Phone Number" />
                                @if ($errors->has('phoneNumber'))
                                    <span class="text-danger">{{ $errors->first('phoneNumber') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6 mb-3">
                                <input type="password" class="m-g-btm form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password"  />
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif

                            
                                <input type="password" class="form-control form-control-user" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" />
                            

                            </div>
                            <div class="col-md-6 alignleft m-g-btm">
                                <p class="mb-2">Password requirements</p>
                                <p class="small text-muted mb-2">To create a new password, you have to meet all of the following requirements:</p>
                                <ul class="small text-muted pl-4 mb-0">
                                    <li>Minimum 8 character</li>
                                    <li>At least one special character</li>
                                    <li>At least one number</li>
                                    <li>Can’t be the same as a previous password</li>
                                </ul>
                            </div>
                        </div>

                        <input type="hidden" name="acountStatus" value="deactivate" />
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Register" />
                        </form>

                        <hr>

    <div class="text-center">
        <a class="small" href="forgot-password">Forgot Password?</a>
     </div>
    <div class="text-center">
        <a class="small" href="index">Already have an account? Login!</a>
    </div>
   
                       
@endsection

 

