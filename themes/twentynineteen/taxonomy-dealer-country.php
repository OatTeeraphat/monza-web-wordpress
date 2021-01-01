<?php
/**
*
*/

get_header();


$term = get_term_by( 'slug', 'กรุงเทพมหานคร', 'dealer-country' );
//dd($term);

$query = new WP_Query( array(
    'post_type' => 'dealer',
    'tax_query' => array(
        array(
        'taxonomy' => 'dealer-country',
        'field' => 'term_id',
        'terms' => $term->term_id
        )
)));

//dd($query->posts); 


?>

<!-- Content -->


    <div class="push-cover"></div>
    
    <section class="news_post">

        <article>
            <div class="container">

                <div class="row">
                    <div class="col mb-4">
                        <a href="./dealer.html">
                            <i data-feather="arrow-left" class="fe mr-1" style="width: 30px;"></i>
                            Dealer
                        </a>
                    </div>
                </div>
    
                <div class="row mt-4 mb-5 px-3 px-lg-4">
                    <div class="col-12">
                        <div class="col-12 border-left-green">
                            <h5 class="section_tagline_product" style="color: #fff;">Thailand Official Dealer</h5>
                            <h2 class="section_title mt-2 mb-0">Chanthaburi</h2>
                        </div>
                    </div>
                </div>
    
                <div class="row mt-4  px-4 px-lg-5">
                    <div class="col-12 col-md-6 mb-4 mb-md-5">
                        <a href="#">
                            <div class="video-box">
                                <div class="video-box--image" style="background-image: url(./img/dealer/image27.png)"></div>
                            </div>
                            <div class="my-3 mx-0">
                                <h3 class="mb-2 strong">BKY Shop (Branch 1)</h3>
                                <p class="m-0 p-0">Makham District, Chanthaburi, Thailand</p>
                                <button type="button" class="btn btn-lg btn-outline-primary mt-3" style=" background-color: #008040; border: 0;">
                                    <i data-feather="map-pin" class="fe mr-"></i>
                                    Google Maps
                                </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-md-5">
                        <a href="#">
                            <div class="video-box">
                                <div class="video-box--image" style="background-image: url(./img/dealer/image27.png)"></div>
                            </div>
                            <div class="my-3 mx-0">
                                <h3 class="mb-2 strong">BKY Shop (Branch 1)</h3>
                                <p class="m-0 p-0">Makham District, Chanthaburi, Thailand</p>
                                <button type="button" class="btn btn-lg btn-outline-primary mt-3" style=" background-color: #008040; border: 0;">
                                    <i data-feather="map-pin" class="fe mr-1"></i>
                                    Google Maps
                                </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-md-5">
                        <a href="#">
                            <div class="video-box">
                                <div class="video-box--image" style="background-image: url(./img/dealer/image27.png)"></div>
                            </div>
                            <div class="my-3 mx-0">
                                <h3 class="mb-2 strong">BKY Shop (Branch 1)</h3>
                                <p class="m-0 p-0">Makham District, Chanthaburi, Thailand</p>
                                <button type="button" class="btn btn-lg btn-outline-primary mt-3" style=" background-color: #008040; border: 0;">
                                    <i data-feather="map-pin" class="fe mr-1"></i>
                                    Google Maps
                                </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-md-5">
                        <a href="#">
                            <div class="video-box">
                                <div class="video-box--image" style="background-image: url(./img/dealer/image27.png)"></div>
                            </div>
                            <div class="my-3 mx-0">
                                <h3 class="mb-2 strong">BKY Shop (Branch 1)</h3>
                                <p class="m-0 p-0">Makham District, Chanthaburi, Thailand</p>
                                <button type="button" class="btn btn-lg btn-outline-primary mt-3" style=" background-color: #008040; border: 0;">
                                    <i data-feather="map-pin" class="fe mr-1"></i>
                                    Google Maps
                                </button>
                            </div>
                        </a>
                    </div>
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
