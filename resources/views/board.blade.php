@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <board
            :cards="{{ $cards }}"
            project="{{ $activeProject ?? ""}}"
            :assign_users="{{ $assignUsers }}"
        />
    </div>
@endsection
