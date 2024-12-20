@extends('adminlte::page')
@section('title','Data Mahasantri')
@section('content_header')
    <h1><i class="fa fa-graduation-cap" aria-hidden="true"></i>Data Mahasantri</h1>
@stop 
@section('content')
    @if(session('success'))
        <div class="alert alert-info">
            {{ session('success')}}
        </div>
    @endif

    @php
        $ar_judul = ['No','Nama','NIM','Jurusan','Mata Kuliah','Dosen Pengajar','Action'];
        $no = 1;
    @endphp
<a class="btn btn-outline-primary" href="{{ route('mahasantrii.create') }}"role="button"><i class="fa fa-plus"></i>Tambah Mahasantri</a><br/><br/>
<table class="table table-striped">
    <thead>
        <tr>
            @foreach($ar_judul as $jdl)
                <th>{{ $jdl }}</th>
            @endforeach
        </tr>
    </thead> 
    <tbody>
        @foreach($ar_mahasantrii as $mhs)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $mhs->nama }}</td>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->jur }}</td>
            <td>{{ $mhs->mat }}</td>
            <td>{{ $mhs->dos }}</td>
            <td>
                <form action="{{ route('mahasantrii.destroy', $mhs->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="{{ route('mahasantrii.show', $mhs->id) }}" class="btn btn-outline-info"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('mahasantrii.edit', $mhs->id) }}" class="btn btn-outline-primary"><i class="fa fa-edit"></i></a>
                    <button class="btn btn-outline-danger" onclick="return confirm('Anda Yakin Data Dihapus?')"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop 
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop 
@section('js')
    <script> console.log('HI!')</script>
@stop
