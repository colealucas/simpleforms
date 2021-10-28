<?php
/**
 * Simple Forms Config Generator
 *
 * @link http://weblucas.info/
 *
 * @package simpleforms
 */

function secure($var) {
    if( !empty( $var ) ) return stripslashes(htmlspecialchars(trim($var)));
    return "";
}

$receiver_email          = ( !empty( $_POST['receiver_email'] ) ? secure($_POST['receiver_email']) : "" );
$email_subject           = ( !empty( $_POST['subject'] ) ? secure($_POST['subject']) : "New Form Submission" );
$company_name            = ( !empty( $_POST['company_name'] ) ? secure($_POST['company_name']) : "Simple Forms" );
$enable_auto_responder   = ( !empty( $_POST['enable_auto_responder'] ) ? secure($_POST['enable_auto_responder']) : "" );
$auto_responder_subject  = ( !empty( $_POST['auto_responder_subject'] ) ? secure($_POST['auto_responder_subject']) : "Your submission received" );
$send_copy_to            = ( !empty( $_POST['send_copy_to'] ) ? secure($_POST['send_copy_to']) : "" );
$use_recaptcha           = ( !empty( $_POST['use_recaptcha'] ) ? secure($_POST['use_recaptcha']) : "" );
$recaptcha_v3_secret_key = ( !empty( $_POST['recaptcha_v3_secret_key'] ) ? secure($_POST['recaptcha_v3_secret_key']) : "" );

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Config Generator - SIMPLE FORMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!-- favicon icon -->
    <link rel="icon" href="images/favicon.png" type="image/x-icon" />
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon" />

    <!-- Simple Forms Styles -->
    <link rel="stylesheet" href="simple-forms/css/simple-forms.css">

    <!-- Used for demonstration purposes -->
    <link rel="stylesheet" href="css/demo.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>


<div class="section generator gradient white-content">
    <div class="simple-container">

        <div class="content">
            <div class="section-title">
                <h2>
                    Config Generator
                </h2>

                <p>
                    Configure your <strong>Simple Form</strong>.
                </p>

                <p>
                    <a href="index.html" class="tap">< Homepage</a>
                </p>
            </div>
        </div>

        <div class="grid">
            <div class="grid-col-md-6">
                <div class="sf-wrapper">
                    <form id="generator-form" class="simple-form config-form white underline-style" method="post" action="">
                        <div class="form-heading">
                            <h4>Generate</h4>
                            <p>
                                Your config file.
                            </p>
                        </div>

                        <label>
                            <strong>Receiver email address: *</strong>
                            <input type="text" name="receiver_email" placeholder="Receiver email*" class="validate-email" value="<?php echo $receiver_email; ?>" required="required" title="" min="8">
                        </label>

                        <label>
                            <strong>Email subject: *</strong>
                            <input type="text" name="subject" placeholder="Subject*" value="<?php echo $email_subject; ?>" min="2">
                        </label>

                        <label>
                            <strong>Company name: *</strong>
                            <input type="text" name="company_name" placeholder="Your Company Name*" value="<?php echo $company_name; ?>" required="required" min="2">
                        </label>

                        <div class="spacing30"></div>

                        <label>
                            <strong>Auto responder:</strong>
                            <select name="enable_auto_responder" title="" >
                                <option value="true" <?php if ($enable_auto_responder == "true") echo 'selected'; ?>>Use auto responder</option>
                                <option value="false" <?php if ($enable_auto_responder == "false") echo 'selected'; ?>>Disable auto responder</option>
                            </select>
                        </label>

                        <label>
                            <strong>Autoresponder subject:</strong>
                            <input type="text" name="auto_responder_subject" placeholder="Autoresponder subject*" value="<?php echo $auto_responder_subject; ?>" required="required" min="2">
                        </label>

                        <label>
                            <strong>Send copy to:</strong>
                            <input type="text" name="send_copy_to" placeholder="comma separated emails" value="<?php echo $send_copy_to; ?>">
                        </label>

                        <label>
                            <strong>Google reCaptcha v3 settings:</strong>
                            <select name="use_recaptcha" title="" required="">
                                <option value="false" <?php if ($use_recaptcha == "false") echo 'selected'; ?>>Do not use reCaptcha</option>
                                <option value="true" <?php if ($use_recaptcha == "true") echo 'selected'; ?>>I will use reCaptcha</option>
                            </select>
                        </label>

                        <label>
                            <strong>reCaptcha v3 Secret Key:</strong>
                            <input type="text" name="recaptcha_v3_secret_key" placeholder="SECRET KEY" value="<?php echo $recaptcha_v3_secret_key; ?>">
                        </label>

                        <div class="spacing40"></div>

                        <div class="simple-captcha-wrapper"></div>

                        <div class="form-submit text-center">
                            <button type="submit">Generate</button>
                        </div>

                        <div class="consent">
                            <label class="custom-checkbox-label">
                                <input type="checkbox" class="simple-consent-checkbox" name="consent" value="agree" required="" checked="" title="">
                                <span class="custom-checkbox-button"></span>

                                By clicking the “Generate” button you agree to process your pesronal info.
                            </label>
                        </div>

                        <div class="server-response"></div>
                        <input type="hidden" name="sf-language" value="ro" title="">
                    </form>
                </div>

                <div class="text-center">
                    <div class="spacing30"></div>

                    <p>
                        Generate your reCaptcha keys <a href="https://www.google.com/recaptcha/admin/create" target="_blank">here</a>.
                    </p>
                </div>
            </div>
            <div class="grid-col-md-6">
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>

                    <div class="generator-output">
                        <h4>
                            What's next ?
                        </h4>
                        <ul>
                            <li><strong>Copy</strong> generated code bellow.</li>
                            <li><strong>Replace</strong> your config file source code.</li>
                        </ul>

                        <p>
                            <strong>NOTE:</strong> Config file is located in <strong>/simple-forms/config.php</strong>.
                        </p>
                    </div>

                    <div class="generator-result">
