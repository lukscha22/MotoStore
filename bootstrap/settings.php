function formatPrice(value){return Number(value).toLocaleString('hr-HR',{minimumFractionDigits:2,maximumFractionDigits:2})+' €';}
function showMessage(type,text){const box=document.getElementById('messageBox');if(box){box.innerHTML=`<div class="alert alert-${type}">${text}</div>`;}}
function loadCart(){
    fetch('api/getCart.php').then(res=>res.json()).then(data=>{
        if(data.auth===false){location.href='login.php';return;}
        const container=document.getElementById('cartContainer');
        if(!data.success){container.innerHTML=`<div class="alert alert-danger">${data.message}</div>`;return;}
        if(data.items.length===0){container.innerHTML='<div class="alert alert-warning">Košarica je prazna.</div><a href="products.php" class="btn btn-danger">Pogledaj ponudu</a>';return;}
        let rows='';
        data.items.forEach((item,index)=>{rows+=`<tr><td>${index+1}</td><td>${item.name}</td><td>${item.horsepower} KS</td><td>${item.quantity}</td><td>${formatPrice(item.price)}</td><td>${formatPrice(item.line_total)}</td><td><button type="button" class="btn btn-danger btn-sm remove-item" data-id="${item.id}">Ukloni 1</button></td></tr>`;});
        container.innerHTML=`<table class="table table-bordered table-striped"><tbody><tr><th>#</th><th>Motocikl</th><th>Snaga</th><th>Količina</th><th>Cijena po komadu</th><th>Ukupno</th><th></th></tr>${rows}<tr><th colspan="5">Ukupno</th><th>${formatPrice(data.total)}</th><th><button type="button" id="confirmOrderBtn" class="btn btn-primary">Potvrdi narudžbu</button></th></tr></tbody></table>`;
        document.querySelectorAll('.remove-item').forEach(button=>{button.addEventListener('click',function(){removeFromCart(this.dataset.id);});});
        document.getElementById('confirmOrderBtn').addEventListener('click',confirmOrder);
    }).catch(()=>{document.getElementById('cartContainer').innerHTML='<div class="alert alert-danger">Greška pri učitavanju košarice.</div>';});
}
function removeFromCart(productId){
    fetch('api/removeFromCart.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({id:productId})})
    .then(res=>res.json()).then(data=>{showMessage(data.success?'success':'danger',data.message);loadCart();})
    .catch(()=>showMessage('danger','Greška pri uklanjanju iz košarice.'));
}
function confirmOrder(){
    fetch('api/confirmOrder.php',{method:'POST'}).then(res=>res.json()).then(data=>{if(data.success){location.href='success.php';}else{showMessage('danger',data.message);}})
    .catch(()=>showMessage('danger','Greška pri potvrdi narudžbe.'));
}
loadCart();
