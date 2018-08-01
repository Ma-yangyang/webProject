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
    		.fresh{
    		     width: 90px;
                 height: 30px;
                 line-height: 30px;
                 background-color: #fff;
                 border: solid 5px  #FFD306;
                 border-radius: 20px;
                 position: absolute;
                 right: 90px;
                 top: 110px;
                 text-align: center;
    		}
    		.stuinfo,.markinfo{
            			width: 300px;
            			height: 80px;
            			border-radius: 20px;
            			background-color: #FFD306;
            			font: 30px/80px Georgia;
                         float: left;
            			margin: 30px 0 0 150px;
            			text-align: center;
            		}
            		.cenline{
            		    float: left;
            		}
            		.markinfo{
            		margin-top: 60px;
            		}

             .cenline{
             			border-right: 4px solid #FFD306;
             			height: 500px;
             			width: 600px;
             			margin: 30px;
             		}
             		.stutable,.marktable{
                    			width: 370px;
                    			height: 270px;
                    			background-color: #fff;
                    			border: solid 5px  #FFD306;
                    			border-radius: 20px;
                    			margin: 0 auto;
                    			margin-top: 150px;
                    			padding: 30px 0 0 30px;
                    		}
                    		.marktable{
                    		    float: right;
                    		    margin: 40px 100px 0 0;
                    		    width: 470px;
                    		}
                    		.instable{
                    		    margin-left: 40px;
                    		}
                            .markbot{

                                font: 17px/20px  700 SimSun;
                                color: #5b5b5b;

                                position: relative;
                                bottom: -20px;
                            }
                            .insure{
                               position: absolute;
                                right: 90px;
                                bottom: 40px;

                            }
                            .delbutton{
                                margin: 30px 0 0 250px;
                            }
                             .button{
                                width: 90px;
                                height: 30px;
                                background-color: #fff;
                                border: solid 5px  #FFD306;
                                border-radius: 20px;
                             }
                             .button:hover,.fresh:hover{
                                 width: 85px;
                                 height: 27px;
                             }
                    		table{
                    		    background-color: #000;
                    		}
                    		th,td{
                    		    background-color: #fff;
                    		    padding: 0 10px 0 10px;
                    		}
                    		input[type="text"]{
                    		width: 150px;
                    		 height: 15px;
                    		 background-color: #fff;
                    		 border: 0;
                    		 border-bottom: 1px solid #FFCE3B;
                    		 text-align: center;
                    		 }


    	</style>
    </head>
    <body>
        <div class="title">佳木斯大学学生管理系统</div>
    	<div class="left-tit"><b>员工<?php echo $_POST['tno']?>,欢迎登录佳木斯大学学生管理系统!</b></div>
    	<div class="fresh" onclick="fresh()">刷新</div>
    	<div class="cenline">
    	    <div class="stuinfo">学生管理</div>
    	    <div class="stutable">
    	        <?php

                 error_reporting(E_ALL ^ E_DEPRECATED);
                  $con = mysql_connect("localhost","root","");
                 if (!$con)
                   {
                   die('Could not connect: ' . mysql_error());
                   }
                 mysql_query("set character set 'utf8'");
                 mysql_query("set names 'utf8'");
                 mysql_select_db("student", $con);

                 $result = mysql_query("SELECT * FROM teacher");

                 while($row = mysql_fetch_array($result))
                   {
                     if( $row['tno'] == $_POST['tno'])
                         {
                         if( $row['password'] == $_POST['password'])
                             {
                                 $result = mysql_query("SELECT * FROM student");

                                 echo "<table border='0' cellspacing='1'>
                                 <tr>

                                 <th>学号</th>
                                 <th>性别</th>
                                 <th>年级</th>
                                 <th>性别</th>
                                 <th>操作</th>

                                 </tr><form action='delfresh.php' method='post'>";

                                 while($row = mysql_fetch_array($result))
                                   {
                                   echo "<tr>";

                                   echo "<td>"  .$row['sno'] . "</td>";
                                   echo "<td>" . $row['name'] . "</td>";
                                   echo "<td>" . $row['grade'] . "</td>";
                                   echo "<td>" . $row['sex'] . "</td>";
                                   echo "<td>" . "<input type='checkbox'  name='num' value=' " .$row['sno'] ."' >". "</td>";
                                   echo "</tr>";
                                   }
                                 echo "</table>";
                                   echo  "<div class='delbutton'><input type='submit'  value='删除' class='button'></div>";
                                   echo "</form>";
                                   
                                 break;
                              }
                              else {
                             header("location:ind.html");

                              }
                         }

                 }
                    mysql_close($con);
                    ?>
    	    </div>
    	</div>
    	<div class="markinfo">成绩管理</div>
    	<div class="marktable">
    	    <?php

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

                                             echo "<div class='instable'>  <table border='0' cellspacing='1'>
                                             <tr>
                                             <th>学号</th>
                                             <th>姓名</th>
                                             <th>英语</th>
                                             <th>Java</th>
                                             <th>数学</th>
                                             </tr><form action='markchange.php' method='post'>";

                             while($row = mysql_fetch_array($result))
                             {


                                    echo "<tr>";
                                    echo "<td>"  .$row['sno'] . "</td>";
                                   echo "<td>" . $row['name'] . "</td>";
                                    echo "<td>"  .$row['English'] . "</td>";
                                     echo "<td>" . $row['Java'] . "</td>";
                                    echo "<td>"  .$row['Maths'] . "</td>";
                                    echo "</tr>";

                             }

                              echo "</table>";
                              echo "<div class='markbot'>
                              <span id='span'>成绩修改</span><br>
                              学号：<input type='text' name='pernum' ><br>
                              英语：<input type='text' name='english' ><br>
                              Java：<input type='text' name='java' ><br>
                              数学：<input type='text' name='maths' ><br>
                               <div class='insure'><input type='submit'   value='确认修改' class='button'></div>
                               </div>";
                             echo "</form></div>";

                             mysql_close($con);
             ?>
    	</div>
    </body>

    </html>



<script type="text/javascript">
  function fresh(){

       window.location.reload();

     }



 	</script>
