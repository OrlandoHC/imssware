<?php
    include('xcrud/xcrud.php');
    $xcrud = Xcrud::get_instance(); // INSTANCIAMOS XCRUD
    $xcrud->table('tsaico'); // NOMBRE DE LA TABLA QUE ESTAMOS UTILIZANDO
    $xcrud->columns('Delegación, Dirección_Normativa, Jefatura_de_Servicios, Coordinación_o_Departamento, Calle, Numero, Colonia, Municipio - Delegación, Código_Postal, Clave_PREI, Año_de_adquisición, Versión_MS_Office, Otra_Suite_de_Oficina_si_aplica, Conectado_a_la_LAN', true); //OCULTAMOS LAS COLUMNAS INNECESARIAS - SOLO APLICA AL LISTADO DE DESPLIEGUE PRINCIPAL
    $xcrud->fields('Delegación, Dirección_Normativa, Jefatura_de_Servicios, Coordinación_o_Departamento, Calle, Numero, Colonia, Municipio - Delegación, Código_Postal, Clave_PREI, Año_de_adquisición, Versión_MS_Office, Otra_Suite_de_Oficina_si_aplica, Conectado_a_la_LAN', true);
    $xcrud->buttons_position('right');  // BOTONES CARGADOS A LA DERECHA
    $xcrud->change_type('Delegación','select','','Coahuila'); // prueba de selector en DELEGACIÓN (DATO FIJO)
    $xcrud->change_type('Dirección_Normativa','select', '', 'Selecciona..., Administración, Finanzas, Incorporación y Recaudación, Innovación y Desarrollo Tecnológico, Prestaciones Economicas y Sociales, Prestaciones Médicas, Otro'); // SELECTOR DE DIRECCIÓN NORMATIVA
    $xcrud->change_type('AREA_MEDICA_ADMINISTRATIVA','select','', 'Selecciona...,Médica,Administrativa');
    $xcrud->change_type('Piso_de_Ubicación_del_Equipo','select','','Selecciona...,Sotano, PB, 1, 2, 3, 4, 5');
    $xcrud->change_type('STATUS','select','','Selecciona...,Funciona, No Funciona');
    $xcrud->change_type('Modelo','select','',array('values'=>array('Dell Inc.'=>array('Optiplex 270'=>'Optiplex 270','Optiplex 280'=>'Optiplex 280'),'Asia'=>array('RU'=>'Russia','CH'=>'China'))));
    $xcrud->validation_required('Tipo_de_Inmueble,No_Inmueble,Ciudad,ID_De_Red,Marca,Modelo,No_Serie,No_Inventario,Nombre_del_equipo,Dirección_IP_Estatica,AREA_MEDICA_ADMINISTRATIVA,Area_de_Ubicación_del_equipo,Ubicación,Piso_de_Ubicación_del_Equipo,STATUS');



                                      //COMIENZA AREA DE PRUEBAS 1

    //$xcrud->change_type('Marca','select','','Selecciona...,Dell Inc,Hewlett-Packard,LENOVO,TOSHIBA,GHIA,IBM '); AREGLO DE MARCAS


    $xcrud->relation('Marca','marcas','Marca', "Marca"); // RELACION DE MARCAS (SI FUNCIONA)

    // $xcrud->relation('Modelo','modelos',array('modelo'),'','','','','Modelo','ID'); // NO FUNCIONA

     $xcrud->relation('Modelo','tsaico','Modelo', "Modelo"); // RELACION DE MODELOS (SI FUNCIONA)

    // $xcrud->relation('ID','Marca','ID','Modelo');



                                      //TERMINA AREA DE PRUEBAS 1





                                      // INICIA AREA DE PRUEBAS 2


//$xcrud->disabled_on_edit('Tipo_de_Inmueble,No_Inmueble,Marca,Modelo,No_Serie'); // FUNCIONA PARA BLOQUEAR CAMPOS AL EDITAR PERO NO AL CREAR

$xcrud->unset_csv(); // DESHABILITAMOS CSV


                                      // TERMINA AREA DE PRUEBAS 2

    $xcrud->benchmark(); // medimos performance de la platadorma en red institucional
  	$xcrud->unset_remove();  // ELIMINAMOS EL BOTON "ELIMINAR"
  	$xcrud->unset_title(); // OCULTAMOS EL NOMBRE DE LA TABLA
    $xcrud->limit_list('20,50,100');

;
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Saico Web | v1.0 alpha</title>

</head>
<body>
<br>
<br>
 <table border="0" width="300" align="center">
			    <tr>
			      <td valign="bottom" align="left"><img src="../images/mexico.png" /></td>
			      <td valign="bottom" align="right"><img src="../images/logo_imss.png" /></td>
			    </tr>
			  </table>
			  <center><h2>Coordinación Delegacional De Informática en Coahuila</h2>
			  <h3>Servicio Administrado De Insfraestructura de Cómputo (SAICO) Versión Web | v1.0 alpha</h3></center>
<?php
    echo $xcrud->render();
?>

</body>
</html>
