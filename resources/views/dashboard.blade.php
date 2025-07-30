@extends('components.layout')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">{{ $dashboardType ?? 'Dashboard' }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(isset($quotes) && isset($products))
        {{-- Admin Dashboard --}}
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        Recent Quotes
                        <a href="{{ route('quotes.index') }}" class="btn btn-sm btn-primary float-end">View All</a>
                    </div>
                    <div class="card-body">
                        @if($quotes->count())
                            <ul class="list-group">
                                @foreach($quotes as $quote)
                                    <li class="list-group-item">
                                        <strong>{{ $quote->title }}</strong> - {{ $quote->created_at->format('d M Y') }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No quotes found.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        Recent Products
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary float-end">View All</a>
                    </div>
                    <div class="card-body">
                        @if($products->count())
                            <ul class="list-group">
                                @foreach($products as $product)
                                    <li class="list-group-item">
                                        <strong>{{ $product->name }}</strong> - {{ $product->created_at->format('d M Y') }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No products found.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @elseif(isset($assignedQuotes) && isset($pendingQuotes))
        {{-- User Dashboard --}}
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">Your Quotes</div>
                    <div class="card-body">
                        @if($assignedQuotes->count())
                            <ul class="list-group">
                                @foreach($assignedQuotes as $quote)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>
                                            <a href="{{ route('user.quotes.show', $quote->id) }}">
                                                <strong>{{ $quote->title }}</strong>
                                            </a>
                                            - {{ $quote->created_at->format('d M Y') }}
                                        </span>
                                        <span class="badge bg-{{ $quote->status === 'accepted' ? 'success' : 'warning' }}">
                                            {{ ucfirst($quote->status) }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">You have no assigned quotes.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">Pending Acceptance</div>
                    <div class="card-body">
                        @if($pendingQuotes->count())
                            <ul class="list-group">
                                @foreach($pendingQuotes as $quote)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <span>{{ $quote->title }} - {{ $quote->created_at->format('d M Y') }}</span>
                                        <a href="{{ route('user.quotes.accept', $quote->id) }}" class="btn btn-sm btn-success">Accept</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">No pending quotes to accept.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection