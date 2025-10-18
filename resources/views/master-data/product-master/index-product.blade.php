<x-app-layout>
  <x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>


  <div class="container p-4 mx-auto">
    <div class="overflow-x-auto">
      <a href="{{ route('product-create') }}">
        <button class="px-6 py-4 text-white bg-green-500 border border-green-500 rounded-lg shadow-lg hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
            Add product data
        </button>
      </a>
      <table class="min-w-full border border-collapse border-gray-200 mt-4">
        <thead>
          <tr class="bg-gray-100">
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">ID</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Product Name</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Unit</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Type</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Information</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Qty</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Producer</th>
            <th class="px-4 py-2 text-left text-gray-600 border border-gray-200">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data as $item)
            <tr class="bg-white">
              <td class="px-4 py-2 border border-gray-200">{{ $data->firstItem() + $loop->index }}</td>
              <td class="px-4 py-2 border border-gray-200">{{ $item->product_name }}</td>
              <td class="px-4 py-2 border border-gray-200">{{ $item->unit }}</td>
              <td class="px-4 py-2 border border-gray-200">{{ $item->type }}</td>
              <td class="px-4 py-2 border border-gray-200">{{ $item->information }}</td>
              <td class="px-4 py-2 border border-gray-200">{{ $item->qty }}</td>
              <td class="px-4 py-2 border border-gray-200">{{ $item->producer }}</td>
              <td class="px-4 py-2 border border-gray-200">
                <a href="{{ route('product-edit', $item->id) }}" class="px-2 text-blue-600 hover:text-blue-800">Edit</a>
                <form action="{{ route('product-destroy', $item->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-2 text-red-600 hover:text-red-800">Hapus</button>
                </form>
              </td>
            </tr>
          @endforeach

          <!-- Tambahkan baris lainnya sesuai kebutuhan -->
        </tbody>
      </table>
      <div class="mt-4">
        {{ $data->links() }}
      </div>
    </div>
  </div>

</x-app-layout>
