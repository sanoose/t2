
<?php 
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
       
                 $user = filter_var(   $_POST['Name']  , FILTER_SANITIZE_STRING ); 
                //  $user = $_POST['Name']  ; 
                $Phone = filter_var ($_POST['Phone'] , FILTER_SANITIZE_NUMBER_INT);
                 $EMail = filter_var ($_POST['EMail'] , FILTER_SANITIZE_EMAIL) ;
               
                 $Message = filter_var( $_POST['Message'] , FILTER_SANITIZE_STRING) ;

                 echo  $user . "<br/>". $Phone .  "<br/>" .$EMail     . "<br/>" . $Message ."<br/>";
             $User_Error = '' ; $Email_Error = '' ; $Phone_Error = '' ; $Message_Error = '' ;

                 if (strlen( $user) <= 3 ) {
                     $User_Error = "اسم المستخدم قصير" ;   
                 }

                 if (strlen($Phone) <= 8) {
                    $Phone_Error = "رقم الهاتف يجب ان يحوي 9 ارقام"  ;
                 }
                 if (strlen($Message) <= 8) {
                    $Message_Error  = "الرسالة يجب ان تحوي 10 حروف على الاقل "  ;
                  }

  if (empty($User_Error) && empty($Email_Error) && empty($Phone_Error) && empty($Message_Error) )
  {
    // mail(To , Subject , Message , Header ,parameters) 
            $to = 'lightmagician666@gmail.com' ;
            $subject = 'Contact Us Form' ;
            $header = 'From ' . $EMail  . '\r \n';
            mail($to,$subject,$Message, $header) ;
  }
                
        }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/all.min.css">
    <link rel="stylesheet" href="css/css.css">
    <title>Document</title>
</head>
<body>
    
       <div class="container">


           <form method = "POST" action="<?php echo $_SERVER['PHP_SELF'] ?>"  class = "contact_us" > 
        
           <div class="txt_box">
                    <input type="text" class="txt_name" name = "Name" placeholder = "Enter Your Name"
                    value = "<?php  if (isset($user) )
                    { echo $user ; } ?>"   />
                    <i class="fa fa-user-circle user_icon fa-fw" ></i>
                <?php if (!empty($User_Error)) { 
                   echo  "<div class = 'Error'>$User_Error </div> " ;
                        }?>   
                    <div class = 'Custom_Error'>USER NAME ERROR</div>
             </div>

                    <div class="txt_box">
                    <input type="text" class="txt_phone" name = "Phone" placeholder = "Enter Your Phone Number"
                    value = "<?php  if (isset($Phone)) { echo $Phone ; } ?>"
                    />
                     <i class="fa fa-mobile mobile_icon fa-fw"></i>
                     <?php if (!empty($Phone_Error)) { 
                   echo  "<div class = 'Error'>$Phone_Error </div> " ;
                }?>  
            <div class = 'Custom_Error'>PHONE ERROR</div>
            </div>

            <div class="txt_box">
                    <input type="EMail" class = "txt_email" name = "EMail" placeholder = "Enter Your EMail" 
                   value = "  <?php  if (isset($EMail)) { echo $EMail ; } ?> "
                    /> 
                    <i class="fa fa-envelope Email_icon fa-fw" ></i>
                    <?php if (!empty($Email_Error)) { 
                   echo  "<div class = 'Error'>$Email_Error </div> " ;
                }?>  
                    <div class = 'Custom_Error'>EMAIl  ERROR</div>
             </div>
               
         <div class="txt_box">
                    <textarea class = "txt_message" name = "Message"
                     placeholder = "TypeYour Message Here"><?php  if (isset($Message)) { echo $Message ; } ?></textarea>
                    <?php if (!empty($Message_Error)) { 
                   echo  "<div class = 'Error'>$Message_Error </div> " ;
                }?>  
                       <div class = 'Custom_Error'>MESSAGE  ERROR</div>
              </div>

                    <input type="submit" class="btn_submit"  value = "Send Message">
                    <i class="fa fa-paper-plane send_icon fa-fw"></i>

           </form>
       </div>


<script src = "js/jquery-3.6.0.min.js"></script>
<script src = "java/js.js"></script>
</body>
</html>