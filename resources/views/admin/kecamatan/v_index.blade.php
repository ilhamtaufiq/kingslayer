@extends('layouts.backend')
@section('content')
<div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Data Kecamatan</h3>

        <div class="card-tools">
          <a href="/kecamatan/add" type="button" class="btn btn-sm btn-primary btn-flat">
            <i class="fas fa-plus"></i>
            Tambah
          </a>
        </div>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
          @if (session('pesan'))
          <div class="alert alert-success alert-dimissable ">
              <button type="button" class="close" data-dimiss="alert" aria-hidden="true">&times;</button>
              <h5><i class="icon fas fa-check"></i>{{ session('pesan') }}</h5>
          </div>
              
          @endif
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th width=60px>No</th>
                    <th>Kecamatan</th>
                    <th width=50px>Warna</th>
                    <th width=100px class="text-center">Opsi</th>
                </tr>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($kecamatan as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->kecamatan }}</td>
                        <td style="background-color: {{ $data->warna }}"></td>
                        <td class="text-center">
                            <a href="/kecamatan/edit/{{$data->id_kecamatan}}"><i class="fa fa-edit"></i></a>
                            <butto class="btn btn-sm btn-primary" href="/kecamatan/delete/{{$data->id_kecamatan}}" data-toggle="modal" data-target="#delete{{$data->id_kecamatan}}"><i class="fa fa-trash "></i></button>
                        </td>
                    </tr>    
                    @endforeach
                </tbody>
            </thead>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="card card-danger">
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

</div>
@foreach ($kecamatan as $data)
<div class="modal fade" id="delete{{$data->id_kecamatan}}">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">{{$data->kecamatan}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
        <a href="/kecamatan/delete/{{$data->id_kecamatan}}" type="button" class="btn btn-outline-light">Ya</a>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@endforeach
<!-- Page specific script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

        //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
        @foreach($kecamatan as $data)
        '{{$data->kecamatan}}',
        @endforeach
      ],
      datasets: [
        {
          data: [700,500,400],
          backgroundColor : [        
        @foreach($kecamatan as $data)
          '{{$data->warna}}',
        @endforeach],
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