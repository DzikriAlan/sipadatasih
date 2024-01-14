<?php

namespace App\Http\Controllers;

use App\PenggunaEnum;
use App\Pelayanan;
use App\Pengguna;
use App\Penduduk;
use App\Permohonan;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Session;
use Validator;



class BerandaController extends Controller
{
    // tentang
    public function tampilanPermohonan()
    {
        $penduduk = null;
        $daftar_pelayanan = Pelayanan::pluck('nama', 'id');
        $no_sp = null;
        return view('beranda.permohonan-tambah', compact('daftar_pelayanan', 'penduduk', 'no_sp'));
    }

    public function findNik(Request $request){
        $nik = $request->get('nik');
        $penduduk = DB::table('penduduk')->where('nik', $nik)->first();
        if ($penduduk){
            $increment_number = DB::table('master_increment')->where('nama', 'no_sp')->first();
            $no = $increment_number->number + 1;

            $now = Carbon::now()->format('d/m/Y');
            $no_sp = $now . "/" . strval($no);
            $increment_number_update = DB::table('master_increment')->where('nama', 'no_sp')->update(['number' => $no]);
            $daftar_pelayanan = Pelayanan::pluck('nama', 'id');
            return view('beranda.permohonan-tambah', compact('daftar_pelayanan', 'penduduk', 'no_sp'));
            // dd($penduduk);
        } else {
            Session::flash('pesan', 'NIK anda tidak ditemukan!');
            redirect('beranda.permohonan-tambah');
        }
    }

    public function storePermohonan(Request $request){
        $input = $request->all();

        if($input['id_layanan'] === "17"){
            $validator = Validator::make($request->all(), [
                'nik' => 'required',
                'id_layanan' => 'required',
                'jenis_usaha' => 'required',
                'alamat_usaha' => 'required',
                'penggunaan' => 'required',
            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'nik' => 'required',
                'id_layanan' => 'required',
                'penggunaan' => 'required',
            ]);
        }
        if ($validator->fails()) {
            Session::flash('pesan_error', $validator->errors()->first());
            $penduduk = DB::table('penduduk')->where('nik', $input['nik'])->first();
        
            if ($penduduk) {
                $no_sp = $input['no_sp'];
                $daftar_pelayanan = Pelayanan::pluck('nama', 'id');
                
                // Pass data directly to the view without using dd()
                return view('beranda.permohonan-tambah', compact('penduduk', 'no_sp', 'daftar_pelayanan'));
            } else {
                // Handle the case when $penduduk is not found
                return redirect()->back()->withInput();
            }
        }

        $input['id_user'] = 13;
        $jsonData = json_encode($input);

        Permohonan::create($input);
        Session::flash('pesan', 'Permohonan Berhasil Ditambah');
        return redirect()->route('tampilanPermohonan');
    }    

    public function halamanCekStatus()
    {
        Session::forget('pesan_error');
        return view('beranda.permohonan-cek');
    }

    public function cekStatusNik(Request $request){
        $nik = $request->get('nik');
        $penduduk = Penduduk::where('nik', $nik)->first();
        if ($penduduk){
            Session::forget('pesan_error');
            $pengguna = Pengguna::where('id_penduduk', $penduduk->id)->first();
            $dataPermohonan = DB::table('permohonan')
                ->join('pelayanan', 'permohonan.id_layanan', '=', 'pelayanan.id')
                ->join('penduduk', 'permohonan.nik', '=', 'penduduk.nik')
                ->join('pengguna', 'permohonan.id_user', '=', 'pengguna.id')
                ->where('permohonan.nik', $nik)
                ->select('permohonan.*', 'pelayanan.nama as nama_pelayanan', 'penduduk.*', 'pengguna.*')
                ->get();
            $increment_number = DB::table('master_increment')->where('nama', 'no_sp')->first();
            $no = $increment_number->number + 1;

            $now = Carbon::now()->format('d/m/Y');
            $no_sp = $now . "/" . strval($no);
            $increment_number_update = DB::table('master_increment')->where('nama', 'no_sp')->update(['number' => $no]);
            $daftar_pelayanan = Pelayanan::pluck('nama', 'id');

            return view('beranda.dashboard', compact('daftar_pelayanan', 'pengguna', 'penduduk', 'no_sp', 'dataPermohonan'));
        } else {
            $penduduk = null;
            $daftar_pelayanan = Pelayanan::pluck('nama', 'id');
            $no_sp = null;
            $pengguna = null;
            $dataPermohonan = null;
            Session::flash('pesan_error', 'NIK anda tidak ditemukan!');
            return view('beranda.permohonan-cek');
        }
    }
    
