var ui = new firebaseui.auth.AuthUI(firebase.auth());
var uiConfig = {
    callbacks: {
        signInSuccessWithAuthResult: function(authResult, redirectUrl) {
            
            var access_token = authResult.credential.accessToken;
            var user = authResult.additionalUserInfo;
            
            if(user.isNewUser){
              $.ajax({
                url: "api/register",
                type: "POST",
                data: {"name":user.profile.name, "email": user.profile.email,  "password":user.profile.id, "source":user.providerId, [csrf_token_name]: csrf_token_hash},
                success: function(tableData){
                    if(tableData.status==true){
                        alert("Registered with Google");
                        $.ajax({
                          url: "api/login",
                          type: "POST",
                          data: {"email": user.profile.email,  "password":user.profile.id, "source":user.providerId, [csrf_token_name]: csrf_token_hash},
                          success: function(tableData){
                              if(tableData.status==true){
                                  alert("Login Success");
                                  window.location.replace(base_url);
                                  return true;
                              }else{
                                  alert("Login Failed");
                                  window.location.replace(base_url);
                                  return false;
                              }
                          }
                        });
                    }else{
                        alert("Register Failed");
                        window.location.replace(base_url);
                        return false;
                    }
                }
              });
            }else{
              $.ajax({
                url: "api/login",
                type: "POST",
                data: {"email": user.profile.email,  "password":user.profile.id, "source":user.providerId, [csrf_token_name]: csrf_token_hash},
                success: function(tableData){
                    if(tableData.status==true){
                        alert("Login Success");
                        window.location.replace(base_url);
                        return true;
                    }else{
                        alert("Login Failed");
                        window.location.replace(base_url);
                        return false;
                    }
                }
              });
              
            }

            // var url = 'https://www.googleapis.com/plus/v1/people/me?access_token='+access_token;
            
            // $.ajax({
            //   type: 'GET',
            //   url: url,
            //   async: false,
            //   success: function(userInfo) {
            //     //info about user
            //     console.log(userInfo);
            //     console.log('test');
            //   },
            //   error: function(e) {
            //     console.log('error');
          
            //   }
            // });
            // alert(url);
        
        },
    },
    // Will use popup for IDP Providers sign-in flow instead of the default, redirect.
    signInFlow: 'popup',
    signInSuccessUrl: base_url,
    signInOptions: [
        // Leave the lines as is for the providers you want to offer your users.
        firebase.auth.GoogleAuthProvider.PROVIDER_ID,
        // firebase.auth.FacebookAuthProvider.PROVIDER_ID,
        // firebase.auth.TwitterAuthProvider.PROVIDER_ID,
        // firebase.auth.GithubAuthProvider.PROVIDER_ID,
        // firebase.auth.EmailAuthProvider.PROVIDER_ID,
        // firebase.auth.PhoneAuthProvider.PROVIDER_ID
    ],
    // Terms of service url.
    tosUrl: base_url,
    // Privacy policy url.
    privacyPolicyUrl: base_url
};

$(document).ready(function () {
    if(!loginStatus){
        ui.start('.firebaseui-auth-container', uiConfig);
    }
});





