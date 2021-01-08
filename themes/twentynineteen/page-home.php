<?php
/**
* Template Name: HOME
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/

get_header();

$terms_brand = get_terms( array(
    'taxonomy' => 'brand',
    'hide_empty' => 0 
));

$brand_list = get_terms_by_parent($terms_brand, 0);
$home_search = get_field('home_search');
$home_quality = get_field('home_quality');
$home_product = get_field('home_product');
$home_gallery = get_field('home_gallery');
$home_blog = get_field('home_blog');

$product_query = new WP_Query(array( 
    'post_type' => 'product',
    'posts_per_page' => 8
));

$gallery_query = new WP_Query(array(
    'post_type' => 'gallery',
    'posts_per_page' => 6
));

$blog_query = new WP_Query(array(
     'post_type' => 'blog' 
));


?>


<!--Banner-->

    <div class="baner_youtube" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/youtube-home.png');">    
        <video autoplay loop muted playsinline autobuffer class="baner_youtube_video" poster="<?php echo get_template_directory_uri(); ?>/img/monza_youtube2.mp4">
            <source src="<?php echo get_template_directory_uri(); ?>/img/monza_youtube2.mp4" type="video/mp4">
        </video>
    </div>


<!--Search-->

    <section class="home_search">

        <div class="container" style="overflow: visible">

            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <h2 class="section_title mb-1"><?php echo $home_search['home_search_title']?></h2>
                    <div class="section_tagline"><?php echo $home_search['home_search_subtitle']?></div>
                    <hr>
                </div>
            </div>
            
            <div class="row mt-3 justify-content-center text-center">
                <div class="col-11 col-md-11 col-xl-12 text-center">
                    <div class="row">


                        <div class="dropdown col-12 col-md-4 col-xl-4 mb-2">
                            <button class="btn btn-secondary dropdown-toggle mb-2" type="button" id="dropdown-brand" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $home_search['home_search_selectbrand']?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdown-brand">
                                <?php foreach($brand_list as $item) : ?>
                                    <button class="dropdown-item" onclick="ajaxGetCarModel( <?php echo $item->term_id;?>, '<?php echo $item->name;?>' );">
                                        <?php echo strtoupper($item->name); ?>
                                    </button>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <script>
                            function ajaxGetCarModel(parentId, term){
                                $('#dropdown-brand').text(term.toUpperCase());
                                $('#dropdown-brand').data("product_brand", term)
                                baseUrl = "<?php echo get_permalink_wpml('product', ICL_LANGUAGE_CODE); ?>"
                                $.ajax({
                                    type: "GET",
                                    url: baseUrl + "?byParentId=" + parentId,
                                    dataType : 'JSON',
                                    success : function(response){
                                        dropdownItemElm = $("#product_model")
                                        dropdownItemElm.empty();
                                        $.each(response, function(i, order){
                                            fnAjax = "ajaxGetCarMake("+ response[i].term_id + ",'" + response[i].name + "')"
                                            dropdownItemElm.append('<button class="dropdown-item" onclick="'+ fnAjax +'">' + (response[i].name).toUpperCase() + '</button>');
                                        })
                                    }
                                });
                            }
                        </script>
                        <script>
                            $("#dropdown-brand").on("click", function(){
                                $('#dropdown-brand').text("<?php echo $home_search['home_search_selectbrand']?>");
                                $('#dropdown-model').text("<?php echo $home_search['home_search_selectmodel']?>");
                                $('#dropdown-make').text("<?php echo $home_search['home_search_selectmodel']?>");
                                $("#product_model").removeClass("show").empty();
                                $("#product_make").removeClass("show").empty();
                            })
                        </script>

                        <div class="dropdown col-12 col-md-4 col-xl-4 mb-2">
                            <button class="btn btn-secondary dropdown-toggle mb-2" id="dropdown-model" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $home_search['home_search_selectmodel']?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="product_model">
                            </div>
                        </div>

                        <script>
                            function ajaxGetCarMake(parentId, term){
                                $('#dropdown-model').text(term.toUpperCase());
                                brand = $('#dropdown-brand').text().toLowerCase();
                                baseUrl = "<?php echo get_permalink_wpml('product', ICL_LANGUAGE_CODE); ?>"
                                $.ajax({
                                    type: "GET",
                                    url: baseUrl + "?byParentId=" + parentId,
                                    dataType : 'JSON',
                                    success : function(response){
                                        dropdownItemElm = $("#product_make")
                                        dropdownItemElm.empty();
                                        $.each(response, function(i, order){
                                            url = baseUrl + '?search=' + brand +','+ term +',' + response[i].name
                                            name = "'" + response[i].name + "'"
                                            dropdownItemElm.append('<a class="dropdown-item" href="'+ url + '" onclick="goSearchProduct('+ name +')"> ' + (response[i].name).toUpperCase() + '</a>');
                                        })
                                    }
                                });
                            }
                        </script>

                        <script>
                            $("#dropdown-model").on("click", function(){
                                $('#dropdown-model').text("<?php echo $home_search['home_search_selectmodel']?>");
                                $('#dropdown-make').text("<?php echo $home_search['home_search_selectmodel']?>");
                                $("#product_make").removeClass("show").empty();
                            })
                        </script>

                        
                        <div class="dropdown col-12 col-md-4 col-xl-4 mb-2">
                            <button class="btn btn-secondary dropdown-toggle mb-2" type="button" id="dropdown-make" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $home_search['home_search_selectmodel']?>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="product_make">
                            </div>
                        </div>

                        <script>
                            function goSearchProduct(term){
                                $('#dropdown-make').text(term.toUpperCase());
                            }
                        </script>

                        <script>
                            $("#dropdown-make").on("click", function(){
                                $('#dropdown-make').text("<?php echo $home_search['home_search_selectmodel']?>");
                            })
                        </script>
                        
                    </div>
                </div>
            </div>

        </div>
    </section>


<!--QUALITY-->

    <section class="home_quality">   
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-11 col-lg-6 col-xl-5 text-md-left ml-3 pt-5 mb-5" style="z-index: 1;">
                        <h2 class="section_title"><?php echo $home_quality['home_quality_title']?></h2>
                        
                        <hr class="mt-4" style=" margin: 1px;">
                        <h4 class="mt-4 mb-3"><?php echo $home_quality['home_quality_subtitle']?></h4>
                        <p>
                            <?php echo $home_quality['home_quality_descrip']?>
                        </p>
                    </div>
                    <div class="img-quality" >
                        <div class="faded-left-right" ></div>
                        <img src="<?php echo $home_quality['home_quality_img']['sizes']['medium_large']; ?>">
                    </div>         
                </div> 
            </div>
             
        </div>
    </section>

<!--PRODUCT-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-3">
                    <h2 class="section_title mb-1"><?php echo $home_product['home_product_title']?></h2>
                    <div class="section_tagline"><?php echo $home_product['home_product_subtitle']?></div>
                    <hr class="mb-3">
                </div>
            </div>
            <div class="row product-box mt-3 mb-2 mb-md-5 px-3 justify-content-center">
                <?php foreach ($product_query->posts as $item) : ?>
                <?php 
                    $post_tax = $item->post_name; 
                    $post_tax = explode("-", $post_tax);
                    $post_tax = $post_tax[0] . " " . $post_tax[1];
                ?>
                <div class="col-6 col-md-4 col-lg-3 mb-3 px-2 px-md-3 product-box-item">
                    <a href="<?php echo get_permalink_wpml('product/' . $item->post_name, ICL_LANGUAGE_CODE); ?>">
                    <div class="card mb-3">
                        <div class="card-thumbnail">
                            <img src="<?php echo get_field( 'product_thumbnail', $item->ID )['sizes']['medium']; ?>" class="card-img-top" alt="...">
                            <span class="badge badge-primary">NEW</span>
                        </div>
                        <div class="card-body">
                            <h4><?php echo $item->post_title; ?></h4>
                            <p class="ection_tagline" style="padding: 0;"><?php echo strtoupper($post_tax); ?></p>
                            <p class="strong"><?php echo get_field( 'product_price', $item->ID ); ?> THB</p>
                        </div>
                    </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>  
            <div class="row justify-content-md-center mt-2 mb-5 px-4 px-4">
                <button type="button" onclick="javascript:window.open('<?php echo get_permalink_wpml('product', ICL_LANGUAGE_CODE); ?>', '_blank');" class="btn btn-lg btn-outline-primary col-12 col-md-6 col-lg-4"><?php echo $home_product['home_product_button']?></button>
            </div>    
        </div>
       
    </section>

 <!--GALLERY-->

    <section class="home_gallery">

        <div class="container">

    
            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section_title mb-1"><?php echo $home_gallery['home_gallery_title']?></h2>
                    <div class="section_tagline"><?php echo $home_gallery['home_gallery_subtitle']?></div>
                    <hr class="mb-4">
                </div>
            </div>
            
            <div class="pb-2 pb-md-5">
                <div class="container text-center px-2 px-md-0">
                    <!-- Masonry grid -->
                    <div class="gallery-wrapper mansonry">
                        <!-- Grid sizer -->
                        <div class="grid-sizer col-lg-4 col-md-6"></div>
                        
                        <!-- Grid item -->
                        <div class="col-lg-4 col-md-6 grid-item">
                            <a data-fancybox="images" href="<?php echo get_template_directory_uri(); ?>/img/gallery_copy/Monza edit1-11.jpg">
                                <img class="img-fluid img-thumbnail shadow-sm rounded-0" src="<?php echo get_template_directory_uri(); ?>/img/gallery_copy/Monza edit1-11.jpg" alt="">
                            </a>
                        </div>
                        
                        <!-- Grid item -->
                        <div class="col-lg-4 col-md-6 grid-item">
                            <a data-fancybox="images" href="<?php echo get_template_directory_uri(); ?>/img/gallery_copy/ga2.jpg">
                                <img class="img-fluid img-thumbnail shadow-sm rounded-0" src="<?php echo get_template_directory_uri(); ?>/img/gallery_copy/ga2.jpg" alt="">
                            </a>
                        </div>
                        
                        <!-- Grid item -->
                        <div class="col-lg-4 col-md-6 grid-item">
                            <a data-fancybox="images" href="<?php echo get_template_directory_uri(); ?>/img/gallery_copy/90148786_1100812883618507_8277114183753924608_o.jpg">
                                <img class="img-fluid img-thumbnail shadow-sm rounded-0" src="<?php echo get_template_directory_uri(); ?>/img/gallery_copy/90148786_1100812883618507_8277114183753924608_o.jpg" alt="">
                            </a>
                        </div>
                        
                        <!-- Grid item -->
                        <div class="col-lg-4 col-md-6 grid-item">
                            <a data-fancybox="images" href="<?php echo get_template_directory_uri(); ?>/img/gallery_copy/93581054_1122976304735498_7069285215939592192_o.jpg">
                                <img class="img-fluid img-thumbnail shadow-sm rounded-0" src="<?php echo get_template_directory_uri(); ?>/img/gallery_copy/93581054_1122976304735498_7069285215939592192_o.jpg" alt="">
                            </a>
                        </div>
                        
                        <!-- Grid item -->
                        <div class="col-lg-4 col-md-6 grid-item">
                            <a data-fancybox="images" href="<?php echo get_template_directory_uri(); ?>/img/gallery_copy/94144124_1128734297493032_401308099027140608_o.jpg">
                                <img class="img-fluid img-thumbnail shadow-sm rounded-0" src="<?php echo get_template_directory_uri(); ?>/img/gallery_copy/94144124_1128734297493032_401308099027140608_o.jpg" alt="">
                            </a>
                        </div>
                        
                        <!-- Grid item -->
                        <div class="col-lg-4 col-md-6 grid-item">
                            <a data-fancybox="images" href="<?php echo get_template_directory_uri(); ?>/img/gallery_copy/97852868_1151539381879190_6743407016191983616_n.jpg">
                                <img class="img-fluid img-thumbnail shadow-sm rounded-0" src="<?php echo get_template_directory_uri(); ?>/img/gallery_copy/97852868_1151539381879190_6743407016191983616_n.jpg" alt="">
                            </a>
                        </div>

                        <!-- <?php foreach($gallery_query->posts as $item) :?>
                        <div class="col-lg-4 col-md-6 grid-item">
                            <?php $gallery_cover = get_field('gallery_cover', $item->ID ); //dd($gallery_cover); ?>
                            <a data-fancybox="images" href="<?php echo $gallery_cover['sizes']['post-thumbnail']; ?>">
                                <img class="img-fluid img-thumbnail shadow-sm rounded-0" src="<?php echo $gallery_cover['sizes']['medium']; ?>" alt="">
                            </a>
                        </div>
                        <?php endforeach; ?> -->

                    </div>
                </div>
            </div>

            <div class="row justify-content-md-center mt-4 mb-5 px-4">
                <button type="button" onclick="javascript:window.open('<?php echo get_permalink_wpml('gallery', ICL_LANGUAGE_CODE); ?>', '_blank');" class="btn btn-lg btn-outline-primary col-12 col-md-6 col-lg-4"><?php echo $home_gallery['home_gallery_button']?></button>
            </div>

        
            </div>
        </div>

    </section>   

    
<!--BLOG-->

    <section class="home_blog">

        <div class="container px-4 px-md-0">

            <div class="row">
                <div class="col-12 text-center">
                    <h2 class="section_title mb-1"><?php echo $home_blog['home_blog_title']?></h2>
                    <div class="section_tagline"><?php echo $home_blog['home_blog_subtitle']?></div>
                    <hr class="mb-4">
                </div>
            </div>

            <div class="row">
                <div class="blog-vdo col-12 col-lg-6">
                    <div class="owl-carousel owl-theme">
                        <?php if ( $blog_query->have_posts() ) : ?>
                            
                            <?php foreach ($blog_query->posts as $item) : ?>
                            <?php $postblog_title = get_field('postblog_title', $item->ID ); ?> 
                                <div class="row my-3 item">        
                                        <div class="col-12">
                                            <a href="<?php echo get_post_permalink($item->ID); ?>">
                                                <div class="video-box">
                                                    <div class="video-box--image" style="background-image: url(<?php echo $postblog_title['postblog_title_imgblog']['sizes']['medium_large']; ?>)"></div>
                                                </div>
                                                <div class="my-3 mx-0 mx-md-2">
                                                    <h3 class="mb-2"><?php echo $item->post_title;?></h3>
                                                    <p class="m-0 p-0">
                                                    <?php 
                                                        echo substr(strip_tags($postblog_title['postblog_title_blog']), 0, 200);
                                                    ?>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                </div>         
                            <?php endforeach; ?>
                            
                        <?php endif; ?>

                    </div>
                        
                    
                </div>
                <div class="col-12 col-lg-6">
                    <?php if ( $blog_query->have_posts() ) : ?>
                    <?php $hilight3blog = array_slice($blog_query->posts, 0, 3);?>
                    <?php foreach ($hilight3blog as $item) : ?>
                        <a href="<?php echo get_post_permalink($item->ID); ?>">
                            <div class="row " style="justify-content: center;">

                            <?php $postblog_title = get_field('postblog_title', $item->ID ); ?>  

                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="home-blog-img my-3" style="background-image: url('<?php echo $postblog_title['postblog_title_imgblog']['sizes']['medium_large']; ?>');">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-8 mt-0 mt-md-2 mb-4 pl-3 pl-md-0">
                                    <h4 class="my-2"><?php echo $item->post_title;?></h4>
                                    <p class="mb-md-2 p-0">
                                        <?php echo substr(strip_tags($postblog_title['postblog_title_blog']), 0, 150);?>
                                    </p>
                                </div>
                            </div>

                        </a>   
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>  
            </div>

            <div class="row justify-content-md-center mt-4 pt-4 mb-5 px-4">
                <button type="button" onclick="javascript:window.open('<?php echo get_permalink_wpml('blog', ICL_LANGUAGE_CODE); ?>', '_blank');" class="btn btn-lg btn-outline-primary col-12 col-md-6 col-lg-4"><?php echo $home_blog['home_blog_button']?></button>
            </div>
            
        </div>

    </section>

<!--SCRIPT -->
    <script>

        $("#dropdownMenu1 button").click(function(){
            //console.log($(this).text())
            $("#dropdownMenuButton1").html($(this).text()+' <span class="caret"></span>');
        });
        $("#dropdownMenu2 button").click(function(){
            //console.log($(this).text())
            $("#dropdownMenuButton2").html($(this).text()+' <span class="caret"></span>');
        });
        $("#dropdownMenu3 button").click(function(){
            //console.log($(this).text())
            $("#dropdownMenuButton3").html($(this).text()+' <span class="caret"></span>');
        });

    </script>   

    <script>

        $(function () {

            // Initate masonry grid
            var $grid = $('.gallery-wrapper').masonry({
                temSelector: '.grid-item',
                columnWidth: '.grid-sizer',
                percentPosition: true,
            });

            // Initate imagesLoaded
            $grid.imagesLoaded().progress( function() {
                $grid.masonry('layout');
            });

        });

    </script>

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
