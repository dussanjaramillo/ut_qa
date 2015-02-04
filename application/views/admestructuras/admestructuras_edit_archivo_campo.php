<?php if( ! defined('BASEPATH') ) exit('No direct script access allowed'); ?>

<div align="center">
        <?php     

        echo form_open(current_url().'/'.$result->COD_ARCHIVO.''); ?>

        <h2>Editar Campo</h2>

        <?php echo form_hidden('idcodarchivo',$result->COD_ARCHIVO) ?>
        <?php echo form_hidden('idcampo',$result->COD_CAMPOARCHIVO) ?>
        <?php echo form_hidden('fechacreacion',date("d/m/Y")) ?>
        
        
          <br>
          <br>

        <div class="center-form">

        <?php echo $custom_error; ?>
        <p>
        <?php
         echo form_label('Nombre Campo<span class="required">*</span>', 'nombrecampo');
           $datan = array(
                      'name'        => 'nombrecampo',
                      'id'          => 'nombrecampo',
                      'value'       => $result->NOMBRE_CAMPO,
                      'maxlength'   => '128'
                    );

           echo form_input($datan);
           echo form_error('nombrecampo','<div>','</div>');
        ?>
        </p>

        <p>
        <?php
         echo form_label('Tipo Registro <span class="required">*</span>', 'tiporeg');  
              foreach($tiposreg as $row) {
                  $select[$row->COD_TIPOREGISTRO] = $row->NOMBRE_TIPO;
               }
          echo form_dropdown('tiporeg', $select,$result->COD_TIPOREGISTRO,'id="tiporeg" data-placeholder="seleccione..." ');
         
           echo form_error('tiporeg','<div>','</div>');
        ?>

        </p>

        <p>
        <?php
         echo form_label('Posición<span class="required">*</span>', 'posi');
         $datap = array(
                      'name'        => 'posi',
                      'id'          => 'posi',
                      'value'       => $result->POSICION,
                      'maxlength'   => '10'
                    );

          echo form_input($datap);               
          echo form_error('posi','<div>','</div>');
                          
        ?>
        </p>

        <p>
        <?php
         echo form_label('Longitud <span class="required">*</span>', 'long');
         $datalong = array(
                      'name'        => 'long',
                      'id'          => 'long',
                      'value'       => $result->LONGITUD,
                      'maxlength'   => '128'
                    );

          echo form_input($datalong);               
          echo form_error('long','<div>','</div>');
                          
        ?>
        </p>

        <p>
        <?php
         echo form_label('Alineación <span class="required">*</span>', 'aling');
         $dataaling = array(
                      'name'        => 'aling',
                      'id'          => 'aling',
                      'value'       => $result->ALINEACION,
                      'maxlength'   => '128'
                    );

          echo form_input($dataaling);               
          echo form_error('aling','<div>','</div>');
                          
        ?>
        </p>

        <p>
        <?php
         echo form_label('Carácter de Relleno <span class="required">*</span>', 'relleno');
         $datarelleno = array(
                      'name'        => 'relleno',
                      'id'          => 'relleno',
                      'value'       => $result->CARACTER_RELLENO,
                      'maxlength'   => '1'
                    );

          echo form_input($datarelleno);               
          echo form_error('relleno','<div>','</div>');
                          
        ?>
        </p>

        <?php
         echo form_label('Tipo Dato <span class="required">*</span>', 'tipodato');
         $datatipodato = array(
                        "NUMERICO",
                        "ALFANUMERICO",
                        "FECHA");

          echo form_dropdown('tipodato', $datatipodato,$result->TIPO_DATO,'id="tipodato" data-placeholder="seleccione..." ');               
          echo form_error('tipodato','<div>','</div>');
                          
        ?>
        </p>

        <p>
        <?php
         echo form_label('Formato <span class="required">*</span>', 'formato');
         $dataformato = array(
                        "dd/mm/aaaa",
                        "dd-mm-aaaa",
                        "mm-aaaa",
                        "dd-mmm-aaaa",
                        "mmm/aaaa",
                        "mmm-aaaa",
                        "dd",
                        "aaaa",
                        "mm",
                        "hh:mm",
                        "hh:mm:ss",
                        "##,###.##",
                        "##.###.##",
                        "##,###",
                        "##.###",
                        "#####");

          echo form_dropdown('formato', $dataformato,$result->FORMATO,'id="formato" data-placeholder="seleccione..." ');
                         
          echo form_error('formato','<div>','</div>');
                          
        ?>
        </p>

        <p>
        <?php
         echo form_label('Separador de decimales <span class="required">*</span>', 'separator');
         $dataseparator = array(
                        ','        => 'Coma (,)',
                        ';'        => 'Punto y Coma (;)',
                        ''        => 'Ninguno',);

          echo form_dropdown('separator', $dataseparator,$result->SEPARADOR_DECIMALES,'id="separator" data-placeholder="seleccione..." ');
                         
          echo form_error('separator','<div>','</div>');
                          
        ?>
        </p>

        <p>
        <?php
         echo form_label('Vista Consulta <span class="required">*</span>', 'vistacons');
         $datavistacons = array(
                      'name'        => 'vistacons',
                      'id'          => 'vistacons',
                      'value'       => $result->VISTA_CONSULTA,
                      'maxlength'   => '80'
                    );

          echo form_input($datavistacons);               
          echo form_error('vistacons','<div>','</div>');
                          
        ?>
        </p>


          <br>
          <br>
        
        <?php  echo anchor('admestructuras/camposarchivo/'.$result->COD_ARCHIVO.'', '<i class="icon-remove"></i> Cancelar', 'class="btn"'); ?>
        <?php 
        $data = array(
               'name' => 'button',
               'id' => 'submit-button',
               'value' => 'Guardar',
               'type' => 'submit',
               'content' => '<i class="fa fa-floppy-o fa-lg"></i> Guardar',
               'class' => 'btn btn-success'
               );

        echo form_button($data);    
        ?>
        <?php  
         if ($this->ion_auth->is_admin() || $this->ion_auth->in_menu('admestructuras/delete'))
           {
                echo anchor('#', '<i class="fa fa-trash-o fa-lg"></i> Eliminar', 'class="btn btn-danger" id="borrar"');
           }
        ?>
        

</div>
       

        <?php echo form_close(); ?>

</div>

  <script type="text/javascript">
  //style selects
    var config = {
      '.chosen'           : {}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }

  </script>

<script>
    $(function() {
        // a workaround for a flaw in the demo system (http://dev.jqueryui.com/ticket/4375), ignore!
    $("#borrar").click(function(evento){    
        evento.preventDefault();
         var link = $(this).attr('href');
        $( "#dialog:ui-dialog" ).dialog( "destroy" );
    
        $( "#dialog-confirm" ).dialog({
            resizable: false,
            height:180,
            modal: true,
            buttons: {
                "Confirmar": function() {
                    location.href='<?php echo base_url()."index.php/admestructuras/deletecampoarch/".$result->COD_CAMPOARCHIVO; ?>';
                    
                },
                Cancelar: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
       });
    });
    </script>

<div id="dialog-confirm" title="¿Eliminar el Campo?" style="display:none;">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>¿Confirma que desea eliminar el campo "<?php echo $result->NOMBRE_CAMPO; ?>"?</p>
</div>