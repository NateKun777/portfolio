<?php $currentPageName = basename($_SERVER['SCRIPT_NAME']); ?>
<header>
    <div class="heading">
        <h1 class="logo">JABBERWOCK</h1>
        <div class="navbar">
            <ul class="navList">
                <a href="index.php" class="pageLink" style="color: black;" <?= $currentPageName === 'index.php' ? 'aria-current="page"' : '' ?>>Home</a>
                <a href="works.php" class="pageLink" style="color: black;" <?= $currentPageName === 'works.php' ? 'aria-current="page"' : '' ?>>Works</a>
            </ul>
        </div>
    </div>
    <hr>
</header>