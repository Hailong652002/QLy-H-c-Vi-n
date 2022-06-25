<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
  <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
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
    <link rel="stylesheet" href="./assets/css/style.css">

</head>
<body>
  <div class="animation-content">
    <div class="about-content js-text-anmation">
        <p>Chào mừng bạn đến với trang quản trị Admin</p>
    </div>
  </div>
  <div>
    <div class="main">
      <div class="container-nav">
        <div class="list-group" >
          <form class="container-list-group" method="POST" action="login.php">
            <a href="#" class="list-group-item list-group-item-action js-item"><i class=""></i>Danh sách học viên</a>
            <a href="#" class="list-group-item list-group-item-action js-item">Thêm học viên</a>
            <a href="#" class="list-group-item list-group-item-action js-item">Tạo biên lai thu học phí</a>
            <a href="#" class="list-group-item list-group-item-action js-item">Xem danh sách sinh viên học lại</a>
            <a href="#" class="list-group-item list-group-item-action js-item">Xem danh sách các lớp học</a>
            <a href="#" class="list-group-item list-group-item-action js-item">Xem giờ học của các lớp</a>
            <a href="#" class="list-group-item list-group-item-action js-item">Tài khoản</a>
            <button type="submit" class="list-group-item list-group-item-action">Đăng xuất</button>
          </form>
        </div>

      </div>
      <div class="container-content">
         
        <div class="content ">
    <!-- 0 Danh sách học viên -->
      <div class="panel js-panel">
        <div class="head-panel">
          <h4>Danh sách học viên</h4>
          <hr>
        </div>
        <?php
        require_once 'config.php';
        $sql="select * from hocvien";
        if ($result = mysqli_query($link,$sql)){
          if(mysqli_num_rows($result)>0){
            echo "<table class='table'>";
            echo  "<thead>";
            echo    "<tr>";
                  echo "<th scope='col'>Mã học viên</th>";
                  echo "<th scope='col'>Họ tên</th>";
                  echo "<th scope='col'>Mã lớp</th>";
                  echo "<th scope='col'>Trạng thái</th>";
                  echo "<th scope='col'>xem</th>";
                  echo "<th scope='col'>sửa</th>";
                  echo "<th scope='col'>xóa</th>";
                echo "</tr>";
              echo "</thead>";
              echo "<tbody>";
              while ($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                  echo "<th scope='row'>" . $row['mahocvien'] . "</th>";
                  echo "<td>". $row['hoten'] ."</td>";
                  echo "<td>". $row['malop'] ."</td>";
                  echo "<td>". $row['trangthai'] ."</td>";
                  echo "<td><a href='read.php?id=".$row['mahocvien']."'><i class='bi bi-eye-fill'></i></a></td>";
                  echo "<td><a href='update.php'><i class='bi bi-pencil-square'></i></a></td>";
                  echo "<td><i class='bi bi-trash3-fill'></i></td>";
                  echo "</tr>";
              }
              echo "</tbody>";
            echo "</table>";
            mysqli_close($link);
          }
        }
      ?>
      </div>

    <!-- 1 Thong ke cac phong cho thue-->
      <div class="panel js-panel">
        <div class="head-panel">
          <h4>Thêm học viên</h4>
          <hr>
        </div>
        <form action="main.php" method="POST">
          <div>
            <p>Nhập tên: </p><input type="text" name="name">
          </div>
          <div>
            <p>Nhập địa chỉ: </p><input type="text" name="address">
          </div>
          <div>
            <p>Nhập số điện thoại: </p><input type="text" name="phone">
          </div>
          <div>
            <p>Nhập mã lớp: </p><input type="text" name="clas">
          </div>
          <input type="submit">
          <?php 
           require_once 'config.php';
           $name = $address = $phone = $clas ="";
           $sql = "insert into hocvien (`mahocvien`, `hoten`, `diachi`, `sdt`, `malop`, `trangthai`) 
           VALUES (NULL, ? , ? , ? , ? , '1')";
          $name = $_POST['name'];
          $address = $_POST['address'];
          $phone = $_POST['phone'];
          $clas = $_POST['clas'];
          if ($stmt = mysqli_prepare($link,$sql)){
            $mysql_stmt_bind_param($stmt,"ssd",$name,$address,$phone,$clas);
            $param_name = $name;
            $param_address = $address;
            $param_phone = $phone;
            $param_clas = $clas;
          }
          ?>
        </form>
      </div>
    <!-- 2 Thong Ke doanh thu-->
      <div class="panel js-panel">
        <div class="head-panel">
          <h4>Tạo biên lai thu học phí</h4>
          <hr>
        </div>
      </div>
    <!-- 3 Them phong-->
      <div class="panel js-panel">
        <div class="head-panel">
          <h4>Xem danh sách sinh viên học lại</h4>
          <hr>
        </div>
      </div>
       
    <!-- 4 Them bai viet-->
      <div class="panel js-panel">
        <div class="head-panel">
          <h4>Nhập điểm</h4>
          <hr>
        </div>
      </div>
    <!-- 5 Danh sach phong dat truoc-->
    <div class="panel js-panel">
        <div class="head-panel">
          <h4>Xem danh sách các lớp học</h4>
          <hr>
        </div>
      </div>
      <div class="panel js-panel">
        <div class="head-panel">
          <h4>Đổi mật khẩu</h4>
          <hr>
        </div>
      </div>
      
    </div>
        </div> 

      </div>
    </div>
  </div>


 
    
  <!-- As a heading -->
     
 

