@extends('layout')

@section('content')

    <form action="{{ route('project.store') }}" method="post">
        @csrf
        @method('post')
        <label>Nom du projet</label>
        <input type="text" name="name">
        <label>Description du projet</label>
        <input type="text" name="description">
        <input type="submit" class="btn btn-primary">
    </form>

    @foreach(\App\Models\Project::all() as $project)
        <p>{{ $project->id }}</p>
        <small>{{ $project->name }}</small>
    @endforeach
@endsection
