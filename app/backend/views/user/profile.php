<?php
//echo 'profile page';
//echo '<br>';
?>

<div class="col-md-12">
    <!-- Horizontal Form -->
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Member profile</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="/app/backend/sites/user/profile.php" method="post" enctype="multipart/form-data" >
            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="User Name" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Full Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Full Name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Role</label>
                    <div class="col-sm-6">
                        <div class="radio-inline">
                            <label style = "font-weight: normal">
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                1
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label style = "font-weight: normal">
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                2
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label style = "font-weight: normal">
                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
                                3
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputFile" class="col-sm-2 control-label">Avatar</label>
                    <div class="col-sm-6">
                        <input type="file" id="exampleInputFile" name="fileToUpload">
                        <p class="help-block">Example block-level help text here.</p>
                        <img class="img-responsive" src="/data/img/avatar/no-avatar.png"  alt="Photo">
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <div class="col-sm-offset-2 col-sm-6">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-info pull-right">Save</button>
                </div>
            </div>
            <!-- /.box-footer -->
        </form>
    </div>
    <!-- /.box -->
</div>