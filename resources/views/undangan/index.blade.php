@extends('layout.app')
@include('undangan.modal.add')
@section('content')
@inject('carbon', 'Carbon\Carbon')
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
                    <h4 class="fw-bold m-0">Daftar Undangan</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladd">
                        Tambah Surat Undangan
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive" id="undanganTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Asal Surat</th>
                                <th>Nomor Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Perihal</th>
                                <th>Kasubbag Umum</th>
                                <th>Sekban</th>
                                <th>Kaban</th>
                                <th>Kasubbag Dituju</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($undangan as $key => $item)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $item->asal_surat }}</td>
                                <td>{{ $item->nomor_surat }}</td>
                                <td>{{$carbon::parse($item->tanggal_surat)->isoFormat('D MMMM Y')}}</td>
                                <td>{{ $item->perihal }}</td>
                                <td>
                                    @if ($item->kasubbag_umum == 'Konfirmasi')
                                    <span class="tf-icons bx bx-check-circle text-success"></span>DiKonfirmasi pada
                                    tanggal
                                    {{$item->verified_kasubbag_umum}}
                                    @else
                                    <form action="{{route('undangan.verified-kasubbag', $item->id)}}" method="post">
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
                                    <form action="{{route('undangan.verified-sekban', $item->id)}}" method="post">
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
                                    <form action="{{route('undangan.verified-kaban', $item->id)}}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Verifikasi Sekarang</button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->kaban == 'Konfirmasi')
                                    @if (!empty($item->to_kasubbag))
                                    {{$item->to_kasubbag}}
                                    @else
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#kasubbagTujuan" onclick="kasubbagTujuan({{$item->id}})">
                                        Tujuan Kasubbag
                                    </button>
                                    @include('undangan.modal.kasubbag-tujuan',['id'=>$item->id])
                                    @endif
                                    @else
                                    Belum Dikonfirmasi Kaban
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
<script>
let data = '<?php echo json_encode($undangan) ?>'
data = JSON.parse(data)

function kasubbagTujuan(id) {
    var usedData = data.find(item => item.id === id)
    console.log(id)
    $('#id').val(id);
}
</script>
@endsection
@section('script')
<script>
$(document).ready(function() {
    $('#undanganTable').DataTable({
        scrollY: true
    });
});
</script>
@endsection