<?php
    $data=file_get_contents("http://localhost/api/product/read.php", true);
    
    $arr = json_decode($data, true);
    //echo print_r($arr);
    if (count($arr)) {
        // Open the table
        echo "<table>";

        // Cycle through the array
        foreach ($arr as $member) {

            // Output a row
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['name'] . "</td>";
            echo "</tr>";
        }

        // Close the table
        echo "</table>";
    }
?>