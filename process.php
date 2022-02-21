<?php
    if (isset($_POST['btn-submit']))
    {
        $UserName = $_POST['name'];
        $Email = $_POST['email'];
        $PhoneNumber = $_POST['phone'];
        $Msg = $_POST['message'];
        $Datetime = date("Y-M-d h:i:sa");

        $query = "INSERT INTO contactus (conName, conEmail, conPhone, conMessage, conDatetime) VALUES ('$UserName','$Email','$PhoneNumber','$Msg','$Datetime')";
        $result = mysqli_query($con,$query);

        if($result)
        {
            $to = $Email;
            
        }
        (empty($UserName) || empty($Email) || empty($PhoneNumber) || empty($Msg))
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
