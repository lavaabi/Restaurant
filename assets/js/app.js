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
  $(".error_info").empty();
  //change pass
  if(type == "changepass")
  {
    if (name_txt == "") {
     $(".error_info").html('<i class="fa fa-warning"></i> Please enter your new password.');
     return false
    }
    if (password_txt == "") {
     $(".error_info").html('<i class="fa fa-warning"></i> Please enter your confirm password.');
     return false
    }

    if (password_txt != name_txt) {
     $(".error_info").html('<i class="fa fa-warning"></i> Password is mismatch.');
     return false
    }

    if(isvalidpassword(password_txt)===false || isvalidpassword(name_txt)===false) {
    $(".error_info").html("<i class='fa fa-warning'></i> Password must be minimum 6 characters and must contains at least one uppercase, one lowercase, one number and one special character.");
    return false  
    }
    return true;

  }
  // Forgot
  if (type == "forgot") {
    if (email_txt == "") {
     $(".error_info").html('<i class="fa fa-warning"></i> Please enter your email address.');
     return false
    }
    if (!isValidEmailAddress(email_txt)) {
    $(".error_info").html("<i class='fa fa-warning'></i> Please enter your valid email address.");
    return false
    }
    return true;
  }
  // Signup
  if (type == "signup") {

    if (name_txt == '') {
      $(".error_info").html('<i class="fa fa-warning"></i> Please enter your Name.');
      return false
    }else if(name_txt.length < 3) {
      $(".error_info").html("<i class='fa fa-warning'></i> Name should be minimum of 3 characters.");
      return false  
    }else if(name_txt.length > 40)
    {
      $(".error_info").html("<i class='fa fa-warning'></i> Name should not exceed 40 characters.");
      return false
    } else {
      if(name_txt.match("^[a-zA-Z']{3,16}")) {
      } else {
      $(".error_info").html("<i class='fa fa-warning'></i> Please enter your valid Name.");
      return false
      }
    }
  }
  // Login and signup
  if (email_txt == "") {
     $(".error_info").html('<i class="fa fa-warning"></i> Please enter your email address.');
     return false
  }else if (password_txt == "" ) {
      $(".error_info").html('<i class="fa fa-warning"></i> Please enter your password.');
      return false
  }

  if (!isValidEmailAddress(email_txt)) {
    $(".error_info").html("<i class='fa fa-warning'></i> Please enter your valid email address.");
    return false
  }
  if(isvalidpassword(password_txt)===false) {
    $(".error_info").html("<i class='fa fa-warning'></i> Password must be minimum 6 characters and must contains at least one uppercase, one lowercase, one number and one special character.");
    return false  
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

function login_submit()
{
  $('.clear_info').empty();
  var email_txt     = $('#login_email').val();
  var password_txt  = $('#login_password').val();
  var sign_in = validate(email_txt,password_txt,name_txt='','signin');
  if(sign_in)
  {
    $('.overlay').show();
    $.ajax({
        type: "POST",
        url: baseurl+"auth/login",
        data: {
            "email"     : email_txt,
            "password"  : password_txt,
            'login'    :true
        },
        dataType:'JSON',
        success: function(data) {
          console.log(data);
          $('.overlay').hide();
          $('.clear_info').empty();
          if(data.login_confirm){
            window.location.href = baseurl+"restaurants";
          }else{
            $('.error_info_signin').html("<i class='fa fa-warning'></i> " +data.error_msg);
          }
        }
    });
  }
  return false;
}
function signup_submit()
{
  $('.clear_info').empty();
  var email_txt     = $('#signup_email').val();
  var password_txt  = $('#signup_password').val();
  var name_txt      = $('#signup_name').val();
  var sign_in = validate(email_txt,password_txt,name_txt,'signup');
  if(sign_in)
  {
    $('.overlay').show();
    $.ajax({
        type: "POST",
        url: baseurl+"auth/register",
        data: {
            "email"     : email_txt,
            "password"  : password_txt,
            "name"      : name_txt,
            'signup'    :true
        },
        dataType:'JSON',
        success: function(data) {
          console.log(data);
          $('.overlay').hide();
          $('.clear_info').empty();
          if(data.register_confirm){
            $('.success_info_signup').html(data.success_msg);
            $('#signup_email').val('');
            $('#signup_password').val('');
            $('#signup_name').val('');
          }else{
            $('.error_info_signup').html("<i class='fa fa-warning'></i> " +data.error_msg);
          }
        }
    });
  }
  return false;
}
function forgot_submit()
{
  $('.clear_info').empty();
  var email_txt     = $('#fr_email').val();
  var password_txt  = '';
  var name_txt      = '';
  var sign_in = validate(email_txt,password_txt,name_txt,'forgot');
  if(sign_in)
  {
    $('.overlay').show();
    $.ajax({
        type: "POST",
        url: baseurl+"auth/forgot_password",
        data: {
            "email"     : email_txt,
            'forgot'    :true
        },
        dataType:'JSON',
        success: function(data) {
          console.log(data);
          $('.overlay').hide();
          $('.clear_info').empty();
          if(data.forgot){
            $('.success_info_forgot').html(data.success_msg);
          }else{
            $('.error_info_forgot').html("<i class='fa fa-warning'></i> " +data.error_msg);
          }
        }
    });
  }
  return false;
}

function change_submit()
{
  $('.clear_info').empty();
  var name_txt      = $('#new_pass').val();
  var password_txt  = $('#confirm_pass').val();
  var confirm_code  = $('#confirm_code_change').val();
  var email_txt     = '';
  var sign_in = validate(email_txt,password_txt,name_txt,'changepass');
  if(sign_in)
  {
    $('.overlay').show();
    $.ajax({
        type: "POST",
        url: baseurl+"auth/change_password",
        data: {
            "password"      : password_txt,
            'confirm_code'  : confirm_code,
            'changepass'    :true
        },
        dataType:'JSON',
        success: function(data) {
          console.log(data);
          $('.overlay').hide();
          
          if(data.changepass){
            $('.success_info_change').html(data.success_msg);
            $('#new_pass').val('');
            $('#confirm_pass').val('');
          }else{
            $('.error_info_change').html("<i class='fa fa-warning'></i> " +data.error_msg);
          }
        }
    });
  }
  return false;
}

function profile_user_update()
{
  $('.clear_info').empty();
  var data = $('#profile_update').serialize();
  var name_txt = $('#first_name').val();
  if (name_txt == '') {
      $(".error_info").html('<i class="fa fa-warning"></i> Please enter your Name.');
      return false
    }else if(name_txt.length < 3) {
      $(".error_info").html("<i class='fa fa-warning'></i> Name should be minimum of 3 characters.");
      return false  
    }else if(name_txt.length > 40)
    {
      $(".error_info").html("<i class='fa fa-warning'></i> Name should not exceed 40 characters.");
      return false
    } else {
      if(name_txt.match("^[a-zA-Z']{3,16}")) {
      } else {
      $(".error_info").html("<i class='fa fa-warning'></i> Please enter your valid Name.");
      return false
      }
    }

    $('.overlay').show();
    $.ajax({
        type: "POST",
        url: baseurl+"auth/update_user_profile",
        data: data,
        dataType:'JSON',
        success: function(data) {
          console.log(data);
          $('.overlay').hide();
          
          if(data.update_pf){
            $('.success_info_update_pf').html(data.success_msg);
            $('#new_pass').val('');
            $('#confirm_pass').val('');
          }else{
            $('.error_info_update_pf').html("<i class='fa fa-warning'></i> " +data.error_msg);
          }
        }
    });
    return false;
}

function profile_user_update_pass()
{
  var data = $('#profile_update_pass').serialize();
    $('.clear_info').empty();
    var name_txt      = $('#new_pass').val();
    var password_txt  = $('#confirm_pass').val();
    var email_txt     = '';
    var sign_in = validate(email_txt,password_txt,name_txt,'changepass');
    var old_pass =$('#old_pass').val();
    if (old_pass == '') {
      $(".error_info").html('<i class="fa fa-warning"></i> Please enter your old password.');
      return false
    }
    if(sign_in)
    {
    $('.overlay').show();
    $.ajax({
        type: "POST",
        url: baseurl+"auth/update_user_profile_pass",
        data: data,
        dataType:'JSON',
        success: function(data) {
          console.log(data);
          $('.overlay').hide();
          
          if(data.update_pass){
            $('.success_info_update_pass').html(data.success_msg);
            $('#old_pass').val('');
            $('#new_pass').val('');
            $('#confirm_pass').val('');
          }else{
            $('.error_info_update_pass').html("<i class='fa fa-warning'></i> " +data.error_msg);
          }
        }
    });
  }
    return false;
}

function profile_user_update_address()
{
  var data = $('#profile_update_address').serialize();
    $('.clear_info').empty();
    var name_txt = $('#first_name_addr').val();
    var address  = $('#address').val();
    var mobile   = $('#mobile').val();
    if (name_txt == '') {
      $(".error_info").html('<i class="fa fa-warning"></i> Please enter your Name.');
      return false
    }else if(name_txt.length < 3) {
      $(".error_info").html("<i class='fa fa-warning'></i> Name should be minimum of 3 characters.");
      return false  
    }else if(name_txt.length > 40)
    {
      $(".error_info").html("<i class='fa fa-warning'></i> Name should not exceed 40 characters.");
      return false
    } else {
      if(name_txt.match("^[a-zA-Z']{3,16}")) {
      } else {
      $(".error_info").html("<i class='fa fa-warning'></i> Please enter your valid Name.");
      return false
      }
    }
    if (address == '') {
      $(".error_info").html('<i class="fa fa-warning"></i> Please enter your details address here.');
      return false
    }
    if (mobile == '') {
      $(".error_info").html('<i class="fa fa-warning"></i> Please enter your mobile number.');
      return false
    }
    
    $('.overlay').show();
    $.ajax({
        type: "POST",
        url: baseurl+"auth/update_user_profile_address",
        data: data,
        dataType:'JSON',
        success: function(data) {
          console.log(data);
          $('.overlay').hide();
          
          if(data.update_address){
            $('.success_info_update_address').html(data.success_msg);
          }else{
            $('.error_info_update_address').html("<i class='fa fa-warning'></i> " +data.error_msg);
          }
        }
    });
  
    return false;
}

$(document).on('keyup','input[name="mobile"]',function(e)
  {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});

