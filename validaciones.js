function valida_correo(correo) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(correo)){	
   return (true)
  } else {
   return (false);
  }
 }

function valida_numero(numero){
if (!/^([0-9])*$/.test(numero)){
		return false;
}else{
		return true;
	}
}


function valida_cadena(texto){
	var RegExPattern = "[0-9]";
	 if (texto.match(RegExPattern)){
		return false;
	 }else{
		return true;
	 }
}

function validar_asist(){
	var f=document.form;
	
	if (f.ced.value == 0){
		document.getElementById("id_error").innerHTML="Ingrese Código";
		f.ced.value="";
		f.ced.focus();
		return false;
	}
	else{
		document.getElementById("id_error").innerHTML="";
		if (valida_numero(f.ced.value)==false){
			document.getElementById("id_error").innerHTML="Código inválido, solo números";
			f.ced.value="";
			f.ced.focus();
			return false;
			}
		else{
			document.getElementById("id_error").innerHTML="";
			f.submit();
			}
	}
}


function validar_sesion(){
		var f=document.form;
		
		document.getElementById("pass_error").innerHTML="";
		document.getElementById("nick_error").innerHTML="";
		if (f.nick.value == 0){
			document.getElementById("nick_error").innerHTML="Ingrese Usuario";
			f.nick.value="";
			f.nick.focus();
			return false;
		}
		else{
			if (f.pass.value == 0){
				document.getElementById("pass_error").innerHTML="Ingrese su Contraseña";
				f.pass.value="";
				f.pass.focus();
				return false;
				}	
			else{
				if (f.pass.value.length < 6){
					document.getElementById("pass_error").innerHTML="Error de contraseña, su clave debe contener al menos 6 caracteres";
					f.pass.value="";
					f.pass.focus();
					return false;
					}
				else{
					f.submit();
					return true;
					}
				}
		}
	}
	

function validar_doc_new(){
	var f=document.form;
	document.getElementById("ced_error").innerHTML="";
	document.getElementById("nombre_error").innerHTML="";
	document.getElementById("apellido_error").innerHTML="";
	document.getElementById("profesion_error").innerHTML="";
	document.getElementById("telefono_error").innerHTML="";
	document.getElementById("correo_error").innerHTML="";
	document.getElementById("hist_error").innerHTML="";
	
	if (f.ced.value==0){
		document.getElementById("ced_error").innerHTML="Debe ingresar un Nro de Cédula";
		f.ced.value="";
		f.ced.focus();
		return false
		}
	if (valida_numero(f.ced.value)==false){
		document.getElementById("ced_error").innerHTML="Debe ingresar un Nro de Cédula válido";
		f.ced.value="";
		f.ced.focus();
		return false;	
	}
	
	if (f.nombre.value==0){
		document.getElementById("nombre_error").innerHTML="Ingrese Nombre";
		f.nombre.value="";
		f.nombre.focus();
		return false
		}
	if (valida_cadena(f.nombre.value)==false){
		document.getElementById("nombre_error").innerHTML="Ingrese un Nombre válido";
		f.nombre.value="";
		f.nombre.focus();
		return false
		}
		
	if(f.apellido.value==0){
		document.getElementById("apellido_error").innerHTML="Ingrese Apellido";
		f.apellido.value="";
		f.apellido.focus();
		return false
		}
	if (valida_cadena(f.apellido.value)==false){
		document.getElementById("apellido_error").innerHTML="Ingrese un Apellido válido";
		f.apellido.value="";
		f.apellido.focus();
		return false
		}
	
	if(f.profesion.value==0){
		document.getElementById("profesion_error").innerHTML="Ingrese Profesión principal";
		f.profesion.value="";
		f.profesion.focus();
		return false
		}
	if (valida_cadena(f.profesion.value)==false){
		document.getElementById("profesion_error").innerHTML="Ingrese una Profesion válida";
		f.profesion.value="";
		f.profesion.focus();
		return false
		}
	
	if(f.telefono.value==0){
		document.getElementById("telefono_error").innerHTML="Ingrese Nro de teléfono";
		f.telefono.value="";
		f.telefono.focus();
		return false
	}
	if(f.telefono.value.length<11){
		document.getElementById("telefono_error").innerHTML="Ingrese Nro de teléfono válido";
		f.telefono.value="";
		f.telefono.focus();
		return false
		}
	
	if(f.correo.value==0){
		document.getElementById("correo_error").innerHTML="Ingrese correo";
		f.correo.value="";
		f.correo.focus();
		return false
	}
	if(valida_correo(f.correo.value)==false){
		document.getElementById("correo_error").innerHTML="Ingrese un correo electrónico válido";
		f.correo.value="";
		f.correo.focus();
		return false
		}
	
	f.submit();
}
	
	
function validar_doc_busc(){
	var f=document.form;
	document.getElementById("ced_error").innerHTML="";
	
	if (f.ced.value==0){
		document.getElementById("ced_error").innerHTML="Debe ingresar un Nro de Cédula";
		f.ced.value="";
		f.ced.focus();
		return false
		}
	if (valida_numero(f.ced.value)==false){
		document.getElementById("ced_error").innerHTML="Debe ingresar un Nro de Cédula válido";
		f.ced.value="";
		f.ced.focus();
		return false;	
	}
	
	f.submit();
}


