<?php 
require "../__auth/__config/config.php";

// Check if categories exist
if ($result->num_rows > 0) {
    // Loop through each category and create an option element
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['CategoryID'] . "'>" . $row['CategoryName'] . "</option>";
    }
}
// Close the database connection
$mysqli->close();
?>