<?php

// ID of <body> 
$GLOBALS['bodyID'] = "home";

// Class of <body>
$GLOBALS['bodyClass'] = "";
$home_id = 62;

$name_playlist = get_field('name_playlist', $home_id);
$link_playlist = get_field('link_playlist', $home_id);
$artists_playlist = get_field('artists', $home_id);
$main_image = get_field('main_image', $home_id);
$new_releases = get_field('new_releases', $home_id);




get_header();
?>

<main>
	<section class="iMainvisual">
		<div class="iMainvisual--main">
			<div class="iMainvisual--img">
				<img src="<?php echo get_theme_file_uri('') ?>/images/logo.png" alt="You ARE MY SUNSHINE">
			</div>
			<div class="iMainvisual--content">
				<ul class="iMainvisual--list">
					<?php
global $post;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array(
	'post_type' => 'member',
	'orderby' => 'date',
	'order' => 'desc',
	'posts_per_page' => 6,
	'paged' => $paged,
);

$the_query = new WP_Query($args);

if ($the_query->have_posts()):
	while ($the_query->have_posts()): $the_query->the_post();
		$acf_link = get_field('url');
		$full_name = get_field('full_name');
		$nationality = get_field('nationality');
		$event = get_field('event');
		$thumbnail_id = get_post_thumbnail_id();
		$yt_thumb = get_youtube_thumbnail_best($acf_link);
		$thumbnail_url = '';

		if ($thumbnail_id) {
			$thumbnail_url = wp_get_attachment_url($thumbnail_id);
		} elseif ($acf_image = get_field('profile_photo')) {
			$thumbnail_url = $acf_image;
		} elseif ($yt_thumb) {
			$thumbnail_url = $yt_thumb;
		} else {
			$thumbnail_url = get_theme_file_uri('images/default.jpg');
		}
		?> <li><img src="<?php echo $thumbnail_url; ?>" alt=""></li>

					<?php
	endwhile;
	wp_reset_postdata();
endif;
?>
				</ul>
			</div>
		</div>
	</section>
	<section class="iMember --padding">
		<div class="iMember--wrap --wrap">
			<h3 class="ih3">
				<span class="en">Players</span>
				<span class="jp">プレイヤー</span>
			</h3>
			<ul class="iMember--list">


				<?php
global $post;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array(
	'post_type' => 'member',
	'orderby' => 'date',
	'order' => 'desc',
);

$the_query = new WP_Query($args);

if ($the_query->have_posts()):
	while ($the_query->have_posts()): $the_query->the_post();
		$acf_link = get_field('url');
		$full_name = get_field('full_name');
		$nationality = get_field('nationality');
		$event = get_field('event');
		$thumbnail_id = get_post_thumbnail_id();
		$yt_thumb = get_youtube_thumbnail_best($acf_link);
		$thumbnail_url = '';

		if ($thumbnail_id) {
			$thumbnail_url = wp_get_attachment_url($thumbnail_id);
		} elseif ($acf_image = get_field('profile_photo')) {
			$thumbnail_url = $acf_image;
		} elseif ($yt_thumb) {
			$thumbnail_url = $yt_thumb;
		} else {
			$thumbnail_url = get_theme_file_uri('images/default.jpg');
		}
		?>
				<li>
					<script>
					const event = <?php echo json_encode($event); ?>;
					console.log(event);
					</script>
					<div class="img">
						<img src="<?php echo $thumbnail_url; ?>" alt="">
					</div>

					<div class="info">
						<div class="city"><img
								src="<?php echo get_theme_file_uri('') ?>/images/<?php echo $nationality; ?>.png"
								alt=""></div>
						<div class="title">
							<span class="name"><?php echo $full_name; ?></span>
							<span class="role"><?php echo implode('/', $event); ?></span>
						</div>
					</div>
				</li>
				<?php
	endwhile;
	wp_reset_postdata();
endif;
?>
			</ul>
		</div>

	</section>
	<!-- <section class="iPartner --padding">
		<div class="iPartner--wrap --wrap">
			<h3 class="ih3">
				<span class="en">Partners</span>
				<span class="jp">協力企業</span>
			</h3>
			<ul class="iPartner--list">
				<li>
					<div class="img">
						<img src="images/logo.png" alt="">
					</div>
				</li>
			</ul>
		</div>
	</section> -->
	<div class="iHomeGround --padding">
		<h3 class="ih3">
			<span class="en">Home Ground</span>
			<span class="jp">ホームグラウンド</span>
		</h3>
		<div class="iHomeGround--wrap --wrap">
			<div class="iHomeGround--info">
				<div class="iHomeGround--cooperate">
					<div class="iHomeGround--main">
						<img src="<?php echo get_theme_file_uri('') ?>/images/logo-909.png" alt="">
					</div>
				</div>
				<h4>909 Truong Chinh Badminton Court</h4>
				<div class="iHomeGround--desc">
					<p>We would like to express our sincere thanks for sponsoring the training and competition
						venue for our team during the MBA Tournament - Ultimate Clans League Season 2.
						We truly value this partnership and look forward to continued collaboration in the
						future. Your professional and generous support has provided us with a high-quality
						environment,
						allowing our players to perform at their best.</p>

				</div>
			</div>
			<div class="iHomeGround--map">
				<iframe
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4714.900413693296!2d106.62525047580189!3d10.820626989330924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317529b0c12f7213%3A0xbbbb5cf9e1c4ccd4!2zQ0xCIEPhuqd1IEzDtG5nIFRyxrDhu51uZyBDaGluaCA5MDk!5e1!3m2!1svi!2s!4v1753639809201!5m2!1svi!2s"
					style="border:0;" allowfullscreen="" loading="lazy"
					referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
?>