<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
//$q = intval($_GET['q']);
$ch = intval($_GET['q']);
  include("connect.php");  


//$sql="SELECT * FROM station WHERE c_id = '".$q."'";
$sql="SELECT avg(`LENGTH_OF_STAY`) as length,avg( `TOTAL_CHARGES`) as charges,GROUP_CONCAT(`DISCHARGE_STATUS`) as status FROM `patientnew` WHERE `ADMISSION_DIAGNOSIS_CODE`='$ch'";
$result = mysqli_query($con,$sql); 

$i = 0;
while($row = mysqli_fetch_array($result)) {

	$status = explode(",", $row['status']);
	foreach ($status as $key => $value) {
		if ($value == 1) {
			$i++;
		}
	}
    echo "<h5>Length of Stay (Avg.) :<t> $row[length]<br>Total Charges (Avg.) :<t> $row[charges]<br>Mortality Rate (%) :<t> ".round(($i/count($status)*100),2)."%<br></h5>";
}

mysqli_close($con);
?>
</body>
</html>
