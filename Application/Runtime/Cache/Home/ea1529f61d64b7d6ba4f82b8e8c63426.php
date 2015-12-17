<?php if (!defined('THINK_PATH')) exit();?>    <div class="form-group">
        <label for="exampleInputName2">标题</label>
        <input type="text" name="title" class="form-control" id="exampleInputName2" placeholder="">
    </div>
    <div class="form-group">
        <label for="exampleInputName2">请求方式</label>
        <br/>
        <label class="radio-inline">
            <input type="radio" checked name="method" id="inlineRadio1" value="get"> GET
        </label>
        <label class="radio-inline">
            <input type="radio" name="method" id="inlineRadio2" value="post"> POST
        </label>
        <!--<select name="method" class="form-control">
            <option value="get">get</option>
            <option value="post">post</option>
        </select>-->
    </div>
    <div class="form-group">
        <label for="exampleInputName2">接口地址</label>
        <textarea name="url" class="form-control" rows="1" style="max-width: 668px"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleInputName2" style="color: red">特别说明（不写就不会显示）</label>
        <textarea name="note" class="form-control" rows="1" style="max-width: 668px"></textarea>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>参数</th>
            <th>类型</th>
            <th>必填</th>
            <th>说明</th>
            <th></th>
        </tr>

        <tr class="table-param">
            <td>
                <input type="text" name="param[]" class="form-control" onfocus="addParam()"/>
                <!--<textarea style="resize:none" name="param[]" class="form-control" rows="1" onfocus="addParam()"></textarea>-->
            </td>
            <td>
                <select name="type[]" class="form-control">
                    <option value="string">string</option>
                    <option value="int">int</option>
                    <option value="float">float</option>
                    <option value="file">file</option>
                    <option value="json">json</option>
                </select>
            </td>
            <td>
                <select name="is_must[]" class="form-control">
                    <option value="yes">yes</option>
                    <option value="no">no</option>
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
    <input name="pid" type="hidden" value="<?php echo ((isset($id) && ($id !== ""))?($id): 0); ?>"/>