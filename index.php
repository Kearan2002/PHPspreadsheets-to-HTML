<!DOCTYPE html>
<html>
   <head>
     <title>Insert EXCEL Data into Database using PHP-AJAX ( Using PHP Spreadsheet )</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="/css/style.css">
     <script src="js/jquery-3.6.0.min.js"></script>
    </head>
   <body>
   <h2 class="titrepageavant">Insérer des données Excel avec PHP-AJAX-JQUERY (En utilisant PHPSpreadsheet )</h2>
   <img src="img/Logo-cci-nc.svg.png" alt="logo CCI" class="logoimg"/><h1 class="titrepageaprès">Annuaire du label éco-responsable</h1><img src="img/default-label-ecoresponsable.png" alt="logo CCI" class="logoimg"/>
     <div class="container">
      <div class="table-responsive">
      <br/>
          <form method="post" id="load_excel_data"  enctype="multipart/form-data">
            <table class="table">
              <tr class="disparitionformulaire">
            
                <td width="25%" align="right">Choisi le fichier :</td>
                <td><input type="file" id="select_excel" name="select_excel"/></td>
                <!-- <input type="hidden" name="file_content" id="file_content" /> -->
                <td width="35%"><input type="submit" id="load" name="load" class="btn btn-primary" /></td>
              </tr>
             
            </table>
              <table class="table" id="show_excel_data">
            </table>

           </form>
           <br/>
        <br/>

      </div>
     </div>
  </body>
</html>

<script>
$(document).ready(function(){
  $('#load_excel_data').on('submit', function(event){
    event.preventDefault();
    $.ajax({
      url:"/fetch_request.php",
      method:"POST",
      data:new FormData(this), // It automatically capture form data 
      contentType:false, // contentType When sending data to the server, use this content type.
      cache:false,
      processData:false,
      success:function(data)
      {
        $('#show_excel_data').html(data);
        $('table').css('width','100%');

        
        var table_content = $('#show_excel_data').html();
        $('#file_content').val(table_content);
 
        var datass = $('#file_content').val();

       //$('#load_excel_data').submit();
    }
   }); 
  });
});
 
</script>
