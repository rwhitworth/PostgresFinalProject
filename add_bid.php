<?
include 'includes.php';

  $minbid = $_GET['minbid'];
  $auctionid = $_GET['auctionid'];
  $userid = $_COOKIE['id'];
  $bid = $_GET['bid'];
  $q = "INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate) VALUES ($auctionid, $userid, $bid, now())";

  $res = pg_query($conn, $q);
  if (pg_numrows($res) == 1)
  {
    $obj = pg_fetch_object($res, 0);
  }
  else
  {
  }

header('Location: ' . $_SERVER['HTTP_REFERER']);



//echo "http://" . $_SERVER['HTTP_REFERER'];

?>
