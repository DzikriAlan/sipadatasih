@extends('template')
@section('main-dashboard')
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    @include('pesan.pesan_info')

                    @include('permohonan.cari')

                    @if (Request::get('nik_permohonan'))
                        <div class="col-md-12 mb-3 mt-1">
                            <h5>NIK : <strong>{{ Request::get('nik_permohonan') }}</strong> &nbsp;
                            </h5>
                        </div>
                    @endif

                    {{-- <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-newspaper-o"></i>&nbsp; PERMOHONAN MENUNGGU
                                    PROSES</strong>
                                @if (Session::has('pengguna') || Session::has('lurah'))
                                    <a href="{{ url('permohonan/create') }}" class="btn btn-primary btn-sm float-right"> <i
                                            class="fa fa-plus fa-lg"></i> </a>
                                @endif
                            </div>
                            <div class="card-body">
                                <span class="float-left"> Total Data :
                                    <strong class="font-weight-bold d-inline-block mb-1"> {{ $daftar_permohonan->count() }}
                                    </strong>
                                </span>
                                <table id="bootstrap-data-table" class="table table-striped">
                                    <tr>
                                        <th>NO</th>
                                        <th>LAYANAN</th>
                                        <th>PEMOHON</th>
                                        <th>DOMISILI</th>
                                        <th>STATUS</th>
                                        <th>AKSI</th>
                                    </tr>
                                    @foreach ($daftar_permohonan as $permohonan)
                                        <tr>
                                            <td class="text-left">{{ $permohonan->no_sp }}</td>
                                            <td>{{ $permohonan->nama_pelayanan }}</td>
                                            <td>{{ $permohonan->nik }} : {{ $permohonan->nama_penduduk }}</td>
                                            <td>{{ $permohonan->alamat_domisili }}
                                                RT/RW{{ $permohonan->rt_domisili }}/{{ $permohonan->rw_domisili }} <br>
                                                {{ $permohonan->desa_domisili }} <br>
                                                {{ $permohonan->kecamatan_domisili }} <br>
                                                {{ $permohonan->kabupaten_domisili }} <br>
                                                {{ $permohonan->provinsi_domisili }}</td>
                                            <td class="text-left">
                                                @if ($permohonan->status === 0)
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
                                            <td>
                                                <a href="{{ url('history/' . $permohonan->id_permohonan) }}"
                                                    class="btn btn-info btn-sm d-block my-1"><i class="fa fa-eye fa-lg"></i>
                                                </a>
                                                @if (Session::has('pengguna'))
                                                    <a href="{{ url('history/' . $permohonan->id_permohonan . '/edit') }}"
                                                        class="btn btn-success btn-sm d-block my-1"><i
                                                            class="fa fa-edit fa-lg"></i> </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div> --}}

                    @if (Session::has('admin') || Session::has('staff'))
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">

                                    <strong class="card-title"><i class="fa fa-newspaper-o"></i>&nbsp; HISTORY
                                        PERMOHONAN</strong>
                                    @if (Session::has('pengguna'))
                                        <a href="{{ url('history/create') }}" class="btn btn-primary btn-sm float-right">
                                            <i class="fa fa-plus fa-lg"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <span class="float-left"> Total Data :
                                        <strong class="font-weight-bold d-inline-block mb-1">
                                            {{ $daftar_permohonan->count() }}
                                        </strong>
                                    </span>
                                    <table id="bootstrap-data-table" class="table table-striped">
                                        <tr>
                                            <th>NO</th>
                                            <th>LAYANAN</th>
                                            <th>PEMOHON</th>
                                            <th>DOMISILI</th>
                                            <th>STATUS</th>
                                            <th>AKSI</th>
                                        </tr>
                                        @foreach ($daftar_permohonan_disetujui as $permohonan)
                                            <tr>
                                                <td class="text-left">{{ $permohonan->no_sp }}</td>
                                                <td>{{ $permohonan->nama_pelayanan }}</td>
                                                <td>{{ $permohonan->nik }} : {{ $permohonan->nama_penduduk }}</td>
                                                <td>{{ $permohonan->alamat_domisili }}
                                                    RT/RW{{ $permohonan->rt_domisili }}/{{ $permohonan->rw_domisili }}
                                                    <br>
                                                    {{ $permohonan->desa_domisili }} <br>
                                                    {{ $permohonan->kecamatan_domisili }} <br>
                                                    {{ $permohonan->kabupaten_domisili }} <br>
                                                    {{ $permohonan->provinsi_domisili }}
                                                </td>
                                                <td class="text-left">
                                                    @if ($permohonan->status === 0)
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
                                                <td>

                                                    <a href="{{ url('history/' . $permohonan->id_permohonan) }}"
                                                        class="btn btn-warning btn-sm d-block my-1"><i
                                                            class="fa fa-print fa-lg">Print</i> </a>


                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>

                            </div>
                        </div>
                    @endif



                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-newspaper-o"></i>&nbsp; SEMUA PERMOHONAN
                                </strong>
                                @if (Session::has('pengguna'))
                                    <a href="{{ url('permohonan/create') }}" class="btn btn-primary btn-sm float-right"> <i
                                            class="fa fa-plus fa-lg"></i> </a>
                                @endif
                            </div>
                            <div class="card-body">
                                <span class="float-left"> Total Data :
                                    <strong class="font-weight-bold d-inline-block mb-1">
                                        {{ $daftar_semua_permohonan->count() }} </strong>
                                </span>
                                <table id="bootstrap-data-table" class="table table-striped">
                                    <tr>
                                        <th>NO</th>
                                        <th>LAYANAN</th>
                                        <th>PEMOHON</th>
                                        <th>RT/RW</th>
                                        <th>STATUS</th>
                                    </tr>
                                    @foreach ($daftar_semua_permohonan as $permohonan)
                                        <tr>
                                            <td class="text-left">{{ $permohonan->no_sp }}</td>
                                            <td>{{ $permohonan->nama_pelayanan }}</td>
                                            <td>{{ $permohonan->nik }} : {{ $permohonan->nama_penduduk }}</td>
                                            <td>{{ $permohonan->rt_domisili }}/{{ $permohonan->rw_domisili }}</td>
                                            <td class="text-left">
                                                @if ($permohonan->status === 0)
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
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>

        @include('footer')



    </div>
    <!-- /#right-panel -->
@stop
