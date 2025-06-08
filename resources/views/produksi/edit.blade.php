<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Produksi Telur</title>
</head>
<body>
    <h1>Edit Data Produksi Telur</h1>

    <form method="POST" action="{{ route('produksi.update', $produksi->id) }}">
        @csrf
        @method('PUT')

        <label>Tanggal:</label>
        <input type="date" name="tanggal" value="{{ $produksi->tanggal }}" required><br>

        <label>Berat Telur (kg):</label>
        <input type="number" step="0.01" name="berat_telur" value="{{ $produksi->berat_telur }}" required><br>

        <label>Harga Telur (/kg):</label>
        <input type="number" step="0.01" name="harga_telur" value="{{ $produksi->harga_telur }}" required><br>

        <label>Berat Pakan (kg):</label>
        <input type="number" step="0.01" name="berat_pakan" value="{{ $produksi->berat_pakan }}" required><br>

        <label>Harga Pakan (/kg):</label>
        <input type="number" step="0.01" name="harga_pakan" value="{{ $produksi->harga_pakan }}" required><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
