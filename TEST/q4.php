<!DOCTYPE html>
<html lang="en">

  <?php
  $pdo = new PDO('mysql:host=localhost;port=3306;dbname=estore','root', 'test');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<head>
  <title>LAB TEST 208256 JULIA NURFADHILAH</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=devicewidth, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="style.css">
</head>

<body>


     <h2>IncomingOrderTable TABLE</h2>
     <table border="1">
     <?php
     echo "<tr><th>recordID</th><th>Transaction Date</th><th>Item</th><th>Quantity Sold</th><th>Unit Price (RM) </th><th>Invoice Number </th></tr>";
     $stmt = $pdo->query("SELECT recordID, Transaction, Item, Quantity, Price, invoiceNum FROM incomingordertable");
     while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
     echo ("<tr><td>");
     printf("%03d", htmlentities($row['recordID']));
     echo("</td><td>");
     echo(htmlentities($row['Transaction']));
     echo("</td><td>");
     echo(htmlentities($row['Item']));
     echo("</td><td>");
     echo(htmlentities($row['Quantity']));
     echo("</td><td>");
     echo(htmlentities(number_format($row['Price'], 2)));
     echo("</td><td>");
     echo(htmlentities($row['invoiceNum']));
     echo("</td></tr>\n");


     }
     ?>
     </table>
          </body>
          </html>
