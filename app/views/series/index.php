<main>
    <article>
        <!-- 
            - #TV SERIES
        -->

        <section class="tv-series">
            <div class="container">

                <p class="section-subtitle">Best TV Series</p>

                <h2 class="h2 section-title">World Best TV Series</h2>

                <ul class="movies-list">
                    <?php foreach ($data['series'] as $serie) : ?>
                        <li>
                            <div class="movie-card">

                                <a href="./movie-details.html">
                                    <figure class="card-banner">
                                        <img src="<?= BASEURL ?>/<?= $serie['poster'] ?>" alt="<?= $serie['title'] ?> poster">
                                    </figure>
                                </a>

                                <div class="title-wrapper">
                                    <a href="./movie-details.html">
                                        <h3 class="card-title"><?= $serie['title'] ?></h3>
                                    </a>

                                    <time datetime="<?= $serie['release_date'] ?>"><?= date('Y', strtotime($serie['release_date'])) ?></time>
                                </div>

                                <div class="card-meta">
                                    <div class="badge badge-outline">2K</div>

                                    <div class="duration">
                                        <ion-icon name="time-outline"></ion-icon>

                                        <time datetime="PT47M"><?= $serie['duration'] ?> min</time>
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
