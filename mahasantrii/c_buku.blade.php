@extends('adminlte::page')
@section('title','Form Mahasantri')
@section('content_header')
    <h1>Form Mahasantri</h1>
    <br>
    <a class="btn btn-outline-primary btn-md"href="{{ route('mahasantrii.index') }}" role="button"><i class="fa fa-arrow-left"></i>Back</a>
@stop 
@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        $rs1 = App\Models\Dosen::all();
        $rs2 = App\Models\Jurusan::all();
        $rs3 = App\Models\Matakuliah::all();
    @endphp

<form action="{{ route('mahasantrii.store') }}" method="POST">
    @csrf
    <div class="form-group"> 
        <label>Nama</label><input type="text" name="nama" class="form-control"/> 
    </div> 
    <div class="form-group"> 
        <label>NIM</label><input type="text" name="nim" class="form-control"/> 
    </div>
    <div class="form-group">
        <label>Dosen</label>
        <select class="form-control" name="dosen_id">
            <option value="">-- Pilih Dosen --</option>
            @foreach($rs1 as $dos)
            <option value="{{ $dos->id }}">{{ $dos->nama }}</option>
            @endforeach
        </select>
    </div> 
    <div class="form-group">
        <label>Jurusan</label>
        <select class="form-control" name="jurusan_id">
            <option value="">-- Pilih Jurusan --</option>
            @foreach($rs2 as $jur)
            <option value="{{ $jur->id }}">{{ $jur->nama }}</option>
            @endforeach
        </select>
    </div> 
    <div class="form-group">
        <label>Matakuliah</label>
        <select class="form-control" name="matakuliah_id">
            <option value="">-- Pilih Matakuliah --</option>
            @foreach($rs3 as $mat)
            <option value="{{ $mat->id }}">{{ $mat->nama }}</option>
            @endforeach
        </select>
    </div>     
     <button  type="submit" class="btn btn-outline-primary">Simpan</button> 
    </form>
@stop 
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop 
@section('js')
    <script> console.log('HI!')</script>
@stop
