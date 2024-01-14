<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\PendudukController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $daftar_artikel = App\Artikel::where('is_valid', 'ya')->take(3)->get();
    $daftar_kegiatan = App\Kegiatan::take(3)->get();

    $daftar_pendidikan = DB::table('penduduk')->select('pendidikan_terakhir', DB::raw('count(*) as total'))->groupBy('pendidikan_terakhir')->get();

    // manusia usia lanjut
    $enampuluhenam_tahun = \Carbon\Carbon::today()->subYears(66)->format('Y-m-d');
    $manula = \App\Penduduk::where('tanggal_lahir', '<=', $enampuluhenam_tahun)->count();

    // lanjut usia akhir
    $limapuluhenam_tahun = \Carbon\Carbon::today()->subYears(56)->format('Y-m-d');
    $lansia_akhir = \App\Penduduk::where('tanggal_lahir', '>', $enampuluhenam_tahun)->where('tanggal_lahir', '<=', $limapuluhenam_tahun)->count();

    // lanjut usia awal
    $empatpuluhenam_tahun = \Carbon\Carbon::today()->subYears(46)->format('Y-m-d');
    $lansia_awal = \App\Penduduk::where('tanggal_lahir', '>', $limapuluhenam_tahun)->where('tanggal_lahir', '<=', $empatpuluhenam_tahun)->count();

    // dewasa akhir
    $tigapuluhenam_tahun = \Carbon\Carbon::today()->subYears(36)->format('Y-m-d');
    $dewasa_akhir = \App\Penduduk::where('tanggal_lahir', '>', $empatpuluhenam_tahun)->where('tanggal_lahir', '<=', $tigapuluhenam_tahun)->count();

    // dewasa awal
    $duapuluhenam_tahun = \Carbon\Carbon::today()->subYears(26)->format('Y-m-d');
    $dewasa_awal = \App\Penduduk::where('tanggal_lahir', '>', $tigapuluhenam_tahun)->where('tanggal_lahir', '<=', $duapuluhenam_tahun)->count();

    // remaja akhir
    $tujuhbelas_tahun = \Carbon\Carbon::today()->subYears(17)->format('Y-m-d');
    $remaja_akhir = \App\Penduduk::where('tanggal_lahir', '>', $duapuluhenam_tahun)->where('tanggal_lahir', '<=', $tujuhbelas_tahun)->count();

    // remaja awal
    $duabelas_tahun = \Carbon\Carbon::today()->subYears(12)->format('Y-m-d');
    $remaja_awal = \App\Penduduk::where('tanggal_lahir', '>', $tujuhbelas_tahun)->where('tanggal_lahir', '<=', $duabelas_tahun)->count();

    // kanak kanak
    $enam_tahun = \Carbon\Carbon::today()->subYears(6)->format('Y-m-d');
    $kanak_kanak = \App\Penduduk::where('tanggal_lahir', '>', $duabelas_tahun)->where('tanggal_lahir', '<=', $enam_tahun)->count();

    // bawah lima tahun
    $nol_tahun = \Carbon\Carbon::today()->subYears(0)->format('Y-m-d');
    $balita = \App\Penduduk::where('tanggal_lahir', '>', $enam_tahun)->where('tanggal_lahir', '<=', $nol_tahun)->count();

    // keuangan
    $daftar_belanja = \App\Belanja::where('tahun', date('Y'))->orderBy('nominal_belanja', 'asc')->get();
    $total_belanja = $daftar_belanja->sum('nominal_belanja');

    // $total_pendapatan = $daftar_pendapatan->sum('nominal_pendapatan');

    $admin = \App\Admin::where('jabatan', 0)->first();
    $kasi = \App\Admin::where('jabatan', 1)->first();

    return view('beranda/indexa', compact('daftar_artikel', 'admin', 'kasi', 'daftar_kegiatan', 'daftar_pendidikan', 'manula', 'balita', 'kanak_kanak', 'remaja_awal', 'remaja_akhir', 'dewasa_awal', 'dewasa_akhir', 'lansia_akhir', 'lansia_awal', 'daftar_belanja', 'total_belanja'));
});
Route::prefix('beranda')->group(function () {
    Route::get('/', function () {
        return redirect('/');
    });

    // tentang
    Route::get('profil', 'BerandaController@profil');
    Route::get('batas', 'BerandaController@batas');
    Route::get('tanaman-komoditas', 'BerandaController@tanamanKomoditas');
    Route::get('tanaman-komoditas/{tahun}', 'BerandaController@tanamanKomoditasDetail');
    Route::get('orbitasi', 'BerandaController@orbitasi');
    Route::get('tipologi', 'BerandaController@tipologi');
    Route::get('iklim', 'BerandaController@iklim');
    Route::get('kesuburan-tanah', 'BerandaController@kesuburanTanah');
    Route::get('penggunaan-tanah', 'BerandaController@penggunaanTanah');
    Route::get('infrastruktur-melintasi', 'BerandaController@infraMelintasi');

    // lembaga
    Route::get('lembaga', 'BerandaController@lembaga');
    Route::get('lembaga/{id}', 'BerandaController@detailLembaga');

    // fasilitas
    Route::get('fasilitas-pemukiman', 'BerandaController@fasilitasPemukiman');
    Route::get('fasilitas-pemerintahan', 'BerandaController@fasilitasPemerintahan');
    Route::get('fasilitas-peribadatan', 'BerandaController@fasilitasPeribadatan');
    Route::get('fasilitas-kesehatan', 'BerandaController@fasilitasKesehatan');
    Route::get('fasilitas-ekonomi', 'BerandaController@fasilitasEkonomi');
    Route::get('fasilitas-prasarana', 'BerandaController@fasilitasPrasarana');
    Route::get('fasilitas-pendidikan', 'BerandaController@fasilitasPendidikan');

    // keuangan
    Route::get('belanja', 'BerandaController@belanja');
    Route::get('belanja/{tahun}', 'BerandaController@belanjaDetail');
    Route::get('pendapatan', 'BerandaController@pendapatan');
    Route::get('pendapatan/{tahun}', 'BerandaController@pendapatanDetail');

    // penduduk
    Route::get('penduduk-usia', 'BerandaController@pendudukUsia');
    Route::get('penduduk-pekerjaan', 'BerandaController@pendudukPekerjaan');
    Route::get('penduduk-pendidikan', 'BerandaController@pendudukPendidikan');
    Route::get('penduduk-golongan-darah', 'BerandaController@pendudukGolonganDarah');
    Route::get('penduduk-menikah', 'BerandaController@pendudukMenikah');
    Route::get('penduduk-agama', 'BerandaController@pendudukAgama');
    Route::get('penduduk-jenis-kelamin', 'BerandaController@pendudukJenisKelamin');

    // dokumen
    Route::get('dokumen', 'BerandaController@dokumen');

    // pelayanan
    Route::get('pelayanan', 'BerandaController@pelayanan');


    // artikel
    Route::get('artikel', 'BerandaController@artikel');
    Route::get('artikel/cari', 'BerandaController@artikelCari');
    Route::get('artikel/{slug}', 'BerandaController@artikelDetail');

    // kegiatan
    Route::get('kegiatan', 'BerandaController@kegiatan');
    Route::get('kegiatan/cari', 'BerandaController@kegiatanCari');
    Route::get('kegiatan/{slug}', 'BerandaController@kegiatanDetail');

    Route::get('dashboard', 'DashboardController@dashboardPengguna');
    Route::get('dashboard/tambah', 'DashboardController@tambahArtikel');
    Route::post('dashboard', 'DashboardController@storeArtikel');
    Route::get('dashboard/{id}/edit', 'DashboardController@editArtikel');
    Route::patch('dashboard/{id}', 'DashboardController@updateArtikel');
    Route::delete('dashboard/{id}', 'DashboardController@destroyArtikel');
    // Permohonan
    Route::post('dashboard/permohonan', 'DashboardController@storePermohonan');

    Route::get('dashboard/edit-pengguna', 'DashboardController@editPengguna');
    Route::patch('dashboard/edit-pengguna/{id}', 'DashboardController@updatePengguna');
    // Route::get('pelayanan/tambah/permohonan', 'BerandaController@tambahPermohonan');

});

