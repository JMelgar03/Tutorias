$(document).ready(function(){

	estudiante = {
		nombreEstudiante: "Aldo Fernando Flores Córdova",
		numeroCuenta: "20131013754",
		correo: "aldoflorescordova@gmail.com",
		telefono: "95341942",
		carrera: "Ingenieria en Sistemas"
	}

	$("#nombreUsuario").text(" | " + estudiante.nombreEstudiante);
	$("#numeroCuenta").text(estudiante.numeroCuenta);
	$("#correo").text(estudiante.correo);
	$("#telefono").text(estudiante.telefono);
	$("#carrera").text(estudiante.carrera);

	$("#btn-menu").click(function(){
		window.location.href='HomeEstudiante.html';
	})
});