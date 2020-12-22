<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?><!doctype html>
<html>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

	<link rel='stylesheet' href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">
	<link rel="stylesheet" href="https://cdn.plyr.io/3.6.2/plyr.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"/>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/fonts.css?v=<?php echo rand();?>">

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/feather-icons"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>


	<?php wp_head(); ?>
	
</head>

<body class="overflow-hidden">

    <div class="preload-fullpage" id="preload">
        <img class="preload-fullpage-logo animate__animated animate__backInDown animate__flash" src="<?php echo get_template_directory_uri(); ?>/img/monza-factory-logo.png" alt="">
    </div>

    <nav class="navbar-top">
        <div class="container">
            <div class="row">
                <div class="col d-none d-lg-block">
                    +662 999 9999 | SALES@MONZAFACTORY.COM
                </div>
                <div class="col text-right d-none d-md-block">
                    <div class="btn-group">
                        <button type="button" class="btn btn-language p-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          EN
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">EN</a>
                          <a class="dropdown-item" href="#">TH</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <nav id="nav-top" class="navbar navbar-expand-lg navbar-light navbar-sticky w-100">
        <div class="container">

            <a class="navbar-brand" href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/img/monza-factory-logo.png" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <i data-feather="menu" class="text-white"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarText">

                <ul class="navbar-nav">
                    <!-- <li class="nav-item active"></li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT <i data-feather="chevron-down" class="fe"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PRODUCT <i data-feather="chevron-down" class="fe"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT</a>
                    </li>
                    <li class="nav-item mr-0 d-none d-xl-block">
                        <a class="nav-link pr-0 pt-2" href="#"><i data-feather="menu" class="fe-menu text-white"></i></a>
                    </li>
                </ul>
                
            </div>

        </div>
    </nav>

    <nav id="nav-stickky" class="navbar navbar-expand-lg navbar-light position-fixed w-100 navbar-hide">
        <div class="container">

            <a class="navbar-brand" href="#">
                <img src="<?php echo get_template_directory_uri(); ?>/img/monza-factory-logo.png" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <i data-feather="menu" class="text-white"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarText">

                <ul class="navbar-nav">
                    <!-- <li class="nav-item active"></li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT <i data-feather="chevron-down" class="fe"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PRODUCT <i data-feather="chevron-down" class="fe"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT</a>
                    </li>
                    <li class="nav-item mr-0  d-none d-xl-block">
                        <a class="nav-link pr-0 pt-2" href="#"><i data-feather="menu" class="fe-menu text-white"></i></a>
                    </li>
                </ul>
                
            </div>

        </div>
    </nav>




