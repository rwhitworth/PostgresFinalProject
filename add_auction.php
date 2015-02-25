<?
include 'includes.php';
printheader();


if (
($_COOKIE['logged_in'] == 0)
)
{
  echo "<h2>Error adding auction.  You must be logged in.</h2>\n";
}

if (
($_GET['endtime'] == "") or 
($_GET['title'] == "") or 
($_GET['description'] == "") or
($_GET['startingbid'] == "") or
($_GET['category'] == "") or
($_GET['endtime'] == "")
)
{
  echo "<h2>You must fill in all fields, except ImageURL</h1>\n";
}



if (
($_GET['endtime'] == "") or 
($_GET['title'] == "") or 
($_GET['description'] == "") or
($_GET['startingbid'] == "") or
($_GET['category'] == "") or
($_GET['endtime'] == "") or
($_COOKIE['logged_in'] == 0)
)
{
  echo "<h1>Add Auction</h1>\n";
  echo "<form action='add_auction.php' method='get'>\n";
  echo "<table border=0>\n";
  echo "<tr><td>Auction Title: </td><td><input class='textbox' type='textbox' size=70 name='title'></td></tr>\n";
  echo "<tr><td>Description: </td><td><textarea class='textbox' cols='60' rows='8' name='description'></textarea></td></tr>\n";
  echo "<tr><td>End Time <span class='smallfont'>(YYYY-MM-DD HH:MM:SS)</span>: </td><td><input class='textbox' type='textbox' size=19 name='endtime'></td></tr>\n";
  echo "<tr><td>Starting Bid: </td><td><input class='textbox' type='textbox' size=19 name='startingbid'></td></tr>\n";
  //echo "<tr><td>Category: </td><td><input type='textbox' name='category'></td></tr>\n";
  echo "<tr><td>Category: </td><td>\n";
  echo "<select class='textbox' name='category'>\n";

  $q = "SELECT id, name FROM Category";
  $res = pg_query($conn, $q);
  for ($i = 0; $i < pg_numrows($res); ++$i)
  {
    $obj = pg_fetch_object($res, $i);
    echo "<option value='$obj->id'>$obj->name</option>\n"; 
  }
  echo "</select></td></tr>\n";

  echo "<tr><td>Image URL (blank for none): </td><td><input class='textbox' type='textbox' size=70 name='imageurl'></td></tr>\n";
  echo "</table>\n";
  echo "<input class='textbox' type='submit' value='Create Auction'><input class='textbox' type='reset'>\n";
  echo "</form>\n";
}
else
{
  $title = $_GET['title'];
  $description = $_GET['description'];
  $endtime = $_GET['endtime'];
  $useridcreated = $_COOKIE['id'];
  $startingbid = $_GET['startingbid'];
  $categoryid = $_GET['category'];
  $imageurl = $_GET['imageurl'];

  //$q = "INSERT INTO Users (Username, Realname, Password, Address1, Address2) VALUES ('$username', '$realname', '$password', '$address1', '$address2')";
  $q = "INSERT INTO Auction (title, description, useridcreated, starttime, endtime, startingbid, categoryid, imageurl) VALUES ('$title', '" . addslashes($description) . "', $useridcreated, now(), '$endtime', $startingbid, $categoryid, '$imageurl')";
  $res = pg_query($conn, $q);
  if (pg_numrows($res) == 1)
  {
    echo "Successfully created auction for item $title<br>\n";
  }
  else 
  { 
    //echo "ERROR! Creating username $username : " . pg_last_error() . "<br>\n";    
    echo "Successfully created $username<br>\n";
  }
  $q = "INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate) VALUES ((SELECT id FROM Auction WHERE useridcreated=$useridcreated AND startingbid=$startingbid AND categoryid=$categoryid AND imageurl='$imageurl' AND description='" . addslashes($description) . "' ORDER BY starttime DESC LIMIT 1), $useridcreated, $startingbid, now())";
  pg_query($conn, $q);
}


printfooter();
?>
