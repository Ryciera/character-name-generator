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
 * Generate Surname
 * =============================================
 */

$dir = EnglishSurnames; // Set the table to choose from.
$items = mysqli_query($mysqli, "SELECT * FROM " . $dir . " ORDER BY RAND()"); // Pluck up that whole row.
$row["Surname"] = mysqli_fetch_row($items); // Turn that bitch into an array.

$s1 = ucwords(strtolower($row["Surname"][1]));

/*
 * Naming custom tooltips.
 * =============================================
 */
$gender = "Female";
$tooltip = "British typically name their children after somebody they respect. The surname (" . $s1 . ") comes from the father, and the first name (" . $name . ") often comes from a grandmother.";
$final = sprintf("%s %s", $name, $s1);
$source = "https://familysearch.org/wiki/en/British_Naming_Conventions";
$cust = "En";


require_once("formatNames.php");

/*
 * Print the bitch.
 * =============================================
 */

print($format);
?>