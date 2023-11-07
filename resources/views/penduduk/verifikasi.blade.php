@extends('template')
@section('main-dashboard')
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    @include('pesan.pesan_info')

                    @include('penduduk.cari')

                    @if (Request::get('nama_penduduk') ||
                        Request::get('pekerjaan') ||
                        Request::get('golongan_darah') ||
                        Request::get('agama') ||
                        Request::get('jenis_kelamin'))
                        <div class="col-md-12 mb-3 mt-1">
                            <h5>FILTER :

                                @if (Request::get('nama_penduduk'))
                                    NAMA / NIK : <strong>{{ Request::get('nama_penduduk') }}</strong> &nbsp;
                                @endif

                                @if (Request::get('pekerjaan'))
                                    PEKERJAAN : <strong>{{ Request::get('pekerjaan') }}</strong> &nbsp;
                                @endif

                                @if (Request::get('golongan_darah'))
                                    GOLONGAN DARAH : <strong>{{ Request::get('golongan_darah') }}</strong> &nbsp;
                                @endif

                                @if (Request::get('agama'))
                                    AGAMA : <strong>{{ Request::get('agama') }}</strong> &nbsp;
                                @endif

                                @if (Request::get('jenis_kelamin'))
                                    JENIS KELAMIN : <strong>{{ Request::get('jenis_kelamin') }}</strong> &nbsp;
                                @endif
                            </h5>
                        </div>
                    @endif

                   

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-users"></i>&nbsp; PENDUDUK</strong>
                                @if (Request::get('nama_penduduk') ||
                                    Request::get('pekerjaan') ||
                                    Request::get('golongan_darah') ||
                                    Request::get('agama') ||
                                    Request::get('jenis_kelamin'))
                                    <a href="{{ url('penduduk/cetak?nama_penduduk=' . Request::get('nama_penduduk') . '&pekerjaan=' . Request::get('pekerjaan') . '&golongan_darah=' . Request::get('golongan_darah') . '&agama=' . Request::get('agama') . '&jenis_kelamin=' . Request::get('jenis_kelamin')) }}"
                                        class="btn btn-warning btn-sm float-right mx-1"> <i class="fa fa-print fa-lg"></i>
                                    </a>
                                @else
                                    <input type='button' class="btn btn-warning btn-sm float-right mx-1" id='btn'
                                        value='Print' onclick='printDiv();'>
                                    <i class="fa fa-print fa-lg"></i>Print </i>
                                    {{-- <input type='button'class="btn btn-warning btn-sm float-right mx-1" id='btn'
                                        value='Print' onclick='printDiv();'> --}}
                                @endif
                                <a href="{{ url('penduduk/create') }}" class="btn btn-primary btn-sm float-right"> <i
                                        class="fa fa-plus fa-lg"></i> </a>
                            </div>
                            <div class="card-body">
                                <span class="float-left"> Total Data :
                                    <strong class="font-weight-bold d-inline-block mb-1">
                                        {{ number_format($daftar_pengguna_belum_terverifikasi->total(), 0, ',', '.') }} </strong>
                                </span>
                                <span class="float-right">
                                    Update Terakhir :
                                    <strong class="font-weight-bold d-inline-block mb-1 text-capitalize">
                                        {{ $update_terakhir->updated_at->diffForHumans() }}
                                    </strong>
                                </span>

                                <table id="bootstrap-data-table" class="table table-striped">
                                    <tr>
                                        <th>NO</th>
                                        <th>NIK</th>
                                        <th>NAMA</th>
                                        <th>ALAMAT KTP</th>
                                        <th>RT / RW DOMISILI</th>
                                        <th>STATUS PENDUDUK</th>
                                        <th>GENDER</th>
                                        <th>AKSI</th>
                                    </tr>
                                    <?php $i = 1; ?>
                                    @foreach ($daftar_pengguna_belum_terverifikasi as $penduduk)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $penduduk->nik }}</td>
                                            <td>{{ $penduduk->nama_penduduk }}</td>
                                            <td>{{ $penduduk->alamat_penduduk }}</td>
                                            <td class="text-uppercase">{{ $penduduk->rt }} / {{ $penduduk->rw }}</td>
                                            @if($penduduk->is_pendatang == '1')
                                            {
                                            <td>Penduduk</td>
                                                    }
                                                    @else{
                                                    <td>Pendatang</td>
                                                    }
                                                    @endif
                                                    <td class="text-capitalize text-center">
                                                @if ($penduduk->jenis_kelamin == 'laki-laki')
                                                    <i class="fa fa-male fa-lg text-secondary"></i>
                                                @else
                                                    <i class="fa fa-female fa-lg"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-success btn-sm my-1 d-block"
                                                    data-toggle="modal"
                                                    data-target="#confirm-verifikasi-{{ $i }}"><i
                                                        class="fa fa-check fa-lg"></i> Verifikasi</a>
                                                <div class="modal fade text-success" id="confirm-verifikasi-{{ $i++ }}"
                                                    tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-success text-white">
                                                                <i class="fa fa-exclamation-circle fa-lg"></i> PERINGATAN!
                                                            </div>
                                                            <div class="modal-body">
                                                                APAKAH YAKIN AKAN MENVERIFIKASI DATA INI ?
                                                                <br><br><br>
                                                                *) Data yang sudah dihapus tidak bisa dikembalikan lagi
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-info btn-sm"
                                                                    data-dismiss="modal"><i
                                                                        class="fa fa-times-circle fa-lg"></i> </button>
                                                                        <a href="{{ url('penduduk/verify/' . $penduduk->id) }}"
                                                                    class="btn btn-info btn-sm my-1 d-block">VERFIKASI
                                                                </a>   
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <nav aria-label="Page navigation example">
                {{ $daftar_pengguna_belum_terverifikasi->links() }}
            </nav>
        </div>

    </div>
    </div><!-- .animated -->
    </div><!-- .content -->


    <div class="clearfix"></div>

    @include('footer')
    <script>
        function printDiv() {

            var divToPrint = document.getElementById('printPreview');
            var newWin = window.open();
            // newWin.document.open();
            newWin.document.write('<html><body onload="window.print()">' +
                divToPrint.innerHTML + '<style type="text/css">' +
                'table th, table td {' +
                'border:1px solid #000;' +
                'padding:0.5em;' +
                '}' +
                '</style>' +
                '</body></html>');
            newWin.document.close();
            // setTimeout(function() {
            //     newWin.close();
            // }, 10);

        }
    </script>

    </div>
    <!-- /#right-panel -->
@stop
