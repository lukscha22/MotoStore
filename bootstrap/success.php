function formatPrice(value){return Number(value).toLocaleString('hr-HR',{minimumFractionDigits:2,maximumFractionDigits:2})+' €';}
function showMessage(type,text){const box=document.getElementById('messageBox');if(box){box.innerHTML=`<div class="alert alert-${type}">${text}</div>`;}}
function categoryName(category){const names={supersport:'Supersport',naked:'Naked',cross:'Cross'};return names[category]||category;}
function loadProducts(){
    const params=new URLSearchParams(window.location.search);
    const category=params.get('category')||window.currentCategory||'';
    const url=category?`api/getProducts.php?category=${encodeURIComponent(category)}`:'api/getProducts.php';
    fetch(url).then(res=>res.json()).then(data=>{
        const container=document.getElementById('productsContainer');
        if(!data.success){container.innerHTML='<div class="col-xs-12"><div class="alert alert-danger">Greška pri učitavanju motocikala.</div></div>';return;}
        if(data.products.length===0){container.innerHTML='<div class="col-xs-12"><div class="alert alert-warning">Nema motocikala u ovoj kategoriji.</div></div>';return;}
        let html='';
        data.products.forEach(product=>{
            const image=product.image&&product.image.trim()!==''?product.image:'img/HONDA_CB1000_Hornet.jpg';
            const hp=product.horsepower?`${product.horsepower} KS`:'Nije uneseno';
            html+=`<div class="col-sm-6 col-md-3"><div class="product-card"><div class="product-image-wrap"><img src="${image}" alt="${product.name}" class="product-image"></div><div class="product-content"><span class="category-label">${categoryName(product.category)}</span><h3>${product.name}</h3><div class="spec-row"><span>Snaga</span><strong>${hp}</strong></div><div class="spec-row"><span>Cijena</span><strong>${formatPrice(product.price)}</strong></div><button type="button" class="btn btn-block btn-danger add-to-cart" data-id="${product.id}">Dodaj u košaricu</button></div></div></div>`;
        });
        container.innerHTML=html;
        document.querySelectorAll('.add-to-cart').forEach(button=>{button.addEventListener('click',function(){addToCart(this.dataset.id);});});
    }).catch(()=>{document.getElementById('productsContainer').innerHTML='<div class="col-xs-12"><div class="alert alert-danger">Greška pri komunikaciji s API-jem.</div></div>';});
}
function addToCart(productId){
    fetch('api/addToCart.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({id:productId})})
    .then(res=>res.json()).then(data=>{
        if(data.auth===false){sessionStorage.setItem('loginMessage',data.message);location.href='login.php';return;}
        showMessage(data.success?'success':'danger',data.message);
    }).catch(()=>showMessage('danger','Greška pri dodavanju u košaricu.'));
}
loadProducts();
