        <div class="modal fade" id="exped" style="overflow-y: scroll;">
                <div class="modal-dialog" style="margin-top: 5%;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title"> Expediente</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 5px 0;"></div>

                            <div class="container-fluid">
                               <div class="col-xs-12 col-sm-offset-0">
                                    <div class="title-flat-form title-flat-blue">Registrar</div>
                                      <form id="frmexp" name="frmexp" method="post" action="">
             <div class="row">
                <div style="margin-left: 8%;" class="col-sm-6 col-sm-offset-0">
                        <div class="group-material" id="propietarioG"><div id="autocompletar">
                                    <input type="hidden" name="bandera1" id="bandera1" value="buscar">
                                    <input type="text" name="nombrepropietario" id="nombrepropietario" class="material-control tooltips-general" placeholder="Nombre..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" list="listaExp" data-original-title="Solo letras" autocomplete="off">
                                    <datalist id="listaExp">
                                        <?php
                                            include"../config/conexion.php";
                                            $cosulta="SELECT nombres,apellidos FROM `propietario` ORDER BY nombres";
                                             $resultado = $conexion->query($cosulta);
                                              if($resultado){
                                               while($fila = $resultado->fetch_object()){
                                                echo  "<option value='$fila->nombres'>$fila->apellidos</opcion> ";
                                                 }
                                               }
                                            ?>                              
                                    </datalist>
                                <label>Propietario</label>
                            </div>
                            </div></div>
                            <div class="col-sm-1" style="margin-top: 0.5%;margin-left: -3%;">
                            <button type="submit" class="btn btn-add" data-toggle="modal" data-target="#propietario"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>
                        <hr style="margin-top: 8%;width: 85%;border-top: 1px solid #fff;">
                            <div style="margin-left: 8%;" class="col-sm-3 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="razamascota" id="razamascota" class="material-control tooltips-general" placeholder="Nombre Raza..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" list="listaraza" onkeyup ="comprobarEspecie();">
                                    <datalist id="listaraza">
                                        <?php
                                            include"../config/conexion.php";
                                            $cosulta="SELECT DISTINCT(nombre) FROM `raza` ORDER BY nombre";
                                             $resultado = $conexion->query($cosulta);
                                              if($resultado){
                                               while($fila = $resultado->fetch_object()){
                                                echo  "<option value='$fila->nombre'>";
                                                 }
                                               }
                                            ?> 
                                    </datalist>
                                <label>Raza</label>
                            </div></div>
                            <div style="margin-left: -2%;" class="col-sm-2 col-xs-offset-0">
                        <div class="group-material" id="filtroespecie">
                                    <input type="text" name="especiemascota" id="especiemascota" class="material-control tooltips-general" placeholder="Nombre Especie..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" list="listaespecie">
                                    <datalist id="listaespecie">
                                        <?php
                                            include"../config/conexion.php";
                                            $cosulta="SELECT DISTINCT(nombre) FROM `especies` ORDER BY nombre";
                                             $resultado = $conexion->query($cosulta);
                                              if($resultado){
                                               while($fila = $resultado->fetch_object()){
                                                echo  "<option value='$fila->nombre'>";
                                                 }
                                               }
                                            ?> 
                                    </datalist>
                                <label>Especie</label>
                            </div></div>
                            <div style="margin-left: 4%;" class="col-sm-2 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="text" name="mascota" id="mascota" class="material-control tooltips-general" placeholder="Nombre Mascota" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" onkeyup ="filtrar();">
                                <label>Mascota</label>
                            </div></div>
                            <div style="margin-left: -3.5%;" class="col-sm-2 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="corelativo" id="corelativo" class="material-control tooltips-general" placeholder="Alias..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" style="pointer-events: none;width: 55%;">
                            </div></div>
                            <div style="margin-left: -7%;" class="col-sm-2 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="apellidomascota" id="apellidomascota" class="material-control tooltips-general" placeholder="Apellido..." required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras" style="pointer-events: none;">
                            </div></div>
                            <div style="margin-top: -3%;margin-left: 8%;" class="col-xs-4 col-sm-5 col-sm-offset-0">
                                <fieldset>
                                    <legend>Fecha/Edad</legend>
                                    <div><center><div class="contenedorad">
                                <div class="radio">
                                    <div style="margin-top: -3%;" class="col-sm-12 col-sm-offset-0">
                                    <input type="radio" name="fecha" id="fnac" value="Fecha" >
                                    <label for="fnac" onclick="fecha()">Fecha</label>
                                    <input type="radio" name="fecha" id="edad" value="Edad">
                                    <label for="edad"  onclick="edad()">Edad</label></div>
                                    </div>
                                   <div class="col-sm-12 col-sm-offset-0" style="" id="fechaN">
                                    </div>
                                    <div class="col-sm-12 col-sm-offset-0" style="" id="edadN">
                                    
                                    </div>
                            </div></center>
                    </div>
                                </fieldset>
                            </div>
                            <div style="margin-top: -3%;margin-left: 1%;" class="col-xs-4 col-sm-5 col-sm-offset-0">
                                <fieldset>
                                    <legend>Genero</legend>
                                    <div><center><div class="contenedorad">
                                <div class="radio">
                                    <input type="radio" name="genero" id="macho" value="Macho">
                                    <label for="macho">Macho</label>
                                    <input type="radio" name="genero" id="hembra" value="Hembra">
                                    <label for="hembra">Hembra</label>
                            </div></div></center>
                    </div>
                                </fieldset>
                            </div>
        </div>
        </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-primary" onclick="GuardarExpediente()"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="propietario" style="overflow-y: scroll;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <center>
                                <h5 class="modal-title"> Propietario</h5></center>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"> &times; </span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid" style="margin: 5px 0;"></div>

                            <div class="container-fluid">
                               <div class="col-xs-12 col-sm-offset-0">
                                    <div class="title-flat-form title-flat-blue">Registrar</div>
                                     <form class="form-horizontal" id="frmprop" name="frmprop" method="post" action="">
                                        <div class="row">
                                            <div style="margin-left: 6%;/*! margin-right: -20%; */" class="col-sm-6 col-sm-offset-0">
                        <div class="group-material" style="margin-right: 15%;">
                                    <input type="text" name="nombrepro" id="nombrepro" class="material-control tooltips-general" placeholder="Nombre..." required="" data-min-length="1" autocomplete="off" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Nombre</label>
                            </div></div>
                            <div class="col-sm-5 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="apellidopro" id="apellidopro" class="material-control tooltips-general" placeholder="Primer Apellido..."  data-min-length="1" data-toggle="tooltip" autocomplete="off" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Apellido</label>
                            </div></div>
                            <div style="margin-top: -2%;" class="col-sm-6 col-sm-offset-1">
                                <fieldset style="margin-right: 11%;">
                                    <legend>Sexo</legend>
                                    <div style=""><center>
                                    <div class="contenedorad">
                                <div class="radio">
                                    <input type="radio" name="genero" id="masculino" value="Masculino">
                                    <label for="masculino">Masculino</label>
                                    <input type="radio" name="genero" id="femenino" value="Femenino">
                                    <label for="femenino">Femenino</label>
                            </div>
                        </div></center>
                    </div>
                                </fieldset>
                            </div>
                            <div style="margin-left: -1%;margin-top: 2%;" class="col-sm-5 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="telefonopro" id="telefonopro" class="material-control tooltips-general" placeholder="####-####" required="" data-min-length="1" maxlength="9" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return solonumero(event);" data-original-title="Solo numeros">
                                <label>Telefono</label>
                            </div></div>
                            <div class="col-xs-12 col-sm-1 col-sm-offset-1" style="margin-left: 6%;"><label style="color: #53a5b4;font-weight: bold;">Direccion</label></div>
                            <div style="margin-left: 6%;" class="col-xs-12 col-sm-11 col-sm-offset-0">
                                <div class="group-material" style="margin-bottom: 2%;margin-right: 5%;">
                                            <textarea id="direccionpro" name="direccionpro" type="text" class="material-control tooltips-general" placeholder="" required="" data-toggle="tooltip" data-placement="top" title="" style="width: 102%; height: 1%;" data-original-title="Solo letras"></textarea>
                                        </div>
                            </div>
                            <div id="repuesta"></div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div>