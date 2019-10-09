<html>
<head>
 <title>SubNet Cal</title>
</head>
<body>
 <center><h1>Subnet Calculator<br><br></h1></center>
 <form action="/" method="post">
  Ip:<br> <input type="text" name="ip">  / <br>
  Mask:<br> <input type="text" name="mask"> <br>
  <input type="submit" value="Submit">
</form>

<pre><h3>
<?php
function cal($ip,$mask,$c,$a){
	$pos=explode(".",$ip);  
	$pos_1=str_pad(base_convert($pos[0],10,2), 8, '0', STR_PAD_LEFT);
	$pos_2=str_pad(base_convert($pos[1],10,2), 8, '0', STR_PAD_LEFT);
	$pos_3=str_pad(base_convert($pos[2],10,2), 8, '0', STR_PAD_LEFT);
	$pos_4=str_pad(base_convert($pos[3],10,2), 8, '0', STR_PAD_LEFT);
	$ip_b=$pos_1.$pos_2.$pos_3.$pos_4;
	if($c==5){
		$p="0";
	for($k=0;!($ip_b[$k]=="0");$k++){
		$p=$p+1;
	}
	return $p;
	}else{
	for($i=$mask;$i<32;$i++){
		$ip_b[$i]=$c;
	}
	$sub=str_split($ip_b,8);
	$sub_1=base_convert($sub[0],2,10);
	$sub_2=base_convert($sub[1],2,10);
	$sub_3=base_convert($sub[2],2,10);
	$sub_4=base_convert($sub[3],2,10);
	$f_ip=$sub_4+$a;
	$sub_id=$sub_1.".".$sub_2.".".$sub_3.".".$sub_4;
	$f_h=$sub_1.".".$sub_2.".".$sub_3.".".$f_ip;
	 $f=array($sub_id,$f_h);  
     return $f;
	}
}
 function du($y){
	   $k="";
	   for($l=1;$l<=$y;$l++){
		$k=$k."1";  
	   }
		$bm=str_pad($k,32, '0', STR_PAD_RIGHT);
		$sub=str_split($bm,8);
		$sub_1=base_convert($sub[0],2,10);
		$sub_2=base_convert($sub[1],2,10);
		$sub_3=base_convert($sub[2],2,10);
		$sub_4=base_convert($sub[3],2,10);
		$lin=$sub_1.".".$sub_2.".".$sub_3.".".$sub_4;
		return $lin;
}
if(!(empty($_POST["ip"]) or empty($_POST["mask"]))){
$ip=$_POST["ip"];
$mask1=$_POST["mask"];
if(strpos($mask1,'.') !== false){
	$tu=$mask1;
	$mask=cal($mask1,0,5,0);
	
}else{
	$tu=du($mask1);
	$mask=$mask1;

}
if($mask==32){
	echo "<br>"."<font color=DA1010>"."Loopback Address   :"."</font>"."<font color=103CDA>".$ip."</font>";
}else{
	echo "<br>"."<font color=DA1010>"."Ip                :"."</font>"."<font color=103CDA>".$ip."</font>";
    echo "<br>"."<font color=DA1010>"."Mask(CIDR)        :"."</font>"."<font color=103CDA>".$mask."</font>";
	echo "<br>"."<font color=DA1010>"."Mask              :"."</font>"."<font color=103CDA>".$tu."</font>";
	$re=cal($ip,$mask,0,1);
	echo "<br>"."<font color=DA1010>"."Subnet Address    :"."</font>"."<font color=103CDA>".$re[0]."</font>";
	if($mask==31){
	}else{
		echo "<br>"."<font color=DA1010>"."First Host Address:"."</font>"."<font color=103CDA>".$re[1]."</font>";
	}
		$re1=cal($ip,$mask,1,(-1));
	if($mask==31){
	}else{
	echo "<br>"."<font color=DA1010>"."Last Host Address :"."</font>"."<font color=103CDA>".$re1[1]."</font>";
	}
	echo "<br>"."<font color=DA1010>"."Broadcast Address :"."</font>"."<font color=103CDA>".$re1[0]."</font>";
	echo "<br>"."<font color=DA1010>"."Number Of Hosts   :"."</font>"."<font color=103CDA>".((2**(32-$mask))-2)."</font>";
	echo "<br>"."<font color=DA1010>"."Number Of Subnets :"."</font>"."<font color=103CDA>".(2**$mask)."</font>";
}
}else{
}
?>
</h3></pre>
<h2>Private Ip Address</h2><br>
10.0.0.0/8 range : 10.0.0.1-10.255.255.254<br>
172.16.0.0/12 range : 172.16.0.0-172.31.255.254<br>
192.168.0.0/16  range : 192.168.0.0-192.168.255.254<br><br>
<a href="https://tools.ietf.org/html/rfc1918"><button>More Information</button></a><br><br>
<h2>Loopback</h2><br>
127.0.0.0/8  range : 127.0.0.1-127.255.255.254<br><br>
<h2>APIPA</h2><br>
Automatic Private Ip Addressing<br>
169.254.0.0/16 range : 169.254.0.1-169.254.255.254<br><br>
<a href="https://tools.ietf.org/html/rfc5735.html"><button>More Information</button></a>
</body>
</head>
