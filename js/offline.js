document.querySelector('.login form button').addEventListener('click',
    (e) => {
        // nepereit niekur nuspaudus mygtuka
        e.preventDefault();
        // uzklausa i php faila
        const elements = document.querySelector('.login form');
        const formData = new FormData();
        for (let i = 0; i < elements.length; i++) {
            formData.append(elements[i].name, elements[i].value);
        }
        const xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                if (!xmlHttp.responseText) {

                    window.location.href = "./";
                }
                document.querySelector('.login form .error').innerText = xmlHttp.responseText;
            }
        }
        xmlHttp.open("post", "./components/login.php");
        xmlHttp.send(formData);
    });