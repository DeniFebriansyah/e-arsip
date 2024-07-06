@extends('layout.app')
@include('surat-keluar.modal.add')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    @php
    if (session('open_tab') && session('disposisi_url')) {
    echo '<script>
    window.open("' . session('disposisi_url') . '", "_blank");
    </script>';
    }
    @endphp
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="fw-bold m-0">Daftar Surat Keluar</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd">
                        Tambah Surat Keluar
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="surat-keluar-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Perihal</th>
                                <th>Tujuan</th>
                                <th>Kasubbag Umum</th>
                                <th>Sekban</th>
                                <th>Kaban</th>
                                <th>Bidang</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($surat as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{ $item->tanggal_surat }}</td>
                                <td>{{ $item->perihal }}</td>
                                <td>{{ $item->tujuan }}</td>
                                <td>
                                    @if ($item->kasubbag_umum == 'Konfirmasi')
                                    <span class="tf-icons bx bx-check-circle text-success"></span>DiKonfirmasi pada
                                    tanggal
                                    {{$item->verified_kasubbag_umum}}
                                    @else
                                    <form action="{{route('surat-keluar.verified-kasubbag', $item->id)}}" method="post">
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
                                    <form action="{{route('surat-keluar.verified-sekban', $item->id)}}" method="post">
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
                                    <form action="{{route('surat-keluar.verified-kaban', $item->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Verifikasi Sekarang</button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->kaban == 'Konfirmasi')
                                    @if (!empty($item->bidang))
                                    {{$item->bidang}}
                                    @else
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#bidangTujuan" onclick="bidangTujuan({{$item->id}})">
                                        Tujuan Kasubbag
                                    </button>
                                    @include('surat-keluar.modal.bidang-tujuan',['id'=>$item->id])
                                    @endif
                                    @else
                                    Belum Dikonfirmasi Kaban
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-warning">Edit</a>
                                    <a href="" class="btn btn-danger">Hapus</a>
                                    <a href="" class="btn btn-success">Print</a>
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
@section('script')
<script>
$(document).ready(function() {
    $('#surat-keluar-table').DataTable({
        scrollY: true
    });
});
</script>

@endsection