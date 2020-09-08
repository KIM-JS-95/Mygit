<?php 
header("Content-Type: text/html;charset=UTF-8");
$host = 'localhost';
$user = 'root';
$pw = 'Wotjd@487'; 
$dbName = 'test';
$mysqli = mysqli_connect($host, $user, $pw, $dbName)or die ('DB�뿰寃� �떎�뙣�뻽�뒿�땲�떎.');
$temp = $_GET['temp'];
$num=0;
$clock=date("Y-m-j H:i:s");

if($mysqli){ 
    echo "MySQL successfully connected!<br/>"; 

    
    echo "<br/>Temperature = $temp";
    
    $query = "INSERT INTO test.tempnhumi VALUES ('$clock','$temp','$num')"; 
    
    mysqli_query($mysqli,$query); 
    echo "</br>success!!"; 
} 
else{ 
    echo mysqli_error($mysqli); 
}
mysqli_close($mysqli);
?>
