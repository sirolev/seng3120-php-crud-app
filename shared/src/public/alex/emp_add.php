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
        <a href="."><button type="button" class="btn btn-outline-light">Home</button></a>
    </header>
    <div class="main">
        <div class="view">
            <div class="view-header">Add Employee Record</div>
            <div class="view-body">
            <?php
                    include 'credentials.php';

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) die("MySQL Connection Failed: " . $conn->connect_error);

                    $emp_no = $_GET["emp_no"];
                    $last_name = $_GET["last_name"];
                    $first_name = $_GET["first_name"];
                    $gender = $_GET["gender"];
                    $hire_date = $_GET["hire_date"];
                    $salary = $_GET["salary"];
                    $title = $_GET["title"];

                    $failed = FALSE;
                   
                    $sql = "INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date) VALUES ('$emp_no','0000-00-00' ,'$first_name' , '$last_name', '$gender', '$hire_date')";
                    if ($conn->query($sql) !== TRUE) {
                        $failed = TRUE;
                        echo "<p>$sql</p><p>Error: $conn->error</p>";
                    }

                    $sql = "insert into salaries (emp_no, salary, from_date, to_date) values ('".$emp_no."', '".$salary."', '0000-00-00', '0000-00-00')";
                    if (!$failed && $conn->query($sql) !== TRUE) {
                        $failed = TRUE;
                        echo "<p>$sql</p><p>Error: $conn->error</p>";
                    }

                    $sql = "insert into titles (emp_no, title, from_date, to_date) values ('".$emp_no."', '".$title."', '0000-00-00', '0000-00-00')";
                    if (!$failed && $conn->query($sql) !== TRUE) {
                        $failed = TRUE;
                        echo "<p>$sql</p><p>Error: $conn->error</p>";
                    }

                    if (!$failed) {
                        echo "<p>Employee Record Created Successfully</p>";
                        echo '<a href="./emp_search.php?emp_no='.$emp_no.'"><input class="btn btn-primary full-width ctrl-btn" type="button" value="View Record"></a>';
                    }
                ?>
                <a href="./emp_add.html"><input class="btn btn-secondary full-width" type="button" value="Back"></a>
            </div>
        </div>
    </div>
</body>
</html>