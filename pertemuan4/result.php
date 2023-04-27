<?php
   if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    echo "<div id='result'>Terima kasih, $name, email Anda ($email) telah
    terkirim.</div>";
   }
?>