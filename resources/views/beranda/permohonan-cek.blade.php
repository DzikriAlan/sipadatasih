@extends('beranda/template')
@section('main-beranda')
    <div data-aos="flip-right" class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12">
                  <div class="non-home p-5 bg-white">
                    <h2 class="site-heading text-center text-black mb-2 mt-5 mt-md-2 mt-xl-0"><strong>CEK PERMOHONAN</strong></h2>
                    <div class="non-home">
                        @include('pesan.pesan_info')
                    </div>  
                    {!! Form::open(['url' => 'pelayanan/cek/permohonan', 'files' => true, 'style' => 'box-shadow:none']) !!}
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
