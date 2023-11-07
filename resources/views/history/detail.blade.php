@extends('template')
@section('main-dashboard')
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-newspaper-o"></i>&nbsp; PERMOHONAN</strong>
                                @if (Session::has('admin') || Session::has('kasi'))
                                    <a href="{{ url('histor/' . $permohonan->id_permohonan . '/edit') }}"
                                        class="btn btn-success btn-sm float-right mx-1"><i class="fa fa-edit fa-lg"></i>
                                    </a>
                                @endif
                                <a href="{{ url('history') }}" class="btn btn-info btn-sm float-right mx-1"> <i
                                        class="fa fa-arrow-left fa-lg"></i> </a>

                                @if (Session::has('admin') || Session::has('staff') || Session::has('lurah'))
                                    <a href="#" class="btn btn-primary btn-sm float-right mx-1" data-toggle="modal"
                                        data-target="#confirm-delete"><i class="fa fa-check fa-lg"></i> </a>
                                    <div class="modal fade text-primary" id="confirm-delete" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-white">
                                                    <i class="fa fa-exclamation-circle fa-lg"></i> INFO
                                                </div>
                                                <div class="modal-body">
                                                    APAKAH YAKIN DATA INI VALID?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light btn-sm"
                                                        data-dismiss="modal"><i class="fa fa-times-circle"></i>
                                                        BATAL</button>
                                                    <input type='button'class="btn btn-primary btn-sm" id='btn'
                                                        value='Print' onclick='printDiv();'>
                                                    {!! Form::open(['url' => 'history/validasi/' . $permohonan->id_permohonan, 'class' => 'd-inline']) !!}
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-check"></i> VALID
                                                    </button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (Session::has('ketua_rt') || Session::has('ketua_rw') || Session::has('kasi'))
                                    <a href="#" class="btn btn-primary btn-sm float-right mx-1" data-toggle="modal"
                                        data-target="#confirm-delete"><i class="fa fa-check fa-lg"></i> </a>
                                    <div class="modal fade text-primary" id="confirm-delete" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-white">
                                                    <i class="fa fa-exclamation-circle fa-lg"></i> INFO
                                                </div>
                                                <div class="modal-body">
                                                    APAKAH YAKIN DATA INI VALID?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light btn-sm"
                                                        data-dismiss="modal"><i class="fa fa-times-circle"></i>
                                                        BATAL</button>
                                                    {{-- <input type='button'class="btn btn-primary btn-sm" id='btn'
                                                        value='Print' onclick='printDiv();'> --}}
                                                    {!! Form::open(['url' => 'history/validasi/' . $permohonan->id_permohonan, 'class' => 'd-inline']) !!}
                                                    <button type="submit" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-check"></i> VALID
                                                    </button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body" id="print-preview">

                                <head>
                                    <style type="text/css">
                                        .bodyBody {
                                            margin: 10px;
                                            font-size: 1.50em;
                                        }

                                        .bodyPapper {
                                            margin: 10px;
                                            font-size: 1.50em;
                                            display: none;
                                        }


                                        .divHeader {
                                            text-align: center;
                                            border: 1px solid;
                                        }

                                        .divJudulSurat {
                                            text-align: center;
                                            float: center;
                                            color: #808080;
                                        }

                                        .divSubject {
                                            clear: both;
                                            font-weight: bold;
                                            padding-top: 80px;
                                            text-align: center
                                        }

                                        .divAdios {
                                            float: right;
                                            padding-top: 50px;
                                            font-size: 17px;
                                            color: #808080;
                                        }

                                        .img {
                                            align-content: center;
                                            display: block;
                                            margin-left: 100px;
                                            margin-right: auto;
                                            width: 100%;
                                        }

                                        .imgPapper {
                                            align-content: center;
                                            display: block;
                                            margin-left: auto;
                                            margin-right: auto;
                                            width: 100%;
                                        }

                                        .center {
                                            margin-left: auto;
                                            margin-right: auto;
                                            font-size: 17px;
                                            color: #808080;
                                        }
                                    </style>
                                </head>

                                <body class="bodyBody">
                                    <div class="img">
                                        <img src="{{ asset('assets-dashboard/images/surat.png') }} ">
                                    </div>

                                    <hr color="black">
                                    @if ($permohonan_detail[0])
                                        <div class="divJudulSurat">


                                            <br /><u>{{ $permohonan_detail[0]->nama_pelayanan }} </u>
                                            <br />
                                            {{ $permohonan_detail[0]->no_sp }}<br />
                                            <br />
                                        </div>

                                        <div class="divContents">
                                            <p style="text-indent: 45px;">
                                                Yang bertanda tangan dibawah ini Lurah Telaga Asih Kecamatan Cikarang Barat
                                                Kabupaten Bekasi dengan ini menerangkan bahwa:
                                            </p>
                                            <table class="center">
                                                <tr>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <td>Nama Pemohon </td>
                                                    <td>:</td>
                                                    <td> {{ $permohonan_detail[0]->nama_penduduk }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tempat, Tanggal Lahir</td>
                                                    <td>:</td>
                                                    <td> {{ $permohonan_detail[0]->tempat_lahir }},{{ \Carbon\Carbon::parse($permohonan_detail[0]->tanggal_lahir)->format('d/m/Y') }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Warga Negara / Agama</td>
                                                    <td>:</td>
                                                    <td> Indonesia/{{ $permohonan_detail[0]->agama }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pekerjaan</td>
                                                    <td>:</td>
                                                    <td> {{ $permohonan_detail[0]->pekerjaan }}</td>
                                                </tr>
                                                <tr>
                                                    <td>NIK Pemohon</td>
                                                    <td>:</td>
                                                    <td> {{ $permohonan_detail[0]->nik }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>:</td>
                                                    <td> {{ $permohonan_detail[0]->alamat_domisili }}RT/RW{{ $permohonan_detail[0]->rt_domisili }}/{{ $permohonan_detail[0]->rw_domisili }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td> {{ $permohonan_detail[0]->desa_domisili }},{{ $permohonan_detail[0]->kecamatan_domisili }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{ $permohonan_detail[0]->kabupaten_domisili }}</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{ $permohonan_detail[0]->provinsi_domisili }}</td>
                                                </tr>
                                            </table>
                                            <p style="text-indent: 45px;">
                                                Berdasarkan surat pengantar RT/RW setempat bahwa yang bersangkutan saat ini
                                                bertempat tinggal/berdomisili
                                                sebagaimana alamat tersebut diatas
                                            </p>
                                            <p>
                                                Surat keterangan ini berlaku 3 (tiga) Bulan sejak dikeluarkannya surat
                                                keterangan ini,
                                                dan dapat diperpanjang kembali pada kantor Kelurahan setempat.
                                            </p>
                                            <p>
                                                Demikian Surat keterangan domisili penduduk ini kami buat dan agar dapat
                                                dipergunakan
                                                sebagaimana mestinya.
                                            </p>
                                            <div class="divAdios">
                                                Telaga Asih {{ date('Y-m-d') }} <br>
                                                a.n LURAH TELAGA ASIH <br />
                                                <!-- Space for signature. -->
                                                <br />
                                                <br />
                                                <br />
                                                <u></u> <br />
                                                Adi Suryana <br />
                                            </div>

                                </body>

                                <div class="bodyPapper" id="print-view">
                                    <div class="imgPapper">
                                        <img src="{{ asset('assets-dashboard/images/surat.png') }} ">
                                    </div>

                                    <hr color="black">

                                    <div class="divJudulSurat">
                                        <br /><u>{{ $permohonan_detail[0]->nama_pelayanan }} </u>
                                        <br />
                                        {{ $permohonan_detail[0]->no_sp }}<br />
                                        <br />
                                    </div>

                                    <div class="divContents">
                                        <p style="text-indent: 45px;">
                                            Yang bertanda tangan dibawah ini Lurah Telaga Asih Kecamatan Cikarang Barat
                                            Kabupaten Bekasi dengan ini menerangkan bahwa:
                                        </p>
                                        <table class="center">
                                            <tr>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            <tr>
                                                <td>Nama Pemohon </td>
                                                <td>:</td>
                                                <td> {{ $permohonan_detail[0]->nama_penduduk }}</td>
                                            </tr>
                                            <tr>
                                                <td>Tempat, Tanggal Lahir</td>
                                                <td>:</td>
                                                <td> {{ $permohonan_detail[0]->tempat_lahir }},{{ \Carbon\Carbon::parse($permohonan_detail[0]->tanggal_lahir)->format('d/m/Y') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Warga Negara / Agama</td>
                                                <td>:</td>
                                                <td> Indonesia/{{ $permohonan_detail[0]->agama }}</td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan</td>
                                                <td>:</td>
                                                <td> {{ $permohonan_detail[0]->pekerjaan }}</td>
                                            </tr>
                                            <tr>
                                                <td>NIK Pemohon</td>
                                                <td>:</td>
                                                <td> {{ $permohonan_detail[0]->nik }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td> {{ $permohonan_detail[0]->alamat_domisili }}RT/RW{{ $permohonan_detail[0]->rt_domisili }}/{{ $permohonan_detail[0]->rw_domisili }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td> {{ $permohonan_detail[0]->desa_domisili }},{{ $permohonan_detail[0]->kecamatan_domisili }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>{{ $permohonan_detail[0]->kabupaten_domisili }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>{{ $permohonan_detail[0]->provinsi_domisili }}</td>
                                            </tr>
                                        </table>
                                        <p style="text-indent: 45px;">
                                            Berdasarkan surat pengantar RT/RW setempat bahwa yang bersangkutan saat ini
                                            bertempat tinggal/berdomisili
                                            sebagaimana alamat tersebut diatas
                                        </p>
                                        <p>
                                            Surat keterangan ini berlaku 3 (tiga) Bulan sejak dikeluarkannya surat
                                            keterangan ini,
                                            dan dapat diperpanjang kembali pada kantor Kelurahan setempat.
                                        </p>
                                        <p>
                                            Demikian Surat keterangan domisili penduduk ini kami buat dan agar dapat
                                            dipergunakan
                                            sebagaimana mestinya.
                                        </p>
                                        <div class="divAdios">
                                            Telaga Asih {{ date('Y-m-d') }} <br>
                                            a.n LURAH TELAGA ASIH <br />
                                            <!-- Space for signature. -->
                                            <br />
                                            <br />
                                            <br />
                                            <u></u> <br />
                                            Adi Suryana <br />
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div><!-- .animated -->
                </div><!-- .content -->


                <div class="clearfix"></div>

                @include('footer')
                <script>
                    function printDiv() {

                        var divToPrint = document.getElementById('print-view');
                        var newWin = window.open();
                        // newWin.document.open();
                        newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
                        newWin.document.close();
                        // setTimeout(function() {
                        //     newWin.close();
                        // }, 10);

                    }
                </script>

            </div>
            <!-- /#right-panel -->
        @stop
