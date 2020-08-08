<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $page_title; ?></title>

        <!-- css -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/bootstrap-theme.min.css" />

</head>

<body>



        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Welcome To  Cricket Page</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                                <!-- show public private page link depending on whether the user has been authenticated -->
                                <?php if (!empty($_SESSION['user_id'])) {  ?>
                                        <li class="nav-item">
                                                <a class="nav-link" href="cricket_menu.php">Home</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="gallery.php">Players Pictures</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="cricket.php">List Of Players</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="player.php">Add Player</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="logout.php" title="Logout">Logout</a>
                                        </li>
                                <?php } else { ?>
                                        <li class="nav-item">
                                                <a class="nav-link" href="cricket_login.php">Login</a>
                                        </li>
                                        <li class="nav-item">
                                                <a class="nav-link" href="cricket_registeration.php">Register</a>
                                        </li>
                                <?php } ?>
                        </ul>
                </div>
        </nav>

        <!-- page content starts here -->