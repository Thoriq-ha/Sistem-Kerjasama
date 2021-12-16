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
                            <th scope="col">PIC</th>
                            <th scope="col">Mitra</th>
                            <th scope="col">Status</th>
                            <th scope="col">Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayats as $rw)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <th>{{ $rw->usulan->kerjasama->nama_kerjasama }}</th>
                                <th>{{ $rw->usulan->kerjasama->user->name }}</th>
                                <th>{{ $rw->usulan->kerjasama->user->nama_lembaga }}</th>
                                <th>
                                    @php
                                        $now = Carbon\Carbon::now()->format('Y-m-d');
                                    @endphp
                                    @if ($rw->status == 'PENDING')
                                        <span class="badge rounded-pill bg-warning text-dark">PENDING</span>
                                    @elseif ($rw->status == 'REJECTED')
                                        <span class="badge rounded-pill bg-danger">REJECTED / REVISION</span>
                                    @elseif ($rw->status == 'ACCEPTED')
                                        @if ($now >= $rw->usulan->tanggal_mulai && $now <= $rw->usulan->tanggal_selesai)
                                            <span class="badge rounded-pill bg-success">ACCEPTED / In Progress</span>
                                        @elseif ($now > $rw->usulan->tanggal_selesai)
                                            <span class="badge rounded-pill bg-warning text-dark">ACCEPTED / DONE</span>
                                        @elseif ($now < $rw->usulan->tanggal_mulai)
                                                <span class="badge rounded-pill bg-warning text-dark">ACCEPTED / COMMING
                                                    SOON</span>
                                        @endif
                                    @endif
                                </th>
                                <th>{{ $rw->catatan }}</th>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
