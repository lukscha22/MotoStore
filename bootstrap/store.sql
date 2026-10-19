const logoutBtn=document.getElementById('logoutBtn');
if(logoutBtn){logoutBtn.addEventListener('click',function(e){e.preventDefault();fetch('api/logout.php').then(res=>res.json()).then(()=>{location.href='index.php';}).catch(()=>{location.href='index.php';});});}
