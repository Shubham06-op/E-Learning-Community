<?php
session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <title>Reply</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="panel panel-default" style="margin-top:50px">
      <div class="panel-body">
	<form name="frm" method="post" action="/Ty-Project/QA/rep1.php">
	    <input type="hidden" id="commentid" name="Pcommentid" value="0">
	<div class="form-group">
		<h2>
		<?php
			echo $_SESSION['name'];
		?>
		</h2>
	</div>
	<div class="form-group">
	  <label for="comment">Write your Reply:</label>
	  <textarea class="form-control" rows="5" name="reply" required></textarea>
	</div>
	 <input type="submit" id="butsave" name="replybtn" class="btn btn-primary" value="Reply">
      </div>
    </div>
    </form>
  </body>
</html>
