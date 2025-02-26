<?php

global $Application_Maker, $oThis;
if (!class_exists('setInBodyCategorySelectCls')) {

    class setInBodyCategorySelectCls extends Application_Maker_setField {

        public function __construct() {
            $this->fieldtype = "setInBodyCategorySelect";
            $this->hasSaveField = true;
            $this->AbortGlobalSave = false;
            $this->classSubActions = array('getCategoriesList');
        }

        public function getCategoriesDepth($cat) {
            // var_dump($cat->name . ' - ' . $cat->cat_ID . ' - ' . $cat->parent . ' / ' . intval($cat->parent));
            //  echo '<br>varump cat initial';
            //  var_dump($cat);
            if (intval($cat->parent) !== 0) {
                //  var_dump('above zero, go find par');
                $CatPar = $cat->parent;
                $cou = $this->getCategoriesDepthSub($cat->cat_ID, $CatPar, 0, $cat->taxonomy);
                return $cou;
            } else {
                return 0;
            }
        }

        public function getCategoriesDepthSub($id, $par_id, $cou, $taxo) {

            $args = array(
                'hide_empty' => 0,
                'taxonomy' => $taxo,
                //'hierarchical' => 1,taxonomy
                'include' => $par_id
                    //cat15_colors_cat
            );
            $catpar = get_categories($args);
            $catpar = $catpar[0];

            $newparid = $catpar->parent;
            $cou +=1;

            if (intval($catpar->parent) !== 0) {
                $cou = $this->getCategoriesDepthSub($catpar->cat_ID, $catpar->parent, $cou, $taxo);
                return $cou;
            } else {
                return $cou;
            }
        }

        public function getCategoriesChildsList($cat, $cate, $categs2) {
            $findsubarg = array(
                'taxonomy' => $cate,
                'hide_empty' => 0,
                'hierarchical' => 1,
                'orderby' => 'name',
                'parent' => $cat->cat_ID,
                'order' => 'ASC'
            );
            $findsubcategs = get_categories($findsubarg);
            /* if (count($findsubcategs) > 0) {
              echo 'GOT CHILDS*************************' . count($findsubcategs);
              } */
            $subcat = $findsubcategs; //$this->getCategoriesChildsList($cat, $cate);
            if (count($subcat) > 0) {
                foreach ($subcat as $sk => $scat) {
                    $scatt = array();
                    $scar = get_objects_in_term($scat->cat_ID, $cate);
                    $sc = count($scar);
                    $scatt['id'] = $scat->cat_ID;
                    $scatt['name'] = $scat->name;
                    $scatt['count'] = $sc;
                    $scatt['depth'] = $this->getCategoriesDepth($scat);
                   // echo ' / subname ' . $scat->name . ' / sub cat_ID ' . $scat->cat_ID;
                    $categs2[] = $scatt;
                    $testsubarg = array(
                        'taxonomy' => $cate,
                        'hide_empty' => 0,
                        'hierarchical' => 1,
                        'orderby' => 'name',
                        'parent' => $scat->cat_ID,
                        'order' => 'ASC'
                    );
                    $testsubcategs = get_categories($testsubarg);
                    if (count($testsubcategs) > 0) {
                        $categs2 = $this->getCategoriesChildsList($scat, $cate, $categs2);
                    }
                }
            }
            return $categs2;
        }

        public function getCategoriesList() {

            $type = $_POST['type'];
            $field = $_POST['field'];
            $cate = $_POST['name'];
            $args = array(
                'taxonomy' => $cate,
                'hide_empty' => 0,
                'hierarchical' => 1,
                'parent' => 0,
                'orderby' => 'name',
                'order' => 'ASC'
            );
            $categs = get_categories($args);
            $categs2 = array();
            foreach ($categs as $k => $cat) {
                $catt = array();
                $car = get_objects_in_term($cat->cat_ID, $cate);
                $c = count($car);
                $catt['id'] = $cat->cat_ID;
                $catt['name'] = $cat->name;
                $catt['count'] = $c;
                $catt['depth'] = $this->getCategoriesDepth($cat);
                $categs2[] = $catt;
                $categs2 = $this->getCategoriesChildsList($cat, $cate, $categs2);
                /* $subcat = $this->getCategoriesChildsList($cat,$cate);
                  var_dump($subcat);
                  if (count($subcat) > 0) {
                  foreach ($subcat as $sk => $scat) {
                  $scatt = array();
                  $scar = get_objects_in_term($scat->cat_ID, $cate);
                  $sc = count($scar);
                  $scatt['id'] = $scat->cat_ID;
                  $scatt['name'] = $scat->name;
                  $scatt['count'] = $sc;
                  $scatt['depth'] = $this->getCategoriesDepth($scat);
                  echo ' / subname '.$scat->name.' / sub cat_ID '.$scat->cat_ID;
                  $categs2[] = $scatt;
                  }
                  } */
            };
            /* var_dump($categs);
              6 =>
              object(stdClass)[515]
              public 'term_id' => &string '196' (length=3)
              public 'name' => &string 'SELECT TYPE BAGS-----' (length=21)
              public 'slug' => &string 'select-type-bags' (length=16)
              public 'term_group' => string '0' (length=1)
              public 'term_taxonomy_id' => string '208' (length=3)
              public 'taxonomy' => string 'cat15_colors_cat' (length=16)
              public 'description' => &string '' (length=0)
              public 'parent' => &string '0' (length=1)
              public 'count' => &string '0' (length=1)
              public 'cat_ID' => &string '196' (length=3)
              public 'category_count' => &string '0' (length=1)
              public 'category_description' => &string '' (length=0)
              public 'cat_name' => &string 'SELECT TYPE BAGS-----' (length=21)
              public 'category_nicename' => &string 'select-type-bags' (length=16)
              public 'category_parent' => &string '0' (length=1) */
            $return = array(
                'category' => $cate,
                'field' => $field,
                'data' => $categs2,
            );
            echo json_encode($return);
        }

        public function getField($oThis, $config, $post, $meta_marker) {
            $this->init($oThis, $config, $post, $meta_marker);
            // print_r($oThis);exit();
            $str = "<div class='c_field_container c_InBodyCategorySelect' data-field_type='setInBodyCategorySelect'
                     data-fwidthCls='" . $config['fwidthCls'] . "'
                     data-field='" . $config['field'] . "'
                     data-value ='" . $config['value'] . "'
                     data-label ='" . $config['label'] . "'
                     data-category='" . $config['field_config']['category'] . "'
                     data-meta_marker='" . $meta_marker . "'></div>";
            return $str; //'test'.$this->meta_marker."**".$this->add_image;
        }

        public function getColumnData($meta, $field, $post_id) {
            // var_dump($field);
            $taxonomies = $field['field_config']['category'];
            // echo $post_id . '++taxonomies ' . $taxonomies;
            //$metao = wp_get_object_terms($post_id, $taxonomies);
            $t = get_term($meta, $taxonomies);
            //var_dump($t);
            return $t->name; //$metao[0]->name;
        }

        public function saveField($post_id, $key, $meta_marker, $data, $field) {
            //echo $post_id."//".$key."**".$data;
            if (wp_is_post_autosave($post_id) || wp_is_post_revision($post_id)) {
                return $post_id;
            }
            $cat = $field['field_config']['category'];
            $data = intval($data);
            wp_set_object_terms($post_id, array($data), $cat);
            return $data;
        }

    }

}

$oThis->extension_class_instances['setInBodyCategorySelect'] = new setInBodyCategorySelectCls();
?>
