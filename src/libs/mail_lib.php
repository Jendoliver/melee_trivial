<?php // MAIL FUNCTIONS AND CONSTANTS php mailer <- 
    $SUPPORT_MAIL = "jandol1996@hotmail.com";
    
    function send_confirmation_mail($to)
    {
        $title = "MELEE TRIVIAL - ACCOUNT CONFIRMATION";
        $msg = '
        <html>
            <head>
                <title>Melee Trivial - ACCOUNT CONFIRMATION</title>
            </head>
            <body bgcolor="#FFEEAA">
                <p>Your account has been successfully created. Please now proceed to click <a href="https://melee-trivial-magners.c9users.io/confirmaccount.php">HERE</a> to confirm your account.
            </body>
        </html>
        ';
        
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'To: '.$to."\r\n";
        $headers .= 'From: Melee Trivial Support <kys@noreply.com>' . "\r\n";
        
        if(!(mail($to,$title,$msg,$headers)))
        {
            $message = "ERROR ENVIANDO MAIL";
            echo "<script type='text/javascript'>
            alert('$message');
            window.location = 'generarpregunta.php';
            </script>";
        }
        echo "KE PASA PALURDO";
    }
?>