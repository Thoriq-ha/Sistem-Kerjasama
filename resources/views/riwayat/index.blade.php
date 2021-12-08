<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Usulan Kerjasama
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table table-dark table-striped  w-auto text-xsmall">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Kerjasama</th>
                            <th scope="col">Mitra</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usulankerjasama as $uk)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $uk->kerjasama->nama_kerjasama }}</th>
                                <th>{{ $uk->kerjasama->mitra->nama_lembaga }}</th>
                                <th>AKTIF</th>
                                <th>
                                    <a href="{{ route('usulan_kerjasama.show', ['usulan_kerjasama' => $uk]) }}"
                                        class="btn btn-info mb-2">Detail</a>


                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal2{{ $uk['id'] }}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal2{{ $uk['id'] }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><span
                                                            class="text-warning"></span></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body"><span class="text-warning">Apa anda yakin
                                                        ingin menghapus data Usulan Kerjasama?</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Tidak</button>
                                                    <form
                                                        action="{{ route('usulan_kerjasama.destroy', ['usulan_kerjasama' => $uk]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-success">Ya</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
