<?php
	session_start();

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	if(count($_POST)>0){
		if(isset($_SESSION['captcha_keystring']) && $_SESSION['captcha_keystring'] === $_POST['keystring']) {
		
			//Variables from form, do not change unless adding/removing fields
			$name = $_POST['name'];
			$email = $_POST['m77'];
			$fakemail = $_POST['m66'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];

			//Mail build
			$recipient = "Mchmld88@gmail.com";
			$title = "Contact Form: $subject";
			$message_body = "Message: $message";
			$mailheader = "From: $email \r\n";
			$titles = 'From: form@github.com/malki-om/form.git' . "\r\n" .
			    "Reply-To: " . $email . "\r\n" .
			    'X-Mailer: PHP/' .phpversion();

			if ($fakemail == "") {
				$_SESSION['flash'] = "Your message has been sent!";
				$_SESSION['mail_status'] = TRUE;
				mail($recipient, $title, $message_body, $titles) or die("Contact Mailer Error!");
			} else {
				$_SESSION['mail_status'] = FALSE;
				$_SESSION['flash'] = "Your message was not sent, we think you are a bot!";
			}

			//header('Content-type: application/json');
			//echo json_encode($data);
			} else {
				$_SESSION['mail_status'] = FALSE;
				$_SESSION['flash'] = "Wrong CAPTCHA Code!";
			}
		}

	unset($_SESSION['captcha_keystring']);

?>

<div class="contact-form-div">
	<div class="flash-div <?php if (isset($_SESSION['mail_status'])) echo ($_SESSION['mail_status'] ? 'mail-sent-true' : 'mail-sent-false'); ?> ">
		<?php if (isset($_SESSION['flash'])) { echo $_SESSION['flash'];	unset($_SESSION['flash']); } ?>
	</div>
	<form id="contact" method="POST">
		<input name="name" type="text" placeholder="Your Name*" minlength="3" maxlength="50" required autofocus/>
		<input id="m66" name="m66" type="email" placeholder="Your Valid Email*" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" minlength="8" maxlength="255"/>
		<input id="m77" name="m77" type="email" placeholder="Your Valid Email*" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" minlength="8" maxlength="255" required />
		<input name="subject" type="text" placeholder="The Subject*" minlength="3" maxlength="100" required />
		<textarea name="message" placeholder="Message Body*" rows="10" minlength="10" required></textarea>
		<div class="kcaptcha-div">
			<img src="./easycontactform/kcaptcha/?<?php echo session_name()?>=<?php echo session_id()?>">
			<div>
				<a class="credits-link" href="https://easyphpcontactform.com" target="_blank">Credits: easyphpcontactform.com</a>
				<input type="text" name="keystring" placeholder="Image Code *" />
			</div>
		</div>
		<input type="submit" value="submit" />
	</form>
</div>
