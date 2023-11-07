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
            <div class="wrap-login100 ">
                <span class="login100-form-title p-b-20">
                    <img src="{{ asset('assets-dashboard/images/logo-sideskel.png') }}" class="image" width="100">
                </span>
                <span class="login100-form-title p-b-26">
                    MASUKAN DATA PENDUDUK
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

                {!! Form::open(['url' => 'daftarpenduduk', 'class' => 'login100-form validate-form']) !!}

                <div class="wrap-input100 validate-input">
                    {!! Form::text('nama_pengguna', null, ['class' => 'input100']) !!}
                    <span class="focus-input100" data-placeholder="NIK"></span>
                </div>

                <div class="wrap-input100 validate-input">
                    {!! Form::select('is_pendatang', ['0' => 'Penduduk', '1' => 'Pendatang'], null, [
                        'placeholder' => '-- Status Penduduk --',
                        'class' => 'form-control',
                    ]) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="control-label"></label>
                    {!! Form::number('no_kk', null, [
                        'class' => 'input100',
                        'placeholder' => 'NO Kartu Keluarga',
                    ]) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="control-label mb-1"></label>
                    {!! Form::text('nama_penduduk', null, [
                        'class' => 'input100',
                        'placeholder' => 'Nama',
                    ]) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="control-label mb-1"></label>
                    {!! Form::textarea('alamat_penduduk', null, [
                        'class' => 'input100',
                        'placeholder' => 'Alamat',
                        'rows' => '3',
                    ]) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="control-label mb-1"></label>
                    {!! Form::select(
                        'status_menikah',
                        [
                            'sudah' => 'Sudah',
                            'belum' => 'Belum',
                        ],
                        null,
                        [
                            'placeholder' => 'Status Menikah ',
                            'class' => 'form-control',
                        ],
                    ) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="control-label mb-1"></label>
                    {!! Form::text('tempat_lahir', null, [
                        'class' => 'input100',
                        'placeholder' => 'Tempat Lahir',
                    ]) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="control-label mb-1">Tanggal Lahir</label>
                    {!! Form::date('tanggal_lahir', \Carbon\Carbon::now(), [
                        'class' => 'input100',
                        'placeholder' => 'Tanggal Lahir',
                    ]) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="control-label mb-1"></label>
                    {!! Form::text('pekerjaan', null, ['class' => 'imput100', 'placeholder' => 'Pekerjaan']) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="control-label mb-1"></label>
                    {!! Form::text('agama', null, ['class' => 'input100', 'placeholder' => 'Agama']) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="control-label mb-1"></label>
                    {!! Form::text('pendidikan_terakhir', null, ['class' => 'input100', 'placeholder' => 'Pendidikan Terakhir']) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="control-label mb-1"></label>
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

                <div class="wrap-input100 validate-input">
                    <label class="control-label mb-1"></label>
                    {!! Form::text('rt', null, ['class' => 'input100', 'placeholder' => 'Rukun Tetangga']) !!}
                </div>

                <div class="wrap-input100 validate-input">
                    <label class="control-label mb-1"></label>
                    {!! Form::text('rw', null, ['class' => 'input100', 'placeholder' => 'Rukun Warga']) !!}
                </div>



                {!! Form::hidden('id_penduduk', 1) !!}

                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> DAFTAR</button>
                {!! Form::close() !!}

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

</html>
