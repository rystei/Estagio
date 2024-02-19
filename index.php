<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include ('lib/lib.php');  


$sql2 = "select * from cras where (( nome like '%CRAS%' or
nome like '%CREAS%' or
nome like '%CENTRO POP%' or
nome like '%ABORDAGEM%') 
or codigo in (3413,2272,589,650,451,749,629,481,1500,1438,2787,3271,1440,389,2427,527,3417,150,3412,3387,169,1399,3418,1667,3419,849,3027,2338,484,2334)) and
ativo = 'S' order by 2
 ";
$rs2 = $con->executeQuery($sql2);
$servicos = $rs2->getArraySet2();
//print_r($servicos);
	$maria = 'Estudante';
   	echo $pw->parse("TESTE.html");
	

/*echo '<table border="1" style="background:white">';

foreach($servicos as $indice => $id ) {
    echo '<tr> <td>'. $id['NOME'].'</td> <td>'. $id['CPF_CORDENADOR'] . '</td> </tr>';
}
echo '</tab>';*/
?>