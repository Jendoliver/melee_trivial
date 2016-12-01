<?php
    function popup_ok($msg, $newpage="none")
    {
        echo "<script type='text/javascript'>
        alert('$msg');
        if('$newpage'!='none')
            window.location = '$newpage';
        </script>";
    }
?>