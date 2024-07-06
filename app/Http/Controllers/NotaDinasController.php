<?php

namespace App\Http\Controllers;

use App\Models\NotaDinas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotaDinasController extends Controller
{
    public function index(){
        $nota = NotaDinas::get();
        return view('nota-dinas.index',compact('nota'));
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'nomor_surat' => 'required',
            'perihal' => 'required',
            'tujuan' => 'required',
            'bidang' => 'required',
        ], [
            'tanggal.required' => 'Tanggal harus diisi',
            'nomor_surat.required' => 'Nomor surat harus diisi',
            'perihal.required' => 'Perihal harus diisi',
            'tujuan.required' => 'Tujuan harus diisi',
            'bidang.required' => 'Bidang harus diisi',
        ]);

        // Jika validasi gagal, kembalikan dengan pesan error
        if ($validator->fails()) {
            flash()->addError('Kesalahan Dalam Memasukkan Data.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validasi berhasil, proses penyimpanan data
        $validatedData = $validator->validated();

        // Simpan data ke database
        NotaDinas::create($validatedData);
        flash('Data berhasil dimasukkan.');
        // Redirect atau lakukan tindakan lain setelah menyimpan data
        return redirect()->route('nota-dinas')->with('success', 'Nota Dinas berhasil disimpan.');
    }
    public function verifiedKasubbag(Request $request, $id)
    {
        $nota = NotaDinas::find($id);
        $nota->update(['kasubbag_umum' => 'Konfirmasi','verified_kasubbag_umum'=>now()]);
        flash('Data berhasil di verifikasi.');
        return redirect()->route('nota-dinas');
    }
    public function verifiedSekban(Request $request, $id)
    {
        $nota = NotaDinas::find($id);
        $nota->update(['sekban' => 'Konfirmasi','verified_sekban'=>now()]);
        flash('Data berhasil di verifikasi.');
        return redirect()->route('nota-dinas');
    }
    public function verifiedKaban(Request $request, $id)
    {
        $nota = NotaDinas::find($id);
        $nota->update(['kaban' => 'Konfirmasi','verified_kaban'=>now()]);
        flash('Data berhasil di verifikasi.');
        return redirect()->route('nota-dinas');
    }
}