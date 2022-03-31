function recuperar3(rutaUrl) {
    axios.post(rutaUrl,{
        user: document.getElementById('user').value,
        recucontra: document.getElementById('recucontra').value,
        reperecucontra: document.getElementById('reperecucontra').value
    })
	.then((response)=>{
		const datos = response.data;

		if(datos){
			window.alert('Contraseña actualizada');
            window.location.href = 'index.php';
		}else{
            window.alert('Las contraseñas no coinciden');
		}
	})
	.catch((error)=>{
		console.log(error);
	})
}