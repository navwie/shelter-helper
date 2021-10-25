@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <board
            :cards="{{ $cards }}"
        />
    </div>
@endsection
