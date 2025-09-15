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
			<li><a href="https://www.facebook.com/profile.php?id=61572834952468" target="_blank">FACEBOOK</a></li>
			<li><a href="https://www.tiktok.com/@kaizen.badminton" target="_blank">TIKTOK</a></li>
			<li><a href="https://www.youtube.com/@KaizenBadmintonHouse" target="_blank">YOUTUBE</a></li>
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
<script>
document.onkeydown = e => {
	if (e.key === "F12" || (e.ctrlKey && e.shiftKey && e.key === "I")) {
		e.preventDefault();
	}
};
document.addEventListener('contextmenu', e => e.preventDefault());
</script>
</body>

</html>