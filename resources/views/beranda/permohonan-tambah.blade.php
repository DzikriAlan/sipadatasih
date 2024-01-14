@extends('beranda/template')
@section('main-beranda')
    <div data-aos="flip-right" class="site-section bg-light">
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-lg-12">

                    <h2 class="site-heading text-center text-black mb-2 mt-5 mt-md-2 mt-xl-0"><strong>TAMBAH
                            PERMOHONAN</strong></h2>

                    <div class="non-home p-5 bg-white">

                        @include('errors.form_error')
                        @include('pesan.pesan_info')

                        @if(!is_object($penduduk))
                            {!! Form::open(['url' => 'pelayanan/tambah/permohonan', 'files' => true, 'style' => 'box-shadow:none']) !!}
                                <div class="form-group">
                                    <label class="control-label">NIK</label>
                                    {!! Form::text('nik', '', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Contoh: 32167581309200009',
                                    ]) !!}
                                </div>
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fa fa-search fa-lg"></i>
                                </button>
                            {!! Form::close() !!}
                        @endif
                        {!! Form::open(['url' => 'pelayanan/kirim/permohonan', 'files' => true, 'style' => 'box-shadow:none']) !!}
                        @if(is_object($penduduk))
                            <div class="form-group">
                                <label class="control-label">NIK</label>
                                {!! Form::text('nik', $penduduk->nik, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Contoh: 32167581309200009',
                                ]) !!}
                            </div>
                        @endif

                        <div class="form-group">
                            {{-- <select name="pelayanan" id="daftar_pelayanan" class="form-control">
                                <option value="">Pilih Layanan</option>
                                @foreach ($daftar_pelayanan as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select> --}}
                            <label class="control-label">Pilih Layanan</label>
                            {!! Form::select('id_layanan', $daftar_pelayanan, 'null', [
                                'onchange' => 'change();',
                                'class' => 'form-control',
                                'id' => 'pilihan_layanan',
                                'placeholder' => '-- Pelayanan --',
                            ]) !!}
                        </div>


                        @if (is_object($penduduk))
                        <div class="form-group">
                            <label class="control-label">No Surat Pelayanan</label>
                            {!! Form::text('no_sp', $no_sp, [
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: 10/12/2022/1',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            {!! Form::text('nama', $penduduk->nama_penduduk, [
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: Alif Perdana Sugeha',
                            ]) !!}
                        </div>
                            {!! Form::hidden('created_by', $penduduk->id) !!}
                            {!! Form::hidden('updated_by', $penduduk->id) !!}
                        <div class="form-group">
                            <label class="control-label">Jenis Kelamin</label>
                            {!! Form::select(
                                'jenis_kelamin',
                                ['laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan'],
                                $penduduk->jenis_kelamin,
                                ['readonly', 'class' => 'form-control', 'placeholder' => '-- Pelayanan --'],
                            ) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat Lahir</label>
                            {!! Form::text('tempat_lahir', $penduduk->tempat_lahir, [
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: Bekasi',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            {!! Form::text('tanggal_lahir', $penduduk->tanggal_lahir, [
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: 13 Februari 1998',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Warga Negara</label>
                            {!! Form::text('warga_negara', 'Indonesia', [
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: Indonesia',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            {!! Form::text('agama', $penduduk->agama, [
                                'readonly',
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: Muslim',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pekerjaan</label>
                            {!! Form::text('pekerjaan', $penduduk->pekerjaan, [
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: Karyawan Swasta',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Pernikahan</label>
                            {!! Form::text('status_pernikahan', $penduduk->status_menikah, [
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: Belum Kawin',
                            ]) !!}
                        </div>
                        @endif

                        @if (!is_object($penduduk))
                            @if ($no_sp === null)
                            <div class="form-group">
                                <label class="control-label">No Surat Pelayanan</label>
                                {!! Form::text('no_sp', '', [
                                    'readonly',
                                    'class' => 'form-control',
                                    'placeholder' => 'Contoh: 10/12/2022/1',
                                ]) !!}
                            </div>
                            @endif
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            {!! Form::text('nama', '', [
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: Alif Perdana Sugeha',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Jenis Kelamin</label>
                            {!! Form::select(
                                'jenis_kelamin',
                                ['laki-laki' => 'Laki-laki', 'perempuan' => 'Perempuan'],
                                '',
                                ['readonly', 'class' => 'form-control', 'placeholder' => '-- Pelayanan --'],
                            ) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tempat Lahir</label>
                            {!! Form::text('tempat_lahir', '', [
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: Bekasi',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            {!! Form::text('tanggal_lahir', '', [
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: 13 Februari 1998',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Warga Negara</label>
                            {!! Form::text('warga_negara', 'Indonesia', [
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: Indonesia',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Agama</label>
                            {!! Form::text('agama', '', [
                                'readonly',
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: Muslim',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Pekerjaan</label>
                            {!! Form::text('pekerjaan', '', [
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: Karyawan Swasta',
                            ]) !!}
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status Pernikahan</label>
                            {!! Form::text('status_pernikahan', '', [
                                'readonly',
                                'class' => 'form-control',
                                'placeholder' => 'Contoh: Belum Kawin',
                            ]) !!}
                        </div>
                        @endif



                        @if(is_object($penduduk))
                            <div class="form-group" id="jenis_usaha" >
                                <label class="control-label">Jenis usaha</label>
                                {!! Form::text('jenis_usaha', '', [
                                    'class' => 'form-control',
                                    'placeholder' => 'Contoh: Fotocopy',
                                ]) !!}
                            </div>
                            <div class="form-group" id="alamat_usaha" >
                                <label class="control-label">Alamat Tempat Usaha</label>
                                {!! Form::text('alamat_usaha', '', [
                                    'class' => 'form-control',
                                    'placeholder' => 'Contoh: Jl.fatahilah no 12',
                                ]) !!}
                            </div>

                            @if ($penduduk->is_pendatang === 0)
                                <div class="form-group">
                                    <label class="control-label">Alamat</label>
                                    {!! Form::textarea('alamat_domisili', $penduduk->alamat_penduduk, [
                                        'readonly',
                                        'class' => 'form-control',
                                        'placeholder' => 'Contoh: Jl. Imam Bonjol IIF',
                                    ]) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">RT</label>
                                    {!! Form::number('rt_domisili', $penduduk->rt, [
                                        'readonly',
                                        'class' => 'form-control',
                                        'placeholder' => 'Contoh: 001',
                                    ]) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">RW</label>
                                    {!! Form::number('rw_domisili', $penduduk->rw, [
                                        'readonly',
                                        'class' => 'form-control',
                                        'placeholder' => 'Contoh: 001',
                                    ]) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Desa</label>
                                    {!! Form::text('desa_domisili', $penduduk->desa, [
                                        'readonly',
                                        'class' => 'form-control',
                                        'placeholder' => 'Contoh: Telaga Asih',
                                    ]) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kecamatan</label>
                                    {!! Form::text('kecamatan_domisili', $penduduk->kecamatan, [
                                        'readonly',
                                        'class' => 'form-control',
                                        'placeholder' => 'Contoh: Cikarang Barat',
                                    ]) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kabupaten</label>
                                    {!! Form::text('kabupaten_domisili', $penduduk->kabupaten, [
                                        'readonly',
                                        'class' => 'form-control',
                                        'placeholder' => 'Contoh: Kaupaten Bekasi',
                                    ]) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Provinsi</label>
                                    {!! Form::text('provinsi_domisili', $penduduk->provinsi, [
                                        'readonly',
                                        'class' => 'form-control',
                                        'placeholder' => 'Contoh: Jawa Barat',
                                    ]) !!}
                                </div>
                            @endif

                            @if ($penduduk->is_pendatang === 1)
                                <div class="form-group">
                                    <label class="control-label">Alamat Domisili</label>
                                    {!! Form::textarea('alamat_domisili', null, [
                                        'class' => 'form-control',
                                        'placeholder' => 'Contoh: Contoh: Jl. Imam Bonjol IIF',
                                    ]) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">RT</label>
                                    {!! Form::number('rt_domisili', null, ['class' => 'form-control', 'placeholder' => 'Contoh: 001']) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">RW</label>
                                    {!! Form::number('rw_domisili', null, ['class' => 'form-control', 'placeholder' => 'Contoh: 001']) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Desa</label>
                                    {!! Form::text('desa_domisili', 'Telaga Asih', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Contoh: Telaga Asih',
                                    ]) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kecamatan</label>
                                    {!! Form::text('kecamatan_domisili', 'Cikarang Barat', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Contoh: Cikarang Barat',
                                    ]) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Kabupaten</label>
                                    {!! Form::text('kabupaten_domisili', 'Kabupaten Bekasi', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Contoh: Kabupaten Bekasi',
                                    ]) !!}
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Provinsi</label>
                                    {!! Form::text('provinsi_domisili', 'Jawa Barat', [
                                        'class' => 'form-control',
                                        'placeholder' => 'Contoh: Jawa Barat',
                                    ]) !!}
                                </div>
                            @endif
                        @endif

                        @if (!is_object($penduduk))
                            <div class="form-group">
                                <label class="control-label">Alamat Domisili</label>
                                {!! Form::textarea('alamat_domisili', null, [
                                    'readonly',
                                    'class' => 'form-control',
                                    'placeholder' => 'Contoh: Contoh: Jl. Imam Bonjol IIF',
                                ]) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">RT</label>
                                {!! Form::number('rt_domisili', null, ['readonly', 'class' => 'form-control', 'placeholder' => 'Contoh: 001']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">RW</label>
                                {!! Form::number('rw_domisili', null, ['readonly', 'class' => 'form-control', 'placeholder' => 'Contoh: 001']) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Desa</label>
                                {!! Form::text('desa_domisili', 'Telaga Asih', [
                                    'readonly',
                                    'class' => 'form-control',
                                    'placeholder' => 'Contoh: Telaga Asih',
                                ]) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kecamatan</label>
                                {!! Form::text('kecamatan_domisili', 'Cikarang Barat', [
                                    'readonly',
                                    'class' => 'form-control',
                                    'placeholder' => 'Contoh: Cikarang Barat',
                                ]) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Kabupaten</label>
                                {!! Form::text('kabupaten_domisili', 'Kabupaten Bekasi', [
                                    'readonly',
                                    'class' => 'form-control',
                                    'placeholder' => 'Contoh: Kabupaten Bekasi',
                                ]) !!}
                            </div>
                            <div class="form-group">
                                <label class="control-label">Provinsi</label>
                                {!! Form::text('provinsi_domisili', 'Jawa Barat', [
                                    'readonly',
                                    'class' => 'form-control',
                                    'placeholder' => 'Contoh: Jawa Barat',
                                ]) !!}
                            </div>
                        @endif
 
                        <div class="form-group">
                            <label class="control-label">Penggunaan</label>
                            {!! Form::text('penggunaan', null, ['class' => 'form-control', 'placeholder' => 'Contoh: Melamar Pekerjaan']) !!}
                        </div>
                        <div>
                            {!! Form::hidden('id_user', Session::get('id')) !!}

                            @if (is_object($penduduk))
                                @if ($penduduk->is_pendatang === 0)
                                    {!! Form::hidden('is_pendatang', 0) !!}
                                @endif

                                @if ($penduduk->is_pendatang === 1)
                                    {!! Form::hidden('is_pendatang', 1) !!}
                                @endif
                            @endif
                            @if (!is_object($penduduk))
                                {!! Form::hidden('is_pendatang', 0) !!}
                            @endif

                            {!! Form::hidden('status', 0) !!}
                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fa fa-paper-plane fa-lg"></i>
                            </button>
                            <button type="submit" class="btn btn-secondary btn-block">
                                <i class="fa fa-arrow-left fa-lg"></i>
                            </button>
                        </div>
                        {!! Form::close() !!}

                        <script type="text/javascript">
                            function change() {
                                var myVar = $("#pilihan_layanan").val();
                                console.log(myVar);
                                if (myVar == 17) {
                                    $("#jenis_usaha").show();
                                    $("#alamat_usaha").show();
                                } else {
                                    $("#jenis_usaha").hide();
                                    $("#alamat_usaha").hide();
                                }
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
