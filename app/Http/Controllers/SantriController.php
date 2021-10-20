<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Santri::get();
        if (request()->ajax()) {
            return datatables()->of($data)
            ->addColumn('aksi', function ($data) {
                $btn = "<a href='#' class='btn btn-icon btn-primary mb-2 edit-data' id='". $data->uid."' data-bs-toggle='modal' data-bs-target='#edit-modal'><i class='far fa-edit'></i></a>";
                $btn .= "<a href='#' class='btn btn-icon btn-danger delete-data' id='". $data->uid."'><i class='far fa-trash-alt'></i></a>";
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
        }
        return view('dashboard', compact('data', $data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_validation($request);
        $data = new Santri();
        $data->uid = $request->uid;
        $data->passwd = 'santri';
        $data->nama = $request->nama;
        $data->foto = '';
        $data->cabang_sekarang = $request->cabang_sekarang;
        $data->panggilan = $request->panggilan;
        $data->kota_asal = $request->kota_asal;
        $data->no_telp = $request->no_telp;
        $data->nama_ortu = $request->nama_ortu;
        $data->no_telp_ortu = $request->no_telp_ortu;
        $data->alamat = $request->alamat;
        $data->email = $request->email;
        $data->tgl_join = $request->tgl_join;
        $data->status_santri = $request->status_santri;
        $data->fb = $request->fb;
        $data->fokus = $request->fokus;
        $save = $data->save();
        if ($save) {
            return response()->json([
                'data' => $data,
                'msg' => 'data berhasil disimpan'
            ], 200);
        } else {
            return response()->json([
                'data' => $data,
                'msg' => 'data gagal disimpan'
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function show(Santri $santri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $uid = $request->uid;
        $data = Santri::where('uid', $uid)->first();
        return response()->json(['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Santri $santri)
    {
        $this->_validationUpdate($request);
        $uid = $request->uid;
        $datas = [
            'passwd' => 'santri',
            'nama' => $request->nama,
            'foto' => '',
            'cabang_sekarang' => $request->cabang_sekarang,
            'panggilan' => $request->panggilan,
            'kota_asal' => $request->kota_asal,
            'no_telp' => $request->no_telp,
            'nama_ortu' => $request->nama_ortu,
            'no_telp_ortu' => $request->no_telp_ortu,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'tgl_join' => $request->tgl_join,
            'status_santri' => $request->status_santri,
            'fb' => $request->fb,
            'fokus' => $request->fokus
        ];
        $data = Santri::where('uid', $uid);
        $edit = $data->update($datas);
        if ($edit) {
            return response()->json([
                'data' => $datas,
                'msg' => 'data berhasil di edit'
            ], 200);
        } else {
            return response()->json([
                'data' => $datas,
                'msg' => 'data gagal di edit'
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Santri  $santri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $uid = $request->uid;
        $data = Santri::where('uid', $uid);
        $data->delete();
        return response()->json([
            'msg' => 'Data berhasi dihapus'
        ]);
    }

    private function _validation(Request $request)
    {
        $message = [
            'required' => 'Kolom harus diisi',
            'number' => 'Data bukan angka',
            'email' => 'Data bukan email',
            'date' => 'Data bukan tanggal',
            'numeric' => 'Data harus angka',
            'uid.unique' => 'UID sudah dipakai',
            'email.unique' => 'Email sudah dipakai'
        ];

        $validation = $request->validate([
            'uid' => 'required|unique:santri,uid',
            'nama' => 'required',
            'cabang_sekarang' => 'required',
            'panggilan' => 'required',
            'kota_asal' => 'required',
            'no_telp' => 'required|numeric',
            'nama_ortu' => 'required',
            'no_telp_ortu' => 'required|numeric',
            'alamat' => 'required',
            'email' => 'required|email|unique:santri,email',
            'tgl_join' => 'required|date',
            'status_santri' => 'required',
            'fb' => 'required',
            'fokus' => 'required',
        ],$message);
    }

    private function _validationUpdate(Request $request)
    {
        $message = [
            'required' => 'Kolom harus diisi',
            'number' => 'Data bukan angka',
            'email' => 'Data bukan email',
            'date' => 'Data bukan tanggal',
            'numeric' => 'Data harus angka'
        ];

        $validation = $request->validate([
            'uid' => 'required',
            'nama' => 'required',
            'cabang_sekarang' => 'required',
            'panggilan' => 'required',
            'kota_asal' => 'required',
            'no_telp' => 'required|numeric',
            'nama_ortu' => 'required',
            'no_telp_ortu' => 'required|numeric',
            'alamat' => 'required',
            'email' => 'required|email',
            'tgl_join' => 'required|date',
            'status_santri' => 'required',
            'fb' => 'required',
            'fokus' => 'required',
        ],$message);
    }
}
