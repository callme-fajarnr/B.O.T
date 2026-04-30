@extends('dashboard.layout.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <h1 class="h2">Welcome back, {{ auth()->user()->name }}</h1>
</div>

<div class="row g-4">

    <!-- CARD POSTS -->
    <div class="col-md-6 col-lg-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Total Posts</h6>
                <h2>{{ $posts }}</h2>
            </div>
        </div>
    </div>

    <!-- CARD CATEGORY -->
    <div class="col-md-6 col-lg-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6>Total Categories</h6>
                <h2>{{ $categories }}</h2>
            </div>
        </div>
    </div>

</div>

<!-- CHART -->
<div class="card mt-5 shadow-sm border-0">
    <div class="card-body">
        <h5 class="mb-4">Post per Month</h5>
        <canvas id="myChart"></canvas>
    </div>
</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('myChart');

const chartData = @json($chart);

const labels = ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Agu','Sep','Okt','Nov','Des'];

new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Posts',
            data: Object.values(chartData),
            fill: true,
            tension: 0.4
        }]
    }
});
</script>

@endsection