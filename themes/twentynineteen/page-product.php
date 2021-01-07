<?php

/**
* Template Name: PRODUCT
*
*/

$terms_brand = get_terms( array(
    'taxonomy' => 'brand',
    'hide_empty' => 0 
));

$brand_list = get_terms_by_parent($terms_brand, 0);

if (isset($_GET["byParentId"])) {

    $byParentId = htmlspecialchars($_GET["byParentId"]);
    $term_list = get_terms_by_parent($terms_brand, intval($byParentId));
    json_response($term_list);

}

get_header();
?>

<?php 

$contact_banner = get_field('contact_banner');
$contact_map = get_field('contact_map');
$contact_form = get_field('contact_form');

$query = array('post_type' => 'product');
$product_banner = get_field('product_banner');
$product_search = get_field('product_search');

if (!empty($_GET["search"])) {

    $search = htmlspecialchars($_GET["search"]);
    $brand  = explode( ",", $search );

    $query  = array(
        'tax_query' => array(
            array(
                'taxonomy' => 'brand',
                'field' => 'name',
                'terms' => $brand[0],
            ),
            array(
                'taxonomy' => 'brand',
                'field' => 'name',
                'terms' => $brand[1],
            )
        )
    );

} else {
    $query = array( 'post_type' => 'product' );
}

$query = new WP_Query( $query );
//dd($query->posts);

?>

<!-- Banner -->

    <div class="product_cover" style="background-image: url('<?php echo $product_banner['product_banner_bg']['sizes']['1536x1536']?>');"> 
        <div class="fade-box"></div>
        <div class="abount_cover_text" style="top: 70%; text-align: left;padding-left: 12%;">  
            <h4><?php echo $product_banner['product_banner_subtitle']?></h4>  
            <h2 class="section_title"><?php echo $product_banner['product_banner_title']?></h2>
            <hr>
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
                                <input type="text" class="form-control input-search" placeholder="<?php echo $product_search['product_search_search']?>" aria-label="Username" aria-describedby="basic-addon1"style="background-color: #1b1b1a;">
                                <i data-feather="search" class="fe"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown-brand" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $product_search['product_search_brand']?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-brand">
                                    <?php foreach($brand_list as $item) : ?>
                                        <button class="dropdown-item" onclick="ajaxGetCarModel( <?php echo $item->term_id;?>, '<?php echo $item->name;?>' );">
                                            <?php echo strtoupper($item->name); ?>
                                        </button>
                                    <?php endforeach; ?>
                                </div>
                            </div>
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
                            $('#dropdown-brand').text("<?php echo $product_search['product_search_brand']?>");
                            $('#dropdown-model').text("<?php echo $product_search['product_search_model']?> ");
                            $('#dropdown-make').text("<?php echo $product_search['product_search_make']?>");
                            $("#product_model").removeClass("show").empty();
                            $("#product_make").removeClass("show").empty();
                        })
                    </script>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown-model" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $product_search['product_search_model']?> 
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-model" id="product_model">
                                </div>
                            </div>
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
                            $('#dropdown-model').text("<?php echo $product_search['product_search_model']?> ");
                            $('#dropdown-make').text("<?php echo $product_search['product_search_make']?>");
                            $("#product_make").removeClass("show").empty();
                        })
                    </script>

                    <div class="row mb-3">
                        <div class="col-12">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown-make" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $product_search['product_search_make']?>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdown-make" id="product_make">
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        function goSearchProduct(term){
                            $('#dropdown-make').text(term.toUpperCase());
                        }
                    </script>

                    <script>
                        $("#dropdown-make").on("click", function(){
                            $('#dropdown-make').text("<?php echo $product_search['product_search_make']?>");
                        })
                    </script>

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
                                                <?php echo $product_search['product_search_sortby']?>
                                            </button>
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
                                            <p class="section_tagline" style="padding: 0;"><?php echo strtoupper($post_tax); ?></p>
                                            <p><?php echo get_field( 'product_price', $item->ID ); ?>THB</p>
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
