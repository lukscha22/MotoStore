const storedLoginMessage=sessionStorage.getItem('loginMessage');
if(storedLoginMessage){document.getElementById('messageBox').innerHTML=`<div class="alert alert-warning">${storedLoginMessage}</div>`;sessionStorage.removeItem('loginMessage');}
document.getElementById('loginForm').addEventListener('submit',function(e){
    e.preventDefault();
    const email=document.getElementById('email').value.trim();
    const password=document.getElementById('password').value;
    const box=document.getElementById('messageBox');
    fetch('api/login.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({email,password})})
    .then(res=>res.json()).then(data=>{box.innerHTML=`<div class="alert alert-${data.success?'success':'danger'}">${data.message}</div>`;if(data.success){setTimeout(()=>location.href='index.php',600);}})
    .catch(()=>{box.innerHTML='<div class="alert alert-danger">Greška pri prijavi.</div>';});
});
