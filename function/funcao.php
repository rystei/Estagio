<?php
function tbarrutf9($sql){ include("lib/lib.php"); 
    $arr= $con->executeQuery($sql)->getArraySet2();
 return $arr;
}
function procpalavras ($frase, $palavras, $resultado = 0) {$resultado='';
foreach ( $palavras as $key => $value ) {
      $pos = strpos($frase, $value);
      if ($pos !== false) {$frase= str_replace( $value,'´'.$value.'´',$frase); }
      }  
      
  return $frase;
}
#{Retoran o ip do cliente
function pega_ip()
       { if (getenv('HTTP_X_FORWARDED_FOR'))
                  {$ip=getenv('HTTP_X_FORWARDED_FOR');                       }
            else { $ip=getenv('REMOTE_ADDR'); }        
          return $ip;        
       }
function retira_acentos($texto) 
         {$array1 = array( "á", "à", "â", "ã", "ä", "é", "è", "ê", "ë", "í", "ì", "î", "ï", "ó", "ò", "ô", "õ", "ö", "ú", "ù", "û", "ü", "ç" 
                         , "Á", "À", "Â", "Ã", "Ä", "É", "È", "Ê", "Ë", "Í", "Ì", "Î", "Ï", "Ó", "Ò", "Ô", "Õ", "Ö", "Ú", "Ù", "Û", "Ü", "Ç" ); 
          $array2 = array( "a", "a", "a", "a", "a", "e", "e", "e", "e", "i", "i", "i", "i", "o", "o", "o", "o", "o", "u", "u", "u", "u", "c" 
                          , "A", "A", "A", "A", "A", "E", "E", "E", "E", "I", "I", "I", "I", "O", "O", "O", "O", "O", "U", "U", "U", "U", "C" ); 
          return str_replace( $array1, $array2, $texto); 
         }
/*Destaca dados na pesquisa de beneficiario*/
function pes_bd_destaque($TXT,$CRI) 
         {$r=$TXT;
          $c=  explode(' ', $CRI); 
          while (list($chave,$valor) = each($c))
                { //if (str_ireplace($valor, '?'.$valor.'[', $r))  
                    //    $r=strtoupper ( str_ireplace($valor, '?'.$valor.'[', $r)); 
                 // else  
                 $r=strtoupper ( str_ireplace($valor, '?'.$valor.'[', retira_acentos($r))); 
                 }
          $r=str_ireplace('?', '<samp class="destaque">', $r);
          $r=str_ireplace('[', '</samp>', $r);
          return $r; 
         }
  
 function MontaSelect($nome,$onchange,$arr,$selcted,$style)
       {$id=str_replace( array('[',']'), array('',''), $nome);
       $select='<select name="'.$nome.'" id="'.$id.'" onchange="'.$onchange.'" style="'.$style.'"> '  ;        
        $select.= '<option value=""> ----------- </option>';  
        $i=0;  
        foreach($arr as $ind => $dados)
           {if ($dados['CODIGO']==0)$dados['CODIGO']='';
            if ($selcted!='')  if($selcted==$i) $sel='selected'; else $sel='';
            if($dados['CODIGO']!='')$value='value="'.$dados['CODIGO'].'" ';
               else $value='';
            $select.= '<option '.$value.$sel.'>  '.$dados['NOME'].' </option>';
            $i++;
           }
        $select.='</select>';
        return $select;
      }
/*gerar relatorio e excell de uma array */  
function downloadrelatorioR($relatorio, $tituloDownload)
  	   {header("Content-type: application/msexcel");
	    header("Content-Disposition: attachment; filename=".$tituloDownload.".xls");
	    echo '<table border="1" bordercolor="#000000" align="center">';
	    //Imprime primeira linha (título)
	    echo '<tr align="center" valign="middle" style="color:#FFFFFF; font-weight:800; font-size:20px;">';
	    foreach($relatorio[0] as $nomeColuna => $valorFirstCampo)
	    	  {echo '<td bgcolor="#000000">'.$nomeColuna.'</td>';
		      }
	echo '</tr>';
		//Imprime o resto da tabela - #99FFFF - #FFFF99
	$thisbgcolor = "#CCCCCC";
	foreach($relatorio as $linhas)
		{$thisbgcolor = $thisbgcolor == "#FFFFFF" ? "#CCCCCC" : "#FFFFFF";
		 echo '<tr align="center" valign="middle">';
		 foreach($linhas as $colunas)
		{echo '<td bgcolor="'.$thisbgcolor.'" >'.$colunas.'</td>';}
		 echo '</tr>';
		 }
	echo '</table>';
	}
 
 /* Ver nome do estado atraves Da UF*/                     
