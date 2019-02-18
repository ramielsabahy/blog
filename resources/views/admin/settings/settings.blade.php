@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit Blog Settings
        </div>

        <div class="panel-body">
            <form action="{{ route('settings.update') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">
                        Site name
                    </label>
                    <input class="form-control" type="text" name="site_name" value="{{ $settings->site_name }}" autocomplete="off"></input>
                </div>
                <div class="form-group">
                    <label for="name">
                        Contact Number
                    </label>
                    <input class="form-control" type="text" name="contact_number" value="{{ $settings->contact_number }}" autocomplete="off"></input>
                </div>
                <div class="form-group">
                    <label for="name">
                        Contact Email
                    </label>
                    <input class="form-control" type="email" name="contact_email" value="{{ $settings->contact_email }}" autocomplete="off"></input>
                </div>
                <div class="form-group">
                    <label for="owner">
                        Website Owner
                    </label>
                    <input class="form-control" type="text" name="owner" value="{{ $settings->owner }}" autocomplete="off"></input>
                </div>
                <div class="form-group">
                    <label for="name">
                        Address
                    </label>
                    <input class="form-control" type="text" name="address" value="{{ $settings->address }}" autocomplete="off"></input>
                </div>
                <div class="form-group">
                    <label for="info">
                        Owner Informtion
                    </label>
                    <textarea class="form-control" type="text" name="info" autocomplete="off">{{ $settings->info }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Settings</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection