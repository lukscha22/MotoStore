const settingsForm = document.getElementById('settingsForm');

if(settingsForm){
    settingsForm.addEventListener('submit', function(e){
        e.preventDefault();

        const oldPassword = document.getElementById('oldPassword').value;
        const newPassword = document.getElementById('newPassword').value;
        const retype = document.getElementById('retype').value;
        const box = document.getElementById('messageBox');

        fetch('api/changePassword.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({oldPassword, newPassword, retype})
        })
        .then(res => res.json())
        .then(data => {
            box.innerHTML = `<div class="alert alert-${data.success ? 'success' : 'danger'}">${data.message}</div>`;
            if(data.auth === false){
                setTimeout(() => location.href = 'login.php', 700);
            }
            if(data.success){
                settingsForm.reset();
            }
        })
        .catch(() => {
            box.innerHTML = '<div class="alert alert-danger">Greška pri promjeni lozinke.</div>';
        });
    });
}

const usersTableBody = document.getElementById('usersTableBody');
const adminMessageBox = document.getElementById('adminMessageBox');

function loadUsers(){
    if(!usersTableBody){
        return;
    }

    fetch('api/getUsers.php')
    .then(res => res.json())
    .then(data => {
        if(!data.success){
            usersTableBody.innerHTML = `<tr><td colspan="7">${data.message}</td></tr>`;
            return;
        }

        if(data.users.length === 0){
            usersTableBody.innerHTML = '<tr><td colspan="7">Nema registriranih običnih korisnika.</td></tr>';
            return;
        }

        usersTableBody.innerHTML = data.users.map(user => `
            <tr>
                <td>${user.id}</td>
                <td>${user.name}</td>
                <td>${user.email}</td>
                <td>${user.contact}</td>
                <td>${user.city}</td>
                <td>${user.address}</td>
                <td>
                    <button class="btn btn-danger btn-sm delete-user-btn" data-id="${user.id}">
                        Obriši
                    </button>
                </td>
            </tr>
        `).join('');
    })
    .catch(() => {
        usersTableBody.innerHTML = '<tr><td colspan="7">Greška pri dohvaćanju korisnika.</td></tr>';
    });
}

document.addEventListener('click', function(e){
    if(!e.target.classList.contains('delete-user-btn')){
        return;
    }

    const userId = e.target.getAttribute('data-id');

    if(!confirm('Jeste li sigurni da želite obrisati ovog korisnika?')){
        return;
    }

    fetch('api/deleteUser.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({id: userId})
    })
    .then(res => res.json())
    .then(data => {
        if(adminMessageBox){
            adminMessageBox.innerHTML = `<div class="alert alert-${data.success ? 'success' : 'danger'}">${data.message}</div>`;
        }
        if(data.success){
            loadUsers();
        }
    })
    .catch(() => {
        if(adminMessageBox){
            adminMessageBox.innerHTML = '<div class="alert alert-danger">Greška pri brisanju korisnika.</div>';
        }
    });
});

loadUsers();
