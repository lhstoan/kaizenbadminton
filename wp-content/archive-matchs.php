<?php

/* ============================================ */
/* =================== META =================== */
$GLOBALS['h1'] = "artists";
/* ================= end META ================= */
/* ============================================ */


// ID of <body> 
$GLOBALS['bodyID'] = "artists";

// Class of <body>
$GLOBALS['bodyClass'] = "under";

get_header();
?>
<main>
	<div class="pageHeader">
		<h3 class="ih3">
			<span class="en">Matches</span>
			<span class="jp">マッチ</span>
		</h3>
	</div>
	<div class="iMatchDetail">
		<div class="iMatchDetail--wrap">
			<ul class="iMatch--list">
				<?php
global $post;
$paged = get_query_var('paged') ? get_query_var('paged') : 1;




$args = array(
    'post_type'      => 'matches',
    'meta_key'       => 'round',
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC', 
);

$the_query = new WP_Query($args);

if ($the_query->have_posts()):
	while ($the_query->have_posts()): $the_query->the_post();
		$acf_link = get_field('url');
		$time = get_field('time');

		$tournament_name = get_field('tournament_name');
		$court_location = get_field('court_location');
		$round = get_field('round');
		$team_information = get_field('team_information');
		$scores = get_field('scores');
		$total = (int)$scores['home'] + (int)$scores['away'];


$location       = $team_information['location'];
$other_team     = $team_information['opposing_team'];

$kaizen_block = '
<div class="iMatch--team-info">
<div class="iMatch--team-logo">
	<img src="'. get_theme_file_uri('') .'/images/logo moi/kaizen team badminton circle.png" alt="KAIZEN">
</div>
<div class="iMatch--team-name">
	<span>KAIZEN BADMINTON</span>
</div>
</div>';

if ( $other_team ) {
    $other_id    = $other_team->ID;
    $other_name  = get_the_title( $other_id );
    $other_logo  = get_field( 'logo', $other_id );
	
    $other_block = '
        <div class="iMatch--team-info">
            <div class="iMatch--team-logo">
			<img src="' . esc_url( $other_logo ?? '' ) . '" alt="' . esc_attr( $other_name ) . '">
            </div>
            <div class="iMatch--team-name">
                <span>' . esc_html( $other_name ) . '</span>
            </div>
        </div>';
}

   $dt = DateTime::createFromFormat('d/m/Y g:i a', $time);

?>
				<li class="iMatch--item">
					<script>
					const event = <?php echo json_encode($total); ?>;
					console.log(event);
					</script>
					<div class="iMatch--item-title">
						<span class="round">Round <?php echo $round;?></span>
						<?php

       					 echo '<span class="date">' . $dt->format('D d M Y') . '</span>';

?>
						<span class="name"><?php echo $tournament_name;?></span>
					</div>
					<div class="iMatch--team">
						<?php

    if ( $location !== 'home' ) {
        echo $kaizen_block;
     if ( $total !== 5 ) {
       echo '<ul class="iMatch--team-coming"><span>' . $dt->format('H:i') . '</span></ul>';
    } else {
    
        echo '<ul class="iMatch--team-scores">
                <li class="'. ( $scores['home'] > $scores['away'] ? 'win' : '' ) .'">'. $scores['home'] .'</li>
                <li class="'. ( $scores['away'] > $scores['home'] ? 'win' : '' ) .'">'. $scores['away'] .'</li>
              </ul>';
    }
        echo $other_block;
    } else {
        echo $other_block;
        if ( $total !== 5 ) {
        echo '<ul class="iMatch--team-coming"><span>' . $dt->format('H:i') . '</span></ul>';
    } else {
        
        echo '<ul class="iMatch--team-scores">
            <li class="'. ( $scores['home'] > $scores['away'] ? 'win' : '' ) .'">'. $scores['home'] .'</li>
                <li class="'. ( $scores['away'] > $scores['home'] ? 'win' : '' ) .'">'. $scores['away'] .'</li>
              </ul>';
    }
        echo $kaizen_block;
    }
    ?>
					</div>
					<div class="iMatch--item-map">
						<span><?php echo $court_location; ?></span>
					</div>
				</li>

				<?php
	endwhile;
	wp_reset_postdata();
endif;
?>
			</ul>
		</div>
	</div>
</main>

<?php
get_footer();
?>