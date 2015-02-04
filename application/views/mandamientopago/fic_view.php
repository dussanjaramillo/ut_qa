
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$attributes = array('id' => 'pagoFrm', 'name' => 'pagoFrm', 'method' => 'POST');
?>
<center>
<h2>LIQUIDACION FISCALIZACION FIC</h2>
<br><br>
<table border="0">
    <tr>
        <td><b>RAZON SOCIAL&nbsp;</b></td>
        <td><?php echo $informacion[0]['NOMBRE_EMPRESA'] ?>&nbsp;&nbsp;&nbsp;</td>
        
        <td><b> NIT&nbsp;</b></td>
        <td> <?php echo $informacion[0]['CODEMPRESA'] ?>&nbsp;&nbsp;&nbsp;</td>
        
        <td><b>REGIONAL&nbsp;</b></td>
        <td>DISTRITO&nbsp;&nbsp;&nbsp;</td>
        
        <td><b>PERIODO INICIAL&nbsp;</b></td>
        <td>01/04/2013&nbsp;&nbsp;&nbsp;</td>
        
        <td><b>PERIODO FIN&nbsp;</b></td>
        <td>30/04/2013&nbsp;&nbsp;&nbsp;</td>
    </tr><tr><td><br><br></td></tr>
    <tr>
        <td colspan="10">
            <table border="0">
                    <tr>            
                        <td colspan="3" align="right">
                            <b>Fecha Liquidacion</b>            
                        </td>                       
                        <td colspan="4" align="left">
                           <?php
                               $dataFecha = array(
                                          'name'        => 'fechanotificacion',
                                          'id'          => 'fechanotificacion',
                                          'value'       => set_value(),
                                          'maxlength'   => '12',
                                          'readonly'    => 'readonly',
                                          'size'        => '15'
                                        );

                               echo form_input($dataFecha)."&nbsp;";
                               echo form_error('fechanotificacion','<div>','</div>');

                               echo form_hidden('fechanotificaciond',date("d/m/Y"));
                            ?>
                        </td>        
                    </tr>
                    <tr><fieldset>
                    <td><b>VALOR INVERSION&nbsp;</b></td>                        
                    <td>
                        <?php
                        $datainversion = array(
                          'name'        => 'inversion',
                          'id'          => 'inversion',
                          'value'       => set_value(),
                          'maxlength'   => '12',                          
                          'size'        => '15'
                        );

                        echo form_input($datainversion)."&nbsp;";                        
                        ?>
                    </td>
                    <td><b>GASTOS DE FINANCIACION&nbsp;</b></td>                        
                    <td>
                        <?php
                        $datagastos = array(
                          'name'        => 'gastos',
                          'id'          => 'gastos',
                          'value'       => set_value(),
                          'maxlength'   => '12',                          
                          'size'        => '15'
                        );

                        echo form_input($datagastos)."&nbsp;";                        
                        ?>
                    </td>
                    <td><b>IMPUESTOS LEGALES&nbsp;</b></td>                        
                    <td>
                        <?php
                        $dataimpuestos = array(
                          'name'        => 'impuestos',
                          'id'          => 'impuestos',
                          'value'       => set_value(),
                          'maxlength'   => '12',                          
                          'size'        => '15'
                        );

                        echo form_input($dataimpuestos)."&nbsp;";                        
                        ?>
                    </td></fieldset>
                </tr>
                <tr>
                    <td><b>VALOR DE LOTE&nbsp;</b></td>                        
                    <td>
                         <?php
                        $datalote = array(
                          'name'        => 'lote',
                          'id'          => 'lote',
                          'value'       => set_value(),
                          'maxlength'   => '12',                          
                          'size'        => '15'
                        );

                        echo form_input($datalote)."&nbsp;";                        
                        ?>                        
                    </td>
                    <td><b>INDEMNIZACION A TERCEROS&nbsp;</b></td>                        
                    <td>
                         <?php
                        $dataindemnizacion = array(
                          'name'        => 'indemnizacion',
                          'id'          => 'indemnizacion',
                          'value'       => set_value(),
                          'maxlength'   => '12',                          
                          'size'        => '15'
                        );

                        echo form_input($dataindemnizacion)."&nbsp;";                        
                        ?>                        
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br><br> 

 <input type="hidden" name="gItcant" id="gItcant" value="">
           
            <table border="0"><!--  TABLA GENERAL  -->                
                <tr>
                    <td align="right">
                        <button id="normativa" class="btn btn-success" title="Normativa">LIQUIDACION NORMATIVA</button>
                        <br><br><br>
                    </td>
                    <td align="left">
                        <button id="presuntiva" class="btn btn-success" title="Presuntiva">LIQUIDACION PRESUNTIVA</button>
                        <br><br><br>
                    </td>
                </tr>
                
                <tr id="secundarios" style="display:none">
                    <td align="right">
                        <button id="costo" class="btn btn-success" title="Todo Costo">CONTRATO A TODO COSTO</button>
                        <br><br><br>
                    </td>
                    <td align="left">
                        <button id="obra" class="btn btn-success" title="Mano de Obra">CONTRATO MANO DE OBRA</button>
                        <br><br><br>
                    </td>
                </tr>
                
                <tr id="tableInfo">                    
                    <td colspan="2" align="right">
                        <!--  BOTON QUE ACTIVA FUNCION DE AÑADIR CELDAS  -->    
                        <input type="button" size="20" class="btn btn-success" value="Adicionar Fila" style="width:103px" id="add"  name="add" />
