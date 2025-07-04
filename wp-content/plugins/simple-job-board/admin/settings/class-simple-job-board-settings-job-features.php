<?php
if (!defined('ABSPATH')) {
    exit;
} // Exit if accessed directly
/**
 * Simple_Job_Board_Settings_Job_Features Class
 * 
 * This file used to define the settings for the job features. User can create 
 * generic job features that will add to the newly created job.
 *
 * @link        https://wordpress.org/plugins/simple-job-board
 * @since       2.2.3
 * @since       2.3.2   Added Application Form Labels' Editing Feature
 * @since       2.4.0   Revised Inputs & Outputs Sanitization & Escaping
 * @since       2.5.0   Added before & after action hooks for the job features section.
 *
 * @package     Simple_Job_Board
 * @subpackage  Simple_Job_Board/admin/settings
 * @author      PressTigers <support@presstigers.com>
 */

class Simple_Job_Board_Settings_Job_Features {

    /**
     * Initialize the class and set its properties.
     *
     * @since   2.2.3
     */
    public function __construct() {

        // Filter -> Add Settings Job Features Tab
        add_filter('sjb_settings_tab_menus', array($this, 'sjb_add_settings_tab'), 40);

        // Action -> Add Settings Job Features Section 
        add_action('sjb_settings_tab_section', array($this, 'sjb_add_settings_section'), 40);

        // Action -> Save Settings Job Features Section 
        add_action('sjb_save_setting_sections', array($this, 'sjb_save_settings_section'));
    }

    /**
     * Add Settings Job Features Tab.
     *
     * @since    2.2.3
     * 
     * @param    array  $tabs  Settings Tab
     * @return   array  $tabs  Merge array of Settings Tab with Job Features Tab.
     */
    public function sjb_add_settings_tab($tabs) {

        $tabs['job_features'] = esc_html__('Job Features', 'simple-job-board');
        return $tabs;
    }

