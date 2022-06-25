<?php
              require_once 'config.php';
              $err = [];
              $u = "";
              $p = "";
              if (empty($_POST['username']))
                $err['username'] = "Bạn chưa nhập username";    
              else $u=$_POST['username'];
              if (empty($_POST['password']))
                $err['password'] = "Bạn chưa nhập password";
              else $p=$_POST['password'];
              $sql = "SELECT * from quanly where username='$u' and password='$p'";
              $result = $link->query($sql);
              if ($result->num_rows > 0){
                header("Location: /Qlyhocvien/main.php");
                mysqli_close($link);
              }
              else {
                mysqli_close($link);
              }   
            //while ($row = $result->fetch_assoc()){
            //echo "id:",$row["id"]. " - username: ".$row["username"]. " ". $row["password"]. "<br>";
            
?>    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous"/>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
<div class="content-login">
    <div class="container-login shadow p-3 mb-5 bg-white rounded">
      <div class="login-image">
        <img src="" alt="">
      </div>
      <section>
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12 text-black">
      
              <div class="login-head px-5 ms-xl-4">
                <i class="bi bi-person-circle" style="font-size: 40px;"></i>
                <span class="h1 fw-bold mb-0">Admin</span>
              </div>
      
              <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-2 pt-5 pt-xl-0 mt-xl-n5">
      
                <form style="width: 20rem;" action="" method="POST">
                
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example18">Tài khoản</label>
                    <input type="username" id="form2Example18" class="form-control form-control-lg" name="username"/>
                    <div class="has-error">
                      <?php echo (isset($err['username']))? $err['username']:'';
                      ?>
                    </div>
                  </div>
      
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form2Example28">Mật khẩu</label>
                    <input type="password" id="form2Example28" class="form-control form-control-lg" name="password"/>
                    <div class="has-error">
                      <?php echo (isset($err['password']))? $err['password']:'';
                      ?>
                    </div>
                  </div>
      
                  <div class="pt-1 mb-4">
                      <input type="submit" class="btn-nextslide"></input>   
                  </div>
                </form>
      
              </div>
            
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

</body>
</html>

           