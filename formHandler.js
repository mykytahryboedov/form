const surname = document.getElementById('surname')
const names = document.getElementsByClassName('names')


// const checkBox = document.querySelector('input[type="checkbox"]')
// checkBox.addEventListener('change', validateCheckbox)
// function validateCheckbox(){
//     if (checkBox.checked) {
//         console.log('123')
//     }
// }



function insertAttr(){
    const arr = [...names]
    arr.forEach(e => {
        e.setAttribute('pattern','^[АБВГДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯабвгдеєжзиіїйклмнопрстуфхцчшщьюя]+$')
    })
    
}

insertAttr()