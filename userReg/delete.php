<?php
require_once 'db-config.php'; // import the database credentials


if (isset($_GET['id'])) {
    $id = $_GET['id'];
}else {
    echo "No ID parameter provided";
    }

// Create the delete query
$sql = "DELETE FROM users WHERE id = $id";

if (mysqli_query($connection, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($connection);

// Redirect the user to a confirmation page
header('Location: listpage.php');

?>