@extends('layouts.backend');
@section('content')
<div class="card card-danger">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr>
        <th>ID</th>
        <th>Fakultas</th>
        <th>Jumlah</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($mahasiswa as $data)
        <tr>
        <td>{{$data->id_mahasiswa}}</td>
        <td>{{$data->fakultas}}</td>
        <td>{{$data->jumlah}}</td>
        </tr>
        @endforeach
      </tbody>
      </table>  
    </div>
  </div>
    <div class="card-header">
      <h3 class="card-title">Donut Chart</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
    <script>
        //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          @foreach($mahasiswa as $data)
            '{{$data->fakultas}}',
          @endforeach
      ],
      datasets: [
        {
          data: [
              //lupa tidak pake koma
              @foreach($mahasiswa as $data)
              {{$data->jumlah}},
              @endforeach
          ],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    </script>
@endsection

