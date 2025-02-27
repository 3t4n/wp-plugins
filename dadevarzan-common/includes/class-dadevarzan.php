<?php
/**
 * Class DV_DadevarzanShortCode
 *
 * This class add some common shortcode to WordPress eg: [dv-powered-by category="industrial|company|organizational|university|general|"]
 */

class DV_Dadevarzan
{

    public function initialize()
    {
        add_shortcode( 'dv-powered-by', array($this,'add_powered_by_shortcode') );
        add_shortcode('dv-child-pages', array($this,'list_child_pages') );
        add_shortcode( 'dv-tax', array($this,'list_custom_taxonomy') );
        add_shortcode( 'dv-all-tax', array($this,'list_all_custom_taxonomy') );
        add_shortcode('blog', array($this,'blog_info') );
        add_shortcode('dv-date-filter', array($this,'date_filter_form') );

        add_action( 'wp_head', array($this,'add_meta_tags') , 2 );
        add_action( 'pre_get_posts', array($this,'filter_posts_by_date') );

        add_filter( 'fl_builder_column_custom_class', 'do_shortcode' );
        add_filter( 'fl_builder_module_custom_class', 'do_shortcode' );
    }

    public function convertNumbers($string) {
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $arabic = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١','٠'];

        $num = range(0, 9);
        $convertedPersianNum = str_replace($persian, $num, $string);
        $englishNumbersOnly = str_replace($arabic, $num, $convertedPersianNum);

        return $englishNumbersOnly;
    }

    public function gregorian_to_jalali($gy,$gm,$gd,$mod='')
    {
        $g_d_m=array(0,31,59,90,120,151,181,212,243,273,304,334);

        if ( $gy>1600 ) {
            $jy=979;
            $gy-=1600;
        } else {
            $jy=0;
            $gy-=621;
        }

        $gy2=($gm>2)?($gy+1):$gy;
        $days=(365*$gy) +((int)(($gy2+3)/4)) -((int)(($gy2+99)/100)) +((int)(($gy2+399)/400)) -80 +$gd +$g_d_m[$gm-1];
        $jy+=33*((int)($days/12053));
        $days%=12053;
        $jy+=4*((int)($days/1461));
        $days%=1461;

        if( $days > 365 ) {
            $jy+=(int)(($days-1)/365);
            $days=($days-1)%365;
        }

        $jm=($days < 186)?1+(int)($days/31):7+(int)(($days-186)/30);
        $jd=1+(($days < 186)?($days%31):(($days-186)%30));

        return($mod=='')?array($jy,$jm,$jd):$jy.$mod.$jm.$mod.$jd;
    }


    public function jalali_to_gregorian($jy,$jm,$jd,$mod='')
    {
        if( $jy>979 ) {
            $gy=1600;
            $jy-=979;
        } else {
            $gy=621;
        }

        $days=(365*$jy) +(((int)($jy/33))*8) +((int)((($jy%33)+3)/4)) +78 +$jd +(($jm<7)?($jm-1)*31:(($jm-7)*30)+186);
        $gy+=400*((int)($days/146097));
        $days%=146097;

        if( $days > 36524 ) {
            $gy+=100*((int)(--$days/36524));
            $days%=36524;
            if($days >= 365)$days++;
        }

        $gy+=4*((int)($days/1461));
        $days%=1461;

        if( $days > 365 ) {
            $gy+=(int)(($days-1)/365);
            $days=($days-1)%365;
        }

        $gd=$days+1;
        foreach( array(0,31,(($gy%4==0 and $gy%100!=0) or ($gy%400==0))?29:28 ,31,30,31,30,31,31,30,31,30,31) as $gm => $v ) {
            if($gd<=$v)break;
            $gd-=$v;
        }

        return($mod=='')?array($gy,$gm,$gd):$gy.$mod.$gm.$mod.$gd;
    }

