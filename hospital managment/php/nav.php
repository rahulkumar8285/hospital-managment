<html>

<head>
</head>

<body>
    <?php
    include 'link.php';
    error_reporting(0);
    session_start();
    ?>

    <div class="">
        <nav class="navbar navbar-expand-sm  navbar-dark  bg-info " id="nav">
            <div class="container">
                <a href="index.php" class="navbar-brand ">
                    <h2>Hospital</h2>
                </a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navid">
                    <samp class="navbar-toggle-icon"><i class="fas fa-bars"></i></samp>
                </button>

                <div id="navid" class="collapse navbar-collapse">
                    <ul class="navbar-nav text-center ml-auto">
                        <li class="nav-item">
                            <a href="#about" class="nav-link">about</a>
                        </li>
                        <li class="nav-item">
                            <?php
                            if ($_SESSION["adminemail"]) {
                                ?>
                                <a href="adminhome.php" class="nav-link">Dasbord</a>
                            <?php  } else {
                            echo "session not okh";
                        }

                        ?>

                        </li>

                        <li class="nav-item">
                            <?php
                            if ($_SESSION["docteremail"]) {
                                ?>
                                <a href="doctorpanel.php" class="nav-link">Dasbord</a>
                            <?php  } else {
                            echo "session not okh";
                        }

                        ?>

                        </li>

                        <li class="nav-item">
                            <a href="logout.php" class="nav-link"><button type="button" class="btn btn-outline-secondary">Logout</button></a>
                        </li>


                    </ul>
                </div>

            </div>
        </nav>
    </div>

    <!-- The Modal -->


    <!---------------------------tab--data--end----->
    </div>

    </div>



    </div>
    </div>


    </div>



</body>

</html>