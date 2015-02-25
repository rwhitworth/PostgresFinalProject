<? include 'includes.php'; printheader(); ?>
Users:
<table border=1>
<tr>
<td class='catname'>ID</td>
<td class='catname'>Username</td>
<td class='catname'>Realname</td>
<td class='catname'>Password</td>
<td class='catname'>Address1</td>
<td class='catname'>Address2</td>
<td class='catname'>CCNum</td>
<td class='catname'>CCV2</td>
</tr>
<?
//error_reporting(E_ALL ^ E_NOTICE);
$q = "SELECT id, username, realname, password, address1, address2, ccnum, ccv2 FROM users ORDER BY id";
$res = pg_query($conn, $q);
for ($i = 0; $i < pg_numrows($res); ++$i)
{
  $obj = pg_fetch_object($res, $i);
  echo "<tr><td>$obj->id</td><td>$obj->username</td>\n";
  echo "<td>$obj->realname</td><td>$obj->password</td>\n";
  echo "<td>$obj->address1</td><td>$obj->address2</td>\n";
  echo "<td>$obj->ccnum</td><td>$obj->ccv2</td></tr>\n";
}

?>
</table>

<br><br>
Auctions:
<table border=1>
<tr>
<td class='catname'>ID</td>
<td class='catname'>Title</td>
<td class='catname'>Description</td>
<td class='catname'>UserID Created</td>
<td class='catname'>Start Time</td>
<td class='catname'>End Time</td>
<td class='catname'>Start Bid</td>
<td class='catname'>Category ID</td>
<td class='catname'>ImageURL</td>
</tr>

<?

//$q = "SELECT * FROM auction ORDER BY id";
$q = "SELECT id, title, description, useridcreated, starttime, endtime, startingbid, categoryid, imageurl FROM auction ORDER BY id";
$res = pg_query($conn, $q);
for ($i = 0; $i < pg_numrows($res); ++$i)
{
  $obj = pg_fetch_object($res, $i);
  echo "<tr><td>$obj->id</td><td class='smallfont'>$obj->title</td>\n";
  echo "<td class='smallfont'>$obj->description</td><td>$obj->useridcreated</td>\n";
  echo "<td class='smallfont'>$obj->starttime</td><td class='smallfont'>$obj->endtime</td>\n";
  echo "<td><span class='money'>$$obj->startingbid</span></td>";
  echo "<td>$obj->categoryid</td>\n";
  echo "<td><a class='link' href='$obj->imageurl'>$obj->imageurl</a></td></tr>\n";
}

?>
</table>

<br><br>
Bids:
<table border=1>
<tr>
<td class='catname'>ID</td>
<td class='catname'>AuctionID</td>
<td class='catname'>Bid</td>
<td class='catname'>CurrentDate</td>
</tr>
<?
$q = "SELECT * FROM bids ORDER BY id";
$res = pg_query($conn, $q);
for ($i = 0; $i < pg_numrows($res); ++$i)
{
  $obj = pg_fetch_object($res, $i);
  echo "<tr><td>$obj->id</td><td>$obj->auctionid</td>\n";
  echo "<td><span class='money'>$$obj->bid</span></td>";
  echo "<td>$obj->currentdate</td>\n";
}

?>
</table>



<br><br>
Category:
<table border=1>
<tr>
<td class='catname'>ID</td>
<td class='catname'>Name</td>
</tr>
<?
$q = "SELECT * FROM category ORDER BY id";
$res = pg_query($conn, $q);
for ($i = 0; $i < pg_numrows($res); ++$i)
{
  $obj = pg_fetch_object($res, $i);
  echo "<tr><td>$obj->id</td><td>$obj->name</td>\n";
}

?>
</table>

<? printfooter(); ?>
