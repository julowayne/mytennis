var tab_anc = 'inscription'; 
change_tab(tab_anc);
function change_tab(name){
    document.getElementById(`tab-${tab_anc}`).className = 'tab';
    document.getElementById(`tab-${name}`).className = 'tab';
    document.getElementById(`tab-content-${tab_anc}`).style.display = 'none';
    document.getElementById(`tab-content-${name}`).style.display = 'block';
    tab_anc = name;
}


/* Ajax pr actualiser info profil front */

/* const profilForm = document.getElementById('profil')

profilForm.addEventListener('click', event => {
    fetch(`index.php?p=users&action=edit&id=${id}`,{
        method: "POST",
        headers: {"Content-Type" : "application/json; charset=UTF-8"
    }, 
    body: JSON.stringify({
        firstname : firstname,
        lastname : lastname,
        address : address,
        email : email
        })
    })
    .then(r => r.json())
    .then ((data) => {
        console.log(data)
        const profilInput = document.querySelector('input')
    })
}) */



/* const modifyUserInformations = async () => {    

    const response = await fetch('./index.php?p=users&action=edit', {
        method: 'POST', 
        headers: {"Content-Type" : "application/json; charset=UTF-8"
    }, 
        body: JSON.stringify({
            firstname : firstname,
            lastname : lastname,
            address : address,
            email : email

    })})
    const json = await response.json()
    return result  
} */