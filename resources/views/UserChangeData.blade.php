@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <user-change-data
            user="{{ $user }}"
        />
    </div>
@endsection
