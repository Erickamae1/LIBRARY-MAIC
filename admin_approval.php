<?php
require "connection.php";

if (isset($_POST['approve'])) {
    $id = $_POST['id'];

    $query = "UPDATE student SET Status='Approved' WHERE ID='$id'";
    $query_run = mysqli_query($db, $query);

    if ($query_run) {
        echo "Student with ID $id has been Approved.";
        header("Location: ./student_info.php");
    } else {
        echo "Error: Could not approve student with ID $id.";
    }
}

if (isset($_POST['disapprove'])) {
    $id = $_POST['id'];

    $query = "UPDATE student SET Status='Disapproved' WHERE ID='$id'";
    $query_run = mysqli_query($db, $query);

    if ($query_run) {
        echo "Student with ID $id has been Disapproved.";
        header("Location: ./student_info.php");
    } else {
        echo "Error: Could not disapprove student with ID $id.";
    }
}
