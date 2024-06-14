<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filmlane - Best movie collections</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="<?= BASEURL ?>/img/FilmVerse.png" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="./index.html" class="logo">
        <img src="<?= BASEURL ?>/img/FilmVerse.png" alt="Filmlane logo" width="100px" height="100px">
      </a>

      <div class="header-actions">

        <button class="search-btn">
          <ion-icon name="search-outline"></ion-icon>
        </button>

        <div class="lang-wrapper">
          <label for="language">
          </label>

        </div>

        <a href="<?php echo BASEURL; ?>/login/logout" class="btn btn-primary">Log Out</a>

      </div>


      <a href="<?php echo BASEURL; ?>/login/logout" class="btn btn-primary">Log Out</a>
      
      <button class="menu-open-btn" data-menu-open-btn>
        <ion-icon name="reorder-two"></ion-icon>
      </button>


      <nav class="navbar" data-navbar>

        <div class="navbar-top">

          <a href="./index.html" class="logo">
            <img src="<?= BASEURL ?>/img/logo.svg" alt="Filmlane logo">
          </a>

          <button class="menu-close-btn" data-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>

        </div>

        
        <ul class="navbar-list">

          <li>
            <a href="<?= BASEURL ?>/home" class="navbar-link">Home</a>
          </li>

          <li>
            <a href="<?= BASEURL ?>/film" class="navbar-link">Movie</a>
          </li>

          <li>
            <a href="<?= BASEURL ?>/series" class="navbar-link">Series</a>
          </li>

          <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
          <li>
            <a href="<?= BASEURL ?>/home/upload" class="navbar-link">Upload</a>
          </li>
          <?php endif; ?>
        </ul>

      </nav>

    </div>
  </header>