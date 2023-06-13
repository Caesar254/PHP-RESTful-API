<?php 
header('Contenet_Type :application/json');

require_once 'connection.php';

$response = array();

$stmt = $con ->prepare("SELECT * FROM movies");

if ($stmt->execute()){

    //if statemnt was executed successfully, this array stores all th results
    $movies = array();
    // get all movies from db
    $result = $stmt->get_result();

    //loop and get each single row

    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $movies[]= $row;
    }
    $response['error'] = false;
    $response['movies'] = $movies;
    $response['message'] = "movies returned successfully";
    $stmt->close();

}else{

    $response['error'] = true;
    $response['message' ] = "could not execute query";
}

//display results
echo json_encode($response);


?>