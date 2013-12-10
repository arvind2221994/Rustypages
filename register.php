<?php
include 'db_connect.php';
 
$error_msg = "";

if (isset($_POST['username'], $_POST['name'], $_POST['roll_no'], $_POST['hostel'], $_POST['email'], $_POST['password'])) {
    // Sanitize and validate the data passed in
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $roll_no = filter_input(INPUT_POST, 'roll_no', FILTER_SANITIZE_STRING);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">The email address you entered is not valid</p>';
    }
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password = hash("sha256", $password);
    if (strlen($password) != 64) {
        // The hashed pwd should be 64 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
      var_dump($password);
          
 
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //

    $prep_stmt = "SELECT uuid FROM users WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
        //$a = $stmt->num_rows;
        //$a = $stmt->fetch();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
        }
    }
 
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
              

    if (empty($error_msg)) {
        // Create a random salt
        $random_salt = hash('sha256',mcrypt_create_iv(16,MCRYPT_DEV_URANDOM ));

        // Create salted password 
        $password = hash('sha256', $password . $random_salt);
        $uuid = uniqid("",TRUE); //length=23
        

        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO users (
                uuid, username, email, roll_no, password, salt
        ) VALUES (?, ?, ?, ?, ?, ?)")) {
 
            $insert_stmt->bind_param('ssssss',
                    $uuid,
                    $username,
                    $email,
                    $roll_no,
                    $password,
                    $random_salt);
 
            // Execute the prepared query.
            $insert_stmt->execute();
        }
        header('Location: ./register_success.php');
    }
}
