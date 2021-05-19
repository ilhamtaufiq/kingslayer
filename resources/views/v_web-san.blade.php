@extends('layouts.frontend')
@section('content')
<!--<div class="col-sm-6" id="map" style="width: 100%; height: 500px;"></div>
<div class="col-sm-6"><h3>Tes</h3></div>-->
<div class="col-sm-12">
  <div class="card">
    <div class="card-header">
      <h5 class="card-title m-0">Pemetaan</h5>
    </div>
    <div class="card-body" id="map" style="width: 100%; height: 400px;">
    </div>
  </div>

  <div class="card card-primary card-outline">
    <div class="card-header">
      <h5 class="card-title m-0">Statistik</h5>
    </div>
    <div class="card-body">

        <!-- Small Box (Stat card) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$total_pekerjaan}} Unit</h3>
                <p>Sarana Prasarana Terbangun</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Target</p>
              </div>
              <div class="icon">
                <i class="fa fa-tasks"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>@currency($anggaran)</h3>

                <p>Alokasi Pagu Anggaran</p>
              </div>
              <div class="icon">
                <i class="fas fa-shopping-cart"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Penerima Manfaat</p>
              </div>
              <div class="icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="card-title m-0">Featured</h5>
        </div>
        <div class="card-body">
          <h6 class="card-title">Special title treatment</h6>
    
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h5 class="card-title m-0">Featured</h5>
        </div>
        <div class="card-body">
          <h6 class="card-title">Special title treatment</h6>
    
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>





<script>
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
    
    @foreach($kegiatan as $data)
      var data{{$data->id_kegiatan}} = L.layerGroup();
    @endforeach


    var map = L.map('map', {
    center: [-6.818103945613233, 107.13639780080835],
    zoom: 12,
    layers: [peta1,
    @foreach($kegiatan as $data)
      data{{$data->id_kegiatan}},
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
      @foreach($kegiatan as $data)
      "{{$data->nama_kegiatan}}" : data{{ $data->id_kegiatan }},
      @endforeach
    };

    L.control.layers(baseMaps, overLayer).addTo(map);


    

  @foreach($pekerjaan as $data)
  var informasi = `
  <table class="table table-bordered">
<thead>
  <tr>
    <th colspan="2" class="text-center"><img width=150px src=""></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td>Nama Pekerjaan</td>
    <td>{{$data->pekerjaan}}</td>
  </tr>
  <tr>
    <td>Kegiatan</td>
    <td>{{$data->nama_kegiatan}}</td>
  </tr>
  <tr>
    <td>Tahun Anggaran</td>
    <td>{{$data->tahun}}</td>
  </tr>
  <tr>
    <td colspan="2"class="text-center text-white"><a href="detailpekerjaan/{{$data->id_pekerjaan}}" class="btn btn-xs btn-default">Detail</a></td>
  </tr>
</tbody>
</table>
  `  
      var iconsekolah = L.icon({
        iconUrl : '',
        iconSize : [60,60],
      });   
      L.marker([<?= $data->latlong ?>])
      .addTo(data{{$data->id_kegiatan}})
      .bindPopup(informasi);
  @endforeach

</script>
@endsection
