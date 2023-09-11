@php
$counter = 0; 
@endphp

<div class="easy-tree" >
    <ul id="myTree">
        @if (isset($downlineUsers['level1']) && $downlineUsers['level1']->count() > 0)
            @foreach ($downlineUsers['level1'] as $level1User)
                @php
                $counter++;
                $tabId = 'tab' . $counter; // Increment the tab ID
                $collapseId = 'collapse' . $counter; // Increment the collapse ID
                @endphp

                  <li>
                        <div class="userTree caret">
                            <small style="color: #68BB59;">Level: 1</small>
                            <img src="{{ asset($level1User->profile_picture) }}" alt="Profile Picture" width="80" class="text-align">

                            <h6>{{ $level1User->name }} {{ $level1User->lastname }}</h6>
                            <p><b>Sponsor Id:</b> <input type="text" value="{{ $level1User->generatedId }}" placeholder="{{ $level1User->generatedId }}"></p>
            
                        </div>
                
                    <ul class="nested">


                    @if (isset($downlineUsers['level2'][$level1User->generatedId]) && count($downlineUsers['level2'][$level1User->generatedId]) > 0)
        

                    @php
                    $tabCounter = 0;
                    @endphp

                    @foreach ($downlineUsers['level2'][$level1User->generatedId] as $level2User)
                    
                    @php
                    $tabCounter++;
                    $collapseId = 'collapse' . $tabCounter; // Increment the collapse ID
                    $heading = 'heading' . $tabCounter; // Increment the collapse ID
                    $level3 = 'level3' . $tabCounter; 

                    @endphp
                   
                   <li>                           

                        <div class="userTree caret">
                            <small style="color: #68BB59;">Level: 2</small>
                            <h6>{{ $level2User->name }} {{ $level2User->lastname }}</h6>
                            <p><b>Sponsor Id:</b> <input type="text" value="{{ $level2User->generatedId }}" placeholder="{{ $level2User->generatedId }}"></p>
            
                        </div>

                        
                        @include('tree.tree-level3')

                
                </li>


                    @endforeach


                    </ul>
                   

                    @else
                    <li class="userTree caret">No level 2 downline users found.</li>
                    @endif
                

                
                </li>
            @endforeach
        @else
            <li class="userTree caret">No level 1 downline users found.</li>
        @endif
    </ul>

</div>