<?php
ob_start();
$VeritabaniBaglantisi= new PDO("mysql:host=localhost;dbname=hazalzengin;charset=UTF8","root","");
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if(isset($_POST["Email"])){
  $GelenEmailAdresi=$_POST["Email"];
}else{
  $GelenEmailAdresi="";
}

 echo $GelenEmailAdresi;
if($GelenEmailAdresi!="")
{
  $mail = new PHPMailer\PHPMailer\PHPMailer();
  $mail->IsSMTP();
  $MailIcerigiHazirla= "123456789";
       $KontrolSorgusu=$VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ? ");
       $KontrolSorgusu->execute([$GelenEmailAdresi]);
       $KullaniciSayisi=$KontrolSorgusu->rowCount();
       $KullaniciKaydi= $KontrolSorgusu->fetch(PDO::FETCH_ASSOC);
       $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.yandex.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "hazal1311@yandex.com";
        $mail->Password = "lubalgyzhxaxivpm";
        $mail->SetFrom("hazal1311@yandex.com");
        $mail->Subject = "0000";
        $mail->Body = $MailIcerigiHazirla;
        $mail->AddAddress($GelenEmailAdresi);

        if(!$mail->Send()) {
          echo "hazal";
           echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
           ?>
           <h1><p style="color:red">  MESSAGE HAS BEEN SENT..</p></h1>
           <?php
        }

      }
    else {
      header("Location:sifremiunuttumsonuc.php?durum=no");
      exit();
    }

?>
