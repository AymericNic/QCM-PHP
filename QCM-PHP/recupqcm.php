<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="style.css">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head></p>
<center>
<body>
    <h1>résultat du QCM</h1><br><br>
<?php
    $note = 0;
foreach( $_POST as $key => $value )
{
   $id = mysqli_connect("127.0.0.1","root","","qcm");
mysqli_query($id, "SET NAMES 'utf8'");
$requete = "select * from questions where idq = $key";
$requete2 = "select * from reponses where idr = $value";
$reponse = mysqli_query($id, $requete);
$reponse2 = mysqli_query($id, $requete2);
while($ligne = mysqli_fetch_assoc($reponse))
{
echo "<div id = 'conteneur'><br>".$ligne["libelleQ"]."<br><br>";
while($ligne2 = mysqli_fetch_assoc($reponse2))
{
    echo "tu à répondue : ".$ligne2["libeller"]."<br><br>";
    if($ligne2["verite"] == 1)
    {
    echo "la reponse est vrai</div><br><br>";
    $note++;    
    }else{
        echo "reponse fausse<br><br>";
        $requete3 = "select * from reponses where idq = $key and verite = 1";
        $reponse3 = mysqli_query($id, $requete3);
        while($ligne3 = mysqli_fetch_assoc($reponse3)){
           echo "La bonne reponse était : ".$ligne3["libeller"]."</div><br><br>";
        }
    }
}

}
}
if($note <= 4 ){
    echo "<p style = 
    'background-color: red;
    color:rgb(255, 255, 255);'
        >la note est de ".$note."/10"."</p>";   
}else{
    echo "<p style =' 
background-color: green;
color:rgb(255, 255, 255);'
>la note est de ".$note."/10"."</p>";
}
?>
<br><br>
<a href="QCMNICOLLEAymeric.php">retour au QCM</a>
</body>
</center>
</html>