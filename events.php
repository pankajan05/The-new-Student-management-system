<?php include_once 'header.php'; ?>

<section class="main-container">
		
		<div id = "container">
		
		<img class="img-responsive" width="100%" height="100%" src="image/e1.jpg">
    </div>
</section>
<br><br>

<div class="main-wrapper">
	<h1>Events</h1>
</div>

<?php 

include_once 'include/db.inc.php';

$sql = "SELECT * FROM event";
$result = mysqli_query($con,$sql);



while($result1 = @mysqli_fetch_assoc($result)){
    
    echo "<div class=\"container\">
<div class=\"card\">
  <h5 class=\"card-header\">".$result1['head']."</h5>
  <div class=\"card-body\">
    <p style=\"float: left;\"><img src=\"".$result1['img']."\" height=\"200px\" width=\"200px\" border=\"1px\"></p>
    <p><br><br>".$result1['content']."<br><br><br></p>
  </div>
</div>
</div><br><br><br>";
    
   
}



?>




<?php include_once 'footer.php'; ?>