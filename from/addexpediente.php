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
                                     <form>
                                        <div class="row">
                                            <div style="margin-left: 6%;" class="col-sm-4 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Juan Perez" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" list="listaExp" data-original-title="Solo letras">
                                    <datalist id="listaExp">
                                        <option value="Propietario 1">Propietario 1</option>
                                        <option value="Propietario 2">Propietario 2</option>
                                        <option value="Propietario 3">Propietario 3</option>
                                        <option value="Propietario 4">Propietario 4</option>
                                        <option value="Propietario 5">Propietario 5</option>
                                    </datalist>
                                <label>Propietario</label>
                            </div></div>
                            <div class="col-sm-1" style="margin-top: 0.5%;margin-left: -3%;">
                            <button type="submit" class="btn btn-add" data-toggle="modal" data-target="#propietario"><i class="zmdi zmdi-plus"></i> &nbsp;&nbsp; Agregar</button> </div>
                            <div class="col-sm-3 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Osito" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Mascota</label>
                            </div></div>
                            <div style="margin-left: -4%;" class="col-sm-2 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Perez" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                            </div></div>
                            <div style="margin-left: 6%;" class="col-sm-4 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Fox Hound" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" list="listaExp" data-original-title="Solo letras">
                                <label>Raza</label>
                            </div></div>
                            <div style="margin-left: 10%;" class="col-sm-5 col-xs-offset-2">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Canina" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Especie</label>
                            </div></div>
                            <div style="margin-left: 6%;/*! margin-top: 3%; */" class="col-sm-4 col-sm-offset-1">
                        <div class="group-material">
                                    <input type="date" name="" id="nombreexp" class="material-control tooltips-general" placeholder="8/04/2019" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Fecha Nacimiento</label>
                            </div></div>
                            <div style="margin-top: -3%;margin-left: 10%;" class="col-xs-4 col-sm-5 col-sm-offset-2">
                                <fieldset>
                                    <legend>Sexo</legend>
                                    <div><center>
                                <div class="radio">
                                    <input type="radio" name="sexo" id="macho" value="Macho">
                                    <label for="macho">Macho</label>
                                    <input type="radio" name="sexo" id="hembra" value="Hembra">
                                    <label for="hembra">Hembra</label>
                            </div></center>
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
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
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
                                     <form>
                                        <div class="row">
                                            <div style="margin-left: 6%;/*! margin-right: -20%; */" class="col-sm-6 col-sm-offset-0">
                        <div class="group-material" style="margin-right: 15%;">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Juan" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Nombre</label>
                            </div></div>
                            <div class="col-sm-5 col-sm-offset-0">
                        <div class="group-material">
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="Perez" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" data-original-title="Solo letras">
                                <label>Apellido</label>
                            </div></div>
                            <div style="margin-top: -2%;" class="col-sm-6 col-sm-offset-1">
                                <fieldset style="margin-right: 11%;">
                                    <legend>Genero</legend>
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
                                    <input type="text" name="" id="nombreexp" class="material-control tooltips-general" placeholder="7777-7777" required="" data-min-length="1" data-selection-required="true" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" list="listaExp" data-original-title="Solo letras">
                                <label>Telefono</label>
                            </div></div>
                            <div class="col-xs-12 col-sm-1 col-sm-offset-1" style="margin-left: 6%;"><label style="color: #53a5b4;font-weight: bold;">Direccion</label></div>
                            <div style="margin-left: 6%;" class="col-xs-12 col-sm-11 col-sm-offset-0">
                                <div class="group-material" style="margin-bottom: 2%;margin-right: 5%;">
                                            <textarea id="nombreclinica" name="nombreclinica" type="text" class="material-control tooltips-general" placeholder="OS5969696" required="" data-toggle="tooltip" data-placement="top" title="" onkeypress="return sololetras(event);" style="width: 102%; height: 1%;" data-original-title="Solo letras"></textarea>
                                        </div>
                            </div>

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