function valueToData(name, value, prevData = new FormData()) {
    prevData.append(name, value);
    return prevData;
}

async function post(url, data) {
    try {
        const res = await fetch(url, {
            method: 'POST',
            cache: 'no-cache',
            //headers: { 'Content-Type': 'multipart/form-data' }, //Missing boundary in multipart/form-data POST data in Unknown on line 0
            body: data
        });
        return await res.json();
    } catch (err) {
        showMessageDialog("Nastala chyba, zkuste to prosím později.");
        console.log(err);
    }
}