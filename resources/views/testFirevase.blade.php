@extends('layouts.app')

@section('content')
		<form method="POST" action="{{ route('send') }}">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <input type="text" name="name" placeholder="any text">
                <button type="submit" name="submit">Submit</button>
            </div>
        </form>
        
@endsection
