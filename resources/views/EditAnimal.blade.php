@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <edit-animal
            animal="{{ $animal }}"
        />
    </div>
@endsection
