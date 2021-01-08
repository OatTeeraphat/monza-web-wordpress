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

$header_nav = get_field('header_nav', 'option');

$url = get_post_permalink(get_queried_object_id());

$en_permalink = apply_filters( 'wpml_permalink', $url , 'en' ); 
$th_permalink = apply_filters( 'wpml_permalink', $url , 'th' );

//dd(get_queried_object_id());

?>
<!doctype html>
<html>
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <link rel='stylesheet' href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap">
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
        <div class="container overflow-inherit">
            <div class="row">
                <div class="col d-none d-lg-block">
                    <?php the_field('header_contact', 'option'); ?>
                </div>
                <div class="col text-right d-none d-md-block">
                    <div class="btn-group">
                        <button type="button" class="btn btn-language p-0 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo ICL_LANGUAGE_CODE == 'th' ? 'TH' : 'EN' ?>
                        </button>
                        <div class="dropdown-menu dropdown-language">
                          <a class="dropdown-item" href="<?php echo $en_permalink; ?>">EN</a>
                          <a class="dropdown-item" href="<?php echo $th_permalink; ?>">TH</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <nav id="nav-top" class="navbar navbar-expand-lg navbar-light navbar-sticky w-100">
        <div class="container overflow-inherit">

            <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                <img src="<?php the_field('header_logo', 'option'); ?>" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <i data-feather="menu" class="text-white"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarText">

                <ul class="navbar-nav">
                    <!-- <li class="nav-item active"></li> -->
                    <?php $header_nav_show = array_slice($header_nav, 0, 4);?>
                    <?php $header_nav_collapse = array_slice($header_nav, 4);?>
                    <?php foreach ( $header_nav_show as $nav) : ?>

                        <li class="nav-item nav-toggle-sub">
                            <a class="nav-link" href="<?php echo $nav['nav_main_url']; ?>"><span><?php echo $nav['nav_main']; ?></span> <i data-feather="chevron-down" class="fe <?php echo empty($nav['nav_has_sub']) ? 'd-none' : ''?> "></i></a>
                        
                        <?php if (!empty($nav['nav_has_sub'])): ?>
                            <ul class="navbar-sub" style="display:none">

                            <?php foreach ( $nav['nav_sub'] as $sub) : ?>

                                <li class="nav-sub-item mr-0 d-none d-xl-block" onclick="location.href='<?php echo $sub['nav_sub_url'];?>'">
                                    <a href="<?php echo $sub['nav_sub_url'];?>"><?php echo $sub['nav_sub_name'];?></a>
                                </li> 

                            <?php endforeach; ?>

                            </ul>
                        <?php endif; ?>

                        </li>

                    <?php endforeach; ?>
                    <?php foreach ( $header_nav_collapse as $nav) : ?>
                        <li class="nav-item nav-toggle-sub d-lg-none">
                            <a class="nav-link" href="<?php echo $nav['nav_main_url']; ?>"><span><?php echo $nav['nav_main']; ?></span></a>
                        </li>
                    <?php endforeach; ?>
                    
                    <?php if (!empty($header_nav_collapse)): ?>
                        <li class="nav-item mr-0 d-none d-xl-block nav-toggle-sub">
                            <a class="nav-link pr-0 pt-2"><i data-feather="menu" class="fe-menu text-white"></i></a>
                            <ul class="navbar-sub" style="display:none">

                            <?php foreach ( $header_nav_collapse as $collapse) : ?>

                                <li class="nav-sub-item mr-0 d-none d-xl-block" onclick="location.href='<?php echo $sub['nav_sub_url'];?>'">
                                    <a href="<?php echo $collapse['nav_main_url'];?>"><?php echo $collapse['nav_main'];?></a>
                                </li> 

                            <?php endforeach; ?>

                            </ul>
                        </li>

                    <?php endif; ?>

                </ul>

            </div>

        </div>
    </nav>

    <nav id="nav-stickky" class="navbar navbar-expand-lg navbar-light position-fixed w-100 navbar-hide">
        <div class="container overflow-inherit">

            <a class="navbar-brand" href="#">
                <img src="<?php the_field('header_logo', 'option'); ?>" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <i data-feather="menu" class="text-white"></i>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarText">

                <ul class="navbar-nav">
                    <!-- <li class="nav-item active"></li> -->
                    <?php $header_nav_show = array_slice($header_nav, 0, 4);?>
                    <?php $header_nav_collapse = array_slice($header_nav, 4);?>
                    <?php foreach ( $header_nav_show as $nav) : ?>

                        <li class="nav-item nav-toggle-sub">
                            <a class="nav-link" href="<?php echo $nav['nav_main_url']; ?>"><span><?php echo $nav['nav_main']; ?></span> <i data-feather="chevron-down" class="fe <?php echo empty($nav['nav_has_sub']) ? 'd-none' : ''?> "></i></a>
                        
                        <?php if (!empty($nav['nav_has_sub'])): ?>
                            <ul class="navbar-sub" style="display:none">

                            <?php foreach ( $nav['nav_sub'] as $sub) : ?>

                                <li class="nav-sub-item mr-0 d-none d-xl-block" onclick="location.href='<?php echo $sub['nav_sub_url'];?>'">
                                    <a href="<?php echo $sub['nav_sub_url'];?>"><?php echo $sub['nav_sub_name'];?></a>
                                </li> 

                            <?php endforeach; ?>
                                
                            </ul>
                        <?php endif; ?>

                        </li>

                    <?php endforeach; ?>
                    <?php foreach ( $header_nav_collapse as $nav) : ?>
                        <li class="nav-item nav-toggle-sub d-lg-none">
                            <a class="nav-link" href="<?php echo $nav['nav_main_url']; ?>"><span><?php echo $nav['nav_main']; ?></span></a>
                        </li>
                    <?php endforeach; ?>
                    
                    <?php if (!empty($header_nav_collapse)): ?>
                        <li class="nav-item mr-0 d-none d-xl-block nav-toggle-sub">
                            <a class="nav-link pr-0 pt-2"><i data-feather="menu" class="fe-menu text-white"></i></a>
                            <ul class="navbar-sub" style="display:none">

                            <?php foreach ( $header_nav_collapse as $collapse) : ?>

                                <li class="nav-sub-item mr-0 d-none d-xl-block" onclick="location.href='<?php echo $sub['nav_sub_url'];?>'">
                                    <a href="<?php echo $collapse['nav_main_url'];?>"><?php echo $collapse['nav_main'];?></a>
                                </li> 

                            <?php endforeach; ?>

                            </ul>
                        </li>

                    <?php endif; ?>

                </ul>
                
            </div>

        </div>
    </nav>


    <script>

        $(function(){
            var navbar = $('#nav-stickky');
            var wpbar = $('#wpadminbar');
            var sub = $(".navbar-sub");

            wpbar.addClass('d-none')
            
            $(window).scroll(function(){

                var isDesktop = $(window).width() >= 768;
                var isMobile = $(window).width() < 768;

                if( isDesktop && $(window).scrollTop() >= 100){
                    navbar.removeClass('navbar-hide');
                    wpbar.addClass('d-none')
                    sub.fadeOut(0)
                }
                else if( isMobile < 768 && $(window).scrollTop() >= 60){
                    navbar.removeClass('navbar-hide');
                } else {
                    navbar.addClass('navbar-hide');
                    wpbar.removeClass('d-none')
                }

            });

        });

    </script>

    <script>

        $('.nav-toggle-sub').on('mouseenter', function(e){
            $(this).children(".navbar-sub").fadeIn(300)
        })
        $('.nav-toggle-sub').on('mouseleave', function(e){
            $(this).children(".navbar-sub").fadeOut(200)
        })

    </script>





