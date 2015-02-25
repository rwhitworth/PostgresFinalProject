<?
include 'includes.php';
printheader();

if (!isset($_GET['username']))
{
  echo "<h1>Add User</h1>\n";
  echo "<form action='add_user.php' method='get'>\n";
  echo "<table border=0>\n";
  echo "<tr><td>Username: </td><td><input class='textbox' type='textbox' name='username'></td></tr>\n";
  echo "<tr><td>Real Name: </td><td><input class='textbox' type='textbox' name='realname'></td></tr>\n";
  echo "<tr><td>Password: </td><td><input class='textbox' type='password' name='password'></td></tr>\n";
  echo "<tr><td>Address Line 1: </td><td><input class='textbox' type='textbox' name='address1'></td></tr>\n";
  echo "<tr><td>Address Line 2: </td><td><input class='textbox' type='textbox' name='address2'></td></tr>\n";
  echo "<tr><td><input class='textbox' type='submit' value='Create User'></td><td align='right'><input class='textbox' type='reset'></td></tr>\n";
  echo "</table>\n";
  echo "</form>\n";
}
else
{
  $username = $_GET['username'];
  $realname = $_GET['realname'];
  $password = $_GET['password'];
  $address1 = $_GET['address1'];
  $address2 = $_GET['address2'];
  $q = "SELECT * FROM Users WHERE lower(username)='" . strtolower($username) . "'";
  $res = pg_query($conn, $q);
  if (pg_numrows($res) >= 1)
  {
    echo "ERROR! Username $username already exists<br>\n";
  }
  else
  {
    $q = "INSERT INTO Users (Username, Realname, Password, Address1, Address2) VALUES ('$username', '$realname', '$password', '$address1', '$address2')";
    pg_query($conn, $q);
    if (pg_numrows($res) == 1)
    {
      echo "Successfully created $username<br>\n";
    }
    else 
    { 
      //echo "ERROR! Creating username $username : " . pg_last_error() . "<br>\n";    
      echo "Successfully created $username<br>\n";
    }
  }
}


printfooter();
?>
