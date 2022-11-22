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
                    if ($conn->connect_error) die("MySQL Connection Failed: " . $conn->connect_error);

                    $emp_id = $_GET["emp_id"];
                    $user_data = [];

                    $sql = "select a.last_name, a.first_name, a.gender, a.hire_date, b.salary, c.title from employees a join salaries b on b.emp_no = a.emp_no join titles c on c.emp_no = a.emp_no where a.emp_no = $emp_id";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $user_data["Employee ID"] = $emp_id;
                        $user_data["Last Name"] = $row["last_name"];
                        $user_data["First Name"]  = $row["first_name"];
                        $user_data["Gender"]  = $row["gender"];
                        $user_data["Hire Date"]  = $row["hire_date"];
                        $user_data["Salary"]  = $row["salary"];
                        $user_data["Title"]  = $row["title"];
                    } else echo "<p>No Records Found</p>";

                    $conn->close();

                    foreach ($user_data as $key => $value) {
                        echo '<div class="input-group mb-3"><span class="input-group-text">'.$key.'</span><input type="text" class="form-control" value='.$value.' disabled></div>';
                    }
                ?>
                <a href="./emp_search.html"><input class="btn btn-secondary full-width" value="Back"></a>
            </div>
        </div>
    </div>