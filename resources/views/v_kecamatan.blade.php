@extends('layouts.frontend')
@section('content')

<!-- <div class="col-md-12" id="map" style="width: 100%; height: 500px;"></div> -->
<div class="col-sm-12">
<br />
<br />
  <div class="text-center">
    <h2>Data Sarana dan Prasarana Sanitasi {{$title}}</h2>
  </div>
  <table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th width=60px>No</th>
            <th>Kegiatan</th>
            <th>Pekerjaan</th>
            <th>Desa</th>
            <th>Kecamatan</th>
            <th>Pagu</th>
            <th>Tahun Anggaran</th>
            <th width=100px class="text-center">Opsi</th>
        </tr>
        <tbody>
            <?php $no=1; ?>
            @foreach ($sanitasi as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->nama_kegiatan }}</td>
                <td>{{ $data->pekerjaan }}</td>
                <td>{{ $data->desa }}</td>
                <td>{{ $data->kecamatan }}</td>
                <td>@currency($data->pagu)</td>
                <td>{{ $data->tahun }}</td>
                <td class="text-center">
                    <a href="/detailpekerjaan/{{$data->id_pekerjaan}}"><i class="fa fa-eye"></i></a>
                </td>
            </tr>    
            @endforeach
        </tbody>
    </thead>
</table>
</div>
<script>
  /*
    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});

var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});


var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/dark-v10'
	});
    
    var data{{$kec->id_kecamatan}} = L.layerGroup();

    @foreach($jenjang as $j)
      var jenjang{{$j->id_jenjang}} = L.layerGroup();
    @endforeach

    var sekolah = L.layerGroup();

    var map = L.map('map', {
    center: [-6.818103945613233, 107.13639780080835],
    zoom: 14,
    layers: [peta1,
      data{{$kec->id_kecamatan}},
    sekolah,
    @foreach($jenjang as $j)
       jenjang{{$j->id_jenjang}},
    @endforeach

    ]
    });

    var baseMaps = {
    "Grayscale": peta1,
    "Satellite": peta2,
    "Streets": peta3,
    "Dark": peta4,
    };

    var overLayer = {
      "{{$kec->kecamatan}}" : data{{ $kec->id_kecamatan }},
      "Sekolah" : sekolah,
      @foreach($jenjang as $j)
       "{{ $j-> jenjang }}" : jenjang{{$j->id_jenjang}},
    @endforeach
    };

    L.control.layers(baseMaps, overLayer).addTo(map);

  
  @foreach($sklh as $data)
  var informasi = `
  <table class="table table-bordered">
<thead>
  <tr>
    <th colspan="2" class="text-center"><img width=150px src="{{asset('foto')}}/{{$data->foto}}"></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Nama Sekolah</td>
    <td>{{$data->nama_sekolah}}</td>
  </tr>
  <tr>
    <td>Jenjang</td>
    <td>{{$data->jenjang}}</td>
  </tr>
  <tr>
    <td>Status</td>
    <td>{{$data->status}}</td>
  </tr>
  <tr>
    <td colspan="2"class="text-center text-white"><a href="" class="btn btn-xs btn-default">Detail</a></td>
  </tr>
</tbody>
</table>
  `  
      var iconsekolah = L.icon({
        iconUrl : '{{asset('icon')}}/{{$data->icon}}',
        iconSize : [60,60],
      });   
      L.marker([<?= $data->posisi ?>],{icon: iconsekolah})
      .addTo(jenjang{{$j->id_jenjang}})
      .bindPopup(informasi);
  @endforeach
  **/
  $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
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
