<? include 'includes.php'; printheader(); ?>
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
  echo "<tr><td><a class='link' href='category_item_list.php?id=$obj->id'>$obj->id</a></td><td><a class='link' href='category_item_list.php?id=$obj->id'>$obj->name</a></td>\n";
}

?>
</table>
<? printfooter(); ?>
