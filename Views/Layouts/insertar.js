function insertarUsuario(rutaUrl) {
	
    axios.post(rutaUrl,{
        nuevousuario: document.getElementById('nuevousuario').value,
        email:document.getElementById('email').value,
        nuevacontraseña:document.getElementById('nuevacontraseña').value,
        repetircontraseña:document.getElementById('repetircontraseña').value,
        urlfoto:document.getElementById('urlfoto').value,
        foto:document.getElementById('foto').value,
        respuesta:document.getElementById('respuesta').value,
        pregunta:document.getElementById('pregunta').value,
    })
	.then((response)=>{
		document.getElementById('erregister').innerHTML = response.data;
	})
	.catch((error)=>{
		console.log(error);
	})
}