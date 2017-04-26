	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../plugin/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../plugin/fancybox/source/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="../plugin/fancybox/source/jquery.fancybox.css?v=2.1.5" media="screen" />



	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="../plugin/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="../plugin/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : true,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

// --- By korn
			$('a[id^="edit"]').fancybox({
				'width'				: 500,
				'height'			: 400,
				'autoScale'     	: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe',
				onClosed	:	function() {
					//parent.location.reload(true); 
				}
			});

			$('a[id^="delete"]').fancybox({
				'width'				: '0%',
				'height'			: '0%',
				onStart		:	function() {
					return window.confirm('Do you want to delete?');
				},
				onClosed	:	function() {
					parent.location.reload(true); 
				}
			});

			$('a[id^="popupdata"]').fancybox({
				'width'				: '100%',
				'height'			: '100%',
				'autoScale'     	: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe',
			});
		});
	</script>