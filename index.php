<?php

include "action.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Pharmacist Sylvester</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width-device-width, initial-scale-1">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h1>Pharmacist Sylvester <small>Medicine Stock</small></h1>
		</div>
	
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading">Enter Medicine Details</div>
					<div class="panel-body">
						<?php
							if(isset($_GET["update"])){
								//php 7
								$id = $_GET["id"] ?? null;
								$where = array("id"=>$id,);
								$row = $obj->select_record("Medicines",$where);
						?>
								<form action="action.php" method="post">
									<table class="table table-hover">
										<tr>
											<td>
												<input type="hidden" name="id" value="<?php echo $id ; ?>" >
											</td>
										</tr>
										<tr>
											<td>Medicine Name</td>
											<td><input type="text"  name="name" class="form-control" value="<?php echo $row["m_name"];?>" placeholder="Enter Medicine name"></td>
										</tr>
										<tr>
											<td>Quantity</td>
											<td><input type="text" name="qty" class="form-control" value="<?php echo $row["qty"];?>" placeholder="Enter Quantity"></td>
										</tr>
										<tr>
											<td colspan="2" align="center"><input type="submit" name="edit" class="btn btn-primary"  value="Update"></td>
										</tr>
									</table>
								</form>
							<?php

							}else{
								?>
								<form action="action.php" method="post">
									<table class="table table-hover">
										<tr>
											<td>Medicine Name</td>
											<td><input type="text" name="name" class="form-control" placeholder="Enter Medicine name"></td>
										</tr>
										<tr>
											<td>Quantity</td>
											<td><input type="text" name="qty" class="form-control" placeholder="Enter Quantity"></td>
										</tr>
										<tr>
											<td colspan="2" align="center"><input type="submit" name="submit" class="btn btn-primary" placeholder="Enter Medicine name" value="store"></td>
										</tr>
									</table>
								</form>
						<?php
							}
						?>
						
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<table class="table table-bordered">
						<tr>
							<th>#</th>
							<th>Medicine Name</th>
							<th>Available Stock</th>
							<th>&nbsp;</th>
							<th>&nbsp;</th>
						</tr>
						<?php
							$myrow = $obj->fetch_record("Medicines");
							foreach ($myrow as $row) {
								//breaking point
								?>

								<tr>
							<td><?php echo $row["id"]; ?></td>
							<td><?php echo $row["m_name"];?></td>
							<td><b><?php echo $row["qty"]; ?></b></td>
							<td><a href="index.php?update=1&id=<?php echo $row["id"]; ?>" class="btn btn-info">Edit</a></td>
							<td><a href="action.php?delete=1&id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
							
						</tr>

							<?php

							}

						?>

						
					</table>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
		
	</div>





	<script src="js/jquery-3.2.0.min.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>

