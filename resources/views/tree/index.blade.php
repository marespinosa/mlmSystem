
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
                    <p>
                        @php
                        $lastLevelWithMember = null;
                    @endphp
                    
                    @foreach ($downlineUsers['bonuses'] as $level => $bonus)
                        @if ($bonus > 0)
                            @php
                                $lastLevelWithMember = $level;
                            @endphp
                        @endif
                    @endforeach
                    
                    @if ($lastLevelWithMember !== null)
                    <strong><span>You Reached Level: {{ $lastLevelWithMember }} </strong></span>
                    @else
                        <span>No members found in any level.</span>
                    @endif
                    
                    
                    <a href="/profile" target="_blank">| More Details </a>
                    </p>
                    <small><strong>Monthly Sales:</strong>
                        
                    <a href="/profile">| More </a>
                    </small><br />
                    <small><strong>Renewal Amount:</strong>
                       
                    <a href="/profile">| More </a>
                    </small><br />
                    <small> <strong>Status: </strong>
                    <a href="/profile">| More </a>
                    </small><br />
                  
            
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