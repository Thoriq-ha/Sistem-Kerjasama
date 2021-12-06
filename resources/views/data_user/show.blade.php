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
                        <h3 class="card-title">Nama Pengaju : {{ $uk->user->name }}</h3>
                      <h5 class="card-title">Nama Kerjasama : {{ $uk->nama_kerjasama }}</h5>
                      <p class="card-text">Deskripsi Kerjasama : {{ $uk->deskripsi_kerjasama }}</p>
                      <li class="list-group-item">Jenis Kerjasama : {{ $uk->jenis_kerjasama }}</li>
                      <li class="list-group-item">Bidang Kerjasama : {{ $uk->bidang_kerjasama }}</li>
                      <li class="list-group-item">Tanggal Mulai : {{ $uk->tanggal_mulai }}</li>
                      <li class="list-group-item">Tanggal Selesai : {{ $uk->tanggal_selesai }}</li>
                      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Edit Data Usulan
                    </button>
                      <a href="{{ route('usulan_kerjasama.index') }}" class="btn btn-danger mt-3">Kembali</a>
                    </div>
                  </div>
                  <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('usulan_kerjasama.update', $uk) }}" method="POST" data-parsley-validate
                            enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                     <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Kerjasama</label>
                                            <input required type="text" value="{{ $uk->nama_kerjasama }}" name="nama_kerjasama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            <div id="emailHelp" class="form-text"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Deskripsi Kerjasama</label>
                                            <textarea required class="form-control" name="deskripsi_kerjasama" id="" cols="30" rows="10">{{ $uk->deskripsi_kerjasama }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Jenis Kerjasama</label>
                                            <select class="form-control" required name="jenis_kerjasama" id="">
                                                <option value="kerjasama1">Swasta - Perusahaan</option>
                                                <option value="kerjasama2">Swasta - LGO</option>
                                                <option value="kerjasama3">Goverment - Perda</option>
                                                <option value="kerjasama4">Goverment - Pusat</option>
                                                <option value="kerjasama5">Pendidikan - Menengah</option>
                                                <option value="kerjasama6">Pendidikan - Tinggi</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Bidang Kerjasama</label>
                                            <select class="form-control" required name="bidang_kerjasama" id="">
                                                <option value="">- Pilih Bidang Kerjasama -</option>
                                                <option value="bidang1">Teknologi</option>
                                                <option value="bidang2">Politik</option>
                                                <option value="bidang3">Sosial</option>
                                                <option value="bidang4">Budaya</option>
                                                <option value="bidang5">Agama</option>
                                                <option value="bidang99">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tanggal Mulai - ({{ $uk->tanggal_mulai }})</label>
                                            <input required type="date" name="tanggal_mulai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tanggal Selesai - ({{ $uk->tanggal_selesai }})</label>
                                            <input required type="date" name="tanggal_selesai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">File Usulan</label>
                                            <input required type="file" name="file_usulan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">User</label>
                                            <select class="form-control" name="id_user" id="" required>
                                                <option value="">- Pilih User -</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}" {{ $user->id == $uk->user->id  ? 'selected' : '' }}>{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
