   <ul class="nested">

    
    @foreach ($level['downline'] as $user)
    <li>
        <div class="userTree caret">
            <div class="level-header"><strong>Level: {{ $user['levelUser'] }}</strong></div>
            <h6>{{ $user['user']->name }} {{ $user['user']->lastname }}</h6>
            <p><b>Sponsor Id:</b> <input type="text" value="{{ $user['user']->generatedId }}" placeholder="{{ $user['user']->generatedId }}"></p>
            <small><b>Account Status:</b> {{ $user['user']->acountStatus }}</small><br />
        
        </div>

        @if (!empty($user['downline']))
        @include('tree.tree-level', ['level' => $user])
        @else
            <ul class="nested"><li><div class="userTree caret"> No Downline Available</div></li></ul>
        @endif
    </li>
@endforeach


    </ul>
    
