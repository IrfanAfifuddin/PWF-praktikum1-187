<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Biodata Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Data Diri</h3>
                    <table class="table-auto w-full text-left">
                        <tr>
                            <td class="pr-4 font-semibold">Nama</td>
                            <td>: Irfan Afifuddin</td>
                        </tr>
                        <tr>
                            <td class="pr-4 font-semibold">NIM</td>
                            <td>: 20230140187</td>
                        </tr>
                        <tr>
                            <td class="pr-4 font-semibold">Program Studi</td>
                            <td>: Teknologi Informasi (S-1)</td>
                        </tr>
                        <tr>
                            <td class="pr-4 font-semibold">Hobi</td>
                            <td>: touring</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>