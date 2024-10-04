<html>
<body>
  <h4>
    <?php
session_start();
$conn = pg_connect("host=localhost dbname=project user=postgres password=phantom6") or die("Unable to connect to database");
$sql="SELECT * FROM notice";
  $r=pg_query($conn,$sql);
  $r1=pg_num_fields($r);

  if(pg_num_rows($r)>0)
  {
      while($row=pg_fetch_array($r)){

          $_SESSION['title']=$row["title"];
          $_SESSION['body']=$row["body"];
          $_SESSION['name']=$row["name"];

          echo $row["name"]."<br>".$row['title']."<br> ".$row["body"];
        }
  }
else {
  echo "noting to show";
}
     ?>
  </h4>
</body>
</html>
