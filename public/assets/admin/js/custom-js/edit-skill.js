document.addEventListener('DOMContentLoaded',function(){
    let btn=document.querySelectorAll('#btnEditSkill');
    btn.forEach((item,i) => {
        btn[i].addEventListener('click',()=>{
        url = 'http://localhost:8000/api/editskill';
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
            const myModal = new bootstrap.Modal('#editSkill', {
                keyboard: false
            });
            const skill=document.querySelector('#edit-skill');
            const progress=document.querySelector('#edit-progress');
            const skillid = document.querySelector('#skillid');
            skillid.value=data[0].id;
            skill.value=data[0].nama_skill;
            progress.value=data[0].progress;
            myModal.toggle();

        })
        .catch(err=>{
            console.log(err);
        })
    });
    });
})
