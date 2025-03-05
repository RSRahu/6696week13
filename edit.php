<!DOCTYPE html>
<html lang="en">
<?php
include("conn.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
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
        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 40px;
            max-width: 800px;
        }
        .page-header {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
        }
        .page-header h1 {
            font-size: 2.5rem;
            color: #333;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .form-control, .form-select {
            font-family: 'Itim', cursive;
            font-size: 15px;
        }
        .btn-custom {
            font-family: 'Itim', cursive;
            font-size: 16px;
            margin: 0 5px;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #6c757d;
            font-size: 15px;
        }
    </style>

    <title>แก้ไขข้อมูลพนักงาน</title>
</head>

<body>
    <div class="container">
        <div class="page-header">
            <h1>แก้ไขข้อมูลพนักงาน</h1>
        </div>

        <?php
        if(isset($_GET['action_even'])=='edit'){
            $employee_id=$_GET['employee_id'];
            $sql="SELECT * FROM employees WHERE employee_id=$employee_id";
            $result=$conn->query($sql);
            if($result->num_rows>0){
                $row=$result->fetch_assoc();
            }else{
                echo"<div class='alert alert-danger'>ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ</div>";
            }
        }
        ?>

        <form action="edit_1.php" method="POST">
            <input type="hidden" name="employee_id" value="<?php echo $row['employee_id']; ?>">
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">รหัสพนักงาน</label>
                <div class="col-sm-9">
                    <p class="form-control-plaintext"><?php echo $row['employee_id']; ?></p>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ชื่อ</label>
                <div class="col-sm-9">
                    <input type="text" name="first_name" class="form-control" maxlength="50" value="<?php echo $row['first_name']; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">นามสกุล</label>
                <div class="col-sm-9">
                    <input type="text" name="last_name" class="form-control" maxlength="50" value="<?php echo $row['last_name']; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">แผนก</label>
                <div class="col-sm-9">
                    <select name="department" class="form-select">
                        <option>กรุณาระบุแผนก</option>
                        <option value="ฝ่ายไอที" <?php if ($row['department']=='ฝ่ายไอที'){ echo "selected";} ?>>ฝ่ายไอที</option>
                        <option value="ฝ่ายบุคคล" <?php if ($row['department']=='ฝ่ายบุคคล'){ echo "selected";} ?>>ฝ่ายบุคคล</option>
                        <option value="ฝ่ายการตลาด" <?php if ($row['department']=='ฝ่ายการตลาด'){ echo "selected";} ?>>ฝ่ายการตลาด</option>
                        <option value="ฝ่ายบัญชี" <?php if ($row['department']=='ฝ่ายบัญชี'){ echo "selected";} ?>>ฝ่ายบัญชี</option>
                        <option value="ฝ่ายผลิต" <?php if ($row['department']=='ฝ่ายผลิต'){ echo "selected";} ?>>ฝ่ายผลิต</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">เพศ</label>
                <div class="col-sm-9">
                    <select name="gender" class="form-select">
                        <option>กรุณาระบุเพศ</option>
                        <option value="ชาย" <?php if ($row['gender']=='ชาย'){ echo "selected";} ?>>ชาย</option>
                        <option value="หญิง" <?php if ($row['gender']=='หญิง'){ echo "selected";} ?>>หญิง</option>
                        <option value="อื่นๆ" <?php if ($row['gender']=='อื่นๆ'){ echo "selected";} ?>>LGBTQ+</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">อายุ</label>
                <div class="col-sm-9">
                    <input type="number" name="age" class="form-control" min="18" max="100" value="<?php echo $row['age']; ?>" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">เงินเดือน</label>
                <div class="col-sm-9">
                    <input type="number" name="salary" class="form-control" min="0" value="<?php echo $row['salary']; ?>" required>
                </div>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-custom">บันทึกข้อมูล</button>
                <button type="reset" class="btn btn-danger btn-custom">ยกเลิก</button>
            </div>
        </form>

        <div class="footer mt-4">
            <p>พัฒนาโดย 664485033 กัญญากร จิวรรจนะโรดม</p>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>