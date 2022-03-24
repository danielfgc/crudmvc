
function verificarUsuario(rutaUrl) {
	axios.get(rutaUrl+"?nuevousuario="+document.getElementById('nuevousuario').value)
	.then((response)=>{
		document.getElementById('destino').innerHTML = response.data;
	})
	.catch((error)=>{
		console.log(error);
	})
}

urlFoto = document.getElementById('urlfoto');
foto = document.getElementById('foto');

