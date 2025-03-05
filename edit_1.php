<!DOCTYPE html>
<html lang="en">
<?php
//เชื่อมต่อฐานข้อมูล
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google Fonts - Itim -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Itim', cursive;
            background-color: #f4f6f9;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 50px;
        }

        .alert {
            margin-top: 20px;
        }
    </style>

    <title>แก้ไขข้อมูลพนักงาน</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-4">แก้ไขข้อมูลพนักงาน</h1>
            </div>
        </div>

        <?php
        // เริ่มเก็บข้อมูล
        $employee_id = $_POST['employee_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $department = $_POST['department'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $salary = $_POST['salary'];

        // เขียนคำสั่ง SQL
        $sql = "UPDATE employees SET first_name='$first_name',last_name='$last_name',department='$department',gender='$gender',age='$age',salary='$salary' WHERE employee_id=$employee_id";

        // รับคำสั่ง sql
        if ($conn->query($sql) === TRUE) {
            echo '<div class="alert alert-success text-center">
                    ยินดีด้วยครับ คุณได้ทำการแก้ไขข้อมูลเรียบร้อย!!!
                  </div>';

            echo '<div class="text-center mt-3">
                    <a href="show.php" class="btn btn-primary btn-lg">กลับหน้าแสดงข้อมูล</a>
                  </div>';
        } else {
            echo '<div class="alert alert-danger text-center">
                    มีข้อผิดพลาด: ' . $conn->error . '
                  </div>';
        }
        // ปิดการเชื่อมต่อ
        $conn->close();
        ?>

        <footer class="text-center mt-4 text-muted">
            <small>พัฒนาโดย 664485033 กัญญากร จิวรรจนะโรดม 66/96</small>
        </footer>
    </div>

    <!-- Bootstrap 5 JS (optional, but recommended) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>