<?php
if (isset($_POST['aaa'])){
echo '
<script type="text/javascript">
location.reload();
</script>';
}
  $weather="";
  if($_GET["city"])
  {
	  
   $city= str_replace(" ",'',$_GET["city"]);
   $file = 'https://www.weather-forecast.com/locations/'.$city.'/forecasts/latest';
   
$file_headers = @get_headers($file);

  if($file_headers[0]=="HTTP/1.0 404 Not Found" )
  {
	  $exists=false;
  }
else
{
    $exists = true;
  	   	  	 
	   $forcastPage=file_get_contents("https://www.weather-forecast.com/locations/".$city."/forecasts/latest");
	 
 
	   $pageArray = explode('(1–3 days):</div><p class="location-summary__text"><span class="phrase">',$forcastPage);
	   
	   $weather = explode('</span><!-- <span id="ezoic-pub-ad-placeholder-124" class="ezoic-adpicker-ad" data-ezadblocke',$pageArray[1]);

}


  }
      

?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>WeatherScraper</title>
	<style>
	body{
		background-image: url("https://images.unsplash.com/photo-1507295386538-ddd5e86cd597?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1189&q=80") ;
		background-size: cover; 
		
	}
	.container{
		text-align:center;
		margin-top:200px;
		width:450px;
	}
	#city{
		margin:20px 0;
	}
	#weather{
		margin:20px;
	}
	
	
	</style>
  </head>
  <body>
    <div class="container">
	
	<h1>What's The weather ?</h1>
	
	<h2>Enter city name !</h2>
	 
	
	<form>
  <div class="form-group">
    
    <input name ="city" type="text" class="form-control" id="city" aria-describedby="emailHelp" placeholder="Eg:Tokyo, Delhi, etc.">

  <button type="submit" class="btn btn-primary">Submit</button>
</form>
	<div id="weather">
	
	<?php
	if($exists)
	{
	if($weather){
		
		echo '<div class="alert alert-primary" role="alert">'.$weather[0].'</div>';
		
	
	
	}
	}
	else
		if($_GET["city"])
		echo '<div class="alert alert-danger" role="alert">The city was not found</div>';
	
	?>
	
	<div>
	
	</div>

    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>