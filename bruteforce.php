<html>
<head>
 <title>Brute Force3</title>
 </head>
 <body>
 <center><h1>Brute Force<br>MD5 Cracker<br></h1></center>
 <form action="/" method="post">
  Hash:<br> <input type="text" name="ha"> <br>
  <input type="submit" value="Submit">
</form>
<?php
if(! empty($_POST["ha"])){
function ba($ch){
  $q=0;
  $len=strlen($ch);
  $alp="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
  for($i=0;$i<$len;$i++){
  $loc=strpos($alp,$ch[$i]);
  $y=($loc*(62**($len-$i-1)));
  $q=$q+$y;
  }
    return $q;
}
function ca($an){
  $p="";
  $alp="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
   if($an==0){
     return $an;
   }else{
  for($qu=$an;$qu>0;$qu=(int)($qu/62)){
       $ru=$alp[$qu%62];
     $p=$ru.$p;
     
  }
  return $p;
   }
}
$hash=$_POST["ha"];
for($x=1;$x<=4;$x++){
$combinations=(62**$x);
for($z=0;$z<$combinations;$z++){
  $l=str_pad(ca($z),$x,"0",STR_PAD_LEFT);
  if($hash==md5($l)){
       echo "<h1>".$l."</h1>";
  }
  }
 }
}
?>
</body>
</html>
