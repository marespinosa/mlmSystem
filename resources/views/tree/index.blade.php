
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

    <div class="tree">
        <ul>
         <li>

        <div class="userTree">
        @if(auth()->user()->profile_picture)
        <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Profile Picture">
        @else
        <img src="{{ asset('images/favicon.png') }}" alt="{{ $user->name }}" />

        @endif

        {{ $user->name }} {{ $user->lastname }} <br />
        <b>Sponsor Id:</b> {{ $user->generatedId }}

        </div>

            @if ($sponsor)
                @php
                    $otherUsers = \App\Models\User::where('sponsor_id_number', $user->generatedId)
                                            ->where('id', '!=', $user->id)
                                            ->get();
                                            
                @endphp

                @if ($otherUsers->count() > 0)
                    <ul>
                        @foreach ($otherUsers as $otherUser)
                        <li> 

                            <div class="userTree">
                                <img src="{{ asset('images/favicon.png') }}" alt="{{ $otherUser->name }}">
                                <span>{{ $otherUser->name }} {{ $otherUser->lastname }}<br />
                                <b>Sponsor Id:</b> {{ $otherUser->generatedId }}</span>
                            </div>

                            @include('tree.tree-level1')

                        </li>
                        @endforeach
                    </ul>
                @else
                    <p>No other users found with the same Sponsor ID</p>
                @endif

            @else
                <p>No Sponsor Assigned</p>
            @endif
    
      
  



     
  <!-----end content ---->
            </div>
        </div>
    </div>
</div>
    
               
@endsection