{{ csrf_field() }}
@if(isset($kegiatan))
    {!! Form::hidden('id', $kegiatan->id) !!}
@endif
<div class="form-group">
    <label class="control-label">Nama</label>
        {!! Form::text('nama_kegiatan', null, ['class' => 'form-control', 'placeholder' => 'Contoh: Lorem Ipsum Dolor Sit Amet']) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Deskripsi</label>
        {!! Form::textarea('deskripsi_kegiatan', null, ['class' => 'form-control editor', 'rows' => '8']) !!}
</div>
<div class="form-group has-success">
    <label>Poster</label>
    <div class="input-group mb-3">
        <div class="custom-file">
            {!! Form::file('poster_kegiatan', ['class' => 'custom-file-input', 'id' => 'poster_kegiatan']) !!}
            <label class="custom-file-label">Cari Poster</label>
        </div>
    </div>
    <p id="target"></p>
</div>
<div>
    <button type="submit" class="btn btn-primary btn-sm">
      <i class="fa fa-paper-plane fa-lg"></i> 
    </button>
</div>

<script>
    var file = document.getElementById("poster_kegiatan");
    file.addEventListener('change', function(){
        document.getElementById("target").innerHTML = "Nama Poster : "+file.files[0].name;
    })
</script>