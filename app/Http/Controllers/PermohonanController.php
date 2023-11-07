<?php

namespace App\Http\Controllers;

use App\Permohonan;
use App\Pengguna;
use App\Penduduk;
use Illuminate\Http\Request;
use App\Http\Requests\PermohonanRequest;
use App\Artikel;
use App\History;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ArtikelRequest;
use App\Mail\MailConfirmation;
use Illuminate\Support\Facades\Mail;

class PermohonanController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
        // $this->middleware('admin', ['only' => [
        //     'validasiPermohonan', 'create', 'edit', 'store', 'update'
        // ]]);

        // $this->middleware('ketua_rt', ['only' => [
        //     'validasiPermohonan', 'create', 'edit', 'store', 'update'
        // ]]);


        // $this->middleware('pengguna', ['only' => [
        //     'create', 'edit', 'store', 'update'
        // ]]);
    }

    public function index()
    {
        if (Session::has('pengguna')) {
            $daftar_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->where('permohonan.id_user', Session::get('id'))
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();
        } elseif (Session::has('ketua_rt')) {
            $pengguna = Pengguna::findOrFail(Session::get('id'));
            $penduduk = Penduduk::findOrFail($pengguna->id_penduduk);
            $daftar_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->where('permohonan.rt_domisili', $penduduk->rt)
                ->where('permohonan.rw_domisili', $penduduk->rw)
                ->where('permohonan.status', 0)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_semua_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->where('permohonan.rt_domisili', $penduduk->rt)
                ->where('permohonan.rw_domisili', $penduduk->rw)
                ->Where('permohonan.status', '!=', 4)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_permohonan_disetujui = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', 4)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();
        } elseif (Session::has('ketua_rw')) {
            $pengguna = Pengguna::findOrFail(Session::get('id'));
            $penduduk = Penduduk::findOrFail($pengguna->id_penduduk);
            $daftar_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->where('permohonan.rw_domisili', $penduduk->rw)
                ->where('permohonan.status', 1)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_semua_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->where('permohonan.rw_domisili', $penduduk->rw)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_permohonan_disetujui = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', 4)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();
        } elseif (Session::has('admin') || Session::has('staff')) {
            $daftar_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', '!=', 4)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_semua_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_permohonan_disetujui = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', 4)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();
        } elseif (Session::has('kasi')) {
            $daftar_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', 2)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_semua_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_permohonan_disetujui = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', 4)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();
        } elseif (Session::has('lurah')) {
            $daftar_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', 3)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_semua_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_permohonan_disetujui = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', '!=', 4)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();
        }

        // $daftar_permohonan_count = $daftar_permohonan->total();
        $update_terakhir = Permohonan::orderBy('updated_at', 'desc')->first();
        return view('permohonan.index', compact('daftar_permohonan', 'update_terakhir', 'daftar_semua_permohonan', 'daftar_permohonan_disetujui'));
        
    }

    public function create()
    {
        return view('permohonan.create');
    }

    public function store(PermohonanRequest $request)
    {
        $input = $request->all();
        // $input['slug_artikel'] = Str::slug($input['judul_artikel'], '-');
        // $input->id_user = Session::get('id');
        Permohonan::create($input);
        Session::flash('pesan', 'Permohonan Berhasil Ditambah');
        return redirect('permohonan');
    }

    public function show(Permohonan $permohonan)
    {
        $permohonan_detail = DB::table('permohonan')
            ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
            ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
            ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
            ->where('permohonan.id_permohonan', $permohonan->id_permohonan)
            ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
            ->get();
        return view('permohonan.detail', compact('permohonan', 'permohonan_detail'));
    }

    public function edit(Permohonan $permohonan)
    {
        echo $permohonan;
        return view('permohonan.edit', compact('permohonan'));
    }

    public function update(PermohonanRequest $request, Permohonan $permohonan)
    {
        $input = $request->all();
        // $input['slug_artikel'] = Str::slug($input['judul_artikel'], '-');
        // $input->id_user = Session::get('id');
        $permohonan->update($input);
        Session::flash('pesan', 'Permohonan Berhasil Ditambah');
        return redirect('permohonan');
    }

    public function destroy(Permohonan $permohonan)
    {
        $permohonan->delete();
        Session::flash('pesan', '1 Permohonan Berhasil Dihapus');
        return redirect('permohonan');
    }

    public function cari(Request $request)
    {
        // TODO : cari permohonan
        $nik_permohonan = trim($request->input('nik'));
        if (!empty($nik_permohonan)) {
            if (Session::has('pengguna')) {
                $query = Artikel::where('judul_artikel', 'like', '%' . $request->judul_artikel . '%')->where('id_pengguna', Session::get('id'));
                $daftar_artikel_invalid = Artikel::where('is_valid', 'tidak')->paginate(25)->where('id_pengguna', Session::get('id'));
            } else {
                $query = Artikel::where('judul_artikel', 'like', '%' . $request->judul_artikel . '%');
                $daftar_artikel_invalid = Artikel::where('is_valid', 'tidak')->paginate(25);
            }
            $daftar_artikel = $query->paginate(25);
            $pagination = $daftar_artikel->appends($request->except('page'));
            $update_terakhir = Artikel::orderBy('updated_at', 'desc')->first();

            return view('artikel.index', compact('daftar_artikel', 'judul_artikel', 'pagination', 'update_terakhir', 'daftar_artikel_invalid'));
        }
        return redirect('artikel');
    }

    private function uploadGambar(ArtikelRequest $request)
    {
        $gambar = $request->file('gambar_artikel');
        $ext = $gambar->getClientOriginalExtension();
        if ($request->file('gambar_artikel')->isValid()) {
            $gambar_name = date('YmdHis') . ".$ext";
            $upload_path = 'assets-dashboard/images';
            $request->file('gambar_artikel')->move($upload_path, $gambar_name);
            return $gambar_name;
        }
        return false;
    }

    private function hapusGambar(Artikel $artikel)
    {
        $gambar = 'assets-dashboard/images/' . $artikel->gambar_artikel;
        if (file_exists($gambar) && isset($artikel->gambar_artikel)) {
            $delete = unlink($gambar);
            if ($delete) {
                return true;
            }
            return false;
        }
    }
    public function history()
    {
        if (Session::has('pengguna')) {
            $daftar_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->where('permohonan.id_user', Session::get('id'))
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();
        } elseif (Session::has('ketua_rt')) {
            $pengguna = Pengguna::findOrFail(Session::get('id'));
            $penduduk = Penduduk::findOrFail($pengguna->id_penduduk);
            $daftar_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->where('permohonan.rt_domisili', $penduduk->rt)
                ->where('permohonan.rw_domisili', $penduduk->rw)
                ->where('permohonan.status', 0)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_semua_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->where('permohonan.rt_domisili', $penduduk->rt)
                ->where('permohonan.rw_domisili', $penduduk->rw)
                ->Where('permohonan.status', '!=', 4)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_permohonan_disetujui = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', 4)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();
        } elseif (Session::has('ketua_rw')) {
            $pengguna = Pengguna::findOrFail(Session::get('id'));
            $penduduk = Penduduk::findOrFail($pengguna->id_penduduk);
            $daftar_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->where('permohonan.rw_domisili', $penduduk->rw)
                ->where('permohonan.status', 1)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_semua_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->where('permohonan.rw_domisili', $penduduk->rw)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_permohonan_disetujui = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', 4)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();
        } elseif (Session::has('admin') || Session::has('staff') || Session::has('lurah')) {
            $daftar_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', '!=', 4)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_semua_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_permohonan_disetujui = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', 4)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();
        } elseif (Session::has('kasi')) {
            $daftar_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', 2)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_semua_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_permohonan_disetujui = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', 4)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();
        } elseif (Session::has('lurah')) {
            $daftar_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->Where('permohonan.status', 3)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();

            $daftar_semua_permohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();
        }

        // $daftar_permohonan_count = $daftar_permohonan->total();
        $update_terakhir = Permohonan::orderBy('updated_at', 'desc')->first();
        return view('permohonan.history', compact('daftar_permohonan', 'update_terakhir', 'daftar_semua_permohonan', 'daftar_permohonan_disetujui'));
    }


    public function validasiPermohonan(Permohonan $permohonan)
    {
        // $permohonan->status = 0;
        // $permohonan->save();
        // Session::flash('pesan', '1 Artikel Berhasil Divalidasi');
        // return redirect('permohonan');
        if ($permohonan->status == 0) {
            $permohonan->status = 1;
            $permohonan->verifikasi_rt = 1;
            $permohonan->save();
            Session::flash('pesan', '1 Permohonan Berhasil Diverifikasi oleh RT');
            return redirect('permohonan');
        } elseif ($permohonan->status == 1) {
            $permohonan->status = 2;
            $permohonan->verifikasi_rw = 1;
            $permohonan->save();
            Session::flash('pesan', '1 Permohonan Berhasil Diverifikasi oleh RW');
            return redirect('permohonan');
        } elseif ($permohonan->status == 2) {
            $permohonan->status = 3;
            $permohonan->checking_kasi = 1;
            $permohonan->save();
            Session::flash('pesan', '1 Permohonan Lolos Checking dan Penomoran oleh KASI');
            return redirect('permohonan');
        } elseif ($permohonan->status == 3) {
            $permohonan->status = 4;
            $permohonan->approved_lurah = 1;
            $permohonan->save();
            Session::flash('pesan', '1 Permohonan Berhasil Di Setujui oleh Lurah');
            return redirect('permohonan');
        }
        return redirect('permohonan');
    }

    public function tolak(PermohonanRequest $request, Permohonan $permohonan)
    {
        $input = $request->all();
        $permohonan->status = 5;
        $permohonan->alasan_tolak = $request->alasan_tolak;
        $permohonan->save();
        Session::flash('pesan', '1 Permohonan Berhasil Ditolak');
        return redirect('permohonan');
    }

    // public function sendEmail($permohonan)
    // {
    //     Mail::to($permohonan->email)->send(new MailConfirmation($permohonan));
    // }
}
