<?php
include('inc/config.php');

$response = array('success' => false, 'message' => '');

if(isset($_POST['skill'])) {
    $count = count($_POST["skill"]);
    $skill = $_POST["skill"];
    if($count > 0) {
        $db->exec('BEGIN TRANSACTION');
        for($i=0; $i<$count; $i++) {
            if(trim($skill[$i] != '')) {
                $sql = $db->prepare("INSERT INTO tblskills(skill) VALUES(:skill)");
                $sql->bindValue(':skill', $skill[$i]);
                $sql->execute();
            }
        }
        $db->exec('COMMIT');
        $response['success'] = true;
        $response['message'] = 'Skills inserted successfully';
    } else {
        $response['message'] = 'Please enter skill';
    }
}

echo json_encode($response);
?>