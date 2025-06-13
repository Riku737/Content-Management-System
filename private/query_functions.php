<?php

    function find_all_subjects() {
        global $db; // Bring in from outside scope to access

        $sql = "SELECT * FROM SUBJECTS ";
        $sql .= "ORDER BY position ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

    function find_subject_by_id($id) {
        global $db;

        $sql = "SELECT * FROM subjects ";
        $sql .= "WHERE id='" . $id . "';"; 
        $result = mysqli_query($db, $sql);
        confirm_result_set($result); // Error checking

        $subject = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        return $subject; // Returns an associative array
    }

    function insert_subject($subject) {
        global $db;

        $sql = "INSERT INTO subjects ";
        $sql .= "(menu_name, position, visible) ";
        $sql .= "VALUES (";
        $sql .=  "'" . $subject['menu_name'] . "',";
        $sql .=  "'" . $subject['position'] . "',"; // Single quote not necessary for integers, but good practice for security.
        $sql .=  "'" . $subject['visible'] . "'";
        $sql .= ")";
        $result = mysqli_query($db, $sql);

        // For INSERT statements, $result is true/false
        if ($result) {
            return true;
        } else {
            // INSERT FAILED
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function update_subject($subject) {
        global $db;

        $sql = "UPDATE subjects SET ";
        $sql .= "menu_name='" . $subject['menu_name'] . "', ";
        $sql .= "position='" . $subject['position'] . "', ";
        $sql .= "visible='" . $subject['visible'] . "' ";
        $sql .= "WHERE id='" . $subject['id'] . "' ";
        $sql .= "LIMIT 1";

        $result = mysqli_query($db, $sql);

        // For UPDATE statements, $result is true/false
        if ($result) {
            return true;
        } else {
            // Update failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }

    }

    function delete_subject($id) {
        global $db;
        
        $sql = "DELETE FROM subjects ";
        $sql .= "WHERE id='" . $id . "' ";
        $sql .= "LIMIT 1"; // Delete only 1 record

        $result = mysqli_query($db, $sql);
        
        // For DELETE statements, $result is true/false
        if ($result) {
            return true;
        } else {
            // DELETE failed
            echo mysqli_error($db);
            db_disconnect($db);
            exit;
        }
    }

    function find_all_pages() {
        global $db;

        $sql = "SELECT * FROM PAGES ";
        $sql .= "ORDER BY subject_ID, position ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

?>