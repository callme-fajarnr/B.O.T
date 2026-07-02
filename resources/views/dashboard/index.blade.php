@extends('dashboard.layout.main')

@section('container')
    {{-- HEADER --}}
    <div class="dashboard-header mb-4">
        <div>
            <h1 class="dashboard-title">
                Welcome Back,
                <span>{{ auth()->user()->name }}</span>
            </h1>

            <p class="dashboard-subtitle">
                Monitor your posts, categories, and publishing activity.
            </p>
        </div>
    </div>

    {{-- STATISTICS --}}
    <div class="row g-4">

        <div class="col-md-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body">

                    <div class="stat-top">
                        <span class="stat-label">
                            Total Posts
                        </span>

                        <i class="bi bi-file-earmark-text"></i>
                    </div>

                    <h2 class="stat-number">
                        {{ number_format($posts) }}
                    </h2>

                    <small class="stat-desc">
                        Published Articles
                    </small>

                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body">

                    <div class="stat-top">
                        <span class="stat-label">
                            Categories
                        </span>

                        <i class="bi bi-grid"></i>
                    </div>

                    <h2 class="stat-number">
                        {{ number_format($categories) }}
                    </h2>

                    <small class="stat-desc">
                        Active Categories
                    </small>

                </div>
            </div>
        </div>

    </div>

    {{-- CHART --}}
    <div class="card border-0 shadow-sm mt-4">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h4 class="mb-1 fw-bold">
                        Content Analytics
                    </h4>

                    <small class="text-muted">
                        Monthly publishing performance
                    </small>
                </div>

                <span class="badge rounded-pill bg-primary px-3 py-2">
                    {{ date('Y') }}
                </span>

            </div>

            <div class="chart-wrapper">
                <canvas id="myChart"></canvas>
            </div>

        </div>
    </div>

    {{-- CHART JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const chartData = @json($chart);

        new Chart(document.getElementById('myChart'), {
            type: 'line',

            data: {
                labels: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'Mei',
                    'Jun',
                    'Jul',
                    'Agu',
                    'Sep',
                    'Okt',
                    'Nov',
                    'Des'
                ],

                datasets: [{
                    label: 'Posts',

                    data: Object.values(chartData),

                    borderWidth: 3,
                    tension: .4,

                    fill: true,

                    borderColor: '#6366f1',

                    backgroundColor: (context) => {

                        const chart = context.chart;
                        const {
                            ctx,
                            chartArea
                        } = chart;

                        if (!chartArea) {
                            return null;
                        }

                        const gradient = ctx.createLinearGradient(
                            0,
                            chartArea.top,
                            0,
                            chartArea.bottom
                        );

                        gradient.addColorStop(
                            0,
                            'rgba(99,102,241,.30)'
                        );

                        gradient.addColorStop(
                            1,
                            'rgba(99,102,241,0)'
                        );

                        return gradient;
                    },

                    pointRadius: 5,
                    pointHoverRadius: 8,

                    pointBackgroundColor: '#818cf8',

                    pointBorderWidth: 0
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {

                    x: {
                        grid: {
                            color: 'rgba(148,163,184,.15)'
                        },

                        ticks: {
                            color: '#64748b'
                        }
                    },

                    y: {
                        beginAtZero: true,

                        grid: {
                            color: 'rgba(148,163,184,.15)'
                        },

                        ticks: {
                            color: '#64748b'
                        }
                    }

                }
            }

        });
    </script>
@endsection
