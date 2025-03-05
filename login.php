<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    
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
    margin: 0;
    background-attachment: fixed;
}
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    width: 100%;
}
.login-container {
    background-color: white;
    border-radius: 25px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    padding: 50px; /* Increased padding */
    width: 100%;
    max-width: 500px; /* Increased max-width */
    border: 2px solid rgba(255,255,255,0.5);
}
.login-header {
    text-align: center;
    margin-bottom: 30px; /* Added more space below header */
}
.input-group {
    margin-bottom: 20px; /* Slightly more space between input fields */
}
.btn-custom {
    padding: 12px; /* Slightly larger buttons */
    font-size: 1rem;
}
.developer-badge {
    margin-top: 30px; /* More space above developer badge */
    text-align: center;
    color: #6c757d;
    font-size: 0.9rem;
}
        /* Rest of the previous CSS remains the same */
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h1 class="login-header">
                <i class="bi bi-person-circle"></i>
                เข้าสู่ระบบ
            </h1>
            
            <form action="chklogin.php" method="POST">
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <input type="text" class="form-control" id="u_id" name="u_id" placeholder="ชื่อผู้ใช้" maxlength="30" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" id="u_passwd" name="u_passwd" placeholder="รหัสผ่าน" maxlength="30" required>
                    </div>
                </div>
                
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-custom">
                        <i class="bi bi-box-arrow-in-right"></i> เข้าสู่ระบบ
                    </button>
                    <button type="reset" class="btn btn-outline-secondary btn-custom">
                        <i class="bi bi-x-circle"></i> ยกเลิก
                    </button>
                </div>
            </form>
            
            <div class="developer-badge">
                <i class="bi bi-code-slash"></i>
                พัฒนาโดย 664485033 กัญญากร จิวรรจนะโรดม
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>