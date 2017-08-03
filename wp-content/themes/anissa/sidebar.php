<?php
/**
 * The sidebar containing the main widget areas.
 *
 * @package anissa
 */
?>
<div id="secondary" class="widget-area sidebar" role="complementary">
   <?php dynamic_sidebar( 'sidebar-1' ); ?>
	<aside id="text-2" class="widget widget_text">
      <h1 class="widget-title">IP地址</h1>
      <div class="textwidget">
        <p>访问IP地址：<?php echo convertip($_SERVER['REMOTE_ADDR']);?></p>
	</div>
		</aside>
		
</div>
<!-- #secondary -->