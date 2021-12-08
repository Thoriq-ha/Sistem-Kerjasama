<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kerjasama
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Tambah Data Kerjasama
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
                            <form action="{{ route('kerjasama.store') }}" method="POST" data-parsley-validate
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Mitra</label>
                                        <select name="id_mitra" id="" class="form-control">
                                            <option value="">- Pilih Mitra -</option>
                                            @foreach ($mitras as $mitra)
                                                <option value="{{ $mitra->id }}">{{ $mitra->nama_lembaga }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div id="emailHelp" class="form-text"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama Kerjasama</label>
                                        <input required type="text" name="nama_kerjasama" class="form-control"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                        <div id="emailHelp" class="form-text"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Deskripsi
                                            Kerjasama</label>
                                        <textarea required class="form-control" name="deskripsi_kerjasama" id=""
                                            cols="30" rows="10"></textarea>
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
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">File Kerjasama</label>
                                        <input required type="file" name="file_kerjasama" class="form-control"
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
                            <th scope="col">Mitra (Lembaga)</th>
                            <th scope="col">Nama Kerjasama</th>
                            <th scope="col">Jenis Kerjasama</th>
                            <th scope="col">Bidang Kerjasama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kerjasamas as $krjs)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $krjs->mitra->nama_lembaga }}</th>
                                <th>{{ $krjs->nama_kerjasama }}</th>
                                <th>{{ $krjs->jenis_kerjasama }}</th>
                                <th>{{ $krjs->bidang_kerjasama }}</th>
                                <th>
                                    <a href="{{ route('kerjasama.show', ['kerjasama' => $krjs]) }}"
                                        class="btn btn-info mb-2">Detail</a>


                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal2{{ $krjs->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal2{{ $krjs->id }}" tabindex="-1"
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
                                                        ingin menghapus data Kerjasama?</span>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Tidak</button>
                                                    <form
                                                        action="{{ route('kerjasama.destroy', ['kerjasama' => $krjs]) }}"
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
