<?php
// connect to the database
$conn = pg_connect("host=localhost dbname=project user=postgres password=phantom6") or die("Unable to connect to database");
session_start();
// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = "./uploads/" . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx', 'jpg', 'png'])) 
    {
        echo "You file extension must be .zip, .pdf, .docx, .png or .jpg";
    } 
    else if ($_FILES['myfile']['size'] > 20000000) 
    { // file shouldn't be larger than 20Megabyte
        echo "File too large!";
    } 
    else 
    {
        $create = "CREATE TABLE IF NOT EXISTS files(rid SERIAL PRIMARY KEY, name VARCHAR(100), size INT, downloads INT, time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";
        $insert = "INSERT INTO files (name, size, downloads) VALUES ('$filename','$size',0)";
        $q1 = pg_query($conn, $create);
        $q2 = pg_query($conn, $insert);
        // move the uploaded (temporary) file to the specified destination
        if (!$q2) 
        {
            echo "<script type=\"text/javascript\">
                alert(\"database not updated!!\");
                window.location='/Ty-Project/Resource/index.php';
                </script>";
        } 
        else 
        {

            if (move_uploaded_file($file, $destination)) 
            {
                echo "<script type=\"text/javascript\">
                    alert(\"Upload Sucessfully!!\");
                    window.location='/Ty-Project/Teacher/teach.php';
                    </script>";
            } 
            else 
            {
                echo "Failed to upload file.";
            }
        }
    }
}
?>