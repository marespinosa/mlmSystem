
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

    

    
      <div id="treeData" class="tree">
       
            <div class="userTree">
                @if(auth()->user()->profile_picture)
                <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Profile Picture">
                @else
                <img src="{{ asset('images/favicon.png') }}" alt="{{ $user->name }}" />
        
                @endif
        
                {{ $user->name }} {{ $user->lastname }} <br />
                <b>Sponsor Id:</b> {{ $user->generatedId }}
        
            </div>

            <div class="accordion accordion-flush" id="accordionFlushExample">
                @include('tree.tree-level1')
             </div>

            </div>
        </div>
    </div>
           
@endsection

