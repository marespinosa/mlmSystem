
@php
$counter = 1;

function numberToWords($number) {
    $words = ["One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten"];
    if ($number >= 1 && $number <= count($words)) {
        return $words[$number - 1];
    } else {
        return $number;
    }
}


@endphp


@if (isset($downlineUsers['level1']) && $downlineUsers['level1']->count() > 0)

@foreach ($downlineUsers['level1'] as $level1User)

    @php
    $counter++;
    $uniqueID = 'flush-collapse' . numberToWords($counter);
    @endphp

     <div class="accordion-item">
         <div class="accordion-header userTree" id="flush-headingOne">  
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $uniqueID }}" aria-expanded="false">
                      
            @if(auth()->user()->profile_picture)
                        <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Profile Picture">
                        @else
                        <img src="{{ asset('images/favicon.png') }}" alt="{{ $user->name }}" />
                
                        @endif

                        {{ $level1User->name }} {{ $level1User->lastname }} <br />
                        <b>Sponsor Id:</b> {{ $level1User->generatedId }}
                            </button>
            </div>

   

        <div id="{{ $uniqueID }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">

                @if (isset($downlineUsers['level2'][$level1User->generatedId]) && count($downlineUsers['level2'][$level1User->generatedId]) > 0)
                
                @foreach ($downlineUsers['level2'][$level1User->generatedId] as $level2User)
                    
    
                            <div class="userTree">
                                @if($level2User->profile_picture)
                                <img src="{{ asset($level2User->profile_picture) }}" alt="Profile Picture">
                                @else
                                    <img src="{{ asset('images/favicon.png') }}" alt="{{ $level2User->name }}" />
                                @endif

                                {{ $level2User->name }} {{ $level2User->lastname }} <br />
                                <b>Sponsor Id:</b> {{ $level2User->generatedId }}
                            </div>

                            <ul>
                            
                                @if (isset($downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId]) && count($downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId]) > 0)
                                <li>    
                                    @foreach ($downlineUsers['level3'][$level1User->generatedId][$level2User->generatedId] as $level3User)
                                    <div class="userTree">
                                        @if($level2User->profile_picture)
                                        <img src="{{ asset($level3User->profile_picture) }}" alt="Profile Picture">
                                        @else
                                            <img src="{{ asset('images/favicon.png') }}" alt="{{ $level3User->name }}" />
                                        @endif
                                        <p>Name: {{ $level3User->name }}</p>
                                        <p>Sponsored Id: {{ $level3User->generatedId }}</p>
                                    </div>
                                    @endforeach

                                    @else
                                    <p>No level 3 downline users found.</p>
                                    @endif

                                </li>
                            

                            </ul>
                        
                     

                        @endforeach

                            @else
                            <p>No level 2 downline users found.</p>
                        @endif

                
                 </div>
                  
                
            </div>
            

@endforeach

</div> <!---end:accordion -->

@else
<p>No level 1 downline users found.</p>
@endif



