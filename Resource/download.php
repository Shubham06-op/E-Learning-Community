<?php include 'filesDownload.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css">
    <title>Download files</title>
</head>

<body>

    <table>
        <tr>
            <th>ID</th>
            <th>Filename</th>
            <th>size (in kb)</th>
            <th>Downloads</th>
            <th>Time</th>
            <th>Action</th>
        </tr>

        <?php



        session_start();
        $conn = pg_connect("host=localhost dbname=project user=postgres password=phantom6") or die("Unable to connect to database");



        // fetch file to download from database
        $sql = "SELECT * FROM files";
        $result = pg_query($conn, $sql);
        if (pg_num_rows($result) > 0) {
            while ($row = pg_fetch_assoc($result)) {
                $sno = $row['rid'];
                $fname = $row['name'];
                $size = $row['size'];
                $dn = $row['downloads'];
                $time = $row['time'];

                echo "
            <tr>
            <td>" . $row['rid'] . "</td> 
            <td>" . $row['name'] . "</td>
            <td>" . $row['size'] . "</td>
            <td>" . $row['downloads'] . "</td>
            <td>" . $row['time'] . "</td>
            <td><a href='filesDownload.php?sno=$sno'>Download</a></td>
            </tr>
            ";
            }
        }
        ?>


    </table>

</body>

</html>