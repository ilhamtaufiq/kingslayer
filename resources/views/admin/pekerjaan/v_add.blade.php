@extends('layouts.backend')
@section('content')
<div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Tambah Data Pekerjaan</h3>
        <!-- /.card-tools -->
      </div>
      <!-- /.card-header -->
      <form action="/pekerjaan/insert" method="POST">
        @csrf
      <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Kegiatan</label>
                  <select name="id_kegiatan" class="form-control">
                    <option value="">Pilih Kegiatan</option>
                    @foreach ($kegiatan as $k)
                    <option value="{{$k->id_kegiatan}}">{{$k->nama_kegiatan}}</option>
                    @endforeach
                  </select>
                  <div class="text-danger">
                      @error('id_kegiatan')
                          {{ $message }}
                      @enderror
                  </div>
                </div>
              </div>
              <div class="div col-sm-6">
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <input type="text" name="pekerjaan" class="form-control" placeholder="Nama Pekerjaan">
                  <div class="text-danger">
                      @error('pekerjaan')
                          {{ $message }}
                      @enderror
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Kecamatan</label>
                  <select name="id_kecamatan" id="country" class="form-control">
                    <option value="">Pilih Kecamatan</option>
                    @foreach ($kec as $j => $v)
                    <option value="{{$j}}">{{$v}}</option>
                    @endforeach
                  </select>
                  <div class="text-danger">
                      @error('id_kecamatan')
                          {{ $message }}
                      @enderror
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="id_desa">Desa</label>
                  <select value="" name="id_desa" id="id_desa" class="form-control" ></select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Pagu</label>
                  <input type="number" name="pagu" class="form-control" placeholder="Jumlah Pagu">
                  <div class="text-danger">
                      @error('pagu')
                          {{ $message }}
                      @enderror
                  </div>
                </div>
              </div>
              <div class="div col-sm-6">
                <div class="form-group">
                  <label>Tahun</label>
                  <input type="number" name="tahun" class="form-control" placeholder="Tahun Anggaran">
                  <div class="text-danger">
                      @error('tahun')
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
<script type=text/javascript>
  $('#country').change(function(){
  var countryID = $(this).val();  
  if(countryID){
    $.ajax({
      type:"GET",
      url:"{{url('getState')}}?country_id="+countryID,
      success:function(res){        
      if(res){
        $("#id_desa").empty();
        $("#id_desa").append('<option value=""></option>');
        $.each(res,function(key,value){
          $("#id_desa").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#id_desa").empty();
      }
      }
    });
  }else{
    $("#id_desa").empty();
  } 
  });
  </script>
@endsection

