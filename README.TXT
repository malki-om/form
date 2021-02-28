		EASY PHP CONTACT FORM 2.0 - © easyphpcontactform.com - 2018
-------------------------------------------------------------------------------------------------------------------------------
An online guide is available at: https://easyphpcontactform.com/download

1) Unzip and upload the files to your web server.

2) Make sure you have GD Library installed for PHP on your web server. This is a graphic drawing library
	 that we use to draw CAPTCHA codes for you visitors to enter before sending the mail (to reduce spam mails).

3) Open easycontactform/index.php and edit the following variables under the Mail Build section:
			$recipient - should be the mail where you want to receive email.
			$titles (The From part) – should be a mail on your domain, we use contactform@easyphpcontactscript.com.

4) Add the stylesheet to the page where you want the contact form to be displayed, for example your contact page:
			//contact.php
			<head>
			  ..
			    <link rel="stylesheet" href="assets/css/contact.css">
			  ..
			</head>

5) Add a php include tag where you want the contact form to be displayed, for example your contact page:

			//contact.php
			..
				<?php include './easycontactform/index.php'; ?>
			..

6) Make sure your PHP Mail function is working. This should preconfigured on most hosting solutions. If you host
   your webpage from a VPS you might need to configure it quickly. It just takes a couple of minutes and you can
   read more about it here: https://easyphpcontactform.com/#php_mail_function

7) You should be ready to go, test it!
