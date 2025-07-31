<x-layout>

@section('content')
    <h1>Create New Product</h1>

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

    {{-- Create Product Form --}}
    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        {{-- Product Name --}}
        <div class="form-group">
            <label for="name">Product Name:</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                class="form-control" 
                value="{{ old('name') }}" 
                required>
        </div>

        {{-- Quantity --}}
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input 
                type="number" 
                id="quantity" 
                name="quantity" 
                class="form-control" 
                value="{{ old('quantity') }}" 
                min="1" 
                required>
        </div>

        {{-- Price --}}
        <div class="form-group">
            <label for="price">Price:</label>
            <input 
                type="number" 
                id="price" 
                name="price" 
                step="0.01" 
                class="form-control" 
                value="{{ old('price') }}" 
                required>
        </div>

        {{-- Quote Selection (optional) --}}
        <div class="form-group">
            <label for="quote_id">Quote (optional):</label>
            <select 
                name="quote_id" 
                id="quote_id" 
                class="form-control">
                <option value="">-- No Quote --</option>
                @foreach ($quotes as $quote)
                    <option 
                        value="{{ $quote->id }}"
                        {{ old('quote_id') == $quote->id ? 'selected' : '' }}>
                        {{ $quote->title ?? 'Quote #' . $quote->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</x-layout>