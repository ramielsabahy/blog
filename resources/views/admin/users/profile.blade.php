@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Profile
        </div>

        <div class="panel-body">
            <form action="{{ route('user.profile.update') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">
                        User
                    </label>
                    <input class="form-control" type="text" name="name" value="{{ $user->name }}" autocomplete="off"></input>
                </div>
                <div class="form-group">
                    <label for="name">
                        Email
                    </label>
                    <input class="form-control" type="text" name="email" value="{{ $user->email }}" placeholder="someone@example.com" autocomplete="off"></input>
                </div>
                <div class="form-group">
                    <label for="name">
                        New Password
                    </label>
                    <input class="form-control" type="password" name="password" value="{{ $user->password }}" autocomplete="off"></input>
                </div>
                <div class="form-group">
                    <label for="name">
                        New Avatar
                    </label>
                    <input class="form-control" type="file" name="avatar"></input>
                </div>
                <div class="form-group">
                    <label for="name">
                        Facebook Profile
                    </label>
                    <input class="form-control" type="text" name="facebook" value="{{ $user->profile->facebook }}" placeholder="https://www.facebook.com/ramimohamed" autocomplete="off"></input>
                </div>
                <div class="form-group">
                    <label for="name">
                        Youtube Profile
                    </label>
                    <input class="form-control" type="text" name="youtube" value="{{ $user->profile->youtube }}" placeholder="https://www.youtube.com/user/rami" autocomplete="off"></input>
                </div>
                <div class="form-group">
                    <label for="name">
                        About you
                    </label>
                    <textarea class="form-control" type="text" name="about" id="about" cols="6" rows="6">{{ $user->profile->about }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection