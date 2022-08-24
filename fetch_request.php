<?php

//upload.php

include 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if($_FILES["select_excel"]["name"] != '')
 {
  
  $allowed_extension = array('xls', 'xlsx');
  $file_array = explode(".", $_FILES['select_excel']['name']);
  $file_extension = end($file_array);

  if(in_array($file_extension, $allowed_extension))
    {
    
     $reader = IOFactory::createReader('Xlsx'); // :: Scope Resolution , is a token that allows access to static, constant, and overridden properties or methods of a class.
     $spreadsheet = $reader->load($_FILES['select_excel']['tmp_name']);

     include('css/stylephpoffice.php'); //style du tableau avec propriétés de la librairie

     $writer = IOFactory::createWriter($spreadsheet, 'Html');
     $message = $writer->save('php://output');
     $couleurbg = 'bg.png'; 
 
    //  code for wrting data into tmp_html
    //  $data = $_POST["file_content"];
    //  $temporary_html_file = './tmp_file/' . time()  . '.html';
    //  $htmlContent = file_put_contents($temporary_html_file, $_POST["file_content"]);
     
    }
   else
   {
     $message = '<div class="alert alert-danger">Seulement les fichiers .xls ou .xlsx autorisés</div> <button class="btn btn-danger" onClick="window.location.reload();">Rafraichir la page</button>';
      $couleurbg = 'bg-wrong.png';
   }

}
else
{
   $message = '<div class="alert alert-danger">Veuillez sélectionner un fichier</div> <button class="btn btn-danger" onClick="window.location.reload();">Rafraichir la page</button>';
   $couleurbg = 'bg-wrong.png';
}

//echo le tableau et va overwrite le css existant (avec des !important) et va activiver et désactiver des fonctionnalités
echo "$message";
require_once('css/overwritestyle.php');
?>