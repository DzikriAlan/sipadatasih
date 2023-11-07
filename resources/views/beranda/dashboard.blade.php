@extends('beranda/template')
@section('main-beranda')
<!-- TODO : buat halaman untuk RT/RW -->
<!-- TODP : buat tombol untuk RT/RW -->
        <div data-aos="flip-right" class="site-section bg-light">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-lg-12">

                        <h2 class="site-heading text-center text-black mb-2 mt-5 mt-md-2 mt-xl-0"><strong>DASHBOARD PENGGUNA</strong></h2>

                        <div class="non-home">
                            @include('pesan.pesan_info')
                        </div>

                        <div class="non-home p-5 bg-white">

                            <h5 class="float-left">PROFIL</h5>
                            <a href="{{ url('beranda/dashboard/edit-pengguna') }}" class="btn btn-success btn-sm d-inline-block my-1 float-right"><i class="fa fa-edit fa-lg"></i></a>

                            <table class="table table-borderless">
                                <tr>
                                    <td class="text-left">
                                        @if(empty($pengguna->foto_pengguna))
                                        <img src="{{ asset('assets-dashboard/images/default.jpg') }}" width="200">
                                        @else
                                        <img src="{{ asset('assets-dashboard/images/'. $pengguna->foto_pengguna ) }}" width="200">
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <table class="table table-responsive-sm table-borderless">
                                <tr>
                                    <th class="text-left">
                                        NAMA
                                    </th>
                                    <td class="text-left">
                                        {{ $pengguna->nama_pengguna }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-left">
                                        NIK
                                    </th>
                                    <td class="text-left">
                                        {{ $penduduk->nik }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-left">
                                        EMAIL
                                    </th>
                                    <td class="text-left">
                                        {{ $pengguna->email_pengguna }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-left">
                                        JENIS KELAMIN
                                    </th>
                                    <td class="text-left text-uppercase">
                                        {{ $pengguna->jenis_kelamin }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-left">
                                        NO. HP
                                    </th>
                                    <td class="text-left">
                                        {{ $pengguna->no_hp }}
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-left">
                                        Kependudukan
                                    </th>
                                    <td class="text-left">
                                        @if($penduduk->is_pendatang === 0)
                                            Penduduk Asli
                                        @elseif($penduduk->is_pendatang === 1)
                                            Pendatang
                                        @endif
                                    </td>
                                </tr>
                            </table>

                            <h5 class="text-center mt-3 float-left">DAFTAR PERMOHONAN</h5>
                            <!-- <a href="{{ url('beranda/dashboard/tambah') }}" class="btn btn-primary btn-sm d-inline-block my-1 float-right"><i class="fa fa-plus fa-lg"></i> </a> -->
                            <a href="{{ url('beranda/dashboard/tambah/permohonan') }}" class="btn btn-primary btn-sm d-inline-block my-1 float-right"><i class="fa fa-plus fa-lg"></i> </a>
                            <table class="table table-hover table-responsive-sm">
                                <tr>
                                    <th class="font-weight-bold text-center">NO PERMOHONAN</th>
                                    <th class="font-weight-bold text-center">PELAYANAN</th>
                                    <th class="font-weight-bold text-center">STATUS</th>
                                    <th class="font-weight-bold text-center">AKSI</th>
                                </tr>
                                <?php $i=1 ?>
                                @foreach($permohonan as $permohonan)
                                <tr>
                                    <td class="text-center">{{ $permohonan->no_sp }}</td>
                                    <td class="text-center">{{ $permohonan->nama_pelayanan }}</td>
                                    <td class="text-center">
                                            @if($permohonan->status === 0)
                                                Menunggu Verifikasi RT
                                            @elseif($permohonan->status === 1)
                                                Menunggu Verifikasi RW
                                            @elseif($permohonan->status === 2)
                                                Proses Checking & Penomoran
                                            @elseif($permohonan->status === 3)
                                                Proses Persetujuan Lurah
                                            @elseif($permohonan->status === 4)
                                                <i class="fa fa-check fa-lg text-primary"></i> Permohonan di setujui
                                            @elseif($permohonan->status === 5)
                                            <i class="fa fa-times fa-lg text-danger"></i> Permohonan di tolak
                                            @endif
                                    </td>
                                    <td class="text-center">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash fa-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