    public function profil()
    {
        $daftar_batas = \App\Batas::all();
        $daftar_orbitasi = \App\Orbitasi::all();
        $daftar_tipologi = \App\Tipologi::all();
        $daftar_iklim = \App\Iklim::all();
        $daftar_kesuburan_tanah = \App\KesuburanTanah::all();
        $daftar_penggunaan_tanah = \App\PenggunaanTanah::all();
        $daftar_infra_melintasi = \App\InfraMelintasi::all();

        return view('beranda/profil', compact('daftar_batas', 'daftar_orbitasi', 'daftar_tipologi', 'daftar_iklim', 'daftar_kesuburan_tanah', 'daftar_penggunaan_tanah', 'daftar_infra_melintasi',));
    }

    public function tanamanKomoditas()
    {
        $daftar_tahun = \App\TanamanKomoditas::distinct('tahun')->pluck('tahun');
        return view('beranda/tanaman-komoditas', compact('daftar_tahun'));
    }

    public function tanamanKomoditasDetail($tahun)
    {
        $daftar_komoditas = \App\TanamanKomoditas::where('tahun', $tahun)->get();
        $update_terakhir = \App\TanamanKomoditas::where('tahun', $tahun)->orderBy('updated_at', 'desc')->first();
        return view('beranda/tanaman-komoditas-detail', compact('daftar_komoditas', 'update_terakhir'));
    }

    // lembaga
    public function lembaga()
    {
        $daftar_lembaga = \App\Lembaga::all();
        $update_terakhir = \App\Lembaga::orderBy('updated_at', 'desc')->first();
        return view('beranda.lembaga', compact('daftar_lembaga', 'update_terakhir'));
    }

    // detail lembaga
    public function detailLembaga($id)
    {
        $lembaga = \App\Lembaga::findOrFail($id);
        $update_terakhir = $lembaga->updated_at->diffForHumans();
        return view('beranda.detail-lembaga', compact('lembaga', 'update_terakhir'));
    }

    // fasilitas
    public function fasilitasPemukiman()
    {
        $daftar_fasilitas_pemukiman = \App\FasilitasPemukiman::all();
        $update_terakhir = \App\FasilitasPemukiman::orderBy('updated_at', 'desc')->first();
        return view('beranda/fasilitas-pemukiman', compact('daftar_fasilitas_pemukiman', 'update_terakhir'));
    }
    public function fasilitasPemerintahan()
    {
        $daftar_fasilitas_pemerintahan = \App\FasilitasPemerintahan::all();
        $update_terakhir = \App\FasilitasPemerintahan::orderBy('updated_at', 'desc')->first();
        return view('beranda/fasilitas-pemerintahan', compact('daftar_fasilitas_pemerintahan', 'update_terakhir'));
    }
    public function fasilitasPeribadatan()
    {
        $daftar_fasilitas_peribadatan = \App\FasilitasPeribadatan::all();
        $update_terakhir = \App\FasilitasPeribadatan::orderBy('updated_at', 'desc')->first();
        return view('beranda/fasilitas-peribadatan', compact('daftar_fasilitas_peribadatan', 'update_terakhir'));
    }
    public function fasilitasKesehatan()
    {
        $daftar_fasilitas_kesehatan = \App\FasilitasKesehatan::all();
        $update_terakhir = \App\FasilitasKesehatan::orderBy('updated_at', 'desc')->first();
        return view('beranda/fasilitas-kesehatan', compact('daftar_fasilitas_kesehatan', 'update_terakhir'));
    }
    public function fasilitasEkonomi()
    {
        $daftar_fasilitas_ekonomi = \App\FasilitasEkonomi::all();
        $update_terakhir = \App\FasilitasEkonomi::orderBy('updated_at', 'desc')->first();
        return view('beranda/fasilitas-ekonomi', compact('daftar_fasilitas_ekonomi', 'update_terakhir'));
    }
    public function fasilitasPrasarana()
    {
        $daftar_fasilitas_prasarana = \App\FasilitasPrasarana::all();
        $update_terakhir = \App\FasilitasPrasarana::orderBy('updated_at', 'desc')->first();
        return view('beranda/fasilitas-prasarana', compact('daftar_fasilitas_prasarana', 'update_terakhir'));
    }
    public function fasilitasPendidikan()
    {
        $daftar_fasilitas_pendidikan = \App\FasilitasPendidikan::all();
        $update_terakhir = \App\FasilitasPendidikan::orderBy('updated_at', 'desc')->first();
        return view('beranda/fasilitas-pendidikan', compact('daftar_fasilitas_pendidikan', 'update_terakhir'));
    }