Route::get('masuk', 'BerandaController@masuk');
Route::post('masuk', 'BerandaController@cekPengguna');
Route::get('daftar', 'BerandaController@daftar');
Route::post('daftar', 'BerandaController@daftarPengguna');
// Route::get('daftar/daftarpenduduk', 'BerandaController@daftarpenduduk');
// Route::post('daftarpenduduk', 'BerandaController@daftarPengguna');

Route::get('pelayanan/permohonan', 'BerandaController@tampilanPermohonan')->name('tampilanPermohonan');
Route::get('pelayanan/tambah/permohonan', 'BerandaController@tambahPermohonan');
Route::post('pelayanan/tambah/permohonan/', 'BerandaController@findNik');
Route::post('pelayanan/kirim/permohonan/', 'BerandaController@storePermohonan');
Route::get('pelayanan/cek/permohonan/', 'BerandaController@halamanCekStatus');
Route::post('pelayanan/cek/permohonan/', 'BerandaController@cekStatusNik');

Route::get('keluar', 'BerandaController@keluar');

// admin dashboard
Route::get('dashboard', 'DashboardController@index');

// tentang
Route::resource('profil', 'ProfilController');

Route::resource('batas', 'BatasController');

Route::get('tanaman-komoditas/cetak', 'TanamanKomoditasController@cetak');
Route::get('tanaman-komoditas/urutkan', 'TanamanKomoditasController@urutkan');
Route::resource('tanaman-komoditas', 'TanamanKomoditasController');

