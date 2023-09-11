   <ul class="nested">
        @foreach ($level['downline'] as $user)
            <li>
                <div class="userTree caret">
                    <small style="color: #68BB59;">Level: {{ $user['user']->level }}</small>
                    <h6>{{ $user['user']->name }} {{ $user['user']->lastname }}</h6>
                    <p><b>Sponsor Id:</b> <input type="text" value="{{ $user['user']->generatedId }}" placeholder="{{ $user['user']->generatedId }}"></p>
                </div>
                
                @if (!empty($user['downline']))
                    @include('tree.tree-level', ['level' => $user])
                @endif
            </li>
        @endforeach
    </ul>
</div>
