<div class="modal fade" v-cloak id="create_user_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="inputAddress" class="float-left">Names</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                        </div>
                        <input type="text" id="first_name" class="form-control" v-model="registred_user.names" placeholder="Names" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress" class="float-left">Fatherly Surname</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                        </div>
                        <input type="text" id="fatherly_surname" class="form-control" v-model="registred_user.fatherly_surname"  placeholder="Fatherly Surname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress" class="float-left">Maternal Surname</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                        </div>
                        <input type="text" id="maternal_surname" class="form-control" v-model="registred_user.maternal_surname"  placeholder="Maternal Surname" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress" class="float-left">Address</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map"></i></span>
                        </div>
                        <input type="text" id="adress" class="form-control" v-model="registred_user.address"  placeholder="Adress" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress" class="float-left">Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" id="email_registred" class="form-control" v-model="registred_user.email" v-on:change="verifyEmail(registred_user.email)" placeholder="Email" required>
                    </div>
                    <a v-if="!validateEmail" style="color: red;">Email no validate</a>
                </div>
                <div class="form-group">
                    <label for="inputAddress" class="float-left">Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        </div>
                        <input :type="passwordType" id="password_registred" class="form-control" v-model="registred_user.password" placeholder="Password" required>
                        <button @click="switchVisibility" class="btn btn-light"><i class="fas fa-eye"></i></button>
                    </div>
                </div>
                <p v-if="errors.length">
                    <b>Please correct the following error(s):</b>
                    <ul>
                    <li v-for="error in errors">{{ error }}</li>
                    </ul>
                </p>
         
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="register_users"><i class="fas fa-save"></i> Create</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" v-cloak id="update_password_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="inputEmail" class="float-left">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                    </div>
                    <input type="text" id="email_recovery" class="form-control" v-model="recovery_email" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="float-left">Password</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input :type="passwordType" id="update_password" class="form-control" v-model="recovery_password" placeholder="Password" required>
                    <button @click="switchVisibility" class="btn btn-light"><i class="fas fa-eye"></i></button>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" @click="update_password" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>


<div class="modal fade" v-cloak id="delete_account_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="inputEmail" class="float-left">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at"></i></span>
                    </div>
                    <input type="text" id="delete_email" class="form-control" v-model="delete_email" placeholder="Email">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" @click="delete_account" class="btn btn-danger"><i class="fas fa-eraser"></i> Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
</div>