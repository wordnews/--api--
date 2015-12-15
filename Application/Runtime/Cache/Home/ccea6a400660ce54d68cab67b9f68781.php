<?php if (!defined('THINK_PATH')) exit();?><div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login">
    <div class="modal-dialog" role="document">
        <form action="<?php echo U('formLogin');?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Admin Login</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>username</label>
                        <input type="text" name="username" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>password</label>
                        <input type="text" name="password" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <input name="app_id" type="hidden" value="<?php echo ((isset($app_id) && ($app_id !== ""))?($app_id): 0); ?>"/>
                    <button type="submit" class="btn btn-primary">Login</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>