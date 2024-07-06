<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SuratMasukController extends Controller
{
    public function index()
    {
        $surat = SuratMasuk::get();
        return view('surat-masuk.index', compact('surat'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'asal_surat' => 'required',
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required',
            'perihal' => 'required',
        ], [
            'asal_surat.required' => 'Asal surat harus diisi',
            'nomor_surat.required' => 'Nomor surat harus diisi',
            'tanggal_surat.required' => 'Tanggal surat harus diisi',
            'perihal.required' => 'Perihal harus diisi',
        ]);
        if ($validator->fails()) {
            flash()->addError('Kesalahan Memasukkan Data');
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $validatedData = $validator->validate();
        $surat = SuratMasuk::create($validatedData);
        flash()->addSuccess('Berhasil Menambahkan Data');
        return redirect()->route('surat-masuk');
    }
    public function verifiedKasubbag(Request $request, $id)
    {
        $undangan = SuratMasuk::find($id);
        $undangan->update(['kasubbag_umum' => 'Konfirmasi','verified_kasubbag_umum'=>now()]);
        flash('Data berhasil di verifikasi.');
        return redirect()->route('surat-masuk');
    }
    public function verifiedSekban(Request $request, $id)
    {
        $undangan = SuratMasuk::find($id);
        $undangan->update(['sekban' => 'Konfirmasi','verified_sekban'=>now()]);
        flash('Data berhasil di verifikasi.');
        return redirect()->route('surat-masuk');
    }
    public function verifiedKaban(Request $request, $id)
    {
        $undangan = SuratMasuk::find($id);
        $undangan->update(['kaban' => 'Konfirmasi','verified_kaban'=>now()]);
        flash('Data berhasil di verifikasi.');
        return redirect()->route('surat-masuk');
    }
    public function bidangTujuan(Request $request, $id)
    {
        $undangan = SuratMasuk::find($id);
        $undangan->update(['to_kasubbag' => $request->bidang]);
        flash('Data berhasil dituju ke '.$request->bidang);
        return redirect()->route('surat-masuk');
    }
}