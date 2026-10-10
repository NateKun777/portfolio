<!DOCTYPE html>

<?php

    include("database.php");

    $imageList = array();

    // Gets the table of images
    $sql = "SELECT * FROM images";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result)){
        array_push($imageList, $row);
    };

    // Orders the images
    $orderedIds = [3, 15, 13, 17, 9];

    $orderedImages = [];
    foreach ($orderedIds as $id) {
        foreach ($imageList as $image) {
            if ($image['img_id'] == $id) {
                array_push($orderedImages, $image);
            }
        }
    }

?>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles.css?v=<?= filemtime(__DIR__ . '/styles.css') ?>">

    <title>Homepage</title>

</head>

<body>

    <?php include "Layout/header.php"; ?>
     <!--Website banner-->
    <div class="banner">
        <image src="Images/Painting68-1.png" alt="Banner" class="bannerImage">
        <p class="bannerText">Imagination leads ability, ability shapes imagination.</p>
    </div>

    <main>
        <!--About me section-->
        <div class="about">
            <div class="aboutTitle">
                <h2>ABOUT ME</h2>
                <img src="<?= htmlspecialchars($imageList[0]['img_file'], ENT_QUOTES, 'UTF-8') ?>" alt="Profile Picture" class="profilePic">
            </div>
            <hr>
            <div class="aboutText">
                <p>Hello, I’m <b>Jabberwock</b>, a digital illustrator from the US! Since childhood, I’ve been interested in a number of subjects, including science, math, history, and software, but drawing is different. To be able to bring beautiful scenes and compelling designs from your imagination into reality is something truly unique to art.<br><br>
                    Yet an idea is only as powerful as your ability to bring it to life. As an artist, I want to keep honing my craft, pushing the limits of what I can bring to life, to create MORE compelling characters in MORE immersive scenes with MORE engaging narratives in MORE expansive worlds. <br><br>
                    If you like what you see and would like to see more, consider following using the links below.<br><br>
                    Thank you!
                </p>
            </div>
        </div>
        <hr>

        <!--Gallery-->
        <div class="gallery">
            <h2>WORKS</h2>

            <div class="imageGridContainer">
                <div class="imageGrid">
                    <?php foreach ($orderedImages as $index => $image):
                        $fullImage = htmlspecialchars($image['img_file'], ENT_QUOTES, 'UTF-8');
                    ?>
                        <div class="imageContainer" style="grid-area: box-<?= $index + 1?>">
                            <a href="<?= $fullImage ?>">
                                <img src="<?= $fullImage ?>" alt="Gallery Image">
                                <div class="imageOverlay">
                                    <h1><?= $image['img_name'] ?></h1>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

                    <!--See More Button-->
                    <div class="seeMore" style="grid-area: box-6">
                        <a href="works.php"> 
                            <p>SEE MORE <br>→</p>
                        </a>
                    </div>

                </div>
            </div>
        </div>

    </main>

    <?php include "Layout/footer.php"; ?>
    

</body>

</html>
