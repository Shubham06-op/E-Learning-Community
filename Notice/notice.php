<?php
session_start();
$conn = pg_connect("host=localhost dbname=project user=postgres password=phantom6") or die("Unable to connect to database");
if (isset($_POST['title1']) && isset($_POST['body1'])) {

    $_SESSION['title'] = $_POST['title1'];
    $_SESSION['body'] = $_POST['body1'];
    $create = "CREATE TABLE IF NOT EXISTS notice(id SERIAL PRIMARY KEY, name varchar(50), email varchar(50)  NOT NULL, title varchar(100) , body varchar(1000))";
    $r1 = pg_query($conn, $create);
    if ($_POST['title1'] != NULL && $_POST['body1'] != NULL) {
        if (isset($_POST['submit1'])) {

            $insert = "INSERT INTO notice(name,email,title,body) VALUES ('" . $_SESSION['name'] . "','" . $_SESSION['temail'] . "','" . $_POST['title1'] . "','" . $_POST['body1'] . "')";

            $r2 = pg_query($conn, $insert);
            if (!$r2) {
                echo "<script type=\"text/javascript\">
            alert(\"invalid!!\");
            window.location='/Ty-Project/Student/dashbrd.php';
            </script>";
            } else {
                echo "<script type=\"text/javascript\">
            alert(\"Post Sucessfully!!\");
            window.location='/Ty-Project/Student/dashbrd.php';
            </script>";
            }
        }
    } else if (isset($_POST['submit2'])) {
        echo "<script type=\"text/javascript\">
        window.location='/Ty-Project/Student/dashbrd.php';
        </script>";
    } else {
        echo "<script type=\"text/javascript\">
      alert(\"Field's should not be empty!!\");
      window.location='/Ty-Project/Notice/notice.html';
      </script>";
    }
}