<!--                        <input type="button" size="20" class="btn btn-success" value="Incluir" style="width:103px" id="include"  name="include" />-->
                        <br><br>
                        <table id="campos"><!--  TABLA QUE GUARDA LA INFORMACION DE LA TABLA DINAMICA  -->

                        </table><!--  FIN TABLA QUE GUARDA LA INFORMACION DE LA TABLA DINAMICA  -->  
                    </td>
                </tr>
                <tr>
                    <td align="center" colspan="2">                        
                        <br><br><br>
                        <div id="error"> </div>
                    </td>
                </tr>                        
            </table><!--  FIN TABLA GENERAL  -->       
            
            <div id="matrizFic">
                    <div id="ajax_load" class="ajax_load" style="display: none">
                        <div class="preload" id="preload" >
                            <img  id="load" class="load" src="<?php echo base_url('img/27.gif'); ?>" width="128" height="128" />
                        </div>
                    </div>
            </div>
</center>    

<script type="text/javascript">



var nextinput = 0;
var deleinput = 1;
$(document).ready(function(){ 
    //$('#fechainicio').datepicker({dateFormat: "dd/mm/y"}); 
    //Funcion para adicionar una o varias filas
    $( "#add" ).click(function() {
        $('#save').show();
        nextinput++;
         campo = '<div id="table'+nextinput+'">' 
                +'<b>Numero de Contrato </b><input type="text" size="20" style="width:103px" id="contrato' + nextinput + '"  />'                
                +'<b>Fecha Inicio </b><input type="text" size="20" style="width:103px" readonly="readonly" id="fechainicio' + nextinput + '" />'                
                +'<b>Fecha Fin </b><input type="text" size="20" style="width:103px" readonly="readonly" id="fechafin' + nextinput + '"  />'
                +'<b>Valor </b><input type="text" size="20" style="width:103px" id="valor' + nextinput + '"  />'
                +'<input type="hidden" style="width:20px" id="total_anio' + nextinput + '"  />'
                +'<input type="hidden" style="width:20px" id="total_mes' + nextinput + '"  />'
                +'<input type="hidden" style="width:20px" id="total_day' + nextinput + '"  />'
                +'<button class="btn btn-success" style="width:40px; height:20px; align:top" title="Incluir" value="'+nextinput+'" id="incluir'+nextinput+'" onclick="javascript:valida(\''+nextinput+'\');"><i class="fa fa-plus-square"></i></button>'
                +'<button class="btn btn-success" style="width:40px; height:20px; align:top" title="Eliminar" value="'+nextinput+'" id="delete'+nextinput+'" onclick="javascript:rowDelete(\''+nextinput+'\');"><i class="fa fa-minus-square"></i></button>'
                +'</div>'
            $("#campos").append(campo);
            $("#gItcant").val(nextinput);
            
            $.datepicker.regional['es'] = 
                {
                 closeText: 'Cerrar', 
                 prevText: 'Previo', 
                 nextText: 'Próximo',
                 monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                 monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
                 monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
                 dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
                 dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
                 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
                 dateFormat: 'dd/mm/yy', firstDay: 0, 
                  initStatus: 'Selecciona la fecha', isRTL: false
                };
            $.datepicker.setDefaults($.datepicker.regional['es']);
                  $("#fechainicio"+nextinput).datepicker({
                    showOn: 'button',
                    buttonText: 'Selecciona una fecha',
                    buttonImage: '<?php echo base_url() . "img/calendario.png" ?>',
                    buttonImageOnly: true,
                    numberOfMonths: 1
                    //maxDate: '29d',
                    //minDate: '0d'
                  });
                  $("#fechafin"+nextinput).datepicker({
                    showOn: 'button',
                    buttonText: 'Selecciona una fecha',
                    buttonImage: '<?php echo base_url() . "img/calendario.png" ?>',
                    buttonImageOnly: true,
                    numberOfMonths: 1
                    //maxDate: '29d',
                    //minDate: '0d'
                  });
    });                   
    
});     
//funcion para cambiar color del boton normativa
$("#normativa").click(function() {
    $("#normativa").attr('class','btn btn-warning'); 
    $("#presuntiva").attr('class','btn btn-success');
    $("#obra").attr('class','btn btn-success');
    $("#costo").attr('class','btn btn-success');
    $("#tableInfo").show();
    $("#secundarios").hide();
});

