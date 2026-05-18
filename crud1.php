<?php
if(isset($_POST["insert"])){
$id=$_POST["id"];
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];

$con=mysqli_connect("localhost","root","");

$db=mysqli_query($con,"create database if not exists phpAjax");

$selectdb=mysqli_select_db($con,"phpAjax");

if($selectdb)
    {
        echo "database connected" . PHP_EOL;
    }

$create="create table if not exists crud1(
                    id int primary key,
                    name varchar(20),
                    email varchar(50),
                    password int not null)";

$checkTable=mysqli_query($con,$create);

if($checkTable){
    echo "table is created". PHP_EOL;
}

$insert="insert into crud1 values('{$id}','{$name}','{$email}','{$password}')";
$insert_exe=mysqli_query($con,$insert);
if($insert_exe){
    echo "inserted succussfully" . PHP_EOL;
}

}


if(isset($_POST["view"])){
$con=mysqli_connect("localhost","root","","phpAjax");
$q="select * from crud1";
$select=mysqli_query($con,$q);
if($select){
    echo "<table><tr><th>id</th><th>name</th><th>email</th><th>password</th></tr>";
    while($r=mysqli_fetch_assoc($select)){
        echo "<tr><td>{$r['id']}</td><td>{$r['name']}</td><td>{$r['email']}</td><td>{$r['password']}</td></tr>";
    }
    echo "</table>";
}

}




if(isset($_POST["update"])){
    $con=mysqli_connect("localhost","root","","phpAjax");
    $id=$_POST["id"];
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $q="update crud1 set name='{$name}',email='{$email}',password='{$password}'
        where id='{$id}'";
    $q_exe=mysqli_query($con,$q);
    if($q_exe){
        echo "student successfully updated";

    }
}
 if(isset($_POST["delete"])){
        $con=mysqli_connect("localhost","root","","phpAjax");
        $id=$_POST["id"];
        $q="delete from crud1 where id='{$id}'";
        $q_exe=mysqli_query($con,$q);
        if($q_exe){
            echo "deleted successfully";
        }
        else{
            echo "query is not running";
        }
    }
?>