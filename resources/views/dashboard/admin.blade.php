@extends('layouts.admin')
@section('content')
<div class="panel-body">
Selamat datang di Menu Administrasi Larapus. Silahkan pilih menu administrasi yang diinginkan.
<hr>
<h4>Statistik Category</h4>
<canvas id="chartPenulis" width="400" height="150"></canvas>
</div>
@endsection
@section('scripts')
<script src="/js/Chart.min.js"></script>
<script>
var data = {
labels: {!! json_encode($category) !!},
datasets: [{
label: 'Jumlah Product',
data: {!! json_encode($product) !!},
backgroundColor: "rgba(151,187,205,0.5),rgba(151,187,275,0.5)",
borderColor: "rgba(151,187,205,0.8),rgba(151,187,275,0.5)",
}]
};
var options = {
scales: {
yAxes: [{
ticks: {
beginAtZero:true,
stepSize: 1
}
}]
}
};
var ctx = document.getElementById("chartPenulis").getContext("2d");
var authorChart = new Chart(ctx, {
type: 'bar',
data: data,
options: options
});
</script>
@endsection

