@extends('layouts.seomonitor')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                Results for keyword: {{ $keyword }} <small>in {{ $location }}</small>
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">
                            #
                        </th>
                        <th scope="col">
                            URL
                        </th>
                        <th scope="col">
                            Title
                        </th>
                        <th scope="col">
                            Description
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($results as $result)
                    <tr>
                        <td>
                            {{ $result['position'] }}
                        </td>
                        <td>
                            {{ $result['link'] }}
                        </td>
                        <td>
                            {{ $result['title'] }}
                        </td>
                        <td>
                            {{ $result['description'] }}
                        </td>
                    </tr>
                    @empty
                    <p>
                        An error occured!
                    </p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
