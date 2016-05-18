
<!DOCTYPE html>
<html>
<head>
 <script src="jquery-2.1.1.js"></script>
  <script src="bootstrap.min.js"></script>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

  
<style>

</style>
</head>
<body>

<?php
$sid=$_GET['c'];
  include("connect.php");  

//$sql="SELECT * FROM station WHERE c_id = '".$q."'";
//$sql="SELECT avg(Length_of_stay) Length_of_stay , avg(total_charges) total_charges
 //from patient_information where admitting_diagnosis_code='".$sid."'";


$sql="SELECT  `NATIONAL_PROVIDER_ID`, GROUP_CONCAT(`SEX`) as SEX, avg(`LENGTH_OF_STAY`) as stay,avg( `TOTAL_CHARGES`) as charges,GROUP_CONCAT(`had`) as had,GROUP_CONCAT(`DISCHARGE_STATUS`) as status, `PROVIDER_CITY_NAME`, `PROVIDER_POSTAL_CODE` FROM `patientnew` WHERE `ADMISSION_DIAGNOSIS_CODE`='$sid' group by `NATIONAL_PROVIDER_ID` ";

$result = mysqli_query($con,$sql); 
  
  $res1 = array();




  $i=0;
  $mincharge=1000000000000000;$minstay=1000000000000;$maxcharge=0;$maxstay=0;
while($row = mysqli_fetch_array($result)) {
    $res[$i] = $row;
    if ($mincharge>$row['charges']) {
      $mincharge = $row['charges'];
    }
    if ($maxcharge<$row['charges']) {
      $maxcharge = $row['charges'];
    }
    if ($minstay>$row['stay']) {
      $minstay = $row['stay'];
    }
    if ($maxstay<$row['stay']) {
      $maxstay = $row['stay'];
    }
    $i++;
  }
  // echo $mincharge.", ".$maxcharge.", ".$minstay.", ".$maxstay;
  $chargerange = ($maxcharge - $mincharge)/5;
  $stayrange = ($maxstay - $minstay)/5;

foreach ($res as $key => $value) {
  # code...
  $totaldead= substr_count($value[5], '1');
  $deadarray=explode(',', $value['status']);
  $sex=explode(',', $value['SEX']);
  $maled=array_intersect($deadarray, $sex);
  $maledead=count($maled);
  $totalmale=substr_count($value[1], '1');
  if ($totalmale == 0) {
    array_push($value, "0");
  }
  else{
    // echo $maledead/$totalmale;
    array_push($value, ($maledead/$totalmale)*100) ;
  }
  $femaledead=$totaldead-$maledead;
  $totalfemale=substr_count($value[1], '2');
  if ($totalfemale==0) {
    array_push($value, "0");
  }
  else{array_push($value, $femaledead/$totalfemale*100);}
  for ($i=0; $i <= 5; $i++) { 
    if (($mincharge+($i*$chargerange))>=$value['charges']) {
      if ($i == 0) {
      array_push($value, (5));
      break;
      }
      array_push($value, (6 - $i));
      break;
    }
  }
  for ($i=0; $i <= 5; $i++) { 
    if (($minstay+($i*$stayrange))>=$value['stay']) {
      if ($i == 0) {
      array_push($value, (5));break;
      }
      array_push($value, (6 - $i));
      break;
    }

  }

  $hadarray = explode(",", $value['had']);
  $totalhad = count($hadarray);
  $v1 = 0; $v2 = 0; $v3 = 0; 
  foreach ($hadarray as $key => $value1) {
    if ($value1[0] == '1') {
      $v1++;
    }
    if ($value1[1] == '1') {
      $v2++;
    }
    if ($value1[2] == '1') {
      $v3++;
    }
  }
  array_push($value, $v1/$totalhad*100);
  array_push($value, $v2/$totalhad*100);
  array_push($value, $v3/$totalhad*100);


  array_push($value, ($value[10]+$value[11])/2);
  array_push($res1, $value);

}

usort($res1, function($a, $b) {
    if($a[15]==$b[15]) return 0;
    return $a[15] < $b[15]?1:-1;
});
    // echo "<pre>";
    // echo print_r($res1);
    // echo "</pre>";
foreach ($res1 as $key => $value) {

?>

 
    
    <div class="card">
      <div class="card-block">
        <div class="row">
          <div class="col-md-8">
            <h4 class="">
            <a class="btn-floating btn-small "  data-toggle="modal" data-target="#<?php echo $value[0]; ?>">
            <i class="material-icons">search</i></a>
            National Provider ID: <?php echo $value[0];?>
            </h4>
          </div>
          <div class="col-md-4" style="margin-top: 14px;">
            <?php $ii = floor($value[15]); for ($i=0; $i < $ii; $i++) { 
              ?><i class="material-icons">star</i><?php }?></div>
      </div>
      <hr>

    <ul class=\"list-group list-group-flush\">
    <li class=\"list-group-item\">Length Of Stay: <?php echo $value[2];?></li>
    <li class=\"list-group-item\">Total Charges: <?php echo $value[3];?> </li></ul>
</div></div>


<!-- Modal -->
  <div class="modal fade" id="<?php echo $value[0]; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">National Provider ID: <?php echo $value[0]; ?></h4>
        </div>
        <div class="modal-body">
<div class="container">
  <div class="row">Mortality</div>
<div class="row">
  <div class="col-md-3">Men: <?php echo $value[8];?>%</div>
  <div class="col-md-3">Women: <?php echo $value[9];?>%</div>  
</div>
<div class="row">Chances of Hospital Acquired Diseases</div>
<div class="row">
  <?php 
    echo "<div class=\"col-xs-2\">5990: $value[12]%</div><div class=\"col-xs-2\">0386: $value[13]%</div><div class=\"col-xs-2\">486: $value[14]%</div>";
  ?>
  
</div>
</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>













<?php


}





mysqli_close($con);
?>


</body>
</html>


