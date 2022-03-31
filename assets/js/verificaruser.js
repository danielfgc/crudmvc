function recuperar1(rutaUrl) {
    axios.post(rutaUrl,{
        recuperaruser: document.getElementById('recuperaruser').value
    })
	.then((response)=>{
		const datos = response.data;

		if(datos.modal == undefined || datos.pregunta == undefined){
			document.getElementById('erroruser').innerHTML = "<p class='text-danger'>Usuario incorrecto</p>";
            document.getElementById('aciertouser').setAttribute('data-bs-target', null);
		}else{
            document.getElementById('erroruser').innerHTML = "";
			document.getElementById('aciertouser').setAttribute('data-bs-target', datos.modal);
			document.getElementById('pregunta').innerText = datos.pregunta;
            document.getElementById('user').value = datos.user;
		}
	})
	.catch((error)=>{
		console.log(error);
	})
}