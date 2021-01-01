<?php
/**
* Template Name: PRODUCT
*
*/

get_header();
?>

<?php 

$contact_banner = get_field('contact_banner');
$contact_map = get_field('contact_map');
$contact_form = get_field('contact_form');


$query = new WP_Query( array( 'post_type' => 'product' ) );

//dd($query->posts);


?>

<!-- Banner -->

    <div class="product_cover" style="background-image: url('<?php echo $contact_banner['contact_banner_bg']['sizes']['1536x1536']?>');"> 
        <div class="fade-box"></div>
        <div class="product_cover_text">    
            <h2 class="section_title">HELP</h2>
            <h4><?php echo $contact_banner['contact_banner_subtitle']?></h4>
        </div>
    </div>
    
<!-- Content -->

    <section>
        <div class="container" style="overflow: visible">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-group mb-3 input-search">
                                <div class="input-group-prepend"></div>
                                <input type="text" class="form-control input-search" placeholder="SEARCH" aria-label="Username" aria-describedby="basic-addon1"style="background-color: #1b1b1a;">
                                <i data-feather="search" class="fe"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                SELECT MODEL
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                SELECT MAKE
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                SELECT YEAR
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="row">
                        <div class="col-12">
                                <div class="row px-3">
                                    <div class="col-12 col-lg-8  border-left-green">
                                        <h2 class="section_title mt-2 mb-0">ISUZU &gt; DMAX 2020</h2>
                                        <h5 class="section_tagline_product">19 Product</h5>
                                    </div>
                                    <div class="col-12 col-lg-4">
                                        <div class="dropdown" style="text-align: right;">
                                            <button class="btn btn-third dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=" width: inherit;">
                                            SELECT MODEL
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                           
                            <div class="row product-box mt-4 mb-2 mb-md-5 px-3">
                            <?php if ( $query->have_posts() ) : ?>

                                <?php foreach ($query->posts as $item) : ?>
                                <?php 
                                    $post_tax = $item->post_name; 
                                    $post_tax = explode("-", $post_tax);
                                    $post_tax = $post_tax[0] . " " . $post_tax[1];
                                ?>
                                    
                                <div class="col-6 col-md-4 col-lg-4 mb-3 px-2 px-md-3">
                                   <a href="<?php echo get_permalink_wpml('product/' . $item->post_name, ICL_LANGUAGE_CODE); ?>">
                                   <div class="card mb-3">
                                        <div class="card-thumbnail">
                                            <img src="<?php echo get_field( 'product_thumbnail', $item->ID )['sizes']['medium']; ?>" class="card-img-top" alt="...">
                                            <span class="badge badge-primary">NEW</span>
                                        </div>
                                        <div class="card-body">
                                            <h4><?php echo $item->post_title; ?></h4>
                                            <p class="ection_tagline" style="padding: 0;"><?php echo strtoupper($post_tax); ?></p>
                                            <p><?php echo get_field( 'product_price', $item->ID ); ?>BATH</p>
                                        </div>
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
            </div>
        </div>
    </section>

<?php
get_footer();
