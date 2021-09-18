<?php
$connection = mysqli_connect("localhost","root","","wibu-chan");
$data_buffer = mysqli_query($connection,"SELECT * FROM character_genshin");
$data = mysqli_fetch_all($data_buffer);
$index = count($data);
// var_dump($data)
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Waifu Spinner</title>
    <link rel="stylesheet" href="assets/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>  
  </head>
  <body>
    <div class="content-main">
      <nav>
        <h2>Waifu Spinner</h2>
      </nav>
      <main>
        
        <div class="image-main">
            <div class="container">
                <div class="image-content">
<!-- coba carousel wibu! -->
 <section id="corousel">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="
                <?php
                    echo $data[0][1];
                ?>                  
              
              " class="d-block w-100" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>
                <?php
                    echo $data[0][0];
                ?>    
                </h5>
                <button type="button" class="btn btn-dark"><a href="
                <?php
                    echo $data[0][2];
                ?>                    
                " target="_blank">Read More</a></button>
              </div>
            </div>
            <div class="carousel-item">
              <img src="
                <?php
                    echo $data[1][1];
                ?>
              " class="d-block w-100" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Some representative placeholder content for the second slide.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="
        	<?php
        	    echo $data[2][1];
	        ?>                  
              " class="d-block w-100" alt="">
              <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Some representative placeholder content for the third slide.</p>
              </div>
            </div>
            
            <!-- Iterator database carousel -->
            <!-- Batass iterator  -->
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>
<!-- Batas carousel -->
                </div>
            </div>
        </div>

<div class="spinner">
          <div class="container">
            <div class="spinner-content">
              <img id="waifu-img" src="assets/img/genshin-1.jpg" alt="" />
              <button>Spin Your Waifu</button>
            </div>
          </div>
        </div>        
      </main>
    </div>
    <script src="script.js"></script>
  </body>
</html>
