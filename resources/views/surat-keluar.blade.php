@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Surat Keluar</h1>
    <table id="surat-keluar-table" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Perihal</th>
                <th>Tujuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suratKeluar as $surat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->nomor_surat }}</td>
                <td>{{ $surat->tanggal }}</td>
                <td>{{ $surat->perihal }}</td>
                <td>{{ $surat->tujuan }}</td>
                <td>
                    <a href="{{ route('surat-keluar.show', $surat->id) }}" class="btn btn-primary btn-sm">Lihat</a>
                    <a href="{{ route('surat-keluar.edit', $surat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('surat-keluar.destroy', $surat->id) }}" method="POST"
                        style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#surat-keluar-table').DataTable();
});
</script>
@endpush