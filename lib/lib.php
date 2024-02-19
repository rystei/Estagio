<?php
 error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once('function/funcao.php');
//session_start();
/*Pegar toso o $_post e transforma em uma variavel com o mesmo nome*************/
foreach ($_POST as $campo => $vri) 
             { $$campo = $vri;            
               if (is_array($vri))
                           {$r='arr'.$campo;                           
                            $$r=$vri;                           
                            foreach ($vri as $rotulo => $if):
                                     $v=$campo.'_'.$rotulo;  
                                     $vck=$campo.'_'.$rotulo.'_check'; 
                                     $$v=$if;
                                     $$vck='checked';                                                                                
                                      endforeach;                                       
                              }    
              }       
              
/******************************************************************************/
             $useragent = $_SERVER['HTTP_USER_AGENT'];
 
  if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'IE';
  } elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Opera';
  } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Firefox';
  } elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Chrome';
  } elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
    $browser_version=$matched[1];
    $browser = 'Safari';
  } else {
    // browser not recognized!
    $browser_version = 0;
    $browser= 'other';
  }
 
/*********************************************************************************/

$_POST['acao']=  isset($_POST['acao'])?$_POST['acao']:'';
if ($_POST['acao']=="sair") $_SESSION["login"] ='';   
  
$_SESSION["sessao"]=isset($_SESSION["sessao"])? $_SESSION["sessao"]:'';
if ($_SESSION["sessao"]=="")
              {$session=str_replace(".","",pega_ip().date("dmYHis") );
               $_SESSION["sessao"] =$session;
               } else $session=$_SESSION["sessao"] ;  
 $session_logiS=md5($session.'!@#$%�&*()_+');
               
define('SERVER',$_SERVER["DOCUMENT_ROOT"],true);
define('MODEL_AJAX','modelos/ajax/',true);/*Diretorio de modelos ajax*/
require_once(server.'/sistemas/_phplib_/bancos_pml.php');
require_once(server.'/sistemas/_phplib_/parserwrapper.php');
$pw   = new ParserWrapper();
$con  = new acao_social();
$_POST['acao']= isset($_POST['acao'])?$_POST['acao']:'';
$_POST['objetivo']= isset($_POST['objetivo'])?$_POST['objetivo']:'';
$cssnone='display:none;';
$absolute='position:absolute;';
$relative='position:relative;';
//$pw->addColors(array('#FFFFFF','#E9E9E9')); /*cor degrade tabelas*/
//echo  '<br>'. $_SESSION["sessao"].'<br>';
?>
