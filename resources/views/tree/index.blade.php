
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


        <ul>

            <li data-jstree='{ "opened" : true }'>
    
            @if (isset($downlineUsers['level1']) && $downlineUsers['level1']->count() > 0)
    
            @foreach ($downlineUsers['level1'] as $level1User)
    
            <div class="userTree">
    
                @if(auth()->user()->profile_picture)
                <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Profile Picture">
                @else
                <img src="{{ asset('images/favicon.png') }}" alt="{{ $user->name }}" />
        
                @endif
    
                {{ $level1User->name }} {{ $level1User->lastname }} <br />
                <b>Sponsor Id:</b> {{ $level1User->generatedId }}
               
            </div> <!---- 1st level ---->
    
                @if (isset($downlineUsers['level2'][$level1User->generatedId]) && count($downlineUsers['level2'][$level1User->generatedId]) > 0)
              
                <ul>
    
                    @foreach ($downlineUsers['level2'][$level1User->generatedId] as $level2User)
                    <li data-jstree='{ "selected" : true }'>
                        <div class="userTree">
                            @if($level2User->profile_picture)
                            <img src="{{ asset($level2User->profile_picture) }}" alt="Profile Picture">
                            @else
                                <img src="{{ asset('images/favicon.png') }}" alt="{{ $level2User->name }}" />
                            @endif
    
                            {{ $level2User->name }} {{ $level2User->lastname }} <br />
                            <b>Sponsor Id:</b> {{ $level2User->generatedId }}
                        </div>
    
                        <ul>
                           
                            @if (isset($downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId]) && count($downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId]) > 0)
                            <li>    
                                @foreach ($downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId] as $level3User)
                                <div class="userTree">
                                    @if($level2User->profile_picture)
                                    <img src="{{ asset($level3User->profile_picture) }}" alt="Profile Picture">
                                    @else
                                        <img src="{{ asset('images/favicon.png') }}" alt="{{ $level3User->name }}" />
                                    @endif
                                    <p>Name: {{ $level3User->name }}</p>
                                    <p>Sponsored Id: {{ $level3User->generatedId }}</p>
                                </div>
                                @endforeach
    
                                @else
                                 <p>No level 3 downline users found.</p>
                                 @endif
    
                            </li>
                           
    
                        </ul>
                    
    
                    </li>
    
                    @endforeach
    
                        @else
                        <p>No level 2 downline users found.</p>
                    @endif
    
                </ul> <!--- 2nd level --->
    
               
            </li>
    
            
            @endforeach
    
        </ul>
    
        @else
         <p>No level 1 downline users found.</p>
        @endif
    


	
	</div>





     
  <!-----end content ---->
            </div>
        </div>
    </div>
</div>


@endsection