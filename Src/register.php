<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
    <h1 style="text-align: center;" class="mt-3">WISESHADOW</h1>
    <?php
        include "nav.php";
    ?>
    <br>
    <?php
    if(isset($_SESSION['role'])){
        header("Location: index.php");
        die;
    }
    ?>
    <form action="register_save.php" method="post">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
        <?php
                    if(isset($_SESSION["add_login"])){
                        if(($_SESSION["add_login"]) == "error"){
                            echo "<div class='alert alert-danger'><i class='bi bi-exclamation-circle-fill'></i>  ชื่อบัญชีมีการใช้งานแล้ว</div>";
                        }else{
                            echo "<div class='alert alert-success'><i class='bi bi-check-circle-fill'></i>  สมัครสมาชิกสำเร็จแล้ว</div>";
                        }
                    }
                    unset($_SESSION["add_login"]);
                ?>
            <div class="card text-dark bg-white border-primary">
                <div class="card-header bg-primary text-white">กรอกข้อมูล</div>
                <div class="card-body">
                    
                        <div class="row mb-3">
                            <label for="username" class="col-md-3 col-form-label">ชื่อบัญชี:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="login" name="login" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password"  class="col-md-3 col-form-label">รหัสผ่าน</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" id="password" name="pwd" required>
                            </div>
                        </div>
                        <div class=" row mb-3">
                            <label for="name" class="col-md-3 pt-0 col-form-label">ชื่อ-นามสกุล:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label">เพศ:</label>
                            <div class="col-md-9">
                                <div class="form-check">
                                    <input type="radio" name="gender" value="m" class="form-check-input"required>
                                    <label class="form-check-label">ชาย</label>
                                </div>
                                <div>
                                    <input type="radio" name="gender" value="f" class="form-check-input"required>
                                    <label class="form-check-label">หญิง</label>
                                </div>
                                <div>
                                    <input type="radio" name="gender" value="o" class="form-check-input"required>
                                    <label class="form-check-label">อื่นๆ</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-md-3 col-form-label">อีเมล:</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3 c"></div>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> สมัครสมาชิก</button>
                            </div>
                        </div>
                    
        <div class="col-md-3"></div>
    </div>
</form>
</div>
    <br><center><a href="index.php">กลับไปหน้าหลัก</a></center>
</body>
</html>