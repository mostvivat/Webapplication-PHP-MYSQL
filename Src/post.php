<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>webboard kakkak</title>
    <!-- icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
    <h1 style="text-align: center;" class="mt-3">WISESHADOW</h1>
        <?php include "nav.php" ?>
        <br>
        

        
        <div class="card text-dark bg-white border-primary">
            <div class="card-header bg-primary text-white" >
                <?php
                    $id = $_GET["id"];
                    
                    $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
                    $sql = "SELECT * FROM post where id=$id";
                    $query = $conn->query($sql);
                    $result = $query->fetch(PDO::FETCH_ASSOC);
                    
                    $title = $result["title"];
                    $content = $result["content"];
                    $post_date = $result["post_date"];
                    
                    echo "<span style='float:right'>(id กระทู้หมายเลข $id)</span>";
                    echo $title;
                ?>
            </div>
            <div class ="card-body">
                <?php
                    
                    $sql = "SELECT u.login FROM user u,post p WHERE u.id = p.user_id and p.id = $id";
                    $query = $conn->query($sql);
                    $result = $query->fetch(PDO::FETCH_ASSOC);
                    $username = $result["login"]; 

                    echo "$content <BR><BR><BR>";
                    echo "$username - $post_date <BR>";
                    $conn = null;
                ?>
            </div>
        </div>
        <br>


       
        <?php
            $conn = new PDO("mysql:host=localhost;dbname=webboard;charset=utf8","root","");
            
            $sql_comment = "SELECT c.content,u.name,c.post_date FROM comment c,user u WHERE u.id = c.user_id and c.post_id=$id ORDER BY c.post_date";
        ?>
        
        <?php 
            $i=0;
            foreach($conn->query($sql_comment) as $row){
                $i++;
        ?>
                <div class="card text-dark bg-white border-info mb-4 text-start">
                    <div class="card-header bg-info text-white "><?php echo "ความคิดเห็นที่ ".$i;?></div>
                    <div class="card-body">
                        <?php echo $row["content"];?> 
                        <br><br>
                        <?php echo $row["name"]." - ".$row["post_date"];?> 
                    </div>
                </div>
        <?php
            }
            $conn = null;
        ?>
        <br>
        <?php
            if(isset($_SESSION['id'])){
        ?>
        
        <div class="card text-dark bg-white border-success" >
            <div class="card-header bg-success text-white" >แสดงความคิดเห็น</div>
            <div class ="card-body">
                <form action="post_save.php" method="post">
                    <input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-lg-10">
                            <textarea name="comment" class="form-control" rows="8"></textarea>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-lg-12">
                            <center>
                                <button type="submit" class="btn btn-success btn-sm text-white">
                                <i class="bi bi-box-arrow-up-right me-1"></i></i>ส่งข้อความ </button>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <?php
            }
        ?>
    </div>
    
</body>
</html>