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
                    $eng = $_POST['english'];
                    $jav = $_POST['java'];
                    $mat = $_POST['maths'];
                    $nures = $_POST['pernum'];
                  while($row = mysql_fetch_array($result)){
                     mysql_query("UPDATE mark SET English = '$eng',Java = '$jav',Maths = '$mat'
                     where sno = '$nures'");
                     }
                   mysql_close($con);
                   echo "<script> window.history.back(-1); </script>";

?>