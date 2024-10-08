<?php
session_start();
$conn = pg_connect("host=localhost dbname=project user=postgres password=phantom6") or die("Unable to connect to database");
if (isset($_GET['sno'])) 
{
    $id = $_GET['sno'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE rid=$id";
    $result = pg_query($conn, $sql);

    $file = pg_fetch_assoc($result);
    $filepath = './uploads/' . $file['name'];

    if (file_exists($filepath)) 
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE rid=$id";
        pg_query($conn, $updateQuery);
        exit;
    }

}
