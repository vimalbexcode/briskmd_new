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
    .aimg_icon{
        object-fit: contain;
        max-height: 18px;
    }
    .area_list .nav{
        gap: 20px;
    }
    .area_list.web .nav-link{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: nowrap;
        gap: 20px;
        color: var(--clr_white);
        background-color: var(--clr_primary);
        border-radius: 0;
        min-height: 50px;
        align-items: center;
        font-size: var(--e-global-typography-393e01a-font-size);
    }
    .area_list.web .nav-link:hover,
    .area_list.web .nav-link:focus,
    .area_list.web .nav-link.active{
        background-color: var(--clr_secondary);
    }
    .area_list .tab-content{
        background-color: #FAF8F2;
    }
    .area_list .tab-pane{
        padding: 40px;
    }
    .area_list .tab-pane-title{
        font-size: var(--e-global-typography-d221049-font-size);
        color: var(--clr_primary);
        margin-bottom: 20px;
    }
    .area_list.web .accordion{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        gap: 20px;
    }
    .area_list .accordion-item {
        border: none;
        overflow: hidden;
        margin-bottom: 10px;
        border-radius: 0px;
        background-color: transparent;
    }
    .area_list .accordion-button {
        border: none;
        box-shadow: none;
        font-weight: 600;
        font-size: var(--e-global-typography-393e01a-font-size);
        background-color: transparent;
        color: var(--clr_secondary);
    }
    .area_list .accordion-button.collapsed {
        font-size: var(--e-global-typography-393e01a-font-size);
        background-color: transparent;
        color: var(--clr_secondary);
    }
    .area_list .accordion-collapse.collapse.show {
        background-color: transparent;
    }
    .area_list .accordion-button{
        padding: 10px 0 20px;
        border-bottom: 1px solid #555151;
    }
    .area_list .accordion-body{
        padding: 20px 0 10px;
        background-color: transparent;
    }
    .area_list .accordion-body .list-group{
        display: flex;
        gap: 15px;
    }
    .area_list .accordion-body .list-group-item{
        background-color: transparent;
        color: var(--clr_black);
        font-size: var(--e-global-typography-primary-font-size);
        border-bottom: 0;
        padding: 0;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        font-weight: 400;
    }
    .area_list .accordion-button.mobile{
        padding: 15px 20px;
        border: none;
        box-shadow: none;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        flex-wrap: nowrap;
        gap: 20px;
        color: var(--clr_white);
        background-color: var(--clr_primary);
        border-radius: 0;
        align-items: center;
        font-size: var(--e-global-typography-393e01a-font-size);
    }
    .area_list .accordion-button.mobile.accordion-button::after,
    .area_list .accordion-button.mobile.accordion-button:not(.collapsed)::after{
        background-image: url('<?php echo get_home_url()?>/wp-content/uploads/right_arrow.svg');
        transform: none;
    }
    .area_list .accordion-button.mobile.accordion-button:not(.collapsed)::after{
        transform: rotate(90deg);
    }
    @media (min-width: 1025px) {
        .area_list.web .accordion-item {
            width: calc(50% - 20px);
        }
    }
    @media (min-width: 1200px) {
        .area_list.web .nav-link{
            min-height: 60px;
        }
        .area_list .accordion{
            gap: 40px;
        }
    }
    @media (min-width: 1600px) {
        .area_list.web .nav-link{
            min-height: 77px;
        }
    }
