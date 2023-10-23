<?php

$rijec=$_POST['word'];


if(empty($rijec)) {
    echo "Polje mora biti popunjeno!";
    die ();
} 

$num=strlen($rijec);

$num_samoglasnik=0;
$num_suglasnik=0;

function br_samoglasnik($rijec, $num) {
    $samoglasnici=['a', 'e', 'i', 'o', 'u','A','E','I','O','U'];
    $i=0;
    $br=0;
    for ($i=0; $i<$num; $i++) {
        foreach ($samoglasnici as $letter) {
            if ($letter == $rijec[$i]){
                $br++;
            }
        }
    }
    return $br;
}

$num_samoglasnik=br_samoglasnik($rijec, $num);

function br_suglasnik ($num, $num_samoglasnik) {
    $br=$num-$num_samoglasnik;
    return $br;
}

$num_suglasnik=br_suglasnik($num, $num_samoglasnik);



function getHtmlTable($rijec) {

    $tableHtml = '<table border="1"> 
    <thead> 
        <tr> 
            <th>Riječ</th> 
            <th>Broj slova</th> 
            <th>Broj suglasnika</th> 
            <th>Broj samoglasnika</th> 
        </tr> 
    </thead> 
    <tbody>'; 

    foreach ($rijec as $nasarijec) { 
        $tableHtml .= '<tr> 
                <td>' . $nasarijec[$rijec] . '</td> 
                <td>' . $nasarijec[$num] . '</td> 
                <td>' . $nasarijec[$num_suglasnik] . '</td> 
                <td>' . $nasarijec[$num_samoglasnik] . '</td> 
        </tr>'; 
    } 


    $tableHtml .= '</tbody></table>'; 

    return $tableHtml; 
}

echo getHtmlTable($rijec); 

$wordsJson = json_encode($rijec); 
file_put_contents('words.json', $wordsJson); 
$rijec[]=$rijec;
$wordsJson = file_get_contents('words.json'); 
$rijec = json_decode($wordsJson, true); 
echo $rijec; 