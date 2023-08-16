
@php
    $pageTitle = 'HBWW International - Tree';
    $WelcomeNote = 'My Tree';
    $alignment = 'aligncenter';
@endphp

@extends('admin.layouts')


@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    @include('tree.sub-content')

    <div class="tree">
        <ul>
         <li>
         
        @if(auth()->user()->profile_picture)
        <a href="#">
            <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Profile Picture"></a>
        @else
        <a href="#"><img src="{{ asset('images/favicon.png') }}" alt="{{ $user->name }}">
        <span>{{ $user->name }} {{ $user->lastname }} <br /><b>Sponsor Id:</b> {{ $user->generatedId }}</span></a>
       
        @endif

            @if ($sponsor)
                @php
                    $otherUsers = \App\Models\User::where('sponsor_id_number', $user->generatedId)
                                            ->where('id', '!=', $user->id)
                                            ->get();
                @endphp

                @if ($otherUsers->count() > 0)
                    <ul>
                        @foreach ($otherUsers as $otherUser)
                        <li> <a href="#"><img src="{{ asset('images/favicon.png') }}" alt="{{ $otherUser->name }}">

                            <span>{{ $otherUser->name }} {{ $otherUser->lastname }}<br />
                            <b>Sponsor Id:</b> {{ $otherUser->generatedId }}</span>
                        </a>
                            
                        </li>
                        @endforeach
                    </ul>
                @else
                    <p>No other users found with the same Sponsor ID</p>
                @endif

            @else
                <p>No Sponsor Assigned</p>
            @endif

         </li>
       </ul>
    </div>





     
  <!-----end content ---->
            </div>
        </div>
    </div>
</div>
    
               
@endsection


