@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <shelter
            animals="{{ $animals }}"
            shelter="{{ $shelter }}"
        />
    </div>
@endsection
