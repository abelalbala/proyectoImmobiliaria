let files = [];

let dropArea = document.getElementsByClassName("drop-area")[0];
let dragDropText = document.getElementById("dragText");
let button = document.getElementById("dragButton");
let input  = document.getElementById("input-file");
let preview = document.getElementById("preview");

let evt = ["dragover", "dragleave", "drop"];
dropArea.addEventListener(evt, prevDefault);
function prevDefault (e) {
    e.preventDefault();
}


dropArea.addEventListener("dragover", function(){
    dropArea.classList.add("active");
    dragDropText.innerHTML = "Drop to upload files";
});

dropArea.addEventListener("dragleave", function(){
    dropArea.classList.remove("active");
    dragDropText.innerHTML = "Upload files";
});


dropArea.addEventListener("drop", (event)=>{
    files = files.concat(Array.from(event.dataTransfer.files));
});

function showFiles() {
    
}