function validar_actualizar(){
	var f=document.form;
	document.getElementById("nombre_error").innerHTML="";
	document.getElementById("apellido_error").innerHTML="";
	document.getElementById("profesion_error").innerHTML="";
	document.getElementById("telefono_error").innerHTML="";
	document.getElementById("correo_error").innerHTML="";
	document.getElementById("hist_error").innerHTML="";
	
	if (f.nombre.value==0){
		document.getElementById("nombre_error").innerHTML="Ingrese Nombre";
		f.nombre.value="";
		f.nombre.focus();
		return false
		}
	if (valida_cadena(f.nombre.value)==false){
		document.getElementById("nombre_error").innerHTML="Ingrese un Nombre válido";
		f.nombre.value="";
		f.nombre.focus();
		return false
		}
		
	if(f.apellido.value==0){
		document.getElementById("apellido_error").innerHTML="Ingrese Apellido";
		f.apellido.value="";
		f.apellido.focus();
		return false
		}
	if (valida_cadena(f.apellido.value)==false){
		document.getElementById("apellido_error").innerHTML="Ingrese un Apellido válido";
		f.apellido.value="";
		f.apellido.focus();
		return false
		}
	
	if(f.profesion.value==0){
		document.getElementById("profesion_error").innerHTML="Ingrese Profesión principal";
		f.profesion.value="";
		f.profesion.focus();
		return false
		}
	if (valida_cadena(f.profesion.value)==false){
		document.getElementById("profesion_error").innerHTML="Ingrese una Profesion válida";
		f.profesion.value="";
		f.profesion.focus();
		return false
		}
	
	if(f.telefono.value==0){
		document.getElementById("telefono_error").innerHTML="Ingrese Nro de teléfono";
		f.telefono.value="";
		f.telefono.focus();
		return false
	}
	if(f.telefono.value.length<11){
		document.getElementById("telefono_error").innerHTML="Ingrese Nro de teléfono válido";
		f.telefono.value="";
		f.telefono.focus();
		return false
		}
	
	if(f.correo.value==0){
		document.getElementById("correo_error").innerHTML="Ingrese correo";
		f.correo.value="";
		f.correo.focus();
		return false
	}
	if(valida_correo(f.correo.value)==false){
		document.getElementById("correo_error").innerHTML="Ingrese un correo electrónico válido";
		f.correo.value="";
		f.correo.focus();
		return false
		}
	
	f.submit();
}


function asignar_mat(){
	var f=document.form;
	
	if (f.cod_mat.value==0){
		document.getElementById("cod_error").innerHTML="Seleccione Matéria";
		f.cod_mat.value="";
		f.cod_mat.focus();
		return false
		}
		
	if (f.seccion.value==0){
		document.getElementById("seccion_error").innerHTML="Ingrese Sección";
		f.seccion.value="";
		f.seccion.focus();
		return false
		}
	if (f.seccion.value.length<3){
		document.getElementById("seccion_error").innerHTML="Ingrese Sección válida";
		f.seccion.value="";
		f.seccion.focus();
		return false
		}
		
	if (f.periodo.value==0){
		document.getElementById("periodo_error").innerHTML="Ingrese Periodo Lectivo";
		f.periodo.value="";
		f.periodo.focus();
		return false		
		}
		
	f.submit()
	}

function validar_doc_mat(){
	var f=document.form;
	document.getElementById("ced_error").innerHTML="";
	document.getElementById("cod_error").innerHTML="";
	
	if (f.ced.value==0){
		document.getElementById("ced_error").innerHTML="Debe ingresar un Nro de Cédula";
		f.ced.value="";
		f.ced.focus();
		return false
		}
	if (valida_numero(f.ced.value)==false){
		document.getElementById("ced_error").innerHTML="Debe ingresar un Nro de Cédula válido";
		f.ced.value="";
		f.ced.focus();
		return false;	
	}
	
	if (f.cod_carrera.value==0){
		document.getElementById("cod_error").innerHTML="Seleccione Carrera";
		f.cod_carrera.value="";
		f.cod_carrera.focus();
		return false
		}
	f.submit();
	}
	
