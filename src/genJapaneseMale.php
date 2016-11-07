<?php

session_start();

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/inme/login.php";
require_once($path);

/*
 * Open database, throw error if all else fails.
 * =============================================
 */

$mysqli = new mysqli($db_hostname, $db_username, $db_password, $db_database, $db_port);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

/*
 * Generate the First Name
 * =============================================
 */

$dir = omitted; // Set the table to choose from.
$items = mysqli_query($mysqli, "SELECT * FROM " . $dir . " ORDER BY RAND()"); // Pluck up that whole row.
$row["Name"] = mysqli_fetch_row($items); // Turn that bitch into an array.

$name = ucwords(strtolower($row["Name"][1]));

/*
 * Generate Surname 1
 * =============================================
 */

$dir = omitted; // Set the table to choose from.
$items = mysqli_query($mysqli, "SELECT * FROM " . $dir . " ORDER BY RAND()"); // Pluck up that whole row.
$row["Surname"] = mysqli_fetch_row($items); // Turn that bitch into an array.

$surname = ucwords(strtolower($row["Surname"][1]));

/*
 * Naming custom tooltips.
 * =============================================
 */
$gender = "Male";
$tooltip = "Japanese inherit their surnames from their father, and women often take on the surname of their husband upon marriage. Surnames typically come before first names. Thus, " . $surname . " is the surname, and " . $name . " is the name.";
$final = sprintf("%s %s", $surname, $name);
$source = "http://www.sljfaq.org/afaq/names-for-people.html";
$cust = "Jpn";


require_once("formatNames.php");

/*
 * Print the bitch.
 * =============================================
 */

print($format);
?>