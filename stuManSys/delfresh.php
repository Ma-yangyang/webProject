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

                  $result = mysql_query("SELECT * FROM student");

                  while($row = mysql_fetch_array($result))

                    {

                         mysql_query("DELETE FROM student WHERE sno = $_POST[num]");



                          }
                          echo "<script> window.history.back(-1); </script>";

                          mysql_close($con);



?>