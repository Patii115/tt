<?php
include 'credentials.php';
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = <<<XXX
CREATE TABLE `wyniki` (
  `ID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `Q1` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `Q2` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `Q3` float DEFAULT NULL,
  `Q4` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL,
  `Q5` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
XXX;

  $conn->exec($sql);
  echo "Table created successfully";
} catch(PDOException $e) {
  echo "<br>" . $e->getMessage();
}
$conn = null;
?>