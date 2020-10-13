<?php
// check db
$servername = getenv("DB_HOST");
$username = getenv("DB_USER");
$password = getenv("DB_PASSWORD");
$database = getenv("DB_DATABASE");

try{
    $conn = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo "Connected succesfully";
 } catch(PDOException $e){
    echo "Connection failed: " . $e -> getMessage();
 }

// Create connection
$db = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br />";

// verify schema
$tbls = $db->query("SELECT TABLES");
if ($tbls->num_rows == 0) {
  echo "initializing db<br />";
}
echo "Hello world!";

?>
