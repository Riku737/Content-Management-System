<?php

    function find_all_subjects() {
        global $db; // Bring in from outside scope to access

        $sql = "SELECT * FROM SUBJECTS ";
        $sql .= "ORDER BY id, position ASC";
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

    function validate_subject($subject) {
        $errors = [];

        // menu_name
        // Database can only hold up to 255 characters long
        if (is_blank($subject['menu_name'])) {
            $errors[] = "Name cannot be blank.";
        }
        if (!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
            $errors[] = "Name must be between 2 and 255 characters.";
        }

        // position
        $position_int = (int) $subject['position'];
        if ($position_int <= 0) {
            $errors[] = "Position must be greater than zero.";
        }
        if ($position_int > 999) {
            $errors[] = "Position must be less than 999.";
        }

        // visible
        $visible_str = (string) $subject['visible'];
        if (!has_inclusion_of($visible_str, ["0", "1"])) {
            $errors[] = "Visible must be true or false.";
        }

        return $errors;
    }

    function insert_subject($subject) {
        global $db;

        $errors = validate_subject($subject);
        if (!empty($errors)) {
            return $errors;
        }

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

        $errors = validate_subject($subject);
        if (!empty($errors)) {
            return $errors;
        }

        $sql = "UPDATE subjects SET ";
        $sql .= "menu_name='" . $subject['menu_name'] . "', ";
        $sql .= "position='" . $subject['position'] . "', ";
        $sql .= "visible='" . $subject['visible'] . "' ";
        $sql .= "WHERE id='" . $subject['id'] . "' ";
        $sql .= "LIMIT 1"; // Safeguard to ensure only one is modified

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



    // PAGES

    function find_all_pages() {
        global $db;

        $sql = "SELECT * FROM pages ";
        $sql .= "ORDER BY subject_ID, position ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
    }

     function find_page_by_id($id) {
        global $db;

        $sql = "SELECT * FROM pages ";
        $sql .= "WHERE id='" . $id . "';"; 
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);

        $page = mysqli_fetch_assoc($result);
        mysqli_free_result($result);

        return $page; // Returns an associative array
    }

    function insert_page($page) {
        global $db;

        $sql = "INSERT INTO pages ";
        $sql .= "(subject_id, menu_name, position, visible, content) ";
        $sql .= "VALUES (";
        $sql .=  "'" . $page['subject_id'] . "',";
        $sql .=  "'" . $page['menu_name'] . "',";
        $sql .=  "'" . $page['position'] . "',"; 
        $sql .=  "'" . $page['visible'] . "', ";
        $sql .=  "'" . $page['content'] . "'";
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

    function update_page($page) {
        global $db;

        $sql = "UPDATE pages SET ";
        $sql .= "subject_id='" . $page['subject_id'] . "', ";
        $sql .= "menu_name='" . $page['menu_name'] . "', ";
        $sql .= "position='" . $page['position'] . "', ";
        $sql .= "visible='" . $page['visible'] . "', ";
        $sql .= "content='" . $page['content'] . "' ";
        $sql .= "WHERE id='" . $page['id'] . "' ";
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

    function delete_page($id) {
        global $db;
        
        $sql = "DELETE FROM pages ";
        $sql .= "WHERE id='{$id}' ";
        $sql .= "LIMIT 1"; 

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

?>