<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Smart Tani</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head>

<body class="bg-gray-100">

    <nav class="bg-green-700 text-white shadow-lg">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">

            <div class="flex items-center space-x-3">
                <i class="fa-solid fa-leaf text-2xl"></i>
                <div>
                    <h1 class="text-xl font-bold">Smart Tani Admin</h1>
                    <p class="text-xs text-green-200">
                        Halo, {{ Auth::user()->name }} ({{ ucfirst(Auth::user()->role) }})
                    </p>
                </div>
            </div>

            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('dashboard') }}" class="hover:text-green-200 font-semibold">Dashboard</a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white text-xs px-3 py-2 rounded transition shadow">
                        <i class="fa-solid fa-sign-out-alt mr-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-8">

        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm" role="alert">
            <p class="font-bold">Berhasil</p>
            <p>{{ session('success') }}</p>
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm" role="alert">
            <p class="font-bold">Gagal</p>
            <p>{{ session('error') }}</p>
        </div>
        @endif

        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-700 mb-4 border-l-4 border-green-600 pl-3">
                Monitoring Lingkungan
            </h2>

            @if($sensor)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-white rounded-xl shadow-md p-6 border-b-4 border-red-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Suhu Udara</p>
                            <h3 class="text-3xl font-bold text-gray-800">{{ $sensor->air_temperature }}°C</h3>
                        </div>
                        <div class="p-3 bg-red-100 rounded-full text-red-600">
                            <i class="fa-solid fa-temperature-high text-xl"></i>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Target Ideal: 24-29°C</p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-b-4 border-blue-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Kelembaban Udara</p>
                            <h3 class="text-3xl font-bold text-gray-800">{{ $sensor->air_humidity }}%</h3>
                        </div>
                        <div class="p-3 bg-blue-100 rounded-full text-blue-600">
                            <i class="fa-solid fa-droplet text-xl"></i>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Target Ideal: 60-80%</p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-b-4 border-amber-600">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">Kelembaban Tanah</p>
                            <h3 class="text-3xl font-bold text-gray-800">{{ $sensor->soil_moisture }}%</h3>
                        </div>
                        <div class="p-3 bg-amber-100 rounded-full text-amber-600">
                            <i class="fa-solid fa-water text-xl"></i>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Status: <span class="text-green-600 font-bold">Cukup
                            Air</span></p>
                </div>

                <div class="bg-white rounded-xl shadow-md p-6 border-b-4 border-green-500">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-gray-500 text-sm">pH Tanah</p>
                            <h3 class="text-3xl font-bold text-gray-800">{{ $sensor->soil_ph }}</h3>
                        </div>
                        <div class="p-3 bg-green-100 rounded-full text-green-600">
                            <i class="fa-solid fa-flask text-xl"></i>
                        </div>
                    </div>
                    <p class="text-xs text-gray-400 mt-2">Kondisi: Netral</p>
                </div>

            </div>
            <div class="mt-2 text-right text-xs text-gray-500">
                Update Terakhir: {{ $sensor->created_at->format('d M Y, H:i') }}
            </div>
            @else
            <div class="bg-red-100 text-red-700 p-4 rounded text-center">
                <i class="fa-solid fa-circle-exclamation mr-2"></i> Belum ada data sensor yang masuk.
            </div>
            @endif
        </div>

        <div class="bg-white rounded-xl shadow-lg overflow-hidden mb-12">
            <div class="bg-gray-50 px-6 py-4 border-b flex justify-between items-center">
                <h3 class="font-bold text-gray-700">
                    <i class="fa-solid fa-clipboard-list mr-2"></i> Jurnal Kegiatan
                </h3>
                <a href="{{ route('logs.create') }}"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 text-sm rounded transition shadow">
                    <i class="fa-solid fa-plus mr-1"></i> Catat Kegiatan
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 text-sm uppercase">
                            <th class="px-6 py-3">Tanggal</th>
                            <th class="px-6 py-3">Petugas</th>
                            <th class="px-6 py-3">Aktivitas</th>
                            <th class="px-6 py-3">Fase</th>
                            <th class="px-6 py-3">Catatan</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm">
                        @foreach($logs as $log)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-6 py-4">{{ \Carbon\Carbon::parse($log->activity_date)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4 font-semibold">{{ $log->officer_name }}</td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-100 text-blue-800 py-1 px-3 rounded-full text-xs font-semibold">
                                    {{ $log->activity_type }}
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $log->growth_phase }}</td>
                            <td class="px-6 py-4 text-gray-500 italic">{{Str::limit($log->description, 50)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($logs->isEmpty())
            <div class="p-6 text-center text-gray-500 bg-gray-50">Belum ada catatan kegiatan.</div>
            @endif
        </div>

        <div class="mb-12">
            <h3 class="font-bold text-gray-700 mb-4 text-xl border-l-4 border-blue-600 pl-3">
                <i class="fa-solid fa-gamepad mr-2"></i> Kontrol Perangkat IoT
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($actuators as $alat)
                <div
                    class="bg-white p-6 rounded-xl shadow-md flex justify-between items-center border-l-4 {{ $alat->is_active ? 'border-green-500' : 'border-gray-400' }}">
                    <div>
                        <h4 class="font-bold text-lg text-gray-800">{{ $alat->name }}</h4>
                        <p class="text-sm mt-1 {{ $alat->is_active ? 'text-green-600 font-bold' : 'text-gray-400' }}">
                            Status: {{ $alat->is_active ? 'MENYALA (ON)' : 'MATI (OFF)' }}
                        </p>
                    </div>

                    <form action="{{ route('actuator.toggle', $alat->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-14 h-8 rounded-full p-1 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 {{ $alat->is_active ? 'bg-green-500' : 'bg-gray-300' }}">
                            <div
                                class="w-6 h-6 bg-white rounded-full shadow-md transform transition-transform duration-300 {{ $alat->is_active ? 'translate-x-6' : 'translate-x-0' }}">
                            </div>
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>

    </div>

    <footer class="bg-gray-800 text-white text-center py-6">
        <p class="text-sm font-medium">© 2025 Smart Tani Greenhouse Desa Kedung Dalem.</p>
        <p class="text-xs text-gray-500 mt-1">Telkom University Surabaya - Capstone Project</p>
    </footer>

</body>

</html>