    // belanja
    public function belanja()
    {
        $daftar_tahun = \App\Belanja::orderBy('tahun', 'asc')->distinct('tahun')->pluck('tahun');
        return view('beranda/belanja', compact('daftar_tahun'));
    }
    public function belanjaDetail($tahun)
    {
        $daftar_belanja = \App\Belanja::where('tahun', $tahun)->get();
        $update_terakhir = \App\Belanja::where('tahun', $tahun)->orderBy('updated_at', 'desc')->first();
        $total = $daftar_belanja->sum('nominal_belanja');
        return view('beranda/belanja-detail', compact('daftar_belanja', 'total', 'update_terakhir'));
    }

    // pendapatan
    public function pendapatan()
    {
        $daftar_tahun = \App\Pendapatan::orderBy('tahun', 'asc')->distinct('tahun')->pluck('tahun');
        return view('beranda/pendapatan', compact('daftar_tahun'));
    }
    public function pendapatanDetail($tahun)
    {
        $daftar_pendapatan = \App\Pendapatan::where('tahun', $tahun)->get();
        $total = $daftar_pendapatan->sum('nominal_pendapatan');
        $update_terakhir = \App\Pendapatan::where('tahun', $tahun)->orderBy('updated_at', 'desc')->first();
        return view('beranda/pendapatan-detail', compact('daftar_pendapatan', 'total', 'update_terakhir'));
    }

