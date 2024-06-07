<main>
  <article>
    <!-- 
      - #MOVIE DETAIL
    -->
    <section class="movie-detail">
      <div class="container">
        <figure class="movie-detail-banner">
          <img src="<?= BASEURL ?>/<?= $data['series']['poster'] ?>" alt="<?= $data['series']['title'] ?> poster">
          <button class="play-btn">
            <ion-icon name="play-circle-outline"></ion-icon>
          </button>
        </figure>
        <div class="movie-detail-content">
          <p class="detail-subtitle">___</p>
          <h1 class="h1 detail-title">
            <strong><?= $data['series']['title'] ?></strong>
          </h1>
          <div class="meta-wrapper">
            <div class="badge-wrapper">
              <div class="badge badge-fill">PG 13</div>
              <div class="badge badge-outline">HD</div>
            </div>
            <div class="ganre-wrapper">
              <a><?= $data['series']['genre_names'] ?></a>
            </div>
            <div class="date-time">
              <div>
                <ion-icon name="calendar-outline"></ion-icon>
                <time datetime="<?= $data['series']['release_date'] ?>"><?= date('Y', strtotime($data['series']['release_date'])) ?></time>
              </div>
              <div>
                <ion-icon name="time-outline"></ion-icon>
                <time datetime="PT<?= $data['series']['duration'] ?>M"><?= $data['series']['duration'] ?> min</time>
              </div>
            </div>
          </div>
          <p class="storyline">
            <?= $data['series']['synopsis'] ?>
          </p>
          <div class="details-actions">
            <button class="share">
              <ion-icon name="share-social"></ion-icon>
              <span>Share</span>
            </button>
            <div class="title-wrapper">
              <p class="title">Video</p>
              <p class="text">Streaming Channels</p>
            </div>
            <button class="btn btn-primary">
              <ion-icon name="play"></ion-icon>
              <span>Watch Now</span>
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- 
      - #TV SERIES
    -->

    <section class="tv-series">
      <div class="container">
        <p class="section-subtitle">Other Series</p>
        <h2 class="h2 section-title">Series</h2>
        <ul class="movies-list">

          <?php foreach ($data['latest_series'] as $serie): ?>
            <li>
              <div class="movie-card">
                <a href="<?= BASEURL ?>/series/detail/<?= $serie['id_series'] ?>">
                  <figure class="card-banner">
                    <img src="<?= BASEURL ?>/<?= $serie['poster'] ?>" alt="<?= $serie['title'] ?> poster">
                  </figure>
                </a>
                <div class="title-wrapper">
                  <a href="<?= BASEURL ?>/series/detail/<?= $serie['id_series'] ?>">
                    <h3 class="card-title"><?= $serie['title'] ?></h3>
                  </a>
                  <time datetime="<?= $serie['release_date'] ?>"><?= date('Y', strtotime($serie['release_date'])) ?></time>
                </div>
                <div class="card-meta">
                  <div class="badge badge-outline">2K</div>
                  <div class="duration">
                    <ion-icon name="time-outline"></ion-icon>
                    <time datetime="PT<?= $serie['duration'] ?>M"><?= $serie['duration'] ?> min</time>
                  </div>
                  <div class="rating">
                    <ion-icon name="star"></ion-icon>
                    <data>8.6</data>
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
