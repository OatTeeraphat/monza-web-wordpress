<?php
/**
 * The template for displaying archive pages
 *
*/

get_header();

$query = new WP_Query( array( 'post_type' => 'blog' ) );
//dd($query->posts);
//dd(get_post_type_archive_link());
dd($query)
?>


<!--Banner-->

<div class="product_cover" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/product-main/cover_product.png');">  
        <div class="fade-box"></div>
        <div class="product_cover_text">    
            <h2 class="section_title">BLOG & EVENT</h2>
            <h4>MONZA CARBON FIBRE PERFORMANCE</h4>
        </div>
    </div>


<?php
get_footer();
