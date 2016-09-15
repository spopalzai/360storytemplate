<?php
include_once 'lib/init.php';

$config = array(
	'title' => ' ',
	'og' => array(
		'title' => ' ',
		'description' => ' ',
		'image' => 'assets/img/story-1-thumb.jpg' //Facebook share thumbnail
	)
);
get_header($config);
?>

    <main id="wrapper">

        <script type="text/javascript">
            var singleStory = {
                bg: 'assets/stories/story1/story-1.jpg', //this is the image that is used when your 360 images or video are loading
                audio: 'assets/stories/story1/test.mp3', //audio that plays when your image is loaded
                mainImage: 'assets/stories/story1/1.jpg', //360 image
                video: '' //YouTube video code from URL
            }
        </script>

        <div id="story-screen" class="story-wrapper story1-wrapper">

            <div class="story-meta">
                <h1>By the sea</h1>
                <span class="audio-player-toggle"><i class="fa fa-pause"></i><i class="fa fa-play"></i></span><a href="#" class="btn-read-more">Read about this<span class="hidden-xs"> location</span> <i class="fa fa-wpforms"></i></a>
                <br>
                <?php get_back_to_listing() ?>
                <?php get_share( 'current', 'list-inline list-social-icons' ) ?>
            </div>

            <div class="popup">
                <span class="popup-close fa fa-times"></span>

                <div class="popup-body">

                    <div class="container">

                        <div class="story-content">

                            <script type="text/template">
															<!-- this is where your content will go--->
								<header>
	                                <h2>Headline</h2>
	                                <p class="lead">
	                                    Summary
	                                </p>
	                            </header>
	                            <p>
																Story text
																</p>
	                            <img src="assets/stories/story1/2.jpg" alt="" />
	                                <br>
	                            </p>
                            </script>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </main>

    <?php get_footer();
