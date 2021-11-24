@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <user-change-data user="{{$user}}"></user-change-data>
    </div>
@endsection
