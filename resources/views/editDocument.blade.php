@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <edit-document
            :document="{{ $document }}"
        />
    </div>
@endsection
