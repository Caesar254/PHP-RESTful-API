<?php
header('Contenet_Type :application/json');

require_once 'connection.php';

$response = array();

if(isset($_POST['id'])   ){
    //move on and dlet the movie
    $id = $_POST['id'];

    $stmt=$con->prepare("DELETE FROM movies WHERE id=? LIMIT 1");
    $stmt-> bind_param('i', $id);

    if($stmt->execute()){
        //success
        $response['error'] = false;
        $response['message'] = "Movie has been deleted succefully";
    }else{
        $response['error'] = true;
        $response['message'] = "Failed to remove movie";


    }



}else{
    // we cannot delete th emovie because we do not know which movie to delete
    $response['error'] = true;
    $response['message'] = "PLease provide the movie id";

}
echo json_encode($response);






?>