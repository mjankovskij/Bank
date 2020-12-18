// meniu eventai
const navDOM = document.querySelectorAll('header nav .link');
for (let i = 0; i < navDOM.length - 1; i++) {
    navDOM[i].addEventListener('click', () => {
        for (let i = 0; i < navDOM.length; i++) {
            navDOM[i].classList.remove("active");
        }
        navDOM[i].classList.add("active");
        document.getElementsByClassName('row')[0].style.marginLeft = `-${i * innerWidth}px`;
    })
}


// Saskaitos kurimas
document.querySelector('form button#create').addEventListener('click',
    (e) => {
        // nepereit niekur nuspaudus mygtuka
        e.preventDefault();
        // uzklausa i php faila
        const elements = document.querySelector('form#create');
        const formData = new FormData();
        for (let i = 0; i < elements.length; i++) {
            formData.append(elements[i].name, elements[i].value);
        }
        const xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                const data = JSON.parse(xmlHttp.responseText);
                if (data.error) {
                    document.getElementById('createMessage').innerHTML = `<p class='red'>${data.error}</p>`;
                } else {
                    for (let i = 0; i < elements.length; i++) {
                        elements[i].value = '';
                    }
                    document.getElementById('createMessage').innerText = `${data.firstname} ${data.lastname}, kurio asm. kodas. ${data.personalId}. Banko saskaita sukurta, saskaitos nr: ${data.accountNumber}`;
                    renderAccounts();
                }
            }

        }
        xmlHttp.open("post", "./components/create.php");
        xmlHttp.send(formData);
    });


// spausdint saskaitas
const renderAccounts = () => {
    const xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            document.querySelectorAll('.accountsToFill')[0].innerHTML = xmlHttp.responseText;
            const accountsDOM = document.querySelectorAll('.accountsToFill .saskaita');
            for (let i = 0; i < accountsDOM.length; i++) {
                // istrint saskaita
                document.querySelectorAll('.box .close')[i].addEventListener('click', () => {
                    if (confirm(`Tikrai istrinti saskaita ${accountsDOM[i].childNodes[2].innerText}, ${accountsDOM[i].childNodes[6].innerText} ?`) == true) {
                        const xmlHttp = new XMLHttpRequest();
                        xmlHttp.onreadystatechange = function() {
                            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                                alert(xmlHttp.responseText);
                                renderAccounts();
                            }
                        }
                        const formData = new FormData();
                        formData.append('b_number', accountsDOM[i].childNodes[2].innerText);
                        xmlHttp.open("post", "./components/deleteAccount.php");
                        xmlHttp.send(formData);
                    }
                });
                // Pridet lesu nukreipimas
                document.querySelectorAll('.box .add')[i].addEventListener('click', () => {
                    for (let i = 0; i < navDOM.length; i++) {
                        navDOM[i].classList.remove("active");
                    }
                    navDOM[2].classList.add("active");
                    document.getElementsByClassName('row')[0].style.marginLeft = `-${2 * innerWidth}px`;
                    document.querySelectorAll('#bNumber')[0].value = accountsDOM[i].childNodes[2].innerText;
                });
                //
            }

        }

    }
    xmlHttp.open("post", "./components/renderAccounts.php");
    xmlHttp.send();
}

renderAccounts();


// Pridet pinigu
document.querySelector('form button#add').addEventListener('click',
    (e) => {
        // nepereit niekur nuspaudus mygtuka
        e.preventDefault();
        // uzklausa i php faila
        const elements = document.querySelector('form#add');
        const formData = new FormData();
        for (let i = 0; i < elements.length; i++) {
            formData.append(elements[i].name, elements[i].value);
        }
        const xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                const data = JSON.parse(xmlHttp.responseText);
                if (data.error) {
                    document.getElementById('addMessage').innerHTML = `<p class='red'>${data.error}</p>`;
                } else {
                    for (let i = 0; i < elements.length; i++) {
                        elements[i].value = '';
                    }
                    document.getElementById('addMessage').innerText = `I saskaita ${data.bNumber} prideta ${data.amount} EUR.`;
                    renderAccounts();
                }
            }

        }
        xmlHttp.open("post", "./components/addAmount.php");
        xmlHttp.send(formData);
    });


// Pridet pinigu
document.querySelector('form button#minus').addEventListener('click',
    (e) => {
        // nepereit niekur nuspaudus mygtuka
        e.preventDefault();
        // uzklausa i php faila
        const elements = document.querySelector('form#minus');
        const formData = new FormData();
        for (let i = 0; i < elements.length; i++) {
            formData.append(elements[i].name, elements[i].value);
        }
        const xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                console.log(xmlHttp.responseText);
                const data = JSON.parse(xmlHttp.responseText);
                if (data.error) {
                    document.getElementById('minusMessage').innerHTML = `<p class='red'>${data.error}</p>`;
                } else {
                    for (let i = 0; i < elements.length; i++) {
                        elements[i].value = '';
                    }
                    document.getElementById('minusMessage').innerText = `Is saskaitos ${data.bNumber} nuskaiciuota ${data.amount} EUR.`;
                    renderAccounts();
                }
            }

        }
        xmlHttp.open("post", "./components/minusAmount.php");
        xmlHttp.send(formData);
    });