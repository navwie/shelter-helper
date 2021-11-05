@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <create-card
            category="{{ $category }}"
        />
    </div>
@endsection
