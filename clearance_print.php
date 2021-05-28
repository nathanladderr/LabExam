 <html>
<head>
	<title>BARANGAY CLEARANCE SYSTEM</title>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initialscale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link type="text/css" rel="stylesheet" href="css/bootstrap.css">
  
	<style>
		.print{
			text-align: justify;
		}
		.flex-parent{
			display: flex;
		}
		.flex1{
			flex: 1;
		}
		img{
			width: 130px;
			height: 130px;
		}
		.margin-top-50{
			margin-top: 50px;
		}
		.uppercase{
			text-transform: uppercase;
		}
	</style>
</head>
<body>
	<div class="container-fluid print">
		<div class="flex-parent">
			
					<?php 
						include 'database/db_connection.php';
						$select = mysqli_query($dbcon,"SELECT * FROM tblbarangay");
						while ($row = mysqli_fetch_assoc($select)) {?>
						<div class="flex1 text-left">
							<div class="img">
								<img src="image/<?php echo $row['Logo'] ?>">
							</div>
						</div>
						<div class="flex1 text-center">
							<h5>Republic of the Philippines</h5>
							<h5>Province of Leyte</h5>
							<h5>Municipality of <?php echo $row['Municipality']; ?> </h5>
							<h5>Barangay <?php echo $row['Barangay']; ?> </h5>
						</div>
					<?php
						}
					?>
			<div class="flex1">
				<div class="text-right">
					<?php 
						include 'database/db_connection.php';
						$select = mysqli_query($dbcon,"SELECT * FROM tblofficials WHERE role = 'Barangay Captain' ");
						while ($row = mysqli_fetch_assoc($select)) {?>
							 <?php 
                                $count = strlen($row['img']);
                                if ($count < 100) {?>
                                <td><img class="image" src="image/<?php echo $row['img'] ?>"></td>
                              <?php
                                }else{?>
                                <td><img class="image" src="<?php echo $row['img'] ?>"></td>
                              <?php
                                }
                              ?>
					<?php
						}
					?>
				</div>
			</div>
		</div>
		<div class="text-center">
			<h3 style="text-decoration: underline;">OFFICE OF THE PUNONG BARANGAY</h3>
		</div>
		<div class="content margin-top-50">
			<h4>SUBJECT: <b style="text-decoration: underline;">BARANGAY CLEARANCE</b></h4>
		</div>
		<div class="content margin-top-50">
			<h4>TO WHOM IT MAY CONCERN:</h4>
		</div>
		<?php 
			include 'database/db_connection.php';
			$id = $_GET['id'];
			$select = mysqli_query($dbcon,"SELECT * FROM tblresident WHERE id = '$id' ");
			while ($row = mysqli_fetch_assoc($select)) {?>
				<div class="content margin-top-50" style='text-indent: 50px;'>
					<h4>THIS IS TO CERTIFY that <b class="uppercase"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></b>
						legal age and a bonafide resident of Barangay <?php echo $_GET['barangay'].','
					.$_GET['municipal'].','.$_GET['province']; ?>, is personally known to
						me to be a person of good moral character and law-abiding citizen in the community.</h4>
				</div>
				<div class="content margin-top-50" style='text-indent: 50px;'>
					<h4>That <b class="uppercase"><?php echo $row['FirstName'] . " " . $row['LastName']; ?></b>  has not been convicted
					 of any crime whatsoever neither is there any pending case filed against her before the 
					 Barangay Court of Justice on the said barangay.</h4>
				</div>
				<div class="content margin-top-50" style='text-indent: 50px;'>
					<h4>This certification is issued to the interested party for whatever legal and lawful 
						purpose this may serve her most.</h4>
				</div>
				<div class="content margin-top-50" style='text-indent: 50px;'>
					<h4>
						GIVEN this <b><span id='date'></span></b> day of <b><span id='month'></span> <span id='year'></span></b> at Barangay <?php echo $_GET['barangay'].','
					.$_GET['municipal'].','.$_GET['province']; ?> Philippines.
					</h4>
				</div>
		<?php
			}
		?>

		<?php 
			include 'database/db_connection.php';
			$select = mysqli_query($dbcon,"SELECT * FROM tblbarangay");
			while ($row = mysqli_fetch_assoc($select)) {?>
		<div class=" margin-top-50">
			<div class="margin-top-50">
					<div class="flex-parent">
						<div class="flex1"></div>
						
						<div class="flex1">
							<h4 class="text-center">Certified Correct</h4>
							<h4 class="uppercase text-center">
								<?php
				                   $select2 = mysqli_query($dbcon,"SELECT * FROM tblofficials WHERE role = 'Barangay Captain'");
				                   $row2 = mysqli_fetch_assoc($select2);
				                   echo $row2['FirstName']." ".$row2['MiddleName'].". ".$row2['LastName'];
				                ?>
							</h4>
							<h4 class="text-center">Punong Barangay</h4>
						</div>
					</div>
				
			</div>
		</div>
		<div class=" margin-top-50">
			<h4 style="width: 100xp;">Paid OR No <span style="margin-left: 20px;">:<?php echo $_GET['OR'] ?></span></h4>
			<h4>Issued on <span style="margin-left: 38px;"></span>:<span id="month2"></span> <span id="date2"></span> <span id="year2"></span><h4>
			<h4>Issued at <span  style="margin-left: 43px;"></span>:Barangay <?php echo $row['Barangay'] . " " . $row['Municipality']. ", ". $row['Province'] ; ?></h4>
		</div>
		<?php 
			}
		?>
	</div>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
	var y = new Date();
	var m = new Date();
	var d = new Date();
	var month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
	var day = d.getDate("1-31");

	if (day == 1 && day != 11) {
		document.getElementById("date").innerHTML = d.getDate("1-31") + "st";
	}else if(day == 2 && day != 12){
		document.getElementById("date").innerHTML = d.getDate("1-31") + "nd";
	}else if(day == 3 && day != 13){
		document.getElementById("date").innerHTML = d.getDate("1-31") + "rd";
	}else{
		document.getElementById("date").innerHTML = d.getDate("1-31") + "th";
	}
	document.getElementById("year").innerHTML = y.getFullYear("yyyyy");
	document.getElementById("month").innerHTML = month[m.getMonth("0-11")];

	document.getElementById("date2").innerHTML = d.getDate("1-31") + ",";
	document.getElementById("year2").innerHTML = y.getFullYear("yyyyy");
	document.getElementById("month2").innerHTML = month[m.getMonth("0-11")];

	function ordinal(i){
		var a = i % 10,
			b = i % 100;

		if (a == 1 && b != 11) {
			return i + "st";
		}
		if (a == 2 && b != 12) {
			return i + "nd";
		}
		if (a == 3 && b != 13) {
			return i + "rd";
		}
		return i + "th";
	}
	
</script>
<script>
	function myFunction() {
	    window.print();
	}
	myFunction();
</script>
</body>
</html>