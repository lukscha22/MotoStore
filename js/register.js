document.getElementById('registerForm').addEventListener('submit',function(e){
    e.preventDefault();
    const name=document.getElementById('name').value.trim();
    const email=document.getElementById('email').value.trim();
    const password=document.getElementById('password').value;
    const confirmPassword=document.getElementById('confirm_password').value;
    const contact=document.getElementById('contact').value.trim();
    const city=document.getElementById('city').value.trim();
    const address=document.getElementById('address').value.trim();
    const box=document.getElementById('messageBox');
    if(password!==confirmPassword){box.innerHTML='<div class="alert alert-danger">Lozinke se ne podudaraju.</div>';return;}
    fetch('api/register.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({name,email,password,contact,city,address})})
    .then(res=>res.json()).then(data=>{box.innerHTML=`<div class="alert alert-${data.success?'success':'danger'}">${data.message}</div>`;if(data.success){setTimeout(()=>location.href='login.php',900);}})
    .catch(()=>{box.innerHTML='<div class="alert alert-danger">Greška pri registraciji.</div>';});
});
