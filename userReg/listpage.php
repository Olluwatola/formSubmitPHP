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
        require_once 'db-config.php'; // import the database credentials


        $sql = "SELECT * FROM users";
        $result = mysqli_query($connection, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $user_records[] = $row;
                // loop through each user record and display their information   
            }
            foreach ($user_records as $user) {
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

    <?php
        
        mysqli_close($connection);
        
    ?>
</body>
</html>