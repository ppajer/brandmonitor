@extends('layouts.app')

@section('content')
<div class="container">
    <h1>
        Add new {{ $resource }}
    </h1>
    <hr>
    <form method="POST" action="{{route($resource.'s.store')}}">
        @foreach ($fillable as $field)
        <div class="form-group">
            <label for="{{ $field }}">{{ ucfirst($field) }}</label>
            <input type="text" name="{{ $field }}" class="form-control">
        </div>
        @endforeach
        @csrf
        <input type="hidden" name="redirect_to" value="{{ $return }}">
        <input type="submit" class="btn btn-primary" value="Create">
        <a href="{{ url($return) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection