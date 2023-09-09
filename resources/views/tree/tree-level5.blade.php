
<ul class="nested">
@if (isset($downlineUsers['level5'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId]) && count($downlineUsers['level5'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId]) > 0) 
@foreach ($downlineUsers['level5'][$level1User->generatedId][$level2User->generatedId][$level3User->generatedId][$level4User->generatedId] as $level5User)
   
    <li>
        <div class="userTree caret">
            <small><b style="color: #68BB59;">Level: 5</b></small>
            <h6><b>{{ $level5User->name }} {{ $level5User->lastname }}</b> </h6>
            <b>Sponsored Id:</b> {{ $level5User->generatedId }}</p>
        </div>

        @endforeach

    </li>
        
        @else
                <li class="userTree caret">No level 4 downline users found.</li>
    
        @endif

    

</ul>

    