<x-app-layout>
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white">Add Category</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Fill in the details to add a new category</p>
            </div>

            <div class="bg-white dark:bg-[#1f1f1f] border border-gray-200 dark:border-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('category.store') }}">
                        @csrf
                        
                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-2">Category</label>
                            <input id="name" class="block w-full border-gray-300 dark:border-gray-700 dark:bg-[#252525] dark:text-white focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm px-4 py-2" type="text" name="name" value="{{ old('name') }}" placeholder="Electronic" autofocus autocomplete="name" />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end mt-6">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 mr-4" href="{{ route('category.index') }}">
                                Cancel
                            </a>

                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                Save Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
