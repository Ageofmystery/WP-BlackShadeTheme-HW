<footer class="prime-footer">
	<div class="container">
		<div class="foot-inn row between-xs middle-xs">
			<?php
			$menuArguments = array(
			'theme_location' => 'last',
			'container'       => 'nav',
			'menu_class' 	=> 'foot-menu row',
			);
			wp_nav_menu($menuArguments); ?>
			<?php dynamic_sidebar( 'widget-zone' ); ?>
			<address class="copy-about text-foot-menu">&copy; Copyright <?php echo date('Y');?> DesignerFirst.com</address>
		</div>
	</div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>