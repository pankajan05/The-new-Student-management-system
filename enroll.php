<?php include_once 'header.php';
include_once 'include/db.inc.php';

if(isset($_POST['ds'])){

$course_id = mysqli_real_escape_string($con,$_POST['cid']);

    $query_select = "SELECT * from courses";
			$run_query = mysqli_query($con, $query_select);

while ($resul = mysqli_fetch_assoc($run_query)) {
    if($resul['course_id'] == $course_id){

         $sid = $_SESSION['uid'];

         $query_select1 = "SELECT * from semister";
			$run_query1 = mysqli_query($con, $query_select1);

		while ($result1 = mysqli_fetch_assoc($run_query1)) {
            if($result1['available'] == true){
                $sem = $result1['semester_id'];
            }
        }

         $eid = substr($course_id,-5)."/".substr($sem,-6);
         $sql = "INSERT INTO enrollment VALUES('$sid','$course_id','$sem','$eid')";
         $result = mysqli_query($con, $sql);

         $sql1 = "INSERT INTO exam  VALUES ('$sid','$eid',null)";
          $result1 = mysqli_query($con, $sql1);
          echo "<h6> course ".$course_id." register successfully.</h6>";
          @header("Refresh:0");

        }

    }
    echo "<h6> course ".$course_id." register failed check course id again.</h6>";
      }

?>




<div class="main-wrapper">
	<h1>Enroll Course</h1>
</div>


<div class="container">


<form action='enroll.php' method="post">

    <div class="input-group mb-3">
  <input type="text" class="form-control" name ="cid" placeholder="Course Id">
    <button class="btn btn-success" name = "ds" >Enroll</button>
  </div>

    </form><br><br>


    <h4>Available courses</h4><br><br>

    <ul  class="text-center text-justify list-group">
    <?php


			$query_select = "SELECT * from courses";
			$run_query = mysqli_query($con, $query_select);

		while ($result = mysqli_fetch_assoc($run_query)) {
            if($result['Available'] == true){
                echo "<li class=\"list-group-item\">".$result['course_id']."(".$result['course_name'].")</li>";
            }
	}?>
    </ul><br><br>


</div>
<?php include_once 'footer.php'; ?>
