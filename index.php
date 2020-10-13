<?php
// check db
$servername = getenv("DB_HOST");
$username = getenv("DB_USER");
$password = getenv("DB_PASSWORD");
$database = getenv("DB_DATABASE");

try {
  $db = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
  $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  echo "Connected to db succesfully<br />";
} catch(PDOException $e){
  die("DB connection failed: " . $e -> getMessage());
}

// verify schema
$tbls = $db->query("SELECT TABLES");
if ($tbls->num_rows == 0) {
  echo "initializing db<br />";
}
echo "Hello world!";

?>
