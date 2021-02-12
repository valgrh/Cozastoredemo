// LOGIN DE FIREBASE
function registrar(){
	//console.log('diste un click');
	var email = document.getElementById('email').value;
	var contrasena = document.getElementById('contrasena').value;

	console.log(email);
	console.log(contrasena);

	firebase.auth().createUserWithEmailAndPassword(email, contrasena)
  .then((user) => {
  	verificar();
    // Signed in
    // ...
  })
  .catch((error) => {
    var errorCode = error.code;
    var errorMessage = error.message;
    // ..
    console.log(errorCode);
    console.log(errorMessage);
  });
  }

function ingresar(){

	var email2 = document.getElementById('email2').value;
	var contrasena2 = document.getElementById('contrasena2').value;

	firebase.auth().signInWithEmailAndPassword(email2, contrasena2)
  .then((user) => {
    // Signed in
    // ...
  })
  .catch((error) => {
    var errorCode = error.code;
    var errorMessage = error.message;

    console.log(errorCode);
    console.log(errorMessage);
  });
}

function observador(){
	firebase.auth().onAuthStateChanged((user) => {
  if (user) {
  	console.log('existe usuario activo')
  	// aparece(email);
  	var displayname = user.displayname;
  	var email = user.email;
  	aparece(email,user);
  	console.log(user);
  	var emailVerified = user.emailVerified;
  	console.log(user.emailVerified);
  	var photoURL = user.photoURL;
  	var isAnonymous = user.isAnonymous;
    var uid = user.uid;
    var providerData = user.providerData;
    // ...
  } else {
    // User is signed out
    console.log('no existe usuario activo')
    // ...
  }
});
}
observador();

function aparece(email, user){
	var user = user;
	var contenido = document.getElementById('contenido');
	var correo = document.getElementById('correo');
	var logout = document.getElementById('logout');
	// contenido.innerHTML = "Lograste ingresar con exito";
	// correo.innerHTML = "Correo: " + email;
	if (user.emailVerified) {
		contenido.innerHTML = `
	<p>Lograste ingresar con exito</p>
	`
	correo.innerHTML = "Correo: " + email;
	logout.innerHTML = ` <button onclick = "cerrar()" >Cerrar sesion</button>`
	}

	// contenido.innerHTML = `
	// <p>Lograste ingresar con exito</p>
	// `
	// correo.innerHTML = "Correo: " + email;
	// logout.innerHTML = ` <button onclick = "cerrar()" >Cerrar sesion</button>`


}


function cerrar(){
	firebase.auth().signOut().then(function() {
		console.log("saliendo");
  // Sign-out successful.
}).catch(function(error) {
	console.log(error);
  // An error happened.
});

redireccionar();
}

function verificar(){
	var user = firebase.auth().currentUser;

user.sendEmailVerification().then(function() {
  // Email sent.
  console.log("enviando correo");
}).catch(function(error) {
	console.log(error);
  // An error happened.
});
}

function redireccionar(){
	window.location.href="index.html"

}