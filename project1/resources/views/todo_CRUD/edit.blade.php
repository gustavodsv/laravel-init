@extends('layouts.admin')

@section('title', 'To-do')

<div class="container">
    @section('header', 'Edit TO-DO')

@section('content')

    @if(session('warning'))
        <x-alert>
            {{session('warning')}}
        </x-alert>
    @endif

    <form method="post" class="mt-4">
        @csrf
        <div class="mb-3">
            <label class="form-label">
                Task
            </label>
            <input type="text" class="form-control" name="title" value="{{ $data->title }}" disabled>
        </div>
        <div class="mb-3">
            <label class="form-label">
                Task [NEW]
            </label>
            <input type="text" class="form-control" name="newtitle">
        </div>


        <input type="submit" class="btn btn-primary" value="Submit">
      </form>
</div>

@endsection
