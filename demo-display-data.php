<?php
include('inc/config.php');

$result = $db->query('SELECT * FROM tblskills');
while ($row = $result->fetchArray()) {
    echo "<p>".$row['skill']."</p>";
}
?>
