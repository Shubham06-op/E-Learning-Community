<?php
  session_start();
  $conn = pg_connect("host=localhost dbname=project user=postgres password=phantom6") or die("Unable to connect to database");
?>
<html>
<head>
<link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
<title>Q and A</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
</head>
<div class="container">
<div class="panel panel-default" style="margin-top:50px">
  <div class="panel-body">
    <h3>Q & A forum</h3>
    <hr>
    <form name="frm" method="post" action="/Ty-Project/QA/save.php">
        <input type="hidden" id="commentid" name="Pcommentid" value="0">
	<div class="form-group">
		<h2><?php
						echo $_SESSION['name'];
				?>
		</h2>
	</div>
    <div class="form-group">
      <label for="comment">Write your question:</label>
      <textarea class="form-control" rows="5" name="msg" required></textarea>
    </div>
	 <input type="submit" id="butsave" name="save" class="btn btn-primary" value="Send">
  </div>
</div>
</form>
<div class="panel panel-default">
  <div class="panel-body">
    <h3>Questions Posted Earlier</h3><br>
	<table class="table" id="MyTable" style="background-color: #edfafa; border:0px;border-radius:10px">
	  <tbody id="record">
      <p>
      <?php
        $a="SELECT * FROM q_and_a";
        $e=pg_query($conn,$a);
        if(!$e)
          echo "No question posted";
        if(pg_num_rows($e)>0)
        {
          while($row=pg_fetch_array($e))
          {
            $_SESSION['n']=$row['name'];
            $_SESSION['q']=$row['post'];
            echo "<h4 style='position:absolute;'>".$_SESSION['n']. "&nbsp&nbsp&nbsp::&nbsp&nbsp&nbsp&nbsp&nbsp" .$_SESSION['q']."</h4>";
        ?>
        <div class="rp">
        <form  action="reply.php" method="post">
        <input type='submit' id='butsave' name='reply1' class='btn btn-primary' value='Reply' style='display:inline-block; position:relative; margin-left:90%;'><br><br>
        <?php
          if(isset($_POST['reply1']))
            {
              //header("Location:reply.php");
              require("reply.php");
            }
          }
        }
        else
        {
          echo "No Questions to show..";
        }
      ?>
    </form>
  </div>
      </P>
	  </tbody>
	</table>
  </div>
</div>
</div>
</body>
</html>
