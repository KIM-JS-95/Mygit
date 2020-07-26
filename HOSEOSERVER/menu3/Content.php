
<?php
$con = mysqli_connect('localhost', 'root', 'Wotjd@487', 'sqldb') or die ('�뜲�씠�꽣踰좎씠�뒪 �뿰寃곗뿉 臾몄젣媛� �엳�뒿�땲�떎.\n愿�由ъ옄�뿉寃� 臾몄쓽 諛붾엻�땲�떎.');
$sql = "select * from boardtable";


$ret = mysqli_query($con,$sql);
$total = 1;

if(mysqli_connect_error($con)){
    echo "에러 발생 : ",mysqli_connect_error();
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>게시판</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>

<body>
	<article class="boardArticle">
		<h3>자동차 ICT 공학과</h3>
		
		<table>
			<caption class="readHide"></caption>
			<thead>
			</thead>
			<tbody>
			
					
					 <?php
					 echo "<h1> board </h1>";
					 echo "<table border=1>";
					 echo "<tr>";
					 echo "<th>글 번호</th><th>제목</th><th>이름</th><th>시간</th><th>유형</th>";
					 echo "</tr>";
                while($rows = mysqli_fetch_assoc($ret)){ //DB에 저장된 데이터 수 (열 기준)
                        if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <td width = "50" align = "center"><?php echo $total?></td>
                <td width = "500" align = "center">
                <a href = "view.php?number=<?php echo $rows['NUM']?>">
                <?php echo $rows['TITLE']?></td>
                  <td width = "100" align = "center"><?php echo $rows['NAME']?></td>
                <td width = "200" align = "center"><?php echo $rows['DT']?></td>
                <td width = "200" align = "center"><?php echo $rows['TYPE']?></td>
                </tr>
        <?php
                $total++;
                }
        ?>


					<tr>
					<input type="button" value="글 작성 " class="pull-right" onclick="location.href='upboard.php'"/>
					</tr>
			</tbody>
		</table>
	</article>
</body>
</html>
<!--
					<?php
					echo "<h1> board </h1>";
					echo "<table border=1>";
					echo "<tr>";
                    echo "<th>글 번호</th><th>글 유형</th><th>이름</th><th>내용</th><th>시간</th>";
                    echo "</tr>";
                    
                    while($row = mysqli_fetch_array($ret)) {
                        echo "<tr>";
                        echo "<td>",$row['NUM'],"</td>";
                        echo "<td>",$row['TYPE'],"</td>";
                        echo "<td>",$row['NAME'],"</td>";
                        echo "<td>",$row['CONTENTS'], "</td>";
                        echo "<td>", $row['DT'],"</td>";
                        echo "</tr>";
                    
                    }
                    mysqli_close($con);
					?>
					 -->