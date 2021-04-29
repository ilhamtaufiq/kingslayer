@extends('layouts.frontend')
@section('content')
<div class="col-md-12" id="map" style="width: 100%; height: 500px;"></div>

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
    
    @foreach($kecamatan as $data)
      var data{{$data->id_kecamatan}} = L.layerGroup();
    @endforeach

    var sekolah = L.layerGroup();

    var map = L.map('map', {
    center: [-6.818103945613233, 107.13639780080835],
    zoom: 14,
    layers: [peta1,
    @foreach($kecamatan as $data)
      data{{$data->id_kecamatan}},
    @endforeach
    sekolah,
    ]
    });

    var baseMaps = {
    "Grayscale": peta1,
    "Satellite": peta2,
    "Streets": peta3,
    "Dark": peta4,
    };

    var overLayer = {
      @foreach($kecamatan as $data)
      "{{$data->kecamatan}}" : data{{ $data->id_kecamatan }},
      @endforeach
      "Sekolah" : sekolah,
    };

    L.control.layers(baseMaps, overLayer).addTo(map);


    

  @foreach($sekolah as $data)
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
    <td colspan="2"class="text-center text-white"><a href="/detail/{{$data->id_sekolah}}" class="btn btn-xs btn-default">Detail</a></td>
  </tr>
</tbody>
</table>
  `  
      var iconsekolah = L.icon({
        iconUrl : '{{asset('icon')}}/{{$data->icon}}',
        iconSize : [60,60],
      });   
      L.marker([<?= $data->posisi ?>],{icon: iconsekolah})
      .addTo(sekolah)
      .bindPopup(informasi);
  @endforeach

</script>
@endsection
