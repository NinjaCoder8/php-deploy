<?php

include("connection/connection.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    $id = -1;
}

if($id == -1){
    $query = $mysqli->prepare("SELECT * FROM articles");
}else{
    $query = $mysqli->prepare("SELECT * FROM articles WHERE id = ?");
    $query->bind_param("i", $id);
}

$query->execute();

$array = $query->get_result();

$response = [];
while($article = $array->fetch_assoc()){
    $response[] = $article;
}

echo json_encode($response);

?>