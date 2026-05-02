<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-[#111827] min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center">
                    <a href="{{ route('product.index') }}" class="text-gray-400 hover:text-white transition mr-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </a>
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-white tracking-tight">Product Detail</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Viewing product #{{ $product->id }}</p>
                    </div>
                </div>

                <div class="flex space-x-3">
                    @can('update', $product)
                        <a href="{{ route('product.edit', $product->id) }}" class="inline-flex items-center px-4 py-2 border border-amber-500 rounded-lg font-semibold text-sm text-amber-500 hover:bg-amber-500/10 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit
                        </a>
                    @endcan

                    @can('delete', $product)
                        <form action="{{ route('product.delete', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-red-500 rounded-lg font-semibold text-sm text-red-500 hover:bg-red-500/10 transition">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete
                            </button>
                        </form>
                    @endcan
                </div>
            </div>

            <div class="bg-white dark:bg-[#1f2937] border border-gray-200 dark:border-gray-700 shadow-sm rounded-xl overflow-hidden">
                <div class="grid grid-cols-3 p-6 border-b border-gray-200 dark:border-gray-700 items-center">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Product Name</div>
                    <div class="col-span-2 text-base font-bold text-gray-900 dark:text-white">{{ $product->name }}</div>
                </div>

                <div class="grid grid-cols-3 p-6 border-b border-gray-200 dark:border-gray-700 items-center">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Quantity</div>
                    <div class="col-span-2">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400">
                            {{ $product->qty }} In Stock
                        </span>
                    </div>
                </div>

                <div class="grid grid-cols-3 p-6 border-b border-gray-200 dark:border-gray-700 items-center">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Price</div>
                    <div class="col-span-2 text-base font-bold text-gray-900 dark:text-white">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                </div>

                <div class="grid grid-cols-3 p-6 border-b border-gray-200 dark:border-gray-700 items-center">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Owner</div>
                    <div class="col-span-2 flex items-center text-base font-bold text-gray-900 dark:text-white">
                        <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300 flex items-center justify-center mr-3 text-sm">
                            {{ strtoupper(substr($product->user ? $product->user->name : 'U', 0, 1)) }}
                        </div>
                        {{ $product->user ? $product->user->name : 'Unknown' }}
                    </div>
                </div>

                <div class="grid grid-cols-3 p-6 border-b border-gray-200 dark:border-gray-700 items-center">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Created At</div>
                    <div class="col-span-2 text-base text-gray-900 dark:text-gray-200">{{ $product->created_at ? $product->created_at->format('d Mar Y, H:i') : '-' }}</div>
                </div>

                <div class="grid grid-cols-3 p-6 items-center">
                    <div class="text-sm text-gray-500 dark:text-gray-400">Updated At</div>
                    <div class="col-span-2 text-base text-gray-900 dark:text-gray-200">{{ $product->updated_at ? $product->updated_at->format('d Mar Y, H:i') : '-' }}</div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>