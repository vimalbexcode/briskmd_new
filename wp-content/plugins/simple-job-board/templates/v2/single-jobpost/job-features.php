<?php

/**
 * Single view Job Fetures
 *
 * Override this template by copying it to yourtheme/simple_job_board/v2/single-jobpost/job-features.php
 * 
 * @author 	PressTigers
 * @package     Simple_Job_Board
 * @subpackage  Simple_Job_Board/Templates
 * @version     2.0.0
 * @since       2.1.0
 * @since       2.2.2   Added "sjb_job_features" filter.
 * @since       2.2.3   Modified the @hooks placement.
 * @since       2.3.0   Added "sjb_job_features_template" filter.
 * @since       2.4.0   Revised whole HTML template
 */
ob_start();
global $post;

/**
 * Fires before displaying job features on job detail page .
 *                   
 * @since 2.1.0                   
 */
do_action("sjb_job_features_before");
?>

<!-- Start Job Features
================================================== -->
<div class="job-features">
    <?php
    $keys = sjb_job_features_count();
    $job_category = wp_get_post_terms($post->ID, 'jobpost_category');
    $metas = '';
    $job_features_heading = get_option('job_board_job_features', 'Job Features');
    // Use WPML or Loco Translate to translate it if the translation exists
    $translated_heading = __( $job_features_heading, 'simple-job-board' );
    // Show Job Features Title, If Features Exist.
    if (0 < $keys || NULL != $job_category) :
    ?>
        <h3><?php echo apply_filters('sjb_job_features_title', esc_html($translated_heading)); ?></h3>
    <?php
    endif;
    ?>

    <table class="table">
        <tbody>
            <?php
            /**
             * Fires before the job category under the job features section on job detail page.
             * 
             * @since   2.2.3
             */
            do_action("sjb_job_features_category_before");

            // Job Category under Job Features Section
            if (sjb_get_the_job_category()) :

                ?>
                <div class='row'>
                    <div class='col-md-3 col-sm-6'>
                        <div class='sjb-title-value'>
                            <h4><i class='fab fa-black-tie' aria-hidden='true'></i><?php echo esc_html__('Job Category', 'simple-job-board') ?></h4>
                            <p><?php sjb_the_job_category() ?></p>
                        </div>
                    </div>
                <?php
            endif;

            /**
             * Fires after the job category under the job features section on job detail page.
             * 
             * @since   2.2.3
             */
            do_action("sjb_job_features_category_after");

            // Display Job Features
            $enable_feature = get_post_meta(get_the_ID(), 'enable_job_feature', TRUE);
            if($enable_feature == 'jobfeatures' || $enable_feature == '' ){
                $keys = get_post_custom_keys(get_the_ID());
                if ($keys != NULL) :
                    foreach ($keys as $key) :
                        if (substr($key, 0, 11) == 'jobfeature_') {
                            $val = get_post_meta($post->ID, $key, TRUE);

                            /**
                             * New Label Index Insertion:
                             * 
                             * - Addition of new index "label"
                             * - Data Legacy Checking  
                             */
                            $label = isset($val['label']) ? $val['label'] : __(ucwords(str_replace('_', ' ', substr($key, 11))), 'simple-job-board');
                            $value = isset($val['value']) ? $val['value'] : $val;

                            if ( isset( $val['icon'] ) && '' !== $val['icon'] ) {
                                $icon_value = $val['icon'];
                            } else {
                                $icon_value = get_post_meta($post->ID, "icon_" . $key . "", true);
                            }
                            if(!isset($icon_value) || $icon_value == ''){
                                $icon_value = 'fa-briefcase';
                            }
                            if(substr($icon_value,0,3) == 'fa-'){
                                $icon_value = 'fa  '.$icon_value;
                            }
                            if ($value != NULL) {
                                ?>
                                <div class='col-md-3 col-sm-6'>
                                    <div class='sjb-title-value'>
                                        <h4><i class='<?php echo esc_attr( $icon_value ); ?>' aria-hidden='true'></i><?php echo esc_attr( $label ); ?></h4>
                                        <p><?php echo esc_attr( $value ); ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    endforeach;
                endif;

                /**
                 * Modify the output of job feature section. 
                 *                                       
                 * @since   2.2.0
                 * 
                 * @param string  $metas job features                   
                 */
                echo apply_filters('sjb_job_features', $metas);
                
            }
            else{
                $settings_options = get_option('jobfeature_settings_options');

                if (NULL == $settings_options) {
                    $settings_options = '';
                }

                if ($settings_options != NULL) :
                     foreach ($settings_options as $key => $val):

                        if (substr($key, 0, 11) == 'jobfeature_') {
                            
                            /**
                             * New Label Index Insertion:
                             * 
                             * - Addition of new index "label"
                             * - Data Legacy Checking  
                             */
                            $label = isset($val['label']) ? $val['label'] : __(ucwords(str_replace('_', ' ', substr($key, 11))), 'simple-job-board');
                            $value = isset($val['value']) ? $val['value'] : $val;

                            $icon_value = $settings_options['icon_'.$key];
                            if(!isset($icon_value) || $icon_value == ''){
                                $icon_value = 'fa-briefcase';
                            }
                            if(substr($icon_value,0,3) == 'fa-'){
                                $icon_value = 'fa  '.$icon_value;
                            }
                            if ($value != NULL) {
                                ?>
                                <div class='col-md-3 col-sm-6'>
                                    <div class='sjb-title-value'>
                                        <h4><i class='<?php echo esc_attr( $icon_value ); ?>' aria-hidden='true'></i><?php echo esc_attr( $label ); ?></h4>
                                        <p><?php echo esc_attr( $value ); ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    endforeach;
                endif;

                /**
                 * Modify the output of job feature section. 
                 *                                       
                 * @since   2.2.0
                 * 
                 * @param string  $metas job features                   
                 */
                echo apply_filters('sjb_job_features', $metas);
            }

            ?>
        </tbody>
    </table>

</div>
<!-- ==================================================
End Job Features -->

<div class="clearfix"></div>
<?php
/**
 * Fires after displaying job features on job detail page.
 *                   
 * @since   2.1.0                   
 */
do_action("sjb_job_features_after");

$html_job_features = ob_get_clean();

/**
 * Modify the Job Feature Template.
 *                                       
 * @since   2.3.0
 * 
 * @param  html $html_job_features Job Features HTML.                   
 */
echo apply_filters('sjb_job_features_template', $html_job_features);
