<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Search Employee Record</title>
</head>
<body>
    <header>
        <h1>Employee Management System</h1>
        <a href="."><button type="button" class="btn btn-light">Home</button></a>
    </header>
    <div class="main">
        <div class="view">
            <div class="view-header">Search Employee Record</div>
            <div class="view-body">
                <?php
                    include 'credentials.php';

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        echo "failed";
                        die("MySQL Connection Failed: " . $conn->connect_error);
                    }

                    $emp_id = $_GET["emp_id"];
                    $user_data = ["Employee ID" => $emp_id];

                    $sql = "SELECT * FROM employees where emp_no = $emp_id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $user_data["Last Name"] = $row["last_name"];
                        $user_data["First Name"]  = $row["first_name"];
                        $user_data["Gender"]  = $row["gender"];
                        $user_data["Hire Date"]  = $row["hire_date"];
                    } else echo "No `employees` Records Found";

                    $sql = "SELECT salary FROM salaries where emp_no = $emp_id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $user_data["Salary"]  = $row["salary"];
                    } else echo "No `salaries`Records Found";

                    $sql = "SELECT title FROM titles where emp_no = $emp_id";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $user_data["Position Title"]  = $row["title"];
                    } else echo "No `titles`Records Found";
                    
                    $conn->close();



                    foreach ($user_data as $key => $value) {
                        echo '<div class="input-group mb-3"><span class="input-group-text">'.$key.'</span><input type="text" class="form-control" value='.$value.' disabled></div>';
                    }
                    
                ?>
                <a href="./emp_search.html"><input class="btn btn-secondary full-width" value="Back"></a>
            </div>
        </div>
    </div>