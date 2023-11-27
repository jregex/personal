// edit profile
const btnE = document.querySelector('#btnEdit');
btnE.addEventListener('click',()=>{
    document.querySelector('#username').removeAttribute('disabled');
    document.querySelector('#email').removeAttribute('disabled');
    document.querySelector('#name').removeAttribute('disabled');
    document.querySelector('#callname').removeAttribute('disabled');
    document.querySelector('#tgl_lahir').removeAttribute('disabled');
    document.querySelector('#no_hp').removeAttribute('disabled');
    document.querySelector('#instagram').removeAttribute('disabled');
    document.querySelector('#facebook').removeAttribute('disabled');
    document.querySelector('#twitter').removeAttribute('disabled');
    document.querySelector('#alamat').removeAttribute('disabled');
    document.querySelector('#resume').removeAttribute('disabled');
    document.querySelector('#image').removeAttribute('disabled');
    document.querySelector('#cv').removeAttribute('disabled','');
    btnE.setAttribute('disabled','');
    btnE.classList.remove('btn-primary');
    btnE.classList.add('btn-dark');
    document.querySelector('#btnS').classList.remove('d-none');
    document.querySelector('#btnB').classList.remove('d-none');
});
const btnB = document.querySelector('#btnB');
btnB.addEventListener('click',()=>{
    document.querySelector('#username').setAttribute('disabled','');
    document.querySelector('#email').setAttribute('disabled','');
    document.querySelector('#name').setAttribute('disabled','');
    document.querySelector('#callname').setAttribute('disabled','');
    document.querySelector('#tgl_lahir').setAttribute('disabled','');
    document.querySelector('#no_hp').setAttribute('disabled','');
    document.querySelector('#instagram').setAttribute('disabled','');
    document.querySelector('#facebook').setAttribute('disabled','');
    document.querySelector('#twitter').setAttribute('disabled','');
    document.querySelector('#alamat').setAttribute('disabled','');
    document.querySelector('#resume').setAttribute('disabled','');
    document.querySelector('#image').setAttribute('disabled','');
    document.querySelector('#cv').setAttribute('disabled','');
    btnE.removeAttribute('disabled');
    btnE.classList.remove('btn-dark');
    btnE.classList.add('btn-primary');
    document.querySelector('#btnS').classList.add('d-none');
    btnB.classList.add('d-none');
});

let fileupload = document.querySelector('#image');
fileupload.onchange=function(){
    console.log(this.files[0]);
    uplaodImg(this);
};
function uplaodImg(image){
    let reader = new FileReader();
    let name = image.value;
    name = name.substring(name.lastIndexOf('\\')+1);
    reader.onload = (e)=>{
        // debugger;
        let preview = document.querySelector('#previewImg');
        preview.setAttribute('src',e.target.result);
        hide(preview);
        fadeIn2(preview,700);
    }
    reader.readAsDataURL(image.files[0]);
}
