
<ul class="nested">
@if (isset($downlineUsers['level5'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId]) && count($downlineUsers['level5'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId]) > 0) 
@foreach ($downlineUsers['level5'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId] as $level5User)
   
    <li>
        <div class="userTree caret">
            <small style="color: #68BB59;">Level: 5</small>
            <h6>{{ $level5User->name }} {{ $level5User->lastname }}</h6>
            <p><b>Sponsor Id:</b> <input type="text" value="{{ $level5User->generatedId }}" placeholder="{{ $level5User->generatedId }}"></p>
            
        </div>

        @endforeach

    </li>
        
        @else
                <li class="userTree caret">No level 4 downline users found.</li>
    
        @endif

    

</ul>

    