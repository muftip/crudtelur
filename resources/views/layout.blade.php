<!DOCTYPE html>
<html>
<head>
    <title>ERP Telur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h1 class="mb-4">ERP Telur</h1>
        @yield('content')
    </div>
</body>
</html>

// resources/views/produksi/index.blade.php

@extends('layout')

@section('content')
<a href="{{ route('produksi.create') }}" class="btn btn-primary mb-3">+ Tambah Produksi</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Tanggal</th><th>Berat Telur</th><th>Harga Telur</th><th>Berat Pakan</th><th>Harga Pakan</th><th>Laba/Rugi</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->berat_telur }}</td>
            <td>{{ $item->harga_telur }}</td>
            <td>{{ $item->berat_pakan }}</td>
            <td>{{ $item->harga_pakan }}</td>
            <td>{{ number_format($item->laba_rugi, 0) }}</td>
            <td>
                <a href="{{ route('produksi.edit', $item) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('produksi.destroy', $item) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Rekap Bulanan</h3>
<ul>
    @foreach($rekap as $r)
        <li>{{ $r->bulan }} - Rp {{ number_format($r->total_laba, 0) }}</li>
    @endforeach
</ul>
@endsection