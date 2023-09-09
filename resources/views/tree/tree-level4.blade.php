
<ul class="nested">
@if (isset($downlineUsers['level4'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId]) && count($downlineUsers['level4'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId]) > 0) 
    
@foreach ($downlineUsers['level4'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId] as $level4User)
   
    <li>
            <div class="userTree caret">
                <small style="color: #68BB59;">Level: 4</small>
                <h6>{{ $level4User->name }} {{ $level4User->lastname }}</h6>
                <b>Sponsored Id:</b> {{ $level4User->generatedId }}</p>
            </div>

        @endforeach
    </li>
        
        @else
                <li class="userTree caret">No level 4 downline users found.</li>
    
        @endif

    

</ul>

    