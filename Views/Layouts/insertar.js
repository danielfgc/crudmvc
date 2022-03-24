function insertarUsuario(rutaUrl) {
	
    axios.post(rutaUrl)
	.then((response)=>{
		document.getElementById('erregister').innerHTML = response.data;
	})
	.catch((error)=>{
		console.log(error);
	})
}