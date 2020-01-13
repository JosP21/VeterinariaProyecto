var list=[];

function agregardatos(idexp,fecha,hora,empleado,servicio,precio){
 var  nuevodato={
  dexp:idexp.value,dfecha:fecha,dhora:hora,demple:empleado.value,dser:servicio.value,dprecio:precio.value
 };
 console.log(nuevodato);
 list.push(nuevodato);
}

function getList(){
  return list;
}
