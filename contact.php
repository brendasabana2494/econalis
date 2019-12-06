<?php
if(isset($_POST['email'])){
    
    //your email goes here
    $email_to = "ogutu@econalis.com";
    $email_subject = "Your email subject line goes here";
    
    function died($error){
        //your error message goes here
        echo "Oops.. seems like there is something wrong with your form";
        echo "I'd hate to ask you to redo the whole process but you kinda have to";
        die();
    }
    
    //expected data here
    if(!isset($_POST['name'])
      !isset($_POST['email'])
      !isset($_POST['message'])) {
        died('Oops..seems like someone pulled the plug. There is a problem');
    }
    
    $name = $_POST['name'];//required
    $email = $_POST['email'];//required
    $message = $_POST['email'];//required
    
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'The name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($message) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "name: ".clean_string($name)."\n";
    $email_message .= "email: ".clean_string($email)."\n";
    $email_message .= "message: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
Thank you for contacting us. We will be in touch with you very soon.
 
<?php
 
}
?>