    /**
     * Add Settings Job Features section.
     *
     * @since   2.2.3
     * @since	2.10.0	Fixed the issue where array is fetched instead of icon value for default features.
     */
    public function sjb_add_settings_section() {

        if (FALSE !== get_option('job_post_layout_settings')) {
            $jobpost_layout_option = get_option('job_post_layout_settings');
            if ('job_post_layout_version_one' === $jobpost_layout_option)
                $job_post_layout_version = 'v1';

            if ('job_post_layout_version_two' === $jobpost_layout_option)
                $job_post_layout_version = 'v2';
        } else {
            $job_post_layout_version = 'v1';
        }
        $allowed_tags = sjb_get_allowed_html_tags();
        $enable_job_features =  get_option('job_board_features_enable', 'no');
        $sjb_csrf_token_disable =  get_option('sjb_csrf_token_disable', 'no');
        ?>
        <!-- Job Features -->
        <div data-id="settings-job_features" class="sjb-admin-settings tab">
            <form method="post" action="" id="job_feature_form">
                <h4 class="first"><?php esc_html_e('Enable Job Features For Existing Jobs', 'simple-job-board'); ?></h4>
                <div class="sjb-section settings-fields features-short">
                    
                    <div class="sjb-form-group">
                        <input type="checkbox" name="job_features_enable" id="enable-features" value="yes"  <?php checked('yes', esc_attr($enable_job_features)); ?> />
                        <label for="enable-features" class="enable-features-label"><?php echo esc_html__('Display these features in previously added jobs, by default, these will apply to jobs added afterward', 'simple-job-board'); ?></label>
                    </div>
                    <div class="sjp-form-field-note">
                            <span><?php echo esc_html__('Note: If this checkbox is selected, it will add the features only in the jobs in backend, to display the fields on the job detail page you have to update each job post.', 'simple-job-board'); ?></span>
                        </div>
                </div>
                
                <h4><?php esc_html_e('Disable Additional Secuirty', 'simple-job-board'); ?></h4>
                <div class="sjb-section settings-fields features-short">
                    <div class="sjb-form-group">
                        <input type="checkbox" name="sjb_csrf_token_disable" id="sjb-csrf-token-disable" value="yes"  <?php checked('yes', esc_attr($sjb_csrf_token_disable)); ?> />
                        <label for="sjb-csrf-token-disable" class="enable-features-label"><?php echo esc_html__('This will disable the additional secuirty check when someone apply on the job', 'simple-job-board'); ?></label>
                    </div>
                </div>

                <h4 class="first"><?php esc_html_e('Default Feature List', 'simple-job-board'); ?></h4>
                <div class="sjb-section settings-fields features-short">
                    <?php
                    /**
                     * Action -> Add new section before job feature section.  
                     * 
                     * @since   2.5.0 
                     */
                    do_action('sjb_jobfeature_before');
                    ?>
                    
                        <ul id="settings_job_features">
                            
                            <?php
                            // Get Job Features From DB
                            $job_features = get_option('jobfeature_settings_options');
                            $fields = $job_features;

                            // Display Job Features
                            if (NULL != $fields):
                                foreach ($fields as $field => $val) {
                                    if ('jobfeature_' == substr($field, 0, 11)) {

                                        if ($job_post_layout_version == 'v2') {
                                            $list_class = 'sjb-modern-list';
                                        } else {
                                            $list_class = 'sjb-classic-list';
                                        }

                                        // Escaping all array value
                                        $val = ( is_array($val) ) ? array_map('esc_attr', $val) : esc_attr($val);
                                        $field = preg_replace('/[^\p{L} 0-9]/u', '_', $field);

                                        /**
                                         * New Label Index Insertion:
                                         * 
                                         * - Addition of new index "label"
                                         * - Data Legacy Checking  
                                         */
                                        $label = isset($val['label']) ? $val['label'] : esc_html__(ucwords(str_replace('_', ' ', substr($field, 11))), 'simple-job-board');
                                        $value = isset($val['value']) ? $val['value'] : $val;
                                        $feature_value = ( 'empty' === $value ) ? '<input type="text" id="' . esc_attr($field) . ' value=" "  name="' . esc_attr($field) . '[value]" />' : '<input type="text" id="' . esc_attr($field) . '" value="' . $value . '"  name="' . esc_attr($field) . '[value]" />';                                    
                                        echo '<li class="' . esc_attr($field) . ' ' . esc_attr($list_class) . '"><strong>' . esc_html__('Field Name', 'simple-job-board') . ': </strong><label class="sjb-editable-label">' . esc_attr($label) . '</label><input type="hidden" name="' . esc_attr($field) . '[label]" value="' . esc_attr( $label ) . '"  >' . wp_kses( $feature_value, $allowed_tags ) . ' &nbsp;';

                                        
                                        if ($job_post_layout_version == 'v2') {

                                            if (isset($val['icon']) && '' !== $val['icon']) {

                                                $icon_value = $val['icon'];
                                            } else if (isset($fields['icon_' . $field])) {
                                                $icon_value = $fields['icon_' . $field]['icon'];
                                            } else if (!isset($icon_value) || '' === $icon_value) {
                                                $icon_value = 'fa-briefcase';
                                            }
                                            if(substr($icon_value,0,3) == 'fa-'){
                                                $icon_value = 'fa  '.$icon_value;
                                            }
                                            echo '<input type="text" id="icon_' . esc_attr($field) . '" class="sjb-job-feature-icon" name="icon_' . esc_attr($field) . '[icon]" value="' . esc_attr($icon_value) . '" placeholder="fa  fa-briefcase" /><span class="input-group-addon"><i class="' . esc_attr($icon_value) . '"></i></span> ';
                                        }

                                        echo '<div class="button removeField">' . esc_html__('Delete', 'simple-job-board') . '</div></li>';
                                    }
                                }
                            endif;
                            ?>
                        </ul>
                        <input type="hidden" name="job_features" value="job_features" />
                        <input type="hidden" value="1" name="admin_notices" />
                        <input type="hidden" name="settings_jobfeatures_nonce" value="<?php echo wp_create_nonce('jobpost_jobfeatures_settings'); ?>" >
                    
                </div> 
            </form>
            <!-- Add Job Features -->
            <?php
            if ($job_post_layout_version == 'v2') {
                $addfield_class = 'sjb-modern-addfield';
            } else {
                $addfield_class = 'sjb-classic-addfield';
            }
            ?>
            <h4><?php _e('Add New Feature', 'simple-job-board'); ?></h4>
            <div class="sjb-section sjb-features-ui sjb_add_icon_fields <?php echo esc_attr($addfield_class); ?>">
                <div class="sjb-content-featured">
                    <div class="sjb-form-group">
                        <label class="sjb-featured-label"><?php esc_html_e('Feature', 'simple-job-board'); ?></label>
                        <input type="text" id="settings_jobfeature_name" />
                    </div>
                    <div class="sjb-form-group">
                        <label class="sjb-featured-label"><?php esc_html_e('Value', 'simple-job-board'); ?></label>
                        <input type="text" id="settings_jobfeature_value" />
                    </div>
                    <?php
                    if ($job_post_layout_version == 'v2') {
                        ?>
                        <div class="sjb-form-group" id="add-job_features">
                            <label class="sjb-featured-label"><?php esc_html_e('Icon', 'simple-job-board'); ?></label>
                            <input type="text" id="settings_job_feature_icon" class="sjb-job-feature-icon" placeholder="fa  fa-briefcase" value="fa  fa-briefcase" />
                            <span class="input-group-addon"><i class="fa  fa-briefcase"></i></span> 
                        </div>
                        <?php
                    }
                    ?>
                    <input type="submit" class="button" id="settings_addFeature" value="<?php echo esc_html__('Add Field', 'simple-job-board'); ?>" />
                </div>
            </div>

            <?php
            /**
             * Action -> Add new section after job feature section.
             * 
             * @since   2.5.0 
             */
            do_action('sjb_jobfeature_after');
            ?>
            <input type="submit" name="jobfeature_submit" id="jobfeature_form" class="button button-primary" value="<?php echo esc_html__('Save Changes', 'simple-job-board'); ?>" />
        </div>

        <?php
    }

