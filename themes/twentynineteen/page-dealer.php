<?php
/**
* Template Name: DEALER
*
*/

get_header();

$gallery_cover = get_field('gallery_cover');

?>

<?php
$dealer_banner = get_field('dealer_banner');
$dealer_flag = get_field('dealer_flag');
$dealer_thai = get_field('dealer_thai');
$dealer_pdf = get_field('dealer_pdf');


//dd($dealer_name);


?>


<!--  
// array of term in tax
$terms = get_terms([
    'taxonomy' => 'dealer-country',
    'hide_empty' => false,
]);

dd($terms);

// object of acf 1 field
// $thumbnail = get_field('<name>', $term->taxonomy . '_' . $term->term_id);
// $term->taxonomy . '_' . $term->term_id = dealer-country_21
$dealer_name = get_field('dealer_name_' . ICL_LANGUAGE_CODE , 'dealer-country_21');
$dealer_isInter = get_field('dealer_isInter', 'dealer-country_21');

if ($dealer_isInter) :
    $dealer_flag = get_field('dealer_flag', 'dealer-country_21');
    <img src="<?php echo dealer_flag; ?>" >
endif;

dd($dealer_isInter); 
-->

<!-- Banner -->

    <div class="product_cover" style="background-image: url('<?php echo $dealer_banner['dealer_banner_bg']['sizes']['1536x1536']; ?>');">   
        <div class="fade-box"></div>
        <div class="product_cover_text">    
            <h2 class="section_title"><?php echo $dealer_banner['dealer_banner_title']; ?></h2>
            <h4><?php echo $dealer_banner['dealer_banner_subtitle']; ?></h4>
        </div>
    </div>
    
<!-- Content -->


    <section>
        <div class="container" style="overflow: visible">
            <div class="row mx-3">
                <div class="col-12 border-left-green">
                    <h5 class="section_tagline_product" style="color: #8D9199;"><?php echo $dealer_flag['dealer_flag_subtitle']; ?></h5>
                    <h2 class="section_title mt-2 mb-0"><?php echo $dealer_flag['dealer_flag_title']; ?></h2>
                </div>
                <div class="col-12">
                    <div class="container my-3 mt-md-5">
                        <div class="row justify-content-center" style=" justify-content: center; ">
                            <div class="col-12 col-md-11">
                                <div class="owl-carousel owl-theme owl-flag-dealer">
                                    <?php $terms = get_terms(['taxonomy' => 'dealer-country','hide_empty' => true]); ?>
                                    <?php foreach ($terms as $item) : ?>
                                        
                                        <?php $dealer_name = get_field('dealer_name' . ICL_LANGUAGE_CODE , $item->taxonomy . '_' . $item->term_id);?>
                                        <?php $dealer_isInter = get_field('dealer_isInter', $item->taxonomy . '_' . $item->term_id);?>
                                        
                                        <?php if ($dealer_isInter) : ?>

                                            <?php $dealer_flag = get_field('dealer_flag', $item->taxonomy . '_' . $item->term_id); ?>

                                            <div class="row my-3 item">
                                                <div class="col-12">
                                                    <img class="img-fluid" src="<?php echo $dealer_flag['sizes']['medium_large']; ?>" alt="">
                                                </div>
                                            </div>

                                        <?php endif; ?>

                                    <?php endforeach; ?>
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
                            <h5 class="section_tagline_product" style="color: #8D9199;"><?php echo $dealer_thai['dealer_flag_subtitle']; ?></h5>
                            <h2 class="section_title mt-2 mb-0"><?php echo $dealer_thai['dealer_thai_title']; ?></h2>
                        </div>
                        <div class="col-12 dropdown px-4 my-5 my-md-5">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $dealer_thai['dealer_thai_province']; ?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <?php $terms = get_terms(['taxonomy' => 'dealer-country','hide_empty' => true]); ?>
                                        <?php foreach ($terms as $item2) : ?>
                                            
                                            <?php $dealer_name = get_field('dealer_name_' . ICL_LANGUAGE_CODE , $item2->taxonomy . '_' . $item2->term_id);?>
                                            <?php $dealer_isInter = get_field('dealer_isInter', $item2->taxonomy . '_' . $item2->term_id);?>
                                            <?php if (empty($dealer_isInter)) : ?>
                                                
                                                <a class="dropdown-item" href="#"><?php echo $dealer_name; ?></a>

                                            <?php endif; ?>

                                        <?php endforeach; ?>
                           
                            </div>
                        </div>
                        <div class="col-12 col-md-11 px-4">
                            <h3><strong><?php echo $dealer_pdf['dealer_pdf_title']; ?></strong></h3>
                            <p><?php echo $dealer_pdf['dealer_pdf_text']; ?></p>
                            <button type="button" class="btn btn-lg btn-outline-primary col-12 col-md-4 mt-3" style=" background-color: #008040; border: 0;">
                            <?php echo $dealer_pdf['dealer_pdf_text']; ?>
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
