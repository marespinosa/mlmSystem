
@php
    $pageTitle = 'HBWW International - Activate';
    $WelcomeNote = 'Activate or Deactivate ';
    $alignment = 'alignleft';
@endphp

@extends('admin.layouts')


@section('content')

    @include('admin.sidebar')

    @include('admin.main-content-db')

    @include('tree.sub-content')

    <form action="{{ route('superadmin.index') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="search" value="{{ $searchQuery }}" placeholder="Search members">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </div>
    </form>

    

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Sponsored ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Account Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{ $member->generatedId }}</td>
                <td>{{ $member->name }} {{ $member->lastname }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->acountStatus }}</td>
                <td>
                    @if ($member->acountStatus === 'deactivate')
                        <form action="{{ route('superadmin.update', ['id' => $member->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success">Activate Now</button>
                        </form>
                    @else
                        <span class="text-success">Active</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>




@endsection