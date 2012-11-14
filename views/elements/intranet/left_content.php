<div class="left_content">

<div class="logo"><a href="<?php echo BASE_URL ?>/articles"><img src="<?php echo BASE_URL ?>/img/intranet/site/iefm.png" alt="" title="" border="0" /></a></div>

	<!-- <div class="sidebar_search">
		<form>
		<input type="text" name="" class="search_input" value="Chercher..." onclick="this.value=''" />
		<input type="image" class="search_submit" src="<?php /*echo BASE_URL*/ ?>/img/intranet/site/search.png" />
		</form>            
	</div> -->

<?php include(ELEMENTS.DS.'intranet'.DS.'menus'.DS.'menu_'.$_SESSION['role'].'.php'); ?>
	

</div>