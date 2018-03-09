function validateForm(){
    var b=document.forms['myform']['body'].value;
    if(b==""){
        alert("Please fill all the fields");
        return false;
    }
}
/*function checkPassword(){
    if(document.getElementById('password').value == document.getElementById('cpassword').value){
        document.getElementById('submit').disabled = false;
    }
    else {
        alert('Password did not match.Try again');
         document.getElementById('submit').disabled = true;
    }
}*/
function registerValidation(){
    console.log(document.forms['registerForm']['body'].value);
    return true;
}
