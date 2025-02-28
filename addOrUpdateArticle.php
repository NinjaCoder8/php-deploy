<?php

include("connection/connection.php");

if(isset($_GET["id"]) && $_GET["id"] == "add"){
    $is_new = true;
}else if(isset($_GET["id"])){
    $is_new = false;
}else{
    $response = [];
    $response["success"] = false;
    $response["message"] = "Invalid Get Parameter";
    echo json_encode($response);
    return;
}

if(isset($_POST["name"])){
    $article_name = $_POST["name"];
}else{
    $response = [];
    $response["success"] = false;
    $response["message"] = "Missing Name Parameter";
    echo json_encode($response);
    return;
}

if(isset($_POST["author"])){
    $author_name = $_POST["author"];
}else{
    $response = [];
    $response["success"] = false;
    $response["message"] = "Missing Author Parameter";
    echo json_encode($response);
    return;
}

if(isset($_POST["subject"])){
    $subject = $_POST["subject"];
}else{
    $response = [];
    $response["success"] = false;
    $response["message"] = "Missing Subject Parameter";
    echo json_encode($response);
    return;
}

if($is_new){
    $query = $mysqli->prepare("INSERT INTO articles(name, author_name, subject) VALUES (?, ?, ?)");
    $query->bind_param("sss",  $article_name, $author_name, $subject);
    $query->execute();
    $response = [];
    $response["success"] = true;
    $response["message"] = "Article Created!";
    echo json_encode($response);
    return;
}else{
  $article_id = $_GET["id"];
    
}

?>