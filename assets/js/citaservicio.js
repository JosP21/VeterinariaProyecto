
document.querySelector('#btn-guardar-ser').addEventListener('click', agregar);
document.querySelector('#btn-guardar-cta-ser').addEventListener('click', guardarSer);
function agregar(){
  var expe = document.querySelector("#expediente"),
  fecha = document.querySelector("#fechaS"),
  hora = document.querySelector("#horaS"),
  emple = document.querySelector("#empleado"),
  servi = document.querySelector("#ser"),
  precio = document.querySelector("#precio");
  agregardatos(expe,fecha,hora,emple,servi,precio);
  agregarTabla();
}

function agregarTabla(){
  var lista=getList(),
  tbody=document.querySelector('#myTable tbody');

  tbody.innerHTML='';
  var total=0;

  for(var i=0;i<lista.length;i++){
  	var row=tbody.insertRow(i);
  	var sercell=row.insertCell(0),
  	preciocell=row.insertCell(1);

  	sercell.innerHTML=list[i].dser;
  	preciocell.innerHTML=list[i].dprecio;

    tbody.appendChild(row);

  }

  var suma=0.0;
    $('#myTable tbody').find('tr').each(function (i, el) {
             
        //Voy incrementando las variables segun la fila ( .eq(0) representa la fila 1 )  
        suma += parseFloat($(this).find('td').eq(1).text());
                
    });
    
    document.getElementById("totalpagar").value="$ "+suma;
}

/*document.querySelector('#myTable').addEventListener('click',(e){
  if(e.target.nodeName==='TD'){
    e.target.style.backgroundColor='tomato';
  }
});*/

function guardarSer(){
  textos = "CONTENIDO_TABLA";
     $('#myTable tbody').find('tr').each(function (i, el) {
             
        $.ajax({
        type:"POST",
        url:"../metodosAjax/guardar-cita.php",
        data:{
          servicio:$(this).find('td').eq(0).text(),
          precio:parseFloat($(this).find('td').eq(1).text()),
          fecha:document.getElementById("fechaS").value,
          hora:document.getElementById("horas").value,
          expediente:document.getElementById("expediente").value,
          empleado:document.getElementById("empleado").value
        },
        success:function(resp){
                alert(resp);
        }
    });
                
    });

}