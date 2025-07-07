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
    .area_list .nav{
        gap: 20px;
    }
    .area_list .nav-link{
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
    .area_list .nav-link:hover,
    .area_list .nav-link:focus,
    .area_list .nav-link.active{
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
    .area_list .accordion-body .list-group-item{
        background-color: transparent;
        color: var(--clr_black);
        font-size: var(--e-global-typography-primary-font-size); 
    }
    @media (min-width: 1025px) {
        
    }
    @media (min-width: 1200px) {
        .area_list .nav-link{
            min-height: 60px;
        }
    }
    @media (min-width: 1600px) {
        .area_list .nav-link{
            min-height: 77px;
        }
    }
</style>
<section class="container-fluid area_list">
	<div class="row">
        <div class="col-12">
            <div class="d-flex align-items-start area_list_row">
                <div class="nav flex-column nav-pills me-3 col-md-4 col-lg-3" id="area_city" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="area_city_tab_1" data-bs-toggle="pill" data-bs-target="#area_city_1" type="button" role="tab" aria-controls="area_city_1" aria-selected="true">Home<img src="<?php echo get_home_url()?>/wp-content/uploads/right_arrow.svg" alt="arrow"/></button>
                    <button class="nav-link" id="area_city_tab_2" data-bs-toggle="pill" data-bs-target="#area_city_2" type="button" role="tab" aria-controls="area_city_2" aria-selected="false">Profile<img src="<?php echo get_home_url()?>/wp-content/uploads/right_arrow.svg" alt="arrow"/></button>
                </div>
                <div class="tab-content col-md-8 col-lg-9" id="area_city_content">
                    <div class="tab-pane fade show active" id="area_city_1" role="tabpanel" aria-labelledby="area_city_tab_1" tabindex="0">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="tab-pane-title">Florida</h2>
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">  
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_1" aria-expanded="true" aria-controls="collapse_1">
                                            Accordion Item #1
                                        </button>                                    
                                        <div id="collapse_1" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <div class="list-group list-group-flush">
                                                    <a href="#" class="list-group-item">A second link item</a>
                                                    <a href="#" class="list-group-item">A second link item 2</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_2" aria-expanded="false" aria-controls="collapse_2">
                                            Accordion Item #2
                                        </button>
                                        <div id="collapse_2" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong>This is the second item’s accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It’s also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
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
<script>
jQuery(document).ready(function($) {
      
});
</script>    