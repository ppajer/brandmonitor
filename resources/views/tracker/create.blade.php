@extends('layouts.seomonitor')

@section('content')
<div class="container">
    <h1>
        Add new keywords to track
    </h1>
    <hr>
    <form method="POST" action="{{route('trackers.store')}}">
        
        <div class="form-group">
            <label for="website">Website</label>
            @if (!$websites->count())
            <p>
                No website available. <a href="{{route('websites.create')}}?return=/trackers/create">Create one!</a>
            </p>
            @else
            <select class="form-control" name="website">
                @foreach($websites as $site)
                <option value="{{ $site->id }}">{{$site->name}}<small>({{$site->root_url}})</small></option>
                @endforeach
            </select>
            @endif
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <select class="form-control" name="location">
                <option value="Budapest,Budapest,Hungary">Hungary</option>
                <option value="London,England,United Kingdom">United Kingdom</option>
                <option value="SoHo,New York,United States">United States</option>
            </select>
        </div>
        <div class="form-group">
            <label for="keywords">Keywords</label>
            <textarea class="form-control" name="keywords"></textarea>
        </div>
        @csrf
        <input type="hidden" name="redirect_to" value="{{ $return }}">
        @yield('additionalFields ')
        <input type="submit" class="btn btn-primary" value="Add">
        <a href="{{ url($return) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection