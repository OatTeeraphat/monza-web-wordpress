<?php
/**
* Template Name: CONTACT
*
*/

get_header();
?>

<?php 

$contact_banner = get_field('contact_banner');
$contact_map = get_field('contact_map');
$contact_form = get_field('contact_form');

//dd($contact_form);


?>

<!-- Banner -->

    <div class="product_cover" style="background-image: url('<?php echo $contact_banner['contact_banner_bg']['sizes']['1536x1536']?>');"> 
        <div class="fade-box"></div>
        <div class="product_cover_text">    
            <h2 class="section_title"><?php echo $contact_banner['contact_banner_title']?></h2>
            <h4><?php echo $contact_banner['contact_banner_subtitle']?></h4>
        </div>
    </div>
    
<!-- map -->
    <section>
        <div class="container" style="overflow: visible">
            <div class="row">
                <div class="map col-12 col-md-6 order-2 order-md-1">
                    <div class="row px-2">
                        <div class="col-12">
                            <iframe class="rounded" src="<?php echo $contact_map['contact_map_map']?>" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                        <div class="col-12 my-3">
                            <h2 class="mb-2 strong"><?php echo $contact_map['contact_map_name']?></h2>
                            <p class="m-0 p-0"><?php echo $contact_map['contact_map_address']?></p>
                        </div>

                    </div>
                

                </div>
                <div class="col-12 col-md-6 mb-5 order-1 order-md-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="row px-3">
                                <div class="col-12 border-left-green">
                                    <h5 class="section_tagline_product"><?php echo $contact_form['contact_form_subtitle']?></h5>
                                    <h2 class="section_title mt-2 mb-0"><?php echo $contact_form['contact_form_title']?></h2>

                                </div>
                            </div>
                               
                           
                            <form class="mt-4 px-0 px-xl-3">
                                <div class="form-row mx-1 ">
                                  <div class="form-group col-12">
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $contact_form['contact_form_name']?>">
                                  </div>
                                  <div class="form-group col-12">
                                    <input type="phone" class="form-control" id="inputEmail4" placeholder="<?php echo $contact_form['contact_form_phone']?>">
                                  </div>
                                  <div class="form-group col-12">
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $contact_form['contact_form_email']?>">
                                  </div>
                                  <div class="form-group col-12">
                                    <textarea class="form-massage py-3" placeholder="<?php echo $contact_form['contact_form_message']?>" id="exampleFormControlTextarea1" rows="3"></textarea >
                                  </div>
                                  <div class="form-group col-12">
                                      <button type="submit m-1" class="btn"
                                      style=" color: #fff; background-color: #008040; width: calc(12em + .75rem + 2px); "><?php echo $contact_form['contact_form_send']?></button>
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
