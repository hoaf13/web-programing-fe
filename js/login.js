

function login() {
    username = $('#username').val()
    password = $('#password').val()

    $.post('login/login.php',{
        username: username,
        password: password
    }, function(result){
        if (result.message == 'failed')
            $('.form-message-login').html(result.data)
        else window.location = 'home.php';
    },'json')
}