</style>
<!-- web view -->
<section class="container-fluid area_list area_list web d-md-block d-none">
	<div class="row">
        <div class="col-12">
            <div class="d-flex align-items-start area_list_row">
                <div class="nav flex-column nav-pills me-3 col-md-4 col-lg-3" id="area_city" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="area_city_tab_1" data-bs-toggle="pill" data-bs-target="#area_city_1" type="button" role="tab" aria-controls="area_city_1" aria-selected="true">Home<img src="<?php echo get_home_url()?>/wp-content/uploads/right_arrow.svg" class="aimg_icon" alt="arrow"/></button>
                    <button class="nav-link" id="area_city_tab_2" data-bs-toggle="pill" data-bs-target="#area_city_2" type="button" role="tab" aria-controls="area_city_2" aria-selected="false">Profile<img src="<?php echo get_home_url()?>/wp-content/uploads/right_arrow.svg" class="aimg_icon" alt="arrow"/></button>
                </div>
                <div class="tab-content col-md-8 col-lg-9" id="area_city_content">
                    <div class="tab-pane fade show active" id="area_city_1" role="tabpanel" aria-labelledby="area_city_tab_1" tabindex="0">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="tab-pane-title">Florida</h2>
                                <div class="accordion" id="accordion_cities">
                                    <div class="accordion-item">  
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="true" aria-controls="collapse_1">Miami</button>                                    
                                        <div id="collapse_1" class="accordion-collapse collapse show" data-bs-parent="#accordion_cities">
                                            <div class="accordion-body">
                                                <div class="list-group list-group-flush">
                                                    <a href="#" class="list-group-item" target="_blank">Wound Care<img src="<?php echo get_home_url()?>/wp-content/uploads/right_arrow_orange.svg" class="aimg_icon" alt="arrow"/></a>
                                                    <a href="#" class="list-group-item" target="_blank">Mobile Wound Care<img src="<?php echo get_home_url()?>/wp-content/uploads/right_arrow_orange.svg" class="aimg_icon" alt="arrow"/></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_2" aria-expanded="false" aria-controls="collapse_2">West Palm Beach</button>
                                        <div id="collapse_2" class="accordion-collapse collapse" data-bs-parent="#accordion_cities">
                                            <div class="accordion-body">
                                                <div class="list-group list-group-flush">
                                                    <a href="#" class="list-group-item" target="_blank">Wound Care<img src="<?php echo get_home_url()?>/wp-content/uploads/right_arrow_orange.svg" class="aimg_icon" alt="arrow"/></a>
                                                    <a href="#" class="list-group-item" target="_blank">Mobile Wound Care<img src="<?php echo get_home_url()?>/wp-content/uploads/right_arrow_orange.svg" class="aimg_icon" alt="arrow"/></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="area_city_2" role="tabpanel" aria-labelledby="area_city_tab_2" tabindex="0">
                        test
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- mobile view -->
<section class="container-fluid area_list mobile">
	<div class="row">
        <div class="col-12">
            <div class="accordion mobile" id="accordion_area">
                <div class="accordion-item mobile">  
                    <button class="accordion-button mobile" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_area_1" aria-expanded="true" aria-controls="collapse_area_1">Florida</button>                                    
                    <div id="collapse_area_1" class="accordion-collapse collapse show mobile" data-bs-parent="#accordion_area">
                        <div class="accordion-body">

                            <div class="accordion" id="accordion_city_mobile_1">
                                <div class="accordion-item">  
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_city_mob_1" aria-expanded="true" aria-controls="collapse_city_mob_1">Florida</button>                                    
                                    <div id="collapse_city_mob_1" class="accordion-collapse collapse show" data-bs-parent="#accordion_city_mobile_1">
                                        <div class="accordion-body">
                                            <div class="list-group list-group-flush">
                                                <a href="#" class="list-group-item" target="_blank">Wound Care<img src="<?php echo get_home_url()?>/wp-content/uploads/right_arrow_orange.svg" class="aimg_icon" alt="arrow"/></a>
                                                <a href="#" class="list-group-item" target="_blank">Mobile Wound Care<img src="<?php echo get_home_url()?>/wp-content/uploads/right_arrow_orange.svg" class="aimg_icon" alt="arrow"/></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            
        </div>
    </div>
</section>
<script>
jQuery(document).ready(function($) {
      
});
</script>    