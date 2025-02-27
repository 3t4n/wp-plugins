<?php
/**
 * WPEG Languanges list.
 *
 * @package WPEG_Lang
 * @since 1.0.0
 */

/**
 * WPEG Languanges
 */
class WPEG_Lang {
	/**
	 * Load string with WordPress translation functions.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->search_guides                 = __( 'Search Guides', 'wpeg' );
		$this->new_guide                     = __( 'New Guide', 'wpeg' );
		$this->new_step                      = __( 'New Step', 'wpeg' );
		$this->guide_description_placeholder = __( 'Your guide description here', 'wpeg' );
		$this->preference                    = __( 'Preference', 'wpeg' );
		$this->disable_enable_guide          = __( 'Disable / Enable Guide', 'wpeg' );
		$this->preview_guide                 = __( 'Preview Guide', 'wpeg' );
		$this->edit_guide                    = __( 'Edit Guide', 'wpeg' );
		$this->edit_step                     = __( 'Edit Step', 'wpeg' );
		$this->delete                        = __( 'Delete', 'wpeg' );
		$this->delete_step                   = __( 'Delete Step', 'wpeg' );
		$this->delete_guide                  = __( 'Delete Guide', 'wpeg' );
		$this->save                          = __( 'Save', 'wpeg' );
		$this->save_changes                  = __( 'Save Changes', 'wpeg' );
		$this->or                            = __( 'or', 'wpeg' );
		$this->yes                           = __( 'Yes', 'wpeg' );
		$this->ok                            = __( 'OK', 'wpeg' );
		$this->cancel                        = __( 'Cancel', 'wpeg' );
		$this->steps                         = __( 'Step(s)', 'wpeg' );
		$this->step_lists                    = __( 'Step lists', 'wpeg' );
		$this->step_manager                  = __( 'Step Manager', 'wpeg' );
		$this->no_guide                      = __( 'There is no guides yet. You have to make new guide first.', 'wpeg' );
		$this->no_step                       = __( 'There is no step yet. You can create it by click add step button.', 'wpeg' );
		$this->no_step_bar                   = __( 'There is no step yet. You can create it by click new step button.', 'wpeg' );
		$this->current_guide                 = __( 'Current guide', 'wpeg' );
		$this->add_guide                     = __( 'Add new guide', 'wpeg' );
		$this->add_step                      = __( 'Add Step', 'wpeg' );
		$this->add_new_guide                 = __( 'Add a new guide', 'wpeg' );
		$this->add_to_list                   = __( 'Add to list', 'wpeg' );
		$this->selector_click                = __( 'Click', 'wpeg' );
		$this->selector_tooltip              = __( 'Tooltip', 'wpeg' );
		$this->selector_modal                = __( 'Modal', 'wpeg' );
		$this->selector_input                = __( 'Input', 'wpeg' );
		$this->title                         = __( 'Title', 'wpeg' );
		$this->description                   = __( 'Description', 'wpeg' );
		$this->export                        = __( 'Export', 'wpeg' );
		$this->import                        = __( 'Import', 'wpeg' );
		$this->choose_guide_export           = __( 'Choose guide(s) to export', 'wpeg' );
		$this->choose_guide_import           = __( 'Choose guide(s) to import', 'wpeg' );
		$this->exported_file_ext             = __( 'Exported file will be downloaded as .WPEG file.', 'wpeg' );
		$this->import_file_ext               = __( 'Drop a WPEG File (.WPEG) here', 'wpeg' );
		$this->check_all_guide               = __( 'Check all guide', 'wpeg' );
		$this->select_file                   = __( 'Select File', 'wpeg' );
		$this->selected_imported             = __( 'Selected guides will be imported.', 'wpeg' );
		$this->please_select_guide           = __( 'Please select guide to manage.', 'wpeg' );
		$this->no_add_step_when_empty        = __( 'You can\'t add a step before you make a new guide.', 'wpeg' );
		$this->delete_confirmation           = __( 'Are you sure to delete', 'wpeg' );
		$this->action_not_cancelable         = __( 'This action can not be undone.', 'wpeg' );
		$this->downloading                   = __( 'Downloading...', 'wpeg' );
		$this->importing                     = __( 'Importing...', 'wpeg' );
		$this->element_updated               = __( 'Element Updated', 'wpeg' );
		$this->reselect_element              = __( 'Reselect Element', 'wpeg' );
		$this->not_now                       = __( 'Not now', 'wpeg' );
		$this->previous                      = __( 'Previous', 'wpeg' );
		$this->next                          = __( 'Next', 'wpeg' );
		$this->done                          = __( 'Done', 'wpeg' );
		$this->click_proceed                 = __( 'Click to proceed', 'wpeg' );
		$this->fill_proceed                  = __( 'Fill input to proceed', 'wpeg' );
		$this->confirm_new_guide             = __( 'It will change the current guide on bottom bar to new guide. Are you sure to do that ?', 'wpeg' );
		$this->error_flow                    = __( 'Invalid Flow Step', 'wpeg' );
		$this->expected_url                  = __( 'Expected URL', 'wpeg' );
		$this->current_url                   = __( 'Current URL', 'wpeg' );
		$this->view_current_step             = __( 'View Current Step', 'wpeg' );
		$this->view_next_step                = __( 'View Next Step', 'wpeg' );
		$this->redirect_original_url         = __( 'Redirect to original URL', 'wpeg' );
		$this->action                        = __( 'Action', 'wpeg' );
		$this->error_element_not_found       = __( 'Element not found or hidden.', 'wpeg' );
	}
}
