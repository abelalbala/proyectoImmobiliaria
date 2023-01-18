let selectCategoria = document.getElementById("selectCategorias");
let selectSubcategoria = document.getElementById("selectSubcategorias");
let categoriaId = document.getElementById("categoriaId")
let subcategoriaId = document.getElementById("subcategoriaId")
let opt;
fetch("services/serviceCategorias.php")
        .then((response) => response.json())
        .then((data) => {
            data.forEach(element => {
                if(element.id == categoriaId.value) opt = `<option selected="true" value="${element.id}">${element.name}</option>`;
                else opt = `<option value="${element.id}">${element.name}</option>`;
                selectCategoria.innerHTML += opt;
            });
        })
        .catch((error) => {console.log(error)});


selectCategoria.addEventListener("change", function() {

    selectSubcategoria.innerHTML = ""
    let formData = new FormData();
    formData.append("categoria", selectCategoria.value); 
    let apt

    let options = {
        method: 'POST',
        body: formData
    }

    fetch("services/serviceSubcategorias.php", options)
        .then((response) => response.json())
        .then((data) => {
            data.forEach(element => {
                if(element.id == subcategoriaId.value) apt = `<option selected="true" value="${element.id}">${element.name}</option>`;
                //else apt = `<option value="${element.id}">${element.name}</option>`;
                selectSubcategoria.innerHTML += apt;
            });
        })
        .catch((error) => {console.log(error)});
})

