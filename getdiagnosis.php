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
$ch = intval($_GET['ch']);
  include("connect.php");  


//$sql="SELECT * FROM station WHERE c_id = '".$q."'";
$sql="SELECT distinct admission_diagnosis_code from patient_information";
$result = mysqli_query($con,$sql); 


while($row = mysqli_fetch_array($result)) {

    echo "<li value=\"".$row['admission_diagnosis_code']."\" onClick=\"setstation(this.value,".$ch.")\" id=\"abc".$row['admission_diagnosis_code']."\"> ".$row['admission_diagnosis_code']."</li>";
}

mysqli_close($con);
?>
</body>
</html>
