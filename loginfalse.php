<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตรวจสอบ Login</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Google Fonts - Itim -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
    
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Itim', cursive;
            background-color: #f0f4f8;
            background-image: 
                radial-gradient(at 70% 30%, hsla(212,84%,85%,1) 0px, transparent 50%),
                radial-gradient(at 30% 70%, hsla(191,84%,85%,1) 0px, transparent 50%);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .error-container {
            background-color: white;
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            text-align: center;
        }
        .error-icon {
            font-size: 4em;
            color: #dc3545;
            margin-bottom: 20px;
        }
        .developer-badge {
            background-color: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            padding: 10px;
            margin-top: 20px;
            text-align: center;
            color: #718096;
            font-size: 0.9em;
        }
        .developer-badge i {
            margin-right: 8px;
            color: #3498db;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-container">
            <i class="bi bi-exclamation-triangle-fill error-icon"></i>
            
            <h1 class="mb-4">Login ผิดพลาด</h1>
            
            <h2 class="mb-4">กรุณาตรวจสอบ ชื่อผู้ใช้และรหัสผ่าน</h2>
            
            <div class="d-grid col-6 mx-auto">
                <a href="login.php" class="btn btn-primary btn-lg">
                    <i class="bi bi-arrow-left me-2"></i>กลับสู่หน้าจอ Login
                </a>
            </div>
            
            <div class="developer-badge mt-4">
                <i class="bi bi-code-slash"></i>
                พัฒนาโดย 664485033 กัญญากร จิวรรจนะโรดม
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>