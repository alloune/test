<h1>Liste des projets</h1>

@foreach($projects as $project)
    <h2>{{ $project->name }}</h2>
    <p>{{ $project->description }}</p>
    <p>{{ $project->created_at }}</p>
    <p>{{ $project->author_name }}</p>
@endforeach