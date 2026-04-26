<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Product Detail</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Rincian informasi produk terkait.</p>
                </div>
                <a href="{{ route('product.index') }}" class="text-sm text-gray-500 hover:text-white flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to List
                </a>
            </div>

            <div
                class="bg-white dark:bg-[#1f1f1f] border border-gray-200 dark:border-amber-500/30 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <p class="text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider mb-1">
                            PRODUCT NAME</p>
                        <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $product->name }}</p>
                    </div>

                    <div class="mb-6">
                        <p class="text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider mb-1">
                            QUANTITY ALIVE</p>
                        <p class="text-lg font-medium text-gray-900 dark:text-gray-300">{{ $product->qty }} Items</p>
                    </div>

                    <div class="mb-6">
                        <p class="text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider mb-1">
                            PRICE TAG</p>
                        <p class="text-lg font-medium text-gray-900 dark:text-gray-300">Rp
                            {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="mb-6 border-t border-gray-200 dark:border-amber-500/30 pt-6">
                        <p class="text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider mb-1">
                            OWNED BY</p>
                        <p class="text-md text-gray-900 dark:text-gray-400">
                            {{ $product->user ? $product->user->name : 'Unknown System' }}
                        </p>
                    </div>

                    <div class="flex justify-end mt-4">
                        @can('update', $product)
                            <x-edit-product url="{{ route('product.edit', $product->id) }}" name="Edit Product" />
                        @endcan

                        @can('delete', $product)
                            <x-delete-product url="{{ route('product.delete', $product->id) }}" name="Delete Product" />
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>