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
                        <h3 class="card-title">Nama Mitra : {{ $kerjasama->mitra->nama_lembaga }}</h3>
                        <h3 class="card-title">File Kerjasama : {{ $kerjasama->file_kerjasama }}</h3>
                        <h3 class="card-title">Nama Kerjasama : {{ $kerjasama->nama_kerjasama }}</h3>
                        <h3 class="card-title">Deskripsi Kerjasama : {{ $kerjasama->deskripsi_kerjasama }}</h3>
                        <h3 class="card-title">Jenis Kerjasama : {{ $kerjasama->jenis_kerjasama }}</h3>
                        <h3 class="card-title">Bidang Kerjasama : {{ $kerjasama->bidang_kerjasama }}</h3>
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Edit Data Kerjasama
                        </button>
                        <a href="{{ route('kerjasama.index') }}" class="btn btn-danger mt-3">Kembali</a>
                    </div>
                </div>
                <!-- Button trigger modal -->
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
                            <form action="{{ route('kerjasama.update', $kerjasama) }}" method="POST"
                                data-parsley-validate enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Mitra</label>
                                        <select name="id_mitra" id="" class="form-control">
                                            <option value="">- Pilih Mitra -</option>
                                            @foreach ($mitras as $mitra)
                                                <option value="{{ $mitra->id }}"
                                                    {{ $mitra->id == $kerjasama->id_mitra ? 'selected' : '' }}>
                                                    {{ $mitra->nama_lembaga }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div id="emailHelp" class="form-text"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Kerjasama</label>
                                        <input required type="text" value="{{ $kerjasama->nama_kerjasama }}"
                                            name="nama_kerjasama" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Deskeripsi
                                            Kerjasama</label>
                                        <textarea required class="form-control" name="deskripsi_kerjasama" id=""
                                            cols="30" rows="10">{{ $kerjasama->deskripsi_kerjasama }}"</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Jenis Kerjasama</label>
                                        <select class="form-control" required name="jenis_kerjasama" id="">
                                            <option value="" selected>- Pilih Jenis Kerjasama -</option>
                                            <option value="Swasta-Perusahaan">Swasta-Perusahaan</option>
                                            <option value="Swasta-LGO">Swasta-LGO</option>
                                            <option value="Goverment-Perda">Goverment-Perda</option>
                                            <option value="Goverment-Pusat">Goverment-Pusat</option>
                                            <option value="Pendidikan-Menengah">Pendidikan-Menengah</option>
                                            <option value="Pendidikan-Tinggi">Pendidikan-Tinggi</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Bidang Kerjasama</label>
                                        <select class="form-control" required name="bidang_kerjasama" id="">
                                            <option value="" selected>- Pilih Bidang Kerjasama -</option>
                                            <option value="Teknologi">Teknologi</option>
                                            <option value="Politik">Politik</option>
                                            <option value="Sosial">Sosial</option>
                                            <option value="Budaya">Budaya</option>
                                            <option value="Agama">Agama</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
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