Route::resource('orbitasi', 'OrbitasiController');

Route::resource('tipologi', 'TipologiController');

Route::resource('iklim', 'IklimController');

Route::resource('kesuburan-tanah', 'KesuburanTanahController');

Route::resource('penggunaan-tanah', 'PenggunaanTanahController');

Route::resource('infrastruktur-melintasi', 'InfraMelintasiController');

// lembaga & anggota
Route::resource('lembaga', 'LembagaController');
Route::resource('anggota-lembaga', 'AnggotaLembagaController');

// fasilitas
Route::resource('fasilitas-ekonomi', 'FasilitasEkonomiController');

Route::resource('fasilitas-kesehatan', 'FasilitasKesehatanController');

Route::resource('fasilitas-pemerintahan', 'FasilitasPemerintahanController');

Route::resource('fasilitas-pemukiman', 'FasilitasPemukimanController');

Route::resource('fasilitas-pendidikan', 'FasilitasPendidikanController');

Route::resource('fasilitas-peribadatan', 'FasilitasPeribadatanController');

Route::resource('fasilitas-prasarana', 'FasilitasPrasaranaController');

// keuangan
Route::get('belanja/cetak', 'BelanjaController@cetak');
Route::get('belanja/cari', 'BelanjaController@cari');
Route::get('belanja/urutkan', 'BelanjaController@urutkan');
Route::resource('belanja', 'BelanjaController');

Route::get('pendapatan/cetak', 'PendapatanController@cetak');
Route::get('pendapatan/cari', 'PendapatanController@cari');
Route::get('pendapatan/urutkan', 'PendapatanController@urutkan');
Route::resource('pendapatan', 'PendapatanController');

// penduduk
Route::get('penduduk/presentasi', 'PendudukController@presentasi');
Route::get('penduduk/cetak', 'PendudukController@cetak');
Route::get('penduduk/cetak/{id}', 'PendudukController@cetakDetailPenduduk');
Route::get('penduduk/cari', 'PendudukController@cari');
Route::get('penduduk/verify/{id}', 'PendudukController@verify')->name('pengguna.verify');
Route::resource('penduduk', 'PendudukController');
Route::get('verifikasi-penduduk', 'PendudukController@verifPenduduk');

// artikel
Route::post('artikel/validasi/{artikel}', 'ArtikelController@validasi');
Route::get('artikel/cari', 'ArtikelController@cari');
Route::get('artikel/create', 'ArtikelController@create');
Route::post('artikel/create', 'ArtikelController@storeArtikel');
Route::resource('artikel', 'ArtikelController');

// permohonan
Route::post('permohonan/validasi/{permohonan}', 'PermohonanController@validasiPermohonan');
Route::post('permohonan/tolak/{permohonan}', 'PermohonanController@tolak');
Route::get('permohonan/cari', 'PermohonanController@cari');
Route::get('permohonan/history/', 'PermohonanController@history');
Route::resource('permohonan', 'PermohonanController');

// history
// Route::post('history/validasi/{permohonan}', 'HistoryController@validasiPermohonan');
// Route::post('history/tolak/{permohonan}', 'HistoryController@tolak');
// Route::get('history/cari', 'HistoryController@cari');
// Route::resource('history', 'HistoryController');

// kegiatan
Route::get('kegiatan/cari', 'KegiatanController@cari');
Route::resource('kegiatan', 'KegiatanController');

// dokumen
Route::resource('dokumen', 'DokumenController');

// pelayanan
Route::resource('pelayanan', 'PelayananController');

//Report PDF
Route::get('/downloadpdf', [PendudukController::class, 'downloadpdf']);


// pengguna
Route::resource('pengguna', 'PenggunaController');

// admin
Route::resource('admin', 'AdminController');

// pengaturan
Route::get('pengaturan', 'DashboardController@pengaturan');
Route::patch('pengaturan/ganti-gambar-latar/1', 'DashboardController@gantiGambarLatar');
Route::patch('pengaturan/ganti-warna-navbar/1', 'DashboardController@gantiWarnaNavbar');

// email
Route::get('/send-email', [MailController::class, 'sendEmail']);

Route::get('tes', function () {
    return sha1(md5('pengguna'));
});
