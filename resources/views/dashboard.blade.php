@extends('components.layout')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">
        {{ $dashboardType ?? 'Dashboard' }}
    </h2>

    @if(isset($quotes) && isset($products))
        {{-- Admin Dashboard Section --}}
        <div class="row">
            <!-- Quotes Section -->
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

            <!-- Products Section -->
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

    @else
        {{-- User Dashboard Section --}}
        <div class="alert alert-info">
            Welcome to your user dashboard!
        </div>
        {{-- Add more user-specific widgets here --}}
    @endif
</div>
@endsection