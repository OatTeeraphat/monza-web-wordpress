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
dd($query->posts);
//dd(get_post_type_archive_link());
?>


<!--Banner-->

    <div class="product_cover" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/product-main/cover_product.png');">  
        <div class="fade-box"></div>
        <div class="product_cover_text">    
            <h2 class="section_title">GALLERY</h2>
            <h4>MONZA CARBON FIBRE PERFORMANCE</h4>
        </div>
    </div>


<!--Gallery -->

    <section>

        <div class="container px-4 px-md-0">

            <div class="row mb-2">
                <div class="col-12 border-left-green ml-2 ml-md-3 mb-3">
                    <h5 class="section_tagline_product mb-0">Product & Event</h5>
                    <h2 class="section_title mt-2 mb-0">Video Gallery</h2>
                </div>
            </div>
            
            
            <div class="row px-3">
                <div class="blog-vdo col-12 col-lg-12">
                    <div class="owl-carousel owl-theme" id="owl-carousel1">

                        <div class="row mt-3 mb-5 item">
                            <div class="col-12 video-box">
                                <a data-fancybox href="http://www.youtube.com/watch?v=K2fhljO9V00&origin=*">
                                    <div class="play-button">
                                        <span class="triangle-right"></span>
                                    </div>
                                    <div class="video-box--image" style="background-image: url(https://img.youtube.com/vi/K2fhljO9V00/maxresdefault.jpg)"></div>
                                </a>
                            </div>
                        </div>

                        <div class="row mt-3 mb-5 item">
                            <div class="col-12 video-box">
                                <a data-fancybox href="http://www.youtube.com/watch?v=NeelGMxvelQ&origin=*">
                                    <div class="play-button">
                                        <span class="triangle-right"></span>
                                    </div>
                                    <div class="video-box--image" style="background-image: url(https://img.youtube.com/vi/NeelGMxvelQ/maxresdefault.jpg)"></div>
                                </a>
                            </div>
                        </div>

                        <div class="row mt-3 mb-5 item">
                            <div class="col-12 video-box">
                                <a data-fancybox href="http://www.youtube.com/watch?v=jO1WkUloMj0&origin=*">
                                    <div class="play-button">
                                        <span class="triangle-right"></span>
                                    </div>
                                    <div class="video-box--image" style="background-image: url(https://img.youtube.com/vi/jO1WkUloMj0/maxresdefault.jpg)"></div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="row mt-3 mb-5 item">
                            <div class="col-12 video-box">
                                <a data-fancybox href="http://www.youtube.com/watch?v=TUtWPF0-Xis&origin=*">
                                    <div class="play-button">
                                        <span class="triangle-right"></span>
                                    </div>
                                    <div class="video-box--image" style="background-image: url(https://img.youtube.com/vi/TUtWPF0-Xis/maxresdefault.jpg)"></div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="row mt-3 mb-5 item">
                            <div class="col-12 video-box">
                                <a data-fancybox href="http://www.youtube.com/watch?v=iH4Cox-So4g&origin=*">
                                    <div class="play-button">
                                        <span class="triangle-right"></span>
                                    </div>
                                    <div class="video-box--image" style="background-image: url(https://img.youtube.com/vi/iH4Cox-So4g/maxresdefault.jpg)"></div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            

            <div class="row mb-2">
                <div class="col-12 border-left-green ml-2 ml-md-3 mb-3">
                    <h5 class="section_tagline_product mb-0">Product & Event</h5>
                    <h2 class="section_title mt-2 mb-0">Photo Gallery</h2>
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
                                    <a href="<?php echo get_post_permalink($item->ID); ?>" id="gallery1">
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
