
<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - This method should be static
 * - Check if the $_REQUEST content actually is the plugin name
 * - Run an admin referrer check to make sure it goes through authentication
 * - Verify the output of $_GET makes sense
 * - Repeat with other user roles. Best directly by using the links/query string parameters.
 * - Repeat things for multisite. Once for a single site in the network, once sitewide.
 *
 * @link       https://wordpress.org/plugins/simple-job-board 
 *
 * @package    Simple_Job_Board
 * @since      1.0.0
 */

// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) { exit; }
$delete_data_option = get_option('delete_data_on_uninstall');
    
    if ($delete_data_option == "yes") {
        // Delete Options -> Plugin General
        delete_option('sjb_version');
        delete_option('sjb_update_ui_notice');
        delete_option('sjb_default_loader_list');
        delete_option('sjb_htaccess_hash');

        // Delete Options -> General Settings
        delete_option('job_board_jobpost_slug');
        delete_option('job_board_job_category_slug');
        delete_option('job_board_job_type_slug');
        delete_option('job_board_job_location_slug');

        // Delete Options-> Appearance Settings 
        delete_option('job_board_pages_layout');
        delete_option('job_board_listing');
        delete_option('job_board_listing_view');
        delete_option('job_board_jobpost_content');
        delete_option('job_board_container_class');
        delete_option('job_board_container_id');
        delete_option('job_board_typography');
        delete_option('sjb_fonts');
        delete_option('sjb_loader_image');
        delete_option('job_post_layout_settings');
        delete_option('quick_apply_btn_text');
        delete_option('read_more_btn_text');
        delete_option('apply_now_btn_text');

        // Delete Options-> Settings Feature & Application Form
        delete_option('jobapp_settings_options');
        delete_option('jobfeature_settings_options');
        delete_option('default_fields_count');
        delete_option('sjb_csrf_token_disable');
        
        // Delete Options-> Search Filters
        delete_option('job_board_category_filter');
        delete_option('job_board_jobtype_filter');
        delete_option('job_board_location_filter');
        delete_option('job_board_search_bar');

        // Delete Options-> Notifications
        delete_option('job_board_admin_notification');
        delete_option('job_board_applicant_notification');
        delete_option('job_board_hr_notification');
        delete_option('settings_hr_email');
        delete_option('settings_admin_email');

        // Delete Options-> Uploaded File Extension
        delete_option('job_board_all_extensions_check');
        delete_option('job_board_allowed_extensions');
        delete_option('job_board_upload_file_ext');
        delete_option('job_board_anti_hotlinking');

        // Delete Options-> Privacy
        delete_option('job_board_privacy_settings');
        delete_option('job_privacy_checkbox_settings');
        delete_option('job_board_terms_condition_settings');
        delete_option('job_board_privacy_policy_label');
        delete_option('job_board_privacy_policy_content');
        delete_option('job_board_term_conditions_label');
        delete_option('job_board_term_conditions_content');
        delete_option('sjb_erasure_request_removes_applicant_data');
        
        //Delete option -> Uninstall Data
        delete_option('delete_data_on_uninstall');
    }
