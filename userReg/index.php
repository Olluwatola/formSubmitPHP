<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserReg</title>
    <link rel="stylesheet" href="pj_style.css">
</head>

<body>
  <nav id='navdiv'>
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
  <div id="form_div">
    <img src="ppic.png" alt="ppic" style="margin-left:20px;margin-top:20px;width:110px; border-radius:50%;"><div>
        <form action="submit-form.php" method="post" onsubmit="return validateForm()">
        <div><label for="name">Name</label></div>
        <div><input type="text" id="name" name="name" ></div>
        <hr>

        <div><label for="email">Email</label></div>
        <div><input type="text" id="email" name="email" ></div>
        <hr>
        <div><label for="password">Password</label></div>
        <div><input type="text" id="password" name="password" ></div>
        <hr>
        <div><label for="phone">Phone Number</label></div>
        <div><input type="text" id="phone" name="phone" ></div>
        <hr>
        <div><label for="gender">Gender</label></div>
        <div><label><input type="radio" name="gender" value="male" >Male</label>
        <label><input type="radio" name="gender" value="female" >Female</label></div>
        <hr>
        <div><label for="language">Language</label></div>
        
        <div><select id="language" name="language" ></div>
        <option value="">--Please select--</option>
        <?php
              require_once 'db-config.php'; // import the database credentials


              $sql = "SELECT * FROM languages";
              $result = mysqli_query($connection, $sql);

              if (mysqli_num_rows($result) > 0) {
                  while ($row = mysqli_fetch_assoc($result)) {
                      $languages_records[] = $row;
                      // loop through each user record and display their information   
                  }
                  foreach ($languages_records as $languages) {
                      
                      echo "<option value='". $languages['name'] ."'>" . $languages['name'] . "</option>";

                  }
              } else {
                  echo "No records found";
              }
              
              

              ?>
          
        </select>
        <hr>
        <div><label for="zip">Zip Code</label></div>
        <div><input type="text" id="zip" name="zip" ></div>
        <hr>                
        <div><label for="about">About</label></div>
        <div><textarea id="about" name="about" rows="4"></textarea></div>
        <hr>
        <div><input type="submit" id="submitButton" value="Submit"></div>
      </form>
    </div>

<script type="text/javascript">

  function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var phone = document.getElementById("phone").value;
    var gender = document.getElementsByName("gender");
    var language = document.getElementById("language").value;
    var zip = document.getElementById("zip").value;
    var about = document.getElementById("about").value;

    // check if all fields are filled
    if (name == "" || email == "" || password == "" || phone == "" || language == "" || zip == "" || about == "") {
      alert("Please fill in all fields");
      return false;
    }

    // check if gender is selected
    var genderChecked = false;
    for (var i = 0; i < gender.length; i++) {
      if (gender[i].checked) {
        genderChecked = true;
        break;
      }
    }
    if (!genderChecked) {
      alert("Please select your gender");
      return false;
    }
    
    // form is valid, submit it
    return true;
  }
</script>

</body>
</html>