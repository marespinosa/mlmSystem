
<ul class="nested">
@if (isset($downlineUsers['level4'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId]) && count($downlineUsers['level4'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId]) > 0) 
    
@foreach ($downlineUsers['level4'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId] as $level4User)
   
    <li>
            <div class="userTree caret">
                <small style="color: #68BB59;">Level: 4</small>
                <img src="{{ asset($level4User->profile_picture) }}" alt="Profile Picture" width="80" class="text-align">
                <h6>{{ $level4User->name }} {{ $level4User->lastname }}</h6>
                <small><b>Sponsor Id:</b> <input type="text" value="{{ $level4User->generatedId }}" placeholder="{{ $level4User->generatedId }}"></small>
            
            </div>

        @endforeach
    </li>
        
        @else
                <li class="userTree caret">No level 4 downline users found.</li>
    
        @endif

    

</ul>

    