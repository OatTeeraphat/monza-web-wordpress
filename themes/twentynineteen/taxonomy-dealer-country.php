<?php
/**
*
*/

get_header();


$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

$dealer_name = get_field('dealer_name_' . ICL_LANGUAGE_CODE , 'dealer-country_'. $term->term_id);
$dealer_isInter = get_field('dealer_isInter', 'dealer-country_'. $term->term_id);

if ($dealer_isInter) :
    $dealer_isInter = "International Official Dealer";
else :
    $dealer_isInter = "Thailand Official Dealer";
endif;


$query = new WP_Query( array(
    'post_type' => 'dealer',
    'tax_query' => array(
        array(
            'taxonomy' => 'dealer-country',
            'field' => 'term_id',
            'terms' => $term->term_id
        )
    )
));

//dd($query->posts);


?>

<!-- Content -->


    <div class="push-cover"></div>
    
    <section class="news_post">

        <article>
            <div class="container">

                <div class="row">
                    <div class="col mb-4">
                        <a href="<?php echo get_permalink_wpml("dealer", ICL_LANGUAGE_CODE); ?>">
                            <i data-feather="arrow-left" class="fe mr-1" style="width: 30px;"></i>
                            Dealer
                        </a>
                    </div>
                </div>
    
                <div class="row mt-4 mb-5 px-3 px-lg-4">
                    <div class="col-12">
                        <div class="col-12 border-left-green">
                            <h5 class="section_tagline_product" style="color: #fff;"><?php echo $dealer_isInter;?></h5>
                            <h2 class="section_title mt-2 mb-0"><?php echo $dealer_name; ?></h2>
                        </div>
                    </div>
                </div>
    
                <div class="row mt-4  px-4 px-lg-5">

                    <?php foreach($query->posts as $item) : ?>
                        <div class="col-12 col-md-6 mb-4 mb-md-5">
                            <a data-fancybox href="<?php echo get_field('dealer_link_location', $item->ID); ?>" data-options='{"iframe" : {"css" : {"width" : "75%", "height" : "75%"}}}' >
                                <div class="video-box">
                                    <div class="video-box--image" style="background-image: url(<?php echo get_field('dealer_img', $item->ID)['sizes']['large']; ?>)"></div>
                                </div>
                                <div class="my-3 mx-0">
                                    <h3 class="mb-2 strong"><?php echo get_field('dealer_name_branch', $item->ID); ?></h3>
                                    <p class="m-0 p-0"><?php echo get_field('dealer_location', $item->ID); ?></p>
                                    <a  data-fancybox href="<?php echo get_field('dealer_link_location', $item->ID); ?>" 
                                        class="btn btn-lg btn-outline-primary mt-3" 
                                        style=" background-color: #008040; border: 0;"
                                        data-options='{"iframe" : {"css" : {"width" : "75%", "height" : "75%"}}}'
                                    >
                                        <i data-feather="map-pin" class="fe mr-"></i>
                                        Google Maps
                                    </a>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>

                </div>
                
            </div>
        </article>
   
    </section>

    <script>
        $('.owl-carousel').owlCarousel({
            items   : 1,
            loop    : true,
            margin  : 10,
            dots    : true,
            autoplay            : true,
            autoplayTimeout     : 5000,
            autoplayHoverPause  : true
        })
    </script>

<?php
get_footer();
