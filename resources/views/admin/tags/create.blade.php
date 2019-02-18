@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Crete new Tag
        </div>

        <div class="panel-body">
            <form action="{{ route('tag.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">
                        Tag
                    </label>
                    <input class="form-control" type="text" name="tag" autocomplete="off"></input>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Store Tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection