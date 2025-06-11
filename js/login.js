var emailRegister = false;
var passwordRegister = false;
var passwordChangePassword = false;
var passwordChangePassword_Score = 0;
var passwordRegister_Score = 0;

var options = {};
    options.common = {
        onLoad: function () {
            $('#length-help-text').text('Start typing password');
        },
        onKeyUp: function (evt, data) {
            $("#length-help-text").text("Current length: " + $(evt.target).val().length + " and score: " + Math.max(Math.round(data.score),0) + "/40");
        },
        onScore: function (options, word, totalScoreCalculated) {
            // If my word meets a specific scenario, I want the min score to
            // be the level 1 score, for example.
            if (word.length === 20 && totalScoreCalculated < options.ui.scores[1]) {
                // Score doesn't meet the score[1]. So we will return the min
                // numbers of points to get that score instead.
                return options.ui.score[1]
            }
            // Fall back to the score that was calculated by the rules engine.
            // Must pass back the score to set the total score variable.
            passwordRegister_Score = totalScoreCalculated;
            passwordChangePassword_Score = totalScoreCalculated;
            return totalScoreCalculated;
        }
    };

$('form[id=editPasswordForm] input[name=editPassword]').pwstrength(options);
$('form[id=registerForm] input[name=password]').pwstrength(options);


function logout(base_url){
    firebase.auth().signOut();
    alert("Logout");
    window.location.replace(base_url+"logout");
}

function register(){
    $('#btnDaftar').prop('disabled', true);
    var form = $("form[id=registerForm]");
    form.validate();
    if(form.valid()){
        var data = form.serialize();
        $.ajax({
            url: "api/register",
            type: "POST",
            data: data,
            success: function(tableData){
                if(tableData.status==true){
                    alert("Check verification in your email");
                    window.location.replace(base_url);
                }else{
                    alert(tableData.message);
                }
                updateCsrf(tableData.new_token);
            }
        });
    }
}

function checkEmail(){
    var data = $("form[id=registerForm] input[name=email]").val();
    if(data!=""){
        $.ajax({
            url: "api/check_email",
            type: "POST",
            data: {'email':data,[csrf_token_name]: csrf_token_hash},
            success: function(tableData){
                if(tableData.status==true){
                    emailRegister =  true;
                }else{
                    alert('Email Exist');
                    emailRegister = false;
                }
                updateCsrf(tableData.new_token);
            }
        });    
    }else{
        return false;
    }

    validationFormRegister();
    
}

function login(){
    var formlogin = $("form[id=loginForm]");
    formlogin.validate();
    if(formlogin.valid()){
        var data = formlogin.serialize();
        $.ajax({
            url: "api/login",
            type: "POST",
            data: data,
            success: function(tableData){
                if(tableData.status==true){
                    alert("Login Success");
                    window.location.replace(base_url);
                }else{
                    alert("Login Failed");
                }
                
                updateCsrf(tableData.new_token);
            }
        });
    }
}

function edit(){
    var formlogin = $("form[id=editForm]");
    formlogin.validate();
    if(formlogin.valid()){
        var data = formlogin.serialize();
        $.ajax({
            url: base_url+"/api/edit",
            type: "POST",
            data: data,
            success: function(tableData){
                if(tableData.status==true){
                    alert("Update Profile Success");
                    location.reload();
                }else{
                    alert("Update Profile Failed");
                }
                
                updateCsrf(tableData.new_token);
            }
        });
    }
}

function changePassword(){
    var formlogin = $("form[id=editPasswordForm]");
    formlogin.validate();
    if(formlogin.valid()){
        var data = formlogin.serialize();
        $.ajax({
            url: base_url+"api/changePassword",
            type: "POST",
            data: data,
            success: function(tableData){
                if(tableData.status==true){
                    alert("Update Password Success");
                    location.reload();
                }else{
                    alert("Update Password Failed");
                }
                
                updateCsrf(tableData.new_token);
            }
        });
    }
}

function checkPassword(){
    
    var password = $("form[id=registerForm] input[name=password]").val();
    var repassword = $("form[id=registerForm] input[name=passwordagain]").val();
    if(password==repassword){
        if(passwordChangePassword_Score>40){
            passwordRegister = true;
        }else{
            if(password!=""){
                alert("Password anda kurang kuat");    
            }
        }
    }else{
        if(password!="" && repassword!=""){
            alert("Password tidak sama");
        }
        
        passwordRegister = false;
    }

    validationFormRegister();
    validationFormChangePassword();
    
}



function checkChangePassword(){
    var currentpassword = $("form[id=editPasswordForm] input[name=editCurrentPassword]").val();
    var password = $("form[id=editPasswordForm] input[name=editPassword]").val();
    var repassword = $("form[id=editPasswordForm] input[name=editPasswordAgain]").val();
    if(currentpassword!=password){
        if(password==repassword){
            if(passwordChangePassword_Score>40){
                passwordChangePassword = true;
            }else{
                if(password!=""){
                    alert("Password anda kurang kuat");    
                }
            }
        }else{
            if(password!="" && repassword!=""){
                alert("Password tidak sama");
            }
            
            passwordChangePassword = false;
        }
    }else{
        if(password!="" && currentpassword!=""){
            alert("Password yang diubah tidak boleh sama dengan sebelumya");
        }
        
        passwordChangePassword = false;
    }
    

    validationFormChangePassword();
    
}


function validationFormChangePassword(){
    if(passwordChangePassword){
        $('#btnEditPassword').prop('disabled', false);
    }else{
        $('#btnEditPassword').prop('disabled', true);
    }
}


function validationFormRegister(){
    if(passwordRegister && emailRegister){
        $('#btnDaftar').prop('disabled', false);
    }else{
        $('#btnDaftar').prop('disabled', true);
    }
}

// function loginAfterContribute(){
//     var formlogin = $("form[id=loginAfterContributeForm]");
//     formlogin.validate();
//     if(formlogin.valid()){
//         var data = formlogin.serialize();
//         $.ajax({
//             url: "api/login",
//             type: "POST",
//             data: data,
//             success: function(tableData){
//                 if(tableData.status==true){
//                     alert("Login Success");
//                     window.location.replace(base_url);
//                 }else{
//                     alert("Login Failed");
//                 }
                
//                 updateCsrf(tableData.new_token);
//             }
//         });
//     }
// }


$('#login').on('hidden.bs.modal', function () {
    // alert(onContribute);
    if(onContribute){
        window.location.replace(base_url);
    }
});

