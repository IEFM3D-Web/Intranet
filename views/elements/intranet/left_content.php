<div class="left_content">

<div class="logo"><a href="<?php echo BASE_URL ?>/articles"><img src="<?php echo BASE_URL ?>/img/intranet/site/iefm.png" alt="" title="" border="0" /></a></div>

	<div class="sidebar_search">
		<form>
		<input type="text" name="" class="search_input" value="Chercher..." onclick="this.value=''" />
		<input type="image" class="search_submit" src="<?php echo BASE_URL ?>/img/intranet/site/search.png" />
		</form>            
	</div>

<?php include(ELEMENTS.DS.'intranet'.DS.'menus'.DS.'menu_'.$_SESSION['role'].'.php'); ?>
	
	<!-- <div class="sidebar_box">
		<div class="sidebar_box_top"></div>
		<div class="sidebar_box_content">
			<h3>User help desk</h3>
			<img src="<?php //echo BASE_URL ?>/img/intranet/site/info.png" alt="" title="" class="sidebar_icon_right" />
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>                
		</div>
		<div class="sidebar_box_bottom"></div>
	</div>
	
	<div class="sidebar_box">
		<div class="sidebar_box_top"></div>
		<div class="sidebar_box_content">
			<h4>Important notice</h4>
			<img src="<?php //echo BASE_URL ?>/img/intranet/site/notice.png" alt="" title="" class="sidebar_icon_right" />
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>                
		</div>
		<div class="sidebar_box_bottom"></div>
	</div>
	
	<div class="sidebar_box">
		<div class="sidebar_box_top"></div>
		<div class="sidebar_box_content">
			<h5>Download photos</h5>
			<img src="<?php //echo BASE_URL ?>/img/intranet/site/photo.png" alt="" title="" class="sidebar_icon_right" />
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>                
		</div>
		<div class="sidebar_box_bottom"></div>
	</div>  
	
	<div class="sidebar_box">
		<div class="sidebar_box_top"></div>
		<div class="sidebar_box_content">
			<h3>To do List</h3>
			<img src="<?php //echo BASE_URL ?>/img/intranet/site/info.png" alt="" title="" class="sidebar_icon_right" />
			<ul>
				<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
				<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
			</ul>                
		</div>
		<div class="sidebar_box_bottom"></div>
	</div>
-->
</div>