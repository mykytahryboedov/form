const surname = document.getElementById('surname')
const names = document.getElementsByClassName('names')
const familyCounterInput = document.getElementById('familyCounter')
const familyList = document.getElementById('familyMemberList')
const acceptCountButton = document.getElementById('familyCounterButton');

acceptCountButton.addEventListener('click', generateList)

function generateList(){
    if (familyList.innerHTML == '') {
        for (let i = 1; i <= familyCounterInput.value; i++) {
            familyList.insertAdjacentHTML(
                'beforeend', `
            <li class="familyMemberListItem">
                          <p class="description" id="listItemTitle${i + familyCounterInput.value}" >№${i} РНОКПП <span class="neccessary">*</span></p>
                          <input type="text" name="familyItems" pattern="[0-9]{10,10}" required>
                        </li>`
                        )
          }
         
    }


    else {
        familyList.innerHTML.replace(/\s/g , "")
            for (let i = 0; i <= familyList.children.length; i--) {
                
                familyList.removeChild(document.querySelector('li'))
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