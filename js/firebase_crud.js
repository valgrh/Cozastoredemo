// Initialize Cloud Firestore through Firebase
firebase.initializeApp({
  apiKey: "AIzaSyArk_R1HT1_u0mYY7tiqHrGRRSP_CSCS2c",
  authDomain: "bdtienda1.firebaseapp.com",
  projectId: "bdtienda1",
});

//Inicializa Firebase con esta variable
var db = firebase.firestore();

//Agregar documentos
function guardar(){
	var nombre = document.getElementById('nombre').value;
	var descripcion = document.getElementById('descripcion').value;
	var precio = document.getElementById('precio').value;
	var cantidad = document.getElementById('cantidad').value;

db.collection("productos").add({
    nombre: nombre,
    descripcion: descripcion,
    precio: precio,
    cantidad: cantidad
})
.then(function(docRef) {
    console.log("Document written with ID: ", docRef.id);
    document.getElementById('nombre').value = '';
    document.getElementById('descripcion').value = '';
    document.getElementById('precio').value = '';
    document.getElementById('cantidad').value = '';
})
.catch(function(error) {
    console.error("Error adding document: ", error);
});
}


//Leer doc
var tabla = document.getElementById('tabla')
db.collection("productos").onSnapshot((querySnapshot) => {
    tabla.innerHTML = '';
    querySnapshot.forEach((doc) => {
        console.log(`${doc.id} => ${doc.data().nombre}`);
        tabla.innerHTML += `
        <tr>
            <th scope="row">${doc.id}</th>
            <td>${doc.data().nombre}</td>
            <td>${doc.data().descripcion}</td>
            <td>${doc.data().precio}</td>
            <td>${doc.data().cantidad}</td>
            <td><button class="btn btn-danger" onclick="eliminar('${doc.id}')">Eliminar</button></td>
            <td><button class="btn btn-warning" onclick="editar('${doc.id}', '${doc.data().nombre}',
            '${doc.data().descripcion}', '${doc.data().precio}', '${doc.data().cantidad}')">Editar</button></td>
          </tr>

        `
    });
});

//borrar doc
function eliminar(id){

	db.collection("productos").doc(id).delete().then(function() {
    console.log("Document successfully deleted!");
}).catch(function(error) {
    console.error("Error removing document: ", error);
});

}

//editar doc

function editar(id, nombre, descripcion, precio, cantidad){

	//Variables que trae de la base
	document.getElementById('nombre').value = nombre;
	document.getElementById('descripcion').value = descripcion;
	document.getElementById('precio').value = precio;
	document.getElementById('cantidad').value = cantidad;
	var boton = document.getElementById('boton');
	boton.innerHTML = 'Editar';

	boton.onclick = function(){

		var productosRef = db.collection("productos").doc(id);
	// Set the "capital" field of the city 'DC'

	//Variables que se guardaran/editaran los datos que se trajeron de la base de datos
	var nombre = document.getElementById('nombre').value;
	var descripcion = document.getElementById('descripcion').value;
	var precio = document.getElementById('precio').value;
	var cantidad = document.getElementById('cantidad').value;

	return productosRef.update({
	    nombre: nombre,
	    descripcion: descripcion,
	    precio: precio,
	    cantidad: cantidad
	})
	.then(function() {
	    console.log("Document successfully updated!");
	    //Despues de terminar de editar los datos con exito se cambia el boton de nuevo 
	    //al texto de guardar
	    boton.innerHTML = 'Guardar';
	    boton.onclick=function(){
	    	guardar();
	    }

	})
	.catch(function(error) {
	    // The document probably doesn't exist.
	    console.error("Error updating document: ", error);
	});

	}
}