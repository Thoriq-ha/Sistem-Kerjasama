<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data User
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Add Data User
                </button>
                
                {{-- <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('usulan_kerjasama.store') }}" method="POST" data-parsley-validate
                            enctype="multipart/form-data">
                                    @csrf
                                     <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Nama Kerjasama</label>
                                            <input required type="text" name="nama_kerjasama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            <div id="emailHelp" class="form-text"></div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Deskeripsi Kerjasama</label>
                                            <textarea required class="form-control" name="deskripsi_kerjasama" id="" cols="30" rows="10"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Jenis Kerjasama</label>
                                            <select class="form-control" required name="jenis_kerjasama" id="">
                                                <option value="" selected>- Pilih Jenis Kerjasama -</option>
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
                                                <option value="" selected>- Pilih Bidang Kerjasama -</option>
                                                <option value="bidang1">Teknologi</option>
                                                <option value="bidang2">Politik</option>
                                                <option value="bidang3">Sosial</option>
                                                <option value="bidang4">Budaya</option>
                                                <option value="bidang5">Agama</option>
                                                <option value="bidang99">Lainnya</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tanggal Mulai</label>
                                            <input required type="date" name="tanggal_mulai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Tanggal Selesai</label>
                                            <input required type="date" name="tanggal_selesai" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">File Usulan</label>
                                            <input required type="file" name="file_usulan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-control" for="exampleInputEmail1" class="form-label">User</label>
                                            <option value="" selected>- Pilih User -</option>
                                            <select name="id_user" id="" required>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                </div> --}}
                <table class="table table-dark table-striped">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($user as $us)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <th>{{ $us->id }}</th>
                            <th>{{ $us->name }}</th>
                            <th>{{ $us->email }}</th>
                            <th>{{ $us->created_at}}</th>
                            <th>{{ $us->updated_at}}</th>
                            
                            <th>
                                {{-- <a href="{{ route('kerjasama.show', ['kerjasama' => $uk]) }}" class="btn btn-info mb-2">Detail</a> --}}


                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    Delete
                                </button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><span class="text-warning"></span></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body"><span class="text-warning">Apa anda yakin ingin menghapus data Usulan Kerjasama?</span>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                                            {{-- <form action="{{ route('usulan_kerjasama.destroy', ['usulan_kerjasama' => $us]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-success">Ya</button>
                                            </form> --}}
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
