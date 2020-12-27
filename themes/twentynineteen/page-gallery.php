<?php
/**
* Template Name: GALLERY
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/
get_header();

$query = new WP_Query( array( 'post_type' => 'gallery' ) );

$gallery_video = get_field('gallery-video', 'gallery-video', false);
$gallery_video = gallery__adapter_video($gallery_video, ICL_LANGUAGE_CODE);

$gallery_banner = get_field('gallery_banner');
$gallery_page_video = get_field('gallery_page_video');
$gallery_page_picture = get_field('gallery_page_picture');
//dd($gallery_video);


?>


<!--Banner-->

    <div class="product_cover" style="background-image: url('<?php echo $gallery_banner['gallery_banner_bg']; ?>');">  
        <div class="fade-box"></div>
        <div class="product_cover_text">    
            <h2 class="section_title"><?php echo $gallery_banner['gallery_banner_title']; ?></h2>
            <h4><?php echo $gallery_banner['gallery_banner_subtitle']; ?></h4>
        </div>
    </div>


<!--Gallery -->

    <section class="page-gallery">

        <div class="container px-4 px-md-0">

            <div class="row mb-2">
                <div class="col-12 border-left-green ml-2 ml-md-3 mb-3">
                    <h5 class="section_tagline_product mb-0"><?php echo $gallery_page_video['gallery_video_subtitle']; ?></h5>
                    <h2 class="section_title mt-2 mb-0"><?php echo $gallery_page_video['gallery_video_title']; ?></h2>
                </div>
            </div>
            
            
            <div class="row px-3">
                <div class="blog-vdo col-12 col-lg-12">
                    <div class="owl-carousel owl-theme" id="owl-carousel1">

                        <?php foreach ($gallery_video as $item) :?>

                            <div class="row mt-3 mb-5 item">
                                <div class="col-12 video-box">
                                    <a data-fancybox href="<?php echo $item['gallery-video-url']; ?>&origin=*">
                                        <div class="play-button">
                                            <span class="triangle-right"></span>
                                        </div>
                                        <p class="d-none"><?php echo $item['gallery-video-name']; ?></p>
                                        <div class="video-box--image" style="background-image: url(http://img.youtube.com/vi/<?php echo $item['_video_id']; ?>/maxresdefault.jpg)"></div>
                                    </a>
                                </div>
                            </div>

                        <?php endforeach;?>

                    </div>
                </div>
            </div>
            

            <div class="row mb-2">
                <div class="col-12 border-left-green ml-2 ml-md-3 mb-3">
                    <h5 class="section_tagline_product mb-0"><?php echo $gallery_page_picture['gallery_picture_subtitle']; ?></h5>
                    <h2 class="section_title mt-1 mb-0"><?php echo $gallery_page_picture['gallery_picture_title']; ?></h2>
                </div>
            </div>

            <div class="row px-3">

                <div class="blog-vdo col-12 col-lg-12">
                    <div class="owl-carousel owl-theme" id="owl-carousel2">

                        <div class="row mt-3 mb-5 item">
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
                </div>
            </div>

        </div>

    </section>

<!--SCRIPT -->
    <script>
        $('#owl-carousel1').owlCarousel({
            items   : 2,
            loop    : false,
            margin  : 10,
            dots    : true,
            autoplay            : false,
            autoplayTimeout     : 5000,
            responsive:{
                0:{
                    items:1
                },
                768:{
                    items:2
                },
                1140:{
                    items:2
                }
            }
        })
        $('#owl-carousel2').owlCarousel({
            items   : 1,
            loop    : false,
            margin  : 10,
            dots    : true,
            autoplay            : false,
            autoplayTimeout     : 5000,
        })
    </script>


<?php
get_footer();
