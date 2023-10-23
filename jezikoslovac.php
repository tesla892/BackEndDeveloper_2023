<?php 

if(empty($_POST)){ 
    echo 'Polje je prazno!'; 
    die(); 
}
$nasarijec=$_POST['rijec'];
$br=strlen($nasarijec);

$br_samoglasnik=0;
$br_suglasnik=0;

$br_samoglasnik=broji_samoglasnike($nasarijec, $br);
$br_suglasnik=broji_suglasnike($br, $br_samoglasnik);

function broji_samoglasnike($ulaznarijec, $brojslova){
    $i=0;
    $broj=0;
    $samoglasnici=['a','e','i','o','u','A','E','I','O','U'];
    for ($i=0;$i<=$brojslova;$i++){
        foreach ($samoglasnici as $slovo){
            if($slovo == $ulaznarijec[$i]){
                $broj++;
            }
        }
}
return $broj;
}

function broji_suglasnike ($brojslova, $brojsamoglasnika){
    $broj=$brojslova-$brojsamoglasnika;
    return $broj;
}
echo $br_samoglasnik;
echo $br_suglasnik;

$podatak=file_get_contents('arhiva.json');
$rijeci=json_decode($podatak, true);
echo $rijeci;
$rijeci[] = $nasarijec; 
echo $rijeci;
$podatak = json_encode($rijeci);  
file_put_contents('arhiva.json',$podatak);  
