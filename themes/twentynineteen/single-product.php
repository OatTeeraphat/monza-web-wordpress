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
$terms_brand = wp_get_post_terms( $post->ID, 'brand', array( 'order' => 'DESC') );
$terms_make = wp_get_post_terms( $post->ID, 'make', array( 'order' => 'DESC') );

//dd($terms_brand);

$more_item = new WP_Query( array(
    'post_type' => 'product',
    //'post__not_in' => array(get_the_ID()),
    'tax_query' => array(
        array(
            'taxonomy' => 'brand',
            'field' => 'name',
            'terms' => array( $terms_brand[0]->name, $terms_brand[1]->name )
        )
    )
));
//wp_reset_query();
//dd($terms_brand);

?>

<!--Banner-->

    <div class="my-5 py-3"></div>

    <div class="bg-article" style="background-image: url('<?php echo get_field('product_cover')['sizes']['2048x2048']; ?>');">
        <div class="fade-bg-article"></div>
    </div>


<!-- Content -->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">
                    <div class="row px-3">
                        <div class="col-12 col-lg-8  border-left-green">
                                <h5 class="section_tagline_product mt-2 mb-0">
                                    <?php echo strtoupper ($terms_brand[0]->name) . ' &gt; ' . strtoupper ($terms_brand[1]->name); ?>
                                </h5>
                                <h2 class="section_title mt-2"><?php the_title(); ?></h2>
                        </div>
                        <div class="col-12 col-lg-4" style="text-align: right;">
                            <h4 class="section_tagline_product"><?php echo get_field('product_price'); ?> THB</h4>    
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-7 mb-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                                        <!-- slides -->
                                        
                                        <div class="carousel-inner">
                                            <div class="carousel-item bg-white active"> <img src="<?php echo get_field("product_thumbnail")['sizes']['large'];?>" alt="<?php echo get_field("product_thumbnail")['title']; ?>"> </div>
                                            <?php
                                                $gallery = get_field('product_gallery');
                                            ?>
                                            <?php foreach($gallery as $item) :?>
                                                <div class="carousel-item"> <img src="<?php echo $item['sizes']['large']; ?>" alt="<?php echo $item['title']; ?>"></div>
                                            <?php endforeach;?>

                                        </div> <!-- Left right --> <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a> <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> <!-- Thumbnails -->
                                        <ol class="carousel-indicators list-inline">
                                            <li class="list-inline-item active"> <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#custCarousel"> <img src="<?php echo get_field("product_thumbnail")['sizes']['medium'];?>" class="img-fluid"> </a> </li>
                                            <?php foreach($gallery as $key => $item) :?>
                                                <li class="list-inline-item"> <a id="carousel-selector-<?php echo $key + 1; ?>" data-slide-to="<?php echo $key + 1; ?>" data-target="#custCarousel"> <img src="<?php echo $item['sizes']['medium']; ?>" class="img-fluid"> </a> </li>
                                            <?php endforeach;?>
                                        </ol>

                                    </div>
                                </div>
                            </div>
                        </div>     
                        <div class="col-12 col-lg-5">
                            <div class="jumbotron jumbotron-fluid" style="padding: 10px; background-color: #0e0e0e; margin-bottom: 0">
                                <div class="container" style=" display: flex;align-items: center; ">
                                    <strong style="font-size: 20px; padding: 10px; width: 100px;" >Brand</strong> <?php echo strtoupper ($terms_brand[0]->name); // brand ?>
                                </div>
                            </div>
                            <div class="jumbotron jumbotron-fluid" style="padding: 10px; background-color: #141513;margin-bottom: 0">
                                <div class="container" style=" display: flex;align-items: center;">
                                <strong style="font-size: 20px; padding: 10px; width: 100px;" >Model</strong>
                                <?php foreach($terms_brand as $key => $item) :?>
                                    <?php if (!in_array($key, [0,1])) : ?>
                                       <span class="mr-1"><?php echo strtoupper ($item->name); // brand ?> </span>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="jumbotron jumbotron-fluid" style="padding: 10px; background-color: #0e0e0e ;margin-bottom: 0">
                                <div class="container" style=" display: flex;align-items: center;">
                                    <strong style="font-size: 20px; padding: 10px; width: 100px;" >Years</strong>
                                    <?php foreach($terms_make as $key => $item) :?>
                                        <span class="mr-1"><?php echo strtoupper ($item->name); // brand ?> </span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class=" mt-4">
                                <?php echo get_field('product_desc'); ?>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </section>

    <?php
        $product_fitment = get_field('product_fitment');
    ?>

    <section>
        <div class="container">
            <div class="row">
                    <div class="col-12">
                        <div class="col-8 border-left-green">
                            <h3 class="section_tagline_product ">Fitment specification</h3>
                        </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="jumbotron jumbotron-fluid" style="padding: 10px; background-color: #0e0e0e; margin-bottom: 0">
                            <div class="container"style=" display: flex;align-items: center;">
                                <strong class="product-post-box-size-top" style="font-size: 20px; padding: 10px;width: 200px;" >Box size</strong> 
                                <p class="product-post-box-size">
                                    <?php echo $product_fitment['product_fitment_1']; ?>
                                </p>
                            </div>
                        </div>
                        <div class="jumbotron jumbotron-fluid" style="padding: 10px; background-color: #141513;margin-bottom: 0">
                            <div class="container"style=" display: flex;align-items: center;">
                                <strong class="product-post-body-top" style="font-size: 20px; padding: 10px;width: 200px;" >Carbon Spec</strong> 
                                <p class="product-post-body">
                                    <?php echo $product_fitment['product_fitment_2']; ?>
                                </p>

                            </div>
                        </div>
                        <div class="jumbotron jumbotron-fluid" style="padding: 10px; background-color: #0e0e0e ;margin-bottom: 0">
                            <div class="container"style=" display: flex;align-items: center;">
                                <strong class="product-post-Carbon-Spac-top" style="font-size: 20px; padding: 10px;width: 200px;" >Description </strong> 
                                <p class="product-post-Carbon-Spac">
                                    <?php echo $product_fitment['product_fitment_3']; ?>
                                </p>

                            </div>
                        </div>
                        
                        <?php
                            // More Specification
                            $mores = $product_fitment['product_fitment_more'];
                            $isOdd = true
                        ?>

                        <?php foreach($mores as $key => $item) : $isOdd = !$isOdd; ?>

                        <div class="jumbotron jumbotron-fluid" style="padding: 10px; background-color: <?php echo $isOdd ? "#0e0e0e" : "#141513" ; ?>;margin-bottom: 0">
                            <div class="container"style=" display: flex;align-items: center;">
                                <strong class="product-post-Warning-top" style="font-size: 20px; padding: 10px;width: 200px;" ><?php echo $item['topic'];?></strong>  
                                <p class="product-post-Warning">
                                <?php echo $item['desc'];?>
                                </p>

                            </div>
                        </div>

                        <?php endforeach; ?>
                    </div>
                   
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="col-8 border-left-green">
                        <h3 class="section_tagline_product ">Related Product</h3>
                    </div>
                </div>
            </div>
            <div class="row product-box mt-4 mb-2 mb-md-5 px-3">
                
                <?php foreach ($more_item->posts as $item) : ?>
                <?php 
                    $post_tax = $item->post_name; 
                    $post_tax = explode("-", $post_tax);
                    $post_tax = $post_tax[0] . " " . $post_tax[1];
                ?>
                <div class="col-6 col-md-4 col-lg-3 mb-3 px-2 px-md-3">
                    <a href="<?php echo $item->guid; ?>">
                        <div class="card mb-3">
                            <div class="card-thumbnail">
                                <img src="<?php echo get_field('product_thumbnail', $item->ID )['sizes']['medium'];?>" class="card-img-top" alt="...">
                                <span class="badge badge-primary">NEW</span>
                            </div>
                            <div class="card-body">
                                <h4><?php echo $item->post_title; ?></h4>
                                <p class="ection_tagline" style="padding: 0;"><?php echo strtoupper($post_tax); ?></p>
                            </div>
                        </div>
                    </a>
                </div>

                <?php endforeach; ?>
                
            </div>
        </div>
    </section>

<?php
get_footer();
