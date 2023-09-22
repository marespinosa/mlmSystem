
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
            <div class="mainheadTree caret">
                <img src="{{ asset($downlineUsers['user']->profile_picture) }}" alt="Profile Picture" width="80" class="text-align rounded-circle">
                    <h6>{{ $downlineUsers['user']->name }} {{ $downlineUsers['user']->lastname }}</h6>
                    <p><b>Sponsor Id:</b> <input type="text" value="{{ $downlineUsers['user']->generatedId }}" placeholder="{{ $downlineUsers['user']->generatedId }}"></p>
                    <small><b>Account Status: {{ $downlineUsers['user']->acountStatus }}</b></small><br />
                    <small><b>Sales Report:</b></small> <br />
                   <p>Bonuses</p>
                    @foreach ($downlineUsers['bonuses'] as $level => $bonus)
                    <p><small><strong>Level {{ $level }} </strong> Php {{ $bonus }}</small></p>
                    @endforeach

                </div>
                
                <div id="myTree" class="easy-tree">
                            @if (!empty($downlineUsers['downline']))
                            @include('tree.tree-level', ['level' => $downlineUsers])    
                            @endif
                </div>
        
    
            </div>





    @endsection

    </div>

</div>