@extends('layouts.app')

@section('content')

        <form method="POST" action="/projects">
            @csrf
            <h2>Create a Project</h2>
            <div class="form-group">
                <label class="label" for="title">Title</label>

                <div class="">
                    <input type="text" class="form-control" name="title" placeholder="Title">
                </div>
            </div>
            <div class="form-group">
                <label class="label" for="title">Description</label>

                <div class="control">
                    <textarea class="form-control" name="description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="control">
                    <button type="submit" class="btn btn-primary">create project</button>
                    <a href="/projects" class="btn btn-danger">cancel</a>
                </div>
            </div>
        </form>

@endsection
