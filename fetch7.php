<?php
$data=file_get_contents("php://input");
if($data){
    $jsonArray=json_decode($data,true);
    if($jsonArray["search"]){
        $search=$jsonArray["search"];
        $query=$jsonArray["q"];
        $con=mysqli_connect("localhost","root","","phpAjax");
        $q="select * from Student1 where name LIKE '%{$query}%'";//
        $q_exe=mysqli_query($con,$q);
        echo "<table><tr><th>id</th><th>name</th><th>email</th><th>password</th></tr>";
        while($r=mysqli_fetch_assoc($q_exe)){
            echo "<tr><td>{$r['id']}</td><td>{$r['name']}</td><td>{$r['email']}</td><td>{$r['password']}</td></tr>"; 
        }
        echo "</table>";
    }
}
?>