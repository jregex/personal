let fileupload = document.querySelector("#gallery");
fileupload.onchange = function () {
    uplaodImg(this);
};
function uplaodImg(image) {
    let reader = new FileReader();
    let name = image.value;
    name = name.substring(name.lastIndexOf("\\") + 1);
    reader.onload = (e) => {
        // debugger;
        let preview = document.querySelector("#previewImg");
        preview.setAttribute("src", e.target.result);
        hide(preview);
        fadeIn2(preview, 700);
    };
    reader.readAsDataURL(image.files[0]);
}

const btnReset = document.querySelector('#resetData');
btnReset.addEventListener('click',()=>{
    document.querySelector('#gallery').value="";
    document.querySelector('#previewImg').setAttribute("src","");
})
