<?php
/**
 * The template for displaying archive pages
 *
*/

get_header();

$query = new WP_Query( array( 'post_type' => 'blog' ) );
//dd($query->posts);
//dd(get_post_type_archive_link());
//dd($thumbnail)
$blog_banner = get_field('blog_banner');
$blogeven_title = get_field('blogeven_title');

?>




<!--Banner-->

<div class="abount_cover" style="background-image: url('<?php echo $blog_banner['blog_banner_bg']['sizes']['1536x1536']?>');"> 
        <div class="fade-box"></div>
        <div class="abount_cover_text" style="top: 70%; text-align: left;padding-left: 12%;">  
            <h4><?php echo $blog_banner['blog_banner_subtitle']?></h4>  
            <h2 class="section_title"><?php echo $blog_banner['blog_banner_title']?></h2>
            <hr>
            
        </div>
</div>



<!--Content -->

    <section class="home_blog">

        <div class="container px-4 px-md-0">

            <div class="row">
                <div class="col-12 border-left-green ml-2 ml-md-3 mb-3 d-lg-none">
                    <h5 class="section_tagline_product mb-0">Monza Product & Event</h5>
                    <h2 class="section_title mt-2 mb-0">Highlight</h2>
                </div>
            </div>

            <div class="row">
                <div class="blog-vdo col-12 col-lg-6">
                    <div class="owl-carousel owl-theme">
                        <?php if ( $query->have_posts() ) : ?>
                            
                            <?php foreach ($query->posts as $item) : ?>
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
                    <a href="<?php echo get_post_permalink($item->ID); ?>">
                        <div class="row " style="justify-content: center;">

                            <?php if ( $query->have_posts() ) : ?>
                                <?php $hilight3blog = array_slice($query->posts, 0, 3);?>
                                <?php foreach ($hilight3blog as $item) : ?>
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
                                    <?php endforeach; ?>
                                    
                            <?php endif; ?>
                        </div>

                    </a>   
                </div>  
            </div>
            
        </div>

    </section>

    <section class="mt-4 mt-md-5">

        <div class="container px-4 px-md-0">

            <div class="row">
                <div class="col-12 border-left-green ml-2 ml-md-3">
                    <h5 class="section_tagline_product mb-0"><?php echo $blogeven_title['blogeven_title_sub']?></h5>
                    <h2 class="section_title mt-2 mb-0"><?php echo $blogeven_title['blogeven_title_title']?></h2>
                </div>
            </div>
                   
                <div class="row mt-4 mt-md-5">
                     <?php if ( $query->have_posts() ) : ?>

                        <?php foreach ($query->posts as $item) : ?>
                        <?php $postblog_title = get_field('postblog_title', $item->ID ); ?>  
                            <div class="col-12 col-md-6 mb-4 mb-md-5">
                                <a href="<?php echo get_post_permalink($item->ID); ?>">
                                    <div class="video-box">
                                        <div class="video-box--image" style="background-image: url(<?php echo $postblog_title['postblog_title_imgblog']['sizes']['medium_large']; ?>)"></div>
                                    </div>
                                    <div class="my-3 mx-0 mx-md-2">
                                        <h3 class="mb-2 strong"><?php echo $item->post_title;?></h3>
                                        <p class="m-0 p-0">
                                            <?php echo substr(strip_tags($postblog_title['postblog_title_blog']), 0, 200);?>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                            
                    <?php endif; ?>
                   
                </div>

        </div>

    </section>


<!--SCRIPT -->

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
