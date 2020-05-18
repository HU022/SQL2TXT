 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Database sync naar text bestand</title>
  </head>
  <body>
    <h1>Sync pagina</h1>
    <p>Best viewer, this page is only used for technical reasons, if you want to return to the homepage, then, click <a href="https://evolvingdesk.nl">here</a></p>
    <p>If you want to see the TXT version of the Synchronized list, click <a href="https://evolvingdesk.nl/hwid.txt">here</a></p>
    <p> List of item's: <br></p>
  </body>
  </html>



 <?php
$servername = "localhost";
$username = "root";
$password = "passwd";
$dbname = "items";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$fp = fopen('items.txt', 'w');
$sql = "SELECT items FROM items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["hwid"]. "<br>";

        fwrite($fp, $row['hwid'] . "\n");

    }
} else {
    echo "0 results";
}
fclose($fp);
$conn->close();
?>
