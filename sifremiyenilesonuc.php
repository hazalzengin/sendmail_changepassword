<?php
session_start();
//include 'kontrol.php';
  $VeritabaniBaglantisi= new PDO("mysql:host=localhost;dbname=hazalzengin;charset=UTF8","root","");
  $VeritabaniBaglantisi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $GelenEmailAdresi = $_POST['Email'];
       $newpassword = $_POST['newpassword'];
       $confirmnewpassword = $_POST['confirmnewpassword'];
       $KontrolSorgusu=$VeritabaniBaglantisi->prepare("SELECT * FROM uyeler WHERE EmailAdresi = ? ");
       $KontrolSorgusu->execute([$GelenEmailAdresi]);
       $KullaniciSayisi=$KontrolSorgusu->rowCount();
       $KullaniciKaydi= $KontrolSorgusu->fetch(PDO::FETCH_ASSOC);
       if(!$KullaniciKaydi)
       {
       echo "Bu mail hesabı bulunamadı";
       }
       else{
       if($newpassword==$confirmnewpassword){
       $sql=("UPDATE uyeler SET Sifre= :newpassword WHERE EmailAdresi = :GelenEmailAdresi");
       $stmt = $VeritabaniBaglantisi->prepare($sql);
       $stmt->bindParam(":newpassword", $newpassword, PDO::PARAM_STR);
       $stmt->bindParam(":GelenEmailAdresi", $GelenEmailAdresi, PDO::PARAM_STR);
   // Sorguyu çalıştır
       if ($stmt->execute()) {
       echo "Şifre başarıyla güncellendi.";
       }
       else {
       echo "Şifre güncelleme hatası."; }
     }
     else{
       echo "şifre ve şifre tekrar birbirine uymamaktadır.";
     }
   }


     ?>
