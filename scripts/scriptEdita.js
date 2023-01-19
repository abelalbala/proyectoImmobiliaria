

let categoriaId = document.getElementById("categoriaId")
let subcategoriaId = document.getElementById("subcategoriaId")

let selectCategoria = document.getElementById("selectCategorias");
let selectSubcategoria = document.getElementById("selectSubcategorias");

fetch("services/serviceCategorias.php")
        .then((response) => response.json())
        .then((data) => {
            data.forEach(element => {
                let opt
                if(element.id == categoriaId.value) opt = `<option value="${element.id}" selected>${element.name}</option>`;
                else opt = `<option value="${element.id}">${element.name}</option>`;
                selectCategoria.innerHTML += opt;
            });
        })
        .catch((error) => {console.log(error)});


selectCategoria.addEventListener("change", function() {

    selectSubcategoria.innerHTML = ""
    let formData = new FormData();
    formData.append("categoria", selectCategoria.value);

    let options = {
        method: 'POST',
        body: formData
    }

    fetch("services/serviceSubcategorias.php", options)
        .then((response) => response.json())
        .then((data) => {
            //console.log(data);
            data.forEach(element => {
                let opt
                if(element.id == subcategoriaId.value) opt = `<option value="${element.id}" selected>${element.name}</option>`;
                else opt = `<option value="${element.id}">${element.name}</option>`;
                selectSubcategoria.innerHTML += opt;
            });
        })
        .catch((error) => {console.log(error)});
})

