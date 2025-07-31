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

    @include('components.form', [
        'action' => route('products.update', $product->id),
        'method' => 'PUT',
        'model' => $product,
        'buttonText' => 'Update Product',
        'fields' => [
            ['name' => 'name', 'label' => 'Product Name', 'type' => 'text', 'required' => true],
            ['name' => 'quantity', 'label' => 'Quantity', 'type' => 'number', 'min' => 1, 'required' => true],
            [
                'name' => 'quote_id',
                'label' => 'Quote',
                'type' => 'select',
                'required' => true,
                'options' => $quotes->map(fn($q) => [
                    'value' => $q->id,
                    'label' => $q->title ?? 'Quote #' . $q->id,
                ])->toArray(),
            ],
            ['name' => 'price', 'label' => 'Price', 'type' => 'number', 'step' => '0.01', 'required' => true],
        ]
    ])

@endsection