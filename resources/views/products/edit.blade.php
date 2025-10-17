<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">{{ __('Edit Product') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="mb-4 text-lg font-medium">Edit Product</h3>

                    <x-auth-session-status class="mb-4" :status="session('success')" />

                    <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" id="product_name" name="product_name" value="{{ old('product_name', $product->product_name) }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md" required>
                        </div>

                        <div class="form-group">
                            <label for="unit" class="block text-sm font-medium text-gray-700">Unit</label>
                            <select id="unit" name="unit" class="block w-full p-2 mt-1 border border-gray-300 rounded-md" required>
                                <option value="" disabled>Select a unit</option>
                                <option value="kg" {{ old('unit', $product->unit) == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                                <option value="ltr" {{ old('unit', $product->unit) == 'ltr' ? 'selected' : '' }}>Liter (ltr)</option>
                                <option value="pcs" {{ old('unit', $product->unit) == 'pcs' ? 'selected' : '' }}>Pieces (pcs)</option>
                                <option value="box" {{ old('unit', $product->unit) == 'box' ? 'selected' : '' }}>Box</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                            <input type="text" id="type" name="type" value="{{ old('type', $product->type) }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md" required>
                        </div>

                        <div class="form-group">
                            <label for="information" class="block text-sm font-medium text-gray-700">Information</label>
                            <textarea id="information" name="information" rows="3" class="block w-full p-2 mt-1 border border-gray-300 rounded-md">{{ old('information', $product->information) }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="qty" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input type="number" id="qty" name="qty" value="{{ old('qty', $product->qty) }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md" required>
                        </div>

                        <div class="form-group">
                            <label for="producer" class="block text-sm font-medium text-gray-700">Producer</label>
                            <input type="text" id="producer" name="producer" value="{{ old('producer', $product->producer) }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md" required>
                        </div>

                        <div class="flex items-center gap-2">
                            <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded">Update</button>
                            <a href="{{ route('products.index') }}" class="px-4 py-2 text-sm font-medium bg-gray-200 rounded">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
