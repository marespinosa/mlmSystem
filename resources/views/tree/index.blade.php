
@php
    $pageTitle = 'HBWW International - Tree';
    $WelcomeNote = 'My Tree';
    $alignment = 'aligncenter';
@endphp

@extends('tree.layouts')

@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    @include('tree.sub-content')


      <div class="tree">
            <div class="mainheadTree">
                @if(auth()->user()->profile_picture)
                <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Profile Picture" width="80">
                @else
                <img src="{{ asset('images/favicon.png') }}" alt="{{ $user->name }}" width="80" />
        
                @endif
        
               {{ $user->name }} {{ $user->lastname }} <br />
                <b>Sponsor Id:</b> {{ $user->generatedId }}
        
            </div>

            @include('tree.tree-level1')

        </div>




    @endsection

    </div>

</div>