    /**
     * Save Settings Job Features Section.
     * 
     * This function is used to save the generic job features. All these 
     * features are displayed on creation of new job.
     *
     * @since    2.2.3
     */
    public function sjb_save_settings_section() {

        // Check if nonce is set.
        if ( NULL == filter_input( INPUT_POST, 'settings_jobfeatures_nonce' ) ) {
            return;
        }

        // Verify that the nonce is valid.
        check_admin_referer('jobpost_jobfeatures_settings', 'settings_jobfeatures_nonce');
        $POST_data = filter_input_array(INPUT_POST);
        $features = filter_input(INPUT_POST, 'job_features');
        $enable_job_features = isset($_POST['job_features_enable']) ? sanitize_text_field($_POST['job_features_enable']) : '';
        $sjb_csrf_token_disable = isset($_POST['sjb_csrf_token_disable']) ? sanitize_text_field($_POST['sjb_csrf_token_disable']) : '';
        
        // Save Form Data to WP Option
        if (!empty($POST_data) && ( $features )) {

            $job_features = array();

            // Loop through the input and sanitize each of the values
            foreach ($POST_data as $key => $val) {
                if( is_array( $val ) ) {
                    $job_features[$key] = array_map( 'sanitize_text_field', $val);
                } else {
                    $job_features[$key] = sanitize_text_field( $val );
                }
            }
           
            // Save Job Features in WP Options || Add Option if not exist.
            (FALSE !== get_option('jobfeature_settings_options')) ?
                            update_option('jobfeature_settings_options', $job_features) :
                            add_option('jobfeature_settings_options', $job_features, '', 'no');
        }

        update_option('job_board_features_enable', sanitize_text_field( $enable_job_features ) );

        update_option('sjb_csrf_token_disable', sanitize_text_field( $sjb_csrf_token_disable ) );
            
        
    }

}
