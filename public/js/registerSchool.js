/* event on show password/confirm password input content */
$('.passbtn').on('click',function (){
    let btn = this;
    let inp = btn.parentNode.previousElementSibling;
    if(inp.type == "password"){
        inp.type = "text";
        btn.innerHTML = '<i class="fa fa-eye-slash"></i>';
    } else {
        inp.type = "password";
        btn.innerHTML = '<i class="fa fa-eye"></i>';
    }
});

/* event on password input  */
$('#password').on('change', function () {
    this.className  = "form-control";
    let cpassInp = document.getElementById('cpassword');
    cpassInp.value="";   
    cpassInp.className  = "form-control";
});

/* event on confirm password input  */
$('#cpassword').on('input', function(){
    let passInput = document.getElementById('password');
    let submitBtn = document.getElementsByName('submit_register')[0];

    if(!!this.value && (this.value == passInput.value)){
        this.className = 'form-control is-valid';
        passInput.className = 'form-control is-valid';

        submitBtn.className = 'btn btn-primary';
        submitBtn.innerText = "Enregistrer l'école";
        submitBtn.disabled = false;
    } else {
        this.className = 'form-control is-invalid';
        passInput.className = 'form-control is-invalid';
        
        submitBtn.className = 'btn btn-danger';
        submitBtn.innerText = "formulaire invalide";
        submitBtn.disabled = true;
    }
 });