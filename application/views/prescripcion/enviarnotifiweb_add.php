<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php
if (isset($message)) {
    echo $message;
}
?>
<div class="preload"></div><img class="load" src="<?php echo base_url('img/27.gif'); ?>" width="128" height="128" />
<div style="background: #f0f0f0; width: 90%; margin: auto; overflow: hidden">
    <?php
    $attributes = array("id" => "myform");
    echo form_open("nulidad", $attributes);
    ?>       
    <br>

    <div style="overflow: hidden; width: 90%; margin: 0 auto">
        <?php if ($class != "") { ?>
            <div class="alert alert-<?php echo $class ?>"></div>
        <?php } ?>


    </div>
    <div class="notificacion_2" style="overflow: hidden; width: 90%; margin: 0 auto">
        <br>
        <h2 class="text-center">Realizar notificación por página web </h2>    
        <br><br>
        <div  style="width: 80%; border-color: black; border: 1px solid grey; margin: auto; overflow: hidden;alignment-adjust: central ;padding: 15px 50px 0">
            <div  style="width: 80%; border-color: black; border: 1px solid grey; margin: auto; overflow: hidden;alignment-adjust: central ;padding: 15px 50px 0">

                <center> <a href='http://www.sena.edu.co/transparencia/gestion-juridica/paginas/cobros-coactivos.aspx' target=_blank>Click Aqui para Realizar la Publicación Web</a></center>
                <br>
            </div>
            <?php
            echo '<br>';
            echo form_label('<b>Documento Anexo en la Notificación:  </b><span class="required"></span>', 'lb_archivo');
            echo '<a href="' . base_url('uploads/soportes_nulidad/' . $cod_coactivo . '/Expediente/' . $anexo["NOMBRE_DOCUMENTO"]) . '">' . $anexo["NOMBRE_DOCUMENTO"] . '</a>';
            echo '<br><br>';
            echo form_label('<b>Comentarios: </b><span class="required"></span>', 'lb_comentarios');
            $datacomentarios = array(
                'name' => 'comentarios',
                'id' => 'comentarios',
                'maxlength' => '300',
                'class' => 'span8 comentarios',
                'rows' => '3',
                'required' => 'required'
            );
            echo form_textarea($datacomentarios);
            echo '<br>';
            echo '<div class="subir_documento" id="subir_documento">';
            echo form_label('<b>Soporte de Notificacion Web<span class="required"></span></b><br>', 'lb_cargar1');
            echo '<div class="alert-success" style="width: 74%; border-color: black; border: 1px solid grey;padding: 15px 50px 0">';
            $data = array(
                'multiple' => '',
                'name' => 'userfile[]',
                'id' => 'imagen',
                'class' => 'validate[required]'
            );
            echo form_upload($data);
            echo '<br><br>';
            echo '</div>';
            ?>    
            <br>
        </div>
    </div>
    <br>
    <center>
        <?php
        $data_1 = array(
            'name' => 'button',
            'id' => 'enviar',
            'value' => 'Enviar',
            'content' => '<i class="fa fa-floppy-o fa-lg"></i> Confirmar',
            'disabled' => 'disabled',
            'class' => 'btn btn-danger enviar'
        );
        $data_2 = array(
            'name' => 'button',
            'id' => 'enviar',
            'value' => 'Enviar',
            'content' => '<i class="fa fa-floppy-o fa-lg"></i> Confirmar',
            'class' => 'btn btn-success enviar'
        );
        ?>
        <div class="Boton_Agregar">
            <?php
            echo form_button($data_2) . " ";
            echo anchor('bandejaunificada/', '<i class="icon-remove"></i> Cancelar', 'class="btn"');
            ?>
        </div>
        <div class="Boton_Agregado">
            <?php
            echo form_button($data_1) . " ";
            echo anchor('bandejaunificada/', '<i class="icon-remove"></i> Cancelar', 'class="btn"');
            ?>
        </div>
    </center>

    <?php echo form_close(); ?>
    <style>
        .columna_derecha {
            float:right; /* Alineación a la derecha */
            width:40%;
            //border:solid lightblue 1px;

        }

        .columna_izquierda {
            float:left; /* Alineación a la izquierda */
            width:40%;
            // border:solid lightblue 1px;

        }       
    </style>
    <script>
        $(".preload, .load").hide();
        $(".Boton_Agregado").hide();
        $(".Boton_Agregar").show();
        $('#enviar').click(function() {
            $(".preload, .load").show();
            var comentarios = $('#comentarios').val();
            var cod_coactivo = '<?php echo $cod_coactivo; ?>';
            var estado = '<?php echo NOTIFICACION_WEB_GENERADA; ?>';
            var url_notificacion = '<?php echo base_url('index.php/nulidad/NotificacionWeb'); ?>';
            $.post(url_notificacion, {cod_coactivo: cod_coactivo, cod_respuesta: estado, comentarios: comentarios})
                    .done(function(msg) {
                        alert("Se ha generado la notificacion por pagina Web");
                        window.location = '<?= base_url('index.php/bandejaunificada/procesos') ?>';
                    });
        });

    </script>