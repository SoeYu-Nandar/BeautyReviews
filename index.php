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
.intro{
  position: relative;
  padding:50px;
  margin-bottom:50vh;
  background-color: black;
  opacity:0.5;
  border-radius: 20px;
  box-shadow: 10px 10px 5px #38192C;
} 
h2{
    font-size:50px;
}  
.intro p{
    font-size: 25px;
    text-align:center;
    /* font-weight: bold; */
    font-family: 'Courier New', Courier, monospace;

}
.intro p span{
    font-style: italic;
    font-size:40px;
}
.content{
  position: relative;
  padding-left:20%;
  padding-bottom:80vh;
}   

.content h2 {
  color: #fff;
  font-size: 4em;
  position: absolute;
  transform: translate(-50%, -50%);
}

.content h2:nth-child(1) {
  color: transparent;
  -webkit-text-stroke: 2px #03a9f4;
}

.content h2:nth-child(2) {
  color: #03a9f4;
  animation: animate 4s ease-in-out infinite;
}

@keyframes animate {
  0%,
  100% {
    clip-path: polygon(
      0% 45%,
      16% 44%,
      33% 50%,
      54% 60%,
      70% 61%,
      84% 59%,
      100% 52%,
      100% 100%,
      0% 100%
    );
  }

  50% {
    clip-path: polygon(
      0% 60%,
      15% 65%,
      34% 66%,
      51% 62%,
      67% 50%,
      84% 45%,
      100% 46%,
      100% 100%,
      0% 100%
    );
  }
}
/* @media only screen and (max-width:1200px){
    .content {
    padding-left:20%;
    padding-bottom:80vh;
  }
  .content h2 {
    font-size: 4em;
}
} */
/* @media only screen and (min-width:768px){
    .content {
    padding-left: 20%;
    padding-bottom:50vh;
  }
  .content h2 {
  font-size: 3em;
  padding-top:25vh;
}
} */

    </style>
</head>

<body style="background-color: #f1f1f1;">
    <!-- navbar -->
<nav class="navbar navbar-expand-md navbar-inverse fixed-top" style="background-color: #F9F1F2;">
        <div class="container-xxl">
            <a href="#" class="navbar-brand">
                <span class="fs-3 fw-bold text-secondary">
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
                    <li class="nav-item me-3 ms-2 mb-sm-2">
                        <a href="login.php" class="btn btn-outline-primary ">LOGIN</a>
                    </li>
                    <li class="nav-item me-2 mb-sm-2">
                        <a href="register.php" class="btn btn-outline-secondary ">REGISTER</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

   
    <!-- For Home -->
    <div id="Home">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
  </div>
  <div class="carousel-inner"  style="background-size:cover;height:100vh;">
    <div class="carousel-item active">
      <img src="img/beauty1.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <div class="content">
        <h2>Welcome to Our Beauty Oasis: Where Your Opinions Blossom!</h2>
        <h2>Welcome to Our Beauty Oasis: Where Your Opinions Blossom!</h2>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/pexels-cup-of-couple-8015783.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
       <div class="intro">
        <p><span>  𝓑𝓮𝓪𝓾𝓽𝔂 </span> is not just
                    skin deep; it's a journey, an <span> 𝐸𝓍𝓅𝓇𝑒𝓈𝓈𝒾♡𝓃 </span> and an <span> 𝒜𝓇𝓉 </span>. Here, we <span> 𝐼𝓃𝓋𝒾𝓉𝑒 </span> you to share your
                    experiences, discover hidden gems, and <span>𝒞🌞𝓃𝓃𝑒𝒸𝓉</span> &nbsp;with a community that celebrates the
                    diversity of beauty.</p>
       </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/pexels-rachel-claire-5490778.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
      <div class="intro">
        <div style="font-size:45px";>𝒲𝒽𝓎 𝒿𝑜𝒾𝓃 𝒪𝓊𝓇 𝐵𝑒𝒶𝓊𝓉𝓎 𝑅𝑒𝓋𝒾𝑒𝓌𝓈 𝒫𝒶𝑔𝑒?</div>
      </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/pexels-monstera-production-6621181.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <div class="intro">
        <h2> 𝒜 𝒰𝓃𝒾𝓋𝑒𝓇𝓈𝑒 🌺𝒻 𝒫𝓇🌸𝒹𝓊𝒸𝓉𝓈: </h2>
        <p>Dive into a universe filled with the latest skincare, makeup,
                    haircare, and fragrance products.</p>
        </div>
    </div>
    </div>
    <div class="carousel-item">
      <img src="img/pexels-monstera-production-6621441.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <div class="intro">
        <h2> 𝑅𝑒𝒶𝓁 𝑅𝑒𝓋𝒾𝑒𝓌𝓈 𝒻𝓇❀𝓂 𝑅𝑒𝒶𝓁 𝒰𝓈𝑒𝓇𝓈: </h2>
        <p>Tired of biased reviews?At our Beauty Review Page, 
                    authenticity is our mantra. Unleash the power of genuine reviews from real users
                    who have tried and tested products firsthand. Trust the insights of your fellow 
                    beauty aficionados.</p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/pexels-monstera-production-6621367.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <div class="intro">
        <h2> 𝐼𝓃𝓉𝑒𝓇𝒶𝒸𝓉𝒾𝓋𝑒 𝒶𝓃𝒹 𝐸𝓃𝑔𝒶𝑔𝒾𝓃𝑔:</h2>
        <p>This is not just a review page;it's a community where
                    your voice matters. Connect with like-minded beauty lovers, exchange ideas, and 
                    make friends who share your passion. Your beauty journey is meant to be shared.</p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/pexels-monstera-production-6621225.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <div class="intro">
        <h2> 𝐿𝒾𝓀𝑒, 𝒞❀𝓂𝓂𝑒𝓃𝓉, 𝒞💍𝓃𝓃𝑒𝒸𝓉:</h2>
        <p>When you log in, immerse yourself in a world of 
                    interactions. Like the reviews that resonate with you, comment on others' experiences
                    and let the beauty community thrive.It's more than just reviews; it's a celebration of 
                    beauty diversity.</p>
        </div>
      </div>
    </div>
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
</div>


   
        <!-- Beauty Tips Card -->
        <div class ="container" id="Beauty Tips">
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
            <div class="card  bg-body-tertiary">
                <div class="card-body">
                    <p class="small-title text-center text-muted fs-3 ">
                        <img src="img/beautyicon.png" alt="BeautyIcon" width="50px" height="50px">About Us
                    </p>

                    <p class="card-text fs-5" style="text-indent:50px;font-family:'Times New Roman', Times, serif;">Our website empower you with the knowledge to make informed decisions about beauty products. 
                        We believe that everyone deserves access to honest and 
                        insightful reviews to enhance their beauty and skincare routines.
                        We test, analyze, and share our experiences to help you discover the products that align with your unique beauty needs.
                        Beauty Reviews hub is more than just reviews; it's a community where beauty lovers come together to share insights, tips, and recommendations.
                    </p>
                    <div class="text-center">
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

        </div>



        <!-- For footer -->
        <footer class="text-center text-white">
            <!-- Copyright -->
            <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2023 Copyright:
                <a class="text-dark" href="register.php" style="text-decoration:none;">BeautyReviews</a>
            </div>
            <!-- Copyright -->
        </footer>

        <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>