<?php 
header('Contenet_Type :application/json');

require_once 'connection.php';

$response = array();

if(isset($_POST['id']) && isset($_POST['storyline']) && isset($_POST['stars'])

&& isset($_POST['box_office'])){

    //update movie
    $id = $_POST['id'];
    $storyline = $_POST['storyline'];
    $stars = $_POST['stars'];
    $box_office = $_POST['box_office'];


    $stmt = $con->prepare("UPDATE movies SET storyline = '$storyline', stars = '$stars',
    
                    box_office ='$box_office' WHERE id='$id'");

                    if($stmt->execute()){
                        $response['error'] = false;
                        $response['message'] = "Movie has been updated succefully";
                        
                    }else{
                        $response['error'] = true;
                        $response['message'] = "Failed to update movie";
                    }





}else{
    //we do not hav info to update
    $response['error'] = true;
    $response['message'] = "Provide id, storyline, box_office and starts to update";



}
echo json_encode($response)






?>