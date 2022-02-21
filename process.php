<?php
    if (isset($_POST['btn-send']))
    {
        $UserName = $_POST['name'];
        $Email = $_POST['email'];
        $PhoneNumber = $_POST['phone'];
        $Msg = $_POST['message'];

        if(empty($UserName) || empty($Email) || empty($PhoneNumber) || empty($Msg))
        {
            header('location:index.php?error');
        }
        else
        {
            $to = "auroracutie2022@gmail.com";

            if(mail($to,$PhoneNumber,$Msg,$Email))
            {
                header("location:index.php?success");
            }
        }
    }
    else
    {
        header("location:index.php");
    }
?>
