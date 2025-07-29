@extends('components.layout')

@section('content')
    <h1>Edit Product</h1>

    {{-- Show validation errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Edit Product Form --}}
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input 
                type="text" 
                name="name" 
                id="name" 
                class="form-control" 
                value="{{ old('name', $product->name) }}" 
                required>
        </div>

        {{-- Quantity --}}
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input 
                type="number" 
                name="quantity" 
                id="quantity" 
                class="form-control" 
                value="{{ old('quantity', $product->quantity) }}" 
                min="1" 
                required>
        </div>

        {{-- Quote Selection --}}
        <div class="form-group">
            <label for="quote_id">Quote:</label>
            <select 
                name="quote_id" 
                id="quote_id" 
                class="form-control" 
                required>
                <option value="">-- Select Quote --</option>
                @foreach ($quotes as $quote)
                    <option 
                        value="{{ $quote->id }}"
                        {{ old('quote_id', $product->quote_id) == $quote->id ? 'selected' : '' }}>
                        {{ $quote->title ?? 'Quote #' . $quote->id }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Price --}}
        <div class="form-group">
            <label for="price">Price:</label>
            <input 
                type="number" 
                name="price" 
                id="price" 
                class="form-control" 
                step="0.01" 
                value="{{ old('price', $product->price) }}" 
                required>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
@endsection