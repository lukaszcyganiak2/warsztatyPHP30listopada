 <!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>

<form action="" method="get">
<input type="text" name="username" />
 <input type="submit" name="submit" value="Submit me!" />

</form>
<?php
$host = "localhost";
$user = "root";
$password = "";
$db_name = "ksiegarnia";

$connect = mysqli_connect($host,$user,$password);
$db = mysqli_select_db($connect, $db_name);
$inputValue = $_GET['username'];
$zapytanie = "SELECT klienci.idklienta, klienci.imie, klienci.nazwisko,ksiazki.imieautora, ksiazki.nazwiskoautora, ksiazki.tytul FROM zamowienia, ksiazki,klienci WHERE zamowienia.idzamowienia = $inputValue AND zamowienia.idklienta = klienci.idklienta 
AND zamowienia.idksiazki = ksiazki.idksiazki";
$result = mysqli_query($connect,$zapytanie);
$ile = mysqli_num_rows($result);
echo mysqli_num_rows($result);

for ($i =0; $i <$ile; $i++  ) {
    $row = mysqli_fetch_assoc($result);
    $imie_nazwisko_klienta = $row['imie'] . ' '. $row['nazwisko'];
    $id_klienta = $row['idklienta'];
    $imie_nazwisko_autora = $row['imieautora'] . ' '. $row['nazwiskoautora'];
    $tytul = $row['tytul'];
 echo '<p>' . $imie_nazwisko_klienta .     '</p>';
  echo '<p>' .  $imie_nazwisko_autora .     '</p>';
   echo '<p>' . $tytul .     '</p>';


  

 
}

 echo 
   
   '<form action="" method="post">'.
    '<input  type="text" value="'.$imie_nazwisko_klienta.'" name = "kli"/>' . '<br>' .
   '<input  type="text" value="'.$imie_nazwisko_autora.'" name ="aut"/>' .'<br>' .
     '<input  type="text" value="'.$tytul.'" name = "ty"/>' .'<br>' .
    '<input type="submit" name="submit" value="edit!" />'

   .'</form>';

  $nowy_kli = $_POST['kli'];
   echo $nowy_kli .  $id_klienta;
$updata = "UPDATE klienci 
SET `nazwisko` = $nowy_kli WHERE klienci.idklienta = $id_klienta  ";

mysqli_query($connect, $updata)






?>

</body>
</html> 