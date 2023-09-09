
<ul class="nested">
@if (isset($downlineUsers['level4'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId]) && count($downlineUsers['level4'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId]) > 0) 
    
@foreach ($downlineUsers['level4'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId] as $level4User)
   
    <li>
            <div class="userTree caret">
            @if($level4User->profile_picture)
                    <img src="{{ asset($level4User->profile_picture) }}" alt="Profile Picture" width="80">
                @else
                    <img src="{{ asset('images/favicon.png') }}" alt="{{ $level4User->name }}" width="80" />
                @endif
                <p>{{ $level4User->name }} <br />
                <b>Sponsored Id:</b> {{ $level4User->generatedId }}</p>
            </div>

            

        @endforeach



    </li>
        
        @else
                <li class="userTree caret">No level 4 downline users found.</li>
    
        @endif

    

</ul>

    