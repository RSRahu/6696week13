<?php
include("conn.php");
include("clogin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลพนักงาน</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DataTables Bootstrap 5 CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Itim', cursive;
            background-color: #f4f6f9;
            padding-top: 50px;
            line-height: 1.6;
            font-size: 16px;
        }
        .container-fluid {
            padding: 0 50px;
        }
        .page-header {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .page-header h1 {
            font-size: 2.5rem;
            margin-bottom: 0;
        }
        .page-header h2 {
            font-size: 1.3rem;
        }
        .table-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
        }
        .table {
            font-size: 15px;
        }
        .table thead {
            background-color: #007bff;
            color: white;
            font-size: 16px;
        }
        .btn-custom {
            font-family: 'Itim', cursive;
            margin: 2px;
            font-size: 15px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #6c757d;
            font-size: 15px;
        }
        .dataTables_wrapper .dataTables_filter input,
        .dataTables_wrapper .dataTables_length select {
            font-size: 15px;
        }
        .dataTables_wrapper .pagination {
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="page-header">
            <div>
                <h1 class="mb-3">ข้อมูลพนักงาน</h1>
                <h2 class="h5">
                    ผู้เข้าสู่ระบบ: <?php echo $_SESSION["u_name"]; ?> 
                    | หน่วยงาน: <?php echo $_SESSION["u_department"]; ?>
                </h2>
            </div>
            <div>
                <a href="add.php" class="btn btn-success btn-custom">
                    <i class="fas fa-plus me-2"></i>เพิ่มข้อมูลพนักงาน
                </a>
            </div>
        </div>

        <?php
        if (isset($_GET['action_even']) == 'delete') {
            $employee_id = $_GET['employee_id'];
            $sql = "SELECT * FROM employees WHERE employee_id=$employee_id";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                $sql = "DELETE FROM employees WHERE employee_id=$employee_id";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success'>ลบข้อมูลสำเร็จ</div>";
                } else {
                    echo "<div class='alert alert-danger'>ลบข้อมูลมีข้อผิดพลาด กรุณาตรวจสอบ !!! </div>" . $conn->error;
                }
            } else {
                echo 'ไม่พบข้อมูล กรุณาตรวจสอบ';
            }
        }
        ?>

        <div class="table-container">
            <table id="example" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>รหัส</th>
                        <th>ชื่อพนักงาน</th>
                        <th>นามสกุล</th>
                        <th>ตำแหน่ง</th>
                        <th>เพศ</th>
                        <th>อายุ</th>
                        <th>เงินเดือน</th>
                        <th>จัดการข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM employees";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["employee_id"] . "</td>";
                            echo "<td>" . $row["first_name"] . "</td>";
                            echo "<td>" . $row["last_name"] . "</td>";
                            echo "<td>" . $row["department"] . "</td>";
                            echo "<td>" . $row["gender"] . "</td>";
                            echo "<td>" . $row["age"] . "</td>";
                            echo "<td>" . $row["salary"] . "</td>";

                            echo '<td>
                                <a href="show.php?action_even=del&employee_id=' . $row['employee_id'] . '" 
                                   class="btn btn-danger btn-sm btn-custom" 
                                   onclick="return confirm(\'ต้องการจะลบข้อมูลรายชื่อ ' . $row['employee_id'] . ' ' . $row['first_name'] . ' ' . $row['last_name'] . '?\')">
                                   ลบข้อมูล
                                </a>
                                <a href="edit.php?action_even=edit&employee_id=' . $row['employee_id'] . '" 
                                   class="btn btn-primary btn-sm btn-custom" 
                                   onclick="return confirm(\'ต้องการจะแก้ไขข้อมูลรายชื่อ ' . $row['employee_id'] . ' ' . $row['first_name'] . ' ' . $row['last_name'] . '?\')">
                                   แก้ไขข้อมูล
                                </a>
                            </td>';

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>ไม่พบข้อมูล</td></tr>";
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>พัฒนาโดย 664485033 กัญญากร จิวรรจนะโรดม</p>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- jQuery and DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        new DataTable('#example', {
            language: {
                search: "ค้นหา:",
                lengthMenu: "แสดง _MENU_ รายการ",
                info: "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                infoEmpty: "ไม่มีรายการ",
                infoFiltered: "(กรองจาก _MAX_ รายการทั้งหมด)",
                paginate: {
                    first: "หน้าแรก",
                    last: "หน้าสุดท้าย",
                    next: "ถัดไป",
                    previous: "ก่อนหน้า"
                }
            }
        });
    </script>
</body>
</html>