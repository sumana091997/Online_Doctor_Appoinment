<?php 
require_once('connection.php');
?>
                        
                        <!--LOGOUT-->
                        <div class="tab-pane" id="logout">
                            <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">LOG OUT</button>

                            <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                    
                                        <div class="modal-header"><h4>Log Out <i class="fa fa-lock"></i></h4></div>
                                        
                                        <div class="modal-body">Are you sure you want to log-out<i class="fa fa-question-circle"></i></div>
                                        
                                        <div class="modal-footer">
                                            <form action="./patient.php" method="POST">
                                                <input type="submit" name="patlogout" class="btn btn-primary btn-block" value="Log Out">
                                            </form>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Log out ends-->