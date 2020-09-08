<style>
        table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
        }
        tr{
                border-bottom: 1px solid #444444;
                padding: 10px;
        }
        td{
                border-bottom: 1px solid #efefef;
                padding: 10px;
        }
        table .even{
                background: #efefef;
        }
        .text{
                text-align:center;
                padding-top:20px;
                color:#000000
        }
        .text:hover{
                text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover { text-decoration : underline;}
</style>

<?php
$con = mysqli_connect('localhost', 'root', 'Wotjd@487', 'sqldb') or die ('占쎈쑓占쎌뵠占쎄숲甕곗쥙�뵠占쎈뮞 占쎈염野껉퀣肉� �눧紐꾩젫揶쏉옙 占쎌뿳占쎈뮸占쎈빍占쎈뼄.\n�꽴占썹뵳�딆쁽占쎈퓠野껓옙 �눧紐꾩벥 獄쏅뗀�뿻占쎈빍占쎈뼄.');
$sql = "select * from boardtable";


$ret = mysqli_query($con,$sql);
$total = 1;

if(mysqli_connect_error($con)){
    echo "�뿉�윭 諛쒖깮 : ",mysqli_connect_error();
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>寃뚯떆�뙋</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

</head>

<body>
	<article class="boardArticle">
		<h3>�옄�룞李� ICT 怨듯븰怨�</h3>
		
		<table>
			<caption class="readHide"></caption>
			<thead>
			</thead>
			<tbody>
		
					 <?php
					 echo "<h1> board </h1>";
					 echo "<table border=1>";
					 echo "<tr>";
					 echo "<th>湲� 踰덊샇</th><th>�젣紐�</th><th>�씠由�</th><th>�떆媛�</th><th>�쑀�삎</th>";
					 echo "</tr>";
                while($rows = mysqli_fetch_assoc($ret)){ //DB�뿉 ���옣�맂 �뜲�씠�꽣 �닔 (�뿴 湲곗�)
                        if($total%2==0){
        ?>                      <tr class = "even">
                        <?php   }
                        else{
        ?>                      <tr>
                        <?php } ?>
                <td width = "50" align = "center"><?php echo $total?></td>
                <td width = "500" align = "center">
                <a href = "view.php?NUM=<?php echo $rows['NUM']?>">
                <?php echo $rows['TITLE']?></td>
                  <td width = "100" align = "center"><?php echo $rows['NAME']?></td>
                <td width = "200" align = "center"><?php echo $rows['DT']?></td>
                <td width = "200" align = "center"><?php echo $rows['TYPE']?></td>
                </tr>
        <?php
                $total++;
                }
                mysqli_close($con);
        ?>
					<tr>
					<input type="button" value="湲� �옉�꽦 " class="pull-right" onclick="location.href='upboard.php'"/>
					</tr>
			</tbody>
		</table>
	</article>
</body>
</html>