<pre class="language-php" style="font-size: 12px!important;"><code>&lt;?php
/**
 * Simple Forms Configuration File
 *
 * @link http://weblucas.info/
 *
 * @package simpleforms
 */

/***********************************************************************************
 * Fixme: DEFAULT MAILING SETTINGS
 *
 * customize your mailing options,
 * do not remove any option line!
 ***********************************************************************************/

// Required, receiver email address
define('YOUR_EMAIL', "<?php echo $receiver_email ?>");

// Required, email subject
define('EMAILS_SUBJECT', "<?php echo $email_subject ?>");

// Required, your company/brand name
define('COMPANY_NAME', "<?php echo $company_name ?>");

// enable auto responder
define('ENABLE_AUTO_RESPONDER', <?php echo $enable_auto_responder ?>);

// Auto responder email subject
define('AUTO_RESPONDER_EMAILS_SUBJECT', "<?php echo $auto_responder_subject ?>");

// not required, comma separated emails: myemail@gmail.com, myemail2@gmail.com
define('SEND_COPY_TO', "<?php echo $send_copy_to ?>");

// not required, reply to email address
define('REPLY_TO', "");



/*************************************************************************************
 * SECURE SSL/TLS CONNECTION SETTINGS (* required if SMTP_AUTHENTICATION = true)
 *
 * Use SECURE CONNECTION to prevent emails to be dropped in SPAM folder
 * or/if your server/hosting does not support other mailing options
 *
 * If SMTP_AUTHENTICATION set to true please provide SMTP SETTINGS bellow
 * see docs for more info (Back-end Configuration): https://weblucas.info/projects/simple-forms/simple-forms/help/
 ************************************************************************************/

// possible values: true | false
define('SMTP_AUTHENTICATION', false);

$SMTP_SETTINGS = [
    "SMTP_HOST"     => "mail.hostname.com",
    "SMTP_USER"     => "user@domain.com",
    "SMTP_PASSWORD" => "***************",
    "SMTP_SECURE"   => "ssl", // possible values: ssl | tls
    "SMTP_PORT"     => 465,
    "SMTP_DEBUG"    => 0      // show errors description if connection failed, possible values: 0 | 1
];



/*************************************************************************************
 * GOOGLE RECAPTCHA (ANTI SPAM) SETTINGS
 *
 * Generate your keys here: https://www.google.com/recaptcha/admin/create
 ************************************************************************************/

// possible values: true | false
define('USE_RECAPTCHA', <?php echo $use_recaptcha ?>);

// recaptcha version 3 SECRET_KEY (Required if USE_RECAPTCHA set to true)
define("RECAPTCHA_V3_SECRET_KEY", "<?php echo $recaptcha_v3_secret_key ?>");



/*************************************************************************************
 * FILES SETTINGS
 *
 * Choose to delete or keep uploaded files on your hosting after receiving emails
 * deleted files from your hosting will be available on your email only.
 ************************************************************************************/

// possible values: true | false
define("DELETE_FILES_AFTER_MAIL", true);</code>
</pre>

                    </div>
                <?php else : ?>
                    <div class="generator-output">
<pre>
// Please fill the form to generate your config file.
</pre>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="spacing40"></div>

        <div class="copy">
            &copy; 2021 - Simple Forms
        </div>

    </div>
</div>



<!-- PRISM.js - Syntax Highlighter (Code highlight) -->
<script src="js/prism.js"></script>

<!-- PARTICLES.js - Particles Animation -->
<script src="js/particles.min.js"></script>

<!-- Simple Forms Core Files -->
<script src="simple-forms/js/simple-forms-translations.js"></script>
<script src="simple-forms/js/simple-forms.js"></script>

<!-- DEMO.js - Used for demonstration purposes -->
<script src="js/generator.js"></script>
</body>
</html>