
(function(){
  // Variables


  var listatabla = document.getElementById("listado"),
  proveedor = document.getElementById("proveedor"),
  distribuidora = document.getElementById("distribuidora"),
  fechacompra = document.getElementById("fechacompra"),
  nombrecategoria = document.getElementById("categoria"),
  nombreProducto = document.getElementById("producto"),
  cantidad = document.getElementById("cantidad"),
  unidadmedida = document.getElementById("medida"),
  fecha = document.getElementById("fecha"),
  precioCompra = document.getElementById("preciocompra"),
  precioVenta = document.getElementById("precioventa"),
  stock = document.getElementById("stock"),
  btnAgregar = document.getElementById("btn-agregar"),
  btnGuardar = document.getElementById("btn-guardar"),
  table = document.getElementById("myTable"),
  //totalpagar=document.getElementById("totalpagar"),
  tr = table.getElementsByTagName("tr");


  // Funciones
  var agregarProductosTabla = function(){

    var valorproveedor=proveedor.value,
    valorcategoria=nombrecategoria.value,
    valordistribuidora=distribuidora.value,
    valorfechacompra=fechacompra.value,
    valorproducto=nombreProducto.value,
    valorcantidad=cantidad.value,
    valormedida=unidadmedida.value,
    valorfecha=fecha.value,
    valorcompra=precioCompra.value,
    valorventa=precioVenta.value,
    valorstock=stock.value;
    if(valorcantidad!="" && valorcompra!="" && valorproducto!="" && valorcategoria!="" && valormedida!="" && valorstock!=""
     && valorproveedor!="" && valordistribuidora!=""){
      var total=parseFloat(valorcompra)*parseFloat(valorcantidad);

    var fila = document.createElement("tr"),

    columna1 = document.createElement("td"),
    columna2 = document.createElement("td"),
    columna3 = document.createElement("td"),
    columna4 = document.createElement("td"),
    columna5 = document.createElement("td"),
    columna6 = document.createElement("td"),
    columna7 = document.createElement("td"),
    columna8 = document.createElement("td"),
    columna9 = document.createElement("td"),
    columna10= document.createElement("td"),
    columna11= document.createElement("td"),
    columna12= document.createElement("td"),
    columna13= document.createElement("td"),

    botoneliminar = document.createElement("i"),
    elemetA=document.createElement("a"),
    limpiar1 = document.createTextNode(""),
    contenido1 = document.createTextNode(valorproveedor),
    contenido2 = document.createTextNode(valorcategoria),
    contenido3 = document.createTextNode(valorproducto),//
    contenido4 = document.createTextNode(valorcantidad),//
    contenido5 = document.createTextNode(valormedida),
    contenido6 = document.createTextNode(valorfecha),
    contenido7 = document.createTextNode(valorcompra),//
    contenido8 = document.createTextNode(valorventa),
    contenido9 = document.createTextNode(valorstock),
    contenidototal=document.createTextNode(total),
    contenido12=document.createTextNode(valordistribuidora),
    contenido13=document.createTextNode(valorfechacompra);

    botoneliminar.setAttribute("class", "zmdi zmdi-delete");
    botoneliminar.setAttribute("style", "color: #F91D0B;");
    elemetA.setAttribute("class","material-control");
    elemetA.setAttribute("btne-data-title","Eliminar");
    elemetA.setAttribute("maxlength","50");
    elemetA.appendChild(botoneliminar);
    var atributo=document.createAttribute("style");
    atributo.value="pointer-events: none;";
    proveedor.setAttributeNode(atributo);
    



    columna1.setAttribute("style","display:none;");
    columna2.setAttribute("style","display:none;");
    columna5.setAttribute("style","display:none;");
    columna6.setAttribute("style","display:none;");
    columna8.setAttribute("style","display:none;");
    columna9.setAttribute("style","display:none;");
    columna12.setAttribute("style","display:none;");
    columna13.setAttribute("style","display:none;");

    columna1.appendChild(contenido1);
    columna2.appendChild(contenido2);
    columna3.appendChild(contenido3);
    columna4.appendChild(contenido4);
    columna5.appendChild(contenido5);
    columna6.appendChild(contenido6);
    columna7.appendChild(contenido7);
    columna8.appendChild(contenido8);
    columna9.appendChild(contenido9);
    columna10.appendChild(elemetA);
    columna11.appendChild(contenidototal);
    columna12.appendChild(contenido12);
    columna13.appendChild(contenido13);
    
    fila.appendChild(columna1);
    fila.appendChild(columna2);
    fila.appendChild(columna3);
    fila.appendChild(columna4);
    fila.appendChild(columna5);
    fila.appendChild(columna6);
    fila.appendChild(columna7);
    fila.appendChild(columna8);
    fila.appendChild(columna9);
    fila.appendChild(columna11);
    fila.appendChild(columna10);
    fila.appendChild(columna12);
    fila.appendChild(columna13);

    
    
    //Limpiando el formulario
    document.getElementById("categoria").value="";
    document.getElementById("producto").value="";
    document.getElementById("cantidad").value="";
    document.getElementById("medida").value="";
    document.getElementById("preciocompra").value="";
    document.getElementById("precioventa").value="";
    document.getElementById("stock").value="";

    $("#cantidad").css("border", "2px solid #8ca7c8");
    $("#categoria").css("border", "2px solid #8ca7c8");
    $("#producto").css("border", "2px solid #8ca7c8");
    $("#medida").css("border", "2px solid #8ca7c8");
    $("#preciocompra").css("border", "2px solid #8ca7c8");
    $("#precioventa").css("border", "2px solid #8ca7c8");
    $("#distribuidora").css("border", "2px solid #8ca7c8");
    $("#stock").css("border", "2px solid #8ca7c8");
    $("#proveedor").css("border", "2px solid #8ca7c8");

    listatabla.appendChild(fila);
    


    var suma=null;
    var can=null;

    $('#myTable tbody tr').each(function (idx, fila){ 

      suma+=parseFloat(fila.children[9].innerHTML);
      can+=parseFloat(fila.children[6].innerHTML);
    });
    
    document.getElementById("totalpagar").value="$ "+suma;
    //document.getElementById("catidadproductos").value=can;



    
  }else{

   if ($("#cantidad").val() === "") {
    $("#cantidad").css("border", "2px solid #AD4148");
  }
  if ($("#categoria").val() === "") {
    $("#categoria").css("border", "2px solid #AD4148");
  }
  if ($("#producto").val() === "") {
    $("#producto").css("border", "2px solid #AD4148");
  }
  if ($("#medida").val() === "") {
    $("#medida").css("border", "2px solid #AD4148");
  }
  if ($("#preciocompra").val() === "") {
    $("#preciocompra").css("border", "2px solid #AD4148");
  }
  if ($("#precioventa").val() === "") {
    $("#precioventa").css("border", "2px solid #AD4148");
  }
  if ($("#stock").val() === "") {
    $("#stock").css("border", "2px solid #AD4148");
  }

  if ($("#distribuidora").val() === "") {
    $("#distribuidora").css("border", "2px solid #AD4148");
  }

  if ($("#proveedor").val() === "") {
    $("#proveedor").css("border", "2px solid #AD4148");
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
   //var proveedor, categoria, producto, cantidad, medida, fechacaducidad, compra,
   //venta, stock, distribuidora, fechacompras;


   $.post('../Producto/compra.php', { proveedor: listatabla.children[0].children[0].innerHTML, 
    fechacompra: listatabla.children[0].children[12].innerHTML} , (response) => {

     Swal.fire({
  title: "COMPRA GUARDADA",
  text: "Click en Aceptar!",
  icon: "success",
  button: "Aceptar!",
});


   });

   for(var i= 0; i<listatabla.children.length; i++){

    $.post('../Producto/agregar.php', { proveedor: listatabla.children[i].children[0].innerHTML,
      categoria: listatabla.children[i].children[1].innerHTML, 
      producto: listatabla.children[i].children[2].innerHTML,
      cantidad: listatabla.children[i].children[3].innerHTML,
      medida: listatabla.children[i].children[4].innerHTML, 
      fechacaducidad: listatabla.children[i].children[5].innerHTML,
      pcompra: listatabla.children[i].children[6].innerHTML,
      pventa:listatabla.children[i].children[7].innerHTML,
      stock: listatabla.children[i].children[8].innerHTML, 
      distribuidora: listatabla.children[i].children[11].innerHTML,
      fechacompra: listatabla.children[i].children[12].innerHTML} , (response) => {



      });

  }





  //alertify.success('COMPRA GUARDADA');

  $("#myTable tbody tr"). remove (); 

  var atributo=document.createAttribute("style");
  atributo.value="pointer-events: ;";
  document.getElementById("proveedor").setAttributeNode(atributo);
  document.getElementById("proveedor").value="";
  document.getElementById("distribuidora").value="";
  
};





btnAgregar.addEventListener("click", agregarProductosTabla);
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
    suma+=parseFloat(listatabla.children[i].children[3].innerHTML)*parseFloat(listatabla.children[i].children[6].innerHTML);
    can+=parseFloat(listatabla.children[i].children[3].innerHTML);
  }

  document.getElementById("totalpagar").value="";
  //document.getElementById("catidadproductos").value="";
  document.getElementById("totalpagar").value="$ "+suma;
 // document.getElementById("catidadproductos").value=can;

});



}());