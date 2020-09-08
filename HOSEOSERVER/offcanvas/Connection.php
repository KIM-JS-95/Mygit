<?php
$con = mysqli_connect('localhost', 'root', 'Wotjd@487', 'sqldb') or die ('연결 실패.');
$sql = "select * from boardtable";


$ret = mysqli_query($con,$sql);
$total = 1;

if(mysqli_connect_error($con)){
    echo "�뿉�윭 諛쒖깮 : ",mysqli_connect_error();
    exit();
}
?>