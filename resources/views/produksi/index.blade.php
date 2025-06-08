<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produksi Telur</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Data Produksi Telur</h1>

        <div class="mb-4">
            <a href="{{ route('produksi.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Data
            </a>
        </div>

        <div class="overflow-x-auto mb-10">
            <table class="min-w-full bg-white border border-gray-300 rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b">Tanggal</th>
                        <th class="py-2 px-4 border-b">Berat Telur (kg)</th>
                        <th class="py-2 px-4 border-b">Harga Telur (/kg)</th>
                        <th class="py-2 px-4 border-b">Berat Pakan (kg)</th>
                        <th class="py-2 px-4 border-b">Harga Pakan (/kg)</th>
                        <th class="py-2 px-4 border-b">Laba / Rugi</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $item)
                        <tr class="text-center border-t">
                            <td class="py-2 px-4">{{ $item->tanggal }}</td>
                            <td class="py-2 px-4">{{ $item->berat_telur }}</td>
                            <td class="py-2 px-4">Rp{{ number_format($item->harga_telur, 0, ',', '.') }}</td>
                            <td class="py-2 px-4">{{ $item->berat_pakan }}</td>
                            <td class="py-2 px-4">Rp{{ number_format($item->harga_pakan, 0, ',', '.') }}</td>
                            <td class="py-2 px-4 {{ $item->laba_rugi < 0 ? 'text-red-600' : 'text-green-600' }}">
                                Rp{{ number_format($item->laba_rugi, 0, ',', '.') }}
                            </td>
                            <td class="py-2 px-4">
                                <a href="{{ route('produksi.edit', $item->id) }}"
                                   class="text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('produksi.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Hapus data ini?')"
                                            class="text-red-500 hover:underline ml-2">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-4 text-center text-gray-500">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <h2 class="text-2xl font-semibold mb-4">Rekap Laba Total</h2>
        <div class="overflow-x-auto">
            <table class="min-w-sm bg-white border border-gray-300 rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b">Bulan</th>
                        <th class="py-2 px-4 border-b">Total Laba</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($rekap as $r)
                        <tr class="text-center border-t">
                            <td class="py-2 px-4">{{ $r->bulan }}</td>
                            <td class="py-2 px-4 text-green-600">
                                Rp{{ number_format($r->total_laba, 0, ',', '.') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="py-4 text-center text-gray-500">Tidak ada rekap bulanan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
