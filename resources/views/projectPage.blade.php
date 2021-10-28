@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <project-page
            :project="{{ $activeProject }}"
            :user="{{ $user}}"
            :project_users="{{ $projectUsers }}"
        >
        </project-page>
    </div>
@endsection
