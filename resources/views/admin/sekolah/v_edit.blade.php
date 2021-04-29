@extends('layouts.backend')
@section('content')
<div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data sekolah Sekolah</h3>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <form action="/sekolah/update/{{$sekolah->id_sekolah}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Nama Sekolah</label>
                    <input value="{{$sekolah->nama_sekolah}}" type="text" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah">
                    <div class="text-danger">
                        @error('nama_sekolah')
                            {{ $message }}
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Jenjang Sekolah</label>
                    <select name="id_jenjang" class="form-control">
                      <option value="{{$sekolah->id_jenjang}}">{{$sekolah->jenjang}}</option>
                      @foreach ($jenjang as $j)
                      <option value="{{$j->id_jenjang}}">{{$j->jenjang}}</option>
                      @endforeach
                    </select>
                    <div class="text-danger">
                        @error('id_jenjang')
                            {{ $message }}
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Status Sekolah</label>
                    <select name="status" class="form-control">
                    <option value="{{$sekolah->status}}">{{$sekolah->status}}</option>
                      <option value="Negeri">Negeri</option>
                      <option value="Swasta">Swasta</option>
                    </select>
                    <div class="text-danger">
                        @error('status')
                            {{ $message }}
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Kecamatan Sekolah</label>
                    <select name="id_kecamatan" class="form-control">
                     <option value="{{$sekolah->id_kecamatan}}">{{$sekolah->kecamatan}}</option>
                      @foreach ($kecamatan as $s)
                        <option value="{{$s->id_kecamatan}}">{{$s->kecamatan}}</option>
                      @endforeach
                    </select>
                    <div class="text-danger">
                        @error('id_kecamatan')
                            {{ $message }}
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Alamat Sekolah</label>
                    <input value="{{$sekolah->alamat}}" type="text" name="alamat" class="form-control" placeholder="Alamat Sekolah">
                    <div class="text-danger">
                        @error('alamat')
                            {{ $message }}
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Posisi Sekolah</label>
                    <input value="{{$sekolah->posisi}}" type="text" id="posisi" name="posisi" class="form-control" placeholder="Posisi Sekolah">
                    <div class="text-danger">
                        @error('posisi')
                            {{ $message }}
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                      <label>Foto</label>
                        <input type="file" name="foto" class="form-control" accept="image/png,image/jpeg"> 
                      <div class="text-danger">
                          @error('foto')
                              {{ $message }}
                          @enderror
                      </div>
                      <!-- /.input group -->
                    </div>
                </div>
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                      <img src="{{asset('foto')}}/{{$sekolah->foto}}" width="250px;">
                    </div>
              </div>
                <div class="col-sm-12">
                  <label>MAP</label>
                  <div class="col-md-12" id="map" style="width: 100%; height: 400px;"></div>
                </div>
                <div class="col-sm-12">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Deskripsi Sekolah</label>
                    <input value="{{$sekolah->deskripsi}}" type="text" name="deskripsi" class="form-control" placeholder="Deskripsi Sekolah">
                    <div class="text-danger">
                        @error('deskripsi')
                            {{ $message }}
                        @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                <button type="submit" class="btn btn-warning float-right">Batal</button>
              </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
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
  var map = L.map('map', {
    center: [{{$sekolah->posisi}}],
    zoom: 13,
    layers: [peta1
    ]
    });
    var baseMaps = {
    "Grayscale": peta1,
    "Satellite": peta2,
    "Streets": peta3,
    "Dark": peta4,
    };
    L.control.layers(baseMaps).addTo(map);
   //mengambil koordinat
   var curLocation = [{{$sekolah->posisi}}]; 
   map.attributionControl.setPrefix(false);
   var marker = new L.marker(curLocation,{
      'draggable' : 'true',
   });
   map.addLayer(marker); 

   //drag marker
   marker.on('dragend',function(event){
     var position = marker.getLatLng();
     marker.setLatLng(position,{
      'draggable' : 'true',
     }).bindPopup(position).update();
     console.log(position.lat + "," + position.lng);
     $("#posisi").val(position.lat + "," + position.lng).keyup(); 
   });

   var posisi = document.querySelector("[name=posisi]");
   map.on("click",function(e){
     var lat = e.latlng.lat;
     var lng = e.latlng.lng;

     if(!marker){
        marker = L.marker(e.latlng).addTo(map);
     }else{
       marker.setLatLng(e.latlng);
     }
     posisi.value = lat + "," + lng;
   });


</script>
@endsection

