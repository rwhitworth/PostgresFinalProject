<? include 'includes.php'; printheader(); ?>

<h1>Items Still For Sale</h1>

<table border=1>
<tr>
<td class='catname'>ID</td>
<td class='catname'>Title</td>
<td class='catname'>Description</td>
<td class='catname'>Start Time</td>
<td class='catname'>End Time</td>
<td class='catname'>Start Bid</td>
<td class='catname'>Current Bid</td>
<td class='catname'>Last Bid Date</td>
<td class='catname'>Current Winner</td>
</tr>

<?

//$q = "SELECT * FROM auction ORDER BY id";
$id = $_COOKIE['id'];
$q = "SELECT u.username, a.id, a.title, a.description, a.useridcreated, a.starttime, a.endtime, a.startingbid, a.categoryid, a.imageurl, b.id as bbid, b.bid, b.currentdate FROM auction a, bids b INNER JOIN users u ON (u.id = b.Userid) WHERE (a.id = b.auctionid) AND (a.endtime > now()) AND (b.bid = (SELECT max(bid) FROM Bids WHERE AuctionID = a.id)) ORDER BY b.currentdate DESC, a.id";
$res = pg_query($conn, $q);
for ($i = 0; $i < pg_numrows($res); ++$i)
{
  $obj = pg_fetch_object($res, $i);
  $bidamount = $obj->bid;
  $bidid = $obj->bbid;
  $bidcurrentdate = $obj->currentdate;
  $username = $obj->username;
  echo "<tr><td>$obj->id</td><td class='smallfont'>$obj->title</td>\n";
  echo "<td class='smallfont'>$obj->description</td>\n";
  //echo "<td>$obj->useridcreated</td>\n";
  echo "<td class='smallfont'>$obj->starttime</td><td class='smallfont'>$obj->endtime</td>\n";
  echo "<td><span class='money'>$$obj->startingbid</span></td>";
  echo "<td><span class='money'>$$bidamount</span></td>\n";
  echo "<td><span class='smallfont'>" . substr($bidcurrentdate, 0, 19) . "</span></td>\n";
  echo "<td><span class='smallfont'>$username</span></td>\n";
  echo "</tr>\n";
}

?>
</table>


<? printfooter(); ?>
