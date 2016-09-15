/*
 * Name:        Theme Base
 * Written by: 	WpAssembler - (http://wpassembler.io)
 * Version:     1.0.0
 */

(function($) {

	var Vivid = {

		init: function() {

			this.cache()
				.events()
				.story();
		},

		cache: function() {

			this._wrapper = $('#wrapper');
			this._home = $('#home-screen');
			this._listing = $('#listing-screen');

			return this;
		},

		events: function() {

			$('.btn-begin').on( 'click', this.begin );
			$('.btn-back-home').on( 'click', this.backHome );
			$('.story-item').on( 'click', this.storyItem );
			$('.audio-player-toggle').on( 'click', this.toggleAudio );
			$('.btn-read-more').on( 'click', this.showPopup );
			$('.popup-close').on( 'click', this.closePopup );

			if( window.location.hash && '#listing' == window.location.hash ) {
				$('.btn-begin').trigger( 'click' );
			}
            
            // Twitter UR Fixes
            var pageTitle = $('head > title').html();
            $('.fa-twitter').each(function(){
                var a = $(this).parent(),
                    link = a.attr('href');
                
                a.attr( 'href', link + '&amp;text='+pageTitle);
                
            });

			return this;
		},

		story: function() {

			var self = Vivid,
				story = $('#story-screen');

			if( story.length < 1 ) {
				return;
			}

			story.css( 'background-image', 'url('+singleStory.bg+')' );

			if( !isMobile && undefined !== singleStory.video && singleStory.video ) {

				var url = 'https://www.youtube.com/embed/' + singleStory.video + '?';
				url += 'autoplay=1&amp;';
				url += 'controls=0&amp;';
				url += 'html5=1&amp;';
				url += 'iv_load_policy=3&amp;';
				url += 'loop=1&amp;';
				url += 'playlist='+singleStory.video+'&amp;';
				url += 'modestbranding=1&amp;';
				url += 'rel=0&amp;';
				url += 'showinfo=0&amp;';
				url += 'version=3&amp;';
				url += 'wmode=transparent&amp;';
				url += 'feature=oembed';

				story.prepend( '<iframe class="story-video" frameborder="0" allowfullscreen="1" title="YouTube video player" src="'+url+'"></iframe><div class="story-video-icon"><img src="assets/img/video-icon.svg"></div>' );
			}
			else if( undefined !== singleStory.mainImage && '' !== singleStory.mainImage ) {

				story.prepend('<a-scene id="story-scene" style="display:none"><a-assets><img id="story-main-image" src="'+singleStory.mainImage+ '"></a-assets><a-sky src="#story-main-image" rotation="-5 -70 0"></a-sky></a-scene>');

				if( undefined !== singleStory.audio && singleStory.audio ) {

					story.addClass('has-audio');
					story.prepend('<audio loop autoplay id="audio-player" class="is-paused" preload="true" controls><source src="'+singleStory.audio+'" type="audio/mpeg">Your browser does not support the audio element.</audio>');
					$('.audio-player-toggle').trigger('click');
				}

				var scene = $('#story-scene');

				scene.on( 'enter-vr', function(){
					$('.story-meta').hide();
				});

				scene.on( 'exit-vr', function(){
					$('.story-meta').show();
				});

				scene.on( 'loaded', function(){
					scene.show();
				});
			}
		},

		begin: function() {

			var self = Vivid;

			self._home.fadeOut( 300, function(){

				self._wrapper.addClass('no-scroll-with-padding');
				self._listing.show().addClass('wa-bounceIn');

				setTimeout(function(){
					self._listing.removeClass('wa-bounceIn');
					self._wrapper.removeClass('no-scroll-with-padding');
				}, 1200);

			});

			return false;
		},

		backHome: function() {

			var self = Vivid;

			self._listing.fadeOut( 300, function(){

				setTimeout(function(){

					self._wrapper.addClass('no-scroll');
					self._home.show().addClass('wa-bounceIn');

					setTimeout(function(){
						self._wrapper.removeClass('no-scroll');
						self._home.removeClass('wa-bounceIn');
					}, 1200);

				}, 200);

			});

			return false;
		},

		storyItem: function() {

			var self = Vivid,
				btn = $(this);

			self._listing.fadeOut( 300, function(){
				window.location.href = window.location.origin + window.location.pathname.replace(/\/+$/,'') + '/' + btn.attr('id') + '.php';
			});

			return false;
		},

		toggleAudio: function() {

			var self = Vivid,
				btn = $(this),
				audioPlayer = $('#audio-player');


			if( audioPlayer.hasClass('is-playing') ) {
				audioPlayer.removeClass('is-playing').addClass('is-paused');
				btn.removeClass('is-playing').addClass('is-paused');
				audioPlayer[0].pause();
			}
			else {
				audioPlayer.removeClass('is-paused').addClass('is-playing');
				btn.removeClass('is-paused').addClass('is-playing');
				audioPlayer[0].play();
			}

			return false;
		},

		showPopup: function() {

			var self = Vivid,
				popup = $('.popup'),
				content = $('.story-content').find(':first-child');

			if( content.is('script') ) {
				content.replaceWith( content.html() );
			}

			self._wrapper.addClass('no-scroll');
			popup.show().addClass('wa-bounceIn');

			setTimeout(function(){
				self._wrapper.removeClass('no-scroll');
				popup.removeClass('wa-bounceIn');
			}, 1200);

			return false;
		},

		closePopup: function() {

			var self = Vivid,
				popup = $('.popup');


			popup.fadeOut();

			return false;
		}
	};

	Vivid.init();

})(jQuery);
