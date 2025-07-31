<x-layout>

@section('content')
    <h1>Edit Quote</h1>

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
        'action' => route('quotes.store'),
        'method' => 'POST',
        'model' => null,
        'buttonText' => 'Create Quote',
        'fields' => [
            ['name' => 'title', 'label' => 'Title', 'type' => 'text', 'required' => true],
            ['name' => 'description', 'label' => 'Description', 'type' => 'text'],
            // Add more fields as needed
        ]
    ])

</x-layout>