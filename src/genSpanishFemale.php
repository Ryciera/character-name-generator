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

$s1 = ucwords(strtolower($row["Surname"][1]));

/*
 * Generate Surname 2
 * =============================================
 */

$dir = omitted; // Set the table to choose from.
$items = mysqli_query($mysqli, "SELECT * FROM " . $dir . " ORDER BY RAND()"); // Pluck up that whole row.
$row["Surname"] = mysqli_fetch_row($items); // Turn that bitch into an array.

$s2 = ucwords(strtolower($row["Surname"][1]));

/*
 * Naming custom tooltips.
 * =============================================
 */
$gender = "Female";
$tooltip = "Spanish naming customs traditionally include two surnames: The first surname from the mother, and the second surname from the father. " . $s1 . " is likely the mother&#39;s first surname, and " . $s2 . " is likely the father&#39;s first surname.";
$final = sprintf("%s %s %s", $name, $s1, $s2);
$source = "http://lrc.salemstate.edu/hispanics/other/Naming_Conventions_of_Spanish-Speaking_Cultures.htm";
$cust = "Sp";


require_once("formatNames.php");

/*
 * Print the bitch.
 * =============================================
 */

print($format);
?>