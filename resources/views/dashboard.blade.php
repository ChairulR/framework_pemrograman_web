<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-xl font-bold text-gray-800">
                    Halo, {{ Auth::check() ? Auth::user()->name : 'Guest' }}
                </h1>
                <p class="mt-2 text-gray-600">
                    Role Anda adalah <span class="font-semibold text-indigo-600">"{{ Auth::check() ? Auth::user()->role : 'visitor' }}"</span>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>

