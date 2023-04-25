function getAuth() {
    return sessionStorage.getItem('bspwe-auth');
}

function setAuth(auth) {
    sessionStorage.setItem('bspwe-auth');
}

function valueToData(name, value, prevData = new FormData()) {
    prevData.append(name, value);
    return prevData;
}

function objectToData(object, prevData = new FormData()) {
    return Object.entries(object).reduce((formData, [key, value]) => {
        formData.append(key, value);
        return formData;
    }, prevData);
}

function arrayToData(name, array, prevData = new FormData()) {
    const arrayName = name+'[]';
    return array.reduce((formData, entry) => {
        formData.append(arrayName, entry);
        return formData;
    }, prevData);
}

async function post(url, data, auth = null) {
    try {
        const res = await fetch(url, {
            method: 'POST',
            cache: 'no-cache',
            headers: {
                'Authorization': `Basic ${btoa(auth)}` //, 'Content-Type': 'multipart/form-data' // Missing boundary in multipart/form-data POST data in Unknown on line 0
            },
            body: data
        });
        if (res.status == 401) {
            showMessageDialog("Neplatné uživatelské údaje!"); // TODO? spatne prihlaseni
        }
        return await res.json();
    } catch (err) {
        showMessageDialog("Nastala chyba, zkuste to prosím později.");
        console.log(err);
    }
}