    public function filter_posts_by_date( $query ) {

        if ( !is_archive() || !$query->is_main_query() || is_admin() ) {
            return;
        }

        if ( empty( $_GET['dvstyear'] ) || empty( $_GET['dvendyear'] ) ) {
            return;
        }

        if ( empty( $_GET['dvstmonth'] ) || empty( $_GET['dvendmonth'] ) ) {
            $_GET['dvstmonth'] = 1;
            $_GET['dvendmonth']= 12;
        }

        if ( empty( $_GET['dvstday'] ) || empty( $_GET['dvendday'] ) ) {
            $_GET['dvstday'] = 1;
            $_GET['dvendday']= 30;
        }

        //If date is jalali
        if( (strpos($_GET['dvstyear'],'13') === 0 ) || (strpos($_GET['dvstyear'],'14') === 0) )   {

            $startDateArr = $this->jalali_to_gregorian(intval($_GET['dvstyear']),intval($_GET['dvstmonth']),intval($_GET['dvstday']));
            $endDateArr = $this->jalali_to_gregorian(intval($_GET['dvendyear']),intval($_GET['dvendmonth']),intval($_GET['dvendday']));

            $startYear = intval($startDateArr[0]);
            $startMonth = intval($startDateArr[1]);
            $startDay = intval($startDateArr[2]);

            $endYear = intval($endDateArr[0]);
            $endMonth = intval($endDateArr[1]);
            $endDay = intval($endDateArr[2]);

        } else {


            $startYear = intval($_GET['dvstyear']);
            $startMonth = intval($_GET['dvstmonth']);
            $startDay = intval($_GET['dvstday']);

            $endYear = intval($_GET['dvendyear']);
            $endMonth = intval($_GET['dvendmonth']);
            $endDay = intval($_GET['dvendday']);

        }

        $query->set('date_query', array(
                array(
                    'after' => array(
                        'year' => $startYear,
                        'month' => $startMonth,
                        'day' => $startDay,
                    ),
                    'before' => array(
                        'year' => $endYear,
                        'month' => $endMonth,
                        'day' => $endDay,
                    ),
                    'inclusive' => true
                ),
            )
        );

        if ( !empty($_GET['search']) ) {
            $query->set('s', esc_sql($_GET['search']));
        }
    }

    public function add_meta_tags()
    {
        echo '<!-- Web Designer: Dadevarzan co. www.dadevarzan.com -->' . "\n";
		
        $accentColor = get_theme_mod('fl-accent');

        if ( empty($accentColor) ) {
            return;
        }

        echo '<meta name="theme-color" content="'.esc_attr($accentColor).'">' . "\n";
    }

