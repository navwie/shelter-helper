@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <announcement
            announcements="{{ $announcements }}"
        />
    </div>с
@endsection
