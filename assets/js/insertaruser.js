function insertarUsuario(rutaUrl) {
	

    axios.post(rutaUrl,{
        nuevousuario:""+ document.getElementById('nuevousuario').value+"",
        email:""+ document.getElementById('email').value+"",
        nuevacontraseña:""+ document.getElementById('nuevacontraseña').value+"",
        repetircontraseña:""+ document.getElementById('repetircontraseña').value+"",
        urlfoto: ""+ document.getElementById('urlfoto').value+"",
        respuesta:""+ document.getElementById('respuesta').value+"",
        pregunta:""+ document.getElementById('pregunta').value+""
    })
	.then((response)=>{
        respuesta= response.data;
        if(respuesta == 'Registro realizado con éxito'){
            window.alert(respuesta);
            window.location.href = 'index.php';
        }else{
            document.getElementById('erregister').innerHTML = respuesta;
        }
	})
	.catch((error)=>{
		console.log(error);
	})
}