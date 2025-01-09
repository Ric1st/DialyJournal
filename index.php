<?php
session_start(); 
$isLogin = isset($_SESSION['isLogin']) && $_SESSION['isLogin'];
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';

include "koneksi.php"; 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PBW -A11.2023.14922</title>
    <link
      rel="shortcut icon"
      href="https://i0.wp.com/www.desaintasik.com/wp-content/uploads/2019/05/download-Logo-Wonderful-Indonesia-vector-desaintasik.png?fit=691%2C484&ssl=1"
      type="image/x-icon"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />

    <style>
      * {
        font-family: sans-serif;
      }

      html {
        scroll-behavior: smooth;
        scroll-padding-top: 55px;
      }

      .navbar-toggler {
        border: none;
        font-size: 1.25rem;
      }

      .navbar {
        background-color: #2ab7a9;
      }

      @media (max-width: 385px) {
        .navbar-brand {
          font-size: 15px;
        }
      }

      .navbar-toggler:focus,
      .btn-close:focus {
        box-shadow: none;
        outline: none;
      }

      .nav-link {
        color: #666777;
        font-weight: 500;
        position: relative;
        transition: color 0.3s ease, transform 0.3s ease;
      }

      .nav-link:hover,
      .nav-link.active {
        color: black;
        background-color: #2ec296;
        border-radius: 10px;
        transform: scale(1.1);
      }

      .nav-item .nav-link:hover.dark-mode,
      .nav-item .nav-link.active.dark-mode {
        background-color: #31363f;
      }

      @media (min-width: 991px) {
        .nav-link::before {
          content: "";
          position: absolute;
          bottom: 0;
          left: 50%;
          transform: translateX(-50%);
          width: 0;
          height: 2px;
          background-color: #292929;
          visibility: hidden;
          transition: 0.3s ease-in-out;
        }
        .nav-link:hover::before {
          width: 100%;
          visibility: visible;
        }
      }
      @media (max-width: 991px) {
        .nav-link::before {
          content: "";
          position: absolute;
          bottom: 0;
          left: 50%;
          transform: translateX(-50%);
          width: 0;
          height: 2px;
          background-color: #292929;
          visibility: hidden;
          transition: 0.3s ease-in-out;
        }
        .nav-link:hover::before {
          width: 100%;
          visibility: visible;
        }
        .nav-link {
          text-align: center;
          margin-top: 2%;
        }
        #theme-toggle {
          margin-top: 2%;
          width: 100%;
        }
      }

      .navbar .container-fluid {
        background-color: #a2d5c6;
        border-radius: 10px;
        padding: 0 3%;
      }

      #hero {
        background-color: #bccfb2;
        height: auto;
        padding: 70px 0;
      }

      #hero .text {
        padding-left: 5%;
      }

      #hero h1 {
        font-size: 60px;
      }

      #hero p {
        font-size: 30px;
      }

      #hero img {
        border-radius: 20px 500px;
        margin: 5% 0;
        max-height: 70vh;
        width: auto;
        object-fit: cover;
      }

      @media (max-width: 768px) {
        #hero .text {
          padding-left: 5%;
          padding-top: 3%;
          text-align: center;
        }
        #hero {
          padding-top: 50px;
        }
        #hero h1 {
          font-size: 40px;
        }
        #hero p {
          font-size: 20px;
        }
        #hero img {
          margin-left: 5%;
        }
        .card img {
          height: 30%;
        }
        #gallery .carousel-item img {
          height: 400px;
          width: 100%;
          object-fit: cover;
        }
      }

      #hero span#merah {
        color: red;
      }

      #hero span#putih {
        color: white;
      }

      #article {
        background-color: #ebd9c3;
      }

      .card {
        height: 100%;
      }

      .card img {
        height: 30%;
      }

      @media (max-width: 1024px) {
        .card img {
          height: 200px;
        }
      }

      @media (min-width: 1024px) {
        .card img {
          height: 200px;
        }
      }

      .card-text {
        text-align: justify;
      }

      .card-footer {
        color: #666777;
        text-align: center;
      }

      #gallery .container-fluid {
        background-color: #f2d4d7;
      }

      footer a {
        color: #000000;
      }

      footer p {
        color: #000000;
        font-size: 20px;
        margin: 0;
      }

      i {
        font-size: 35px;
        margin: 5px 10px;
      }

      i:hover {
        color: #666777;
      }

      .time-container {
        font-size: 18px;
        font-weight: bold;
        color: #292929;
      }

      #tanggal {
        display: block;
      }

      #jam {
        display: block;
        margin-top: 5px;
      }

      .navbar,
      #article,
      #hero,
      #gallery,
      footer,
      .card {
        transition: background-color 0.3s ease, color 0.3s ease;
      }

      .card.dark-mode {
        background-color: #333;
        color: #fff;
        border-color: #888888;
      }

      .card.dark-mode .card-footer {
        background-color: #3f3f3f;
        color: #fff;
      }

      .card.dark-mode img {
        filter: brightness(0.8);
      }

      .navbar.dark-mode {
        background-color: #1a1a1a;
      }

      .navbar.dark-mode .container-fluid,
      .navbar.dark-mode .container-fluid a {
        background: #4b4b4b;
        color: white;
      }

      footer.dark-mode,
      footer.dark-mode a,
      footer.dark-mode p {
        background-color: #1a1a1a;
        color: #ffffff;
      }

      #hero.dark-mode,
      #hero.dark-mode .time-container {
        background-color: #333;
        color: #ffffff;
      }

      #hero.dark-mode img {
        filter: brightness(0.8);
      }

      #article.dark-mode {
        background-color: #444;
        color: #ffffff;
      }

      #gallery.dark-mode,
      #gallery.dark-mode .container-fluid {
        background-color: #222;
        color: #ffffff;
      }

      #gallery.dark-mode img {
        filter: brightness(0.7);
      }

      #gallery .carousel-item img {
        max-height: 700px;
        object-fit: cover;
      }

      .dark-mode {
        background-color: #333;
        color: white;
      }

      .nav-link.dark-mode::before {
        background-color: white;
      }

      .offcanvas.dark-mode {
        background-color: #4b4b4b;
      }

      .offcanvas.dark-mode .offcanvas-header {
        background-color: #1a1a1a;
      }

      .offcanvas.dark-mode .btn-close {
        background-color: #fff;
      }

      .offcanvas .btn-close {
        background-color: red;
      }

      #schedule.dark-mode{
        background-color: #444;
      }

      #aboutme{
        background-color: #f2d4d7;
      }

      #aboutme.dark-mode{
        background-color: #202020;
      }

      #aboutme img{
        width: 60%;
        height: auto;
        margin-left: 40%;
        box-shadow: 10px 10px 5px lightblue;
      }

      #aboutme.dark-mode img{
        filter: brightness(0.8);
      }

      #aboutme a{
        text-decoration: none;
        color: #000000;
      }

      #aboutme.dark-mode a{
        color: #fff;
      }

      #aboutme p{
        font-size: 1.5rem;
        margin: 0;
      }

      #aboutme p.nama{
        font-size: 2rem;
      }

      @media (max-width : 768px){
        #aboutme p{
          text-align: center;
        }
        #aboutme p{
          font-size: 1rem;
          margin: 0;
        }
        #aboutme p.nama{
          font-size: 1.8rem;
        }
      }
      @media (max-width : 767px){
        #aboutme img{
          margin-left: 20%;
        }
      }

      .nav-link.gradient-button{
        cursor: pointer;
      }
      .gradient-button.login {
            background-image: linear-gradient(to right, #15B392, #73EC8B);
            border: none; 
            color: white; 
            transition: background 0.3s ease; 
            border-radius: 10px;
        }

        .gradient-button.login:hover {
            background-image: linear-gradient(to right, #73EC8B, #15B392); 
        }

        .gradient-button.logout {
            background-image: linear-gradient(to right, #AF1740, #FA4032);
            border: none; 
            color: white; 
            transition: background 0.3s ease; 
            border-radius: 10px;
        }

        .gradient-button.logout:hover {
            background-image: linear-gradient(to right, #FA4032, #AF1740); 
        }

        .card-body {
          display: flex;               
          flex-direction: column;      
          justify-content: space-between;            
        }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg fixed-top px-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="https://dinus.ac.id/">
          My Wonderful Indonesia
          <img
            src="https://i0.wp.com/www.desaintasik.com/wp-content/uploads/2019/05/download-Logo-Wonderful-Indonesia-vector-desaintasik.png?fit=691%2C484&ssl=1"
            width="35px"
          />
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar"
          aria-controls="offcanvasNavbar"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="offcanvas offcanvas-end"
          tabindex="-1"
          id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel"
        >
          <div class="offcanvas-header">
            <h4 class="offcanvas-title" id="offcanvasNavbarLabel">
              <b>My Wonderful Indonesia</b>
            </h4>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link mx-lg-2 active" aria-current="page" href="#"
                  >Home</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#article">Article</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#gallery">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#schedule">Schedule</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-lg-2" href="#aboutme">About Me</a>
              </li>
              <li class="nav-item">
                <a class="nav-link gradient-button login btn-lg text-white" id="BtnLogin">Login</a>
              </li>
            </ul>
            <button id="theme-toggle" class="btn">🌞</button>
          </div>
        </div>
      </div>
    </nav>

    <section id="hero">
      <div class="container-fluid">
        <div class="row w-100">
          <div class="col-md-6 text d-flex align-items-center">
            <div>
              <h1>
                Explore the Wonders of <span id="merah">Indo</span
                ><span id="putih">nesia!</span>
              </h1>
              <p>
                Temukan keindahan alam, budaya, dan petualangan luar biasa yang
                hanya ada di Indonesia. Ayo jelajahi sekarang!
              </p>
              <div class="time-container">
                <span id="tanggal"></span>
                <span id="jam"></span>
              </div>
            </div>
          </div>
          <div class="col-md-6 d-flex justify-content-center">
            <img
              src="https://res.klook.com/image/upload/fl_lossy.progressive,q_85/c_fill,w_1000/v1628071486/blog/wv2zgky5as7hp8fdah4b.webp"
              class="img-fluid"
              style="max-height: 70vh; width: auto; object-fit: cover"
            />
          </div>
        </div>
      </div>
    </section>

    <!-- article begin -->
    <section id="article" class="text-center p-5">
      <div class="container">
        <h1 class="fw-bold display-4 pb-3">article</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
          <?php
          $sql = "SELECT * FROM article ORDER BY tanggal DESC";
          $hasil = $conn->query($sql); 

          while($row = $hasil->fetch_assoc()){
          ?>
            <div class="col">
              <div class="card h-100">
                <img src="img/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
                <div class="card-body">
                  <h5 class="card-title"><?= $row["judul"]?></h5>
                  <p class="card-text">
                    <?= $row["isi"]?>
                  </p>
                </div>
                <div class="card-footer">
                  <small class="text-body-secondary">
                    <?= $row["tanggal"]?>
                  </small>
                </div>
              </div>
            </div>
            <?php
          }
          ?> 
        </div>
      </div>
    </section>
    <!-- article end -->

    <section id="gallery">
      <div class="container-fluid">
        <div class="container">
          <div class="row text-center">
            <h1 class="py-5"><b>Gallery</b></h1>
          </div>
          <div class="row pb-5">
            <div id="carouselExampleFade" class="carousel slide carousel-fade">
              <div class="carousel-inner">
              <?php
                $sql = "SELECT * FROM gallery";
                $hasil = $conn->query($sql); 
                $isActive = true;

                while($row = $hasil->fetch_assoc()){
              ?> 
                <div class="carousel-item <?= $isActive ? 'active' : '' ?>">
                  <img
                    src="img/<?= $row["gambar"]?>"
                    class="d-block w-100"
                  />
                </div>
              <?php
                $isActive = false;
                }
              ?>
              </div>
              <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carouselExampleFade"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carouselExampleFade"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="schedule">
      <div class="container-fluid">
        <div class="container">
          <div class="row text-center">
            <h1 class="py-5"><b>Schedule</b></h1>
          </div>
          <div class="row">
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card light-mode">
                <div class="card-header text-center pt-3 text-white bg-danger">
                    <h4>Senin</h4>
                </div>
                <div class="card-body">
                  <div class="card-text text-center">
                    <p>Basis Data</p>
                    <p>08.40 - 10.20 | H.5.14</p>
                    <hr>
                    <p>Sistem Operasi</p>
                    <p>12.30 - 15.00 | H.4.9</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card light-mode">
                <div class="card-header text-center pt-3 text-white bg-danger">
                    <h4>Selasa</h4>
                </div>
                <div class="card-body">
                  <div class="card-text text-center">
                    <p>PKN</p>
                    <p>08.40 - 10.20 | H.7.1</p>
                    <hr>
                    <p>Probabilitas Statistik</p>
                    <p>12.30 - 15.00 | H.4.9</p>
                  </div>
                </div>  
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card light-mode">
                <div class="card-header text-center pt-3 text-white bg-danger">
                    <h4>Rabu</h4>
                </div> 
                <div class="card-body">
                  <div class="card-text text-center">
                    <p>Basis Data</p>
                    <p>08.40 - 10.20 | D.3.M</p>
                    <hr>
                    <p>Kriptografi</p>
                    <p>12.30 - 15.00 | H.4.11</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card light-mode">
                <div class="card-header text-center pt-3 text-white bg-danger">
                    <h4>Kamis</h4>
                </div> 
                <div class="card-body">
                  <div class="card-text text-center">
                    <p>Pemrograman Web</p>
                    <p>08.40 - 10.20 | D.2.J</p>
                    <hr>
                    <p>Logika Informatika</p>
                    <p>12.30 - 15.00 | H.4.5</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card light-mode">
                <div class="card-header text-center pt-3 text-white bg-danger">
                    <h4>Jumat</h4>
                </div>
                <div class="card-body">
                  <div class="card-text text-center"> 
                    <p>Rekayasa Perangkat Lunak</p>
                    <p>09.30 - 12.00 | H.4.5</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card light-mode"> 
                <div class="card-header text-center pt-3 text-white bg-danger">
                    <h4>Sabtu</h4>
                </div>
                <div class="card-body">
                  <div class="card-text text-center">
                    <p>Hiling</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <button id="reset-button">Reset Last Update</button> -->
        </div>
      </div>
    </section>

    <section id="aboutme">
      <div class="container-fluid py-5">
        <div class="container">
          <div class="row align-items-center pt-3">
            <div class="col-lg-6 col-md-6 mb-4">
              <img src="https://image.freepik.com/free-vector/portrait-programmer-working-with-pc_23-2148218046.jpg" class="rounded-circle">
            </div>
            <div class="col-lg-6 col-md-6 mb-4">
              <p>A11.2023.14922</p>
              <p class="nama py-2"><strong>Richard Christoper Subianto</strong></p>
              <p>Program Studi Teknik Informatika</p>
              <p><a href="https://dinus.ac.id/"><b>Universitas Dian Nuswantoro</b></a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container-fluid py-3">
        <div class="container text-white text-center">
          <a href="https://www.instagram.com/"
            ><i class="fab fa-instagram"></i
          ></a>
          <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
          <a href="https://www.whatsapp.com/"
            ><i class="fab fa-whatsapp"></i
          ></a>
          <br />
          <p>Richard Christoper Subianto &copy; 2024</p>
        </div>
      </div>
    </footer>

    <div class="modal fade" id="loginSuccessModal" aria-labelledby="loginSuccessModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content bg-success text-center">
          <div class="modal-header justify-content-center">
            <h3 class="modal-title text-white" id="modalTitle">Berhasil!</h3>
          </div>
          <div class="modal-body text-white" id="modalBody">
            Anda berhasil login! Selamat datang <span id="username"></span>.
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      window.addEventListener("load", function () {
        setThemeBasedOnTime();
      });

      let sections = document.querySelectorAll("section");
      let navLinks = document.querySelectorAll(".nav-item a");
      window.onscroll = () => {
        let top = window.scrollY + 500;

        if (top < 700) {
          navLinks.forEach((links) => {
            links.classList.remove("active");
          });

          document
            .querySelector('.nav-item a[href="#"]')
            .classList.add("active");
          return;
        }

        sections.forEach((sec) => {
          let offset = sec.offsetTop;
          let height = sec.offsetHeight;
          let id = sec.getAttribute("id");

          if (top >= offset && top < offset + height) {
            navLinks.forEach((links) => {
              links.classList.remove("active");
              document
                .querySelector('.nav-item a[href*="' + id + '"]')
                .classList.add("active");
            });
          }
        });
      };

      function setThemeBasedOnTime() {
        const currentHour = new Date().getHours();
        const body = document.body;
        const toggleButton = document.getElementById("theme-toggle");

        if (currentHour >= 18 || currentHour < 6) {
          document.querySelector("body").classList.add("dark-mode");
          document.querySelector(".navbar").classList.add("dark-mode");
          document.querySelector("#article").classList.add("dark-mode");
          document.querySelector("#hero").classList.add("dark-mode");
          document.querySelector("#gallery").classList.add("dark-mode");
          document.querySelector("#schedule").classList.add("dark-mode");
          document.querySelector("#aboutme").classList.add("dark-mode");
          document.querySelector("footer").classList.add("dark-mode");
          document.querySelectorAll(".card").forEach((card) => {
            card.classList.add("dark-mode");
          });
          document.querySelector(".navbar").classList.add("dark-mode");
          document.querySelectorAll(".nav-link").forEach((link) => {
            link.classList.add("dark-mode");
          });
          const offcanvasElements = document.querySelectorAll(".offcanvas");
          offcanvasElements.forEach((offcanvas) => {
            offcanvas.classList.add("dark-mode");
          });
          toggleButton.innerHTML = "☼";
          document.getElementById("theme-toggle").classList.remove("btn-dark");
          document.getElementById("theme-toggle").classList.add("btn-light");
        } else {
          document.querySelector("body").classList.remove("dark-mode");
          document.querySelector(".navbar").classList.remove("dark-mode");
          document.querySelector("#article").classList.remove("dark-mode");
          document.querySelector("#hero").classList.remove("dark-mode");
          document.querySelector("#gallery").classList.remove("dark-mode");
          document.querySelector("#schedule").classList.remove("dark-mode");
          document.querySelector("#aboutme").classList.remove("dark-mode");
          document.querySelector("footer").classList.remove("dark-mode");
          document.querySelectorAll(".card").forEach((card) => {
            card.classList.remove("dark-mode");
          });
          document.querySelector(".navbar").classList.remove("dark-mode");
          document.querySelectorAll(".nav-link").forEach((link) => {
            link.classList.remove("dark-mode");
          });
          const offcanvasElements = document.querySelectorAll(".offcanvas");
          offcanvasElements.forEach((offcanvas) => {
            offcanvas.classList.remove("dark-mode");
          });
          toggleButton.innerHTML = "🌙";
          document.getElementById("theme-toggle").classList.add("btn-dark");
          document.getElementById("theme-toggle").classList.remove("btn-light");
        }
      }

      document
        .getElementById("theme-toggle")
        .addEventListener("click", function () {
          document.querySelector("body").classList.toggle("dark-mode");
          document.querySelector(".navbar").classList.toggle("dark-mode");
          document.querySelector("#article").classList.toggle("dark-mode");
          document.querySelector("#hero").classList.toggle("dark-mode");
          document.querySelector("#gallery").classList.toggle("dark-mode");
          document.querySelector("#schedule").classList.toggle("dark-mode");
          document.querySelector("#aboutme").classList.toggle("dark-mode");
          document.querySelector("footer").classList.toggle("dark-mode");
          document.querySelectorAll(".card").forEach((card) => {
            card.classList.toggle("dark-mode");
          });
          document.querySelectorAll(".nav-link").forEach((link) => {
            link.classList.toggle("dark-mode");
          });
          const offcanvasElements = document.querySelectorAll(".offcanvas");
          offcanvasElements.forEach((offcanvas) => {
            offcanvas.classList.toggle("dark-mode");
          });

          const toggleButton = document.getElementById("theme-toggle");

          if (document.body.classList.contains("dark-mode")) {
            toggleButton.innerHTML = "☼";
            document
              .getElementById("theme-toggle")
              .classList.remove("btn-dark");
            document.getElementById("theme-toggle").classList.add("btn-light");
            document.querySelectorAll(".card-header").forEach((card) => {
              card.classList.remove("bg-danger"); 
              card.classList.add("bg-dark"); 
            });
          } else {
            toggleButton.innerHTML = "🌙";
            document.getElementById("theme-toggle").classList.add("btn-dark");
            document
              .getElementById("theme-toggle")
              .classList.remove("btn-light");
            document.querySelectorAll(".card-header").forEach((card) => {
              card.classList.remove("bg-dark"); 
              card.classList.add("bg-danger"); 
            });
          }
        });
      setThemeBasedOnTime();

      function updateTime() {
        const date = new Date();
        const tanggal = date.toLocaleDateString("id-ID", {
          weekday: "long",
          year: "numeric",
          month: "long",
          day: "numeric",
        });

        const jam = String(date.getHours()).padStart(2, "0");
        const menit = String(date.getMinutes()).padStart(2, "0");
        const detik = String(date.getSeconds()).padStart(2, "0");

        const formattedTime = `${jam} : ${menit} : ${detik}`;

        document.getElementById("tanggal").textContent = tanggal;
        document.getElementById("jam").textContent = formattedTime + "\tWIB";
      }
      setInterval(updateTime, 1000);

      const lastUpdateElements = document.querySelectorAll('.card-footer');

      let lastUpdateTime = localStorage.getItem('lastUpdateTime') || 0;

      function updateLastUpdate() {
        lastUpdateTime++;
        localStorage.setItem('lastUpdateTime', lastUpdateTime);
        
        lastUpdateElements.forEach((element) => {
          element.textContent = formatTime(lastUpdateTime);
        });
      }

      function formatTime(seconds) {
        if (seconds === 0) return 'Just now';
        if (seconds === 1) return '1 second ago';
        if (seconds < 60) return `${seconds} seconds ago`;
        if (seconds < 3600) return `${Math.floor(seconds / 60)} minutes ago`;
        if (seconds < 86400) return `${Math.floor(seconds / 3600)} hours ago`;
        return `${Math.floor(seconds / 86400)} days ago`;
      }

      function resetLastUpdate() {
        lastUpdateTime = 0;
        localStorage.setItem('lastUpdateTime', lastUpdateTime);
        updateLastUpdate();
      }
      // document.getElementById('reset-button').addEventListener('click', resetLastUpdate);

      setInterval(updateLastUpdate, 1000);

      updateLastUpdate();

      //Sistem Login
      const isLogin = <?php echo json_encode($isLogin); ?>;
      const username = <?php echo json_encode($username); ?>;
      console.log("Username : " + username);
      const ButtonLogin = document.getElementById("BtnLogin");
      const modalElement = document.getElementById('loginSuccessModal');
      const modal = new bootstrap.Modal(modalElement);
      const modalTitle = document.getElementById("modalTitle");
      const modalBody = document.getElementById("modalBody");

      if (isLogin) {
        ButtonLogin.innerHTML = "Logout";
        ButtonLogin.classList.remove("login");
        ButtonLogin.classList.add("logout");

        modalTitle.innerHTML = "Berhasil!";
        modalBody.innerHTML = "Anda berhasil login! Selamat Datang <b><u>"+username+"</u></b>.";
        document.querySelector(".modal-content").classList.remove("bg-danger");
        document.querySelector(".modal-content").classList.add("bg-success");

        setTimeout(() => {
          modal.show();
          setTimeout(() => {
            modal.hide();
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
          }, 3000);
        });
      } else if(!isLogin) {
        ButtonLogin.innerHTML = "Login";
        ButtonLogin.classList.remove("logout");
        ButtonLogin.classList.add("login");
      }             

      ButtonLogin.addEventListener("click", function () {
        if (ButtonLogin.classList.contains("login")) {
          ButtonLogin.innerHTML = "Logout";
          ButtonLogin.classList.remove("login");
          ButtonLogin.classList.add("logout");
          console.log("Button Login");
          window.location.href = "login.php"; 
        } else {
          ButtonLogin.innerHTML = "Login";
          ButtonLogin.classList.add("login");
          ButtonLogin.classList.remove("logout");
          console.log("Button Logout");
          window.location.href = "logout.php"; 
        }         
      });

      //Button Pemesanan
      const BtnPesan = document.querySelectorAll(".btn-pesan");

      BtnPesan.forEach((button) => {
        button.addEventListener("click", function () {
          if (isLogin) {
            console.log("Button Pemesanan!");
          } else {
            window.location.href = "login.php";
          }
        });
      });
    </script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>