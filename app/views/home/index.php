<main>
    <article>

      <section class="hero" style="background-image: url('<?= BASEURL ?>/img/backgroundHome.jpg');">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">Filmlane</p>

            <h1 class="h1 hero-title">
              Explore a Vast Collection of <strong>Films</strong> and <strong>Series</strong>.
            </h1>

            <div class="meta-wrapper">

              <div class="badge-wrapper">
                <div class="badge badge-outline">HD</div>
              </div>

              <div class="ganre-wrapper">
                <a href="#">Action,</a>

                <a href="#">Drama</a>
              </div>

              <div class="date-time">

                <div>
                  <ion-icon name="calendar-outline"></ion-icon>

                  <time datetime="2022">2011</time>
                </div>

                <div>
                  <ion-icon name="time-outline"></ion-icon>

                  <time datetime="PT128M">50 min</time>
                </div>

              </div>

            </div>

            <button class="btn btn-primary" onclick="">
              <ion-icon name="play"></ion-icon>
              <span>Watch now</span>
            </button>

          </div>

        </div>
      </section>

      <!-- 
        - #UPCOMING
      -->

      <section class="upcoming">
        <div class="container">

          <div class="flex-wrapper">

            <div class="title-wrapper">
              <h2 class="h2 section-title">Best Movies</h2>

            </div>

          </div>

          <ul class="movies-list  has-scrollbar">
            <?php foreach ($data['latest_movies'] as $movie) : ?>
              <li>
                <div class="movie-card">
  
                  <a href="<?= BASEURL ?>/film/detail/<?= $movie['id_movies']?>">
                    <figure class="card-banner">
                      <img src="<?= BASEURL ?>/<?= $movie['poster']?>" alt="<?= $movie['title']?> movie poster">
                    </figure>
                  </a>
  
                  <div class="title-wrapper">
                    <a href="<?= BASEURL ?>/film/detail/<?= $movie['id_movies'] ?>">
                      <h3 class="card-title"><?= $movie['title']?></h3>
                    </a>
  
                    <time datetime="<?= $movie['release_date'] ?>"><?= date('Y', strtotime($movie['release_date'])) ?></time>
                  </div>
  
                  <div class="card-meta">
                    <div class="badge badge-outline">HD</div>
  
                    <div class="duration">
                      <ion-icon name="time-outline"></ion-icon>
  
                      <time datetime="<?= $movie['duration'] ?>"><?= $movie['duration'] ?></time>
                    </div>
  
                    <div class="rating">
                      <ion-icon name="star"></ion-icon>
  
                      <data>NR</data>
                    </div>

                  </div>
                  <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
                  <div class="card-actions">
                    <button class="btn-update"  onclick="location.href= '<?= BASEURL ?>/home/edit/<?= $movie['id_movies'] ?>'">Update</button>
                    <button class="btn-delete" data-id="<?= $movie['id_movies'] ?>">Delete</button>
                  </div>
                  <?php endif; ?>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>

        </div>
      </section>

      <!-- 
        - #TOP RATED
      -->

      <section class="top-rated">
        <div class="container">

          <h2 class="h2 section-title">Movies</h2>
          <ul class="movies-list">
            <?php foreach ($data['movies'] as $movie) : ?>
              <li>
                <div class="movie-card">

                  <a href="<?= BASEURL ?>/film/detail/<?= $movie['id_movies'] ?>">
                    <figure class="card-banner">
                      <img src="<?= BASEURL ?>/<?= $movie['poster'] ?>" alt="<?= $movie['title'] ?>poster">
                    </figure>
                  </a>

                  <div class="title-wrapper">
                    <a href="<?= BASEURL ?>/film/detail/<?= $movie['id_movies'] ?>">
                      <h3 class="card-title"><?= $movie['title'] ?></h3>
                    </a>

                    <time datetime="<?= $movie['release_date'] ?>"><?= date('Y', strtotime($movie['release_date'])) ?></time>
                    
                  </div>

                  <div class="card-meta">
                    <div class="badge badge-outline">2K</div>

                    <div class="duration">
                      <ion-icon name="time-outline"></ion-icon>

                      <time datetime="PT122M"><?= $movie['duration'] ?></time>
                    </div>

                    <div class="rating">
                      <ion-icon name="star"></ion-icon>

                      <data>7.8</data>
                    </div>
                  </div>
                  <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') : ?>
                  <div class="card-actions">
                    <button class="btn-update" onclick="location.href= '<?= BASEURL ?>/home/edit/<?= $movie['id_movies'] ?>'">Update</button>
                    <button class="btn-delete" data-id="<?= $movie['id_movies'] ?>">Delete</button>
                  </div>
                  <?php endif; ?>
                </div>

              </li>
            <?php endforeach; ?>
        </div>

      </section>


      <!-- 
        - #TV SERIES
      -->

      <section class="tv-series">
        <div class="container">

          <p class="section-subtitle">Best TV Series</p>

          <h2 class="h2 section-title">World Best TV Series</h2>

          <ul class="movies-list">

            <li>
              <div class="movie-card">

                <a href="./movie-details.html">
                  <figure class="card-banner">
                    <img src="<?= BASEURL ?>/img/series-1.png" alt="Moon Knight movie poster">
                  </figure>
                </a>

                <div class="title-wrapper">
                  <a href="./movie-details.html">
                    <h3 class="card-title">Moon Knight</h3>
                  </a>

                  <time datetime="2022">2022</time>
                </div>

                <div class="card-meta">
                  <div class="badge badge-outline">2K</div>

                  <div class="duration">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="PT47M">47 min</time>
                  </div>

                  <div class="rating">
                    <ion-icon name="star"></ion-icon>

                    <data>8.6</data>
                  </div>
                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>

    </article>
  </main>


<script>
document.querySelectorAll('.btn-delete').forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault();

        var id = this.getAttribute('data-id');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?= BASEURL ?>/home/delete/' + id, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('X-HTTP-Method-Override', 'DELETE');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert('Movie deleted successfully');
                location.reload();
            }
        }
        xhr.send();
    });
});
</script>