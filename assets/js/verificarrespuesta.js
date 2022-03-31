function recuperar2(rutaUrl) {
    axios.post(rutaUrl,{
        user: document.getElementById('user').value
    })
	.then((response)=>{
		const datos = response.data;

		if(datos == undefined){
			document.getElementById('errorrespuesta').innerHTML = "<p class='text-danger'>Respuesta incorrecta</p>";
            document.getElementById('aciertorespuesta').setAttribute('data-bs-target', null);
		}else{
            document.getElementById('errorrespuesta').innerHTML = "";
			document.getElementById('aciertorespuesta').setAttribute('data-bs-target', datos);
		}
	})
	.catch((error)=>{
		console.log(error);
	})
}