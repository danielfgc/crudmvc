function login(rutaUrl) {
    axios.post(rutaUrl,{
        usuario: document.getElementById('usuario').value,
        contraseña: document.getElementById('usuario').value
    })
	.then((response)=>{
		document.getElementById('errorlogin').innerHTML = response.data;
	})
	.catch((error)=>{
		console.log(error);
	})
}