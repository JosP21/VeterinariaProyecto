function solonumero(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key);
        numero="0123456789";
        teclas="8-37-38-46";
        teclasesp=false;
        for(var i in teclas){
            if(key==teclas[i]){
                teclasesp=true;
            }
        }

        if(numero.indexOf(teclado)==-1 && !teclasesp){
            alertify.error('ERROR, Solo se permiten caracter numerico', 'success', 5, function(){});
            return false;
        }

      }
function mensaje()
{
  alertify.success('En esta seccion podra llevar acabo un nuevo registro, teniendo en cuenta que todos los campos son obligatorios', 'success', 5, function(){});  
  /*document.getElementById('nombrepropietario').value="Hooooola";*/
}
function mensaje1()
{
  alertify.error('En esta seccion podra llevar acabo un nuevo registro, teniendo en cuenta que todos los campos son obligatorios', 'success', 5, function(){});  
}
   function sololetras(e){
        key=e.keyCode || e.which;
        teclado=String.fromCharCode(key);
        letras=" áéíóúÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
        teclas="8-37-38-46-164";
        teclasesp=false;
        //var esp=document.getElementById("nombreclinica").value;
        for(var i in teclas){
            if(key==teclas[i]){
                teclasesp=true;break;
            }
        }
        if(letras.indexOf(teclado)==-1 && !teclasesp){
            //document.getElementById('nc').style.display = 'block';
            alertify.error('ERROR, Solo se permiten letras', 'success', 5, function(){});
            //document.getElementById("nombreclinica").style.borderColor="#FC0000";
            return false;
        }
        //document.getElementById('nc').style.display = 'none';
        //document.getElementById("nombreclinica").style.borderColor="#030A57";
      }

function abrirVentana(){
        var url = "../from/ayuda.php";
        window.open(url, "Nuevo","alwaysRaised=no,toolbar=no,menubar=no,status=no,resizable=no,width=900,height=800,location=no");
      }
function abrirRC(){
        var url = "../from/reportecompra.php";
        window.open(url, "Nuevo","alwaysRaised=no,toolbar=no,menubar=no,status=no,resizable=no,width=2000%,height=1000%,location=no");
      }

      function abrirRV(){
        var url = "../from/reporteventa.php";
        window.open(url, "Nuevo","alwaysRaised=no,toolbar=no,menubar=no,status=no,resizable=no,width=2000%,height=1000%,location=no");
      }
function mostrarMensaje(titulo,tipo,tiempo,texto,vf){
    swal.fire({
        type : tipo,
        title: titulo,
        text:texto,
        timer:tiempo,
        showConfirmButton: vf
    });
}