$(document).ready(function(){
     $("#edIdUser").focus();
     $("#btLogin").click(function(){
            if(_cek_inputan('#fLogin')){
              $.ajax({
                    url: 'Login/validasi',
                    type: 'POST',
                    data: $('#fLogin').serialize(),
                    dataType: 'json',
                    success: function(data){
                      if(data.ceknumber==true){
                         document.location.href = data.redirect
                      }else{
                        $('#edIdUser').focus();
                        $('#user').focus();
                        info('Cek User dan Password Anda ');
                      };
                    }  
                }); 
            }
        });        
});

/*
var v = new Vue({
    el:"#login",
    data:{
        userLogin:{username:'', password:''},
        message:'',
        formValidation:{},
        registerForm:false,
       
        
        
         userRegister:{firstname:'', lastname:'',username:'',email:'',password:'',confirm_password:''},
        successMSG:'',
        rValidate:{},

    },
    computed:{
       google_login(){
          return store.getters.user //pass google user info into props display to template
       }, 
        google_validation(){
            return store.state.gValidation; //get google validation in store.js using vuex
        }
        },
    methods:{
        login(){
            var userlogin = v.toFormData(v.userLogin);
            axios.post(url+'user/login', userlogin).then(function(response){
                if(response.data.error){
                    v.message = response.data.message;
                }else{
                     window.location.href = response.data.message.success;
                }
            }) //for login user
        },
         getGUserLogIn(user){
              store.dispatch('googleData', user) //getting google user info store to store.js using vuex
        },
        googleRegister(user){
          store.dispatch('googleRegister', user) //getting google user info with set username and password 
        },
         closeRegisterForm(){
            v.registerForm = false
            v.formValidation = {},
            v.rValidate=''
            v.userRegister = {
                firstname:'', 
                lastname:'',
                username:'',
                email:'',
                password:'',
                confirm_password:''} // 
         },
         register(){
            var regForm = v.toFormData(v.userRegister);
            axios.post(url+'user/register', regForm).then(function(response){
                if(response.data.success){
                    v.successMSG = response.data.message.success;
                    v.rValidate = '';
                    v.userRegister = {firstname:'', lastname:'',username:'',email:'',password:'',confirm_password:''}
                    v.registerForm = false
                     v.clearMSG()
                }else{
                   
                    v.rValidate = response.data.message;
                }
            }) // register user
        },
         clearMSG(){
            setTimeout(function(){
       v.successMSG=''
       },3000); //disappear alert message 
        },
        
          toFormData: function(obj){
      var form_data = new FormData();
      for(var key in obj){
        form_data.append(key, obj[key]);
      }
      return form_data;
    },
    }
})
*/

