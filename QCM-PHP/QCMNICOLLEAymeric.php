<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>QCM</h1>
<br><br>

<form method="post" action="recupqcm.php">
<?php
$id = mysqli_connect("127.0.0.1","root","","qcm");
mysqli_query($id, "SET NAMES 'utf8'");
$requete = "select * from questions order by rand() limit 10";
$reponse = mysqli_query($id, $requete);
while($ligne = mysqli_fetch_assoc($reponse))
{
echo "<div id = 'conteneur'>".$ligne["libelleQ"]."</div>";
$idq = $ligne["idq"];
$requete2 = "select * from reponses where idq = $idq";
$reponse2 = mysqli_query($id, $requete2);
while($ligne2 = mysqli_fetch_assoc($reponse2)){
    echo "<input type='radio' name = '$idq' value = '".$ligne2["idr"]."' required>".$ligne2["libeller"]."<br><br>";
   
}
}
?>
<input type="submit" value = "Envoyer">

</form>
</body>
</html>
