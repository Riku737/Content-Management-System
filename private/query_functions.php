<?php

function find_all_subjects($options=[]) {
    global $db; // Bring in from outside scope to access

    $visible = $options['visible'] ?? false;
    $sql = "SELECT * FROM SUBJECTS ";
    if ($visible) {
        $sql .= " WHERE visible = true ";
    }
    $sql .= "ORDER BY id ASC, position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_subject_by_id($id) {
    global $db;

    $sql = "SELECT * FROM subjects ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "'";
    // echo $sql; 
    $result = mysqli_query($db, $sql);
    confirm_result_set($result); // Error checking

    $subject = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    if(!$subject) 
    {
        redirect_to(url_for('/staff/subjects/index.php'));
    }

    return $subject; // Returns an associative array
}

function validate_subject($subject) {
    $errors = [];

    // menu_name
    // Database can only hold up to 255 characters long
    if (is_blank($subject['menu_name'])) {
        $errors[] = "Name cannot be blank.";
    } else if (!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
        $errors[] = "Name must be between 2 and 255 characters.";
    }

    // position
    $position_int = (int) $subject['position'];
    if ($position_int <= 0) {
        $errors[] = "Position must be greater than zero.";
    } else if ($position_int > 999) {
        $errors[] = "Position must be less than 999.";
    }

    // visible
    $visible_str = (string) $subject['visible'];
    if (!has_inclusion_of($visible_str, ["0", "1"])) {
        $errors[] = "Visible must be true or false.";
    }

    // name
    $current_id = $subject['id'] ?? '0';
    if (!has_unique_subject_menu_name($subject['menu_name'], $current_id)) {
        $errors[] = "Subject name must be unique.";
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
    $sql .=  "'" . db_escape($db, $subject['menu_name']) . "',";
    $sql .=  "'" . db_escape($db, $subject['position']) . "',"; // Single quote not necessary for integers, but good practice for security.
    $sql .=  "'" . db_escape($db, $subject['visible']) . "'";
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
    $sql .= "menu_name='" . db_escape($db, $subject['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $subject['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $subject['visible']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $subject['id']) . "' ";
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
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
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

function delete_subject_pages($id) {
    global $db;

    $sql = "DELETE FROM pages ";
    $sql .= "WHERE subject_id=" . db_escape($db, $id);

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    if ($result) {
        return true;
    } else {
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}


// PAGES

function find_all_pages() {
    global $db;

    $sql = "SELECT * FROM pages ";
    $sql .= "ORDER BY subject_ID ASC, position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set(result_set: $result);
    return $result;
}

function find_page_by_id($id, $options=[]) {
    global $db;

    $visible = $options['visible'] ?? false;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' "; 
    if ($visible) {
        $sql .= "AND visible = true ";
    }
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $page = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    // if (!$page)
    // {
    //     redirect_to(url_for('/staff/pages/index.php'));
    // }

    return $page; // Returns an associative array
}

function validate_pages($page) {
    $errors = [];

    // subject id
    if (is_blank($page['subject_id'])) {
        $errors[] = "Subject cannot be blank";
    }

    // menu name
    if (is_blank($page['menu_name'])) {
        $errors[] = "Name cannot be blank.";
    } else if (!has_length($page['menu_name'], ['min' => 2, 'max' => 255])) {
        $errors[] = "Name must be between 2 and 255 characters.";
    }

    // position
    $position_int = (int) $page['position'];
    if ($position_int <= 0) {
        $errors[] = "Position must be greater than zero.";
    } else if ($position_int > 999) {
        $errors[] = "Position must be less than 999.";
    }

    // visible
    $visible_str = (string) $page['visible'];
    if (!has_inclusion_of($visible_str, ["0", "1"])) {
        $errors[] = "Visible must be true or false.";
    }

    // content
    // unlimited text length
    if (is_blank($page['content'])) {
        $errors[] = "Content cannot be blank.";
    }

    $current_id = $page['id'] ?? '0';
    if (!has_unique_page_menu_name($page['menu_name'], $current_id)) {
        $errors[] = "Page name must be unique.";
    }

    return $errors;
}

function insert_page($page) {
    global $db;

    $errors = validate_pages($page);
    if (!empty($errors)) {
        return $errors;
    }

    $sql = "INSERT INTO pages ";
    $sql .= "(subject_id, menu_name, position, visible, content) ";
    $sql .= "VALUES (";
    $sql .=  "'" . db_escape($db, $page['subject_id']) . "', ";
    $sql .=  "'" . db_escape($db, $page['menu_name']) . "', ";
    $sql .=  "'" . db_escape($db, $page['position']) . "', "; 
    $sql .=  "'" . db_escape($db, $page['visible']) . "', ";
    $sql .=  "'" . db_escape($db, $page['content']) . "'";
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

    $errors = validate_pages($page);
    if (!empty($errors)) {
        return $errors;
    }

    $sql = "UPDATE pages SET ";
    $sql .= "subject_id='" . db_escape($db, $page['subject_id']) . "', ";
    $sql .= "menu_name='" . db_escape($db, $page['menu_name']) . "', ";
    $sql .= "position='" . db_escape($db, $page['position']) . "', ";
    $sql .= "visible='" . db_escape($db, $page['visible']) . "', ";
    $sql .= "content='" . db_escape($db, $page['content']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $page['id']) . "' ";
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
    $sql .= "WHERE id=" . db_escape($db, $id);
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


function find_pages_by_subject_id($subject_id, $options=[]) {
    global $db;

    $visible = $options['visible'] ?? false;

    $sql = "SELECT * FROM pages ";
    $sql .= "WHERE subject_id='" . db_escape($db, $subject_id) . "' "; 
    if ($visible) {
        $sql .= "AND visible = true ";
    }
    $sql .= "ORDER BY position ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result; // Returns an associative array
}



// ADMINS

function find_all_admins() {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "ORDER BY last_name ASC, first_name ASC";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
}

function find_admin_by_id($id) {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    if(!$admin) 
    {
        redirect_to(url_for('/staff/admins/index.php'));
    }

    return $admin;
}

function find_admin_by_username($username) {
    global $db;

    $sql = "SELECT * FROM admins ";
    $sql .= "WHERE username='" . db_escape($db, $username) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);

    $admin = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    return $admin;
}

function validate_admin($admin, $options=[]) {

    $errors = [];

    // first name
    if (is_blank($admin['first_name'])) {
        $errors[] = "First name cannot be blank.";
    } else if (!has_length($admin['first_name'], ['min' => 2, 'max' => 255])) {
        $errors[] = "First name must be between 2 and 255 characters.";
    }

    // last name
    if (is_blank($admin['last_name'])) {
        $errors[] = "Last name cannot be blank.";
    } else if (!has_length($admin['last_name'], ['min' => 2, 'max' => 255])) {
        $errors[] = "Last name must be between 2 and 255 characters.";
    }

    // email
    if (is_blank($admin['email'])) {
        $errors[] = "Email cannot be blank.";
    } else if (!has_length($admin['email'], ['max' => 255])) {
        $errors[] = "Email must be less than 255 characters.";
    } else if (!has_valid_email_format($admin['email'])) {
        $errors[] = "Email must be a valid format.";
    }

    // username
    if (is_blank($admin['username'])) {
        $errors[] = "Username cannot be blank.";
    } else if (!has_length($admin['username'], ['min' => 8, 'max' => 255])) {
        $errors[] = "Username must be between 8 and 255 characters.";
    } else if (!has_unique_username($admin['username'], $admin['id'] ?? 0)) {
        $errors[] = "Username not allowed. Try another.";
    }

    // password
    $password_required = $options['password_required'] ?? true;
    if ($password_required) {
        
        if(is_blank($admin['password'])) {
            $errors[] = "Password cannot be blank.";
        } elseif (!has_length($admin['password'], array('min' => 12))) {
            $errors[] = "Password must contain 12 or more characters";
        } elseif (!preg_match('/[A-Z]/', $admin['password'])) {
            $errors[] = "Password must contain at least 1 uppercase letter";
        } elseif (!preg_match('/[a-z]/', $admin['password'])) {
            $errors[] = "Password must contain at least 1 lowercase letter";
        } elseif (!preg_match('/[0-9]/', $admin['password'])) {
            $errors[] = "Password must contain at least 1 number";
        } elseif (!preg_match('/[^A-Za-z0-9\s]/', $admin['password'])) {
            $errors[] = "Password must contain at least 1 symbol";
        }
    
        // confirm password
        if(is_blank($admin['confirm_password'])) {
            $errors[] = "Confirm password cannot be blank.";
        } elseif ($admin['password'] !== $admin['confirm_password']) {
            $errors[] = "Password and confirm password must match.";
        }

    }

    return $errors;

}

function insert_admin($admin) {
    $errors = validate_admin($admin);
    if (!empty($errors)) {
        return $errors;
    }

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    global $db;
    $sql = "INSERT INTO admins ";
    $sql .= "(first_name, last_name, email, username, hashed_password) ";
    $sql .= "VALUES (";
    $sql .=  "'" . db_escape($db, $admin['first_name']) . "', ";
    $sql .=  "'" . db_escape($db, $admin['last_name']) . "', ";
    $sql .=  "'" . db_escape($db, $admin['email']) . "', ";
    $sql .=  "'" . db_escape($db, $admin['username']) . "', ";
    $sql .=  "'" . db_escape($db, $hashed_password) . "' ";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    
    if ($result) {
        return true;
    } else {
        // INSERT FAILED
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }
}

function update_admin($admin) {
    global $db;

    $password_sent = !is_blank($admin['password']);

    $errors = validate_admin($admin, ['password_required' => $password_sent]);
    if (!empty($errors)) {
        return $errors;
    }

    $hashed_password = password_hash($admin['password'], PASSWORD_BCRYPT);

    $sql = "UPDATE admins SET ";
    $sql .= "first_name='" . db_escape($db, $admin['first_name']) . "', ";
    $sql .= "last_name='" . db_escape($db, $admin['last_name']) . "', ";
    $sql .= "email='" . db_escape($db, $admin['email']) . "', ";
    if ($password_sent) {
        $sql .= "hashed_password='" . db_escape($db, $hashed_password) . "', ";
    }
    $sql .= "username='" . db_escape($db, $admin['username']) . "' ";
    $sql .= "WHERE id='" . db_escape($db, $admin['id']) . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($db, $sql);
    
    if ($result) {
        return true;
    } else {
        // DELETE FAILED
        echo mysqli_error($db);
        db_disconnect($db);
        exit;
    }

}

function delete_admin($id) {
    global $db;
    
    $sql = "DELETE FROM admins ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
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