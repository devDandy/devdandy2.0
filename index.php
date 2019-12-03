<?php
	$isSuccess = isset($_GET['success']);
	$isFailed = isset($_GET['failed']);
	$dataArray = array();
	if (isset($_POST['submit-btn'])) 
	{
		$dataArray = $_POST;
		$dataArray = sanitizeInput($dataArray);
		$errorsArray = validateInput($dataArray);
		if (count($errorsArray) == 0) 
		{
			if (!sendEmail($dataArray)) 
			{
				$errorsArray['submit-btn'] = "Send Failed";
			}
			else 
			{
          		header("location: " . $_SERVER['SCRIPT_NAME'] . "?success");
          		exit;
			}
		}
	}
	function sanitizeInput($inputArray) 
	{
		$inputArray['inFirstName'] = filter_var($inputArray['inFirstName'],FILTER_SANITIZE_STRING);
		$inputArray['inLastName'] = filter_var($inputArray['inLastName'],FILTER_SANITIZE_STRING);
		return $inputArray;
	}
	function validateInput($inputArray) 
	{
		$errorsArray = array();
		//First name is required
		if (empty($inputArray['inFirstName'])) 
		{
			$errorsArray['inFirstName'] = 'First Name is required.';

		}
		//Last name is required
		if (empty($inputArray['inLastName'])) 
		{
			$errorsArray['inLastName'] = 'Last  Name is required.';

		}
		//Validate email format
		if (empty($inputArray['inEmailAddress'])) {
			$errorsArray['inEmailAddress'] = "Email is required.";

		} else 
		{
	        if (!filter_var($inputArray['inEmailAddress'], FILTER_VALIDATE_EMAIL))
			{
				$errorsArray['inEmailAddress'] = "Email is not in a valid format <br>(Ex. yourName@host.com)";

			}
		}
		//Validate message input
		if (empty($inputArray['inMessage'])) {
			$errorsArray['inMessage'] = "Message is required.";

		} 
		if (!empty($inputArray['honeypot'])) {
			$errorsArray['honeypot'] = "Uh Oh";
		}
		return $errorsArray;
	}
	function sendEmail($sanitizedArray) 
	{
	    foreach ($sanitizedArray as $key => $value) 
	    {
	        $message .= $key . ": " . $value . PHP_EOL;
	    }	    
	    $sendSuccess = mail("dan@devdandy.com" , "devDandy Contact Msg", $message);
	    
	    return $sendSuccess;
	}
	function echoValue($dataArray, $key) 
	{
		return (isset($dataArray[$key]) ? $dataArray[$key] : '');
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
		<meta content="utf-8" http-equiv="encoding">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/main.css">
		<link href="https://fonts.googleapis.com/css?family=Bitter|Work+Sans:700&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Major+Mono+Display&display=swap" rel="stylesheet">
	</head>
	<body>

		<div  id="backToTop" onclick="backToTop();">
			<img src="assets/img/top.svg" alt="Back to Top" >
		</div>
		<nav>
			<div id="navbar" class="navbar-overlay">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					<div class="navbar-overlay-content">
						<a href="#home" onclick="closeNav()">Home</a>
						<a href="#my-skills" onclick="closeNav()">My Skills</a>
						<a href="#my-portfolio" onclick="closeNav()">My Portfolio</a>
						<a href="#my-contact-info" onclick="closeNav()">My Contact Info</a>
					</div>
			</div>
		</nav>
		<header>
			<div id="home" class="header-container">
				<div class="header-section ">
					<div class="header-border1">	
					<div class="header-border2">

					<div class="header-content-container ">
						<div class="row">
							<div class="col-8 col-sm-12">
									<p class="website-name">
											<span>DEV</span><span>DANDY.com</span>
									</p>
									<div class="title-header-container">
											<div class="title-header">
													<span class="title-content"><h1>Daniel Schneider</h1></span>
												</div>
												<!-- title-header -->
				
												<div class="title-header">
													<span class="title-content"><h1>Web Developer </h1></span>
												</div>
												<!-- title-header -->
									</div>
									<!-- title-header-container -->

							</div>
							<!-- col-8 -->

							<div class="col-4 col-sm-12">
								<div class="menu-container">
										<div class="nav-icon" onclick="openNav()">
												<span class="desktop-menu-title">Menu</span>
												<div class="nav-line-group">
														<div class="nav-line"></div>
														<div class="nav-line"></div>
														<div class="nav-line"></div>
												</div>
											</div>
								</div>
								<!-- menu-container -->

							</div>
							<!-- col-4 -->
					</div>
					<!-- row -->
						<div class="row">
							<div class="col-8 col-m-12">
									<div class="description-box">
											<h3 class="description-box-title">Hello World</h3>
											<p>
												My name is Daniel Schneider and I'm currently a freelance web developer in Iowa. 
												I graduated Des Moines Area Community College in the Spring of 2019 with an Associate of Web Development.
												I have three years of web development experience and love with what I do. 
											</p>
											<div class="social-media-icons">
												<a href="https://github.com/devDandy"><img src="assets/img/socialmedia/github.png" alt="Github.com/devdandy"></a>						
												<a href="https://www.linkedin.com/in/dan-schneider1/"><img src="assets/img/socialmedia/linkedin.png" alt="LinkedIn Profile"></a>
											</div>
											<!-- social-media-icons -->
										</div>
										<!-- description box -->
										<div class="header-buttons">
											<button><a href="#my-portfolio"> My Portfolio </a></button>
											<button><a href="#my-contact-info"> My Contact Info</a></button>
										</div>
							</div>
							<!-- col-8 -->
							<div class="col-4 col-m-12">
								<div class="img-comtainer ">
									<img src="assets/img/danschneider.png" class="schneider-portrait-img" alt="Portrait Of Daniel Schneider" >
								</div>
								<div class="portrait-button">
									<button><a href="">My Resume</a></button>
								</div>
								<!-- portrait-button -->
							</div>
							<!-- col-4 -->
						</div>
						<!-- row -->
					</div>
					<!-- header-content-container -->
				</div>
				</div>
				<!-- header-border1 -->
				<!-- header-border2 -->
				</div>
				<!-- header-section -->
			</div>
			<!-- header-container -->
		</header>

		<main>
			<div id="my-skills" class="skills-section">
				<div class="skills-content-container">
					<div class="title-header">
						<span class="title-content"><h1>My Skills</h1></span>
					</div>
					<!-- title-header -->
					<div class="skills-box">
						<h3>Web Development</h3>
						<p>
							I use HTML and CSS (usually SASS) everyday. I use JavaScript for any functionality my websites need. My main server-side language is PHP duo'd with MySQL. 
							I strive to make sure every website I work on is responsive.
						</p>
						<p>
							I plan on writing custom themes for Drupal 8 and Wordpress. I use Git for all of my projects, which you can find here.

						</p>
						<h3>Web Design</h3>
						<p>
							My process begins by finding out what the main audience needs from a website. Afterward, I sketch up some rough wireframes on paper. For prototyping, I use Adobe Xd and Figma. 
						</p>
						<p>
								I try to push myself everyday to stand out from the competition while not sacrificing any practicality. 
						</p>
					</div>
					<!-- skills-box -->
				</div>
				<!-- skills-content-container -->
			</div>
			<!-- skill-section -->


			<div id="my-portfolio"class="portfolio-section">
				<div class="section-header">
					<img src="assets/img/portfolio-header.svg" alt="Portfolio Header" class="section-header-background">
					<div class="title-header">
						<span class="title-content"><h1>My Portfolio</h1></span>
					</div>
					<!-- title-header -->
				</div>
				<!-- portfolio-header -->
				<div class="row">
					<div class="portfolio-responsive-col">
						<div class="portfolio-card">
							<div class="portfolio-description-box"  id="testtesttest">
								<div class="portfolio-description-content">
								<img src="assets/img/nissenERT.png" title="NissenERT" alt="Front page of NissenERT" class="portfolio-header-img">
									<h3>NissenERT</h3>
								</div>
								<div class="portfolio-button-links">
										<button><a href="">View Website</a></button>
										<button><a href="">View Code</a></button>
									</div>
									<!-- portfolio-button-links -->
							</div>
							<!-- portfolio-description-box -->
						</div>
						<!-- portfolio-card -->
					</div>
					<!-- col-4 -->
					<div class="portfolio-responsive-col">
							<div class="portfolio-card">

									<!-- portfolio-header -->
									<div class="portfolio-description-box">
										<div class="portfolio-description-content">
										<img src="assets/img/devdandyBG.png" title="devDandy" alt="Front page of devdandy.com" class="portfolio-header-img">
											<h3>devDandy.com</h3>
	
												<div class="portfolio-button-links">
														<button><a href="">View Website</a></button>
														<button><a href="">View Code</a></button>
													</div>
													<!-- portfolio-button-links -->
										</div>
									</div>
									<!-- portfolio-description-box -->
								</div>
								<!-- portfolio-card -->
					</div>
					<!-- portfolio-responsive-col -->
					<div class="portfolio-responsive-col">
							<div class="portfolio-card">

									<div class="portfolio-description-box">
										<div class="portfolio-description-content">
										<img src="assets/img/dmaccPortfolioDay.png" title="DMACC Portfolio Day 2018" alt="Front page of DMACC Portfolio Day 2018" class="portfolio-header-img">
											<h3>DMACC Portfolio Day</h3>
											<div class="portfolio-button-links">
												<button><a href="">View Website</a></button>
												<button><a href="">View Code</a></button>
											</div>
											<!-- portfolio-button-links -->
										</div>
										<!-- portfolio-description-content -->
									</div>
									<!-- portfolio-description-box -->
								</div>
								<!-- portfolio-card -->
						</div>
						<!-- portfolio-responsive-col -->
				</div>
				<!-- row -->
			</div>
			<!-- portfolio-section -->
			<div class="contact-section" id="my-contact-info">
					<div class="section-header">
							<img src="assets/img/contact-bg.png" alt="Contact Header" class="section-header-background">
							<div class="title-header">
								<span class="title-content"><h1>My Contact Info</h1></span>
							</div>
							<!-- title-header -->
						</div>
						<!-- section-header -->
						<div class="contact-section-content">
								<div class="contact-description-box">
										<h3>Drop me a line.</h3>
										<p>
											I'd love to hear about your next project and get you started. Feel free to contact me through email or by simply completing the form fields below.
										</p>
									</div>


									<?php if ($isSuccess)
									{ ?>

								
								<div id="contact-Modal" class="contact-modal">

									<!-- Modal content -->
									<div class="contact-modal-content">
										<h1>Success!</h1>
										<p>Your message has been successfully</p>
										<button class="close-contact-modal"> <a href="#home">Return to website.</a></button>
									</div>
								</div>


									<?php }
									else
									{ ?>
									<div class="contact-form">
											<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST" class="contact-form" name="contactForm" onsubmit="return validateContactForm()">
													<!-- First Name -->
													<label for="First Name"><p>First name: <span class="form-error" id="errorFirstName"></span>
														<?php if (isset($errorsArray))
													{ ?>
														<span class="form-error"><?php echo echoValue($errorsArray, 'inFirstName');  ?></span>
											 		<?php } ?>

													</p>
													</label>

													<input type="text" id="firstName" name="inFirstName"  value="<?php echo echoValue($dataArray, 'inFirstName');?>">
													
													<br>
													<!-- Last Name -->
													<label for="Last Name"><p>Last name: <span class="form-error" id="errorLastName"></span>
														<?php if (isset($errorsArray)) 
													{ ?>
														<span class="form-error"><?php echo echoValue($errorsArray, 'inLastName');  ?></span>
													<?php } ?>	
													</p>
													</label>
	
													<input type="text" id="lastName" name="inLastName" value="<?php echo echoValue($dataArray, 'inLastName');?>">
													
													<br>
													<!-- Email Address -->
													<label for="Email Address"><p>Email Address: <span class="form-error" id="errorEmail"></span>
														<?php if (isset($errorsArray)) 
													{ ?>
														<span class="form-error"><?php echo echoValue($errorsArray, 'inEmailAddress');  ?></span>
													<?php } ?>
													</p>
													</label>
													<input type="text" id="emailAddress" name="inEmailAddress" value="<?php echo echoValue($dataArray, 'inEmailAddress');?>">
													
													<br>

													<!-- <p>Phone Number (Optional):</p>
													<input type="text" name="phoneNumber">
													
													<br> -->
													
													<label for="Message"><p>Message: <span class="form-error" id="errorMessage"></span>
														<?php if (isset($errorsArray)) 
													{ ?>
														<span class="form-error textarea-error"><?php echo echoValue($errorsArray, 'inMessage');  ?></span>
													<?php } ?>
													</p>
													</label>

													<textarea  id="messageField" name="inMessage" id="" cols="30" rows="10"></textarea>
													<input type="hidden" name="honeypot">
													<div class="form-buttons">
															<button type="submit" value="Submit" class="submit-btn" name="submit-btn"> Submit	</button>
															<button type="reset" value="Reset" class="reset-button"> Reset	</button>

													</div>
													<!-- form-buttons -->
												  </form>
													<div id="failed-contact-modal" >

														<!-- Modal content -->
														<div class="failed-contact-modal-content">
															<h1>Uh Oh!</h1>
															<p>Something went wrong please try again</p>
															<button  id="close-failed-modal" onclick="closeFailedModal();"> <a href="#my-contact-info">Return to form.</a></button>
														</div>
													</div>

									</div>
									<?php } ?>
						</div>
						<!-- contact-section-content -->
			</div>
			<!-- contact-section -->
		</main>
		<footer>
			<div class="footer-section">
				<div class="row">
					<div class="col-12">
						<p>&copy; devDandy 2019</p>
					</div>
				</div>
				<!-- row -->
			</div>
			<!-- footer-section -->
		</footer>




		<script src="assets/js/main.js"></script>

	</body>
</html>