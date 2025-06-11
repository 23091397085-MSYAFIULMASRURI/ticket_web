@extends('layouts.admin')

@section('title', 'Laporan Penjualan Tiket')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold text-white text-center">Laporan Penjualan Tiket</h1>
</div>


{{-- Grafik --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8 max-w-7xl mx-auto px-4">
    <!-- Bar Chart -->
    <div class="bg-gray-800 p-4 rounded-lg ">
        <h2 class="text-lg font-semibold text-white mb-4">Grafik Pendapatan Tiket</h2>
        <canvas id="barChart" class="w-full h-64"></canvas>

    </div>

    <!-- Pie Chart -->
    <div class="bg-gray-800 p-4 rounded-lg">
        <h2 class="text-lg font-semibold text-white mb-4">Distribusi Penjualan Tiket</h2>
        <canvas id="pieChart" class="w-full h-64"></canvas>

    </div>
</div>

{{-- Tabel --}}
<div class="overflow-x-auto bg-gray-800 text-white rounded-lg shadow ">
    <table class="min-w-full table-auto">
        <thead class="bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold">Nama Event</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Tipe Tiket</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Harga</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Jumlah Terjual</th>
                <th class="px-6 py-3 text-left text-sm font-semibold">Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reports as $report)
                <tr class="border-b border-gray-600 hover:bg-gray-700">
                    <td class="px-6 py-4">{{ $report->event_title }}</td>
                    <td class="px-6 py-4">{{ $report->type }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($report->price, 0, ',', '.') }}</td>
                    <td class="px-6 py-4">{{ $report->sold_quantity }}</td>
                    <td class="px-6 py-4">Rp {{ number_format($report->total_revenue, 0, ',', '.') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center px-6 py-4">Tidak ada data laporan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = @json($reports->pluck('event_title'));
    const ticketTypes = @json($reports->pluck('type'));
    const salesData = @json($reports->pluck('sold_quantity'));
    const revenueData = @json($reports->pluck('total_revenue'));

    // Bar Chart: Total Pendapatan per Event
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Pendapatan (Rp)',
                data: revenueData,
                backgroundColor: 'rgba(59, 130, 246, 0.7)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: value => 'Rp ' + value.toLocaleString('id-ID')
                    }
                }
            }
        }
    });

    // Pie Chart: Jumlah Tiket Terjual per Event
    new Chart(document.getElementById('pieChart'), {
        type: 'pie',
        data: {
            labels: labels.map((label, i) => label + ' (' + ticketTypes[i] + ')'),
            datasets: [{
                data: salesData,
                backgroundColor: [
                    '#60a5fa', '#f87171', '#34d399', '#facc15', '#a78bfa',
                    '#f472b6', '#4ade80', '#fb923c', '#38bdf8', '#e879f9'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
@endsection
