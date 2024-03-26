<?php
// In script.php
//include "database.php";

// MySQL connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "insu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



// Retrieve form data for home insurance
$insurance = isset($_POST['insurance']) ? $_POST['insurance'] : '';
$property_id = isset($_POST['property_id']) ? $_POST['property_id'] : '';
$year_built = isset($_POST['year_built']) ? $_POST['year_built'] : '';
$construction_type = isset($_POST['construction_type']) ? $_POST['construction_type'] : '';

// Check if any home insurance data is provided
if (!empty($insurance) || !empty($property_id) || !empty($year_built) || !empty($construction_type)) {
  // SQL query to insert home insurance data
  $sql_home = "INSERT INTO home_insu (insurance, property_id, year_built, construction_type) 
                 VALUES ('$insurance', '$property_id', '$year_built', '$construction_type')";

  // Execute the home insurance insert query
  if ($conn->query($sql_home) === TRUE) {
    echo "New record created successfully for home insurance<br> Go back to find more insurances";
  } else {
    echo "Error: " . $sql_home . "<br>" . $conn->error;
  }
}




// Retrieve form data for auto insurance
$dl = isset($_POST['dl']) ? $_POST['dl'] : '';
$rc = isset($_POST['rc']) ? $_POST['rc'] : '';
$autoinsurance_type = isset($_POST['autoinsurance_type']) ? $_POST['autoinsurance_type'] : '';


if (!empty($dl) || !empty($rc) || !empty($autoinsurance_type)) {

  $sql_auto = "INSERT INTO auto_insu (dl, rc, autoinsurance_type) 
             VALUES ('$dl', '$rc', '$autoinsurance_type')";


  if ($conn->query($sql_auto) === TRUE) {
    echo "New record created successfully for auto insurance<br>Go back to find more insurances";
  } else {
    echo "Error: " . $sql_auto . "<br>" . $conn->error;
  }
}


// Retrieve form data for travel insurance
$duration = isset($_POST['duration']) ? $_POST['duration'] : '';
$destination = isset($_POST['destination']) ? $_POST['destination'] : '';
$mode_of_transport = isset($_POST['mode_of_transport']) ? $_POST['mode_of_transport'] : '';
$travelinsurance_type = isset($_POST['travelinsurance_type']) ? $_POST['travelinsurance_type'] : '';

if (!empty($duration) || !empty($destination) || !empty($mode_of_transport) || !empty($travelinsurance_type)) {

  $sql_travel = "INSERT INTO travel_insu (duration, destination, mode_of_transport, travelinsurance_type) 
              VALUES ('$duration', '$destination',  '$mode_of_transport', '$travelinsurance_type')";


  if ($conn->query($sql_travel) === TRUE) {
    echo "New record created successfully for travel insurance<br>Go back to find more insurances";
  } else {
    echo "Error: " . $sql_travel . "<br>" . $conn->error;
  }
}




// Retrieve form data for health insurance
$husband = isset($_POST['husband']) ? $_POST['husband'] : '';
$wife = isset($_POST['wife']) ? $_POST['wife'] : '';
$mother = isset($_POST['mother']) ? $_POST['mother'] : '';
$father = isset($_POST['father']) ? $_POST['father'] : '';
$kid1 = isset($_POST['kid1']) ? $_POST['kid1'] : '';
$kid2 = isset($_POST['kid2']) ? $_POST['kid2'] : '';
$kid3 = isset($_POST['kid3']) ? $_POST['kid3'] : '';
$kid4 = isset($_POST['kid4']) ? $_POST['kid4'] : '';
$kid5 = isset($_POST['kid5']) ? $_POST['kid5'] : '';

// Check if any of the fields are not empty
if (!empty($husband) || !empty($wife) || !empty($mother) || !empty($father) || !empty($kid1) || !empty($kid2) || !empty($kid3) || !empty($kid4) || !empty($kid5)) {
  // SQL query to insert data into the health insurance table
  $sql_health = "INSERT INTO health_insu (husband, wife, mother, father, kid1, kid2, kid3, kid4, kid5) 
                   VALUES ('$husband', '$wife', '$mother', '$father', '$kid1', '$kid2', '$kid3', '$kid4', '$kid5')";

  // Execute the SQL query
  if ($conn->query($sql_health) === TRUE) {
    echo "New record created successfully for health insurance<br>Go back to find more insurances";
  } else {
    echo "Error: " . $sql_health . "<br>" . $conn->error;
  }
}





// Retrieve form data for ticket
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$query = isset($_POST['query']) ? $_POST['query'] : '';

if (!empty($name) || !empty($email) || !empty($query)) {

  $sql_ticket = "INSERT INTO ticket (name, email, query) 
             VALUES ('$name', '$email', '$query' )";


  if ($conn->query($sql_ticket) === TRUE) {
    echo "We will contact you soon<br>Go back to find more insurances";
  } else {
    echo "Error: " . $sql_ticket . "<br>" . $conn->error;
  }
}












// Close connection
$conn->close();
?>



</table>
</body>


</html>