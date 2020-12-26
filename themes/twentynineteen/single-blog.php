<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

<?php 

$postblog_banner = get_field('postblog_banner');
$postblog_title = get_field('postblog_title');


//dd($postblog_title);


?>
    
<!--Banner-->

<div class="product_cover" style="background-image: url('<?php echo $postblog_banner['postblog_banner_bg']['sizes']['1536x1536']?>');">  
        <div class="fade-box"></div>
        <div class="product_cover_text">    
            <h2 class="section_title"><?php echo $postblog_banner['postblog_banner_title']?></h2>
            <h4><?php echo $postblog_banner['postblog_banner_subtitle']?></h4>
        </div>
    </div>


<!-- Content -->
    <section class="news_post">

        <article>
            <div class="container px-4 px-lg-5">

                <div class="row">
                    <div class="col mb-4">
                        <a href="./news.html">
                            <i data-feather="arrow-left" class="fe mr-1" style="width: 30px;"></i>
                            NEWS
                        </a>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col">
                        <div class="mb-5 mx-2">
                            <h3 class="text-center mb-1 title"><strong><?php echo $postblog_title['postblog_title_main']?></strong></h3>
                            <p class="text-center text-secondary m-0">
                                <time datetime="2020-10-21T18:00:00">
                                    <i data-feather="bookmark" class="fe mr-1" style="width: 16px;"></i><?php echo $postblog_title['postblog_title_sub']?></time>
                            </p>
                            <hr>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col-12">
                        <div class="mb-5">
                            <img class="w-100" src="./img/vdo_image 9.png" alt="">
                        </div>
                        <div class="mt-4 mx-0 mx-md-0">
                            <div class="postblog_blog">
                                <img src="<?php echo $postblog_title['postblog_title_imgblog']['sizes']['1536x1536']?>" alt="">
                                <p><?php echo $postblog_title['postblog_title_blog']?></p>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>
        </article>
   
    </section>

    <section class="lasted-post mt-5 mt-md-0">

        <div class="container px-4 px-lg-5">

            <div class="row section_tag">
                <div class="col-12 border-left-green ml-2 ml-md-3">
                    <h5 class="section_tagline_product mb-0">Monza Product & Event</h5>
                    <h2 class="section_title mt-2 mb-0">Lasted News</h2>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                    <div class="home-blog-vdo thumbnail-blog" style="background-image: url(./img/vdo_image\ 9.png)"></div>
                    <div class="my-3">
                        <h3 class="mb-2"><strong>All New D-Max</strong></h3>
                        <p class="m-0 p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti perspiciatis optio possimus dolore! Perferendis aliquid qui.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                    <div class="home-blog-vdo thumbnail-blog" style="background-image: url(./img/vdo_image\ 9.png)"></div>
                    <div class="my-3">
                        <h3 class="mb-2"><strong>All New D-Max</strong></h3>
                        <p class="m-0 p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti perspiciatis optio possimus dolore! Perferendis aliquid qui.</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                    <div class="home-blog-vdo thumbnail-blog" style="background-image: url(./img/vdo_image\ 9.png)"></div>
                    <div class="my-3">
                        <h3 class="mb-2"><strong>All New D-Max</strong></h3>
                        <p class="m-0 p-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti perspiciatis optio possimus dolore! Perferendis aliquid qui.</p>
                    </div>
                </div>

            </div>

        </div>

    </section>

<?php
get_footer();
