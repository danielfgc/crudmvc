function updateUsuario(rutaUrl) {
	
    axios.post(rutaUrl,{
        iduser: document.getElementById('iduser').value,
        nuevousuario:""+ document.getElementById('nuevousuario').value+"",
        email:""+ document.getElementById('email').value+"",
        nuevacontraseña:""+ document.getElementById('nuevacontraseña').value+"",
        repetircontraseña:""+ document.getElementById('repetircontraseña').value+"",
        urlfoto:""+ document.getElementById('urlfoto').value+"",
        respuesta:""+ document.getElementById('respuesta').value+"",
        pregunta:""+ document.getElementById('pregunta').value+""
    })
	.then((response)=>{
        respuesta= response.data;
        if(respuesta == 'Usuario actualizado'){
            window.alert(respuesta);
            window.location.href = 'index.php';
        }else{
            document.getElementById('errupdate').innerHTML = respuesta;
        }
	})
	.catch((error)=>{
		console.log(error);
	})
}