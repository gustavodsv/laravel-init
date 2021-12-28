@extends('layouts.admin')

@section('title', 'To-do')

@section('content')

<div class="container">

    <h1>New task</h1>

    @if($errors->any())
        <x-alert>
            @foreach($errors->all() as $error)
                {{$error}}<br>
            @endforeach
        </x-alert>
    @endif

    <form method="post" class="mt-4">
        @csrf
        <div class="mb-3">
            <label class="form-label">
                Task name
            </label>
            <input type="text" class="form-control" name="title">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
        <div class="btn btn-danger" onclick="window.location.href='{{route('todo.list')}}'">Cancel</div>
      </form>
</div>

@endsection
