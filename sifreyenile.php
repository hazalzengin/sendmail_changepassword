<html>
     <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Password Change</title>
     </head>
    <body>
    <h1>Change Password</h1>
   <form method="POST" action="sifremiyenilesonuc.php">
    <table>
    <tr>
   <td>Email Adresinizi Giriniz:</td>
    <td><input type="email" size="10" name="Email"></td>
    </tr>


  <tr>
    <td>Yeni Şifrenizi Giriniz:</td>
    <td><input type="password" size="10" name="newpassword"></td>
    </tr>
    <tr>
   <td>Yeni Şifrenizi Tekrar Giriniz:</td>
   <td><input type="password" size="10" name="confirmnewpassword"></td>
    </tr>
    </table>
    <p><input type="submit" value="Update Password">
    </form>
   <p><a href="home.php">Home</a>
   <p><a href="logout.php">Logout</a>
   </body>
    </html>