function uf_estado($UF){  
         switch ($UF){
               case'AC': $estado ='AC-Acre'; break;                    case 'AL': $estado = 'AL-Alagoa'; break;
               case 'AP': $estado = utf8_decode('AP-Amapá'); break;                    case 'AM': $estado =  'AM-Amazonas' ; break;
               case 'BA': $estado = 'BA-Bahia' ; break;                   case 'CE': $estado =  'CE-Cerá' ; break;
               case 'DF': $estado = 'DF-Distrito Federal'; break;         case'ES': $estado = 'ES-Espirito Santo' ; break;
               case 'GO': $estado =  'GO-Goias'; break;                   case'MA': $estado =  'MA-Maranhão' ; break;
               case 'MT': $estado = 'MT-Mato Grosso'; break;              case'MS': $estado = 'MS-Mato Grosso do sul'; break;
               case 'MG': $estado = 'MG-Minas Gerais'; break;             case 'PA': $estado = 'PA-Para' ; break;
               case'PB': $estado =  'PB-Paraiba' ; break;                 case 'PR': $estado = 'PR-Paraná'; break;
               case'PE': $estado = 'PE-Pernanbuco'; break;               case 'PI': $estado = 'PI-Piaui'; break;
               case'RJ': $estado = 'RJ-Rio de Janeiro' ; break;          case 'RN': $estado ='RN-Rio Grande do Norte'; break;
               case 'RS': $estado = 'RS-Rio Grande do Sul'; break;       case 'RO': $estado = 'RO-Rodônia'; break;
               case 'RR': $estado = 'RR-Roraima'; break;                  case 'SC': $estado ='SC-Santa Catarina'; break;
               case 'SP': $estado = 'SP-São Paulo' ; break;              case 'SE': $estado = 'SE-Sergipe' ; break;
               case 'TO': $estado =  'TO-Tocantins'; break;
               default: $estado =  'ERRO';
               }
        return    $estado ;
        }
 /* Ver nome do mes*/ 
function mes_nome($n)
     {switch($n)
      {
	  case 1: return 'Janeiro';
	  case 2: return 'Fevereiro';
	  case 3: return 'Mar&ccedil;o';
	  case 4: return 'Abril';
	  case 5: return 'Maio';
	  case 6: return 'Junho';
	  case 7: return 'Julho';
	  case 8: return 'Agosto';
	  case 9: return 'Setembro';
	  case 10: return 'Outubro';
	  case 11: return 'Novembro';
	  case 12: return 'Dezembro';
	  default: return $n;
      }
   }
  /* Protejer do sql injection*/       
function anti_injection($sql)
        {// remove palavras que contenham sintaxe sql
         $sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/","",$sql);
         $sql = trim($sql);//limpa espaços vazio
         $sql =str_replace("'","''",$sql);
         $sql = strip_tags($sql);//tira tags html e php
                return $sql;
         }


function calculaTempo($hora_inicial, $hora_final)
       { $i = 1;
       $tempo_total;
       $tempos = array($hora_final, $hora_inicial);
       foreach($tempos as $tempo)
             {$segundos = 0;
             list($h, $m, $s) = explode(':', $tempo);
             $segundos += $h * 3600;
             $segundos += $m * 60;
             $segundos += $s;
             $tempo_total[$i] = $segundos;
             $i++;
             }
       $segundos = $tempo_total[1] - $tempo_total[2];
       $horas = floor($segundos / 3600);
       $segundos -= $horas * 3600;
       $minutos = str_pad((floor($segundos / 60)), 2, '0', STR_PAD_LEFT);
       $segundos -= $minutos * 60;
       $segundos = str_pad($segundos, 2, '0', STR_PAD_LEFT);
       return "$horas:$minutos:$segundos";
       }

function time_to_sec($time)
        {$hours = substr($time, 0, -6);
         $minutes = substr($time, -5, 2);
         $seconds = substr($time, -2);
         return $hours * 3600 + $minutes * 60 + $seconds;
        }
function erro_pagina(){return 'view/erro_pagina.html';}

