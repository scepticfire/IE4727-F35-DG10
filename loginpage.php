<?php
include "database_connect.php";

session_start();

if (isset($_POST['username']) && isset($_POST['password']))
{
  //they have just tried to log in
  $username = $_POST['username'];
  $password = $_POST['password'];

  $password = password_hash($password, PASSWORD_DEFAULT);
  //check database to see if username and password are valid
    $query = 'select * from registered_users '
            ."where username = '$username' "
            ."and password = '$password'";

    $result = db->query($query);
    if($result->num_rows >0)
    {
        //found registered user
        $_SESSION['registered_user'] = $username;
    }
    $db->close();

}
?>

<html>
<body>
<h1>Log in Page</h1>
<?php
  if (isset($_SESSION['valid_user']))
  {
    echo 'You are logged in as: '.$_SESSION['valid_user'].' <br />';
    echo '<a href="logout.php">Log out</a><br />';
  }
  else
  {
    if (isset($userid))
    {
      //if they've tried and failed to log in
      echo 'Could not log you in.<br />';
    }
    else 
    {
      //they have not tried to log in yet or have logged out
      echo 'You are not logged in.<br />';
    }

    //form to log in 
    echo '<form method="post" action="loginpage.php">';
    echo 'Username:<br/>
        <input type="text" name="username" id="username" required>
        <br /><br />';
    echo 'Password:<br/>
        <input type="password" name="password" id="password" required><br /><br />'; 
  }
?>
<br />
<a href="newbook.html">Add books</a>
</body>
</html>