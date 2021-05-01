<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel 8 Dynamic Dependent Dropdown using Jquery Ajax - XpertPhp</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Laravel 8 Dynamic Dependent Dropdown using Jquery Ajax</h2>
    <div class="form-group">
      <label for="country">Country:</label>
	  <select id="country" name="category_id" class="form-control">
        <option value="" selected disabled>Select Country</option>
         @foreach($countries as $key => $country)
         <option value="{{$key}}"> {{$country}}</option>
         @endforeach
         </select>
    </div>
    <div class="form-group">
      <label for="state">State:</label>
      <select name="state" id="state" class="form-control"></select>
    </div>
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
        $("#state").empty();
        $("#state").append('<option>Select State</option>');
        $.each(res,function(key,value){
          $("#state").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#state").empty();
      }
      }
    });
  }else{
    $("#state").empty();
  } 
  });
</script>
</body>
</html>