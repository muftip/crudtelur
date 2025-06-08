<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Produksi Telur</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function hitung() {
            let beratTelur = parseFloat(document.getElementById('berat_telur').value) || 0;
            let hargaTelur = parseFloat(document.getElementById('harga_telur').value) || 0;
            let beratPakan = parseFloat(document.getElementById('berat_pakan').value) || 0;
            let hargaPakan = parseFloat(document.getElementById('harga_pakan').value) || 0;

            let jumlahTelur = beratTelur * hargaTelur;
            let biayaPakan = beratPakan * hargaPakan;
            let laba = jumlahTelur - biayaPakan;

            document.getElementById('jumlah_telur_preview').innerText = jumlahTelur.toFixed(2);
            document.getElementById('laba_preview').innerText = laba.toFixed(2);
        }
    </script>
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="max-w-xl mx-auto p-6 mt-10 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-6">Tambah Data Produksi Telur</h1>

        <form method="POST" action="{{ route('produksi.store') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium mb-1">Tanggal:</label>
                <input type="date" name="tanggal" required class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-medium mb-1">Berat Telur (kg):</label>
                <input type="number" id="berat_telur" step="0.01" name="berat_telur" required oninput="hitung()"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-medium mb-1">Harga Telur (/kg):</label>
                <input type="number" id="harga_telur" step="0.01" name="harga_telur" required oninput="hitung()"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-medium mb-1">Berat Pakan (kg):</label>
                <input type="number" id="berat_pakan" step="0.01" name="berat_pakan" required oninput="hitung()"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-medium mb-1">Harga Pakan (/kg):</label>
                <input type="number" id="harga_pakan" step="0.01" name="harga_pakan" required oninput="hitung()"
                    class="w-full border rounded px-3 py-2">
            </div>

            <div class="bg-gray-100 rounded p-4">
                <p><strong>Jumlah Telur:</strong> <span id="jumlah_telur_preview">0.00</span></p>
                <p><strong>Laba / Rugi:</strong> <span id="laba_preview">0.00</span></p>
            </div>

            <div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
