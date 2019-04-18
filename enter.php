<?php include_once 'header.php' ?>

<div class="main-wrapper">
	<h1>Marks Enter</h1>
</div>

<div class="container">


<h3>Available Tables<br><br></h3>
    <ul>
<?php
			include_once 'include/db.inc.php';

			$query_select = "SELECT * from courses c";
			$run_query = mysqli_query($con, $query_select);

		while ($result = mysqli_fetch_assoc($run_query)) {
            echo "<h6><li>".$result['course_id']."(".$result['course_name'].")</li><br></h6>";

	}

		?>
        </ul>





	<form class="form-inline" action="enter.php" method="post">
   <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control"  name="stname" placeholder="Course Id">
  </div>
    <button type="submit" class="btn btn-primary mb-2" name="stbname">Search By courseID</button></form>	<br><br>


   <?php

if(isset($_POST['stbname'])){
    $_SESSION['cid'] =  @mysqli_real_escape_string($con,$_POST['stname']);
}

@$stname =  $_SESSION['cid'];


$sql = "SELECT * from courses c,enrollment e,exam x WHERE c.course_id=e.course_id and e.exam_id = x.exam_id and e.student_id = x.student_id and c.course_id = '$stname'";
$result = mysqli_query($con,$sql);
$resultcheck = mysqli_num_rows($result);

		if($resultcheck <= 0){
			echo "<h5>Sorry that id not exist  or Please check the id</h5>";
		}else{

            echo" <form action='./enter.php' method=\"post\"><table class=\"table table-striped table-responsive\" >
		<thead>
			<th>Course Name</th>
			<th>Exam Id</th>
			<th>Student Id</th>
			<th>Marks</th>
			<th>Semester Id</th>
		</thead>";

		  $i = 0;
		  while ($result1 = mysqli_fetch_assoc($result)) {
              echo"<tr><td>".$result1['course_name']."</td>
                       <td>".$result1['exam_id']."</td>
                       <td>".$result1['student_id']."</td>
                       <td><input class=\"form-control\" type=\"text\"  name=\"marks$i\" value=\"".$result1['marks']."\"></td>
                       <td>".$result1['semester_id']."</td>
                       <td><button  class=\"btn btn-primary mb-2\" type=\"submit\" name=\"update$i\">Update</button></td>
                    </tr>";


               if(isset($_POST['update'.$i.''])){
                            $student_id = $result1['student_id'];
                            $exam_id = $result1['exam_id'];
                            $marks = $_POST['marks'.$i.''];


                            $update = "update exam set marks = $marks where student_id = '$student_id' and exam_id = '$exam_id'";
                            $re = mysqli_query($con, $update);


                        }

        $i++;


		  }
             echo"</table>";
        }



?>

</div>


<?php include_once 'footer.php' ?>
