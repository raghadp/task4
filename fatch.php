
<?php
//Establish a connection to the MySQL database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "fiverr_raghadpink2";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 if(isset($_GET['text'])){
    $text = $_GET['text'];
    if($text != ''){
    $sql = "INSERT INTO task4 (value)
    VALUES ('$text')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the statement and connection
// $conn->close();
// $conn->close();
 }



//Execute a SELECT query to fetch the data from the database
$sql = "SELECT * FROM task4";
$result = $conn->query($sql);

//Create an HTML table and loop through the retrieved data to populate the table rows
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 80%; /* Set the table width to 80% */
            margin: 0 auto; /* Center the table horizontally */
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Retrieve Data</h2></center>
    <table>
        <tr>
            <th>ID</th>
            <th>Text</th>
            <th>Created Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["value"] . "</td>";
                echo "<td>" . $row["created_at"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
//Close the database connection
$conn->close();
?>
