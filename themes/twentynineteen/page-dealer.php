<?php
/**
* Template Name: DEALER
*
*/

get_header();

$term = get_term_by( 'slug', 'กรุงเทพมหานคร', 'dealer-country' );
$term = get_term_link($term->slug, 'dealer-country');
dd($term);

?>

<!-- Banner -->

    <div class="product_cover" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/product-main/cover_product.png');"> 
        <div class="fade-box"></div>
        <div class="product_cover_text">    
            <h2 class="section_title">DEALER</h2>
            <h4>OFFICIAL DEARLER INFO & POLICY</h4>
        </div>
    </div>
    
<!-- Content -->


    <section>
        <div class="container" style="overflow: visible">
            <div class="row mx-3">
                <div class="col-12 border-left-green">
                    <h5 class="section_tagline_product" style="color: #8D9199;">Find a dealer near by you.</h5>
                    <h2 class="section_title mt-2 mb-0">INTERNAIONAL <br>DEALER</h2>
                </div>
                <div class="col-12">
                    <div class="container my-3 mt-md-5">
                        <div class="row justify-content-center" style=" justify-content: center; ">
                            <div class="col-12 col-md-11">
                                <div class="owl-carousel owl-theme owl-flag-dealer">
                                    <div class="row my-3 item">
                                        <div class="col-12">
                                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/dealer/Ellipse10.png" alt="">

                                        </div>
                                    </div>
                                    <div class="row my-3 item">
                                        <div class="col-12">
                                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/dealer/Ellipse12.png" alt="">
                                        </div>
                                    </div>
                                    <div class="row my-3 item">
                                        <div class="col-12">
                                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/dealer/Ellipse10.png" alt="">

                                        </div>
                                    </div>
                                    <div class="row my-3 item">
                                        <div class="col-12">
                                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/dealer/Ellipse12.png" alt="">
                                        </div>
                                    </div>
                                    <div class="row my-3 item">
                                        <div class="col-12">
                                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/dealer/Ellipse10.png" alt="">

                                        </div>
                                    </div>
                                    <div class="row my-3 item">
                                        <div class="col-12">
                                            <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/dealer/Ellipse12.png" alt="">
                                        </div>
                                    </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section>
        <div class="container" style="overflow: visible">
            <div class="row mx-3">
                <div class="col-12">
                    
                    <div class="row mb-5">

                        <div class="col-12 border-left-green">
                            <h5 class="section_tagline_product" style="color: #8D9199;">Find a dealer near by you.</h5>
                            <h2 class="section_title mt-2 mb-0">THAILAND<br>DEALER</h2>
                        </div>
                        <div class="col-12 dropdown px-4 my-5 my-md-5">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            SELECT PROVINCE
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                        <div class="col-12 col-md-11 px-4">
                            <h3><strong>Become a Monza Carbon Dealer</strong></h3>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta distinctio consequatur qui saepe sint vero exercitationem repellat, ipsa omnis ullam nesciunt reiciendis iste impedit praesentium inventore necessitatibus tempora. Esse, iste?</p>
                            <button type="button" class="btn btn-lg btn-outline-primary col-12 col-md-4 mt-3" style=" background-color: #008040; border: 0;">
                                SEE MORE
                            </button>
                        </div>

                    </div>

                </div>
                
            </div>
        </div>
    </section>

    <script>
        $('.owl-carousel').owlCarousel({
            loop:true,
            responsive:{
                0:{
                    items:2,
                    nav:false,
                    margin:30,
                },
                425:{
                    items:2,
                    nav:false,
                    margin:30,
                },
                575:{
                    items:3,
                    nav:true,
                    margin:45
                },
                1199:{
                    items:4,
                    nav:true,
                    margin:45
                }
            }
        })
    </script>

<?php
get_footer();
