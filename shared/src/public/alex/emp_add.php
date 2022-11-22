<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Add Employee Record</title>
</head>
<body>
    <header>
        <h1>Employee Management System</h1>
        <a href="."><button type="button" class="btn btn-light">Home</button></a>
    </header>
    <div class="main">
        <div class="view">
            <div class="view-header">Add Employee Record</div>
            <div class="view-body">
            <?php
                    include 'credentials.php';



                    $emp_id = $_GET["emp_id"];
                    $last_name = $_GET["last_name"];
                    $first_name = $_GET["first_name"];
                    $gender = $_GET["gender"];
                    $hire_date = $_GET["hire_date"];
                    $salary = $_GET["salary"];
                    $title = $_GET["title"];

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) die("MySQL Connection Failed: " . $conn->connect_error);
                    $sql = "insert into employees (emp_no, last_name, first_name, gender, hire_date, birth_date) values ('".$emp_id."', '".$last_name."', '".$first_name."', '".$gender."', '".$hire_date."', '0000-00-00')";
                    echo "<p>$sql</p>";
                    $result = $conn->query($sql);
                    if ($conn->query($sql) !== TRUE) echo "<p>Error: $conn->error</p>";
                    $conn->close();

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) die("MySQL Connection Failed: " . $conn->connect_error);
                    $sql = "insert into salaries (emp_no, salary, from_date, to_date) values ('".$emp_id."', '".$salary."', '0000-00-00', '0000-00-00')";
                    $result = $conn->query($sql);
                    if ($conn->query($sql) !== TRUE) echo "<p>Error: $conn->error</p>";
                    $conn->close();

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) die("MySQL Connection Failed: " . $conn->connect_error);
                    $sql = "insert into titles (emp_no, title, from_date, to_date) values ('".$emp_id."', '".$title."', '0000-00-00', '0000-00-00')";
                    $result = $conn->query($sql);
                    if ($conn->query($sql) !== TRUE) echo "<p>Error: $conn->error</p>";
                    $conn->close();
                    

                    echo "success";
                ?>
                <a href="./emp_add.html"><input class="btn btn-secondary full-width" value="Back"></a>
            </div>
        </div>
    </div>