<? include 'includes.php'; printheader(); ?>
<table border=0>
<tr>
<td class='catname'>Category Name</td>
<td class='catname'>Auction Title</td>
<td class='catname'>Auction Description</td>
<td class='catname'>Start Time</td>
<td class='catname'>End Time</td>
<td class='catname'>Starting Bid</td>
<td class='catname'>Seller</td>
</tr>

<?
$where = '1 = 1';

$id = $_GET['id'];
if (is_numeric($id))
{
  $where = " c.id = $id ";
}
$q = "SELECT a.id as auctionid, c.id, c.name, a.title, a.description, a.useridcreated, a.starttime, a.endtime, a.startingbid, u.username FROM category c, auction a, users u WHERE (c.id = a.categoryid) AND (u.id = a.useridcreated) AND $where ORDER BY c.name, u.username, a.title";
$res = pg_query($conn, $q);
for ($i = 0; $i < pg_numrows($res); ++$i)
{
  $obj = pg_fetch_object($res, $i);
  echo "<tr>\n";
  //echo "<td><a class='link' href='category_item_list.php?id=$obj->id'>$obj->name</a></td>\n";
  echo "<td>$obj->name</td>\n";
  echo "<td><a class='link' href='auction_details.php?id=$obj->auctionid'>$obj->title</a></td>\n";
  echo "<td>$obj->description</td><td>$obj->starttime</td>\n";
  echo "<td>$obj->endtime</td>";
  echo "<td><span class='money'>$$obj->startingbid</span></td>\n";
  echo "<td>$obj->username</td></tr>\n";
  //echo "<tr><td> </td><td></td><td></td><td></td><td></td><td></td><td></td></tr>\n";
  //echo "<tr><td> </td><td></td><td></td><td></td><td></td><td></td><td></td></tr>\n";
  echo "<tr><td>";
  //echo "<hr align='right' width='0' noshade='noshade' class='hrline'>";
  echo "<br>";
  echo "</td></tr>\n";
}

?>
</table>



<? printfooter(); ?>
