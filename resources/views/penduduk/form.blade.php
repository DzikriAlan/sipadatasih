{{ csrf_field() }}
@if (isset($penduduk))
    {!! Form::hidden('id', $penduduk->id) !!}
@endif

<div class="form-group has-success">
    <label class="control-label mb-1">ID Pengguna</label>
    {!! Form::select('id_pengguna', $pengguna, '', [
        'placeholder' => '-- ID Pengguna --',
        'class' => 'form-control',
    ]) !!}
    <span>Silahkan pilih id pengguna, jika tidak dipilih maka akan dibuatkan pengguna baru</span>
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Status Penduduk</label>
    {!! Form::select('is_pendatang', ['0' => 'Penduduk', '1' => 'Pendatang'], null, [
        'placeholder' => '-- Status Penduduk --',
        'class' => 'form-control',
    ]) !!}
</div>

<div class="form-group">
    <label class="control-label">NIK</label>
    {!! Form::text('nik', null, [
        'class' => 'form-control',
        'placeholder' => 'Contoh: 123456789098765',
    ]) !!}
</div>

<div class="form-group">
    <label class="control-label">NO Kartu Keluarga</label>
    {!! Form::number('no_kk', null, [
        'class' => 'form-control',
        'placeholder' => 'Contoh: 123456789098765',
    ]) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Nama</label>
    {!! Form::text('nama_penduduk', null, [
        'class' => 'form-control',
        'placeholder' => 'Contoh: Alif Perdana Sugeha',
    ]) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Alamat</label>
    {!! Form::textarea('alamat_penduduk', null, [
        'class' => 'form-control',
        'rows' => '3',
    ]) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Status Menikah</label>
    {!! Form::select(
        'status_menikah',
        [
            'sudah' => 'Sudah',
            'belum' => 'Belum',
        ],
        null,
        [
            'placeholder' => '-- Status Menikah --',
            'class' => 'form-control',
        ],
    ) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Tempat Lahir</label>
    {!! Form::text('tempat_lahir', null, [
        'class' => 'form-control',
        'placeholder' => 'Contoh: Kaliyoso',
    ]) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Tanggal Lahir</label>
    {!! Form::date('tanggal_lahir', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Pekerjaan</label>
    {!! Form::text('pekerjaan', null, ['class' => 'form-control', 'placeholder' => 'Contoh: Tukang Kayu']) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Agama</label>
    {!! Form::text('agama', null, ['class' => 'form-control', 'placeholder' => 'Contoh: Islam']) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Pendidikan Terakhir</label>
    {!! Form::text('pendidikan_terakhir', null, ['class' => 'form-control', 'placeholder' => 'Contoh: S3']) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Golongan Darah</label>
    {!! Form::select('golongan_darah', ['a' => 'A', 'b' => 'B', 'ab' => 'AB', 'o' => 'O'], null, [
        'placeholder' => 'TIDAK DIKETAHUI',
        'class' => 'form-control',
    ]) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Jenis Kelamin</label>
    {!! Form::select('jenis_kelamin', ['perempuan' => 'Perempuan', 'laki-laki' => 'Laki-Laki'], null, [
        'placeholder' => '-- Jenis Kelamin --',
        'class' => 'form-control',
    ]) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Lingkungan</label>
    {!! Form::text('lingkungan', null, ['class' => 'form-control', 'placeholder' => 'Contoh: 3']) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Rukun Tetangga</label>
    {!! Form::text('rt', null, ['class' => 'form-control', 'placeholder' => 'Contoh: 1']) !!}
</div>
<div class="form-group has-success">
    <label class="control-label mb-1">Rukun Warga</label>
    {!! Form::text('rw', null, ['class' => 'form-control', 'placeholder' => 'Contoh: 2']) !!}
</div>
<div class="form-group has-success">
    <label>Foto</label>
    <div class="input-group mb-3">
        <div class="custom-file">
            {!! Form::file('foto_penduduk', ['class' => 'custom-file-input', 'id' => 'foto_penduduk']) !!}
            <label class="custom-file-label">Cari Foto</label>
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
    var file = document.getElementById("foto_penduduk");
    file.addEventListener('change', function() {
        document.getElementById("target").innerHTML = "Nama Foto : " + file.files[0].name;
    })
</script>
