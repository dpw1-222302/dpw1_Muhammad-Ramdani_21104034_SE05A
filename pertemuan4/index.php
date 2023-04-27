<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Contoh Website</title>
      <link rel="stylesheet" href="style.css">
   </head>
   <body>
      <?php include('header.php'); ?>
      <main>
         <h1>Selamat datang di website kami</h1>
         <p>Ini adalah contoh website sederhana menggunakan HTML, CSS, dan
            PHP.
         </p>
         <form action="result.php" method="POST">
            <input type="text" name="name" placeholder="Nama">
            <input type="email" name="email" placeholder="Email">
            <button type="submit" name="submit">Kirim</button>
         </form>
      </main>
      <?php include('footer.php'); ?>
   </body>
</html>