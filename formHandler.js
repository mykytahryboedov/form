const surname = document.getElementById('surname')
const names = document.getElementsByClassName('names')


// const checkBox = document.querySelector('input[type="checkbox"]')
// checkBox.addEventListener('change', validateCheckbox)
// function validateCheckbox(){
//     if (checkBox.checked) {
//         console.log('123')
//     }
// }

function validatePhone(phone){
    phone = phone.replace(/[\s\-]/g, '');
    console.log(phone)
    debugger;
  return phone.match(/^((\+?3)?8)?((0\(\d{2}\)?)|(\(0\d{2}\))|(0\d{2}))\d{7}$/) != null;

}

function insertAttr(){
    const arr = [...names]
    arr.forEach(e => {
        e.setAttribute('pattern','^[АБВГДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯабвгдеєжзиіїйклмнопрстуфхцчшщьюя]+$')
    })
    
}

insertAttr()