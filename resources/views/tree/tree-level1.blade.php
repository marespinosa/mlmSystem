@php
$counter = 0; 
@endphp

<div >
    <ul id="myUL">
        @if (isset($downlineUsers['level1']) && $downlineUsers['level1']->count() > 0)
            @foreach ($downlineUsers['level1'] as $level1User)
                @php
                $counter++;
                $tabId = 'tab' . $counter; // Increment the tab ID
                $collapseId = 'collapse' . $counter; // Increment the collapse ID
                @endphp

                  <li><span class="caret">
                        <div class="userTree">
                            @if (auth()->user()->profile_picture)
                                <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Profile Picture" width="80" class="text-align">
                            @else
                                <img src="{{ asset('images/favicon.png') }}" alt="{{ $user->name }}" width="80" class="text-align"/>
                            @endif
                            {{ $level1User->name }} {{ $level1User->lastname }} <br />
                            <b>Sponsor Id:</b> {{ $level1User->generatedId }}
                        </div>

                    </span>
                
                    <ul>


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
                   
                   <li>  <span class="caret">                           
                      <div class="userTree level2">

                        @if($level2User->profile_picture)
                            <img src="{{ asset($level2User->profile_picture) }}" alt="Profile Picture" width="80">
                        @else
                            <img src="{{ asset('images/favicon.png') }}" alt="{{ $level2User->name }}" width="80" />
                        @endif

                            <h6> {{ $level2User->name }} {{ $level2User->lastname }} </h6>
                            <b>Sponsor Id:</b> {{ $level2User->generatedId }}
                        </span>

                        </div>

                        
                        @include('tree.tree-level3')

                
                </li>


                    @endforeach


                    </ul>
                   

                    @else
                    <p>No level 2 downline users found.</p>
                    @endif
                

                
                </li>
            @endforeach
        @else
            <p>No level 1 downline users found.</p>
        @endif
    </ul>

</div>