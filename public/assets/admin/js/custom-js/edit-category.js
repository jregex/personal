document.addEventListener('DOMContentLoaded',function(){
    let btn=document.querySelectorAll('#btnEditCategory');
    btn.forEach((item,i) => {
        btn[i].addEventListener('click',()=>{
        url = 'http://localhost:8000/api/editcategory';
        const token = document.querySelector('input[name="_token"]').value;
        const id = btn[i].getAttribute('data-id');
        fetch(`${url}/+${id}`,{headers:{
                'Content-Type':'Application/json',
                "Accept":'Application/json,text-plain,*/*',
                "X-Requested-With":"XMLHttpRequest",
                "X-CSRF-TOKEN":token
        },credentials: "same-origin",
        })
        .then(res=>{
            return res.json();
        })
        .then(data=>{
            const myModal = new bootstrap.Modal('#editCategory', {
                keyboard: false
            });
            const category=document.querySelector('#edit-category');
            const category_id = document.querySelector('#category-id');
            category_id.value=data[0].id;
            category.value=data[0].category;
            myModal.toggle();

        })
        .catch(err=>{
            console.log(err);
        })
    });
    });

    const btnreset=document.querySelector('#idReset');
    btnreset.addEventListener('click',()=>{
        document.querySelector('#edit-category').value="";
    })
})
