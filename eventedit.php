<?php include_once 'header.php'; ?>

<section class="main-container">
		
		<div id = "container">
		
		<img class="img-responsive position-sticky" width="100%"  height="100%" src="image/e1.jpg">
    </div>
</section>


<div class="main-wrapper">
	<h1>Events</h1>
</div>

<div class="container">
    <br>
	<form action='include/marks.inc.php' method="post">	
        <input class="form-control" type="text" name="head" placeholder="Add heading"><br>
        
         <textarea class="form-control" name="content" rows="3" placeholder="Event Description"></textarea><br>
        
        <input type="file" name="file" placeholder="delete student"><br>
        <button class="btn btn-primary mb-2" name="add">Add Event</button>
</form>
</div><br><br>



<?php 

include_once 'include/db.inc.php';
$i = 0;
$sql = "SELECT * FROM event";
$result = mysqli_query($con,$sql);




while($result1 = mysqli_fetch_assoc($result)){
    
    echo "
   <div class=\"container\">
<div class=\"card\">
  <h5 class=\"card-header\">".$result1['head']."</h5>
  <div class=\"card-body\">
    <p style=\"float: left;\"><img src=\"".$result1['img']."\" height=\"200px\" width=\"200px\" border=\"1px\"></p>
    <p><br><br>".$result1['content']."<br><br><br></p>
    <form class=\"ged\" action=\"eventedit.php\" method=\"post\">
        <button type=\"submit\" name=\"delete$i\">Delete</button>
      </form>
  </div>
</div>
</div><br><br><br>";
    
     if(isset($_POST['delete'.$i.''])){
        $sql = "DELETE FROM event WHERE head='".$result1['head']."'";
            //echo $sql;
        mysqli_query($con,$sql);
       header("Refresh:0"); 
        
     }
    $i++;
    
}
    


?>




<?php include_once 'footer.php'; ?>