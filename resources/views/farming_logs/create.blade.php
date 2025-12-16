<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catat Kegiatan - Smart Tani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans">

    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">

        <div class="flex items-center mb-6">
            <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-green-600 mr-4">
                <i class="fa-solid fa-arrow-left text-xl"></i>
            </a>
            <h2 class="text-2xl font-bold text-green-700">Catat Kegiatan Baru</h2>
        </div>

        <form action="{{ route('logs.store') }}" method="POST">
            @csrf <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Tanggal Kegiatan</label>
                    <input type="date" name="activity_date" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2">Nama Petugas</label>
                    <input type="text" name="officer_name" placeholder="Contoh: Pak Budi" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Aktivitas</label>
                <select name="activity_type" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="Penyiraman">Penyiraman</option>
                    <option value="Pemupukan">Pemupukan (Nutrisi)</option>
                    <option value="Pencegahan Hama">Pencegahan Hama</option>
                    <option value="Perawatan Rutin">Perawatan Rutin</option>
                    <option value="Panen">Panen</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Fase Pertumbuhan Tanaman</label>
                <div class="flex space-x-4">
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="growth_phase" value="Vegetatif" checked class="text-green-600 focus:ring-green-500">
                        <span>Vegetatif (Daun/Batang)</span>
                    </label>
                    <label class="flex items-center space-x-2 cursor-pointer">
                        <input type="radio" name="growth_phase" value="Generatif" class="text-green-600 focus:ring-green-500">
                        <span>Generatif (Bunga/Buah)</span>
                    </label>
                </div>
                <p class="text-xs text-gray-500 mt-1">*Nutrisi akan disesuaikan dengan fase ini.</p>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Catatan Tambahan</label>
                <textarea name="description" rows="3" placeholder="Detail kegiatan..." class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
            </div>

            <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 rounded-lg hover:bg-green-700 transition duration-300">
                <i class="fa-solid fa-save mr-2"></i> Simpan Kegiatan
            </button>
        </form>
    </div>

</body>
</html>
