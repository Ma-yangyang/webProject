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

while($row = mysql_fetch_array($result))
  {
    if( $row['sno'] == $_POST['sno'])
        {
        if( $row['password'] == $_POST['password'])
            {
                $name = $row['name'];
                $grade = $row['grade'];
                $sex = $row['sex'];
                break;
             }
             else {

            header("location:ind.html");

             }
        }

}
    mysql_close($con);
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
                		.center:hover,.right:hover{
                        			background-color: #FCFF0D;
                        		}
                      .markform,.passchange{
                      			width: 500px;
                      			height: 70px;
                      			background-color: #fff;
                      			border: solid 5px  #FFD306;
                      			border-radius: 20px;
                                float: left;
                      			display: none;
                      			margin: 30px 0 0 320px;
                      			padding: 30px 0 0 90px;

                      		}
                      		.passchange{
                      		    height: 100px;
                      		}
                      		.button{
                      		    width: 100px;
                                height: 50px;
                                background: #EEE;
                                border-radius: 10px;
                                border: 3px solid #FFD306;
                                font: 15px  Georgia;
                                color: #000;
                                float: right;
                                margin: -10px 90px 0 0;
                      		}
                      		.button:hover{
                      		     width: 95px;
                      		     height: 45px;
                      		     background: #ccc;
                                 border-radius: 10px;
                                 border: 3px solid #FFD306;
                                 font: 14px  Georgia;
                      		}
                      		.input{
                      		border: 0;
                            border-bottom:1px solid #000;

                            }
                      		th,td{
                      		    padding-left: 20px;
                      		}

	</style>
</head>
<body>
<div class="title" >佳木斯大学学生管理系统</div>
<div class="left-tit"><b>亲爱的<?php echo $name?>同学，欢迎你登录佳木斯大学学生管理系统!</b></div>
<div class="left-info">
		<b>用户信息：</b><br>
		姓名：<?php echo $name?><br>
		学号：<?php echo $_POST['sno'];?><br>
		年级：<?php echo $grade?><br>
		性别：<?php echo $sex?>
	</div>
   	<div class="center" id="mark">
   	成绩查询
   </div>
	 <div class="right" id="pass">
    		密码修改
    </div>

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

$result = mysql_query("SELECT * FROM mark");

while($row = mysql_fetch_array($result))
  {
    if( $row['sno'] == $_POST['sno'])
        {

            	echo "<div class='markform' id='markform'><div class='markfrom'><table border='0' >
	<tr>
		<th>学号</th>
		<th>姓名</th>
		<th>英语</th>
		<th>Java</th>
		<th>数学</th>
	</tr>";
	echo "<tr>";
	echo "<td>" . $row['sno'] . "</td>";
	echo "<td>" . $row['name'] . "</td>";
	echo "<td>" . $row['English'] . "</td>";
	echo "<td>" . $row['Java'] . "</td>";
	echo "<td>" . $row['Maths'] . "</td>";
	echo "</tr>";
	echo "</table></div></div>";
        }
       }
    mysql_close($con);
    ?>
<div class="passchange" id="passchange">
	<form action="passchange.php"  method="post">
		请输入原密码：<input type="password" name="oldpass" class="input"><br>
		请输入新密码：<input type="password" name="newpass" class="input">
		<input type="submit" class="button" value="确定修改"><br>
	</form>
</body>
<script type="text/javascript">
    document.getElementById("mark").onclick = function(){
        document.getElementById("markform").style.display = "block";
    }
    document.getElementById("pass").onclick = function(){
        document.getElementById("passchange").style.display = "block";
    }
</script>
</html>
