<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Movie</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/update.css">
</head>

<body>
    <div class="container">
        <h1>Update data Film</h1>
        <form>
            <div class="form-group">
                <label for="movieTitle">Movie Title</label>
                <input type="text" class="form-control" id="movieTitle" placeholder="Enter movie title">
            </div>
            <div class="form-group">
                <label for="releaseDate">Release Date</label>
                <input type="date" class="form-control" id="releaseDate">
            </div>
            <div class="form-group">
                <label for="poster">Poster (PNG, JPG)</label>
                <input type="file" class="form-control" id="poster" accept="image/png, image/jpeg">
            </div>
            <div class="form-group">
                <label for="file">File (MP4)</label>
                <input type="file" class="form-control" id="file" accept="video/mp4">
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input type="text" class="form-control" id="duration" placeholder="Enter duration">
            </div>
            <div class="form-group">
                <label for="synopsis">Synopsis</label>
                <textarea class="form-control" id="synopsis" placeholder="Enter synopsis"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>