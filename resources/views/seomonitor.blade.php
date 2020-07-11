@extends('layouts.seomonitor')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                SEO Monitor
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">Websites <a href=" {{ route('websites.create') }}?return=/seo-monitor" class="btn btn-primary btn-sm">Add Site</a></div>

                <div class="card-body">
                    @forelse ($websites as $website)
                        {{ $website->name }}
                    @empty
                        No websites yet. <a href="{{ route('websites.create') }}?return=/seo-monitor">Add one!</a>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                        Tracked keywords 
                        <a href=" {{ route('trackers.create') }}?return=/seo-monitor" class="btn btn-primary btn-sm">Add Trackers</a>
                        <a href=" {{ route('trackers.scrapeAll') }}?return=/seo-monitor" class="btn btn-secondary btn-sm">Update All</a>
                </div>

                <div class="card-body">
                    @if (!$trackers->count())
                    No trackers yet. <a href="{{ route('trackers.create') }}?return=/seo-monitor">Add one!</a>
                    @else
                    <table>
                        <tr>
                            <th>Keyword</th>
                            <th>Location</th>
                            <th>Website</th>
                            <th>Position</th>
                        </tr>
                        @foreach ($trackers as $tracker)
                            <tr>
                                <td>{{$tracker->keyword->text }}</td>
                                <td>{{$tracker->location}}</td>
                                <td>{{$tracker->website->name}}</td>
                                <td>{{$tracker->currentPosition($tracker->keyword)}}</td>
                            </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
