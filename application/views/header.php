<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?= (isset($page_title))?$page_title:$page_title.' Documentation' ?></title>

<link rel="stylesheet" href="<?php echo base_url() ?>css/userguide.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>css/cidocs.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/methods.js"></script>
<script type="text/javascript" src="<?= base_url() ?>js/docready.js"></script>

</head>

<body>
<!-- START NAVIGATION -->
<div id="nav">
    <div id="nav_inner">
    <table cellpadding="0" cellspaceing="0" border="0" style="width:98%"><tr>
		<td class="td" valign="top">

		<ul>
		<li><a href="<?= base_url() ?>"><?= $page_title ?> Documentation Home</a></li>
		<li><a href="<?= base_url() ?>toc">Table of Contents Page</a></li>
		</ul>
		
        <?			
			foreach($ResourceAreas as $area => $items){ 
				$resource = str_replace(" ", "_", $area);
				$resource = strtolower($resource);
				echo '<a class="ResourceAreaLink" href="'.base_url() . $resource .'"><h3 class="ResourceArea">'. $area .'</h3></a>';
				echo '<ul class="DocItems">';
				if(isset($items['Items'])){
					foreach($items['Items'] as $item){
						$item_link = str_replace(" ", "_", $item);
						$item_link = strtolower($item_link);
						echo '<li class="DocItem"><a class="DocItemLink" href="'.base_url().$resource.'/'.$item_link.'">'.$item.'</a></li>';
					}
				}
				echo '</ul>';

       		}
        ?>

		</td>
        <td>
		<a href="<?= base_url() ?>create" class="nav_create_btn"></a>
        </td>
    </tr></table>
    </div>
</div>
<div id="nav2"><a name="top"></a><a href="javascript:void(0);" onclick="myHeight.toggle();"><img src="<?= base_url() ?>images/nav_toggle_darker.jpg" class="OpenNavBtn" width="154" height="43" border="0" title="Toggle Table of Contents" alt="Toggle Table of Contents" /></a></div>

<div id="masthead">
<table cellpadding="0" cellspacing="0" border="0" style="width:100%">
<tr>
<td><h1><?= $page_title ?> Documentation</h1></td>
<td id="breadcrumb_right"><a href="javascript:void(0);">Table of Contents Page</a></td>
</tr>
</table>
</div>
<!-- END NAVIGATION -->


<table cellpadding="0" cellspacing="0" border="0" style="width:100%">
<tr>
<td id="breadcrumb">
<a href="<?= base_url() ?>/docs"><?= $page_title ?> Documentation Home</a> &nbsp;&#8250;&nbsp; <?= (isset($current_page))?$current_page:$page_title.' Documentation User Guide' ?>
</td>
<td id="searchbox"></td>
</tr>
</table>



<br clear="all" />

<div class="center"><img src="<?= base_url() ?>images/Large_OIRLogo.png" width="150" height="164" border="0" alt="<?= $page_title ?> Documentation" /></div>


<!-- START CONTENT -->
<div id="content">
