@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
            <p class="text-grey no-underline">
                <a href="/projects" class="text-grey no-underline">My Projects</a> / {{ $project->title }}
            </p>
            <a href="/projects/create" class="button"><i class="fas fa-plus"></i> New Project</a>
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3 mb-8">
                <div class="mb-6">
                    <!-- TASKS GOES HERE -->
                    <h3 class="text-grey no-underline text-base mb-3">Tasks</h3>

                    @foreach($project->tasks as $task)
                    <div class="card mb-3">
                        {{ $task->body }}
                    </div>
                    @endforeach
                </div>

                <div class="">
                    <h3 class="text-grey no-underline text-base mb-3">General Notes</h3>
                    <textarea class="card w-full" style="min-height:200px">Lorem ipsum dolor sit amet.</textarea>
                </div>
            </div>
            <div class="lg:w-1/4 px-3">
                @include('projects.card')
            </div>
        </div>
    </main>

@endsection
