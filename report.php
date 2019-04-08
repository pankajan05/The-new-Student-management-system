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
			$sql = "SELECT course_name, marks from courses c,enrollment e,exam x WHERE c.course_id=e.course_id and e.exam_id = x.exam_id and x.student_id = '$f'";
			$result = mysqli_query($con,$sql);
			$resultcheck = mysqli_num_rows($result);

			$total =0;
		
			
		
		 
                while($result1 = mysqli_fetch_assoc($result)){
		?>

		
				
					<tr>
						<td><?php echo $result1['course_name'];?></td>
						<td><?php 
						$total += $result1['marks'];
						echo $result1['marks'];?></td></tr>
					
        <?php } ?>
	 

	</table>
        <br><br>
    
	<div class="container">
		
		<h6>Total: <?php echo $total; ?></h6>
		
	</div><br><br>
	</div>



<?php include_once 'footer.php' ?>