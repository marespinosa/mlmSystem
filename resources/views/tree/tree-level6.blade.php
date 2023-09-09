
<ul class="nested">
    @if (isset($downlineUsers['level6'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId][$level5User->generatedId]) && count($downlineUsers['level6'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId][$level5User->generatedId]) > 0) 
    
    @foreach ($downlineUsers['level6'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId][$level5User->generatedId] as $level6User)
       
        <li>
            <div class="userTree caret">
                <small style="color: #68BB59;">Level: 6</small>
                <h6>{{ $level6User->name }} {{ $level6User->lastname }}</h6>
                <b>Sponsored Id:</b> {{ $level6User->generatedId }}</p>
            </div>
    
            @endforeach
    
        </li>
            
            @else
                    <li class="userTree caret">No level 4 downline users found.</li>
        
            @endif
    
        
    
    </ul>
    
        