    public function pendudukUsia()
    {
        // manusia usia lanjut
        $enampuluhenam_tahun = Carbon::today()->subYears(66)->format('Y-m-d');
        $manula = \App\Penduduk::where('tanggal_lahir', '<=', $enampuluhenam_tahun)->count();

        // lanjut usia akhir
        $limapuluhenam_tahun = Carbon::today()->subYears(56)->format('Y-m-d');
        $lansia_akhir = \App\Penduduk::where('tanggal_lahir', '>', $enampuluhenam_tahun)->where('tanggal_lahir', '<=', $limapuluhenam_tahun)->count();

        // lanjut usia awal
        $empatpuluhenam_tahun = Carbon::today()->subYears(46)->format('Y-m-d');
        $lansia_awal = \App\Penduduk::where('tanggal_lahir', '>', $limapuluhenam_tahun)->where('tanggal_lahir', '<=', $empatpuluhenam_tahun)->count();

        // dewasa akhir
        $tigapuluhenam_tahun = Carbon::today()->subYears(36)->format('Y-m-d');
        $dewasa_akhir = \App\Penduduk::where('tanggal_lahir', '>', $empatpuluhenam_tahun)->where('tanggal_lahir', '<=', $tigapuluhenam_tahun)->count();

        // dewasa awal
        $duapuluhenam_tahun = Carbon::today()->subYears(26)->format('Y-m-d');
        $dewasa_awal = \App\Penduduk::where('tanggal_lahir', '>', $tigapuluhenam_tahun)->where('tanggal_lahir', '<=', $duapuluhenam_tahun)->count();

        // remaja akhir
        $tujuhbelas_tahun = Carbon::today()->subYears(17)->format('Y-m-d');
        $remaja_akhir = \App\Penduduk::where('tanggal_lahir', '>', $duapuluhenam_tahun)->where('tanggal_lahir', '<=', $tujuhbelas_tahun)->count();

        // remaja awal
        $duabelas_tahun = Carbon::today()->subYears(12)->format('Y-m-d');
        $remaja_awal = \App\Penduduk::where('tanggal_lahir', '>', $tujuhbelas_tahun)->where('tanggal_lahir', '<=', $duabelas_tahun)->count();

        // kanak kanak
        $enam_tahun = Carbon::today()->subYears(6)->format('Y-m-d');
        $kanak_kanak = \App\Penduduk::where('tanggal_lahir', '>', $duabelas_tahun)->where('tanggal_lahir', '<=', $enam_tahun)->count();

        // bawah lima tahun
        $nol_tahun = Carbon::today()->subYears(0)->format('Y-m-d');
        $balita = \App\Penduduk::where('tanggal_lahir', '>', $enam_tahun)->where('tanggal_lahir', '<=', $nol_tahun)->count();

        $update_terakhir = \App\Penduduk::orderBy('updated_at', 'desc')->first();

        return view('beranda/penduduk-usia', compact(
            'manula',
            'enampuluhenam_tahun',
            'lansia_akhir',
            'limapuluhenam_tahun',
            'lansia_awal',
            'empatpuluhenam_tahun',
            'dewasa_akhir',
            'tigapuluhenam_tahun',
            'dewasa_awal',
            'duapuluhenam_tahun',
            'remaja_akhir',
            'tujuhbelas_tahun',
            'remaja_awal',
            'duabelas_tahun',
            'kanak_kanak',
            'enam_tahun',
            'balita',
            'nol_tahun',
            'update_terakhir'
        ));
    }
    public function pendudukPekerjaan()
    {
        $daftar_pekerjaan = DB::table('penduduk')->select('pekerjaan', DB::raw('count(*) as total'))->groupBy('pekerjaan')->get();
        $update_terakhir = \App\Penduduk::orderBy('updated_at', 'desc')->first();
        return view('beranda/penduduk-pekerjaan', compact('daftar_pekerjaan', 'update_terakhir'));
    }
    public function pendudukPendidikan()
    {
        $daftar_pendidikan = DB::table('penduduk')->select('pendidikan_terakhir', DB::raw('count(*) as total'))->groupBy('pendidikan_terakhir')->get();
        $update_terakhir = \App\Penduduk::orderBy('updated_at', 'desc')->first();
        return view('beranda/penduduk-pendidikan', compact('daftar_pendidikan', 'update_terakhir'));
    }
    public function pendudukGolonganDarah()
    {
        $daftar_darah = DB::table('penduduk')->select('golongan_darah', DB::raw('count(*) as total'))->groupBy('golongan_darah')->get();
        $update_terakhir = \App\Penduduk::orderBy('updated_at', 'desc')->first();
        return view('beranda/penduduk-golongan-darah', compact('daftar_darah', 'update_terakhir'));
    }
    public function pendudukMenikah()
    {
        $daftar_menikah = DB::table('penduduk')->select('status_menikah', DB::raw('count(*) as total'))->groupBy('status_menikah')->get();
        $update_terakhir = \App\Penduduk::orderBy('updated_at', 'desc')->first();
        return view('beranda/penduduk-menikah', compact('daftar_menikah', 'update_terakhir'));
    }
    public function pendudukAgama()
    {
        $daftar_agama = DB::table('penduduk')->select('agama', DB::raw('count(*) as total'))->groupBy('agama')->get();
        $update_terakhir = \App\Penduduk::orderBy('updated_at', 'desc')->first();
        return view('beranda/penduduk-agama', compact('daftar_agama', 'update_terakhir'));
    }
    public function pendudukJenisKelamin()
    {
        $daftar_jk = DB::table('penduduk')->select('jenis_kelamin', DB::raw('count(*) as total'))->groupBy('jenis_kelamin')->get();
        $update_terakhir = \App\Penduduk::orderBy('updated_at', 'desc')->first();
        return view('beranda/penduduk-jenis-kelamin', compact('daftar_jk', 'update_terakhir'));
    }

    // dokumen
    public function dokumen()
    {
        $daftar_dokumen = \App\Dokumen::paginate(25);
        $update_terakhir = \App\Dokumen::orderBy('updated_at', 'desc')->first();
        return view('beranda/dokumen', compact('daftar_dokumen', 'update_terakhir'));
    }

    // pelayanan
    public function pelayanan()
    {
        $daftar_pelayanan = \App\Pelayanan::all();
        $update_terakhir = \App\Pelayanan::orderBy('updated_at', 'desc')->first();
        return view('beranda/pelayanan', compact('daftar_pelayanan', 'update_terakhir'));
    }

    // artikel
    public function artikel()
    {
        $daftar_artikel = \App\Artikel::where('is_valid', 'ya')->paginate(25);
        return view('beranda/artikel', compact('daftar_artikel'));
    }
    public function artikelDetail($slug)
    {
        $artikel = \App\Artikel::where('slug_artikel', $slug)->where('is_valid', 'ya')->first();
        if (empty($artikel)) return redirect('beranda/artikel');
        return view('beranda/artikel-detail', compact('artikel'));
    }