function validar_carrera(){
	var f=document.form;
	document.getElementById("nombre_error").innerHTML="";
	document.getElementById("cod_error").innerHTML="";
	
	
	if (f.cod_carrera.value==0){
		document.getElementById("cod_error").innerHTML="Ingrese Código de Carrera";
		f.cod_carrera.value="";
		f.cod_carrera.focus();
		return false
		}
		
	if(f.nombre.value==0){
		document.getElementById("nombre_error").innerHTML="Ingrese Nombre de Carrera";
		f.nombre.value="";
		f.nombre.focus();
		return false
		}
	if(valida_cadena(f.nombre.value)==false){
		document.getElementById("nombre_error").innerHTML="Ingrese Solo letras";
		f.nombre.value="";
		f.nombre.focus();
		return false
		}
		
	f.submit();
	}
	
	
function validar_materia(){
	var f=document.form;
	document.getElementById("nombre_error").innerHTML="";
	document.getElementById("cod_error").innerHTML="";
	document.getElementById("semestre_error").innerHTML="";
	
	
	if (f.cod.value==0){
		document.getElementById("cod_error").innerHTML="Ingrese Código de Matéria";
		f.cod.value="";
		f.cod.focus();
		return false
		}
		
	if(f.nombre.value==0){
		document.getElementById("nombre_error").innerHTML="Ingrese Nombre de Carrera";
		f.nombre.value="";
		f.nombre.focus();
		return false
		}
	if(valida_cadena(f.nombre.value)==false){
		document.getElementById("nombre_error").innerHTML="Ingrese Solo letras";
		f.nombre.value="";
		f.nombre.focus();
		return false
		}
		
	if(f.semestre.value==0){
		document.getElementById("semestre_error").innerHTML="Ingrese Semestre";
		f.semestre.value="";
		f.semestre.focus();
		return false
		}
	if(valida_cadena(f.semestre.value)==false){
		document.getElementById("semestre_error").innerHTML="Ingrese solo letras (Números Romanos)";
		f.semestre.value="";
		f.semestre.focus();
		return false
		}	
	
		
	f.submit();
	}
	
	
function validar_mat_busc(){
	var f=document.form;
	document.getElementById("cod_error").innerHTML="";
	
	if (f.cod.value==0){
		document.getElementById("cod_error").innerHTML="Debe ingresar Código de Materia";
		f.cod.value="";
		f.cod.focus();
		return false
		}
	
	f.submit();
}


function validar_horario(){
	var f=document.form;
	document.getElementById("ced_error").innerHTML="";
	document.getElementById("cod_error").innerHTML="";
	document.getElementById("seccion_error").innerHTML="";
	document.getElementById("periodo_error").innerHTML="";
	document.getElementById("hora_ent_error").innerHTML="";
	document.getElementById("hora_sal_error").innerHTML="";
	document.getElementById("horas_error").innerHTML="";
	document.getElementById("aula_error").innerHTML="";
	
	if (f.ced.value==0){
		document.getElementById("ced_error").innerHTML="Debe ingresar un Nro de Cédula";
		f.ced.value="";
		f.ced.focus();
		return false
		}
	if (valida_numero(f.ced.value)==false){
		document.getElementById("ced_error").innerHTML="Debe ingresar un Nro de Cédula válido";
		f.ced.value="";
		f.ced.focus();
		return false;	
	}
	
	if (f.cod.value==0){
		document.getElementById("cod_error").innerHTML="Debe ingresar un Código de materia";
		f.cod.value="";
		f.cod.focus();
		return false
		}
		
	if (f.seccion.value==0){
		document.getElementById("seccion_error").innerHTML="Debe ingresar Sección";
		f.seccion.value="";
		f.seccion.focus();
		return false
		}
		
	if (f.periodo.value==0){
		document.getElementById("periodo_error").innerHTML="Debe ingresar periodo lectivo";
		f.periodo.value="";
		f.periodo.focus();
		return false
		}
		
	if (f.hora_ent.value==0){
		document.getElementById("hora_ent_error").innerHTML="Debe ingresar Hora de entrada";
		f.hora_ent.value="";
		f.hora_ent.focus();
		return false
		}
		
	if (f.hora_sal.value==0){
		document.getElementById("hora_sal_error").innerHTML="Debe ingresar Hora de Salida";
		f.hora_sal.value="";
		f.hora_sal.focus();
		return false
		}
		
	if (f.aula.value==0){
		document.getElementById("aula_error").innerHTML="Debe ingresar un Nro de Aula";
		f.aula.value="";
		f.aula.focus();
		return false
		}
		
	if (f.horas.value==0){
		document.getElementById("horas_error").innerHTML="Debe ingresar un Nro de Horas académicas";
		f.horas.value="";
		f.horas.focus();
		return false
		}
	if (valida_numero(f.horas.value)==false){
		document.getElementById("horas_error").innerHTML="Debe ingresar un Nro de Horas académicas";
		f.horas.value="";
		f.horas.focus();
		return false
		}
		
	
	f.submit();
}