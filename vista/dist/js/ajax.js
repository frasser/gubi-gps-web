function objetoAjax(){
  var xmlhttp =false;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {

    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;

      }

    }
    if (!xmlhttp && typeof XMLHttpRequest !='undefined') {
      xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;

}
/* para hacer pruebas de correcto llamado
function a(){
  alert ('hola');
}
*/


function Registrar(){


  nombre = document.frmUsuarios.nombres.value;
  usuario = document.frmUsuarios.user.value;
  password = document.frmUsuarios.contra.value;

  //---> el siguiente codigo permite recorrer en un array
  //---> los valores de un radio button y asigna el chekeado a una variable
  var elementos = document.getElementsByName('tipo');
  var tip;
  for(var i=0; i<elementos.length; i++) {
  if(elementos[i].checked){
    tip = elementos[i].value; break;}
  }


 // ------  / aca acaba el codigo para obtener  el valor de un radio button

  //alert($('input[name=tipo]:checked', '#frmUsuarios').val());  esto hace lo mismo
  //alert ("Datos  :  "+nombre+" "+usuario+" "+password+"  "+tip);
  ajax = objetoAjax();

  ajax.open('POST','../../../controladores/registro.php',true);
  ajax.onreadystatechange = function(){
    if (ajax.readyState == 4 && this.status == 200) {
      alert('los datos fueron guardados con exito!');
    //  Modal.location.reload(true)
     alert('vamos bn');
    }
  }
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("nombres="+nombre+"&usuarios="+usuario+"&contra="+password+"&tip="+tip);
   alert('asi es');
}
