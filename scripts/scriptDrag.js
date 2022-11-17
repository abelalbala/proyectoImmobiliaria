let files = [];

let dropArea = document.getElementsByClassName("drop-area")[0];
let dragDropText = document.getElementById("dragText");
let button = document.getElementById("dragButton");
let input  = document.getElementById("input-file");
let preview = document.getElementById("preview");

let events = ["dragover", "dragleave", "drop"];
events.forEach(evt => {
    dropArea.addEventListener(evt, prevDefault);
});
function prevDefault (e) {
    e.preventDefault();
}

dropArea.addEventListener("dragover", function(){
    dropArea.classList.add("active");
    dragDropText.innerHTML = "Drop to upload files";
});

dropArea.addEventListener("dragleave", removeActiveDropArea);
function removeActiveDropArea() {
    dropArea.classList.remove("active");
    dragDropText.innerHTML = "Drag & Drop files";
}


dropArea.addEventListener("drop", (event)=>{
    removeActiveDropArea()
    files = files.concat(Array.from(event.dataTransfer.files));
    showFiles()
});


function showFiles() {
    if(files.length == 0);
    else {
        files.forEach((file, index) => {
            processFile(file, index)
        });
    }
}
function processFile(file, index) {
    const validExtensions = ["image/jpeg", "image/jpg", "image/png", "image/gif"];
    const docType = file.type;
    let bool = false
    validExtensions.forEach(type => {
        if(docType == type) bool = true;
    });

    if(bool == false) {
        files.splice(index, 1)
        console.log(files.length)
        alert("No era una imatge valida")
    } else {
        if(files.length != 0) {
            preview.innerHTML = ""
            let srcImg;
            let reader = new FileReader();
            
            files.forEach(element => {
                reader.addEventListener("load", () => {
                    srcImg = reader.result;
                }, false);

                reader.readAsDataURL(input)
                preview.innerHTML += `<div class='previewImage'>
                    <img src="${element.name}"/>
                    <span>${element.name}</span>
                    <span onclick="remove(${index})" class="material-symbols-outlined removeBtn">x</span>
                </div>`;
                
                /*preview.innerHTML += `<div class='previewImage'>
                    <img src="${element.name}"/>
                    <span>${element.name}</span>
                    <span onclick="remove(${index})" class="material-symbols-outlined removeBtn">x</span>
                </div>`;*/
            });
        }
    }
}
function remove(index) {

}