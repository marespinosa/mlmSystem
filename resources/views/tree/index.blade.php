
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

                            <div class="userTree" style="background:#ddd">
                                <img src="{{ asset('images/favicon.png') }}" alt="{{ $otherUser->name }}">

                            <span>{{ $otherUser->name }} {{ $otherUser->lastname }}<br />
                            <b>Sponsor Id:</b> {{ $otherUser->generatedId }}</span>
                            </div> <!--- main head---->

         @if (isset($downlineUsers['level1']) && $downlineUsers['level1']->count() > 0)

         @foreach ($downlineUsers['level1'] as $level1User)

             @if (isset($downlineUsers['level2'][$level1User->generatedId]) && count($downlineUsers['level2'][$level1User->generatedId]) > 0)
          
            <ul>

                @foreach ($downlineUsers['level2'][$level1User->generatedId] as $level2User)
                <li>
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



                            @endforeach

                        </ul>
                    
                        @else
                         <p>No level 1 downline users found.</p>
                        @endif


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