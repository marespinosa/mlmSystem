
<ul class="nested">  
    @if (isset($downlineUsers['level8'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId][$level5User->generatedId][$level6User->generatedId][$level7User->generatedId]) && count($downlineUsers['level8'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId][$level5User->generatedId][$level6User->generatedId][$level7User->generatedId]) > 0) 
    @foreach ($downlineUsers['level8'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId][$level5User->generatedId][$level6User->generatedId][$level7User->generatedId] as $level8User)
       
        <li>
            <div class="userTree caret">
                <small style="color: #68BB59;">Level: 8</small>
                <h6>{{ $level8User->name }} {{ $level8User->lastname }}</h6>
                <p><b>Sponsor Id:</b> <input type="text" value="{{ $level8User->generatedId }}" placeholder="{{ $level8User->generatedId }}"></p>
            
            </div>
     
            @endforeach
    
        </li>
            
            @else
                    <li class="userTree caret">No level 8 downline users found.</li>
        
            @endif
    
        
    
    </ul>
    
        