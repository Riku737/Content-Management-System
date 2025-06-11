<?php

    function find_all_subjects() {
        global $db; // Bring in from outside scope to access

        $sql = "SELECT * FROM SUBJECTS ";
        $sql .= "ORDER BY position ASC";
        $result = mysqli_query($db, $sql);
        confirm_result_set($result);
        return $result;
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