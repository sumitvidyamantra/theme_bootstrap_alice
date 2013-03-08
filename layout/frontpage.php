<?php

$hassidepre = $PAGE->blocks->region_has_content('side-pre', $OUTPUT);
$hassidepost = $PAGE->blocks->region_has_content('side-post', $OUTPUT);
$showsidepre = $hassidepre && !$PAGE->blocks->region_completely_docked('side-pre', $OUTPUT);
$showsidepost = $hassidepost && !$PAGE->blocks->region_completely_docked('side-post', $OUTPUT);

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

$bodyclasses = array();
if ($showsidepre && !$showsidepost) {
    if (!right_to_left()) {
        $bodyclasses[] = 'side-pre-only';
    }else{
        $bodyclasses[] = 'side-post-only';
    }
} else if ($showsidepost && !$showsidepre) {
    if (!right_to_left()) {
        $bodyclasses[] = 'side-post-only';
    }else{
        $bodyclasses[] = 'side-pre-only';
    }
} else if (!$showsidepost && !$showsidepre) {
    $bodyclasses[] = 'content-only';
}
if ($hascustommenu) {
    $bodyclasses[] = 'has_custom_menu';
}


if(!empty($PAGE->theme->settings->displaylogo)){
	$displaylogo = $PAGE->theme->settings->displaylogo;

	if (!empty($PAGE->theme->settings->logo)) {
    	$logourl = $PAGE->theme->settings->logo;
	}else{
		$logourl =$OUTPUT->pix_url('images/header-logo', 'theme');
	}
	
}else{
	$displaylogo =null;
}

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <title><?php echo $PAGE->title ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
      <link rel="shortcut icon" href="<?php echo $OUTPUT->pix_url('favicon', 'theme')?>" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
  
</head>
<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html() ?>

<div id="page">
 <div id="page-header-wrapper">
    <div id="page-header" class="clearfix">
    
        <div id="headingmenu">
        	        	<!-- header logo -->
			<?php  if ($displaylogo) { ?>
				<h1 class="headermain-logo"><img src="<?php echo $logourl?>" alt="" /><div class="clear"></div></h1>
		   <?php }else{?>
				<h1 class="headermain <?php echo " $headerclass" ?>" ><?php echo $PAGE->heading ?></h1>
		   <?php }?>
		    <div class="clearfix"></div>
		   <!-- header logo -->
			</div>	
			
        <div class="headermenu"><?php
            echo $OUTPUT->login_info();
            echo $OUTPUT->lang_menu();
            echo $PAGE->headingmenu;
        ?></div>

    </div>
    <?php if ($hascustommenu) { ?>
<div id="custommenuwrap"><div id="custommenu"><?php echo $custommenu; ?></div></div>
<?php } ?>
    </div>
    

<!-- END OF HEADER -->


<!-- END OF HEADER -->

<!--  BOOTSTRAP RESPONSIVE -->
<!--
<div id="page-content-wrapper" class="wrapper clearfix">
			<div class="slider-box-wrapper" style="clear:both;">
				  <div class="slider-box">
    <ul class="rslides" id="slider2">
	    <li><a href="#"><img src="<?php echo $CFG->wwwroot;?>/theme/bootstrap_alice/pix/slider/01.jpg" alt=""/>
	    	
	    	
	    		    </a></li>
	    <li><a href="#"><img src="<?php echo $CFG->wwwroot;?>/theme/bootstrap_alice/pix/slider/02.jpg" alt=""/>
	   
	    	
	    </a></li>
	    
	      <li><a href="#"><img src="<?php echo $CFG->wwwroot;?>/theme/bootstrap_alice/pix/slider/03.jpg" alt=""/>
	   
	    	
	    </a></li>
    </ul>
    
         </div>
				  
				  </div>
<div style="clear:both;"></div>
-->

<div id="page-content" class="row-fluid">


<?php if ($hassidepre) { ?>
	<div class="span3">
	<?php echo $OUTPUT->blocks_for_region('side-pre') ?>
	</div>
<?php } ?>


<?php if ($hassidepre && $hassidepost) { ?>
	<div class="span6">
<?php } elseif ($hassidepre || $hassidepost) { ?>
	<div class="span9">
<?php } else { ?>
    <div class="span12">
<?php };?>

	<?php echo $OUTPUT->main_content() ?>
	</div>
             
<?php if ($hassidepost) { ?>                
	<div class="span3">
	<?php echo $OUTPUT->blocks_for_region('side-post') ?>
    </div>
<?php }; ?>          
</div>
<!--  END BOOTSTRAP RESPONSIVE -->


<!-- START OF FOOTER -->
    <div id="page-footer">
        <p class="helplink">
        <?php echo page_doc_link(get_string('moodledocslink')) ?>
        </p>

        <?php
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </div>
    <div class="clearfix"></div>
</div>
<?php echo $OUTPUT->standard_end_of_body_html() ?>

<?php if (!empty($PAGE->theme->settings->enablejquery)) {?>

<script src="<?php echo $CFG->wwwroot;?>/theme/bootstrap_alice/js/bootstrap-collapse.js"></script>
<script src="<?php echo $CFG->wwwroot;?>/theme/bootstrap_alice/js/bootstrap-dropdown.js"></script>
<script src="<?php echo $CFG->wwwroot;?>/theme/bootstrap_alice/js/jquery.js"></script>
<script src="<?php echo $CFG->wwwroot;?>/theme/bootstrap_alice/js/bootstrap-tab.js"></script> 
<script src="<?php echo $CFG->wwwroot;?>/theme/bootstrap_alice/js/bootstrap.min.js"></script>


<?php }?>


</body>
</html>