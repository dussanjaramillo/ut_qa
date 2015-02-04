<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed'); ?>



<div class="center-form" width='460' height= '460'>

 <?php     

        echo form_open_multipart(current_url()); ?>
        <?php echo $custom_error; ?>
<center><h3>Ingresar Gestión</h3></center>





<p> 
        <?php
         echo form_label('Fecha:<span class="required">*</span>', 'fecha_id');
           $dataHora = array(
                      'name'        => 'fecha_id',
                      'id'          => 'fecha_id',
                      'maxlength'   => '128',
                      'disabled'    => 'disabled',
                      'style'		=> 'text-align:right',
                      'value'		=> $fecha
                    );

           echo form_input($dataHora);
           echo form_error('fecha_id','<div>','</div>');
        ?>
</p>    

<p>
        <?php
         echo form_label('Descripción<span class="required">*</span>', 'descripcion');
           $datadesc = array(
                      'name'        => 'descripcion',
                      'id'          => 'descripcion',
                      'maxlength'   => '200',
                      'required'    => 'required',
                      'rows'        => '3',
                      'onkeypress' 	=> "escape(this);",
                      'onblur' 		=> "escape(this);",
                      'onkeyup' 	=> "escape(this);"
                    );

           echo form_textarea($datadesc);
           echo form_error('descripcion','<div>','</div>');
        ?>
        </span>
        </p>
        
        <div id="alerta"></div>	

<input type="hidden" id="cod_fisc" name="cod_fisc" value="<?=$cod_fisc  ?>" >
<input type="hidden" id="nit" name="nit" value="<?=$nit  ?>" >
<input type="hidden" id="vista_flag" name="vista_flag" value="<?=$nit  ?>" >




      
<p>
	     	 <input type='button' name='cancelar' class='btn btn-default' value='Cancelar'  id='cancelar' >

 <?php 
                $data = array(
                       'name' => 'button',
                       'id' => 'submit-button',
                       'value' => 'Enviar',
                       'type' => 'submit',
                       'content' => '<i class="fa fa-floppy-o fa-lg"></i> Enviar',
                       'class' => 'btn btn-success',
						
                       );

                echo form_button($data);    
                ?>
    </p> 
     <?php echo form_close(); ?>	
    
</div>
<script type="text/javascript" language="javascript" charset="utf-8">


function escape(c){
  	 	    if( !(/[/\*\,\.\;\:\{\}\[\]\^\`\¨\´\+\~\°\|\¬\!\¡\'\?\¿\=\)\(\&\%\$\#\"\<\>\Ñ\ñ\+]/.test(c.value)) )
		{
			$("#alerta").hide();
		}
  			else{
  	$("#alerta").show();
       	$('#alerta').html('<p class="text-warning"><i class="fa fa-warning"></i> Caracter Invalido <p>');
       	$('#descripcion').val("");
      $("#descripcion").focus();
      return false;
  				}
}

 $('#descripcion').change(function(){

 	    if ($('#descripcion').val().indexOf('%') != -1 || $('#descripcion').val().indexOf('<') != -1) 
       { 	
       	$("#alerta").show();
       	$('#alerta').html('<p class="text-warning"><i class="fa fa-warning"></i> Caracter Invalido "%|<"<p>');
       	$('#descripcion').val("");
      $("#descripcion").focus();
       return false;

  }
  else{
  	$("#alerta").hide();
  }

});

 $('#ingreso_gestion').dialog({
                autoOpen: true,
                width: 460,
                height: 460,
                modal:true,
                title:'Ingresar Gestión',
                close: function() {
                    $('#ingreso_gestion *').remove();
                }
            });	
            
            $('#cancelar').click(function(){
        	$('#ingreso_gestion').dialog('close');
       });

                function ajaxValidationCallback(status, form, json, options) {
	
}
</script>

<style>
    .ui-widget-overlay{z-index: 10000;}
    .ui-dialog{
        z-index: 15000;
    }
    
 </style>
