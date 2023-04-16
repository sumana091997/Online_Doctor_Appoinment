<?php 
require_once('connection.php');
// For fetching data in dashboard
?>
                           <!--change password starts-->
                           <div class="tab-pane " id="change">
                            <h2>Change password</h2>
                            <hr>
                            <form method="post" enctype="multipart/form-data" action="./patient.php">
                                <div class="form-group">
                                  <label>Old Password</label>
                                  <input type="password" class="form-control" name="old_password" id="old-password" placeholder="Old Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pat_password" id="pat-password" class="form-control" placeholder="Password" required="" onchange="mypat()">
                                    <span id='span-patpass' style="color: red;"></span>
                                    <span class="form-text small text-muted">
                                        The password must be 8-20 characters, and must <em>not</em> contain spaces.
                                    </span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="pat_confirmpassword" id="pat-confirmpassword" class="form-control" placeholder="Confirm Password" required="" onchange="mypat()">
                                    <span id='span-patconfirm' style="color: red;"></span>
                                    <span class="form-text small text-muted">
                                        To confirm, type the new password again.
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="remember-me"><span><input id="pat-showpass" name="pat_showpass" onclick="pat_showpassword()" type="checkbox"></span> <span>Show Password</span></label><br>
                                    <hr>
                                    <input type="submit" name="patregister" id="pat-register" class="btn btn-primary submit-btn" value="Change Password">
                                </div>
                            </form>
                          </div>
                          <!--change password ends-->
<script>
// ************************patient Form Validation**************************

var namechar=/^[A-Za-z]+$/;
function mypat(){

                // ************Password**************

                var pp = document.getElementById("pat-password").value;

                if(pp.length < 8) {
                    document.getElementById("span-patpass").innerHTML="Password length must be 8 char";
                    return false;
                }
                else if(pp.search(/[0-9]/)==-1){
                    document.getElementById("span-patpass").innerHTML="Atleast 1 number must be enter";
                    return false;
                }
                else if(pp.search(/[a-z]/)==-1){
                    document.getElementById("span-patpass").innerHTML="Atleast 1 lowwer letter must be enter";
                    return false;
                }
                else if(pp.search(/[A-Z]/)==-1){
                    document.getElementById("span-patpass").innerHTML="Atleast 1 Upper letter must be enter";
                    return false;
                }
                else if(pp.search(/[!\@\#\$\%\^\&\*\(\)\:\;\.\<\>\_\-\+\=\?\~\`]/)==-1){
                    document.getElementById("span-patpass").innerHTML="Atleast 1 special letter must be enter";
                    return false;
                }
                else{
                    document.getElementById("span-patpass").innerHTML="";
                    true;
                }

                // ************Confirm Password**************
                $('#pat-password, #pat-confirmpassword').on('keyup', function() {
                    if ($('#pat-password').val() != $('#pat-confirmpassword').val()) {
                        $('#span-patconfirm').html('Not Matching').css('color', 'red');
                    }
                    else{
                        $('#span-patconfirm').html('').css('color', 'red');
                    }
                });
                var pc = document.getElementById("pat-confirmpassword").value;
                if(pp == pc)
                {
                    true;
                }
                else{
                    return false;
                }
}
function pat_showpassword() {
    var x = document.getElementById("pat-password");
    x.type === "password";
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>