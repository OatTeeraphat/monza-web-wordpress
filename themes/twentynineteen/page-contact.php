<?php
/**
* Template Name: CONTACT
*
*/

get_header();
?>

<!-- Banner -->

    <div class="product_cover" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/product-main/cover_product.png');"> 
        <div class="fade-box"></div>
        <div class="product_cover_text">    
            <h2 class="section_title">CONTACT US</h2>
            <h4>This is sample of page tagline</h4>
        </div>
    </div>
    
<!-- map -->
    <section>
        <div class="container" style="overflow: visible">
            <div class="row">
                <div class="map col-12 col-md-6 order-2 order-md-1">
                    <div class="row px-2">
                        <div class="col-12">
                            <iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3877.30936778672!2d100.59020471482917!3d13.638935790420533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2a0f5c17f4473%3A0xcd3637ac31816031!2sMonza%20Shop!5e0!3m2!1sen!2sth!4v1607267728313!5m2!1sen!2sth" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div class="col-12 my-3">
                            <h2 class="mb-2 strong">Monza Factory co.,ltd</h2>
                            <p class="m-0 p-0">Sukhumvit Rd. , Meung District, Theparak, Samutprakran Thailand</p>
                        </div>

                    </div>
                

                </div>
                <div class="col-12 col-md-6 mb-5 order-1 order-md-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="row px-3">
                                <div class="col-12 border-left-green">
                                    <h5 class="section_tagline_product">Official Store</h5>
                                    <h2 class="section_title mt-2 mb-0">Contact Form</h2>

                                </div>
                            </div>
                               
                           
                            <form class="mt-4 px-0 px-xl-3">
                                <div class="form-row mx-1 ">
                                  <div class="form-group col-12">
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="NAME">
                                  </div>
                                  <div class="form-group col-12">
                                    <input type="phone" class="form-control" id="inputEmail4" placeholder="PHONE">
                                  </div>
                                  <div class="form-group col-12">
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="E-MAIL">
                                  </div>
                                  <div class="form-group col-12">
                                    <textarea class="form-massage py-3" placeholder="MASSAGE" id="exampleFormControlTextarea1" rows="3"></textarea >
                                  </div>
                                  <div class="form-group col-12">
                                      <button type="submit m-1" class="btn"
                                      style=" color: #fff; background-color: #008040; width: calc(12em + .75rem + 2px); ">SEND</button>
                                    </div>
                                </div>
                              </form>

                            </div>
                        </div>
                </div>
            
                </div>
            </div>
        </div>
    </section>

<?php
get_footer();
