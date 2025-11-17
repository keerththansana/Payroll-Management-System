<?php
session_start();
include('db.php');
if($_GET)
{
    $id= $_GET["id"];
    $sql = "DELETE FROM grade WHERE id = '$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location:view-grade.php");
    } else {
        header("Location:view-grade.php e");
    }
}