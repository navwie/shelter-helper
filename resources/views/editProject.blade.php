@extends('layouts.mainLayout')

@section('content')
    <div id="app">
        <edit-project
            :project="{{ $project }}"
        />
    </div>
@endsection
