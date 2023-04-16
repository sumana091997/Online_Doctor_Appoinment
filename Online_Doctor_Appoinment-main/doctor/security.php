                        <!--Security-->
                        <div class="tab-pane" id="security">
                            <span class="anchor" id="formChangePassword"></span>
                            <hr class="mb-0">
                            <!-- form card change password -->
                            <div class="card card-outline-secondary">
                                <div class="card-header">
                                    <h3 class="mb-0">Change Password</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form" role="form" autocomplete="off" method="POST" action="./doctor.php">
                                        <div class="form-group">
                                            <label for="inputPasswordOld">Current Password</label>
                                            <input type="password" name="old_password" class="form-control" id="inputPasswordOld" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPasswordNewVerify">New Password</label>
                                            <input type="password" name="doc_password" id="doc-password" class="form-control" required="" onchange="mydoc()">
                                            <span id="span-docpassword" style="color: red;"></span>
                                            <span class="form-text small text-muted">
                                                The password must be 8-20 characters, and must <em>not</em> contain spaces.
                                            </span>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPasswordNewVerify">Confirm New Password</label>
                                            <input type="password" name="doc_confirmpassword" id="doc-confirmpassword" class="form-control" required="" onchange="mydoc()">
                                            <span id="span-docconfirm" style="color: red;"></span>
                                            <span class="form-text small text-muted">
                                                To confirm, type the new password again.
                                            </span>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                        <label for="remember-me"><span><input id="doc-showpass" name="doc_showpass" onclick="doc_showpassword()" type="checkbox"></span> <span>Show Password</span></label><br>
                                            <input type="submit" class="btn btn-primary btn-lg" name="docpasschange" value="Change Password">
                                        </div>
                                    </form>
                                </div>
                              </div>
                              <!-- form card change password ends-->
                            </div>
                            <!--security ends-->


<script>
    // *************************Doctor Form Validation**************************
    var namechar=/^[A-Za-z]+$/;
    function mydoc(){
                
                // ************Password**************

                var dp = document.getElementById("doc-password").value;
                if(dp.length < 8) {
                    document.getElementById("span-docpassword").innerHTML="Password length must be 8 char";
                    return false;
                }
                else if(dp.search(/[0-9]/)==-1){
                    document.getElementById("span-docpassword").innerHTML="Atleast 1 number must be enter";
                    return false;
                }
                else if(dp.search(/[a-z]/)==-1){
                    document.getElementById("span-docpassword").innerHTML="Atleast 1 lowwer letter must be enter";
                    return false;
                }
                else if(dp.search(/[A-Z]/)==-1){
                    document.getElementById("span-docpassword").innerHTML="Atleast 1 Upper letter must be enter";
                    return false;
                }
                else if(dp.search(/[!\@\#\$\%\^\&\*\(\)\:\;\.\<\>\_\-\+\=\?\~\`]/)==-1){
                    document.getElementById("span-docpassword").innerHTML="Atleast 1 special letter must be enter";
                    return false;
                }
                else{
                    document.getElementById("span-docpassword").innerHTML="";
                    true;
                }

                // ************Confirm Password**************
                $('#doc-password, #doc-confirmpassword').on('keyup', function() {
                    if ($('#doc-password').val() != $('#doc-confirmpassword').val()) {
                        $('#span-docconfirm').html('Not Matching').css('color', 'red');
                    }
                    else{
                        $('#span-docconfirm').html('').css('color', 'red');
                    }
                });
                var dc = document.getElementById("doc-confirmpassword").value;
                if(dp == dc)
                {
                    true;
                }
                else{
                    return false;
                }
            }
    function doc_showpassword() {
        var y = document.getElementById("doc-password");
        y.type === "password";
        if (y.type === "password") {
            y.type = "text";
        } else {
            y.type = "password";
        }
    }
</script>