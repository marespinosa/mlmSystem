@php
$counter = 0; 
@endphp


        @php
        $counter = 0; // Reset the counter
        @endphp
        @if (isset($downlineUsers['level1']) && $downlineUsers['level1']->count() > 0)
            @foreach ($downlineUsers['level1'] as $level1User)
                @php
                $counter++;
                $tabId = 'tab' . $counter; // Increment the tab ID
                $collapseId = 'collapse' . $counter; // Increment the collapse ID
                $toggleTab = 'toggleTab' . $counter; // Increment the collapse ID
                $heading = 'heading' . $counter; // Increment the collapse ID


                @endphp

              
                                @if (isset($downlineUsers['level2'][$level1User->generatedId]) && count($downlineUsers['level2'][$level1User->generatedId]) > 0)
                
                                @php
                                $tabCounter = 0; 
                                @endphp

                                @foreach ($downlineUsers['level2'][$level1User->generatedId] as $level2User)
                                
                                @php
                                    $tabCounter++;
                                    $collapseId = 'collapse' . $tabCounter; 
                                    $heading = 'heading' . $tabCounter; 
                                @endphp
                                                            
                                <div class="level2-wrapper">
                                    <div class="userTree level2" onclick="toggleContent({{ $tabCounter }})">

                                    @if($level2User->profile_picture)
                                        <img src="{{ asset($level2User->profile_picture) }}" alt="Profile Picture" width="80">
                                    @else
                                        <img src="{{ asset('images/favicon.png') }}" alt="{{ $level2User->name }}" width="80" />
                                    @endif

                                        <h6> {{ $level2User->name }} {{ $level2User->lastname }} </h6>
                                            <b>Sponsor Id:</b> {{ $level2User->generatedId }}
                                    </div>

                                    @include('tree.tree-level3')


                                </div>


                                @endforeach

                               

                                @else
                                <p>No level 2 downline users found.</p>
                                @endif
            @endforeach
        @endif
            