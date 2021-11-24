@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <user-profile user="{{$user}}"></user-profile>
    </div>
@endsection
