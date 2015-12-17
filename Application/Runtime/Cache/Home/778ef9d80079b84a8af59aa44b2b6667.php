<?php if (!defined('THINK_PATH')) exit();?>

<form action="<?php echo U('addFace');?>" method="post">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel2" style="font-weight: bold">编辑接口</h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            <label for="exampleInputName2">标题</label>
            <input type="text" name="title" class="form-control" id="exampleInputName2" value="<?php echo ($data["title"]); ?>" >
        </div>
        <div class="form-group">
            <label for="exampleInputName2">请求方式</label>
            <br/>
            <label class="radio-inline">
                <input type="radio" checked name="method" id="inlineRadio1" value="get" <?php if($data['method'] == get): ?>checked<?php endif; ?> > GET
            </label>
            <label class="radio-inline">
                <input type="radio" name="method" id="inlineRadio2"  value="post" <?php if($data['method'] == post): ?>checked<?php endif; ?> > POST
            </label>
            <!--<select name="method" class="form-control">
                <option value="get">get</option>
                <option value="post">post</option>
            </select>-->
        </div>
        <div class="form-group">
            <label for="exampleInputName2">接口地址</label>
            <textarea name="url" class="form-control" rows="1" style="max-width: 668px"><?php echo ($data["url"]); ?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputName2" style="color: red">特别说明（不写就不会显示）</label>
            <textarea name="note" class="form-control" rows="1" style="max-width: 668px"><?php echo ($data["note"]); ?></textarea>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>参数</th>
                <th>类型</th>
                <th>必填</th>
                <th>说明</th>
                <th></th>
            </tr>

            <?php if(is_array($data["data"])): $i = 0; $__LIST__ = $data["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                <td>
                    <input type="text" name="param[]" class="form-control" value="<?php echo ($val["param"]); ?>"/>
                    <!--<textarea style="resize:none" name="param[]" class="form-control" rows="1" onfocus="addParam()"></textarea>-->
                </td>
                <td>
                    <select name="type[]" class="form-control">
                        <option value="string" <?php if($val['type'] == 'string'): ?>checked<?php endif; ?> >string</option>
                        <option value="int" <?php if($val['type'] == 'int'): ?>checked<?php endif; ?> >int</option>
                        <option value="float" <?php if($val['type'] == 'string'): ?>float<?php endif; ?> >float</option>
                        <option value="file" <?php if($val['type'] == 'string'): ?>file<?php endif; ?> >file</option>
                        <option value="json" <?php if($val['type'] == 'json'): ?>file<?php endif; ?> >json</option>
                    </select>
                </td>
                <td>
                    <select name="is_must[]" class="form-control">
                        <option value="yes" <?php if($val['is_must'] == 'yes'): ?>selected<?php endif; ?> >yes</option>
                        <option value="no" <?php if($val['is_must'] == 'no'): ?>selected<?php endif; ?> >no</option>
                    </select>
                </td>
                <td>
                    <textarea name="remark[]" class="form-control" rows="1""><?php echo ($val["remark"]); ?></textarea>
                </td>
                <td>
                    <a tabindex="-1" href="javascript:;" onclick="delThis(this)" class="keyvalueeditor-delete">
                        <img class="deleteButton" src="/Online-Api-Document/Public/image/delete.png">
                    </a>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            <tr class="table-param">
                <td>
                    <input type="text" name="param[]" class="form-control" onfocus="addParam()"/>
                    <!--<textarea style="resize:none" name="param[]" class="form-control" rows="1" onfocus="addParam()"></textarea>-->
                </td>
                <td>
                    <select name="type[]" class="form-control">
                        <option value="string" >string</option>
                        <option value="int" >int</option>
                        <option value="float" >float</option>
                        <option value="file" >file</option>
                        <option value="json" >json</option>
                    </select>
                </td>
                <td>
                    <select name="is_must[]" class="form-control">
                        <option value="yes" >yes</option>
                        <option value="no" >no</option>
                    </select>
                </td>
                <td>
                    <textarea name="remark[]" class="form-control" rows="1" onfocus="addParam()"></textarea>
                </td>
                <td>
                    <a tabindex="-1" href="javascript:;" class="keyvalueeditor-delete">
                        <!--<img class="deleteButton" src="/Online-Api-Document/Public/image/delete.png">-->
                    </a>
                </td>
            </tr>
        </table>

        <div class="form-group">
            <label for="exampleInputName2" style="color: red">返回说明</label>
            <textarea name="return" class="form-control" style="max-width: 668px" rows="8"></textarea>
        </div>
        <input name="id" type="hidden" value="<?php echo ((isset($data["id"]) && ($data["id"] !== ""))?($data["id"]): 0); ?>"/>

    </div>
    <div class="modal-footer">
        <input name="app_id" type="hidden" value="<?php echo ($app_id); ?>"/>
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

    </div>
</form>