</body>
<script>
  var control=document.querySelectorAll('.js-item')
  var panels=document.querySelectorAll('.js-panel')
  var btn_addroom = document.querySelector('.js-addroom')

  const name = document.querySelector('.js-name');
  const cost = document.querySelector('.js-cost');
  const image = document.querySelector('.js-image');
  const describe = document.querySelector('.js-describe');
   
//set attribute
  for (var i=0;i<control.length;i++)
    control[i].setAttribute('key',i);
  
//dong tat ca panel ngoai tru panel danh muc
  for (var i = 1 ; i < panels.length; i++){
    panels[i].classList.add('close')
  }
//tao ham mo panel[i]
    function Openpanel(n){
    for (var i = 0 ; i < control.length; i++){
      if(control[i].getAttribute('key')==n){
        panels[i].classList.remove('close')
      }
      else panels[i].classList.add('close')
    }
  }
 

  for (var i=0;i<control.length;i++)
  control[i].addEventListener('click',function(e){
      switch(e.target.getAttribute('key')){
      case '0':
        panels[0].classList.add('open');
        Openpanel(0)
        console.log(control[0].getAttribute('key'))
        break;

      case '1':
         panels[1].classList.add('open');
        Openpanel(1)
        break;

      case '2':
         panels[2].classList.add('open');
      Openpanel(2)
        break;

      case '3':
         panels[3].classList.add('open');
      Openpanel(3)
    name.onchange = function(){
      title.innerHTML=name.value;
    }
    image.onchange = function(){
      var filename = "/assets/img/Room/"+ image.value.slice(image.value.lastIndexOf('\\')+1,image.value.length)
      img.src=filename;
      console.log(filename)
    }


    i = document.createElement('div')
    i.classList.add('card')
    var img =document.createElement('img')
    
    img.classList.add('card-img-top')
    var text = document.createElement('div');
    text.classList.add('card-body');
    const title = document.createElement('h5');
    title.classList.add("card-title")
    text.appendChild(title)
    i.appendChild(img)
    i.appendChild(text)
      
    const btn_addroom = document.querySelector('.js-addroom') 
    btn_addroom.addEventListener('click',function(){
      panels[0].appendChild(i)
  })
        break;
      case '4':
         panels[4].classList.add('open');
      Openpanel(4)
        break;
      case '5':
        panels[5].classList.add('open');
        Openpanel(5)
        break;

      case '6':
          Openpanel(6)
          panels[6].classList.add('open');
        break;
      default:
    }
  })



//--------------------------------------------
iconsDelete =  document.querySelectorAll('.js-icon-delete')
listitem = document.querySelectorAll('.js-prop-person')
for (var i=0;i<iconsDelete.length;i++)
    iconsDelete[i].setAttribute('key',i);

for (var i = 0;i<iconsDelete.length;i++)
  iconsDelete[i].addEventListener('click',function(e){
    switch(e.target.getAttribute('key')){
      case '0':
        listitem[0].classList.add('close');
        break;
      case '1':
        listitem[1].classList.add('close');
        break;
      case '2':
        listitem[2].classList.add('close');
        break;
      case '3':
        listitem[3].classList.add('close');
        break;
      case '4':
        listitem[4].classList.add('close');
        break;
    }
})


//--------------------------------------------

  //------------------------------------------
  var textMove = document.querySelector('.js-text-anmation')
  //------------------------------------------

</script>

</html>