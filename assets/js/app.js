(function($) {
  $.fn.facebook_login = function(options) {
    var defaults = {
      endpoint: '',
      permissions: 'email',
      onSuccess: function(data) { console.log([200,'OK']); },
      onError: function(data) { console.log([500,'Error']); }
    };

    var settings = $.extend({}, defaults, options);

    if(settings.appId === 'undefined') {
      console.log('You must set the appId');
      return false;
    }
     
    (function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    window.fbAsyncInit = function() {
      FB.init({
        appId: settings.appId,
        status: true,
        xfbml: true
      });
    };

    this.bind('click', function() {
      FB.login(function(r) {
        var response;
        if(response = r.authResponse) {
          $('#fbLink').find('.iconLoad').css({'display':'inline-block'});
          var user_id = response.userID;
          var token   = response.accessToken;
          //console.log(user_id+'==='+token); return false;
          
          FB.api('/me',  {locale: 'en_US', fields: 'id,name,email,first_name,last_name,locale,link,gender,timezone,picture.width(200).height(200)'}, function(user) {
            saveUserData(user,token,'','')
          });
          
        } else {
          settings.onError();
        }
      }, {scope: settings.permissions});

      return false; 
    });
  }
})(jQuery);

$(document).on('click', '#fbLink', function(event) {
    event.preventDefault();
     
        var f_login=   $(this).facebook_login({
        appId      : fb_app_id,  
        endpoint: baseurl + "auth/fb_authenticate"
      });
    
});

$("#fbLink").facebook_login({
        appId      : fb_app_id,
        endpoint: ''

 });
function saveUserData(userData,token,merge,newemail){
  //console.log(userData.id); return false;
  $("#tokenid").val(token);
  $("#newtokenid").val(token);
  postdata = {oauth_provider:'facebook',mergefb:merge,userData: JSON.stringify(userData),usertoken:token,email:newemail};
  ajaxcall(baseurl + "auth/fb_authenticate",postdata);
  xhr.success(function(data)
  {
  if(data  == "exists"){
  $('#pageloadmodal').modal('open');
  } else if(data  == "emailnotexists"){
  $('#emailmodal').modal('open');
  }else if(data == "not_activated"){
        swal({
            title: "Account Information",
            text: "You account is deactivated.Please contact admin",
            html: true,
            confirmButtonColor: "#F7751F"
        });
  }else if(data == "network_error"){
        swal({
            title: "Connection Error",
            text: "OOPS! Network Connection Error. Please try again.",
            html: true,
            confirmButtonColor: "#F7751F"
        });
  }else if(data == "fbloginsuccess"){
        var redirect_url=baseurl + "bots"
        window.location = redirect_url;
        return false;
  }
  $('.iconLoad').fadeOut();
  });
}

$(".fgtlink").click(function(ev) {
  ev.preventDefault();
  $("#errorinfo").text('');
  $("#f_email").val('');
});

$(document).on('click', '#updatefbdetails', function(e) {
  e.preventDefault();
  $('#fbLink').find('.iconLoad').css({'display':'inline-block'});
  var token=$("#tokenid").val();
  $('#pageloadmodal').modal('close');
  FB.api('/me',  {locale: 'en_US', fields: 'id,name,email,first_name,last_name,locale,link,picture,gender,timezone'}, function(user) {
  saveUserData(user,token,'YES','')
  });
});

function validate(email_txt, password_txt, name_txt, type) {

    if (type == "signin") {

        if (email_txt == "") {
         $("#error").html("<div class='center unsuccess'><span class='icon_excalm_outline err_icon'></span><span>Please enter your email address</span></div>");
          $('.iconLoad').fadeOut();
          return false
        }else if (password_txt == "" ) {
          $("#error").html("<div class='center unsuccess'><span class='icon_excalm_outline err_icon'></span><span>Please enter your password</span></div>");
         $('.iconLoad').fadeOut();
          return false
        }
    } else {
      //alert(password_txt+"=="+email_txt+"==="+name_txt)
      /*  if (password_txt == "" && email_txt == "" && name_txt == "") {
            $("#error").text('Name, Email and password is required');
            $("#card-alert").show();
            return false
        }*/
        if (name_txt == '') {
          $("#error").html("<div class='center unsuccess'><span class='icon_excalm_outline err_icon'></span><span>Please enter your name</span></div>");
          $('.iconLoad').fadeOut();
          return false
          
        } else {

            if (name_txt.length < 3) {
               // $("#name").val('');
               $("#error").html("<div class='center unsuccess'><span class='icon_excalm_outline err_icon'></span><span>Name should be minimum of 3 characters</span></div>");
                $('.iconLoad').fadeOut();
                return false
                
            } else {
                if (name_txt.match("^[a-zA-Z']{3,16}")) {
                    //alert( "Valid name" );
                } else {
                   // $("#name").val('');
                $("#error").html("<div class='center unsuccess'><span class='icon_excalm_outline err_icon'></span><span>Please enter your valid Name</span></div>");
               $('.iconLoad').fadeOut();
                return false
                
                }
            }

        }
    }
    if (email_txt == '') {
        $("#error").html("<div class='center unsuccess'><span class='icon_excalm_outline err_icon'></span><span>Please enter your email address</span></div>");
        $('.iconLoad').fadeOut();
        return false
    } else {

        if (!isValidEmailAddress(email_txt)) {
        $("#error").html("<div class='center unsuccess'><span class='icon_excalm_outline err_icon'></span><span>Please enter your valid email address</span></div>");
        $('.iconLoad').fadeOut();
        return false
       }

    }
    if (password_txt == '') {

        $("#error").html("<div class='center unsuccess'><span class='icon_excalm_outline err_icon'></span><span>Please enter a password</span></div>");
        $('.iconLoad').fadeOut();
        return false
        
    } else {

        if (type == "signup") {

          if(isvalidpassword(password_txt)===false) {
            $("#error").html("<div class='center unsuccess'><span class='icon_excalm_outline err_icon'></span><span>Password must be minimum 6 characters and must contains at least one uppercase, one lowercase, one number and one special character.</span></div>");
            $('.iconLoad').fadeOut();
             return false  
          }
        }

    }
    return true;

}

function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w+-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

 function isvalidpassword(str) {
    var pattern = new RegExp(/^(?=.*\d)(?=.*[!"#$%&'()*+,-./:;<=>?@[\]^_`{|}~])(?=.*[a-z])(?=.*[A-Z]).{6,40}$/);
    return pattern.test(str);
}


function facebook_page_connect(url) {
    window.open(url, '_blank', 'toolbar=no,scrollbars=yes,resizable=no,top=100,left=350,width=600,height=600');

}
