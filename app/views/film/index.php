<main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">Filmlane</p>

            <h1 class="h1 hero-title">
              Unlimited <strong>Movie</strong>, TVs Shows, & More.
            </h1>

            <div class="meta-wrapper">

              <div class="badge-wrapper">
                <div class="badge badge-outline">HD</div>
              </div>

              <div class="ganre-wrapper">
                <a href="#">Romance,</a>

                <a href="#">Drama</a>
              </div>

              <div class="date-time">

                <div>
                  <ion-icon name="calendar-outline"></ion-icon>

                  <time datetime="2022">2022</time>
                </div>

                <div>
                  <ion-icon name="time-outline"></ion-icon>

                  <time datetime="PT128M">128 min</time>
                </div>

              </div>

            </div>

            <button class="btn btn-primary">
              <ion-icon name="play"></ion-icon>

              <span>Watch now</span>
            </button>

          </div>

        </div>
      </section>

      <!-- 
        - #TOP RATED
      -->

      <section class="top-rated">
        <div class="container">

          <p class="section-subtitle">Online Streaming</p>

          <h2 class="h2 section-title">Top Rated Movies</h2>


          <ul class="movies-list">
            <?php foreach ( $data['movies'] as $movie ) : ?>
              <li>
                <div class="movie-card">
              
                  <a href="./movie-details.html">
                    <figure class="card-banner">
                      <img src="<?= BASEURL ?>/<?= $movie['poster'] ?>" alt="<?= $movie['title'] ?>movie poster">
                    </figure>
                  </a>
              
                  <div class="title-wrapper">
                    <a href="./movie-details.html">
                      <h3 class="card-title"><?= $movie['title'] ?></h3>
                    </a>
                    <time datetime="<?= $movie['release_date'] ?>"><?= date('Y', strtotime($movie['release_date'])) ?></time>
                  </div>
              
                  <div class="card-meta">
                    <div class="badge badge-outline">2K</div>
              
                    <div class="duration">
                      <ion-icon name="time-outline"></ion-icon>
              
                      <time datetime="PT122M"><?= $movie['duration'] ?> min</time>
                    </div>
              
                    <div class="rating">
                      <ion-icon name="star"></ion-icon>
              
                      <data>7.8</data>
                    </div>
                  </div>
              
                </div>
              </li>  
            <?php endforeach; ?>

          </ul>

        </div>

      </section>

    </article>

  </main>


 