<?php
//index.php
setlocale(LC_ALL, 'uk_UA.utf8');
mb_internal_encoding("UTF-8");
$error = '';
$email = '';
$name = '';
$surname = '';
$patronymic ='';
$region = '';
$mobilenumber = '';
$passportseries = '';
$birth ='';
$innnumber = '';
$sexvalue = '';
$file_open = './contact_data.scv';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
  

 if($error == '')
 {
  $file_open = fopen("contact_data.csv", "a");
  $no_rows = count(file("contact_data.csv"));
  if($no_rows > 1)
  {
   $no_rows = ($no_rows - 1) + 1;
  }

  $form_data = array(
   'sr_no'  => $no_rows,
   'surname' => $_POST["surname"],
   'name'  => $_POST["firstname"],
   'patronymic' => $_POST["patronymic"],
   'mobilenumber' => $_POST["mobile"],
   'email'  =>$_POST["email"],
   'region' => $_POST["regions"],
   'passportseries' => $_POST["passportseries"],
   'passportnumber' => $_POST["passportnumber"],
   'sexvalue' => $_POST["sex"],
   'birth' => $_POST["dateofbirth"],
   'innnumber' => $_POST["inn"]
  );
  fputcsv($file_open, $form_data);
  // $error = '<label class="text-success">Thank you for contacting us</label>';
  $surname ='';
  $name = '';
  $patronymic ='';
  $email = '';
  $subject = '';
  $mobile = '';
  $message = '';
 }
}
?>
<!DOCTYPE html>
<html lang="uk">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>Форма звернення громадян</title>
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
       <header><h1>РЕЄСТРАЦІЙНА ФОРМА ВПО</h1></header> 
        <h5 class="neccessary">* Обов'язкове поле</h5>
        <form class="queryform" method="post">
        <?php if(!empty($error)) {
         echo '<div class="alert alert-success" role="alert">'.$error.'</div>';
     }
     ?>
          <div class="mailWrap">
            <label for="email" class="emailForm"
            >Адреса електронної пошти <span class="neccessary">*</span></label
          >
          <input type="email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id="email" name="email" required placeholder="mykola.lopatin@gmail.com" value="<?php echo $email?>" />
          </div>
          
          <h5>Підтвердження статусу ВПО <span class="neccessary">*</span></h5>
          <p class="description">
            «Підтвердження означає, що Ви та всі члени Вашої сім'ї мають статус
            внутрішньо переміщеної особи, що підтверджується довідкою про взяття
            на облік внутрішньо переміщеної особи відповідно до постанови КМУ від
            01.10.2014 р. № 509 «Про облік внутрішньо переміщених осіб»
          </p>
          <input type="radio" name="vpostatus" id="vpo" required/>
          <label for="vpo">Так</label>
          <h5>Прізвище <span class="neccessary">*</span></h5>
          <input type="text" name="surname" id="surname" placeholder="Павлов" required class="names" value=""<?php echo $surname?> >
          <h5>Ім'я <span class="neccessary" >*</span></h5>
          <input type="text" name="firstname" id="name" placeholder="Павло" required class="names" value="<?php echo $name?>" />
          <h5>По батькові <span class="neccessary">*</span></h5>
          <input type="text" name="patronymic" id="patronymic" placeholder="Павлович" required class="names" value=""<?php echo $patronymic?> />
          <h5>
            Регіон, у якому бажаєте отримати кредит
            <span class="neccessary">*</span>
          </h5>
          <select required name="regions" required>
            <option selected disabled>Оберіть регіон</option>
            <option value="Вінницька обл.">Вінницька обл.</option>
            <option value="Волинська обл.">Волинська обл.</option>
            <option value="Дніпропетровська обл.">Дніпропетровська обл.</option>
            <option value="Донецька обл.">Донецька обл.</option>
            <option value="Житомирська обл.">Житомирська обл.</option>
            <option value="Закарпатська обл.">Закарпатська обл.</option>
            <option value="Запорізька обл.">Запорізька обл.</option>
            <option value="Івано-Франківська обл.">Івано-Франківська обл.</option>
            <option value="м.Київ">м.Київ</option>
            <option value="Київська обл.">Київська обл.</option>
            <option value="Луганська обл.">Луганська обл.</option>
            <option value="Львівська обл.">Львівська обл.</option>
            <option value="Миколаївська обл.">Миколаївська обл.</option>
            <option value="Одеська обл.">Одеська обл.</option>
            <option value="Полтавська обл.">Полтавська обл.</option>
            <option value="Рівненська обл.">Рівненська обл.</option>
            <option value="Сумська обл.">Сумська обл.</option>
            <option value="Тернопільска обл.">Тернопільска обл.</option>
            <option value="Харківська обл.">Харківська обл.</option>
            <option value="Херсонська обл.">Херсонська обл.</option>
            <option value="Хмельницька обл.">Хмельницька обл.</option>
            <option value="Черкаська обл.">Черкаська обл.</option>
            <option value="Чернівецька обл.">Чернівецька обл.</option>
            <option value="Чернігівська обл.">Чернігівська обл.</option>
          </select>
          <h5>Серія паспорта</h5>
          <input type="text" name="passportseries" id="" />
          <h5>Номер паспорту/ІD-картки <span class="neccessary">*</span></h5>
          <input type="text" name="passportnumber" id="" required pattern="^[0-9]{6,9}"/>
          <h5>Дата народження <span class="neccessary">*</span></h5>
          <input type="date" id="start" name="dateofbirth" required"
         value="2003-01-01"
         min="1950-01-01" max="2003-01-01" required>
         <h5>Стать <span class="neccessary">*</span></h5>
         <input type="radio" name="sex" id="man" value="чоловіча" required> <label for="man">Чоловіча</label>  <br/>
         <input type="radio" name="sex" id="woman" value="жіноча"> <label for="woman">Жіноча</label>
         <h5>Реєстраційний номер облікової картки платника податків 
          <span class="neccessary">*</span></h5>
          <p class="description">
              Якщо Ви не маєте реєстраційного номера за релігійними переконаннями, заповніть регістр, будь ласка, одиницями (наприклад: 1111111111)
          </p>
          <input type="text" name="inn" id="inn" maxlength="10" minlength="10" pattern="[0-9]{10,10}" required>
          <h5>Кількість членів сім’ї (включаючи заявника) <span class="neccessary">*</span></h5>
          <input type="number" required name="familyCounter" id="familyCounter" placeholder="Від 1 до 20" maxlength="20" minlength="1" pattern="^[0-9]{1,2}"> 
          <button type="button" id="familyCounterButton">Підтвердити</button>
          <ul id="familyMemberList">
          </ul>
          <h5>Мобільний номер телефону заявника <span class="neccessary">*</span></h5>
          <input type="text" name="mobile" id="cellNumber" required placeholder="380635975564" min-length="12" pattern="^((\+?3)?8)?((0\(\d{2}\)?)|(\(0\d{2}\))|(0\d{2}))\d{7}$">
          <h5><span class="neccessary">*</span></h5>
          <p class="description">
            Цим підтверджую, що надані мною вище дані/відомості є правдивими, достовірними та відповідають дійсності. Наслідки та відповідальність за подання завідомо неправдивих відомостей мені відомі.
          </p>
          <input type="checkbox" required name="checkbox" id="familyNas" value="check"> <label for="familyNas">Підтверджую</label>
          <h5><span class="neccessary">*</span></h5>
          <p class="description">Цим підтверджую, що я та члени моєї сім’ї не отримували за рахунок бюджетних коштів державну підтримку/грошову компенсацію/кредити на пільгових умовах на будівництво (придбання) житла (окрім житла, яке знаходиться на території, що є тимчасово окупованою відповідно до Закону України “Про забезпечення прав і свобод громадян та правовий режим на тимчасово окупованій території України” (знаходиться на території населених пунктів, зазначених у переліку населених пунктів, на території яких органи державної влади тимчасово не здійснюють свої повноваження, та переліку населених пунктів, що розташовані на лінії зіткнення, затверджених розпорядженням Кабінету Міністрів України від 7 листопада 2014 р. № 1085).</p>
          <input type="checkbox" required name="checkbox" id="familyFin" value="check"> <label for="familyFin">Підтверджую</label>
          <h5>Згода на обробку персональних даних<span class="neccessary">*</span></h5>
          <div class="description">Реєструючись, Ви підтверджуєте свою згоду на обробку персональних даних, а також підтверджуєте те, що ознайомились та погоджуєтесь зі Згодою на збір та обробку персональних даних</div>
          <input type="checkbox" required name="checkbox" id="privacyPol" value="check"> <label for="privacyPol">Згоден</label>
          
          <div class="submitForm"><input type="submit" name="submit" value="Надіслати" ></div>
      </form>
      <footer>
        <h6>© Держмолодьжитло 2021</h6>
      </footer>
      </div>
      
    </div>
  </body>
  <script src="./FormHandler.js"></script>
</html>
