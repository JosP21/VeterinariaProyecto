
(function(){
  // Variables


  var listatabla = document.getElementById("listado"),
  factura = document.getElementById("factura"),
  cliente = document.getElementById("cliente"),
  empleado = document.getElementById("empleado"),
  producto = document.getElementById("producto"),
  cantidad = document.getElementById("cantidad"),
  existencia = document.getElementById("existencia"),
  precio = document.getElementById("precio"),

  btnAdd = document.getElementById("btn-Agregar"),
  btnGuardar = document.getElementById("btn-guardar"),
  table = document.getElementById("myTable"),
  //totalpagar=document.getElementById("totalpagar"),
  tr = table.getElementsByTagName("tr");


  // Funciones
  var agregarDetalle = function(){
    
    var clienteval=cliente.value,
    empleadoval=empleado.value,
    productoval=producto.value,
    cantidadval=cantidad.value,
    existenciaval=existencia.value,
    precioval=precio.value,
    facturaval=factura.value;
    
    if(clienteval!="" && cantidadval!="" && empleadoval!="" && clienteval!="" && productoval!="" && existenciaval!=""){

    var subtotal=parseFloat(cantidadval)*parseFloat(precioval);
    var fila = document.createElement("tr"),

    columna1 = document.createElement("td"),
    columna2 = document.createElement("td"),
    columna3 = document.createElement("td"),
    columna4 = document.createElement("td"),
    columna5 = document.createElement("td"),
    columna6 = document.createElement("td"),
    columna7 = document.createElement("td"),
    columna8 = document.createElement("td"),
    
    botoneliminar = document.createElement("i"),
    elemetA=document.createElement("a"),
    limpiar1 = document.createTextNode(""),

    contenido1 = document.createTextNode(productoval),
    contenido2 = document.createTextNode(cantidadval),
    contenido3 = document.createTextNode(precioval),//

    contenido4 = document.createTextNode(clienteval),//
    contenido5 = document.createTextNode(empleadoval),
    contenido6 =  document.createTextNode(subtotal);
    contenido7 =  document.createTextNode(facturaval);

    botoneliminar.setAttribute("class", "zmdi zmdi-delete");
    botoneliminar.setAttribute("style", "color: #F91D0B;");
    elemetA.setAttribute("class","material-control");
    elemetA.setAttribute("btne-data-title","Eliminar");
    elemetA.setAttribute("maxlength","50");
    elemetA.appendChild(botoneliminar);

    
    //columna4.setAttribute("style","display:none;");
    columna5.setAttribute("style","display:none;");
    columna6.setAttribute("style","display:none;");
    columna7.setAttribute("style","display:none;");
    columna8.setAttribute("style","display:none;");
  

    columna1.appendChild(contenido1);
    columna2.appendChild(contenido2);
    columna3.appendChild(contenido3);
    columna4.appendChild(elemetA);
    columna5.appendChild(contenido4);
    columna6.appendChild(contenido5);
    columna7.appendChild(contenido6);
    columna8.appendChild(contenido7);
   
    
    fila.appendChild(columna1);
    fila.appendChild(columna2);
    fila.appendChild(columna3);
    fila.appendChild(columna4);
    fila.appendChild(columna5);
    fila.appendChild(columna6);
    fila.appendChild(columna7);
    fila.appendChild(columna8);
    
    
    
    //Limpiando el formulario
    document.getElementById("producto").value="";
    document.getElementById("cantidad").value="";
    document.getElementById("existencia").value="";
    document.getElementById("precio").value="";
    

    $("#producto").css("border", "2px solid #8ca7c8");
    $("#cantidad").css("border", "2px solid #8ca7c8");
    $("#existencia").css("border", "2px solid #8ca7c8");
    $("#precio").css("border", "2px solid #8ca7c8");
    $("#cliente").css("border", "2px solid #8ca7c8");
    

    listatabla.appendChild(fila);
    


    var suma=null;
    var can=null;

    $('#myTable tbody tr').each(function (idx, fila){ 

      suma+=parseFloat(fila.children[6].innerHTML);
      can+=parseFloat(fila.children[1].innerHTML);
    });
    
    document.getElementById("total").value="$ "+suma;
    document.getElementById("cantidadpro").value=can;



    
  }else{

   if ($("#cantidad").val() === "") {
    $("#cantidad").css("border", "2px solid #AD4148");
  }
  if ($("#producto").val() === "") {
    $("#producto").css("border", "2px solid #AD4148");
  }
  if ($("#precio").val() === "") {
    $("#precio").css("border", "2px solid #AD4148");
  }
  if ($("#existencia").val() === "") {
    $("#existencia").css("border", "2px solid #AD4148");
  }
  if ($("#cliente").val() === "") {
    $("#cliente").css("border", "2px solid #AD4148");
  }

}

/*  cantidad
    for (var i = 0; i <= listatabla.children.length -1; i++) {
      listatabla.children[i].addEventListener("click", function(){
        this.parentNode.removeChild(this);
        
      });
    }
    */
  };
 
 
  
  var guardar = function(){
   
   


   $.post('../Venta/venta.php', { factura: listatabla.children[0].children[7].innerHTML, 
    empleadoN: listatabla.children[0].children[5].innerHTML, 
    clienteN: listatabla.children[0].children[4].innerHTML} , (response) => {
/*
     Swal.fire({
  title: "VENTA GUARDADA",
  text: "Click en Aceptar!",
  icon: "success",
  button: "Aceptar!",
});
*/
/*
 for(var i= 0; i<listatabla.children.length; i++){
              //document.getElementById("producto").value=listatabla.children[i].children[0].innerHTML;
       
    $.post('../Venta/agregarVenta.php', { factura: listatabla.children[i].children[7].innerHTML,
      cantidad: listatabla.children[i].children[1].innerHTML, 
      producto: listatabla.children[i].children[0].innerHTML} , (response) => {

      alertify.success('Nuevo');
      });
    

  }*/

   });



   for(var i= 0; i<listatabla.children.length; i++){
              //document.getElementById("producto").value=listatabla.children[i].children[0].innerHTML;
       
    $.post('../Venta/agregarVenta.php', { factura: listatabla.children[i].children[7].innerHTML,
      cantidad: listatabla.children[i].children[1].innerHTML, 
      producto: listatabla.children[i].children[0].innerHTML} , (response) => {

   //alertify.success('Entro');

      });

  }


 Swal.fire({
  title: "VENTA GUARDADA",
  text: "Click en Aceptar!",
  icon: "success",
  button: "Aceptar!",
});


  //alertify.success('COMPRA GUARDADA');

  $("#myTable tbody tr"). remove (); 

  
};



btnAdd.addEventListener("click", agregarDetalle);

btnGuardar.addEventListener("click", guardar);


listatabla.addEventListener("click", function (evento) {
  var target = evento.target;
  var tr;
  var currentTarget = evento.currentTarget;
  if(target.nodeName == "I") {
    tr = target.parentNode.parentNode.parentNode;
    currentTarget.removeChild(tr);
  } else if(target.nodeName == "A") {
    tr = target.parentNode.parentNode;
    currentTarget.removeChild(tr);
  }

  
  var suma=0;
  var can=0;
  for(var i=0; i<listatabla.children.length; i++){
    suma+=parseFloat(listatabla.children[i].children[6].innerHTML);
   can+=parseFloat(listatabla.children[i].children[1].innerHTML);
  }

  //document.getElementById("total").value="";
  document.getElementById("cantidadpro").value=""+can;
  document.getElementById("total").value="$ "+suma;
 // document.getElementById("catidadproductos").value=can;
 

});



}());