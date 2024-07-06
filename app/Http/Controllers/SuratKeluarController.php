<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $surat = SuratKeluar::get();
        return view('surat-keluar.index', compact('surat'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_surat' => 'required',
            'nomor_surat' => 'required',
            'perihal' => 'required',
            'tujuan' => 'required',
        ], [
            'tanggal_surat.required' => 'Tanggal Surat harus diisi',
            'nomor_surat.required' => 'Nomor Surat harus diisi',
            'perihal.required' => 'Perihal harus diisi',
            'tujuan.required' => 'Tujuan harus diisi',
        ]);

        if ($validator->fails()) {
            flash()->addError('Kesalahan Dalam Memasukkan Data.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $keluar = SuratKeluar::create($data);
        $disposisiUrl = url()->route('disposisi', [
            'nomor_surat' => $data['nomor_surat'],
            'tanggal_surat' => $data['tanggal_surat'],
            'perihal' => $data['perihal'],
            'no_agenda' => $keluar['id'],
        ]);
        flash('Data berhasil dimasukkan.');
        return redirect()->route('surat-keluar')
            ->with('open_tab', true)
            ->with('disposisi_url', $disposisiUrl);;
    }
    public function verifiedKasubbag(Request $request, $id)
    {
        $undangan = SuratKeluar::find($id);
        $undangan->update(['kasubbag_umum' => 'Konfirmasi','verified_kasubbag_umum'=>now()]);
        flash('Data berhasil di verifikasi.');
        return redirect()->route('surat-keluar');
    }
    public function verifiedSekban(Request $request, $id)
    {
        $undangan = SuratKeluar::find($id);
        $undangan->update(['sekban' => 'Konfirmasi','verified_sekban'=>now()]);
        flash('Data berhasil di verifikasi.');
        return redirect()->route('surat-keluar');
    }
    public function verifiedKaban(Request $request, $id)
    {
        $undangan = SuratKeluar::find($id);
        $undangan->update(['kaban' => 'Konfirmasi','verified_kaban'=>now()]);
        flash('Data berhasil di verifikasi.');
        return redirect()->route('surat-keluar');
    }
    public function bidangTujuan(Request $request, $id)
    {
        $undangan = SuratKeluar::find($id);
        $undangan->update(['bidang' => $request->bidang]);
        flash('Data berhasil dituju ke '.$request->bidang);
        return redirect()->route('surat-keluar');
    }
}