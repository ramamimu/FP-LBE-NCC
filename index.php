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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>  
    <link rel="stylesheet" href="assets/style.css" />
  </head>
  <body>
    <nav>
        <h2>Waifu Lister</h2>
    </nav>
    <main>
    <div class="content-main">        
        <div class="image-main">
            <div class="container">
                <div class="image-content">
<!-- coba carousel wibu! -->
                    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                        <img src="
                        <?php
                        echo $data[0][1];
                        ?>            
                        " class="d-block w-100" alt="">
                        <div class="carousel-caption d-md-block">
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
                        <!-- iterator start -->
                        <?php
                        for($i=1; $i<$index; $i++):
                        ?>
                        <div class="carousel-item" data-bs-interval="2000">
                        <img src="
                        <?php
                        echo $data[$i][1];
                        ?>
                        " class="d-block w-100" alt="">
                        <div class="carousel-caption d-md-block">
                            <h5>
                            <?php
                            echo $data[$i][0];
                            ?>    
                            </h5>
                            <button type="button" class="btn btn-dark"><a href="
                            <?php
                                echo $data[$i][2];
                            ?>                    
                            " target="_blank">Read More</a></button>
                        </div>    
                    </div>

                        <?php endfor;?>
                        <!-- iterator finish -->

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    </div>
<!-- Batas carousel -->
                </div>
            </div>
        </div>

        <div class="spinner">
          <div class="container">
            <div class="spinner-content">
              <img id="waifu-img" src="assets/img/genshin-1.jpg" alt="" />
              <button id="spin">Find Your Waifu !</button>
            </div>
          </div>
        </div>
        <div class="table" id="table">
          <table>
            <tr style="text-align: center;">
              <td>Name</td>
              <td>image</td>
              <td>info</td>
            </tr>
            <?php
            for($i=0; $i<$index; $i++):
            ?>
            <tr>
              <td>
                <?php 
                echo $data[$i][0];
                ?>
              </td>
              <td><a href="
              <?php
              echo $data[$i][1];
              ?>
              " target="_blank">char image</a></td>
              <td><a href="
              <?php 
              echo $data[$i][2];
              ?>
              " target="_blank">more info</a></td>
            </tr>
            <?php endfor;?>
          </table>
        </div>
      </main>
    <script src="assets/script.js"></script>
  </body>
</html>
