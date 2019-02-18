@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Crete User
        </div>

        <div class="panel-body">
            <form action="{{ route('user.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">
                        User
                    </label>
                    <input class="form-control" type="text" name="name" autocomplete="off"></input>
                </div>
                <div class="form-group">
                    <label for="name">
                        Email
                    </label>
                    <input class="form-control" type="text" name="email" placeholder="someone@example.com" autocomplete="off"></input>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Add User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection