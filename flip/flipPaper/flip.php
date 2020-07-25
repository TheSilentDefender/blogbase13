<!--<meta name="viewport" content="width = 300, user-scalable = no" />-->
<script type="text/javascript" src="flip/extras/jquery.min.1.7.js"></script>
<script type="text/javascript" src="flip/extras/modernizr.2.5.3.min.js"></script>

<div class="flipbook-viewport" style="padding:270px;">
	<div class="container">
		<div class="flipbook">
        	<?php
				  $userQ="select * from flip";
					$userRes=mysql_query($userQ) or die(mysql_error());
					if($count=mysql_num_rows($userRes)){
					while ($userRow=mysql_fetch_assoc($userRes))
					 {
			?>
			<div style="background-image:url(flip/flipPaper/pages/<?php echo $userRow['pic'];?>)"></div>
            <?php
					 }
					}
					else{
			echo "No Flip Newspaper are there...";
		}
			?>
			
		</div>
	</div>


</div>
<script type="text/javascript">

function loadApp() {

	// Create the flipbook

	$('.flipbook').turn({
			// Width

			width:1245,
			
			// Height

			height:470,

			// Elevation

			elevation: 50,
			
			// Enable gradients

			gradients: true,
			
			// Auto center this flipbook

			autoCenter: true

	});
}

// Load the HTML4 version if there's not CSS transform

yepnope({
	test : Modernizr.csstransforms,
	yep: ['flip/lib/turn.js'],
	nope: ['flip/lib/turn.html4.min.js'],
	both: ['flip/flipPaper/css/basic.css'],
	complete: loadApp
});

</script>
