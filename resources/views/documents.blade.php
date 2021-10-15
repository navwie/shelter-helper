@extends('layouts.mainLayout')

@section('content')
    <div id="app" class="container d-flex list-group col-12 align-items-center">
        <documents-list :documents="{{$documents}}" />
    </div>
@endsection
