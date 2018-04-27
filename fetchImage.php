<?php 
if(!empty($GET['location'])){
    $maps_url = 'https://maps.googleapis.com/maps/api/geocode/json?address='. $GET['location'];

$mapsJson = file_get_contents($maps_url);
$mapsArray = json_decode($mapsJson,true);

    $lat = $mapsArray['results'][0]['geometry']['location']['lat'];
    $log = $maps_Array['results'][0]['geometry']['location']['lng'];    

$insta = 'https://api.instagram.com/v1/tags/' . urlencode($_GET['location']) . '/media/recent?access_token=XXXXXXXXXXXXXXXXXXXXX';
$json=file_get_contents($insta);
$array = json_decode($json, true);  
    }

?>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>FetchImage</title>
<link rel="stylesheet" href="image.css" type="text/css">
 
</head>
<body>
<h2>Enter the Location Name:</h2>
<form action="" method="post" style="align:center;">
<input type="text"  name="location" id="name"/>
<button type="submit">Submit</button>
   <br/>
    
    <?php
    if(!empty($array)){
    foreach($array['data'] as $image){
        echo '<img src="'.$image['images']['low resolution']['url'].'" alt=""/></br>';
        }
    }
    
    ?>

    
    </form>

 </body>
</html>
