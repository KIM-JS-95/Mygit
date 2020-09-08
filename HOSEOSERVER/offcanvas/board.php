
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>N.N Laboratory Member - HOSEO University</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
   <?php include("Connection.php"); ?>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="https://chiffona.github.io/nnlab/example/offcanvas/index">N.N. Lab</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse" aria-expanded="true" style>
          <ul class="nav navbar-nav">
            <li class="active"><a href="../index.html">Home</a></li>
            <li><a href="lab.html">연구실 소개</a></li>
            <li><a href="member.html">연구실 인원</a></li>
            <li><a href="attendance.html">출근부</a></li>
            <li><a href="board.html">게시판</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">추가 사이트</button>
          </p>
          <div class="jumbotron">
            <h1>게시판</h1>
            <!--<a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a>-->
          </div>
            
            <tbody>
					 <?php
					 echo "<table border=1>";
					 echo "<tr>";
					 echo "<th>글번호</th><th>내용</th><th>작성자</th><th>날짜</th><th>유형</th>";
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
			</tbody>
		</table>
		
		<tr>
		<input type="button" value="글작성" class="pull-right" onclick="location.href='../menu3/upboard.php'"/>
		</tr>
		
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->
<br>
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="https://www.hoseo.ac.kr/" class="list-group-item" target = "blank">호서대학교</a>
            <a href="https://portal.hoseo.edu/" class="list-group-item" target = "blank">호서대학교 포털</a>
            <a href="https://learn.hoseo.edu/" class="list-group-item" target = "blank">호서대학교 블랙보드</a>
            <a href="https://www.youtube.com/channel/UCAaswb7rlk3Y1R3PfxCB5Ig" class="list-group-item" target = "blank">학과 공식 YouTube Channel</a>
            <a href="https://www.youtube.com/watch?v=VblNV_gsLd4" class="list-group-item" target = "blank">학과 홍보 영상1 (2018)</a>
            <a href="https://www.youtube.com/watch?v=oZtkhvYoNbI&t=228s" class="list-group-item" target = "blank">학과 홍보 영상2 (2019)</a>
            <a href="https://www.youtube.com/watch?v=gupMYwGUWWk" class="list-group-item" target = "blank">학과 홍보 영상3 (2020)</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>Hyeonhak Choi & Jeasong Kim</p>
        <p>&copy; Bootstrap 2014</p>
      </footer>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="offcanvas.js"></script>
  </body>
</html>
