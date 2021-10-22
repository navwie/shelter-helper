@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <projects-list
            :projects="{{ $projects }}"
            :user="{{ $userId }}"
            select="{{ $select ?? ""}}"
            :create_project_notifications="{{ $create_project_notifications }}"
            :delete_project_notifications="{{ $delete_project_notifications }}"
        >
        </projects-list>
    </div>
@endsection
