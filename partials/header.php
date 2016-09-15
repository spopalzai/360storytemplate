<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title><?php echo isset( $title ) && $title ? $title : 'Starter Template for Vivid' ?></title>

		<?php if( isset( $og ) ){

			echo '<meta property="og:type" content="article" />' . "\n";
			echo '<meta property="og:url" content="http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] .'" />' . "\n";

			// Facebook
			// Google+
			foreach( $og as $k => $v ) {
				printf( '<meta property="og:%s" content="%s" />' . "\n", $k, $v );
			}

			// Twitter
            echo '<meta name="twitter:card" content="summary" />' . "\n";
            echo '<meta name="twitter:site" content="@tribunelabs" />' . "\n";
            echo '<meta property="twitter:url" content="http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] .'" />' . "\n";
			foreach( $og as $k => $v ) {
				printf( '<meta property="twitter:%s" content="%s" />' . "\n", $k, $v );
			}

            echo '<link rel="me" href=" ">' . "\n";
		} ?>

		<!-- Vendor CSS -->
		<?php print_styles() ?>

		<!-- Theme CSS -->
		<link rel="stylesheet" href="assets/css/theme.css" />
		<link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />

		<script type="text/javascript">
		<?php get_template_part( 'lib/mobile-detector' ); $detect = new Mobile_Detect; ?>
		var isMobile = <?php echo ($detect->isMobile() || $detect->isTablet()) ? 'true' : 'false' ?>;
		</script>

	</head>

	<body<?php body_class() ?>>
