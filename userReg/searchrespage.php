<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserReg</title>
    <link rel="stylesheet" href="pj_style.css">
</head>
<body><nav id='navdiv'>
    <div><span>
      <a href="listpage.php">USERS</a>|
      <a href="index.php">REGISTER</a>
      <form method="post" action="search.php">
		<input type="text" name="search_term" placeholder="Enter search term">
		<button type="submit" name="submit">Search</button>
	</form>
</span>
    </div>
  </nav>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Gender</th>
            <th>Language</th>
            <th>Zip Code</th>
            <th>About</th>
            <th>---</th>
        </tr>
    </thead>
    <tbody>
        <?php

        
// decode the query results from the URL
$query_results_json = urldecode($_GET['query_results']);
$query_results = json_decode($query_results_json, true);

        if (count($query_results) > 0) {
            
            foreach ($query_results as $user) {
                echo "<tr>";
                echo "<td>" . $user['name'] . "</td>";
                echo "<td>" . $user['email'] . "</td>";
                echo "<td>" . $user['phoneNumber'] . "</td>";
                echo "<td>" . $user['gender'] . "</td>";
                echo "<td>" . $user['language'] . "</td>";
                echo "<td>" . $user['zipCode'] . "</td>";
                echo "<td>" . $user['about'] . "</td>";
                echo "<td><button><a href=/userReg/delete.php?id=" . $user['id'] . ">DELETE</button></td>";
                
                echo "</tr>";
            }
        } else {
            echo "No records found";
        }
        
        

        ?>
    </tbody>
</body>
</html>