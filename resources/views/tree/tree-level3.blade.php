
<ul class="nested">
@if (isset($downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId]) && count($downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId]) > 0) 
    
@foreach ($downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId] as $level3User)
   
    <li>
            <div class="userTree caret">
                <small style="color: #68BB59;">Level: 3</small>
                <h6>{{ $level3User->name }} {{ $level3User->lastname }}</h6>
                <p><b>Sponsor Id:</b> <input type="text" value="{{ $level3User->generatedId }}" placeholder="{{ $level3User->generatedId }}"></p>
            

            </div>

            


            @include('tree.tree-level4')



        @endforeach



    </li>
        
        @else
                <li class="userTree caret">No level 3 downline users found.</li>
    
        @endif

    

</ul>

    