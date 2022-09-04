<div class="bg-image">

    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"><img src="logo.png" class="d-inline-block align-top"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbarToggler13" aria-controls="myNavbarToggler13" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNavbarToggler13">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Начало</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="contact" onClick="PopUp()">Относно</a>
                </li>
                <?php
                if ((isset($_SESSION["admin"]))) {
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="view.php">Админ панел</a>
                    </li>
                <?php  } ?>
                <li class="nav-item">
                    <a class="nav-link" href="last.php">Последни заглавия</a>
                </li>
                <li class="nav-item">
                    <?php
                    if (!(isset($_COOKIE["username"]))) {
                    ?>
                        <a class="nav-link" href='login.php'>Влизане</a>
                    <?php } else { ?>
                        <a class="nav-link" href="logout.php">Излизане</a>
                    <?php  } ?>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    if (isset($_COOKIE["username"])) {
    ?>
        <p class=hi>Здравей, <?php echo $_COOKIE["username"]; ?>! </p>
    <?php
    }
    ?>
    <div class=d_list>
        <?php
        include('drop_list.php');
        ?>
    </div>
</div>


<div class="bg-search">
    <form class="example" action='index.php' method="get">
        <input type="text" name="search" placeholder="Търсене" color: #000; id="search">
        <button class="s1" type="submit" name=""></button>
        <button class="s2" onclick="myFunction2()"> </button>
        <script>
            function myFunction2() {
                window.open("help.php", "_blank");
            }
        </script>
        <br>
        <input type="radio" name="search_type" value="ime" checked="checked" <?php if (isset($_GET['search_type']) && ($_GET['search_type'] == 'ime')) echo 'checked="checked" '; ?>>Заглавие
        <input type="radio" name="search_type" value="avtor" <?php if (isset($_GET['search_type']) && ($_GET['search_type'] == 'avtor')) echo 'checked="checked" '; ?>>Автор
        <input type="radio" name="search_type" value="tag" <?php if (isset($_GET['search_type']) && ($_GET['search_type'] == 'tag')) echo 'checked="checked" '; ?>>Тагове

        <div class="dropdown">
            <button class="dropbtn">Жанрове</button>
            <div class="dropdown-content">
                <a href="sci-fi.php">Научна фантастика </a>
                <a href="thriller.php">Трилъри</a>
                <a href="fantasy.php">Фентъзи </a>
            </div>
        </div>

    </form>
</div>

<script src="about.js"></script>