    public function artikelCari(Request $request)
    {
        $judul = $request->get('judul');
        $daftar_artikel = \App\Artikel::where('judul_artikel', 'like', '%' . $judul . '%')->where('is_valid', 'ya')->paginate(25);
        return view('beranda/artikel-cari', compact('daftar_artikel', 'judul'));
    }

    // kegiatan
    public function kegiatan()
    {
        $daftar_kegiatan = \App\Kegiatan::paginate(25);
        return view('beranda/kegiatan', compact('daftar_kegiatan'));
    }
    public function kegiatanDetail($slug)
    {
        $kegiatan = \App\Kegiatan::where('slug_kegiatan', $slug)->first();
        if (!$kegiatan) return redirect('beranda/kegiatan');
        return view('beranda/kegiatan-detail', compact('kegiatan'));
    }
    public function kegiatanCari(Request $request)
    {
        $nama = $request->get('nama');
        $daftar_kegiatan = \App\Kegiatan::where('nama_kegiatan', 'like', '%' . $nama . '%')->paginate(25);
        return view('beranda/kegiatan-cari', compact('daftar_kegiatan', 'nama'));
    }

    public function masuk()
    {

        if (Session::has('pengguna')) return redirect('artikel');
        elseif (Session::has('ketua_rt')) return redirect('permohonan');
        elseif (Session::has('ketua_rw')) return redirect('permohonan');
        elseif (Session::has('admin')) return redirect('dashboard');
        elseif (Session::has('kasi')) return redirect('dashboard');
        elseif (Session::has('staff')) return redirect('dashboard');
        else return view('masuk');
    }

    public function daftar()
    {
        if (Session::has('pengguna')) return redirect('artikel');
        elseif (Session::has('ketua_rt')) return redirect('permohonan');
        elseif (Session::has('admin') || Session::has('kasi')) return redirect('dashboard');
        else return view('daftar');
    }
    // public function daftarpenduduk()
    // {
    //     if (Session::has('pengguna')) return redirect('artikel');
    //     elseif (Session::has('ketua_rt')) return redirect('permohonan');
    //     elseif (Session::has('admin') || Session::has('kasi')) return redirect('dashboard');
    //     else return view('daftarpenduduk');
    // }

    public function cekPengguna(Request $request)
    {
        $req = $request->all();

        $validasi = Validator::make($req, [
            'email' => 'required|string|max:100',
            'password' => 'required|string|max:100',
        ]);

        if ($validasi->fails()) {
            return redirect('masuk')->withInput()->withErrors($validasi);
        }

        $email = $request->post('email');
        $password = sha1(md5($request->post('password')));


        // TODO : add check RT/RW
        if (\App\Pengguna::where('email_pengguna', $email)->where('password_pengguna', $password)->first()) {
            $user = \App\Pengguna::where('email_pengguna', $email)->where('password_pengguna', $password)->first();
            if ($user->verified == 0) {
                return redirect('masuk')->with('pesan', 'akun belum terverifikasi')->withInput();
            }
            if ($user->is_ketua == 0) {
                if ($user->id_penduduk == 0) {
                    return redirect('masuk')->with('pesan', 'Pengguna belum terverifikasi silahkan hubungi RT')->withInput();
                }
                Session::put('login', true);
                Session::put('pengguna', true);
                Session::put('id', $user->id);
                Session::put('nama', $user->nama_pengguna);
                return redirect('beranda/dashboard');
            } elseif ($user->is_ketua == 1) {
                Session::put('login', true);
                Session::put('ketua_rt', true);
                Session::put('id', $user->id);
                Session::put('nama', $user->nama_pengguna);
                return redirect('dashboard');
            } elseif ($user->is_ketua == 2) {
                Session::put('login', true);
                Session::put('ketua_rw', true);
                Session::put('id', $user->id);
                Session::put('nama', $user->nama_pengguna);
                return redirect('dashboard');
            }
        } elseif (\App\Admin::where('email_admin', $email)->where('password_admin', $password)->first()) {
            $user = \App\Admin::where('email_admin', $email)->where('password_admin', $password)->first();
            if ($user->jabatan == 0) {
                Session::put('login', true);
                Session::put('admin', true);
                Session::put('id', $user->id);
                Session::put('nama', $user->nama_admin);
                return redirect('dashboard');
            } elseif ($user->jabatan == 1) {
                Session::put('login', true);
                // Session::put('admin', true);
                Session::put('kasi', true);
                Session::put('id', $user->id);
                Session::put('nama', $user->nama_admin);
                return redirect('dashboard');
            } elseif ($user->jabatan == 2) {
                Session::put('login', true);
                Session::put('lurah', true);
                Session::put('id', $user->id);
                Session::put('nama', $user->nama_admin);
                return redirect('dashboard');
            } elseif ($user->jabatan == 3) {
                Session::put('login', true);
                Session::put('staff', true);
                Session::put('id', $user->id);
                Session::put('nama', $user->nama_admin);
                return redirect('dashboard');
            }
        } else {
            return redirect('masuk')->with('pesan', 'Username dan/atau Password Tidak Valid')->withInput();
        }
    }

