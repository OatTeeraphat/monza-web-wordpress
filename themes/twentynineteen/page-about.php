<?php
/**
* Template Name: ABOUT
*
*/

get_header();
?>

<?php 

$about_banner = get_field('about_banner');
$about_content = get_field('about_content');

//dd($about_content);


?>

<!-- Content -->

    <div class="abount_cover" style="background-image: url('<?php echo $about_banner['about_banner_bg']['sizes']['1536x1536']?>');"> 
        <div class="fade-box"></div>
        <div class="abount_cover_text" style="top: 70%; text-align: left;padding-left: 12%;">  
            <h4><?php echo $about_banner['about_banner_subtitle']?></h4>  
            <h2 class="section_title"><?php echo $about_banner['about_banner_title']?></h2>
            <hr>
        </div>
    </div>

    <?php $isOdd = true;?>

    <?php foreach ( $about_content as $item ) : ?>

        <?php if( $item['about_content_dimention'] == 'toggle' ) : ?>
            
            <?php if( $isOdd == true ) : $isOdd = false ?>

                <!-- left content -->
                <section class="home_quality m-0">   

                    <div class="container-fluid" style="background-color: #222221;">
                        <div class="container">
                            <div class="row">
                                <div class="section-abount col-11 col-lg-6 col-xl-5 text-md-left ml-3 pt-5 mb-5" style="z-index: 1;">
                                    <h3 class="col-12 col-md-6 col-lg-12 mt-0 mb-3 bold" style=" width: 500px; ">
                                        <?php echo $item['about_content_toggle']['about_content_header']; ?></h3>
                                    <p class="col-12 col-md-6 col-lg-12"><?php echo $item['about_content_toggle']['about_content_content']; ?></p>
                            
                                </div>
                                <div class="img-abount" style=" left: 50%;">
                                    <div class="faded-img"></div>
                                    <img src="<?php echo $item['about_content_toggle']['about_content_img']['sizes']['large']; ?>">
                                </div>         
                            </div> 
                        </div>
                    </div>

                </section>

            <?php else : $isOdd = true ?>

                <!-- right content -->
                <section class="home_quality m-0">   

                    <div class="container-fluid" style="background-color: #222221;">
                        <div class="container">
                            <div class="row">
                                <div class="img-abount2" style="  left: 0;">
                                    <div class="faded-img2"></div>
                                    <img src="<?php echo $item['about_content_toggle']['about_content_img']['sizes']['large']; ?>" >
                                </div>  
                                <div class="section-abount2 col-11 col-lg-6 col-xl-5 text-md-left ml-3 pt-5 mb-5" style="z-index: 1;left: 50%;">
                                    <h3 class="col-12 col-md-6 col-lg-12 mt-0 mb-3 bold" style=" width: 500px; ">
                                    <?php echo $item['about_content_toggle']['about_content_header']; ?></h3>
                                    <p class="col-12 col-md-6 col-lg-12"><?php echo $item['about_content_toggle']['about_content_content']; ?></p>
                                </div>
                            </div> 
                        </div>
                    </div>

                </section>

            <?php endif; //isOdd ?>

        <?php else : ?>

            <!-- center content -->
            <section class="m-0">

                <div class="product_cover" style="background-image: url('<?php echo $item['about_content_center']['about_center_img']['sizes']['1536x1536']; ?>');"> 
                    <div class="fade-box"></div>
                    <div class="product_cover_text ">    
                        <h2 class="product_cover_text_center section_title"><?php echo $item['about_content_center']['about_center_header']; ?></h2>
                        <h4><?php echo $item['about_content_center']['about_center_content']; ?></h4>
                    </div>
                </div>

            </section>

        <?php endif; ?>

    <?php endforeach; ?>

    <div class="remove-bottom"></div>

<?php
get_footer();
