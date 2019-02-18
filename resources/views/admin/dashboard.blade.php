@extends('layouts.app')
<style>
    .panel-body{
        background-color: white;
    }
</style>
@section('content')

            <div class="col-md-3">
                <div class="panel-info">
                    <div class="panel-heading text-center">
                        Published Posts
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{ $posts }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel-danger">
                    <div class="panel-heading text-center">
                        Trashed Posts
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{ $trashed }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel-success">
                    <div class="panel-heading text-center">
                        USERS
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{ $users }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel-info">
                    <div class="panel-heading text-center">
                        Categories
                    </div>
                    <div class="panel-body">
                        <h1 class="text-center">{{ $categories }}</h1>
                    </div>
                </div>
            </div>

@endsection
