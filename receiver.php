<!DOCTYPE html>
<html lang="pl">
<head>
<title>Dziękuję za wypełnienie ankiety</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
include 'credentials.php';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // prepare sql and bind parameters
  $stmt = $conn->prepare("INSERT INTO wyniki (Q1, Q2, Q3, Q4, Q5) VALUES (:q1, :q2, :q3, :q4, :q5)");
  $stmt->bindParam(':q1', $Q1);
  $stmt->bindParam(':q2', $Q2);
  $stmt->bindParam(':q3', $Q3);
  $stmt->bindParam(':q4', $Q4);
  $stmt->bindParam(':q5', $Q5);

  // insert a row
  if (array_key_exists("p1", $_REQUEST)) {
	$Q1 = test_input(implode(",", $_REQUEST["p1"]));
  } else {
	$Q1 = "";
  }
  if (array_key_exists("p2", $_REQUEST)) {
	$Q2 = test_input($_REQUEST["p2"]);
  } else {
	$Q2 = "";
  }
  $Q3 = test_input($_REQUEST["p3"]);
  $Q4 = test_input($_REQUEST["p4"]);
  $Q5 = test_input($_REQUEST["p5"]);
  $stmt->execute();
} catch(PDOException $e) {
  echo "<br>" . $e->getMessage();
}
$conn = null;
?>

<body>
<p>Dziękuję za wypełnienie ankiety.</p>
</body>
</html>