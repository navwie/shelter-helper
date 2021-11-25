@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <edit-shelter
            shelter="{{ $shelter }}"
        />
    </div>
@endsection
