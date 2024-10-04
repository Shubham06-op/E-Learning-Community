<?php
session_start();
$conn = pg_connect("host=localhost dbname=project user=postgres password=phantom6") or die("Unable to connect to database");
if($_SESSION['name']!=NULL && $_POST['msg'] != NULL)
{
	$create = "CREATE TABLE IF NOT EXISTS q_and_a(qid SERIAL PRIMARY KEY, name VARCHAR(50) NOT NULL, post VARCHAR(1000))";
	$insert ="INSERT INTO q_and_a(name, post) VALUES ('".$_SESSION['name']."','".$_POST['msg']."')";
	$r1=pg_query($conn,$create);
    $r2=pg_query($conn,$insert);
    if(!$r1 || !$r2)
    {
        echo "<script type=\"text/javascript\">
            alert(\"Error Encountered !!\");
            window.location='/Ty-Project/Student/dashbrd.php';
            </script>";
    }
    else
    {
        echo "<script type=\"text/javascript\">
            alert(\"Question Posted Sucessfully!!\");
            window.location='/Ty-Project/Student/dashbrd.php';
            </script>";
    }
}
?>
