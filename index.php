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
$count = $db->query('show tables')->fetch(PDO::FETCH_NUM);
if ($count == 0) {
  echo "initializing db<br />";
  $db->query('create table item (id mediumint auto_increment primary key,
                                  name varchar(200),
                                  settings_id mediumint foreign key,
                                  auction_amount tinyint unsigned,
                                  split_auctions bool)');

  $db->query('create table settings (id mediumint auto_increment primary key,
                                      parent_id mediumint key,
                                      auto_accept_price decimal(8,2),
                                      auto_reject_price deciment(8,2),
                                      auto_relist bool,
                                      auto_relist_fixed_count tinyint unsigned,
                                      buy_now_price decimal(8,2),
                                      can_offer bool,
                                      category_id mediumint unsigned,
                                      collect_taxes bool,
                                      condition tinyint(1) unsigned,
                                      country_code CHAR(2),
                                      description TEXT,
                                      fixed_price DECIMAL(8,2),
                                      GTIN VARCHAR(40),
                                      inspection_period tinyint(2) unsigned,
                                      is_ffl_required bool,
                                      listing_duration tinyint(2) unsigned,
                                      mfg_part_number VARCHAR(40),
                                      payment_methods VARCHAR(2048),
                                      picture_urls TEXT,
                                      premium_features VARCHAR(2048),
                                      postal_code VARCHAR(10),
                                      prop_65_warning VARCHAR(80),
                                      quantity tinyint(2) unsigned,
                                      reserve_price DECIMAL(8,2),
                                      sales_taxes VARCHAR(2048),
                                      use_default_sales_tax bool,
                                      serial_number VARCHAR(80),
                                      shipping_class_costs VARCHAR(2048),
                                      shipping_classes_supported VARCHAR(2048).
                                      shipping_profile_id MEDIUMINT UNSIGNED,
                                      SKU VARCHAR(80),
                                      standard_text_id mediumint unsigned,
                                      starting_bid DECIMAL(8,2),
                                      title VARCHAR(75),
                                      UPC VARCHAR(40),
                                      weight DECIMAL(8,2),
                                      weight_unit tinyint(1) unsigned,
                                      who_pays_for_shipping tinyint(2) unsigned,
                                      will_ship_international bool)');
  $db->query('create table picture_group (id mediumint auto_increment primary key,
                                  name varchar(200))');
  $db->query('create table picture_groups (group_id mediumint key,
                                  picture_id mediumint)');
  $db->query('create table picture (id mediumint auto_increment primary key,
                                  filename varchar(200),
                                  data BLOB)');
}
echo "Main Menu | Add Item | Add photos | Create or Edit Item Settings<br />";
echo "Hello world!";

?>
