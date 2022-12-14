@extends('layout')

@section('content')

    <div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">Projet #{{ $project->id }}</h2>
        <div class="w-25 mx-auto">
            <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg mx-auto"
                 style="background-image: url('https://picsum.photos/id/{{$project->id}}/500/500?grayscale');">
                <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                    <h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">{{ $project->name }}</h3>
                    <ul class="d-flex list-unstyled mt-auto">
                        <li class="me-auto">
                            <img src="https://github.com/twbs.png" alt="Bootstrap" width="32" height="32"
                                 class="rounded-circle border border-white">
                        </li>
                        <li class="d-flex align-items-center me-3">
                            <small class="text-white bg-dark">{{ $project->author_name }} <br> {{ $project->created_at }}</small>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column align-items-center">
            <h1 class="justify-content-center">Desdcription du projet</h1>
            <h2> {{ $project->name }} </h2>
            <p> {{ $project->description }} </p>

            <form action="{{ route('donation.store') }}" method="post">
                @csrf
                @method('post')
                <label>Montant</label>
                <input type="number" placeholder="10" name="amount"><small>€</small>
                <input type="hidden" name="user_id" value="1">
                <input type="hidden" name="project_id" value="{{ $project->id }}">
                <input  type="submit" class="btn btn-primary">

            </form>
        </div>
@endsection
