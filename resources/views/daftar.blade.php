<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar SIPADATASIH</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets-dashboard/images/logo-sideskel.png') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets-beranda/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets-beranda/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets-beranda/assets/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-beranda/assets/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets-beranda/assets/vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets-beranda/assets/vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-beranda/assets/vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets-beranda/assets/vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-beranda/assets/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets-beranda/assets/css/main.css') }}">
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <span class="login100-form-title p-b-20">
                    <img src="{{ asset('assets-dashboard/images/logo-sideskel.png') }}" class="image" width="100">
                </span>
                <span class="login100-form-title p-b-26">
                    DAFTAR
                </span>
                @if ($errors->any())
                    <div class="content text-center">
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger text-center">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                @if (session('pesan'))
                    <div class="alert alert-danger text-center">
                        {{ session('pesan') }}
                    </div>
                @endif

                {!! Form::open(['url' => 'daftar', 'files' => true, 'class' => 'login100-form validate-form']) !!}

                <div class="wrap-input100 validate-input">
                    {!! Form::text('nama_pengguna', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="Nama"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::text('email_pengguna', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::password('password_pengguna', ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="Password"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::password('confirm_password', ['class' => 'input100']) !!}
                    <span class="focus-input100 @error('password') is-invalid @enderror"
                        data-placeholder="Confirm Password"></span>
                </div>

                {{-- <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                            required autocomplete="current-password">
                    </div> --}}

                <div class="wrap-input100 validate-input">
                    {!! Form::text('no_hp', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="No. HP"></span>
                </div>

                <!-- <div class="wrap-input100 validate-input">
                    {!! Form::select('jenis_kelamin', ['perempuan' => 'Perempuan', 'laki-laki' => 'Laki - Laki'], null, [
                        'placeholder' => 'Jenis Kelamin',
                        'class' => 'form-control',
                    ]) !!}
                </div> -->

                

                <div class="wrap-input100 validate-input">
                    {!! Form::text('nik', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="NIK"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::text('no_kk', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="No Kartu Keluarga"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::text('nama_penduduk', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="Nama Penduduk"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::select('is_pendatang', ['0' => 'Penduduk', '1' => 'Pendatang'], null, [
                        'placeholder' => 'Status Kependudukan',
                        'class' => 'form-control',
                    ]) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::text('alamat_penduduk', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="Alamat Berdasarkan KTP"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::select('rt', ['001' => '001', '002' => '002', '003' => '003', '004' => '004', '005' => '005', '006' => '006', '007' => '007', '008' => '008', '009' => '009', '010' => '010', '011' => '011', '012' => '012', '013' => '013', '014' => '014', '015' => '015', '016' => '016', '017' => '017', '018' => '018', '019' => '019', '020' => '020', '021' => '021'], null, [
                        'placeholder' => 'RT Domisili saat ini',
                        'class' => 'form-control',
                    ]) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::select('rw', ['001' => '001', '002' => '002', '003' => '003', '004' => '004', '005' => '005', '006' => '006', '007' => '007', '008' => '008', '009' => '009', '010' => '010', '011' => '011', '012' => '012'], null, [
                        'placeholder' => 'RW Domisili saat ini',
                        'class' => 'form-control',
                    ]) !!}
                </div>

                <!-- <div class="wrap-input100 validate-input">
                    {!! Form::select('status_menikah', ['sudah' => 'Sudah', 'belum' => 'Belum'], null, [
                        'placeholder' => 'Status Menikah',
                        'class' => 'form-control',
                    ]) !!}
                </div> -->

                

                <div class="wrap-input100 validate-input">
                    {!! Form::text('tempat_lahir', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="Tempat Lahir"></span>
                </div>

                <div class="form-group has-success">
                    <label class="control-label mb-1">Tanggal Lahir</label>
                    {!! Form::date('tanggal_lahir', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::text('pekerjaan', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="Pekerjaan"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::select('status_menikah', ['BELUM KAWIN' => 'BELUM KAWIN', 'KAWIN' => 'KAWIN', 'CERAI HIDUP' => 'CERAI HIDUP', 'CERAI MATI' => 'CERAI MATI'], null, [
                        'placeholder' => 'Status Perwakinan',
                        'class' => 'form-control',
                    ]) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::select('agama', ['islam' => 'Islam', 'protestan' => 'Protestan', 'katolik' => 'Katolik', 'hindu' => 'Hindu', 'budha' => 'Budha', 'khonghucu' => 'Khonghucu'], null, [
                        'placeholder' => 'Agama',
                        'class' => 'form-control',
                    ]) !!}
                </div>
                <!-- <div class="wrap-input100 validate-input">
                    {!! Form::text('agama', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="Agama"></span>
                </div> -->

                <div class="wrap-input100 validate-input">
                    {!! Form::select('pendidikan_terakhir', ['TAMAT SD / SEDERAJAT' => 'TAMAT SD / SEDERAJAT', 'TIDAK / BELUM SEKOLAH' => 'TIDAK / BELUM SEKOLAH', 'SLTA / SEDERAJAT' => 'SLTA / SEDERAJAT', 'SLTP/SEDERAJAT' => 'SLTP/SEDERAJAT', 'DIPLOMA IV/ STRATA I' => 'DIPLOMA IV/ STRATA I', 'DIPLOMA I / II' => 'DIPLOMA I / II', 'AKADEMI/ DIPLOMA III/S. MUDA' => 'AKADEMI/ DIPLOMA III/S. MUDA', 'STRATA II' => 'STRATA II', 'STRATA III' => 'STRATA III'], null, [
                        'placeholder' => 'Pendidikan Terakhir',
                        'class' => 'form-control',
                    ]) !!}
                </div>
                <!-- <div class="wrap-input100 validate-input">
                    {!! Form::text('pendidikan_terakhir', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="Pendidikan Terakhir"></span>
                </div> -->

                <div class="wrap-input100 validate-input">
                    {!! Form::select('golongan_darah', ['a' => 'A', 'b' => 'B', 'ab' => 'AB', 'o' => 'O'], null, [
                        'placeholder' => 'Golongan Darah',
                        'class' => 'form-control',
                    ]) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::select('jenis_kelamin', ['perempuan' => 'Perempuan', 'laki-laki' => 'Laki - Laki'], null, [
                        'placeholder' => 'Jenis Kelamin',
                        'class' => 'form-control',
                    ]) !!}
                </div>

                <!-- <div class="wrap-input100 validate-input">
                    {!! Form::text('rt', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="Rukun Tetangga"></span>
                </div> -->

                

                <!-- <div class="wrap-input100 validate-input">
                    {!! Form::text('rw', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="Rukun Warga"></span>
                </div> -->

                <div class="wrap-input100 validate-input">
                    <label class="control-label mb-1">Foto KTP</label>
                    {!! Form::file('foto_ktp', null, ['class' => 'input100']) !!}
                    <!-- {!! Form::file('foto_ktp', ['class' => 'custom-file-input', 'id' => 'foto_ktp']) !!} -->
                    <span class="focus-input100" data-placeholder=""></span>
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="control-label mb-1">Foto KK</label>
                    {!! Form::file('foto_kk', null, ['class' => 'input100']) !!}
                    <!-- {!! Form::file('foto_kk', ['class' => 'custom-file-input', 'id' => 'foto_kk']) !!} -->
                    <span class="focus-input100" data-placeholder=""></span>
                </div>



                {!! Form::hidden('id_penduduk', 1) !!}

                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> DAFTAR</button>
                {!! Form::close() !!}
                {{-- <a href="{{ url('daftarpenduduk') }}" class="btn btn-primary btn-block"><i class="fa fa-edit"></i>
                    DAFTAR</a> --}}

                <a href="{{ url('masuk') }}" class="btn btn-outline-info btn-block mt-2 w-50 float-left"> <i
                        class="fa fa-sign-in"></i> MASUK</a>
                <a href="{{ url('/') }}" class="btn btn-outline-warning d-inline-block mt-2 w-50 float-right"><i
                        class="fa fa-home"></i>
                    BERANDA</a>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>
    <script src="{{ asset('assets-beranda/assets/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets-beranda/assets/vendor/animsition/js/animsition.min.js') }}"></script>
    <script src="{{ asset('assets-beranda/assets/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('assets-beranda/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets-beranda/assets/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets-beranda/assets/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('assets-beranda/assets/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets-beranda/assets/vendor/countdowntime/countdowntime.js') }}"></script>
    <script src="{{ asset('assets-beranda/assets/js/main.js') }}"></script>
</body>


<script>
    var file = document.getElementById("ktp_pengguna");
    file.addEventListener('change', function() {
        document.getElementById("target").innerHTML = "Upload KTP : " + file.files[0].name;
    })
</script>


</html>
