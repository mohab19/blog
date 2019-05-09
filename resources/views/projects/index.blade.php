@extends('layouts.app')

@section('content')
        <header class="flex items-center mb-3 py-4">
            <div class="flex justify-between items-end w-full">
                <h3 class="text-grey no-underline">My Projects</h3>
                <a href="/projects/create" class="button"><i class="fas fa-plus"></i> New Project</a>
            </div>
        </header>

        <main class="lg:flex flex-wrap -mx-3">
            @forelse($projects as $project)
                <div class="lg:w-1/3 px-3 pb-6">
                    @include('projects.card')
                </div>
            @empty
            <div class="">
                No Projects Yet!
            </div>
            @endforelse
        </main>
@endsection
