@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <edit-card
            :card="{{ $card }}"
        />
    </div>
@endsection
