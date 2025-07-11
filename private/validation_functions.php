<?php

// All functions related to validation contained in this file
// Copied directly from exercise files because too much code to rewrite manually

// is_blank('abcd')
// * validate data presence
// * uses trim() so empty spaces don't count
// * uses === to avoid false positives
// * better than empty() which considers "0" to be empty
function is_blank($value) {
	return !isset($value) || trim($value) === '';
}

// has_presence('abcd')
// * validate data presence
// * reverse of is_blank()
// * I prefer validation names with "has_"
function has_presence($value) {
	return !is_blank($value);
}

// has_length_greater_than('abcd', 3)
// * validate string length
// * spaces count towards length
// * use trim() if spaces should not count
function has_length_greater_than($value, $min) {
	$length = strlen($value);
	return $length > $min;
}

// has_length_less_than('abcd', 5)
// * validate string length
// * spaces count towards length
// * use trim() if spaces should not count
function has_length_less_than($value, $max) {
	$length = strlen($value);
	return $length < $max;
}

// has_length_exactly('abcd', 4)
// * validate string length
// * spaces count towards length
// * use trim() if spaces should not count
function has_length_exactly($value, $exact) {
	$length = strlen($value);
	return $length == $exact;
}

// has_length('abcd', ['min' => 3, 'max' => 5])
// * validate string length
// * combines functions_greater_than, _less_than, _exactly
// * spaces count towards length
// * use trim() if spaces should not count
function has_length($value, $options) {
	if(isset($options['min']) && !has_length_greater_than($value, $options['min'] - 1)) {
		return false;
	} elseif(isset($options['max']) && !has_length_less_than($value, $options['max'] + 1)) {
		return false;
	} elseif(isset($options['exact']) && !has_length_exactly($value, $options['exact'])) {
		return false;
	} else {
		return true;
	}
}

// has_inclusion_of( 5, [1,3,5,7,9] )
// * validate inclusion in a set
function has_inclusion_of($value, $set) {
	return in_array($value, $set);
}

// has_exclusion_of( 5, [1,3,5,7,9] )
// * validate exclusion from a set
function has_exclusion_of($value, $set) {
	return !in_array($value, $set);
}

// has_string('nobody@nowhere.com', '.com')
// * validate inclusion of character(s)
// * strpos returns string start position or false
// * uses !== to prevent position 0 from being considered false
// * strpos is faster than preg_match()
function has_string($value, $required_string) {
	return strpos($value, $required_string) !== false;
}

// has_valid_email_format('nobody@nowhere.com')
// * validate correct format for email addresses
// * format: [chars]@[chars].[2+ letters]
// * preg_match is helpful, uses a regular expression
//    returns 1 for a match, 0 for no match
//    http://php.net/manual/en/function.preg-match.php
function has_valid_email_format($value) {
	$email_regex = '/\A[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\Z/i';
	return preg_match($email_regex, $value) === 1;
}

// has_unique_page_menu_name('History')
// Validates uniquemess pages.menu_name
function has_unique_page_menu_name($menu_name, $current_id="0") {
	global $db;

	$sql = "SELECT * FROM pages ";
	$sql .= "WHERE menu_name='" . db_escape($db, $menu_name) . "' ";
	$sql .= "AND id != '" . db_escape($db, $current_id) . "'";

	$page_set = mysqli_query($db, $sql); // Contains all rows from the pages table with provided $menu_name
	$page_count = mysqli_num_rows($page_set); // Counts number of rows
	mysqli_free_result($page_set); // Free memory

	return $page_count === 0; // If it's existing, then 1 and return false
}

function has_unique_subject_menu_name($menu_name, $current_id="0") {
	global $db;

	$sql = "SELECT * FROM subjects ";
	$sql .= "WHERE menu_name='" . db_escape($db, $menu_name) . "' ";
	$sql .= "AND id != '" . db_escape($db, $current_id) . "'";

	$subject_set = mysqli_query($db, $sql); // Contains all rows from the pages table with provided $menu_name
	$subject_count = mysqli_num_rows($subject_set); // Counts number of rows
	mysqli_free_result($subject_set); // Free memory

	return $subject_count === 0; // If it's existing, then 1 and return false
}

function has_empty_page_set($subject_id) {
	global $db;

	$sql = "SELECT * FROM pages ";
	$sql .= "WHERE subject_id='" . db_escape($db, $subject_id) . "' ";

	$page_set = mysqli_query($db, $sql);
	$page_count = mysqli_num_rows($page_set);
	mysqli_free_result($page_set);

	return $page_count === 0;
}

function has_unique_username($username, $current_id) {
	global $db;

	$sql = "SELECT * FROM admins ";
	$sql .= "WHERE username='" . db_escape($db, $username) . "' ";
	$sql .= "AND id != '" . db_escape($db, $current_id) . "'";

	$result = mysqli_query($db, $sql);
	$admin_count = mysqli_num_rows($result);
	mysqli_free_result($result);

	return $admin_count === 0;
}

?>
