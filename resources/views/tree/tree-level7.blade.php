
<ul class="nested">  
    @if (isset($downlineUsers['level7'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId][$level5User->generatedId][$level6User->generatedId]) && count($downlineUsers['level7'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId][$level5User->generatedId][$level6User->generatedId]) > 0) 
    @foreach ($downlineUsers['level7'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId][$level5User->generatedId][$level6User->generatedId] as $level7User)
       
        <li>
            <div class="userTree caret">
                <small style="color: #68BB59;">Level: 7</small>
                <h6>{{ $level7User->name }} {{ $level7User->lastname }}</h6>
                <p><b>Sponsor Id:</b> <input type="text" value="{{ $level7User->generatedId }}" placeholder="{{ $level7User->generatedId }}"></p>
            
            </div>
     
            @endforeach
    
        </li>
            
            @else
                    <li class="userTree caret">No level 7 downline users found.</li>
        
            @endif
    
        
    
    </ul>
    
        