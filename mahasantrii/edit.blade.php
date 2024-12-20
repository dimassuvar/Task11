@extends('adminlte::page')
@section('title','Edit Mahasantri')
@section('content_header')
    <h1>Edit Mahasantri</h1>
    <br>
    <a class="btn btn-outline-primary btn-md" href="{{ route('mahasantrii.index') }}" role="button"><i class="fa fa-arrow-left"></i>Back</a>
@stop 
@section('content')

    @php
        $rs1 = App\Models\Dosen::all();
        $rs2 = App\Models\Jurusan::all();
        $rs3 = App\Models\Matakuliah::all();
    @endphp

@foreach($data as $d)    
<form action="{{ route('mahasantrii.update', $d->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="form-group"> 
        <label>Nama</label>
        <input type="text" name="nama" value="{{ $d->nama }}" class="form-control" required/> 
    </div> 
    <div class="form-group"> 
        <label>NIM</label>
        <input type="text" name="nim" value="{{ $d->nim }}" class="form-control" required/> 
    </div>
    <div class="form-group">
        <label>Dosen</label>
        <select class="form-control" name="dosen_id" required>
            <option value="">-- Pilih Dosen --</option>
            @foreach($rs1 as $dos)
                @php
                    $sel1 = ($dos->id == $d->dosen_id) ? 'selected' : ''; 
                @endphp
                <option value="{{ $dos->id }}" {{ $sel1 }}>{{ $dos->nama }}</option>
            @endforeach
        </select>
    </div> 
    <div class="form-group">
        <label>Jurusan</label>
        <select class="form-control" name="jurusan_id" required>
            <option value="">-- Pilih Jurusan --</option>
            @foreach($rs2 as $jur)
                @php
                    $sel2 = ($jur->id == $d->jurusan_id) ? 'selected' : '';
                @endphp
                <option value="{{ $jur->id }}" {{ $sel2 }}>{{ $jur->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Matakuliah</label>
        <select class="form-control" name="matakuliah_id" required>
            <option value="">-- Pilih Matakuliah --</option>
            @foreach($rs3 as $mat)
                @php
                    $sel3 = ($mat->id == $d->matakuliah_id) ? 'selected' : '';
                @endphp
                <option value="{{ $mat->id }}" {{ $sel3 }}>{{ $mat->nama }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endforeach
@stop 
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop 
@section('js')
    <script> console.log('HI!')</script>
@stop