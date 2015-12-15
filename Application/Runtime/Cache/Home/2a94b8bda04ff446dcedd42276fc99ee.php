<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>接口文档</title>
    <link rel="stylesheet" href="/Online-Api-Document/Public/css/bootstrap.min.css"/>

    <script type="application/javascript" src="/Online-Api-Document/Public/js/jquery.min.js"></script>
    <script type="application/javascript" src="/Online-Api-Document/Public/js/bootstrap.min.js"></script>
</head>

<style type="text/css">
    .list-group li:hover {
        /*background-color: #CCFF99;*/
        background-color: #FF99CC;
    }
    .label-method-GET, .label-method-get {
        background-color: #4DAB58;
    }
    .label-method-POST, .label-method-post {
        background-color: #CC9900;
    }
    .panel-heading:hover {
        background-color: #ddd;
    }
    .set-color {
        background-color: #FFCCFF;
    }
    .modal-dialog {
        width: 700px;
    }
</style>

<body>

<div class="container">
    <div class="row" style="border: 1px solid #FFCCCC; border-radius: 5px">
        <div class="col-xs-3">
            <?php if ($is_login > 0) { ?>
                <a href="<?php echo U('logout', array('app_id' => $app_id));?>" style="width: 100%; padding: 5px 0; margin: 5px 0" type="button" class="btn btn-danger btn-lg">
                    Logout
                </a>
            <?php } else { ?>
                <button style="width: 100%; padding: 5px 0; margin: 5px 0" type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#login">
                    Login
                </button>
            <?php } ?>

            <!-- Button trigger modal -->
            <?php if ($is_login > 0) { ?>
                <button style="width: 100%; padding: 5px 0; margin-bottom: 5px" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                    Create Dir
                </button>
            <?php } ?>
            <div class="panel-group" role="tablist">
                <div class="panel panel-default">

                    <?php if(is_array($_list)): $i = 0; $__LIST__ = $_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><a class="collapsed" role="button" data-toggle="collapse" href="#collapseListGroup<?php echo ($val["id"]); ?>" aria-expanded="false" aria-controls="collapseListGroup<?php echo ($val["id"]); ?>" style="text-decoration: none; color: #333333;">
                        <div class="panel-heading" role="tab" id="collapseListGroupHeading<?php echo ($val["id"]); ?>" style="border-bottom: 1px solid #ddd">
                            <h4 class="panel-title" style="font-weight: bold">
                                <?php echo ($val["title"]); ?>
                                <?php if ($is_login > 0) { ?>
                                <a onclick="face(<?php echo ($val["id"]); ?>)" data-toggle="modal" data-target="#myModal2" href="javascript:;" style="float:right;">+</a>
                                <?php } ?>
                            </h4>
                        </div>
                    </a>
                    <div id="collapseListGroup<?php echo ($val["id"]); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading<?php echo ($val["id"]); ?>" aria-expanded="false" style="height: 0px;">
                        <ul class="list-group">
                            <?php if($val['_child']): if(is_array($val["_child"])): $i = 0; $__LIST__ = $val["_child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a href="<?php echo U('right', array('id' => $v['id']));?>" target="right" style="text-decoration: none">
                                    <li class="list-group-item" style="color: #333333;">
                                        <?php if ($v['method'] == 'get') { echo "<span class='label label-method-GET' >GET</span>"; } elseif ($v['method'] == 'post') { echo "<span class='label label-method-POST'>POST</span>"; } else { echo ''; } ?>

                                        <span style="position: relative; top: 3px;"><?php echo ($v["title"]); ?></span>
                                    </li>
                                </a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </ul>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
            </div>
        </div>
        <div class="col-xs-9">
            <iframe name="right" width="100%" height="800px" style="border: none">

            </iframe>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form action="<?php echo U('addDir');?>" method="post">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Create Dir Project</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputName2">Dir Name</label>
                    <input type="text" name="title" class="form-control" id="exampleInputName2" placeholder="">
                    <input type="hidden" name="app_id" value="<?php echo ($app_id); ?>"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        </form>
    </div>
</div>


<!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal2">
    Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo U('addFace');?>" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2" style="font-weight: bold">新增接口</h4>
            </div>
            <div class="modal-body face-form">

            </div>
            <div class="modal-footer">
                <input name="app_id" type="hidden" value="<?php echo ($app_id); ?>"/>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
            </form>
        </div>
    </div>
</div>

<script type="application/javascript">

$(function(){
    loadLginForm(); // 加载登录的表单
});

var obj = $('.list-group-item');
obj.click(function(){
    obj.each(function(){
        $(this).removeClass('set-color');
    });
    $(this).addClass('set-color');
});

/**
 * 加载新增/编辑接口的表单
 * @param id 目录的id
 */
function face(id)
{
    $.get("<?php echo U('face');?>", {id:id}, function(data){
        $('.face-form').html(data);
    });
}

/**
 * 增加参数表单
 */
function addParam()
{
    $.get("<?php echo U('paramTable');?>", {}, function(data){
        $('.table-param').before(data);
    });
}

/**
 * 加载登录的表单
 */
function loadLginForm()
{
    var app_id = "<?php echo ($app_id); ?>";
    $.get("<?php echo U('login');?>", {app_id: app_id}, function(html){
        $('body').append(html);
    });
}

</script>

</body>
</html>