<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ $product->product_name }}</h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <p><strong>Type:</strong> {{ $product->type }}</p>
                <p><strong>Unit:</strong> {{ $product->unit }}</p>
                <p><strong>Quantity:</strong> {{ $product->qty }}</p>
                <p><strong>Producer:</strong> {{ $product->producer }}</p>
                <p class="mt-4"><strong>Information:</strong></p>
                <p class="text-gray-700">{{ $product->information }}</p>

                <div class="mt-4">
                    <a href="{{ route('products.index') }}" class="text-indigo-600">Back to list</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
