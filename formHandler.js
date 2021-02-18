const surname = document.getElementById('surname')
const names = document.getElementsByClassName('names')
const familyCounterInput = document.getElementById('familyCounter')
const familyList = document.getElementById('familyMemberList')
const acceptCountButton = document.getElementById('familyCounterButton');

acceptCountButton.addEventListener('click', generateList)

function generateList(){
    
    if(familyCounterInput.value > 20 || familyCounterInput.value % 1){
        return false
    }
    

   else if (familyList.innerHTML == '') {
        for (let i = 1; i <= familyCounterInput.value -1; i++) {
            familyList.insertAdjacentHTML('beforeend', `<li class="familyMemberListItem">
            <p class="description" id="listItemTitle12">№${i} РНОКПП <span class="neccessary">*</span></p>
            <input type="text" name="familyItems" pattern="[0-9]{10,10}" required="">`)
            console.log(12345)
          }
    }

     else if(familyCounterInput.value <= familyList.childElementCount){
        for(let i = familyList.childElementCount; i > familyCounterInput.value -1; i--){
            familyList.removeChild(familyList.lastChild)
            console.log(123)
        }
    }


    else if(familyCounterInput.value > familyList.childElementCount){
    for(let i = familyList.childElementCount; i < familyCounterInput.value -1; i++){
        familyList.insertAdjacentHTML('beforeend', `<li class="familyMemberListItem">
        <p class="description" id="listItemTitle12">№${i+1} РНОКПП <span class="neccessary">*</span></p>
        <input type="text" name="familyItems" pattern="[0-9]{10,10}" required="">`)

        }
    }
   
}




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