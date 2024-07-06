<?php

namespace App\Http\Controllers;

use App\Models\Undangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UndanganController extends Controller
{
    public function index()
    {
        $undangan = Undangan::get();
        return view('undangan.index', compact('undangan'));
    }
    public function getData()
    {
        $undangan = Undangan::get();
        return response()->json($undangan);
    }
    public function store(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'asal_surat' => 'required',
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'perihal' => 'required',
        ], [
            'asal_surat.required' => 'Asal Surat harus diisi',
            'nomor_surat.required' => 'Nomor Surat harus diisi',
            'tanggal_surat.required' => 'Tanggal Surat harus diisi',
            'tanggal_surat.date' => 'Tanggal Surat harus berupa tanggal yang valid',
            'perihal.required' => 'Perihal harus diisi',
        ]);

        // Jika validasi gagal, kembalikan dengan pesan error
        if ($validator->fails()) {
            flash()->addError('Kesalahan Dalam Memasukkan Data.');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Validasi berhasil, proses penyimpanan data
        $data = $validator->validated();
        
        $undangan = Undangan::create($data);
        $disposisiUrl = url()->route('disposisi', [
            'asal_surat' => $data['asal_surat'],
            'nomor_surat' => $data['nomor_surat'],
            'tanggal_surat' => $data['tanggal_surat'],
            'perihal' => $data['perihal'],
            'no_agenda' => $undangan['id'],
        ]);
        // Mengarahkan ke URL dengan parameter yang sesuai
        flash('Data berhasil dimasukkan.');
        return redirect()->route('undangan')
            ->with('open_tab', true)
            ->with('disposisi_url', $disposisiUrl);
    }

    public function verifiedKasubbag(Request $request, $id)
    {
        $undangan = Undangan::find($id);
        $undangan->update(['kasubbag_umum' => 'Konfirmasi','verified_kasubbag_umum'=>now()]);
        flash('Data berhasil di verifikasi.');
        return redirect()->route('undangan');
    }
    public function verifiedSekban(Request $request, $id)
    {
        $undangan = Undangan::find($id);
        $undangan->update(['sekban' => 'Konfirmasi','verified_sekban'=>now()]);
        flash('Data berhasil di verifikasi.');
        return redirect()->route('undangan');
    }
    public function verifiedKaban(Request $request, $id)
    {
        $undangan = Undangan::find($id);
        $undangan->update(['kaban' => 'Konfirmasi','verified_kaban'=>now()]);
        flash('Data berhasil di verifikasi.');
        return redirect()->route('undangan');
    }
    public function kasubbagTujuan(Request $request, $id)
    {
        $undangan = Undangan::find($id);
        $undangan->update(['to_kasubbag' => $request->kasubbag_tujuan,'catatan'=>$request->catatan]);
        flash('Data berhasil dituju ke .'.$request->kasubbag_tujuan);
        return redirect()->route('undangan');
    }
}