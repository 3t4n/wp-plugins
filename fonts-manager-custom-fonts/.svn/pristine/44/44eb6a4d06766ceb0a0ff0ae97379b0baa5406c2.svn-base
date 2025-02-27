<?php 
namespace FMCF;
if ( ! defined( 'ABSPATH' ) ) exit;

if(!class_exists('\\FMCF\\FMCF_Stylish_Fonts')) {
	class FMCF_Stylish_Fonts
	{
		public function __construct()
        {
            add_action('init', array($this,'fmcf_store_stylish_font_data'));
        }

        public function fmcf_store_stylish_font_data()
        {
        	if(isset($_POST['fmcfStylishFontsAction']) && sanitize_text_field($_POST['fmcfStylishFontsAction']) == 'fmcfStoreStylishFonts')
    		{
    			$fmcfActionResponse = fmcf_save_uploaded_font_data();
    		}
            else if(isset($_POST['fmcfStylishFontsAction']) && sanitize_text_field($_POST['fmcfStylishFontsAction']) == 'fmcf_del_font_data')
            {
                if(isset($_POST['delIdFcpf']) && $_POST['delIdFcpf'] != '')
                {
                    $fmcfDelIdFnt = sanitize_text_field($_POST['delIdFcpf']);
                    $fmcfChkDelFntOrNot = fmcf_chk_font_assign_or_not($fmcfDelIdFnt);

                    if($fmcfChkDelFntOrNot == 0)
                    {
                        $fmcfResDataArr = fmcf_del_font($fmcfDelIdFnt);
                    }
                    else
                    {
                        $fmcfResDataArr = array(
                            'msg' => "Font can't delete because,font is already assigned",
                            'status' => 0
                        );   
                    }

                    wp_send_json($fmcfResDataArr);
                }
            }
            else if(isset($_POST['fmcfStylishFontsAction']) && sanitize_text_field($_POST['fmcfStylishFontsAction']) == 'fmcf_del_assigned_font_rec')
            {
                if(isset($_POST['delAssignedIdFcpf']) && $_POST['delAssignedIdFcpf'] != '')
                {
                    $fmcfDelAssignId = sanitize_text_field($_POST['delAssignedIdFcpf']);
                    $fmcfResDataArr = fmcf_del_assigned_font($fmcfDelAssignId);
                    wp_send_json($fmcfResDataArr);
                }
            }
            else if(isset($_POST['fmcfAssignFontsStoreAction']) && sanitize_text_field($_POST['fmcfAssignFontsStoreAction']) == 'fmcfAssignFontsStore')
            {
                if(isset($_POST['fmcfAssignFontSubmit']))
                {
                    $fmcfAssignFntId = (isset($_POST['fmcfFontSel']) && $_POST['fmcfFontSel'] != '') ? sanitize_text_field($_POST['fmcfFontSel']) : 0;

                    if($fmcfAssignFntId != 0)
                    {
                        $fmcfAssignFntNm = fmcf_get_org_font_nm($fmcfAssignFntId);
                        $fmcfAssignElement = (isset($_POST['fmcfElement'])) ? fmcf_sanitize_text_or_array_field($_POST['fmcfElement']) : array();
                        $fmcfAssignCls = (isset($_POST['fmcfClassList'])) ? fmcf_sanitize_text_or_array_field($_POST['fmcfClassList']) : '';

                        $fmcfAssignColor = (isset($_POST['nmFmcfColorPicker'])) ? fmcf_sanitize_text_or_array_field($_POST['nmFmcfColorPicker']) : '';

                        $fmcfGetAssignEleList = fmcf_get_assign_font_element($fmcfAssignFntId);
                        $fmcfGenerateFlag = 0;

                        foreach($fmcfGetAssignEleList as $fmcfAssignedEleList)
                        {
                            if(isset($fmcfAssignedEleList['element_and_tag']) && $fmcfAssignedEleList['element_and_tag'] != '')
                            {
                                if(!in_array(sanitize_text_field($fmcfAssignedEleList['element_and_tag']),$fmcfAssignElement))
                                {
                                    fmcf_remove_assign_font_elem(sanitize_text_field($fmcfAssignedEleList['element_and_tag']));
                                    $fmcfGenerateFlag = 1;
                                }
                            }
                        }

                        foreach ($fmcfAssignElement as $fmcfAssignedElem) {
                            $fmcfAssignFontResponse = fmcf_assign_font_data_store($fmcfAssignFntId,$fmcfAssignFntNm,$fmcfAssignedElem,0,$fmcfAssignColor);
                            $fmcfGenerateFlag = 1;
                        }

                        if($fmcfAssignCls != '')
                        {
                            $fmcfAssignFontResponse = fmcf_assign_font_data_store($fmcfAssignFntId,$fmcfAssignFntNm,$fmcfAssignCls,1);
                            $fmcfGenerateFlag = 1;
                        }

                        if($fmcfGenerateFlag == 1)
                        {
                            fmcf_generate_css();
                        }
                    }
                }
            }
            else if(isset($_POST['fmcfStylishFontsAction']) && sanitize_text_field($_POST['fmcfStylishFontsAction']) == 'fmcf_chang_selected_font')
            {
                if(isset($_POST['fmcfIdSelectedFnt']) && $_POST['fmcfIdSelectedFnt'] != '')
                {
                    $fmcfAssignFntId = sanitize_text_field($_POST['fmcfIdSelectedFnt']);
                    $fmcfAssignData = fmcf_get_assign_font_element($fmcfAssignFntId);
                    $fmcfNotAssignIdData = fmcf_get_not_assign_sel_font_element($fmcfAssignFntId);
                    $fmcfAssignClsData = fmcf_assign_font_class_data($fmcfAssignFntId);

                    $fmcfAllAssignDataArr = array(
                        'fmcfAssignSelFntId' => fmcf_sanitize_text_or_array_field($fmcfAssignData),
                        'fmcfNotAssignSelFntId' => fmcf_sanitize_text_or_array_field($fmcfNotAssignIdData),
                        'fmcfAssignClsData' => fmcf_sanitize_text_or_array_field($fmcfAssignClsData)
                    );
                    wp_send_json($fmcfAllAssignDataArr);
                }
            }
            else if(isset($_POST['fmcfStylishFontsAction']) && sanitize_text_field($_POST['fmcfStylishFontsAction']) == 'fmcf_store_google_font')
            {
                $fmcfGfntActionResponse = fmcf_save_google_font();

                wp_send_json($fmcfGfntActionResponse);
                
            }
            else if(isset($_POST['fmcfStylishFontsAction']) && sanitize_text_field($_POST['fmcfStylishFontsAction']) == 'fmcf_apply_predefined_font')
            {
                if(isset($_POST['fmcfPredefinedFntId']) && $_POST['fmcfPredefinedFntId'] != '')
                {
                    $fmcfPredefinedFntId = sanitize_text_field($_POST['fmcfPredefinedFntId']);
                    $fmcfPredefinedResp = fmcf_apply_predefined_font($fmcfPredefinedFntId);
                    wp_send_json($fmcfPredefinedResp);
                }
            }
            else if(isset($_POST['fmcfAssignClrAction']) && sanitize_text_field($_POST['fmcfAssignClrAction']) == 'fmcfAssignClrData')
            {
                fmcf_store_or_upd_clr_data($_POST);
            }
            else if(isset($_POST['fmcfStylishFontsAction']) && sanitize_text_field($_POST['fmcfStylishFontsAction']) == 'fmcf_check_google_fnt_tbl')
            {
                $getFmcfGfntData = fmcf_get_gFont_list($_POST);
                wp_send_json($getFmcfGfntData);
            }


            fmcf_add_tables();
    		fmcf_check_create_folder();
            
        }
	}
}