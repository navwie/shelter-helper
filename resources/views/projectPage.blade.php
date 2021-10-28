@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <project-page
            :project="{{ $activeProject }}"
            :user="{{ $user}}"
        >
        </project-page>
    </div>
@endsection
