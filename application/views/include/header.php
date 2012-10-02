<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Dashboard I Admin Panel</title>
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estiloPanel.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php base_url(); ?>assets/css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/hideshow.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

	/* MIs agregados*/
	/*
	* Modulo de modificar y eliminar clientes
	* desc: cuando hace click en un input, según
	* el title si es trash o edit, modifica o elimina.
	*/
	$(".tab_container #tab1 table tbody td input").click(function(){
		var id = $(this).attr("id");
		if($(this).attr("title") == 'trash'){
			$(window).attr("location","<?php echo base_url(); ?>panel/delCliente/"+id);
		}else{
			$(window).attr("location","<?php echo base_url(); ?>panel/modClientes/"+id);
		}
	});

});
    </script>
    <script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.html">Website Root</a></h1>
			<h2 class="section_title">Panel</h2><div class="btn_view_site"><a href="http://www.medialoot.com">View Site</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo $this->session->userdata("user"); ?> (<a href="#">0 Messages</a>)</p>
			 <a class="logout_user" href="<?php base_url(); ?>panel/salir" title="Logout">Logout</a> 
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.html">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current">Dashboard</a></article>
		</div>
	</section><!-- end of secondary bar -->