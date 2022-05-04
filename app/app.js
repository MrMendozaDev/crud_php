var app_login;

$(document).ready(function () {
    app_login = new Vue({
        el: "#app_login",
        data: {
            passwordType: "password",
            registred_user: {
                names: '',
                fatherly_surname: '',
                maternal_surname: '',
                address: '',
                email: '',
                password: ''
            },
            login_user: {
                email_address: '',
                email_password: ''
            },
            recovery_email: '',
            recovery_password: '',
            delete_email: '',
            validateEmail: true,
            errors: [],
        },
        mounted: function(){
            console.log("Mounted", this.var_welcome)
        },
        methods: {
            switchVisibility: function(){
                app_login.passwordType = app_login.passwordType === "password" ? "text" : "password";
            },
            openModelCreateUser: function(){
                app_login.registred_user = {
                    names: '',
                    fatherly_surname: '',
                    maternal_surname: '',
                    address: '',
                    email: '',
                    password: ''
                }
                let obj = $("#create_user_modal").modal('show');
            },
            openModelUpdatePassword: function(){
                app_login.recovery_email = ''
                app_login.recovery_password = ''
                let obj = $("#update_password_modal").modal('show');
            },
            openModelDeleteAccount: function(){
                app_login.delete_email = ''
                let obj = $("#delete_account_modal").modal('show');
            },

            verifyEmail: function(email){
                app_login.validateEmail = email.match(
                  /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                );
            },
            loginUser: function(){
        
                if(
                    !app_login.login_user.email_address
                    || !app_login.login_user.email_password
                ) return Swal.fire({
                    toast: true,
                    position: 'top',
                    icon: 'error',
                    title: `Error login!`,
                    showConfirmButton: false,
                    timer: 3000
                })
                $.ajax({
                    type: "POST",
                    url: `database/login.php`,
                    data: {
                        "action": "login_user",
                        "data":  {
                            email: app_login.login_user.email_address,
                            password: app_login.login_user.email_password
                        },
                    },
                    success: function(data){
                      
                        let obj = data ? JSON.parse(data) : []

                        if(! obj.length ) return Swal.fire({
                            toast: true,
                            position: 'top',
                            icon: 'error',
                            title: `No User!`,
                            showConfirmButton: false,
                            timer: 3000
                        })
                        Swal.fire({
                            toast: true,
                            position: 'top',
                            icon: 'success',
                            title: `Welcome ${obj[0].names}!`,
                            showConfirmButton: false,
                            timer: 3000
                        })
                     
                    },
                    error: function(data)
                    {
                        Swal.fire({
                            toast: true,
                            position: 'top',
                            icon: 'error',
                            title: `Error login!`,
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                })
            },

            delete_account: function(){
                $.ajax({
                    type: "POST",
                    url: `database/login.php`,
                    data: {
                        "action": "delete_account",
                        "data":  {
                            email: app_login.delete_email,
                        },
                    },
                    success: function(data){
                        console.log("data")
                        Swal.fire({
                            toast: true,
                            position: 'top',
                            icon: 'success',
                            title: `Delete success account!`,
                            showConfirmButton: false,
                            timer: 3000
                        })
                     
                    },
                    error: function(data)
                    {
                        Swal.fire({
                            toast: true,
                            position: 'top',
                            icon: 'error',
                            title: `Error delete account!`,
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                })
            },

            register_users: function(){
                let validateForm = app_login.checkForm()
                if(!validateForm) return  Swal.fire({
                    toast: true,
                    position: 'top',
                    icon: 'error',
                    title: `The user is not created!`,
                    showConfirmButton: false,
                    timer: 3000
                })

                $.ajax({
                    type: "POST",
                    url: `database/login.php`,
                    data: {
                        "action": "register_user",
                        "data": app_login.registred_user,
                    },
                    success: function(data){

                        $("#create_user_modal").modal('hide');

                        Swal.fire({
                            toast: true,
                            position: 'top',
                            icon: 'success',
                            title: `The user is created!`,
                            showConfirmButton: false,
                            timer: 3000
                        })
                     
                    },
                    error: function(data)
                    {
                        Swal.fire({
                            toast: true,
                            position: 'top',
                            icon: 'error',
                            title: `The user is not created!`,
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                })
            },

            update_password: function(){
                if(
                    !app_login.recovery_email 
                    || !app_login.recovery_password
                ) return Swal.fire({
                    toast: true,
                    position: 'top',
                    icon: 'error',
                    title: `The password is not update!`,
                    showConfirmButton: false,
                    timer: 3000
                })
                $.ajax({
                    type: "POST",
                    url: `database/login.php`,
                    data: {
                        "action": "update_password",
                        "data":  {
                            email: app_login.recovery_email,
                            password: app_login.recovery_password
                        },
                    },
                    success: function(data){
                        $("#update_password_modal").modal('hide');
                        Swal.fire({
                            toast: true,
                            position: 'top',
                            icon: 'success',
                            title: `The password was update!`,
                            showConfirmButton: false,
                            timer: 3000
                        })
                     
                    },
                    error: function(data)
                    {
                        Swal.fire({
                            toast: true,
                            position: 'top',
                            icon: 'error',
                            title: `The password is not update!`,
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                })
            },

            checkForm: function () {
                this.errors = [];
                
                if (
                    this.registred_user.names 
                    && this.registred_user.fatherly_surname 
                    && this.registred_user.maternal_surname 
                    && this.registred_user.address
                    && this.registred_user.email
                    && this.registred_user.password
                ) return true;
    
                if (
                    !this.registred_user.names 
                    || !this.registred_user.fatherly_surname 
                    || !this.registred_user.maternal_surname 
                    || !this.registred_user.address
                ) this.errors.push('The information personal is required.');
                
                if (!this.registred_user.email || !this.registred_user.password) {
                  this.errors.push('No email address or password.');
                }
                return false
            },
        }
    })
})
