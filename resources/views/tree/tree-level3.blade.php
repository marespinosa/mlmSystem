
<ul class="nested">
@if (isset($downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId]) && count($downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId]) > 0) 
    
@foreach ($downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId] as $level3User)
   
    <li>
            <div class="userTree caret">
            @if($level3User->profile_picture)
                    <img src="{{ asset($level3User->profile_picture) }}" alt="Profile Picture" width="80">
                @else
                    <img src="{{ asset('images/favicon.png') }}" alt="{{ $level3User->name }}" width="80" />
                @endif
                <p>{{ $level3User->name }} <br />
                <b>Sponsored Id:</b> {{ $level3User->generatedId }}</p>
            </div>
        @endforeach

    </li>
        
        @else
                <li>No level 3 downline users found.</li>
    
        @endif

    

</ul>

    