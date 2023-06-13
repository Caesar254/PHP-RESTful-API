<?php

header('Contenet_Type :application/json');

require_once 'connection.php';

$response = array();

// movie title was provided through get request
if(isset($_GET['title'])){
    //go ahead and gt the movie
    $title = $_GET['title']; // get requet parameter which has title 
    $stmt = $con->prepare("SELECT id , title, storyline, lang, genre, release_date, box_office, run_time, stars
                         FROM movies WHERE  title = ?");

    $stmt->bind_param("s", $title);
    
    if($stmt->execute()){
        //success
        $stmt->bind_result($id, $title, $storyline, $lang, $genre, $release_date, $box_office,$run_time, $stars);
        $stmt->fetch();

        $movie =array(
            'id'=> $id,
            'title'=> $title,
            'storyline'=> $storyline,
            'lang'=> $lang,
            'genre'=> $genre,
            'release_date'=> $release_date,
            'box_office'=> $box_office,
            'stars'=> $stars,
        );

        $response['error'] = false;
        $response['movie'] = $movie;
        $response['message'] = "Movie has been returned succesfully";



    }else{
        //failure
        $response['error'] = true;
        $response['message'] = "We could not get the movie";
    }

    
}else{
    // no movie title was provided, we cannot get the movie
    $response['error'] = true;
    $response['message'] = "Please provide a movie title";

}

echo json_encode($response);
?>