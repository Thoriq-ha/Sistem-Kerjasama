<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="card" style="width: 100%;">

                    <div class="card-body">
                        <h3 class="card-title">Nama PIC : {{ $uk->kerjasama->user->name }}</h3>
                        <h3 class="card-title">Nama Lembaga : {{ $uk->kerjasama->user->nama_lembaga }}</h3>
                        <h5 class="card-title">Nama Kerjasama : {{ $uk->kerjasama->nama_kerjasama }}</h5>
                        <p class="card-text">Deskripsi Kerjasama : {{ $uk->kerjasama->deskripsi_kerjasama }}</p>
                        <li class="list-group-item">Jenis Kerjasama : {{ $uk->kerjasama->jenis_kerjasama }}</li>
                        <li class="list-group-item">Bidang Kerjasama : {{ $uk->kerjasama->bidang_kerjasama }}</li>
                        <li class="list-group-item">Tanggal Mulai : {{ $uk->tanggal_mulai }}</li>
                        <li class="list-group-item">Tanggal Selesai : {{ $uk->tanggal_selesai }}</li>
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Edit Data Usulan
                        </button>
                        <a href="{{ route('usulan_kerjasama.index') }}" class="btn btn-danger mt-3">Kembali</a>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Usulan Kerjasama</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('usulan_kerjasama.update', $uk) }}" method="POST"
                                data-parsley-validate enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Kerjasama</label>
                                        <select class="form-control" required name="id_kerjasama" id="">
                                            <option value="" selected>- Pilih Kerjasama -</option>
                                            @foreach ($kerjasamas as $kerjasama)
                                                <option value="{{ $kerjasama->id }}"
                                                    {{ $kerjasama->id == $uk->id_kerjasama ? 'selected' : '' }}>
                                                    {{ $kerjasama->nama_kerjasama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tanggal Mulai
                                            ({{ $uk->tanggal_mulai }})</label>
                                        <input required type="date" name="tanggal_mulai" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Tanggal Selesai
                                            ({{ $uk->tanggal_selesai }})</label>
                                        <input required type="date" name="tanggal_selesai" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
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
            </div>
        </div>
    </div>
</x-app-layout>
