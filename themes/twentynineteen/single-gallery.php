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

$gallery_img = get_field('gallery_img');
$gallery_cover = get_field('gallery_cover');


$query = new WP_Query(array( 
    'post_type' => 'gallery',
    //'post__not_in' => array(get_the_ID()),
    'posts_per_page' => 3
));


?>
    
<!-- Cover -->
    <div class="push-cover"></div>


<!-- Content -->
    <section class="news_post">

        <article>
            
            <div class="bg-article" style="background-image: url('<?php echo $gallery_cover['sizes']['2048x2048']; ?>');">
                <div class="fade-bg-article"></div>
            </div>
            <div class="container px-4 px-lg-5">

                <div class="row">
                    <div class="col mb-4">
                        <a href="<?php echo get_permalink_wpml('gallery', ICL_LANGUAGE_CODE); ?>">
                            <i data-feather="arrow-left" class="fe mr-1" style="width: 30px;"></i>
                            <?php echo toggle_language_wpml("แกลลอรี่", "GALLERY", ICL_LANGUAGE_CODE)?>
                        </a>
                    </div>
                </div>
    
                <div class="row">
                    <div class="col">
                        <div class="mb-5 mx-2">
                            <h3 class="text-center mb-1 title"><strong><?php echo get_the_title(); ?></strong></h3>
                            <p class="text-center text-secondary m-0">
                                <time datetime="2020-10-21T18:00:00">
                                    <i data-feather="bookmark" class="fe mr-1" style="width: 16px;"></i>
                                    By admin • 1 month ago
                                </time>
                            </p>
                            <hr>
                        </div>
                    </div>
                </div>
    
                <div class="row">
                    <?php foreach ($gallery_img as $item) : ?>
                    <div class="col-12 col-sm-6 col-md-4 col-xl-4 mb-4">
                        <a href="<?php echo $item['sizes']['1536x1536']; ?>"
                        data-thumbs='{"autoStart":true, "axis" : "x"}'
                        data-fancybox="images" 
                        data-thumb="<?php echo $item['sizes']['medium']; ?>">
                            <div class="image-box">
                                <div class="image-box--image" style="background-image: url(<?php echo $item['sizes']['medium_large']; ?>)"></div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>

                </div>
                
            </div>
        </article>
   
    </section>

    <section class="lasted-post mt-5 mt-md-0">

        <div class="container px-4 px-lg-5">

            <div class="row section_tag">
                <div class="col-12 border-left-green ml-2 ml-md-3">
                    <h5 class="section_tagline_product mb-0"><?php echo toggle_language_wpml("ภาพกิจกรรมล่าสุด และ ผลิตภัณฑ์", "Monza Product & Event", ICL_LANGUAGE_CODE)?></h5>
                    <h2 class="section_title mt-1 mb-0"><?php echo toggle_language_wpml("รูปภาพ", "Lasted Gallery", ICL_LANGUAGE_CODE)?></h2>
                </div>
            </div>


            <div class="row mt-4">
            <?php if ( $query->have_posts() ) : ?>

                <?php foreach ($query->posts as $item) : ?>
                <?php $thumbnail = get_field( 'gallery_cover', $item->ID ); ?>
                    
                <div class="col-12 col-sm-6 col-md-4 col-xl-4 mb-4">
                    <a href="<?php echo get_post_permalink($item->ID); ?>">
                        <div class="image-box square">
                            <div class="image-box--fade"></div>
                            <div class="image-box--title"><?php echo $item->post_title;?></div>
                            <div class="image-box--text">
                                <i data-feather="image" class="fe"></i> 8 image
                            </div>
                            <div class="image-box--image" style="background-image: url(<?php echo $thumbnail['sizes']['medium_large']; ?>)"></div>
                        </div>
                    </a>
                </div>

                <?php endforeach; ?>

            <?php endif; ?>

            </div>

        </div>

    </section>

    
    <style>
        .fancybox-container .fancybox-inner{
            width: 100%;
        }
        .fancybox-container .fancybox-thumbs {
            top: auto;
            width: auto;
            bottom: 0;
            left: 0;
            right: 0;
            height: 95px;
            padding: 10px 10px 5px 10px;
            box-sizing: border-box;
            background: rgba(0, 0, 0, 0.3);
        }

        .fancybox-container .fancybox-show-thumbs .fancybox-inner {
            right: 0;
            bottom: 95px;
        }
        .fancybox-inner{
            padding: 100px;
        }
    </style>

<?php
get_footer();
