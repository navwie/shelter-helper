@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <admin-profile
            user="{{ $user }}"
            shelter="{{ $shelter }}"
        />
    </div>
@endsection
