
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

    <form action="{{ url('edit-data/'.$member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="">Name</label>
            <input type="text" name="name" value="{{$member->name}}" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="">Email</label>
            <input type="text" name="email" value="{{$member->email}}" class="form-control">
        </div>
        
        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Update Student</button>
        </div>

    </form>

    





@endsection
