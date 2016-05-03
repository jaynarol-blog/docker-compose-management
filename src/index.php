<?php

    $mysqli = new mysqli('mysql', 'root', 'password', 'world');
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
	$countries = $mysqli->query("SELECT Code, Code2, Name, Region, Population FROM Country ORDER BY RAND() LIMIT 20");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>First Docker Compose</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>See the World with Docker Compose</h2>
                <br/>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="text-center" >
                    <img src="/assets/img/world.jpg" class="img-thumbnail">
                    <div>
                        <h3>Jaynarol Nova</h3>
                        <h5><strong>Full Stack Devloper</strong></h5>
                        <p>This table just random 20 countries for you.</p>
                        <hr>
                    </div>
                </div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Region</th>
							<th class="text-right">Population</th>
						</tr>
					</thead>
					<tbody>

						<?php
						while($row = $countries->fetch_assoc()) {
							echo '<tr>';
							echo '<th scope="row">'.$row["Code"].'</th>';
							echo '<td><img src="/assets/img/flags/'.strtolower($row["Code2"]).'.png" /> '.$row["Name"].'</td>';
							echo '<td>'.$row["Region"].'</td>';
							echo '<td class="text-right">'.number_format($row["Population"]).'</td>';
							echo '</tr>';
						} 
						?>

					</tbody>
				</table>
            </div>
        </div>
    </div>

</body>
</html>