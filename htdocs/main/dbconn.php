<?php
    //데이터 베이스 연결
    $connect=mysql_connect( "localhost", "root", "apmsetup") or  
        die( "cannot connect<br>"); 

    mysql_select_db("term_project",$connect);
    mysql_query("SET NAMES UTF8");
?>