<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		body{background: #5b5b5b;}
		.title{
			width: 1000px;
			background: #bebebe;
			font: 60px Georgia;
			color: #ffd306;
			border-radius: 20px;
			text-align: center;
			margin: 0 auto;
		}


		.center,.right{
			width: 400px;
			height: 200px;
			background-color: #FFD306;
			font: 50px/200px Georgia;
			border-radius: 20px;
			text-align: center;
			margin: 50px 0 0 50px;
		}
	</style>
</head>
<body>
<div class="title">佳木斯大学学生管理系统</div>
<div class="left-tit"><b>亲爱的<?php echo $_POST['name']?>同学，您已注册成功，欢迎你登录佳木斯大学学生管理系统!</b></div>

<div class="mark">
        <?php
            header('content-type:text/html;charset= utf-8');
            error_reporting(E_ALL ^ E_DEPRECATED);
             $con = mysql_connect("localhost","root","");
            if (!$con)
              {
              die('Could not connect: ' . mysql_error());
              }
            mysql_query("set character set 'utf8'");
            mysql_query("set names 'utf8'");
            mysql_select_db("student", $con);
            $result = mysql_query("SELECT * FROM mark
            WHERE sno='$_POST['sno']'");

            while($row = mysql_fetch_array($result))
              {
              echo $_POST['name'] . " " .$row['English'] . " " . $row['Java']. " " . $row['Maths'];
              echo "<br />";
            	}
        ?>
    </div>
</body>
</html>
