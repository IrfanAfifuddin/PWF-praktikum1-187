<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex justify-between items-end mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Product List</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Manage your product inventory here.</p>
                </div>
                
                <div class="flex space-x-4">
                    {{-- Tombol Export dilindungi oleh Gate 'export-product' --}}
                    @can('export-product')
                        <a href="{{ route('product.export') }}" class="text-amber-500 hover:text-amber-400 font-semibold text-sm flex items-center transition duration-150">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Export Product
                        </a>
                    @endcan
                    
                    {{-- Add Product (Dilindungi Policy Create) --}}
                    @can('create', App\Models\Product::class)
                        <a href="{{ route('product.create') }}" class="text-amber-500 hover:text-amber-400 font-semibold text-sm flex items-center transition duration-150">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Add Product
                        </a>
                    @endcan
                </div>
            </div>

            <div class="bg-white dark:bg-[#1f1f1f] border border-gray-200 dark:border-amber-500/30 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-0">
                    
                    @if(session('success'))
                        <div class="p-4 text-sm text-green-700 bg-green-100 dark:bg-green-900 dark:text-green-300 border-b dark:border-amber-500/30" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-amber-500/30">
                            <thead class="bg-gray-50 dark:bg-[#1f1f1f]">
                                <tr>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider">
                                        NAME
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider">
                                        QUANTITY
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider">
                                        PRICE
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider">
                                        OWNER
                                    </th>
                                    <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-500 dark:text-amber-600/80 uppercase tracking-wider">
                                        ACTIONS
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-[#1f1f1f] divide-y divide-gray-200 dark:divide-amber-500/30">
                                @forelse($products as $index => $product)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-[#252525] transition duration-150">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $product->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $product->qty }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-300">
                                            {{ $product->user ? $product->user->name : 'Unknown' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex space-x-3">
                                            
                                            {{-- View Icon --}}
                                            <a href="{{ route('product.show', $product->id) }}" class="text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-300 transition block">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                            </a>

                                            {{-- Edit Icon (Policy) --}}
                                            @can('update', $product)
                                                <a href="{{ route('product.edit', $product->id) }}" class="text-gray-400 hover:text-amber-500 dark:text-gray-500 dark:hover:text-amber-400 transition block">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                                </a>
                                            @endcan

                                            {{-- Delete Icon (Policy) --}}
                                            @can('delete', $product)
                                                <form action="{{ route('product.delete', $product->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-gray-400 hover:text-red-500 dark:text-gray-500 dark:hover:text-red-400 transition">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                    </button>
                                                </form>
                                            @endcan
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                            Belum ada produk (Silahkan tambahkan dari form atau gunakan Seeder)
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
