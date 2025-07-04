<?php
/**
 * Displays the content when the cover template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
<style>
    .clinic_accordion .accordion-body {
        padding-top: 0;
      }
      .clinic_accordion .accordion-item {
        border: none;
        overflow: hidden;
        margin-bottom: 20px;
        border-radius: 25px;
        box-shadow: 0px 16px 19.9px -13px #00000040;
      }
      .clinic_accordion .accordion-button {
        border: none;
        box-shadow: none;
        font-size: 18px;
        font-weight: 600;
        color: #4c5c6b;
        background-color: #fff;
      }
      .clinic_accordion .accordion-button.collapsed {
        font-size: 16px;
        background-color: #353535;
        box-shadow: 0px 16px 19.9px -13px #00000040;
        color: #fff;
      }
      .clinic_accordion .accordion-collapse.collapse.show {
        background-color: #fff;
      }
      .accordion_address {
        color: #4c5c6b;
      }
      .accordion_tel_col {
        padding-bottom: 15px;
      }
      .accordion_tel {
        color: #4c5c6b;
        display: inline-block;
        text-decoration: none;
      }
      .accordion_note_col {
        border-bottom: 1px solid #cfcfcf;
        margin-bottom: 15px;
      }
      .accordion_note {
        color: #000;
        font-size: 12px;
        margin-bottom: 5px;
      }
      .btn.accordion_btn {
        padding: 0;
        border: none;
        color: #ff874e;
      }
      .btn.accordion_btn:hover,
      .btn.accordion_btn:focus {
        color: #003a3c;
        box-shadow: none;
        border: none;
      }
      .available_service_list {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 15px;
      }
      .available_service .badge {
        background-color: #6e6e6e;
        color:var(--clr_white);
        text-decoration: none;
        border-radius: 5rem;
        padding: 10px 20px;
        font-size: 12px;
        font-weight: 400;
      }
      .available_service .badge:not(.active) {
        pointer-events: none;
      }
      .available_service .badge_img {
        height: 12px;
        width: 12px;
        object-fit: contain;
        object-position: center;
        margin-right: 5px;
      }
      .available_service .badge.active {
        background-color: #ff874e;
      }
      .available_service .badge:hover {
        background-color: #003a3c;
      }
      .col_available_service .available_service {
        background-color: #fff;
        border-radius: 40px;
        padding: 30px;
      }
      .available_service_title {
        font-size: 16px;
      }
      .accordion-button::after {
            background-image: none !important;
            content: "\f06e";
            font-family: "Font Awesome 5 Free";
            font-weight: 400;
            -moz-osx-font-smoothing: grayscale;
            -webkit-font-smoothing: antialiased;
            display: inline-block;
            font-style: normal;
            font-variant: normal;
            text-rendering: auto;
            line-height: 1;
            transform: none !important;
            font-size: 16px;
        }

        .accordion-button:not(.collapsed)::after {
            background-image: none !important;
            content: "\f070";
            font-size: 16px;
        }
      .available_service_note {
        width: 100%;
        margin-top: 20px;
        background-color: #f0f9ff;
        padding: 20px;
        border-radius: 20px;
      }
      .available_service_note p {
        margin-bottom: 0;
        font-size: 12px;
      }
      @media (min-width: 1025px) {
        .clinic_accordion .accordion-button {
          font-size: 21px;
        }
        .available_service .badge {
          font-size: 16px;
        }
        .available_service .badge_img {
          height: 15px;
          width: 15px;
        }
        .available_service_title {
          font-size: 18px;
        }
        .available_service_note {
          padding: 25px;
          border-radius: 30px;
        }
        .available_service_note p {
          font-size: 14px;
        }
      }
</style>
<section class="container-fluid">
	<div class="row">
        <div class="col-md-5">
            <div class="accordion clinic_accordion" id="clinic_accordion">
                <?php 
                        $args = array(
                            'post_type'=> 'clinics',
                            'post_status' => 'publish',
                            'order'    => 'desc',
                            'posts_per_page' => -1
                        );
                         $post_query = new WP_Query( $args );
                         if ( $post_query-> have_posts() ) :  
                            
                            $all_terms = get_terms([
                                'taxonomy'   => 'our_locations',
                                'hide_empty' => false,
                            ]);
                            
                            $index = 0;
                            $all_services_list = "";
                            while ( $post_query->have_posts() ) : $post_query->the_post(); 
                            $clinic_terms = get_the_terms(get_the_ID(), 'our_locations');
                ?>
                <!-- item 1 -->
                <div class="accordion-item" id="clinic_accordion_item_<?php echo the_ID(); ?>">
                    <?php 
                        $available_services_list = "";
                        
                        $available_services_array=[];
                        $all_services_array=[];
                        if (!empty($clinic_terms) && !is_wp_error($clinic_terms)) {
                                foreach ($clinic_terms as $term) {
                                
                                $available_services_array[]=esc_html($term->name);
                                    $available_services_list .= '<a href="#" target="_blank" class="badge active">
                                <img src="'.esc_html($term->description).'" alt="icon_priamary_care" class="badge_img" />'.esc_html($term->name).' </a>';
                                }
                            }
                            if (!empty($all_terms) && !is_wp_error($all_terms)) {
                                foreach ($all_terms as $t) {
                                    if (in_array($t->name, $available_services_array)) {
                                        if($index == 0){
                                        $all_services_list .= '<a href="#" target="_blank" class="badge active">
                                <img src="'.esc_html($t->description).'" alt="icon_priamary_care" class="badge_img" />'.esc_html($t->name).' </a>';
                                        }
                                        array_push($all_services_array, ["name"=>$t->name,"description"=>$t->description,"is_active"=>1]);
                                    }else{
                                        if($index == 0){
                                        $all_services_list .= '<a href="#" target="_blank" class="badge">
                                <img src="'.esc_html($t->description).'" alt="icon_priamary_care" class="badge_img" />'.esc_html($t->name).' </a>';
                                        }
                                        array_push($all_services_array, ["name"=>$t->name,"description"=>$t->description,"is_active"=>0]);
                                    }
                                }
                            }
                    ?>
                    <button data-service='<?php echo json_encode($all_services_array); ?>' class="accordion-button <?php echo ($index==0? '':'collapsed'); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#clinic_collapse_<?php echo the_ID(); ?>" aria-expanded="<?php echo ($index==0? 'true':'false'); ?>" aria-controls="clinic_collapse_<?php echo the_ID(); ?>"> <?php echo the_title(); ?> </button>
                    <div id="clinic_collapse_<?php echo the_ID(); ?>" class="accordion-collapse collapse <?php echo ($index==0? 'show':''); ?>" data-bs-parent="#clinic_accordion">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-12 accordion_address_col">
                                    <address class="accordion_address"> <?php echo the_content(); ?> </address>
                                </div>
                                <div class="col-12 accordion_tel_col">
                                    <a class="accordion_tel" href="tel:<?php the_field('phone') ?>" target="_blank"><?php the_field('phone') ?></a>
                                </div>
                                <div class="col-12 accordion_note_col">
                                    <p class="accordion_note text-center"> Not for life-threatening emergencies. Call 911. </p>
                                </div>
                                <!-- add "d-md-none" here for hide the div after developing -->
                                <div class="col-12 d-md-none mb-4" id="accordion_available_service">
                                    <div class="available_service">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="available_service_title mb-4"> Available Services </h5>
                                            </div>
                                            <div class="col-12">
                                                <div class="available_service_list">
                                                    <?php echo $available_services_list; ?>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="available_service_note">
                                                    <p>Note: Click on any service to learn more or schedule an appointment. Services may vary by location and provider availability.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 accordion_btn_col">
                                    <a class="btn accordion_btn" href="#" target="_blank">View On Map</a>
                                </div>
                            </div>
                            <!-- end of row -->
                        </div>
                        <!-- end of accordian body -->
                    </div>
                    <!-- end of accordian -->
                </div>
                <!-- end of accordian item -->
                <?php
                
                        $index++;
                        endwhile;
                        endif; 
                        wp_reset_postdata(); 
                ?>
                <!-- item 2 -->
                <?php  
                /* <div class="accordion-item" id="clinic_accordion_item_2">
                    <!-- <h2 class="accordion-header"> -->
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#clinic_collapse_2" aria-expanded="false" aria-controls="clinic_collapse_2"> BriskMd Gaston Clinic 2 </button>
                    <!-- </h2> -->
                    <div id="clinic_collapse_2" class="accordion-collapse collapse" data-bs-parent="#clinic_accordion">
                        <div class="accordion-body">
                            <div class="row">
                                <div class="col-12 accordion_address_col">
                                    <address class="accordion_address"> 1118 Mack Street, Gaston, SC 29053 </address>
                                </div>
                                <div class="col-12 accordion_tel_tel">
                                    <a class="accordion_tel" href="tel:XXXXXXXXXX" target="_blank">(XXX) XXX-XXXX</a>
                                </div>
                                <div class="col-12 accordion_note_col">
                                    <p class="accordion_note text-center"> Not for life-threatening emergencies. Call 911. </p>
                                </div>
                                <!-- add "d-md-none" here for hide the div after developing -->
                                <div class="col-12 mb-4" id="accordion_available_service">
                                    <div class="available_service">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5 class="available_service_title mb-4"> Available Services </h5>
                                            </div>
                                            <div class="col-12">
                                                <div class="available_service_list">
                                                    <a href="#" target="_blank" class="badge active">
                                                        <img src="http://briskmdnew.bexcodeusa.com/wp-content/uploads/2025/06/icon_priamary_care.png" alt="icon_priamary_care" class="badge_img" />Primary Care </a>
                                                    <a href="#" target="_blank" class="badge">
                                                        <img src="http://briskmdnew.bexcodeusa.com/wp-content/uploads/2025/06/icon_dermatology.png" alt="Dermatology" class="badge_img" />Dermatology </a>
                                                    <a href="#" target="_blank" class="badge active">
                                                        <img src="http://briskmdnew.bexcodeusa.com/wp-content/uploads/2025/06/icon_cardiology.png" alt="Cardiology" class="badge_img" />Cardiology </a>
                                                    <a href="#" target="_blank" class="badge">
                                                        <img src="http://briskmdnew.bexcodeusa.com/wp-content/uploads/2025/06/icon_ophthalmology.png" alt="Ophthalmology" class="badge_img" />Ophthalmology </a>
                                                    <a href="#" target="_blank" class="badge">
                                                        <img src="http://briskmdnew.bexcodeusa.com/wp-content/uploads/2025/06/icon_neurology.png" alt="Neurology" class="badge_img" />Neurology </a>
                                                    <a href="#" target="_blank" class="badge">
                                                        <img src="http://briskmdnew.bexcodeusa.com/wp-content/uploads/2025/06/icon_pediatrics.png" alt="Pediatrics" class="badge_img" />Pediatrics </a>
                                                    <a href="#" target="_blank" class="badge">
                                                        <img src="http://briskmdnew.bexcodeusa.com/wp-content/uploads/2025/06/icon_orthopedics.png" alt="Orthopedics" class="badge_img" />Orthopedics </a>
                                                    <a href="#" target="_blank" class="badge">
                                                        <img src="http://briskmdnew.bexcodeusa.com/wp-content/uploads/2025/06/icon_pharmacy.png" alt="Pharmacy" class="badge_img" />Pharmacy </a>
                                                    <a href="#" target="_blank" class="badge">
                                                        <img src="http://briskmdnew.bexcodeusa.com/wp-content/uploads/2025/06/icon_telehealth.png" alt="Telehealth" class="badge_img" />Telehealth </a>
                                                    <a href="#" target="_blank" class="badge">
                                                        <img src="http://briskmdnew.bexcodeusa.com/wp-content/uploads/2025/06/icon_family_medicine.png" alt="Family Medicine" class="badge_img" />Family Medicine </a>
                                                    <a href="#" target="_blank" class="badge">
                                                        <img src="http://briskmdnew.bexcodeusa.com/wp-content/uploads/2025/06/icon_preventive.png" alt="Preventive Care" class="badge_img" />Preventive Care </a>
                                                    <a href="#" target="_blank" class="badge">
                                                        <img src="http://briskmdnew.bexcodeusa.com/wp-content/uploads/2025/06/icon_diagnostics.png" alt="Diagnostics" class="badge_img" />Diagnostics </a>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="available_service_note">
                                                    <p> Note: Click on any service to learn more or schedule an appointment. Services may vary by location and provider availability. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 accordion_btn_col">
                                    <a class="btn accordion_btn" href="#" target="_blank">View On Map</a>
                                </div>
                            </div>
                            <!-- end of row -->
                        </div>
                        <!-- end of accordian body -->
                    </div>
                    <!-- end of content -->
                </div> */ ?>
                <!-- end of accordian item -->
            </div>
        </div>
        <div class="col-md-7 col-12 d-md-block d-none col_available_service" id="col_available_service">
            <div class="available_service">
                <div class="row">
                    <div class="col-12">
                        <h5 class="available_service_title mb-4">Available Services</h5>
                    </div>
                    <div class="col-12">
                        <div class="available_service_list" id="available_service_id">
                            <?php echo $all_services_list; ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="available_service_note">
                            <p> Note: Click on any service to learn more or schedule an appointment. Services may vary by location and provider availability. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
jQuery(document).ready(function($) {
    $('.accordion-button').on('click', function() {
        // console.log("Aakash");
        // console.log($(this).attr('data-service'));
        // console.log(JSON.parse($(this).attr('data-service')));
        var services = JSON.parse($(this).attr('data-service'));
        var html="";
        $.each(services, function(index, service) {
        //    console.log(service.name);
            html +='<a href="#" target="_blank" class="badge '+(service.is_active==1?"active":"")+'"><img src="'+service.description+'" alt="'+service.name+'" class="badge_img" />'+service.name+'</a>';
        });
        $('#available_service_id').html(html);
       // console.log(html);
    });    
});
</script>    