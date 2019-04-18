<?php include_once 'header.php' ?>

<div class="main-wrapper">
	<h1>Achivements</h1>
</div><br><br>


<div class="container">
	<h6>Student Marks detail</h6>
	<table class="table table-bordered">
		<thead>
			<th>Subject</th>
			<th>Marks</th>

		</thead>

		<?php include_once 'include/db.inc.php';

			$f = $_SESSION['uid'];

			$search = @mysqli_real_escape_string($con,$_POST['search']);
			$sql = "SELECT course_name, marks from courses c,enrollment e,exam x WHERE c.course_id=e.course_id and e.exam_id = x.exam_id and x.student_id= e.student_id and x.student_id = '$f'";
			$result = mysqli_query($con,$sql);
			$resultcheck = mysqli_num_rows($result);

			$totalgpa =0.0;
			$div = 0.0;




                while($result1 = mysqli_fetch_assoc($result)){
		?>



					<tr>
						<td><?php echo $result1['course_name'];?></td>
						<td><?php
						if( $result1['marks'] != null){
						$div +=  (float)substr($result1['marks'],-1);

						$str = "SELECT * FROM gpa";
						$re = mysqli_query($con,$str);
						while($rel = mysqli_fetch_assoc($re)){
							if($result1['marks']<=$rel['topmark'] && $result1['marks']>=$rel['lowmark']){
						$totalgpa += $rel['gpa']*(float)substr($result1['marks'],-1);
						break;
					}
					}

					}
						echo $result1['marks'];?></td></tr>

        <?php } ?>


	</table>
        <br><br>

	<div class="container">

		<h6>Total: <?php echo $totalgpa/$div; ?></h6>

	</div><br><br>
	</div>



<?php include_once 'footer.php' ?>
