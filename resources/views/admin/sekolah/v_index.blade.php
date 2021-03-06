@extends('layouts.backend')
@section('content')
<div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Data Sekolah</h3>

        <div class="card-tools">
          <a href="/sekolah/add" type="button" class="btn btn-sm btn-primary btn-flat">
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
                    <th>Nama Sekolah</th>
                    <th>Jenjang</th>
                    <th width=50px>Status</th>
                    <th>Kecamatan</th>
                    <th width=100px class="text-center">Opsi</th>
                </tr>
                <tbody>
                    <?php $no=1; ?>
                    @foreach ($sekolah as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->nama_sekolah }}</td>
                        <td>{{$data->jenjang}}</td>
                        <td>{{$data->status}}</td>
                        <td>{{$data->kecamatan}}</td>
                        <td class="text-center">
                            <a href="/sekolah/edit/{{$data->id_sekolah}}"><i class="fa fa-edit"></i></a>
                            <butto class="btn btn-sm btn-primary" href="/sekolah/delete/{{$data->id_sekolah}}" data-toggle="modal" data-target="#delete{{$data->id_sekolah}}"><i class="fa fa-trash "></i></button>
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
</div>
@foreach ($sekolah as $data)
<div class="modal fade" id="delete{{$data->id_sekolah}}">
  <div class="modal-dialog">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">{{$data->nama_sekolah}}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin ingin menghapus data ini?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
        <a href="/sekolah/delete/{{$data->id_sekolah}}" type="button" class="btn btn-outline-light">Ya</a>
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
  </script>
@endsection