//funcion para cambiar color del boton presuntiva
$("#presuntiva").click(function() {
    $("#presuntiva").attr('class','btn btn-warning');
    $("#normativa").attr('class','btn btn-success'); 
    $("#secundarios").show();
    $("#tableInfo").hide();
});

//funcion para cambiar color del boton costo
$("#costo").click(function() {
    $("#costo").attr('class','btn btn-warning');
    $("#obra").attr('class','btn btn-success');
});

//funcion para cambiar color del boton obra
$("#obra").click(function() {
    $("#obra").attr('class','btn btn-warning');
    $("#costo").attr('class','btn btn-success');

});

//funcion para seleccionar y eliminar la fila seleccionada
function rowDelete(xVal){   
    var deliter = $("#gItcant").val();    
    var k=1;
    if (deliter <= 1){
            $('#error').html('<font color="red"><b>Por favor Insertar al menos 1 fila</b></font>');
	}else{
            nextinput--;
            $("#table"+xVal).remove(); 
            var k=1;
            var total = deliter - deleinput;
            for(var i=1;i<=(parseInt(deliter) + 1);i++){
                if($('#table'+i).attr('id')){
                    $("#table"+i).attr('id','table'+(k));
                    $("#contrato"+i).attr('id','contrato'+(k));
                    $("#fechainicio"+i).attr('id','fechainicio'+(k));
                    $("#valor"+i).attr('id','valor'+(k));
                    $("#fechafin"+i).attr('id','fechafin'+(k));
                    $("#delete"+i).attr('id','delete'+(k));
                    $("#delete"+k).removeAttr('onclick');
                    $("#delete"+k).attr('onclick','javascript:rowDelete("'+k+'")');                    
                    k++
                }
            }
            $("#gItcant").val(total); 
        }              
}

