const surname = document.getElementById('surname')
const names = document.getElementsByClassName('names')


const reg = new RegExp('[АБВГДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯабвгдеєжзиіїйклмнопрстуфхцчшщьюя]');

// function validateEmail(email){
//     let reg =  /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
//     if (reg.test(email.value) == false) {
//         console.log('1234')
//         return false;
        
//     }
// }

function insertAttr(){
    const arr = [...names]
    arr.forEach(e => {
        e.setAttribute('pattern','[АБВГДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯабвгдеєжзиіїйклмнопрстуфхцчшщьюя]')
    })
    
}

insertAttr()