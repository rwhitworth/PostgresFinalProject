<? include 'includes.php'; printheader(); ?>

<?
$id = $_GET['id'];

$q = "SELECT now() as nowtime, a.id, a.title, a.description, a.starttime, a.endtime, a.startingbid,a.imageurl, b.bid, b.userid as biduserid, c.name, u.username, u.realname, uu.username as hbusername, uu.realname as hbrealname FROM auction a, users u, category c, bids b, users uu WHERE (b.auctionid = a.id) AND (c.id = a.categoryid) AND (u.id = a.useridcreated) AND (uu.id = b.UserID) AND ($id = a.id) ORDER BY b.currentdate DESC LIMIT 1";


echo "<table border=0>\n";
echo "<tr><td width='50%'>\n";

$res = pg_query($conn, $q);
echo "<h1>" . pg_last_error($conn) . "</h1>";

for ($i = 0; $i < pg_numrows($res); ++$i)
{
  $obj = pg_fetch_object($res, $i);
  echo "<h1>" . pg_last_error($conn) . "</h1>";

  $bid = $obj->bid;
  $biduserid = $obj->biduserid; 
  $aendtime = $obj->endtime;
  $auctionid = $id;
  $imageurl = $obj->imageurl;
  $nowtime = $obj->nowtime;
  echo "<h1>$obj->title</h1>\n";
  echo "<p>$obj->description</p>\n";
  echo "<p><br><br></p>";
  echo "<p>Item listed by: $obj->realname, highest bidder: $obj->hbrealname</p>\n";
}

echo "<table border=0>\n";
echo "<tr><td>Current time is: </td><td>" . substr($nowtime, 0, 19) . "</td></tr>\n";
echo "<tr><td>Last bid accepted at: </td><td>$aendtime</td></tr>\n";
echo "</table>\n";

?>


<?
$q = "select id from auction where id = $id and (endtime > now());";
$res = pg_query($conn, $q);
if (pg_numrows($res) == 1)
{

if (is_logged_in()==false)
{
  // durrr...
  echo "<p>Bid is currently at <span class='money'>$" . $bid . "</span><br>\n";
  echo "You must log in to bid on this item.</p>\n";
}
if ((is_logged_in() == true) and ($_COOKIE['id'] != $biduserid))
{
  echo "<form action='add_bid.php' method='get'>\n";
  echo "Current Bid:<span class='money'>$$bid</span>\n";
  echo "<br>";
  echo "New Bid: <input type='text' name='bid' size='10' value='";
  $minbid = $bid + 0.01;
  echo $minbid;
  echo "'>\n";
  echo "<br>";
  echo "<input type='hidden' name='auctionid' value ='$auctionid'>\n";
  echo "<input type='hidden' name='minbid' value='$minbid'>\n";
  echo "<input type='submit' value='Place Bid!'>\n";
  echo "</form>\n";
}
if ((is_logged_in() == true) and ($_COOKIE['id'] == $biduserid))
{
  echo "<p>You are the highest bidder on this item!<br></p>\n";
}

}
else
{
  //time is up, no more bids!
  echo "No more bids can be made on this item!<br>\n";
  echo "Item was won by $obj->hbrealname<br>\n";
}

echo "</td>\n";
echo "<td width='50%'>";
if ($imageurl != "")
{
  echo "<img src='$imageurl'>";
}
echo "</td></tr>\n</table>\n";

printfooter();
?>
