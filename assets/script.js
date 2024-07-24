const whatsappInput = document.querySelector('#whatsapp');
whatsappInput.addEventListener('input', () => {
    whatsappInput.value = whatsappInput.value.replace(/\D/g, "");
    let toArray = whatsappInput.value.split("");
    if(toArray.length > 0) whatsappInput.value = `(${toArray.slice(0,2).join("")})`;
    if(toArray.length > 2) whatsappInput.value += ` ${toArray.slice(2,7).join("")}`;
    if(toArray.length > 7) whatsappInput.value += `-${toArray.slice(7,11).join("")}`;
});