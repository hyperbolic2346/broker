<?php
// check db
$servername = getenv("DB_HOST");
$username = getenv("DB_USER");
$password = getenv("DB_PASSWORD");
$database = getenv("DB_DATABASE");

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
