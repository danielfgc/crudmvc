
function verificarUsuario(rutaUrl) {
	axios.get(rutaUrl+"?nuevousuario="+document.getElementById('nuevousuario').value)
	.then((response)=>{
		document.getElementById('destino').innerHTML = response.data;
	})
	.catch((error)=>{
		console.log(error);
	})
}



