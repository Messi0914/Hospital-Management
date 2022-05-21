<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>eCare Home page</title>

        <!-- CSS FILES -->        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link href="css/owl.carousel.min.css" rel="stylesheet">

        <link href="css/owl.theme.default.min.css" rel="stylesheet">

        <link href="css/templatemo-medic-care.css" rel="stylesheet">

      

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    </head>
    
    <body id="top">
    
        <main>

            <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
                <div class="container">
                    <a class="navbar-brand mx-auto d-lg-none" href="index.html">
                        eCare
                        <strong class="d-block">Health Specialist</strong>
                    </a>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item active" class="<?php if($page=='home'){echo 'active';} ?>">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#about">About</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="search_Doctor.php">To Know</a>
                            </li>

                             <li class="nav-item" class="<?php if($page=='order'){echo 'active';} ?>">
                                <a class="nav-link" href="indexO.php">Order Medicine</a>
                            </li>

                            <a class="navbar-brand d-none d-lg-block" href="index.php">
                                eCare
                                <strong class="d-block">Health Specialist</strong>
                            </a>

                            <li class="nav-item" class="<?php if($page=='register'){echo 'active';} ?>">
                                <a class="nav-link" href="register.php">Registration</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#booking">Make an Appointment</a>
                            </li>

                            <li class="nav-item" class="<?php if($page=='login'){echo 'active';} ?>">
                                <a class="nav-link" href="login.php">User Profile </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </nav>

</body>
</html>