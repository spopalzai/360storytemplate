<?php
include_once 'lib/init.php';

$config = array(
	'title' => 'Title', //page title
	'og' => array(
		'title' => 'Title', //story title
		'description' => 'desciption', //story description
		'image' => 'assets/img/story-1-thumb.jpg'
	)
);
get_header($config);
?>

	<main id="wrapper">


	<?php
		get_template_part( 'partials/home' );
		get_template_part( 'partials/listing' );
	?>

	</main>

<?php get_footer();
