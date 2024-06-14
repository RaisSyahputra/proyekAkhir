<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Movie</title>
    <link rel="stylesheet" href="<?=  BASEURL ?>/css/upload.css">
</head>

<body>
    <div class="container">
        <h1>Upload Movie</h1>
        <form action="<?= BASEURL ?>/home/upload" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="movieTitle">Movie Title</label>
                <input type="text" class="form-control" id="movieTitle" name="title" placeholder="Enter movie title">
            </div>

            <div class="form-group">
                <label>Genre</label><br>
                <div class="scrollable-checkbox-list">
                    <input type="checkbox" id="action" name="genre_id[]" value="1">
                    <label for="action">Action</label><br>
                    <input type="checkbox" id="adventure" name="genre_id[]" value="2">
                    <label for="adventure">Adventure</label><br>
                    <input type="checkbox" id="fantasy" name="genre_id[]" value="3">
                    <label for="fantasy">Fantasy</label><br>
                    <input type="checkbox" id="thriller" name="genre_id[]" value="4">
                    <label for="thriller">Thriller</label><br>
                    <input type="checkbox" id="comedy" name="genre_id[]" value="5">
                    <label for="comedy">Comedy</label><br>
                    <input type="checkbox" id="scifi" name="genre_id[]" value="6">
                    <label for="scifi">Sci-Fi</label><br>
                    <input type="checkbox" id="drama" name="genre_id[]" value="7">
                    <label for="drama">Drama</label><br>
                    <input type="checkbox" id="horror" name="genre_id[]" value="8">
                    <label for="horror">Horror</label><br>
                    <input type="checkbox" id="romance" name="genre_id[]" value="9">
                    <label for="romance">Romance</label><br>
                </div>
            </div>
            <div class="form-group">
                <label for="releaseDate">Release Date</label>
                <input type="date" class="form-control" id="releaseDate" name="release_date">
            </div>
            <div class="form-group">
                <label for="poster">Poster (PNG, JPG)</label>
                <input type="file" class="form-control" id="poster" name="poster" accept="image/png, image/jpeg">
            </div>
            <div class="form-group">
                <label for="file">File (MP4)</label>
                <input type="file" class="form-control" id="file" name="file_path" accept="video/mp4">
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter duration" pattern="\d{1,11}">
            </div>
            <div class="form-group">
                <label for="synopsis">Synopsis</label>
                <textarea class="form-control" id="synopsis" name="synopsis" placeholder="Enter synopsis"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>

</html>