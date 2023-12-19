<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty for everyone</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
  .carousel-item{
    background-color: burlywood;
   
  }
   p{
    position:absolute;
    top:50%;
    left:50%;
    
  }
</style>
</head>

<body style="background-color: #f1f1f1;">
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light" style="background-color:#FDEDEE">
        <div class="container-xxl">
            <a href="#" class="navbar-brand">
                <span class="fw-bold fs-3 text-secondary">
                    <img src="img/beautyicon.png" alt="BeautyIcon" width="50px" height="50px">BEAUTY REVIEWS
                </span>
            </a>


            <!-- toggle button for mobile  -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <!-- navbar links -->
            <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="#Home" class="nav-link fs-5 fw-bold">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a href="#Beauty Tips" class="nav-link fs-5 fw-bold">BEAUTY TIPS</a>
                    </li>
                    <li class="nav-item">
                        <a href="#About Us" class="nav-link fs-5 fw-bold">ABOUT US</a>
                    </li>
                    <li class="nav-item me-3 ms-2">
                        <a href="login.php" class="btn btn-outline-primary ">LOGIN</a>
                    </li>
                    <li class="nav-item me-2">
                        <a href="register.php" class="btn btn-outline-secondary ">REGISTER</a>
                    </li>
                </ul>
            </div>
        </div>


    </nav>
    <!-- For Home -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/homeimg3.jpg" class="d-block w-10" alt="...">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. <br>Quia consequatur ea sequi atque distinctio, sunt illum, eaque corporis aut sit quisquam? Facilis libero necessitatibus ducimus numquam quas. Neque, facere optio!</p>
      </div>
      <div class="carousel-item">
        <img src="img/homeimg2.jpg" class="d-block w-20" alt="...">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>Molestiae numquam quod eius, iure maiores adipisci, aliquam vitae nostrum soluta labore illum nisi eveniet debitis alias, et delectus ab consectetur minima!</p>
      </div>
      <div class="carousel-item">
        <img src="img/homeimg1.jpg" class="d-block w-50" alt="...">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias dolor et optio soluta quasi tenetur. <br> Delectus deleniti quidem facere unde vero labore necessitatibus error nostrum, possimus est quasi, recusandae natus.</p>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
   
        <!-- Beauty Tips Card -->
        <div class="container" id="Beauty Tips">
            <p class="small-title text-center text-muted fs-3 ">
                Beauty Tips</p>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card text-center">
                        <img src="img/skinbreakout.jpg" class="card-img-top" alt="skin breakout">
                        <div class="card-body">
                            <h5 class="card-title text-center text-muted lh-base"> နေ့တိုင်း Exfoliate လုပ်သောအခါ <br>ရလာမည့် ဆိုးကျိုးများ</h5>
                            <a href="News/N1.html" class="btn btn-outline-danger" role="center">
                                အပြည့်အစုံဖတ်ရှုရန်</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card text-center">
                        <img src="img/cleaning.jpg" class="card-img-top" alt="cleaning">
                        <div class="card-body">
                            <h5 class="card-title text-muted lh-base"> SkinCare လုပ်သောနေရာတွင် <br>ချန်ထားလို့မရသော အဆင့်များ</h5>
                            <a href="News/N2.html" class="btn btn-outline-danger" role="center">
                                အပြည့်အစုံဖတ်ရှုရန်</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card text-center">
                        <img src="img/face.jpg" class="card-img-top" alt="skin breakout">
                        <div class="card-body">
                            <h5 class="card-title text-center text-muted lh-base"> မျက်နှာပေါ်သို့ ဘယ်တော့မှမတင်သင့်သောအရာ (၆)ခု</h5>
                            <a href="News/N3.html" class="btn btn-outline-danger role=" button">
                                အပြည့်အစုံဖတ်ရှုရန်</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card text-center">
                        <img src="img/faceoil.jpg" class="card-img-top" alt="skin breakout">
                        <div class="card-body">
                            <h5 class="card-title text-center text-muted lh-base">ညတွင်းချင်းတောက်ပသော အသားအရေကို ရရှိစေမည့်နည်းလမ်း (၆)ခု</h5>
                            <a href="News/N4.html" class="btn btn-outline-danger" role="button">
                                အပြည့်အစုံဖတ်ရှုရန်</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card text-center">
                        <img src="img/dryskin.jpg" class="card-img-top" alt="skin breakout">
                        <div class="card-body">
                            <h5 class="card-title text-muted lh-base">ဝက်ခြံကြောင့်နီမြန်းရောင်ရမ်းတာတွေကိုသက်သာစေသောနည်းလမ်း(၅)ခု</h5>
                            <a href="News/N5.html" class="btn btn-outline-danger" role="button">
                                အပြည့်အစုံဖတ်ရှုရန်</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card text-center">
                        <img src="img/hairTreatment.jpg" class="card-img-top" alt="hair treatment">
                        <div class="card-body">
                            <h5 class="card-title text-center text-muted lh-base">ဆံပင်ကျွတ်ခြင်းကို သက်သာစေသည့်နည်းလမ်းများ</h5>
                            <a href="News/N6.html" class="btn btn-outline-danger" role="button">
                                အပြည့်အစုံဖတ်ရှုရန်</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card text-center">
                        <img src="img/bodyCare.jpg" class="card-img-top" alt="body care">
                        <div class="card-body">
                            <h5 class="card-title text-center text-muted lh-base">အသားအရည် လှပစေမည့် <br>နည်းလမ်း(၅)မျိူး</h5>
                            <a href="News/N7.html" class="btn btn-outline-danger" role="button">
                                အပြည့်အစုံဖတ်ရှုရန်</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card text-center">
                        <img src="img/eating.jpg" class="card-img-top" alt="Eating">
                        <div class="card-body">
                            <h5 class="card-title text-center text-muted lh-base">ကျန်းမာစေမည့် <br>အလေ့အကျင့်ကောင်းများ</h5>
                            <a href="News/N8.html" class="btn btn-outline-danger" role="button">
                                အပြည့်အစုံဖတ်ရှုရန်</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-2">
                    <div class="card text-center">
                        <img src="img/doingexercise.jpg" class="card-img-top" alt="Doing Exercise">
                        <div class="card-body">
                            <h5 class="card-title text-center text-muted lh-base">ကျန်းမာသောလူမှုဘဝပိုင်ဆိုင်စေရန် လုပ်ဆောင်သင့်သော အလေ့အထများ</h5>
                            <a href="News/N9.html" class="btn btn-outline-danger" role="button">
                                အပြည့်အစုံဖတ်ရှုရန်</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- For About Us -->
        <div id="About Us">
            <div class="card text-center bg-body-tertiary">
                <div class="card-body">
                    <p class="small-title text-center text-muted fs-3 ">
                        <img src="img/beautyicon.png" alt="BeautyIcon" width="50px" height="50px">About Us
                    </p>

                    <p class="card-text text-center">Our website gives the information between cosmetics users.</p>
                    <a href="index.php" class="btn btn-primary justify-content-md-end">Join Us</a><br>

                    <!-- Facebook -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

                    <!-- Twitter -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

                    <!-- Google -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

                    <!-- Instagram -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

                    <!-- Github -->
                    <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>

                </div>


            </div>

        </div>



        <!-- For footer -->
        <footer class="text-center text-white">
            <!-- Copyright -->
            <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright:
                <a class="text-dark" href="register.php">BeautyReviews</a>
            </div>
            <!-- Copyright -->
        </footer>

        <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>