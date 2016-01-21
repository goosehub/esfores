<!doctype html>
<html lang="en">
<meta charset="utf-8">
<head>
  <title>
  /s4s/ 2016 Film Festival
  </title>

<!-- For Responsive Mobile -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- For Crawlers -->
  <meta name="keywords" content="esfores">
  <meta name="description" content="esfores">
  <meta name="author" content="Goose">
  <meta name="robots" CONTENT="all">

<!-- Style -->
  <link rel="stylesheet" href="../resources/tools/bootstrap.min.css" />
  <link rel="stylesheet" href="../resources/tools/4chan_yotsuba_style.css" />

  <style>
  /* Background image and overflow fix */
  body {
    background: #FFE url("../resources/pics/fade.png") repeat-x scroll center top;
    overflow-x: hidden;
  }
  /* Board title */
  .boardTitle {
    letter-spacing: 0em !important;
  }
  .reply {
    color: #800000;
    font-family: arial,helvetica,sans-serif;
    font-size: 10pt;
    padding: inherit;
    margin: inherit;
    font-size: inherit;
    border-left: inherit;
  }
  .reply blockquote {
    max-height: 600px;
    overflow: hidden;
  }
  /* Green Text */
  .greentext {
    color:green;
  }
  </style>

<!-- Fonts -->

<!-- Icon -->
  <!-- <link rel="shortcut icon" href="../resources/images/favicon.ico"> -->
<!-- IE Fallback -->
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body>
    <!-- Body -->


<div class="boardBanner">
  <div class="boardTitle">Welcome to the /s4s/ Film Festival!</div>
</div>

<div class="row">
  <div class="col-md-4">
    
  </div>
  <div class="col-md-4">
    <p>Welome to the 26th annual /s4s/ Film Festival. We are currently accepting films for the upcoming /s4s/ Film Festival.</p>

    <hr>

    <?php
    // https://bootstrapbay.com/blog/working-bootstrap-contact-form/
        $result = '';
        if (isset($_POST["submit"])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $youtube = $_POST['youtube'];
            $message = $_POST['message'];
            $human = $_POST['human'];
            $from = 'Potential Film Maker'; 
            $to = 'goosepostbox@gmail.com'; 
            $subject = '/s4s/ Film Festival ';
     
            // Check if name has been entered
            if (!$_POST['name']) {
                echo $errName = 'Please enter your name';
            }
            
            // Check if email has been entered and is valid
            if (!$_POST['email']) {
                echo $errEmail = 'Please enter a valid email address';
            }
            
            //Check if message has been entered
            if (!$_POST['youtube']) {
                echo $errYoutube = 'Please enter your youtube URL';
            }
            
            //Check if message has been entered
            if (!$_POST['message']) {
                echo $errMessage = 'Please enter your message';
            }

            //Check if simple anti-bot test is correct
            if (strtolower($human) != 'topkek') {
                echo $errHuman = 'The answer is topkek';
            }

            // If there are no errors, send the email
            if (!isset($errName) && !isset($errEmail) && !isset($errYoutube) && !isset($errMessage) && !isset($errHuman)) {

              // Load PHPMailer
              require_once '../resources/PHPMailer-5.2.9/PHPMailerAutoload.php';
              $mail = new PHPMailer;

              // Configure
              $mail->CharSet = 'UTF-8';
              $mail->isHTML(false);
              $mail->From = 'webform@esfores.com';
              $mail->FromName = '/s4s/ Director';
              // Add recipitants
              $mail->addAddress('goosepostbox@gmail.com');
              // Construct the email
              $mail->Subject = '/s4s/ Film Festival';
            
              $body = "From: $name\n E-Mail: $email\n Youtube URL: $youtube\n Message:\n $message";

              // Attach message
              $mail->Body = $body;

              // Send mail
              if(!$mail->send()) {
                $result = '<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later</div>';
              } 
              else 
              {
                $result = '<div class="alert alert-success">Thank You! I will be in touch</div>';
              }

            }

        }
    ?>

    <form class="form-horizontal" role="form" method="post" action="index.php">
        <div class="form-group">
            <label for="name" class="col-sm-4 control-label">Namefig</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="name" name="name" placeholder="" value="Anonymous">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-4 control-label">Email</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="email" name="email" placeholder="moot@4chan.org" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="youtube" class="col-sm-4 control-label">Youtube URL</label>
            <div class="col-sm-8">
                <input type="youtube" class="form-control" id="youtube" name="youtube" placeholder="https://www.youtube.com/watch?v=Lj9vGuFAJsU" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="message" class="col-sm-4 control-label">Message</label>
            <div class="col-sm-8">
                <textarea class="form-control" rows="4" name="message"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="human" class="col-sm-4 control-label">Top + Kek = ?</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="human" name="human" placeholder="topkek">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-8 col-sm-offset-4">
                <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-8 col-sm-offset-4">
                <?php echo $result; ?>  
            </div>
        </div>
    </form>

  </div>
  <div class="col-md-4">
    
  </div>
</div>


<br>

</body>
</html>