<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Edit Product</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Perbarui data produk di inventori Anda.</p>
            </div>

            <div class="bg-white dark:bg-[#1f1f1f] border border-gray-200 dark:border-amber-500/30 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('product.update', $product->id) }}">
                        @csrf
                        @method('PUT')
                        
                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-amber-600/80 mb-2">PRODUCT NAME</label>
                            <input id="name" class="block w-full border-gray-300 dark:border-amber-500/30 dark:bg-[#252525] dark:text-white focus:border-amber-500 focus:ring-amber-500 rounded-md shadow-sm px-4 py-2" type="text" name="name" value="{{ old('name', $product->name) }}" required autofocus autocomplete="name" />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <div class="mb-4">
                            <label for="qty" class="block font-medium text-sm text-gray-700 dark:text-amber-600/80 mb-2">QUANTITY</label>
                            <input id="qty" class="block w-full border-gray-300 dark:border-amber-500/30 dark:bg-[#252525] dark:text-white focus:border-amber-500 focus:ring-amber-500 rounded-md shadow-sm px-4 py-2" type="number" name="qty" value="{{ old('qty', $product->qty) }}" required />
                            @error('qty')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <label for="price" class="block font-medium text-sm text-gray-700 dark:text-amber-600/80 mb-2">PRICE (Rp)</label>
                            <input id="price" class="block w-full border-gray-300 dark:border-amber-500/30 dark:bg-[#252525] dark:text-white focus:border-amber-500 focus:ring-amber-500 rounded-md shadow-sm px-4 py-2" type="number" name="price" value="{{ old('price', $product->price) }}" required />
                            @error('price')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 mr-4" href="{{ route('product.index') }}">
                                Cancel
                            </a>

                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-amber-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-400 focus:bg-amber-400 active:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Update Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
