
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
                    <small style="color: #68BB59;">Level: 1</small>
                    <h6>{{ $downlineUsers['user']->name }} {{ $downlineUsers['user']->lastname }}</h6>
                    <p><b>Sponsor Id:</b> <input type="text" value="{{ $downlineUsers['user']->generatedId }}" placeholder="{{ $downlineUsers['user']->generatedId }}"></p>
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