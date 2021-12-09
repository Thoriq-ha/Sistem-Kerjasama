<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mitra
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data Mitra
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('mitra.store') }}" method="POST" data-parsley-validate
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Lembaga</label>
                                        <input required type="text" name="nama_lembaga" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                                        <input required type="text" name="jenis_lembaga" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No. </th>
                            <th scope="col">Nama Lembaga</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mitras as $mts)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $mts->nama_lembaga }}</th>
                                <th>{{ $mts->jenis_lembaga }}</th>
                                <th>
                                    <a href="{{ route('mitra.show', ['mitra' => $mts]) }}"
                                        class="btn btn-info mb-2">Detail</a>


                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal2{{ $mts->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal2{{ $mts->id }}" tabindex="-1"
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
                                                        ingin menghapus data Mitra?</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Tidak</button>
                                                    <form action="{{ route('mitra.destroy', ['mitra' => $mts]) }}"
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
