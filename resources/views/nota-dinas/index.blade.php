@extends('layout.app')
@include('nota-dinas.modal.add')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @php
    if (session('open_tab') && session('disposisi_url')) {
    echo '<script>
    window.open("' . session('disposisi_url') . '", "_blank");
    </script>';
    }
    @endphp <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold m-0">Daftar Nota Dinas</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd">
                        Tambah Surat Nota Dinas
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Surat</th>
                                <th>Nomor Surat</th>
                                <th>Perihal</th>
                                <th>Tujuan</th>
                                <th>Bidang</th>
                                <th>Kasubbag Umum</th>
                                <th>Sekban</th>
                                <th>Kaban</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nota as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->tanggal}}</td>
                                <td>{{$item->nomor_surat}}</td>
                                <td>{{$item->perihal}}</td>
                                <td>{{$item->tujuan}}</td>
                                <td>{{$item->bidang}}</td>
                                <td>
                                    @if ($item->kasubbag_umum == 'Konfirmasi')
                                    <span class="tf-icons bx bx-check-circle text-success"></span>DiKonfirmasi pada
                                    tanggal
                                    {{$item->verified_kasubbag_umum}}
                                    @else
                                    <form action="{{route('nota-dinas.verified-kasubbag', $item->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Verifikasi Sekarang</button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->sekban == 'Konfirmasi')
                                    <span class="tf-icons bx bx-check-circle text-success"></span>DiKonfirmasi pada
                                    tanggal
                                    {{$item->verified_sekban}}
                                    @else
                                    <form action="{{route('nota-dinas.verified-sekban', $item->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Verifikasi Sekarang</button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->kaban == 'Konfirmasi')
                                    <span class="tf-icons bx bx-check-circle text-success"></span>DiKonfirmasi pada
                                    tanggal
                                    {{$item->verified_kaban}}
                                    @else
                                    <form action="{{route('nota-dinas.verified-kaban', $item->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Verifikasi Sekarang</button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    {{$item->catatan ? $item->catatan : '-'}}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                    <a href="#" class="btn btn-sm btn-primary">Cetak</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection