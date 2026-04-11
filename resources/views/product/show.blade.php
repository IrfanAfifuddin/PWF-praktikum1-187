<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Product Detail</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Rincian informasi produk terkait.</p>
                </div>
                <a href="{{ route('product.index') }}" class="text-sm text-gray-500 hover:text-white flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to List
                </a>
            </div>

            <div class="bg-white dark:bg-[#1f1f1f] border border-gray-200 dark:border-amber-500/30 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="mb-6">
                        <p class="text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider mb-1">PRODUCT NAME</p>
                        <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $product->name }}</p>
                    </div>

                    <div class="mb-6">
                        <p class="text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider mb-1">QUANTITY ALIVE</p>
                        <p class="text-lg font-medium text-gray-900 dark:text-gray-300">{{ $product->qty }} Items</p>
                    </div>

                    <div class="mb-6">
                        <p class="text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider mb-1">PRICE TAG</p>
                        <p class="text-lg font-medium text-gray-900 dark:text-gray-300">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>

                    <div class="mb-6 border-t border-gray-200 dark:border-amber-500/30 pt-6">
                        <p class="text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider mb-1">OWNED BY</p>
                        <p class="text-md text-gray-900 dark:text-gray-400">{{ $product->user ? $product->user->name : 'Unknown System' }}</p>
                    </div>
                    
                    <div class="flex justify-end mt-4">
                        @can('update', $product)
                        <a href="{{ route('product.edit', $product->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-[#252525] border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-white uppercase tracking-widest hover:bg-gray-300 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 mr-2">
                            Edit Product
                        </a>
                        @endcan

                        @can('delete', $product)
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapusnya?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Delete Product
                            </button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