    public function daftarPengguna(Request $request)
    {
        $req = $request->all();
        $input = $request->all();
        $validasi = Validator::make($req, [
            'nama_pengguna' => 'required|string|max:100',
            'email_pengguna' => 'required|string|max:100',
            'password_pengguna' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:perempuan,laki-laki',
            'no_hp' => 'required|string|max:15',
        ]);

        if ($validasi->fails()) {
            return redirect('daftar')->withInput()->withErrors($validasi);
        }

        if ($request->input('password_pengguna') != $request->input('confirm_password')) {
            return redirect('daftar')->withInput()->withErrors('Password tidak sama');
        }

        if (\App\Pengguna::where('email_pengguna', $request->input('email_pengguna'))->first()) {
            Session::flash('pesan', 'Pengguna sudah ada');
            return redirect('daftar')->withInput();
        }

        $foto = $request->file('foto_ktp');
        $ext = $foto->getClientOriginalExtension();
        $foto_name = "KTP-". date('YmdHis'). "-" . $request->input('nik') . ".$ext";
        $upload_path = 'assets-dashboard/images/ktp';
        $request->file('foto_ktp')->move($upload_path, $foto_name);
        
        $fotoKK = $request->file('foto_kk');
        $extKk = $fotoKK->getClientOriginalExtension();
        $foto_name_kk= "KK-". date('YmdHis'). "-" . $request->input('nik') . ".$extKk";
        $upload_path = 'assets-dashboard/images/kk';
        $request->file('foto_kk')->move($upload_path, $foto_name_kk);

        $penduduk = new \App\Penduduk();
        $penduduk->id = $request->input('id');
        $penduduk->nik = $request->input('nik');
        $penduduk->no_kk = $request->input('no_kk');
        $penduduk->nama_penduduk = $request->input('nama_penduduk');
        $penduduk->alamat_penduduk = $request->input('alamat_penduduk');
        $penduduk->status_menikah = $request->input('status_menikah');
        $penduduk->jenis_kelamin = $request->input('jenis_kelamin');
        $penduduk->tempat_lahir = $request->input('tempat_lahir');
        $penduduk->tanggal_lahir = $request->input('tanggal_lahir');
        $penduduk->pekerjaan = $request->input('pekerjaan');
        $penduduk->agama = $request->input('agama');
        $penduduk->pendidikan_terakhir = $request->input('pendidikan_terakhir');
        $penduduk->golongan_darah = $request->input('golongan_darah');
        $penduduk->rt = $request->input('rt');
        $penduduk->rw = $request->input('rw');
        $penduduk->foto_ktp = $foto_name;
        $penduduk->foto_kk = $foto_name_kk;
        $penduduk->is_pendatang = $request->input('is_pendatang');
        $penduduk->save();

        $pengguna = new \App\Pengguna();
        $pengguna->id_penduduk = $penduduk->id;
        $pengguna->nama_pengguna = $request->input('nama_pengguna');
        $pengguna->email_pengguna = $request->input('email_pengguna');
        $pengguna->password_pengguna = sha1(md5($request->input('password_pengguna')));
        $pengguna->jenis_kelamin = $penduduk->jenis_kelamin;
        $pengguna->no_hp = $request->input('no_hp');
        $pengguna->verified = 0;
        $pengguna->save();






        Session::flash('info', 'Pengguna Berhasil Didaftarkan, silahkan masuk');
        return redirect('masuk');
    }

    public function keluar()
    {
        Session::flush();
        return redirect('/');
    }
}
