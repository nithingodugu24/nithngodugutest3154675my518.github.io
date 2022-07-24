<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<?php

if(!empty($_REQUEST['aadhaar']) AND 
!empty($_REQUEST['name'])  ){
$name = $_REQUEST['name'];

$id=$_REQUEST['aadhaar'];

  $url = "https://www.myutiitsl.com/PANform/forms/pan.html/aadhaarPanLinkInfo";
 

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = "aadhaarNo=$id";

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp2 = curl_exec($curl);
curl_close($curl);

 $lasr = substr($resp2, 0, -47);
    $mpan = substr($lasr, 37);
    $first =  substr($resp2, 0, -47);
    $fr = substr($first, 0, -15);
    $olas = substr($resp2,52);
    
      $start2 = $resp2[40].$resp2[41];
      
      
      $last2 = $resp2[48].$resp2[49];
     
$urlp =  "https://srisaionline.co.in/dashboard/api/4.php?first=".$start2."&name=".$name."&last=".$last2."&alphabet=";

echo ' <br>
<iframe src="'.$urlp.'A" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'B" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'C" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'D" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'E" height="200" width="300" title=""></iframe>

<iframe src="'.$urlp.'F" height="200" width="300" title=""></iframe><br>
<iframe src="'.$urlp.'G" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'H" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'I" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'J" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'K" height="200" width="300" title=""></iframe><br>

<iframe src="'.$urlp.'L" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'M" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'N" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'O" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'P" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'Q" height="200" width="300" title=""></iframe><br>

<iframe src="'.$urlp.'R" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'S" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'T" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'U" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'V" height="200" width="300" title=""></iframe><br>
<iframe src="'.$urlp.'Q" height="200" width="300" title=""></iframe>

<iframe src="'.$urlp.'X" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'Y" height="200" width="300" title=""></iframe>
<iframe src="'.$urlp.'Z" height="200" width="300" title=""></iframe><br>

';
?>


<a>open this page in incognito tab or fresh window</a>


<br><br>

<button type="button" onclick="NewTab()" >Submit</button>

<?php
}else{
    echo "please enter aadhaar and name parmeters";
}

?>


