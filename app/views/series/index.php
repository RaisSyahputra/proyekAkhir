<main>
    <article>
        <!-- 
            - #TV SERIES
        -->

        <section class="hero" style="background-image: url('<?= BASEURL ?>/img/backgroundSeries.jpg');">
            <div class="container">

                <div class="hero-content">

                    <p class="hero-subtitle">Filmlane</p>

                    <h1 class="h1 hero-title">
                        Unlimited <strong>TV Series</strong>, TVs Shows, & More.
                    </h1>

                    <div class="meta-wrapper">

                        <div class="badge-wrapper">
                            <div class="badge badge-outline">HD</div>
                        </div>

                        <div class="ganre-wrapper">
                            <a href="#">Action,</a>

                            <a href="#">Adventure</a>
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
        

        <section class="tv-series">
            <div class="container">

                <p class="section-subtitle">Best TV Series</p>

                <h2 class="h2 section-title">World Best TV Series</h2>

                <ul class="movies-list">
                    <?php foreach ($data['series'] as $serie) : ?>
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

                                        <time datetime="PT47M"><?= $serie['duration'] ?> min</time>
                                    </div>

                                    <div class="rating">
                                        <ion-icon name="star"></ion-icon>

                                        <data>8.6</data>
                                    </div>
                                </div>

                                <div class="card-actions">
                                    <button class="btn-update" onclick="location.href= '<?= BASEURL ?>/home/edit/<?= $serie['id_series'] ?>'">Update</button>
                                    <button class="btn-delete" data-id="<?= $serie['id_series'] ?>">Delete</button>

                                </div>

                            </div>
                        </li>
                    <?php endforeach; ?>
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
        xhr.open('POST', '<?= BASEURL ?>/series/delete/' + id, true);
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.setRequestHeader('X-HTTP-Method-Override', 'DELETE');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert('Series deleted successfully');
                location.reload();
            }
        }
        xhr.send();
    });
});
</script>