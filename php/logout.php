<?php
session_start();
unset($_SESSION['logged']);
unset($_SESSION['username']);
unset($_SESSION['privilege']);
unset($_SESSION['id']);

echo "<script>
          alert('You have been logged out.');
          window.location.href='../';
          </script>";
