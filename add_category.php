<?php
include 'includes.php';
printheader();

if (!isset($_GET['category']))
{
  echo "<h1>Add Category</h1>\n";
  echo "<form action='add_category.php' method='get'>\n";
  echo "<table border=0>\n";
  echo "<tr><td>Category Name: </td><td><input class='textbox' type='textbox' name='category'></td></tr>\n";
  echo "<tr><td><input class='textbox' type='submit' value='Add Category'></td><td align='right'><input class='textbox' type='reset'></td></tr>\n";
  echo "</table>\n";
  echo "</form>\n";
}
else
{
  $category = $_GET['category'];
  $q = "SELECT * FROM Category WHERE lower(name)='" . strtolower($category) . "'";
  $res = pg_query($conn, $q);
  if (pg_numrows($res) >= 1)
  {
    echo "ERROR! Category $category already exists<br>\n";
  }
  else
  {
    $q = "INSERT INTO Category (Name) VALUES ('$category')";
    pg_query($conn, $q);
    if (pg_numrows($res) == 1)
    {
      echo "Successfully created $category<br>\n";
    }
    else 
    { 
      echo "Successfully created $categoryl<br>\n";
    }
  }
}


printfooter();
?>
