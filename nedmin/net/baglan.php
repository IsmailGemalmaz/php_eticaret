<?php
    try{
       $hosts='localhost';
       $databasename='eticaret';
       $dbuser='root';
       $dbpass='root1234';
       $dsn="mysql:host=".$hosts.";dbname=".$databasename.";charset=utf8";

        $db=new PDO($dsn,$dbuser,$dbpass);
      //  echo "veri tabnına bağlandı";
    }catch(PDOexception $e){
       echo $e->getMessage();
    }
?> 