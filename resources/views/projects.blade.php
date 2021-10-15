@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <projects-list :projects="{{$projects}}" />
    </div>
@endsection
