@extends('layouts.backend')
@section('content')
<div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Data Kecamatan</h3>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <form action="/kecamatan/update/{{ $kecamatan->id_kecamatan }}" method="POST">
        @csrf
      <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                  <!-- text input -->
                  <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" value="{{ $kecamatan->kecamatan }}" name="kecamatan" class="form-control" placeholder="Kecamatan">
                    <div class="text-danger">
                        @error('kecamatan')
                            {{ $message }}
                        @enderror
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Warna</label>
                        <div class="input-group my-colorpicker2">
                          <input value="{{ $kecamatan->warna }}" type="text" name="warna" class="form-control">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-square"></i></span>
                          </div>
                        </div>
                        <div class="text-danger">
                            @error('warna')
                                {{ $message }}
                            @enderror
                        </div>
                        <!-- /.input group -->
                      </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                      <label>Geojson</label>
                      <textarea name="geojson" rows="5" class="form-control" placeholder="GeoJson">{{ $kecamatan->geojson }}</textarea>
                      <div class="text-danger">
                        @error('geojson')
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
    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })
</script>
@endsection

