@extends('template')
@section('main-dashboard')
<!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    @include('pesan.pesan_info')

                    @include('kegiatan.cari')

@if(Request::get('nama_kegiatan'))
<div class="col-md-12 mb-3 mt-1">
    <h5>NAMA KEGIATAN : <strong>{{ Request::get('nama_kegiatan') }}</strong> &nbsp; 
    </h5>
</div>
@endif

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><i class="fa fa-feed"></i>&nbsp; KEGIATAN</strong>
                                <a href="{{ url('kegiatan/create') }}" class="btn btn-primary btn-sm float-right"> <i class="fa fa-plus fa-lg"></i> </a>
                            </div>
                            <div class="card-body">
                                <span class="float-left"> Total Data :
                                    <strong class="font-weight-bold d-inline-block mb-1"> {{ $daftar_kegiatan->total() }}  </strong>
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
                                        <th>NAMA</th>
                                        <th>WAKTU POSTING</th>
                                        <th>UPDATE TERAKHIR</th>
                                        <th>AKSI</th>
                                    </tr>
                                    <?php $i=1 ?>
                                    @foreach($daftar_kegiatan as $kegiatan)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $kegiatan->nama_kegiatan }}</td>
                                        <td>{{ $kegiatan->created_at->diffForHumans() }}</td>
                                        <td>{{ $kegiatan->updated_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ url('kegiatan/'. $kegiatan->id) }}" class="btn btn-info btn-sm d-block my-1"> <i class="fa fa-eye fa-lg"></i> </a>                           
                                            <a href="{{ url('kegiatan/'. $kegiatan->id .'/edit') }}" class="btn btn-success btn-sm d-block my-1"> <i class="fa fa-edit fa-lg"></i> </a>
                                            <a href="#" class="btn btn-danger btn-sm d-block my-1" data-toggle="modal" data-target="#confirm-delete-{{ $i }}"> <i class="fa fa-trash fa-lg"></i> </a>

<div class="modal fade text-danger" id="confirm-delete-{{ $i++ }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <i class="fa fa-exclamation-circle fa-lg"></i> PERINGATAN!
            </div>
            <div class="modal-body">
                APAKAH YAKIN AKAN MENGHAPUS DATA INI ? 
                <br><br><br>
                *) Data yang sudah dihapus tidak bisa dikembalikan lagi
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info btn-sm" data-dismiss="modal"><i class="fa fa-times-circle fa-lg"></i> </button>
                {!! Form::open(['url' => 'kegiatan/'.$kegiatan->id, 'method' => 'delete', 'class' => 'd-inline']) !!}
                    <button type="submit" class="btn btn-danger btn-sm">
                         <i class="fa fa-trash fa-lg"></i> 
                    </button>
                {!! Form::close() !!}
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

                    <div class="col-md-12">
                        <nav aria-label="Page navigation example">
                            {{ $daftar_kegiatan->links() }}
                        </nav>
                    </div>

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


        <div class="clearfix"></div>
        
        @include('footer')
        
    </div>
    <!-- /#right-panel -->
@stop