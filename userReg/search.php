<?php
require_once 'db-config.php'; // import the database credentials



// Retrieve the form data using the $_POST superglobal
$search = $_POST['search_term'];

// Query the database for matching records
$sql = "SELECT * FROM users WHERE name LIKE '%$search%'";
$result = mysqli_query($connection, $sql);


// convert the query results to a JSON string and urlencode it
$query_results_json = urlencode(json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC)));

// redirect to another file with the query results in the URL
header("Location: searchrespage.php?query_results={$query_results_json}");



?>