//Funcion para validar las fechas
function valida(xVal){ 
    
    var cantidad = $("#gItcant").val(); 
    var inicio = $('#fechainicio'+xVal).val();
    var fin = $('#fechafin'+xVal).val();  
    var contrato = $("#contrato"+xVal).val();
    var valor = $("#valor"+xVal).val();
    
    if (inicio == ''){
        $('#error').html('<font color="red"><b>Por favor Insertar fecha Inicio</b></font>');
        return false;
    }else if (fin == ''){
        $('#error').html('<font color="red"><b>Por favor Insertar fecha Fin</b></font>');
        return false;
    }else{ 
        //split para obtener los años    
        var anoini = parseInt(inicio.split("/")[2]);
        var anofin = parseInt(fin.split("/")[2]);
        
            //split para obtener los meses
            var mesini = parseInt(inicio.split("/")[1]);
            var mesfin = parseInt(fin.split("/")[1]);

                //split para obtener los dias
                var diaini = parseInt(inicio.split("/")[0]);
                var diafin = parseInt(fin.split("/")[0]);
                //Nuevos datos tipo Date
                var past_date= new Date(anoini, mesini, diaini);
                var future_date = new Date(anofin, mesfin, diafin);                                      

var total_days = 0;
var total_months = 0;
var total_years = 0;

 var b = 0;
if(past_date.getMonth() == 2){
  if((future_date.getYear() % 4 == 0 && future_date.getYear() % 100 != 0) || future_date.getYear() % 400 == 0){
    b = 29;
  } else {
    b = 28;
  }
 } else if(past_date.getMonth() <= 7){
  if(past_date.getMonth() == 0){
    b = 31;
  } else if(past_date.getMonth() % 2 == 0){
    b = 30;
  } else {
    b = 31;
  }
} else if(past_date.getMonth() > 7){
   if(past_date.getMonth() % 2 == 0){
    b = 31;
  }else{
    b = 30;
  }
}


if(past_date > future_date){
     $('#error').html("<font color='red'><b>La fecha de inicio ha de ser anterior a la fecha Actual</b></font>");
     return false;
}else{

  if(past_date.getMonth() <= future_date.getMonth()){
    total_years = future_date.getYear() - past_date.getYear();
    if(past_date.getDate() <= future_date.getDate()){
       total_months = future_date.getMonth() - past_date.getMonth();
      total_days = future_date.getDate() - past_date.getDate();
    }else{
      if(future_date.getMonth() == past_date.getMonth()){
        total_years = total_years - 1;
       }
      total_months = (future_date.getMonth() - past_date.getMonth() - 1 + 12) % 12;
      total_days = b - (past_date.getDate() - future_date.getDate());
    }
  }else{
    total_years = future_date.getYear() - past_date.getYear() - 1;
     if(past_date.getDate() > future_date.getDate()){
      total_months = future_date.getMonth() - past_date.getMonth() - 1 + 12;
      total_days = b - (past_date.getDate() - future_date.getDate());
    }else{
       total_months = future_date.getMonth() - past_date.getMonth() + 12;
      total_days = future_date.getDate() - past_date.getDate();
    }
  }
  $('#total_anio'+xVal).val(total_years);
  $('#total_mes'+xVal).val(total_months);
  $('#total_day'+xVal).val(total_days);
      if (contrato == '' || valor == ''){
          $('#error').html("<font color='red'><b>No se encuentran Datos</b></font>");
      }else{    
          $(".ajax_load").show("slow");
          $.ajax({
                type: "POST",    
                url: "valorgrilla",
                data: {valor:valor, cantidad:cantidad, anofin:anofin, total_anio:total_years, total_mes:total_months,
                total_day:total_days, mesini:mesini, mesfin:mesfin, fechainicio:inicio, fechafinal:fin},
                success: function(data) {
                    $("#matrizFic").html(data);
                    $(".ajax_load").hide("slow");
                }
            });
      } 
    }
  }
}

</script>