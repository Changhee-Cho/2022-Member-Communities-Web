<?php
include "db_connect.inc";
session_start();
$lg=mysqli_query($db, "select * from p_members where id='$_SESSION[id]'");
if($_SESSION!=TRUE)
	header('Location: ./login/login.html');
else if($lg!=1 or $_SESSION[logined]!=1)
{
	session_destroy();
	header('Location: ./login/login.html');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>배재대 커뮤니티, 배재콕</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/new_post.css">
  

</head>
<body>


<section id="container">


    <header id="header">
        <section class="inner">

            <h1 class="logo">
                <a href="cont.php">
                   
                    <img src = 'test.png'  class='sprite_pcu_icon' ></img>
                </a>
            </h1>

            <div class="search_box">
                <form method="post" action="mainsearch.php" >
                <input type="text" placeholder="검색" id="search-field" name=query>

                <div class="fake_field">
                    <span class="sprite_small_search_icon"></span>
                    <span>검색</span>
                </div>
				</form>
            </div>

            <div class="right_icons">
                <a href="upload.php"><div class="sprite_camera_icon"></div></a>
		<a href="profile.php"><div class="sprite_user_icon_outline"></div></a>
                <a href="notice1.php"><div class="sprite_heart_icon_outline"></div></a>
		<a href="logout.php"><img src="imgs/log_out.png" class="sprite_compass_icon"></div></a>

            </div>

        </section>

    </header>



    <div id="main_container">

        <div class="post_form_container">
            <form method='post' action='uploading.php' class='post_form' enctype='multipart/form-data'>
                <div class="title">
                    NEW POST
                </div>
                <div class="preview">
                    <div class="upload">
                        <div class="post_btn">
                            <div class="plus_icon">
                                <span></span>
                                <span></span>
                            </div>
                            <p>포스트 이미지 추가</p>
                            <canvas id="imageCanvas"></canvas>
                            <!--<p><img id="img_id" src="#" style="width: 300px; height: 300px; object-fit: cover" alt="thumbnail"></p>-->
                        </div>
                    </div>
                </div>
                <p>
                    <input type="file" name="photo" id="id_photo">
                </p>
                <p>
                    <textarea name="content" id="text_field" cols="50" rows="5" placeholder="파일은 이미지 파일만 게시 가능합니다.
#태그명 을 통해서 검색 태그를 등록할 수 있습니다.
예시 : I # love # PaiChai!"></textarea>

                </p>
                <input class="submit_btn" type="submit" value="저장">
            </form>

        </div>

    </div>


</section>

<script src="js/insta.js"></script>

<script>
       var fileInput  = document.querySelector( "#id_photo" ),
           button     = document.querySelector( ".input-file-trigger" ),
           the_return = document.querySelector(".file-return");

       // Show image
       fileInput.addEventListener('change', handleImage, false);
       var canvas = document.getElementById('imageCanvas');
       var ctx = canvas.getContext('2d');


        function handleImage(e){
           var reader = new FileReader();
           reader.onload = function(event){
               var img = new Image();
               // var imgWidth =
               img.onload = function(){
                   canvas.width = 300;
                   canvas.height = 300;
                   ctx.drawImage(img,0,0,300,300);
               };
               img.src = event.target.result;
               // img.width = img.width*0.5
               // canvas.height = img.height;
           };
           reader.readAsDataURL(e.target.files[0]);
       }


</script>
</body>
</html>