@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <user-profile
            user="{{ $user }}"
        />
    </div>
@endsection
