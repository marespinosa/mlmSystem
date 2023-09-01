
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


    <div id="treeData" class="tree">

      <ul>
        <li>
            
            <div class="userTree">

                @if(auth()->user()->profile_picture)
                <a href="#">
                    <img src="{{ asset(auth()->user()->profile_picture) }}" alt="Profile Picture" width="150"></a>
                @else
                <a href="#"><img src="{{ asset('images/favicon.png') }}" alt="{{ $user->name }}" width="150">
                <span>{{ $user->name }} {{ $user->lastname }} <br /><b>Sponsor Id:</b> {{ $user->generatedId }}</span></a>
            
                @endif

            </div>

            @include('tree.tree-level1')
          


	
	</div>









 
<!-----end content ---->
        </div>
    </div>
</div>
</div>

           
@endsection