    public function date_filter_form( $atts )
    {
        extract(shortcode_atts(array(
            'post_type' => 'post',
        ), $atts));

        $postsList = get_posts( array(
            'posts_per_page' => 1,
            'post_type' => $post_type,
            'order'          => 'ASC',
            'orderby'        => 'publish_date'
        ) );

        if ( $postsList ) {
            foreach ( $postsList as $post ) :
                $start_post_year = get_the_date( 'Y' , $post);
            endforeach;
        }

        $postsList = get_posts( array(
            'posts_per_page' => 1,
            'post_type' => $post_type,
            'order'          => 'DESC',
            'orderby'        => 'publish_date'
        ) );

        if ( $postsList ) {
            foreach ( $postsList as $post ) :
                $end_post_year = get_the_date( 'Y' , $post);
            endforeach;
        }

        if( empty($start_post_year) || empty($end_post_year) ) {
            return '';
        }

        $start_post_year = $this->convertNumbers($start_post_year);
        $end_post_year = $this->convertNumbers($end_post_year);

        $return  = '<form method="get" class="dv-filter-form" role="search" >
                    <div class="dv-filter-start">
                        <select class="dv-filter-year form-control" name="dvstyear">
                        <option value=""> '.__( 'From Year', 'dadevarzan-wp-common' ).'</option>';
                        for( $i = intval($start_post_year); $i <= intval($end_post_year); $i++ ) {
                            if(!empty($_GET['dvstyear']) && (intval($_GET['dvstyear']) === $i)) {
                                $return  .= '<option value="'.esc_attr($i).'" selected>'.esc_html($i).'</option>';
                            } else {
                                $return  .= '<option value="'.esc_attr($i).'">'.esc_html($i).'</option>';
                            }
                        }

                        $return  .= '</select>
                        <select class="dv-filter-month form-control" name="dvstmonth">
                            <option value="">'.__( 'From Month', 'dadevarzan-wp-common' ).'</option>';
                            for( $i = 1; $i <= 12; $i++ ) {
                                if(!empty($_GET['dvstmonth']) && (intval($_GET['dvstmonth']) === $i)) {
                                    $return  .= '<option value="'.esc_attr($i).'" selected>'.esc_html($i).'</option>';
                                } else {
                                    $return  .= '<option value="'.esc_attr($i).'">'.esc_html($i).'</option>';
                                }
                            }
                    $return  .= '</select>
                    </div>
                    <div class="dv-filter-end">
                        <select class="dv-filter-year form-control" name="dvendyear">
                        <option value=""> '.__( 'To Year', 'dadevarzan-wp-common' ).'</option>';
                        for( $i = intval($start_post_year); $i <= intval($end_post_year); $i++ ) {
                            if(!empty($_GET['dvendyear']) && (intval($_GET['dvendyear']) === $i)) {
                                $return  .= '<option value="'.esc_attr($i).'" selected>'.esc_html($i).'</option>';
                            } else {
                                $return  .= '<option value="'.esc_attr($i).'">'.esc_html($i).'</option>';
                            }
                        }

                        $return  .= '</select>
                        <select class="dv-filter-month form-control" name="dvendmonth">
                            <option value="">'.__( 'To Month', 'dadevarzan-wp-common' ).'</option>';
                            for( $i = 1; $i <= 12; $i++ ) {
                                if(!empty($_GET['dvendmonth']) && (intval($_GET['dvendmonth']) === $i)) {
                                    $return  .= '<option value="'.esc_attr($i).'" selected>'.esc_html($i).'</option>';
                                } else {
                                    $return  .= '<option value="'.esc_attr($i).'">'.esc_html($i).'</option>';
                                }
                            }
                    $return  .= '</select>
                    </div>
                    <input type="search" class="dv-filter-search-input form-control" name="search" value="'.esc_attr( $_GET['search'] ).'" placeholder="'.esc_attr( __('Search', 'dadevarzan-wp-common') ).'" />
                    <button class="dv-search-submit form-control" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>';

        return $return;
    }

    public function blog_info( $atts )
    {
        extract(shortcode_atts(array(
            'info' => '',
        ), $atts));

        if ( empty($info) ) {
            return '';
        }

        return get_bloginfo($info);
    }

    public function list_child_pages()
    {

        global $post;

        if ( !is_page() ) {
            return '';
        }

        $string = '';
        if ( $post->post_parent )
        {
            $child_pages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0&depth=1' );
        }
        else
        {
            $child_pages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0&depth=1' );
        }

        if ( $child_pages ) {
            $string = '<ul class="dv-sub-pages">' . $child_pages . '</ul>';
        }

        return $string;
    }

    public function list_custom_taxonomy( $atts )
    {
        global $post;
        extract( shortcode_atts( array(
            'slug' => '',
            'field' => '',
            'seperator' => ',',
        ), $atts ) );

        if ( empty($slug) ) {
            return '';
        }
		
		if ( !empty($field) ) {
			$term_obj_list = get_the_terms( $post->ID, $slug );
			$string = join($seperator, wp_list_pluck($term_obj_list, $field));
			return $string;
		}

        $string = '<ul class="dv-tax dv-tax-'.esc_attr($slug).'">';
        $string .= get_the_term_list( $post->ID , $slug, '<li>', '</li><li>', '</li>' );
        $string .= '</ul>';

        return $string;
    }