function ex_file($file)
        {if(file_exists($file)) return $file; return erro_pagina();        
        }

 function logsistema($id_log,$obs,$id_pessoa)
        {$dados=$_SESSION[md5($_SESSION["cv_hora"]."usu_login")];   
         $id_log=    isset($id_log)?$id_log:'';
         $id_grupo=  isset($id_grupo)?$id_grupo:'';
         $obs=       isset($obs)?$obs:'';
         $id_pessoa= isset($id_pessoa)?$id_pessoa:'';
         //require_once($_SESSION['BANCO_PML']);
        // echo $_SESSION['BANCO_PML'];
         $conn  = new acao_social();
         $sql="insert into irsas_log_web 
                      (id_log,cod_usuario,quem,onde
                       ,quando,id_entidade,grupos, obsevacao,id_pessoa) 
               values($id_log,'".$dados['CODIGO']."','".$dados['LOGIN']."','".$dados['IP']."',sysdate
                 ,'".$dados['CODIGO_ENTIDADE']."','".$dados['GRUPOS']."','$obs','$id_pessoa')";
        if ($conn->executeUpdate($sql))      {$conn->commit();    }        
        }       
function DataHora_banco() 
        {$conn  = new acao_social();
         $sql="select sysdate D_H from dual" ; 
         $rs = $conn->executeQuery($sql); 
         $quando= $rs->getArraySet2();
         return $quando[0]['D_H']; 
        }

function tabela_banco($relatorio, $txtali,$height,$width )
	{echo '<table bordercolor="#000000" align="center"'
                   . ' border="0" cellspacing="0" align="center" cellpadding="0" '.
                        'style="border-collapse: collapse;" border="1"'.
                        'class="fancyTable">';
		//Imprime primeira linha (t?tulo)
		echo '<tr align="center" valign="middle" style="color:#000000; font-weight:800; font-size:20px;">';
		$i=0;
                foreach($relatorio[0] as $nomeColuna => $valorFirstCampo)
		{
			echo '<td bgcolor="#CCCCCC" width="'.$width[$i].'" >'.$nomeColuna.'</td>';
                        $i++;
		}
		echo '</tr>';
		//Imprime o resto da tabela - #99FFFF - #FFFF99
		$thisbgcolor = "#CCCCCC";               
		foreach($relatorio as $linhas)
		      {
			$thisbgcolor = $thisbgcolor == "#FFFFFF" ? "#CCCCCC" : "#FFFFFF";
			echo '<tr valign="middle">';
                         $i=0;
			foreach($linhas as $colunas)
			{
				echo '<td align="'.$txtali[$i].'"  bgcolor="'.$thisbgcolor.'" >&nbsp;'.$colunas.'&nbsp; </td>';
                                $i++;
			}
			echo '</tr>';
		     }
		echo '</table>';
              }         
  
 function mask($val, $mask)
         {$maskared = '';
         $k = 0;
         for($i = 0; $i<=strlen($mask)-1; $i++)
          {if($mask[$i] == '#')
             {if(isset($val[$k])) $maskared .= $val[$k++];
             }
             else 
               { if(isset($mask[$i]))
                    $maskared .= $mask[$i];
               }
           }
 return $maskared;
}
function dias_semana($data)
{$meses = array (1 => "Janeiro", 2 => "Fevereiro", 3 => "Março", 4 => "Abril", 5 => "Maio", 6 => "Junho", 7 => "Julho", 8 => "Agosto", 9 => "Setembro", 10 => "Outubro", 11 => "Novembro", 12 => "Dezembro");
$diasdasemana = array (1 => "Segunda-Feira",2 => "Terça-Feira",3 => "Quarta-Feira",4 => "Quinta-Feira",5 => "Sexta-Feira",6 => "Sábado",0 => "Domingo");
$variavel = $data;
$variavel = str_replace('/','-',$variavel);
$hoje = getdate(strtotime($variavel));
$diadasemana = $hoje["wday"];
$dia = $hoje["mday"];
$mes = $hoje["mon"];
$nomemes = $meses[$mes];
$ano = $hoje["year"];
$diadasemana = $hoje["wday"];
$nomediadasemana = $diasdasemana[$diadasemana];  
return $nomediadasemana; }

function ParImpar($n)
{if ( $n & 1 ) {
  return "impar";
} else {
  return "par";
}

}        
        
?>
