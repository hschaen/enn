<?php
  add_shortcode( 'wpdreams_ajaxsearchpro', 'add_ajaxsearchpro');
  
  function search_stylesheets() {
    global $wpdb;
    if (isset($wpdb->base_prefix)) {
      $_prefix = $wpdb->base_prefix;
    } else {
      $_prefix = $wpdb->prefix;
    }
    $search = $wpdb->get_results("SELECT * FROM ".$_prefix."ajaxsearchpro", ARRAY_A);
    if (is_array($search)) {
      foreach ($search as $s) {
        wp_enqueue_style('wpdreams-ajaxsearchpro'.$s['id'], plugins_url('css/style'.$s['id'].'.css' , dirname(__FILE__)), false);
      }
    }
  }     
  add_action('wp_print_styles', 'search_stylesheets'); 
  
  function add_ajaxsearchpro( $atts ) {
    ob_start();
    $style = null;
  	extract( shortcode_atts( array(
  		'id' => 'something'
  	), $atts ) );    
    if (isset($_POST['action']) && $_POST['action']=="ajaxsearchpro_preview") {
      require_once(AJAXSEARCHPRO_PATH."/settings/types.inc.php");
      parse_str($_POST['formdata'], $_t);
      foreach ($_t as $k=>$v) {
        $_tmp = explode("_".$id, $k);
        if (strpos($v, "||")!==false) {
          $__tmp = explode('||', $v);
          $v = trim(str_replace("\n","",$__tmp[1]));                              
        }
        $_t[$_tmp[0]] = $v;
      }
      /*foreach ($_t as $k=>$v) {
        $_tmp = explode('classname-', $k);
        if ($_tmp!=null && count($_tmp)>1) {
          ob_start();
          $c = new $v('0', '0', $_t[$_tmp[1]]);
          $out = ob_get_clean();
          $_t['selected-'.$_tmp[1]] = $c->getSelected();
        }
      }*/
      $style = $_t;
      $file = AJAXSEARCHPRO_PATH."/css/style-preview".$id.".css";
    } else {
      global $wpdb;
      global $wpdreams_ajaxsearchpros;
      if (isset($wpdb->base_prefix)) {
        $_prefix = $wpdb->base_prefix;
      } else {
        $_prefix = $wpdb->prefix;
      }
      $search = $wpdb->get_results("SELECT * FROM ".$_prefix."ajaxsearchpro WHERE id=".$id, ARRAY_A);
      if (!isset($search[0])) {
        echo "This search form does not exist!";
        $return = ob_get_clean();
        return $return;
      }
      /*if (isset($search[0]['id']) && isset($wpdreams_ajaxsearchpros[$search[0]['id']])) {
        echo "This search form is already on the page! You cannot use the same form twice on one page!";
        $return = ob_get_clean();
        return $return;
      } */
      $wpdreams_ajaxsearchpros[$search[0]['id']] = 1;
      $search[0]['data'] = json_decode($search[0]['data'], true);

      $style = $search[0]['data'];
      $file = AJAXSEARCHPRO_PATH."/css/style".$id.".css";
    }    
    $style['mtop'] = "300px";
    ob_start();
    include(AJAXSEARCHPRO_PATH."/css/style.css.php");
  	$out = ob_get_contents();
  	ob_end_clean();
    file_put_contents($file, $out, FILE_TEXT);   
    if (isset($_POST['action']) && $_POST['action']=="ajaxsearchpro_preview") {
    ?>
    <style>
        @import url('<?php echo plugin_dir_url(__FILE__); ?>../css/style-preview<?php echo $id; ?>.css?r=<?php echo rand(1, 123123123); ?>');
    </style>
    <?php
    }
 
    $settingsHidden = ((
      $style['showexactmatches']!=1 &&
      $style['showsearchintitle']!=1 &&
      $style['showsearchincontent']!=1 &&
      $style['showsearchinexcerpt']!=1 &&
      $style['showsearchinposts']!=1 &&
      $style['showsearchinpages']!=1 &&
      $style['showsearchinproducts']!=1 &&
      $style['showsearchinbpusers']!=1 &&
      $style['showsearchinbpgroups']!=1 &&
      $style['showsearchinbpforums']!=1 &&
      count($style['selected-showcustomtypes'])<=0
      )?true:false);
    ?>
    <div id='ajaxsearchpro<?php echo $id; ?>'>
         <div class="probox">
              <div class='proinput'>
                <input type='text' class='orig' name='phrase' value='' />
                <input type='text' class='autocomplete' name='phrase' value='' />
                <span class='loading'></span>
              </div>
              <div class='promagnifier'>
              </div>
              <div class='prosettings' <?php echo ($settingsHidden?"style='display:none;'":""); ?>opened=0>
              </div>
              <div class='proloading'>
              </div>                            
         </div>
         <div id='ajaxsearchprosettings<?php echo $id; ?>' class="searchsettings">
          <form name='options'>
             <div class="option<?php echo (($style['showexactmatches']!=1)?" hiddend":""); ?>">
              	<input type="checkbox" value="checked" id="set_exactonly<?php echo $id; ?>" name="set_exactonly" <?php echo (($style['exactonly']==1)?'checked="checked"':''); ?>/>
              	<label for="set_exactonly<?php echo $id; ?>"></label>
             </div>            
             <div class="label<?php echo (($style['showexactmatches']!=1)?" hiddend":""); ?>">
                <?php echo $style['exactmatchestext']; ?>
             </div>
             <div class="option<?php echo (($style['showsearchintitle']!=1)?" hiddend":""); ?>">
              	<input type="checkbox" value="None" id="set_intitle<?php echo $id; ?>" name="set_intitle" <?php echo (($style['searchintitle']==1)?'checked="checked"':''); ?>/>
              	<label for="set_intitle<?php echo $id; ?>"></label>
             </div>
             <div class="label<?php echo (($style['showsearchintitle']!=1)?" hiddend":""); ?>">
                <?php echo $style['searchintitletext']; ?>
             </div> 
             <div class="option<?php echo (($style['showsearchincontent']!=1)?" hiddend":""); ?>">
              	<input type="checkbox" value="None" id="set_incontent<?php echo $id; ?>" name="set_incontent" <?php echo (($style['searchincontent']==1)?'checked="checked"':''); ?>/>
              	<label for="set_incontent<?php echo $id; ?>"></label>
             </div>
             <div class="label<?php echo (($style['showsearchincontent']!=1)?" hiddend":""); ?>">
                <?php echo $style['searchincontenttext']; ?>
             </div>
             <div class="option<?php echo (($style['showsearchincomments']!=1)?" hiddend":""); ?>">
              	<input type="checkbox" value="None" id="set_incomments<?php echo $id; ?>" name="set_incomments" <?php echo (($style['searchincomments']==1)?'checked="checked"':''); ?>/>
              	<label for="set_incomments<?php echo $id; ?>"></label>
             </div>
             <div class="label<?php echo (($style['showsearchincomments']!=1)?" hiddend":""); ?>">
                <?php echo $style['searchincommentstext']; ?>
             </div>
             <div class="option<?php echo (($style['showsearchinexcerpt']!=1)?" hiddend":""); ?>">
              	<input type="checkbox" value="None" id="set_inexcerpt<?php echo $id; ?>" name="set_inexcerpt" <?php echo (($style['searchinexcerpt']==1)?'checked="checked"':''); ?>/>
              	<label for="set_inexcerpt<?php echo $id; ?>"></label>
             </div>
             <div class="label<?php echo (($style['showsearchinexcerpt']!=1)?" hiddend":""); ?>">
                <?php echo $style['searchinexcerpttext']; ?>
             </div>
             <div class="option<?php echo (($style['showsearchinposts']!=1)?" hiddend":""); ?>">
              	<input type="checkbox" value="None" id="set_inposts<?php echo $id; ?>" name="set_inposts" <?php echo (($style['searchinposts']==1)?'checked="checked"':''); ?>/>
              	<label for="set_inposts<?php echo $id; ?>"></label>
             </div>
             <div class="label<?php echo (($style['showsearchinposts']!=1)?" hiddend":""); ?>">
                <?php echo $style['searchinpoststext']; ?>
             </div>
             <div class="option<?php echo (($style['showsearchinpages']!=1)?" hiddend":""); ?>">
              	<input type="checkbox" value="None" id="set_inpages<?php echo $id; ?>" name="set_inpages" <?php echo (($style['searchinpages']==1)?'checked="checked"':''); ?>/>
              	<label for="set_inpages<?php echo $id; ?>"></label>
             </div>
             <div class="label<?php echo (($style['showsearchinpages']!=1)?" hiddend":""); ?>">
                <?php echo $style['searchinpagestext']; ?>
             </div>
             <div class="option<?php echo (($style['showsearchinbpgroups']!=1)?" hiddend":""); ?>">
              	<input type="checkbox" value="None" id="set_inbpgroups<?php echo $id; ?>" name="set_inbpgroups" <?php echo (($style['searchinbpgroups']==1)?'checked="checked"':''); ?>/>
              	<label for="set_inbpgroups<?php echo $id; ?>"></label>
             </div>
             <div class="label<?php echo (($style['showsearchinbpgroups']!=1)?" hiddend":""); ?>">
                <?php echo $style['searchinbpgroupstext']; ?>
             </div>
             <div class="option<?php echo (($style['showsearchinbpusers']!=1)?" hiddend":""); ?>">
              	<input type="checkbox" value="None" id="set_inbpusers<?php echo $id; ?>" name="set_inbpusers" <?php echo (($style['searchinbpusers']==1)?'checked="checked"':''); ?>/>
              	<label for="set_inbpusers<?php echo $id; ?>"></label>
             </div>
             <div class="label<?php echo (($style['showsearchinbpusers']!=1)?" hiddend":""); ?>">
                <?php echo $style['searchinbpuserstext']; ?>
             </div>                 
             <div class="option<?php echo (($style['showsearchinbpforums']!=1)?" hiddend":""); ?>">
              	<input type="checkbox" value="None" id="set_inbpforums<?php echo $id; ?>" name="set_inbpforums" <?php echo (($style['searchinbpforums']==1)?'checked="checked"':''); ?>/>
              	<label for="set_inbpforums<?php echo $id; ?>"></label>
             </div>
             <div class="label<?php echo (($style['showsearchinbpforums']!=1)?" hiddend":""); ?>">
                <?php echo $style['searchinbpforumstext']; ?>
             </div> 
             <?php
                
                  $types = get_post_types(array(
                    '_builtin'=>false
                  )); 
                  $i = 1;
                  if (!is_array($style['selected-customtypes'])) $style['selected-customtypes'] = array();
                  if (is_array($style['selected-showcustomtypes'])) {   
                    foreach ($style['selected-showcustomtypes'] as $k=>$v) { 
                      $selected = in_array($v[0], $style['selected-customtypes']);
                      $hidden = "";
                      ?>
                       <div class="option<?php echo $hidden; ?>">
                        	<input type="checkbox" value="<?php echo $v[0]; ?>" id="customset_<?php echo $id.$i; ?>" name="customset[]" <?php echo (($selected)?'checked="checked"':''); ?>/>
                        	<label for="customset_<?php echo $id.$i; ?>"></label>
                       </div>
                       <div class="label<?php echo $hidden; ?>">
                          <?php echo $v[1]; ?>
                       </div> 
                      <?php
                      $i++;
                    }
                  }      
                  if (!is_array($style['selected-showcustomtypes'])) $style['selected-showcustomtypes'] = array();
                  if (is_array($types)) {
                    foreach($types as $k=>$v) {
                      if (is_array($style['selected-customtypes']) && !in_array($v, $style['selected-showcustomtypes'])) {
                        if (!is_array($style['selected-customtypes'])) $style['selected-customtypes'] = array();
                        $selected = in_array($v, $style['selected-customtypes']);
                        $hidden = " hiddend";
                        ?>
                         <div class="option<?php echo $hidden; ?>">
                          	<input type="checkbox" value="<?php echo $v; ?>" id="customset_<?php echo $id.$i; ?>" name="customset[]" <?php echo (($selected)?'checked="checked"':''); ?>/>
                          	<label for="customset_<?php echo $id.$i; ?>"></label>
                         </div>
                         <div class="label<?php echo $hidden; ?>">
                            <?php echo $val; ?>
                         </div> 
                        <?php
                      }
                      $i++;
                    }
                  }
             ?> 
             <?php
             /* Category filters */
             if ($style['showsearchincategories']) {
             ?>
             
             <fieldset>
                <?php if ($style['exsearchincategoriestext']!=""): ?>
                <legend><?php echo $style['exsearchincategoriestext']; ?></legend>
                <?php endif; ?>
                <div class='categoryfilter'>
             <?php
             
             }
             if (!is_array($style['selected-exsearchincategories'])) $style['selected-exsearchincategories'] = array();
             if (!is_array($style['selected-excludecategories'])) $style['selected-excludecategories'] = array();
             $_all_cat = get_all_category_ids();
             $_needed_cat = array_diff($_all_cat, $style['selected-exsearchincategories']);
             foreach ($_needed_cat as $k=>$v) {
                $selected = !in_array($v, $style['selected-excludecategories']);
                $cat = get_category($v);
                $val = $cat->name;
                $hidden = (($style['showsearchincategories'])==0?" hiddend":"");
                ?>
                 <div class="option<?php echo $hidden; ?>">
                  	<input type="checkbox" value="<?php echo $v; ?>" id="categoryset_<?php echo $v; ?>" name="categoryset[]" <?php echo (($selected)?'checked="checked"':''); ?>/>
                  	<label for="categoryset_<?php echo $v; ?>"></label>
                 </div>
                 <div class="label<?php echo $hidden; ?>">
                    <?php echo $val; ?>
                 </div> 
                <?php
             }
             if ($style['showsearchincategories']) {
             ?>
               </div>
             </fieldset>
             
             <?php
             }
             ?>     
          </form> 
         </div>
    </div> 
    <div id='ajaxsearchprores<?php echo $id; ?>'>
         <div class="results">
            <div class="resdrg">                                  
            </div>

         </div>
          <?php if($style['showmoreresults']==1): ?>
          <p class='showmore'>
            <a href='<?php home_url('/'); ?>?s='><?php echo $style['showmoreresultstext']; ?></a>
          </p>
          <?php endif; ?>
    </div>    
    <?php
    /*if (isset($_POST['action']) && $_POST['action']=="ajaxsearchpro_preview") {
      ;
    } else if(1) { */
    ?>
      <script>
      aspjQuery(document).ready(function() {
         aspjQuery("#ajaxsearchpro<?php echo $id; ?>").ajaxsearchpro({
          homeurl: '<?php echo home_url('/'); ?>',
          itemscount: <?php echo ((isset($style['itemscount']) && $style['itemscount']!="")?$style['itemscount']:"2"); ?>,
          imagewidth: <?php echo ((isset($style['settings-imagesettings']['width']))?$style['settings-imagesettings']['width']:"70"); ?>,
          imageheight: <?php echo ((isset($style['settings-imagesettings']['height']))?$style['settings-imagesettings']['height']:"70"); ?>,
          resultitemheight: <?php echo ((isset($style['resultitemheight']) && $style['resultitemheight']!="")?$style['resultitemheight']:"70"); ?>,
          showauthor: <?php echo ((isset($style['showauthor']) && $style['showauthor']!="")?$style['showauthor']:"1"); ?>,
          showdate: <?php echo ((isset($style['showdate']) && $style['showdate']!="")?$style['showdate']:"1"); ?>,
          showdescription: <?php echo ((isset($style['showdescription']) && $style['showdescription']!="")?$style['showdescription']:"1"); ?>,
          charcount:  <?php echo ((isset($style['charcount']) && $style['charcount']!="")?$style['charcount']:"3"); ?>,
          noresultstext: '<?php echo ((isset($style['noresultstext']) && $style['noresultstext']!="")?$style['noresultstext']:"3"); ?>',
          didyoumeantext: '<?php echo ((isset($style['didyoumeantext']) && $style['didyoumeantext']!="")?$style['didyoumeantext']:"3"); ?>',
          highlight: <?php echo ((isset($style['highlight']) && $style['highlight']!="")?$style['highlight']:1); ?>,
          highlightwholewords: <?php echo ((isset($style['highlightwholewords']) && $style['highlightwholewords']!="")?$style['highlightwholewords']:1); ?>,
          resultareaclickable: <?php echo ((isset($style['resultareaclickable']) && $style['resultareaclickable']!="")?$style['resultareaclickable']:0); ?>,    
          defaultsearchtext: '<?php echo ((isset($style['defaultsearchtext']) && $style['defaultsearchtext']!="")?$style['defaultsearchtext']:""); ?>',
          autocomplete: <?php echo ((isset($style['autocomplete']) && $style['autocomplete']!="")?$style['autocomplete']:1); ?>,
          triggerontype: <?php echo ((isset($style['triggerontype']) && $style['triggerontype']!="")?$style['triggerontype']:1); ?>,
          triggeronclick: <?php echo ((isset($style['triggeronclick']) && $style['triggeronclick']!="")?$style['triggeronclick']:1); ?>,
          redirectonclick: <?php echo ((isset($style['redirectonclick']) && $style['redirectonclick']!="")?$style['redirectonclick']:0); ?>
         });
      });       
      </script> 
    <?php   
    //} 
    $return = ob_get_clean();
    return $return;
  }  
  
?>