<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistik') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX DataTable
            $(document).ready(function() {
             $.fn.dataTable.moment( 'DD/MM/YYYY' );

            var datatable = $('#crudTable').DataTable({
                ajax: {
                    url: '{!! url()->current() !!}',
                },
                columns: [
                    { data: 'id', name: 'id', width: '5%'},
                    { data: 'products.name', name: 'products.name' },
                    { data: 'terjual', name: 'terjual' },
                    { data: 'tgl_transaksi', name: 'tgl_transaksi'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '25%'
                    },
                ],
            });
        });
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('dashboard.statistik.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    + Tambah data
                </a>
                <a href="{{ route('dashboard.laporan.index') }}" class="ml-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded shadow-lg">
                    Lihat laporan
                </a>
            </div>
            <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Terjual</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

