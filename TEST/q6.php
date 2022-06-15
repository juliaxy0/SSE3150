<!DOCTYPE html>
<html lang="en">

  <?php
  $pdo = new PDO('mysql:host=localhost;port=3306;dbname=estore','root', 'test');
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //ADD STUDENTS
  if (isset($_POST['add'])) {
    if (  isset($_POST['Transaction']) && isset($_POST['Item']) &&
        isset($_POST['Quantity']) && isset($_POST['Price']) && isset($_POST['invoiceNum'])
   ) {
      if (  strlen($_POST['Transaction']) < 1 || strlen($_POST['Item']) < 1 ||
          strlen($_POST['Quantity']) < 1 || strlen($_POST['Price']) < 1 || strlen($_POST['invoiceNum']) < 1)
       {
        $failure = "<span style='color:red'>All input are required are required</span>";
      } else {
        $sql = "INSERT INTO incomingordertable (Transaction, Item, Quantity,Price,invoiceNum )VALUES ( :b, :c, :d,:e,:f)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array(
          ':b' => $_POST['Transaction'],
          ':c' => $_POST['Item'],
          ':d' => $_POST['Quantity'],
          ':e' => $_POST['Price'],
          ':f' => $_POST['invoiceNum'])
        );
        $failure = "<span style='color:green'>Record inserted</span>";
      }
    }
  }

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

     <h2>ADD RECORD</h2>
     <form method="post">

       <label for="Transaction">Transaction :</label>
       <input type="text" id="Transaction" name="Transaction" placeholder="Enter Transaction here..." ></input><br>
       <label for="password">Item :</label>
       <input type="text" id="Item" name="Item" placeholder="Enter Item here..." ></input><br>
       <label for="Quantity">Quantity :</label>
       <input type="text" id="Quantity" name="Quantity" placeholder="Enter Quantity here..." ></input><br>
       <label for="Price">Price :</label>
       <input type="text" id="Price" name="Price" placeholder="Enter Price here..." ></input><br>
       <label for="invoiceNum">Invoice Number :</label>
       <input type="text" id="invoiceNum" name="invoiceNum" placeholder="Enter invoiceNum here..." ></input><br>
      <input type="submit" value="Add" name="add">
      <input type="submit" name="logout" value="Logout">
     </form>
          </body>
          </html>
