<?php

/* ============================================ */
/* =================== META =================== */
$GLOBALS['h1'] = "collection";
/* ================= end META ================= */
/* ============================================ */


// ID of <body> 
$GLOBALS['bodyID'] = "collection";

// Class of <body>
$GLOBALS['bodyClass'] = "under";

get_header();

?>
<main>
	<div class="pageHeader">
		<h3 class="ih3">
			<span class="en">Collection</span>
			<span class="jp">コレクション</span>
		</h3>
	</div>
	<section class="iProduct">
		<div class="iProduct--wrap">
			<div class="iProduct-header">
				<ul class="iProduct--cate">
					<li data-category="all" class="active">ALL</li>
					<li data-category="shirt">T-Shirt</li>
					<li data-category="shorts">Shorts</li>
					<li data-category="cap">Cap</li>
					<li data-category="socks">Socks</li>
					<li data-category="other">Other</li>
				</ul>
			</div>
			<div class="iProduct--body">
				<div class="iProduct--list">
					<?php
global $post;

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array(
	'post_type' => 'collections',
	'orderby' => 'sort_order',
	'order' => 'ASC',
	'paged' => $paged,
);

$the_query = new WP_Query($args);

if ($the_query->have_posts()) :
	while ($the_query->have_posts()) : $the_query->the_post();

		$colors = get_field('colors');
		$colorMap = [
	'color_1' => '#000000',
	'color_2' => '#FFFFFF',
	'color_3' => '#1B2951',
	'color_4' => '#C00000',
];
$galleryId = 'product-' . get_the_ID();
$defaultImage = '';

foreach (array_keys($colorMap) as $field) {
	if (!empty($colors[$field])) {
		$defaultImage = $colors[$field];
		break;
	}
}
?>
					<div class="iProduct--item" data-category="<?php the_field('product_category'); ?>">
						<a class="img" style="--bg: url('<?php echo esc_url($defaultImage); ?>')"
							data-fancybox="<?php echo $galleryId; ?>" href="<?php echo esc_url($defaultImage); ?>">
							<img src="<?php echo esc_url($defaultImage); ?>" alt="<?php the_title_attribute(); ?>">
						</a>

						<div class="content">
							<div class="title"><?php the_title(); ?></div>

							<ul class="colors">
								<?php foreach ($colorMap as $field => $color) : ?>
								<?php if (empty($colors[$field])) continue; ?>

								<li style="background-color: <?php echo esc_attr($color); ?>"
									data-image="<?php echo esc_url($colors[$field]); ?>">
									<link rel="preload" as="image" href="<?php echo esc_url($colors[$field]); ?>">
								</li>
								<?php endforeach; ?>
							</ul>
							<?php
$isFirst = true;

foreach ($colorMap as $field => $color) :

	if (empty($colors[$field])) {
		continue;
	}

	if ($isFirst) {
		$isFirst = false;
		continue;
	}
?>
							<a href="<?php echo esc_url($colors[$field]); ?>" data-fancybox="<?php echo $galleryId; ?>"
								hidden></a>
							<?php endforeach; ?>
						</div>
					</div>
					<?php
	endwhile;
	wp_reset_postdata();
endif;
?>
				</div>
			</div>
		</div>
	</section>
</main>
<script>
jQuery(document).on('click', '.colors li', function() {
	const image = jQuery(this).data('image');
	const $img = jQuery(this).closest('.iProduct--item').find('.img');

	$img.css('--bg', `url("${image}")`);

	jQuery(this)
		.addClass('active')
		.siblings()
		.removeClass('active');
});

jQuery('.iProduct--item').each(function() {
	const $firstColor = jQuery(this).find('.colors li:first');

	$firstColor.trigger('click');
});

jQuery(document).on('click', '.iProduct--cate li', function() {
	const category = jQuery(this).data('category');

	jQuery(this)
		.addClass('active')
		.siblings()
		.removeClass('active');

	jQuery('.iProduct--item').each(function() {
		const itemCategory = jQuery(this).data('category');

		jQuery(this).toggle(
			category === 'all' || itemCategory === category
		);
	});
});
</script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<?php
get_footer();
?>