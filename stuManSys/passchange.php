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
$result = mysql_query("SELECT * FROM student");
while($row = mysql_fetch_array($result)){
   mysql_query("UPDATE student SET password = '$_POST[newpass]'
   WHERE password = '$_POST[oldpass]'");
}


mysql_close($con)
?>
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

		.left-tit{
			width: 800px;
			background-color: #fff;
			font: 20px Georgia;
			color:  #FFD306;
			border-radius: 40px;
			margin: 0 auto;
			text-align: center;
			margin-top: 30px;
		}
		.left-info{
			width: 400px;
			background-color: #FFD306;
			font: 30px Georgia;
			border-radius: 20px;
			text-align: center;
			margin-top: 50px;
			float:left;
		}
        .center,.right{
        			width: 400px;
                    height: 200px;
        			background-color: #FFD306;
        			font: 50px/200px Georgia;
        			border-radius: 20px;
        			text-align: center;
        			margin: 50px 0 0 50px;
        		    float: left;
        		}

        		.jump{width: 300px;
                			height: 100px;
                			background-color: #FFD306;
                			font: 30px/100px Georgia;
                			color: #707070;
                			border-radius: 20px;
                			text-align: center;
                			margin: 0 auto;
                			margin-top: 40px;

                		}
                		a{
                			text-decoration: none;
                			color: #707070;
                		}
        		.jump:hover{
                			background-color: #FCFF0D;
                		}
	</style>
</head>
<body>
    <div class="title">佳木斯大学学生管理系统</div>
	<div class="left-tit"><b>您已修改密码，点击跳转重新登录佳木斯大学学生管理系统!</b></div>

	 <a href="ind.html"><div class="jump">跳转</div></a>

</body>
</html>