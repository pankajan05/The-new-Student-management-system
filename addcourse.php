<?php include_once 'header.php'; ?>
<div class="main-wrapper">
	<h1>Add Course</h1><br>
</div>

<div class="container">
    <h4>Create new course</h4><br><br>
    
    <form action='addcourse.php' method="post">	
     
    <input type="text" name="cname" class="form-control" placeholder="Course Name"><br>
    <input type="text" name="cid" class="form-control" placeholder="Course ID"><br>
    <div class="form-group">
    <textarea class="form-control" name="description" rows="3" placeholder="Course Description"></textarea>
  </div><br>

     <button  class="btn btn-success" name="register">Add course</button><br><br><br>
    </form>
    
    <h3 class="text-right text-justify ">Available Courses<br><br></h3>
    <ul  class="text-center text-justify list-group">
<?php 
			include_once 'include/db.inc.php';

			$query_select = "SELECT * from courses";
			$run_query = mysqli_query($con, $query_select);
			
		while ($result = mysqli_fetch_assoc($run_query)) {
            echo "<li class=\"list-group-item\">".$result['course_id']."(".$result['course_name'].")</li>";

	}
		
		?>
        </ul><br><br><br>
    
 
     <h4 class="text-right">Delete course</h4><br><br>
        <form action='addcourse.php' method="post">
            <div class="input-group mb-3">
  <input type="text" class="form-control" name ="dcname" placeholder="Course Id"  aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" name = "db" type="button" id="button-addon2">Delete</button>
  </div>
</div>
    </form>
</div>
<?php include_once 'footer.php'; ?>