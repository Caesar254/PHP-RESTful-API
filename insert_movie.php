<?php

header('Contenet_Type :application/json');

require_once 'connection.php';

$response = array();


if(isset($_POST['title']) && isset($_POST['storyline']) && isset($_POST['lang'])
&& isset($_POST['genre']) && isset($_POST['release_date ']) && isset($_POST['box_office'])
&& isset($_POST['run_time']) && isset($_POST['stars']) ){

    //store all parmeters in variables
    $title = $_POST['title'];
    $storyline = $_POST['storyline'];
    $lang = $_POST['lang'];
    $genre = $_POST['genre'];
    $release_date = $_POST['release_date'];
    $box_office = $_POST['box_office'];
    $run_time = $_POST['run_time'];
    $stars = $_POST['stars'];

    // we have all our parameters
    $stmt = $con->prepare("INSERT INTO movies (title, storyline, lang, genre, release_date,box_office, run_time, stars)
                          VALUES(?,?,?,?,?,?,?,?)");
    $stmt->bind_param('sssssdsd',$title,$storyline,$lang,$genre,$release_date,$box_office,$run_time,$stars);
    
    
    //execute  query
    if ($stmt->execute()){
        //success
        $response['error'] = false;
        $response['message'] = "Movie has inserted succesfully";

        $stmt->close();
    }else{
        //failure
        $response['error'] = true;
        $response['message'] = "Failed to insert to the database";

    }



}else{

    //we camnot insert a movie without all this info
    $response['error'] = true;
    $response['message'] = "Please provide all parameters";

}

echo json_encode($response);

?>