    public function list_all_custom_taxonomy( $atts )
    {
        extract( shortcode_atts( array(
            'taxonomy' => '',
        ), $atts ) );

        if ( empty($taxonomy) ) {
            return '';
        }
		
		$terms = wp_list_categories( array(
				'echo'     => false,
				'taxonomy' => $taxonomy,
				'hierarchical' => true,
				'title_li' => '',
				'separator' => '</li><li>',
			) );		
		
		
		if ( empty( $terms ) ){
            return '';
		}		

		$string = '<ul class="dv-all-tax dv-tax-'.esc_attr($taxonomy).'">';
		$string .= $terms;
		$string .= '</ul>';
        return $string;
    }

    public function add_powered_by_shortcode( $atts )
    {
        $category = '';

        extract( shortcode_atts( array(
            'category' => 'general',
        ), $atts ) );

        switch ( $category ) {
            case 'industrial':
                $title = __('Industrial web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/industrial/';
                break;

            case 'company':
            case 'corporational':
                $title = __('Company web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/corporational/';
                break;

            case 'organizational-portal':
            case 'organizational':
                $title = __('Organizational Portals', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/organizational-portal/';
                break;

            case 'university':
                $title = __('University web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/university/';
                break;

            case 'holding':
                $title = __('Holding web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/holding/';
                break;

            case 'construction':
                $title = __('Construction web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/corporational/construction/';
                break;

            case 'trading':
                $title = __('Trading web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/corporational/trading/';
                break;

            case 'research-institute':
                $title = __('Research institute web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/research-institute/';
                break;

            case 'shop':
                $title = __('Shop web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/shop/';
                break;

            case 'factories':
                $title = __('Factories web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/factories/';
                break;

            case 'manufacture':
                $title = __('Manufacture web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/manufacture/';
                break;

            case 'government':
                $title = __('Government web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/government/';
                break;

            case 'pharmacy':
                $title = __('Pharmacy web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/pharmacy/';
                break;

            case 'medicinal-plants':
                $title = __('Medicinal plants web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/medicinal-plants/';
                break;

            case 'corporational-pharmaceutical':
                $title = __('Corporational pharmaceutical web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/corporational/pharmaceutical/';
                break;

            case 'industrial-pharmacy':
                $title = __('Industrial pharmacy web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/industrial/pharmacy/';
                break;

            case 'medical-equipment':
                $title = __('Medical equipment web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/medical-equipment/';
                break;

            case 'dental':
                $title = __('Dental web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/dental/';
                break;

            case 'medical-doctors':
                $title = __('Medical doctors web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/medical-doctors/';
                break;

            case 'clinic':
                $title = __('Clinic web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/clinic/';
                break;

            case 'hospital':
                $title = __('Hospital web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/hospital/';
                break;

            case 'petrochemical-petroleum':
                $title = __('Petrochemical petroleum web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/petrochemical-petroleum/';
                break;

            case 'agricultural':
                $title = __('Agricultural web design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/agricultural/';
                break;
            case 'general':
            default:
                $title = __('Web Design', 'dadevarzan-wp-common');
                $url = 'https://www.dadevarzan.com/web-design/';
                break;
        }

        return '<div class="dadevarzan-powered-by">
                    <span class="dadevarzan-powered-links">'.$title.__('by', 'dadevarzan-wp-common').'  
                        <a href="https://www.dadevarzan.com/" target="_blank">'.__('Dadevarzan Co.', 'dadevarzan-wp-common').'</a>&nbsp;
                    </span>
                    <svg version="1.1" id="dv_power_by_layer_1" class="power-by-image-container" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px" width="534.525px" height="155.305px" viewBox="0 0 534.525 155.305" enable-background="new 0 0 534.525 155.305"
                         xml:space="preserve">
                    <path class="dv-logo dv-dadevarzan" d="M332.087,62.928c22.708-0.618,38.415,0.518,51.692,8.843c4.035,2.53,8.203,6.484,10.525,10.704
                        c0.396,0.719,1.929,3.158,2.807,6.748c0.546,0,1.325,0,1.871,0c0-0.078,0-0.155,0-0.233c0.078,0,0.156,0,0.234,0
                        c0-8.531,0-17.298,0-25.829c9.121,0,18.011,0.234,27.132,0.234c6.661,0,13.586-0.187,18.478,1.629
                        c0-12.951-0.234-26.14-0.234-39.092c2.005-0.711,3.816-1.612,6.081-2.327c0,14.503,0,29.009,0,43.512
                        c2.832,1.127,5.635,3.026,7.851,4.948c5.194,4.503,8.777,11.017,11.095,18.322c0.234,1.551,0.468,3.103,0.702,4.654
                        c0.72,3.022,1.264,7.87,0.468,11.402c-0.672,2.981-0.838,5.434-2.105,8.842c-0.691,1.858-1.718,3.433-2.573,5.584
                        c1.073-0.573,10.326-5.864,11.695-6.748c0-33.968,0-68.181,0-102.149c1.948-0.887,3.319-1.563,5.847-2.327
                        c0,17.837,0,35.914,0,53.751c6.157-0.067,14.502-0.612,19.881,0.465c14.124,2.828,21.557,8.935,27.132,20.011
                        c2.444,4.857,4.759,15.901,3.509,23.036c-0.731,4.171-1.757,7.905-3.275,11.401c-4.949,11.401-15.558,17.113-27.6,23.968
                        c-5.051,2.875-20.16,11.859-22.204,13.037c-0.936,0-11.634-0.007-11.478-0.007c3.078-1.906,27.793-16.113,35.319-20.708
                        c5.887-3.594,11.802-7.153,16.373-12.102c4.307-4.663,4.519-7.072,5.847-11.169c0.39-2.016,0.78-4.033,1.169-6.05
                        c0.868-3.932-0.128-10.117-0.936-12.798c-3.693-12.264-10.778-19.612-22.922-22.338c-5.7-1.28-13.864-0.943-20.583-0.932
                        c0,8.298,0,16.833,0,25.131c8.928-0.036,16.12-1.524,19.044,4.834c0.677,1.473,0.866,3.868,0.136,5.637
                        c-1.396,3.382-4.732,4.231-7.719,6.05c-5.005,3.047-75.891,43.644-77.186,44.443c-4.132,0-7.797,0-11.929,0c0-0.078,0-0.155,0-0.233
                        c0.078,0,0.156,0,0.234,0c2.304-1.265,40.097-23.456,42.804-25.13c4.774-2.953,8.765-7.305,11.695-12.099
                        c1.902-3.113,2.821-7.185,3.742-11.169c1.485-6.42-0.294-14.357-2.105-18.616c-3.835-9.018-9.789-14.515-19.647-17.684
                        c-4.254-1.368-9.668-1.163-15.203-1.163c-7.64,0-15.048,0-22.688,0c0,8.298,0,16.833,0,25.131c6.86,0,13.489,0,20.349,0
                        c3.137,0,7.427-0.516,9.824,0.465c2.09,0.855,4.055,3.047,4.678,5.352c0.632,2.337-0.371,5.109-1.17,6.282
                        c-1.269,1.866-73.081,42.134-77.654,44.908c-1.946,1.181-5.019,3.254-7.223,3.956c-1.715,0-12.522,0.349-16.167-0.465
                        c-10.527-2.351-18.449-6.628-23.858-13.961c-1.699-2.303-3.332-4.867-4.678-7.446c-0.574-1.1-0.821-3.103-1.871-3.723
                        c-1.396,2.043-37.481,25.233-38.593,25.595c-3.976,0-7.953,0-11.929,0c0-0.078,0-0.155,0-0.233c0.078,0,0.156,0,0.234,0
                        c1.298-1.18,42.661-23.346,52.393-37.229c2.462-3.512,4.543-7.362,5.847-12.1c2.078-7.546-0.97-17.412-3.742-21.872
                        c-4.028-6.48-10.323-11.113-18.478-13.496c-4.182-1.222-11.012-1.038-14.969,0.233c-10.238,3.287-16.518,9.602-20.115,19.545
                        c-1.517,4.192-1.822,10.896-0.702,15.59c0.818,3.426,2.381,6.384,3.976,9.075c3.558-1.644,10.419-4.919,12.205-8.163
                        c0.598-1.086,1.587-2.3,1.126-6.03c-1.2,0.284-3.036-0.032-3.463-0.28c-5.01-2.907-3.298-8.223,0.423-10.191
                        c1.403-0.838,3.212-0.121,4.21,0.465c2.894,1.701,7.192,6.756,4.444,15.124c-1.011,3.079-3.027,6.407-5.38,8.144
                        c-3.975,2.934-66.986,38.469-72.508,41.651c-0.358-0.022-8.002-0.037-12.055-0.037c0.197,0.002,64.274-36.95,65.674-37.862
                        c-0.828-1.524-2.231-3.965-3.097-6.079c-1.289-3.144-2.674-10.685-2.045-16.124c0.263-2.272,1.064-4.493,1.343-6.679
                        c-0.078,0-114.256,65.498-116.481,66.781c-4.619,0-11.069-0.076-12.003-0.037c1.733-0.993,86.017-49.183,87.085-49.991
                        c0-10.315,0-20.866,0-31.181c-0.078,0-0.156,0-0.234,0c-1.316,1.17-142.214,80.67-143.145,80.975c-1.637,0-1.638,0-3.275,0
                        c-3.986,0.001-9.083,0.568-12.63-0.233c-0.936,0-1.871,0-2.807,0c-3.208-0.733-6.57-0.864-9.59-1.862
                        c-13.512-4.462-23.671-12.455-30.626-23.418c-2.752-4.339-4.589-9.216-6.31-14.49c-2.824-8.652-2.706-21.939-0.02-30.035
                        C7.87,67.742,18.279,56.205,34.802,49.433c3.212-1.317,6.781-1.912,10.292-2.792c1.793-0.155,3.587-0.31,5.38-0.465
                        c1.104-0.396,2.467-1.996,3.488-2.625c2.692-1.659,5.832-2.659,9.376-3.192c5.295-0.797,10.299,0.307,12.864,1.394
                        c7.593,3.217,11.604,7.659,14.502,15.589c0.795,2.174,1.813,7.074,1.169,10.474c-0.216,1.14-0.501,2.321-0.702,3.723
                        c5.067-2.852,9.8-5.538,24.092-13.728c0-11.866,0-23.969,0-35.834c0.889-0.402,5.601-2.515,5.847-2.327
                        c0.09,3.114,0,74.773,0,98.659c0.156,0,27.03-14.749,27.366-15.358c-0.029-23.616-0.209-75.951-0.234-94.935
                        c2.027-0.853,4.054-1.706,6.081-2.559c0,14.58,0,29.398,0,43.978c0.078,0,0.156,0,0.234,0c6.054-9.202,22.603-13.232,33.448-5.12
                        c4.986,3.729,8.225,7.511,10.058,14.422c0.48,1.811,1.086,6.206,0.702,8.847c-0.459,3.156-0.782,5.417-2.105,7.911
                        c0.078,0,0.156,0,0.234,0c1.404-1.666,15.031-8.939,19.647-11.169c0,12.564,0,25.131,0,37.695c0.156,0,37.97-21.231,39.529-22.338
                        c2.673-3.224,4.99-5.584,6.549-7.212c6.49-5.787,18.991-11.552,31.81-7.912c6.228,1.768,11.877,4.607,15.905,8.609
                        c1.304,1.296,2.89,2.716,3.976,4.188c0.81,1.098,1.313,2.868,2.573,3.49c2.059-2.98,6.054-5.499,9.356-7.213
                        c1.871-0.776,3.976-1.551,5.847-2.327C332.087,68.591,332.087,65.642,332.087,62.928z M66.582,45.888
                        c-7.386,0-18.58,6.139-18.715,19.229c-0.108,10.517,9.439,19.1,18.715,19.1c8.414,0,19.398-6.497,19.398-18.931
                        C85.981,53.367,76.819,45.888,66.582,45.888z M154.927,65.52c0.193,9.822,8.357,18.892,20.1,18.464
                        c8.671-0.317,18.775-7.713,17.996-21.034c-0.478-8.166-8.579-17.195-19.632-17.061C161.304,46.035,154.745,56.251,154.927,65.52z
                         M38.779,54.32c-2.742,1.002-5.949,2.225-8.42,3.723c-7.766,4.706-13.661,10.639-18.232,18.462
                        c-1.993,3.412-4.012,8.609-5.142,13.088c-1.698,6.73-1.453,18.456,0.686,24.992c5.386,16.462,16.254,27.471,32.746,32.808
                        c2.429,0.786,5.229,1.069,7.719,1.629c5.525,1.242,13.207,0.224,17.542-0.696c2.312-0.491,3.761-1.107,5.613-1.863
                        c5.086-2.077,42.336-23.579,43.973-24.432c0-19.078,0-38.396,0-57.474c-0.078,0-24.278,13.922-25.729,14.893
                        c0,8.841-0.078,17.685,0,26.292c-2.586,1.438-5.062,2.762-7.017,3.957c-2.622,1.602-5.053,2.894-7.719,4.422
                        c-7.348,4.213-19.681,6.546-29.471,3.722c-9.232-2.663-15.136-10.008-18.478-20.244c-1.079-3.306-1.618-9.101-0.936-13.728
                        c0.405-2.468,0.624-4.188,2.092-7.442c1.986-4.669,4.57-8,7.96-11.142c1.166-1.081,5.072-3.717,6.544-4.674
                        c0.432-3.134,1.128-4.723,2.584-7.922C43.568,52.924,42.325,53.024,38.779,54.32z M338.402,68.745c0,6.825,0,13.885,0,20.71
                        c0,2.914-0.378,7.069,0.468,9.54c0.431,1.258,1.434,2.242,2.105,3.258c0.156,0,0.312,0,0.468,0
                        c2.076-2.742,7.423-2.364,10.058-0.465c0.998,0.719,1.859,1.78,2.319,2.997c2.498,6.607-1.57,10.42-6.295,11.195
                        c-3.465,0.569-7.157-1.947-8.186-4.42c-0.47-1.129-0.397-2.153-0.468-3.489c-0.468-0.31-1.403-1.088-1.871-1.398
                        c-1.417-1.355-2.469-2.979-3.275-4.885c-1.961-4.637-1.081-17.605-1.169-24.433c-0.156,0-0.312,0-0.468,0
                        c-0.947,0.82-2.634,1.19-3.742,1.863c-2.25,1.365-7.251,5.086-8.888,7.677c1.407,2.682,1.869,4.751,2.105,6.517
                        c1.548,11.617-1.542,19.28-5.145,25.13c-1.185,1.924-2.637,4.319-4.21,6.048c1.114,2.327,1.976,5.562,3.274,7.681
                        c3.478,5.679,8.146,11.44,14.502,14.194c2.302,0.997,4.925,1.721,7.485,2.327c9.572,2.265,17.035-2.43,22.22-5.582
                        c12.965-7.881,24.146-17.868,30.173-32.578c1.286-3.138,2.003-6.022,2.339-9.771c0.412-4.596,0.171-11.42-4.912-18.152
                        C379.151,71.93,363.236,68.611,338.402,68.745z"/>
                    </svg>
                </div>';
    }

}

