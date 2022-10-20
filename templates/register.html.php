<!--html form with post request to the page register.php-->
<form role = "form" action = "{{ phpSelf }}" method = "post">
    <h4 class = "form-signin-heading">
        {% if msg is not empty %}
        <div class="error">{{ msg }}</div>
        {% endif %}</h4>
    <div class="form-group">
        <label for="username">username</label>
        <input type="username" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="username help" class="form-text text-muted">Log in to access more admin options.</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="passwordConfirm">Confirm password</label>
        <input type="password" name="passwordConfirm" class="form-control" id="passwordConfirm" placeholder="Confirm password">
    </div>
    <button name = "register" type="submit" class="btn btn-primary">Register</button>
</form>
<div>
   Already have an account? <a href="login.php">Log in here</a>
</div>

<script>
    let password = document.getElementById("password")
        , passwordConfirm = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != passwordConfirm.value) {
            passwordConfirm.setCustomValidity("Passwords Don't Match");
        } else {
            //setting custom validity to an empty string means that the field is valid
            passwordConfirm.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    passwordConfirm.onkeyup = validatePassword;
</script>