	<?php 
	 $home_id = 62;
	$logo = get_field('logo', $home_id);
	$favicon = get_field('favicon', $home_id);
?>

	<!Doctype html>
	<html lang="ja">

	<head>
		<!-- Google Analytics start -->
		<!-- Google Analytics end -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=-1" />
		<meta name="format-detection" content="telephone=no">
		<title>KAIZEN BADMINTON</title>
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta http-equiv="Content-Script-Type" content="text/javascript" />

		<!-- FAVICON -->
		<link rel="icon" href="<?php echo get_theme_file_uri('') ?>/favicon.ico" type="image/x-icon">
		<!-- <meta property="og:image" content="<?php echo get_theme_file_uri('') ?>/images/ogp.jpg"> -->
		<!-- <meta name="thumbnail" content="<?php echo get_theme_file_uri('') ?>/images/thumbnail.jpg"> -->
		<style>
		@font-face {
			font-family: "FatFrank";
			src: url("<?php echo get_template_directory_uri(); ?>/fonts/FatFrank-Heavy.woff") format("woff");
			font-weight: 900;
			font-style: normal;
			font-display: swap;
		}
		</style>
		<?php 
	wp_head(); ?>
	</head>

	<body id="<?php echo isset($GLOBALS['bodyID']) ? $GLOBALS['bodyID'] : ""; ?>"
		class="<?php echo isset($GLOBALS['bodyClass']) ? $GLOBALS['bodyClass'] : ""; ?>">
		<div id="wrapper">
			<header>
				<div class="iHeader">
					<div class="iHeader--logo">
						<img src="<?php echo get_theme_file_uri('') ?>/images/logo.png" alt="">
					</div>
					<div class="iHeader--menu">
						<ul class="iHeader--list">
							<li><a href="">Abouts</a></li>
						</ul>
					</div>
					<div class="iHeader--hamburger">
						<div class="hamburger" id="hamburgerMenu">
							<span class="hamburger-line"></span>
							<span class="hamburger-line"></span>
							<span class="hamburger-line"></span>
						</div>
					</div>
				</div>
			</header>