<div class="col-md-12">
    {!! Form::open(['url' => 'permohonan/cari', 'method' => 'get']) !!}
        <div class="input-group mb-3">
            {!! Form::text('nik', (!empty($nik) ? $nik : null), ['class' => 'form-control', 'placeholder' => 'Cari Judul Dengan NIK']) !!}
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit"> <i class="fa fa-search fa-lg"></i> </button>
            </div>
        </div>
    {!! Form::close() !!}
</div>