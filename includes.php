<?php
error_reporting(E_ALL ^ E_NOTICE);

function printheader()
{
  echo "<html><head>\n<link type='text/css' rel='stylesheet' href='style.css'>\n</head><body>\n";
  echo "<h2>Welcome to FakeEbay.com!</h2>\n";
?>
[ <a class='link' href="category_list.php">List Categories</a> | 
<a class='link' href="category_item_list.php">List Items Sorted by Category</a> |
<!-- <a class='link' href="auction_details.php">auction_details.php</a><br> -->
<a class='link' href="add_auction.php">Add Your Auction</a> |
<a class='link' href="add_category.php">Create a Category</a> ] </br>
[ <a class='link' href="view_purchased_items.php">Report: View Items You Purchased</a> |
<a class='link' href="view_forsale_items.php">Report: View Items Still For Sale</a> ]

[ <a class='link' href="add_user.php">Register as a User</a> | <a class='link' href='logout.php'>Logout</a> ] <br>
<?
  if ((isset($_COOKIE['logged_in'])) and ($_COOKIE['logged_in'] == 1))
  { 
    echo "Welcome, " . $_COOKIE['username'] . "!<br>\n";
    //echo "<form action='logout.php' method='post'>\n";
    //echo "<input class='textbox' type='submit' value='Log out'>\n";
    //echo "</form>\n";
  }
  else
  {
    echo "<table>"; //<tr><td>Log in</td></tr>\n";
    echo "<tr><td>\n";
    echo "<form action='login.php' method='post'>\n";
    echo "Username: \n";
    echo "<input class='textbox' type='text' name='username' />\n";
    echo "Password: \n";
    echo "<input class='textbox' type='password' name='password' />\n";
    echo "<input class='textbox' type='submit' value='Log in'>\n";
    echo "</form>\n";
    echo "</td></tr>\n";
    echo "</table>\n";
  }
  //echo "<a class='link' href='index.php'>Back to main page</a><br>\n";
  echo "<br><br>\n";
}

function printfooter()
{
echo "\n</body></html>";
}

$conn = pg_connect("host=localhost dbname=rwhitworth user=rwhitworth password=" . base64_decode('MTIzNDU2Nzg='));

function add_user($username, $realname, $password, $address1, $address2)
{
  $q = "INSERT INTO Users (username, realname, password, address1, address2) VALUES ('" . $username . "', '" . $realname . "', '" . $password . "', '" . $address1 . "', '" . $address2 . "');";
  $res = pg_query($conn, $q);
  if ($res) 
  {
    echo "$username added to database\n";
  }
  else
  {
    echo "Error adding $username to database\n";
  }
}

function is_logged_in()
{
  if ($_COOKIE['logged_in'] == 1)
  {
    return true;
  }
  else
  {
    return false;
  }
}

function log_out()
{
  $_COOKIE['logged_in'] = 0;
}


?>
