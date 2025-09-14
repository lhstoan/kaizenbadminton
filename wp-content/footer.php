<?php 
 $home_id = 62;

$social_media = get_field('social_media', $home_id);
$footer_link = get_field('footer_link', $home_id);
$copyright = get_field('copyright', $home_id);
$logo = get_field('logo', $home_id);
$year = date("Y");

?>

<footer>
	<div class="iFooter">
		<ul class="iFooter--link">
			<li><a href="">FACEBOOK</a></li>
			<li><a href="">TIKTOK</a></li>
			<li><a href="">YOUTUBE</a></li>
		</ul>
		<div class="iFooter--logo">


			<div class="iFooter--copyright">
				<span>@2025 KAIZEN.</span>
			</div>
		</div>

	</div>
</footer>
</div> <!-- CLOSE tag #wrapper -->
<?php wp_footer(); ?>
</body>

</html>