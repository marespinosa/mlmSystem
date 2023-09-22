   <ul class="nested">

    
    @foreach ($level['downline'] as $user)
    <li>
        <div class="userTree caret">
            <div class="level-header"><strong>Level: {{ $user['levelUser'] }}</strong></div>
            <h6>{{ $user['user']->name }} {{ $user['user']->lastname }}</h6>
            <p><b>Sponsor Id:</b> <input type="text" value="{{ $user['user']->generatedId }}" placeholder="{{ $user['user']->generatedId }}"></p>
            <small><b>Account Status:</b> {{ $user['user']->acountStatus }}</small><br />
            @if ($user['levelUser'] == 1)
                <small> <b>Bonus:</b> 100</small>
            @elseif ($user['levelUser'] == 2)
            <small><b>Bonus:</b> 50</small>
            @elseif ($user['levelUser'] == 3)
            <small> <b>Bonus:</b> 25</small>
            @elseif ($user['levelUser'] == 4)
            <small><b>Bonus:</b> 15</small>
            @elseif ($user['levelUser'] == 5)
            <small><b>Bonus:</b> 10</small>
            @elseif ($user['levelUser'] == 6)
            <small> <b>Bonus:</b> 10</small>
            @elseif ($user['levelUser'] == 7)
            <small> <b>Bonus:</b> 10</small>
            @elseif ($user['levelUser'] == 8)
            <small> <b>Bonus:</b> 10</small>
            @endif



           
        </div>

        @if (!empty($user['downline']))
        @include('tree.tree-level', ['level' => $user])
        @else
            <ul class="nested"><li><div class="userTree caret"> No Downline Available</div></li></ul>
        @endif
    </li>
@endforeach


    </ul>
    
