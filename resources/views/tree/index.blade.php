
@php
    $pageTitle = 'HBWW International - Tree';
    $WelcomeNote = 'My Tree';
    $alignment = 'aligncenter';
@endphp

@extends('admin.layouts')


@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    @include('tree.sub-content')

    <div>
        <h2>Current User Information</h2>
        <p>Name: {{ $user->name }}</p>
        <p>Email: {{ $user->generatedId }}</p>


        @if (isset($downlineUsers['level1']) && $downlineUsers['level1']->count() > 0)
            <h2>Level 1 Downline Users</h2>
            @foreach ($downlineUsers['level1'] as $downlineUser)
                <div>
                    <p>Downline User Name: {{ $downlineUser->name }}</p>
                    <p>Downline User Sponsored Id: {{ $downlineUser->generatedId }}</p>
                </div>
            @endforeach
        @else
            <p>No level 1 downline users found.</p>
        @endif

        @if (isset($downlineUsers['level2']) && count($downlineUsers['level2']) > 0)
            <h2>Level 2 Downline Users</h2>


            @foreach ($downlineUsers['level2'] as $level2DownlineUsers)
                @foreach ($level2DownlineUsers as $downlineUser)
                    <div>
                        <p>Downline User Name: {{ $downlineUser->name }}</p>
                        <p>Downline User Same Id: {{ $downlineUser->sponsor_id_number }}</p>
                        <p>Downline User Sponsored Id: {{ $downlineUser->generatedId }}</p>
                    </div>
                @endforeach
            @endforeach
        @else
            <p>No level 2 downline users found.</p>
        @endif
    </div>




     
  <!-----end content ---->
            </div>
        </div>
    </div>
</div>
    
               
@endsection