<?php include('config.php') ?>

<!DOCTYPE html>
<html style="overflow-x: hidden; max-width: 100%;">
<head>
	<title><?php env('app_name'); ?> &raquo; Comming Soon</title>

	<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="assets/fa5/css/all.min.css" />
	<link rel="icon" type="image/png" href="favicon.png" />

	<script type="text/javascript" src="assets/jquery.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap.bundle.min.js"></script>

	<style type="text/css">
		body {
			font-family: Roboto;
		}

		.pr-chip {
			width: 100px;
			height: 100px;
			border-width: 5px;
			border-style: solid;
			border-radius: 50%;
			color: white;
			margin: 0 25px;
		}

		.pr-chip span {
			font-size: .85em;
		}
	</style>
</head>
<body>
	
	<div class="fixed-top w-100 h-100 d-flex flex-column flex-md-row order-md-1">
		<div class="col-12 col-md-5 col-lg-7 order-md-2" style="background-image: url('assets/img/bg-2.jpg'); background-size: cover; background-position: top; background-repeat: no-repeat;">
			<div class="d-flex flex-wrap h-100 w-100 align-items-center justify-content-center p-4">

				<?php
					$dt = date_diff( date_create(Date('Y-m-d H:i:s')), date_create(LAUNCH_TIME) );
				?>

				<div class="pr-chip d-flex flex-column align-items-center justify-content-center" style="border-color: lightgreen;" >
					<h5><?php echo $dt->d; ?></h5>
					<span><b>Days</b></span>
				</div>

				<div class="pr-chip d-flex flex-column align-items-center justify-content-center" style="border-color: royalblue;" >
					<h5><?php echo $dt->h; ?></h5>
					<span><b>Hours</b></span>
				</div>

				<div class="pr-chip d-flex flex-column align-items-center justify-content-center" style="border-color: indigo;" >
					<h5><?php echo $dt->i; ?></h5>
					<span><b>Minutes</b></span>
				</div>

				<div class="pr-chip d-flex flex-column align-items-center justify-content-center" style="border-color: orange;" >
					<h5><?php echo $dt->s; ?></h5>
					<span><b>Seconds</b></span>
				</div>

			</div>
		</div>

		<div class="col-12 col-md-7 col-lg-5 p-4 p-sm-5">
			<div class="h-100 d-flex flex-column p-4">
				<div class="">
					<img src="favicon.png" class="d-block" height="50" />
					<br/><br/><br/>

					<h2 class="mt-5">
						<b>Comming Soon</b>
					</h2>
					<p>
						Our website is currently undergoing development. We would go live shortly. Thank you for your patience.
					</p>

					<form method="post" action="subscribe.php" class="d-flex mt-5 mb-4">
						<div class="flex-grow-1">
							<input type="email" name="email" class="form-control form-control-lg rounded-0" placeholder="Your Email" style="border-top-left-radius: 25px !important; border-bottom-left-radius: 25px !important;" required />
						</div>
						<button class="btn btn-danger rounded-0" style="background-color: #ed1c24 !important; border-top-right-radius: 25px !important; border-bottom-right-radius: 25px !important; white-space: nowrap;">
							Notify Me
						</button>
					</form>
					<p>
						Subscribe to get early notification of our launch date.
					</p>
				</div>
				<div class="mt-auto text-center">
					<small>
						Stay in touch:&nbsp;

						<a href="<?php env('fb_link'); ?>" class="mx-2" >
							<i class="fab fa-facebook fa-lg text-primary"></i>
						</a>

						<a href="<?php env('tw_link'); ?>" class="mx-2" >
							<i class="fab fa-twitter fa-lg text-info"></i>
						</a>

						<a href="<?php env('pi_link'); ?>" class="mx-2" >
							<i class="fab fa-pinterest fa-lg text-danger"></i>
						</a>

						<br/> &copy; <?php env('app_name'); ?> 2020.
					</small>
				</div>
			</div>
		</div>
	</div>

	<?php
		$msg = @$_SESSION["msg"];
	?>

	<!-- BEGIN CONFIRMATION SNIPPET -->
	<div id="confirm-container" class="fixed-top w-100 h-100 d-none justify-content-center align-items-center" style="background-color: rgba(0,0,0,0.3);">
	  <div class="rounded bg-white shadow-sm overflow-hidden" style="width: 400px;">
	    <div class="p-4">
	      <h5>Confirmation</h5>
	      <p>
	        <?php echo $msg; ?>
	      </p>
	    </div>

	    <div class="d-flex border-top">
	      <button class="btn btn-light flex-fill rounded-0 p-3 border-right" onclick="Confirm.close();" >
	        Cancel
	      </button>
	      <button class="btn btn-light flex-fill rounded-0 p-3" onclick="Confirm.close();" >
	        Okay
	      </button>
	    </div>
	  </div>
	</div>
	<script type="text/javascript">
	  var Confirm = {
	    open: function(){
	      $('#confirm-container').addClass("d-flex");
	    },

	    close: function(){
	      $('#confirm-container').removeClass("d-flex");
	    },

	    run: function(){
	      this.callback();
	    },

	    _: function( f ){
	      this.callback = f;
	      this.open();
	    },

	    _url: function( u ){
	      this.callback = function(){
	        location.replace(u);
	      };
	      this.open();
	    },

	    callback: null
	  };

	  function confirm(f){
	    Confirm._(f);
	  }

	  function confirmThenUrl(u){
	    Confirm._url(u);
	  }

	  <?php 
	  	if( $msg ){
	  		echo "confirm(function(){})";
	  		unset($_SESSION['msg']);
	  	}
	  ?>
	</script>
	<!-- END CONFIRMATION SNIPPET -->

</body>
</html>