@extends('layouts.seomonitor')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>
                Review Monitor
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">Customers <a href=" {{ route('customers.create') }}?return=/review-monitor" class="btn btn-primary btn-sm">Add Customer</a></div>

                <div class="card-body">
                    @forelse ($customers as $customer)
                        {{ $customer->name }}
                    @empty
                        No customers yet. <a href="{{ route('customers.create') }}?return=/review-monitor">Add one!</a>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
