<?php
    require_once('./php/dbconnect.php');
    session_start();
    // $cart->updateCartQuantity($_POST["cart_qty"], $_POST["cart_id"]);
    // updateCartQuantity($_POST["cart_qty"], $_POST["cart_id"]);
    // $updateQuantity = mysqli_query($con, "UPDATE cart SET cart_qty = $cart_qty WHERE cart_id = $cart_id;");
    if(!empty($_POST["cart_id"]))
    {
        $cart_id = $_POST["cart_id"];
        {
            mysqli_query($con, "UPDATE cart SET cart_qty = cart_qty - 1 WHERE cart_id = $cart_id;");
            // if($result)
            // {
            //     if($cart_qty == 0)
            //     {
            //         echo '<script>
            //         function remove(cart_id) {
            //         $.ajax({
            //                 method: "POST",
            //                 url: "cartremove.php",
            //                 data: {cart_id: cart_id},
            //             success: (response) =>
            //             {
            //                 console.log(response);
            //                 location.reload();
            //             }
            //         });
        
            //     }
            //     </script>';
            //     }
            // }
        }
    }
?>