function registerValidate() {

    var setError;

    var username = document.getElementById("user").value.length;
    var psw = document.getElementById("pass").value.length;
    var email = document.getElementById("email");
    var form = document.getElementById("register");

    var valid = ValidateEmail(email.value);

    if (username == 0 || psw == 0 || email.value.length == 0) {
        event.preventDefault();

        setError = "All fields are required!";
        document.getElementById("validation").innerHTML = setError;
        return false;
    }

    if (username < 8 || psw < 8 || !valid) {

        event.preventDefault();
        form.reset();

        if (username < 8 && psw < 8) {
            setError = "Username and password must have 8 characters at least!";
            document.getElementById("validation").innerHTML = setError;
            return false;
        } else if (psw < 8) {
            setError = "Password must have 8 characters at least!";
            document.getElementById("validation").innerHTML = setError;
            return false;
        } else if (username < 8) {
            setError = "Username must have 8 characters at least!";
            document.getElementById("validation").innerHTML = setError;
            return false;
        } else if (!valid) {
            setError = "Email not valid!";
            document.getElementById("validation").innerHTML = setError;
            return false;
        }

    }

}


function loginValidate() {

    var setError;

    var username = document.getElementById("user").value.length;
    var psw = document.getElementById("pass").value.length;
    var form = document.getElementById("login");


    if (username == 0 || psw == 0) {
        event.preventDefault();

        setError = "All fields are required!";
        document.getElementById("validation").innerHTML = setError;
        return false;
    }

    if (username < 8 || psw < 8) {

        event.preventDefault();
        form.reset();

        if (username < 8 && psw < 8) {
            setError = "Username and password must have 8 characters at least!";
            document.getElementById("validation").innerHTML = setError;
            return false;
        } else if (psw < 8) {
            setError = "Password must have 8 characters at least!";
            document.getElementById("validation").innerHTML = setError;
            return false;
        } else if (username < 8) {
            setError = "Username must have 8 characters at least!";
            document.getElementById("validation").innerHTML = setError;
            return false;
        }

    }

}


function contactValidation() {

    var setError;

    var name = document.getElementById("name").value;
    var lastName = document.getElementById("lastname").value;
    var content = document.getElementById("content").value;
        var email = document.getElementById("email");
    var form = document.getElementById("contact");

    var valid=ValidateEmail(email.value);


    if (name.length == 0 || lastName.length == 0 || content.length == 0 || email.value.length== 0 ) {
        event.preventDefault();

        setError = "All fields are required!";
        document.getElementById("validation").innerHTML = setError;
        return false;
    }
    else if (name.length < 2 || lastName.length < 2) {
        event.preventDefault();

        setError = "Name and last name has at least 2 characters!";
        document.getElementById("validation").innerHTML = setError;
        return false;
    }

    else if (hasNumber(name) || hasNumber(lastName)){
      event.preventDefault();

      if(hasNumber(name) && hasNumber(lastName)){
        setError = "Name and lastname containes only letters!";
        document.getElementById("validation").innerHTML = setError;
        return false;
      }
      else if(hasNumber(name) && !hasNumber(lastName)){

        setError = "Name containes only letters!";
        document.getElementById("validation").innerHTML = setError;
        return false;
      }
      else if(hasNumber(lastName) && !hasNumber(name)){

        setError = "Lastname containes only letters!";
        document.getElementById("validation").innerHTML = setError;
        return false;
      }

    } else if (!valid) {

        setError = "Email not valid!";
        document.getElementById("validation").innerHTML = setError;
        return false;
    }

}


function postValidation(){
  var title = document.getElementById("title").value.length;
  var content = document.getElementById("content").value.length;
  var form = document.getElementById("new-post");
  var category = document.getElementById("category").selectedIndex;

  if(isEmpty(title) || isEmpty(content)){
    event.preventDefault();
      if(isEmpty(title) && isEmpty(content)){
        setError = "Please enter title and content of this post!";
        document.getElementById("validation").innerHTML = setError;
        return false;
      }

    if(isEmpty(title) && !isEmpty(content)){
      setError = "Please enter title of this post!";
      document.getElementById("validation").innerHTML = setError;
      return false;
    }
    else if(!isEmpty(title) && isEmpty(content)){
      setError = "Please enter content of this post!";
      document.getElementById("validation").innerHTML = setError;
      return false;
    }
  }
  else if(category==0){
      event.preventDefault();
    setError = "Please choose category of this post!";
    document.getElementById("validation").innerHTML = setError;
    return false;
  }
      form.reset();
      document.getElementById('category').selectedIndex=0;
      document.getElementById("validation").innerHTML = "Post added!";
}

function commentValidation(){
  var comment = document.getElementById("comment").value.length;
    var form = document.getElementById("add-comment");

  if(isEmpty(comment)){
        event.preventDefault();

        setError = "Please write something before submiting!";
        document.getElementById("validation").innerHTML = setError;
        return false;
  }

        form.reset();
        document.getElementById("validation").innerHTML = "Comment added!";
}



function ValidateEmail(elementValue){
   var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
   return emailPattern.test(elementValue);
 }

 function hasNumber(inputContent){
    var re =/\d/;
    if(re.test(inputContent)){
      return true;
    }
    return false;
}

function isEmpty(inputContent){
  if(inputContent==0){
    return true;
  }
  return false;
}
