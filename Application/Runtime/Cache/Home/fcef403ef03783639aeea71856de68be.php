<?php if (!defined('THINK_PATH')) exit();?><tr class="tr">
    <td>
        <input type="text" name="param[]" class="form-control param"/>
        <!--<textarea style="resize:none" name="param[]" class="form-control param" rows="1"></textarea>-->
    </td>
    <td>
        <select name="type[]" class="form-control">
            <option value="string">string</option>
            <option value="int">int</option>
            <option value="float">float</option>
            <option value="file">file</option>
        </select>
    </td>
    <td>
        <select name="is_must[]" class="form-control">
            <option value="yes">yes</option>
            <option value="no">no</option>
        </select>
    </td>
    <td>
        <textarea name="remark[]" class="form-control" rows="1"></textarea>
    </td>
    <td>
        <a tabindex="-1" href="javascript:;" onclick="delThis(this)" class="keyvalueeditor-delete">
            <img class="deleteButton" src="/postman/Public/image/delete.png">
        </a>
    </td>
</tr>
<script type="application/javascript">
$('.param').focus();

/**
 * 删除一个参数列
 * @param obj
 */
function delThis(obj)
{
    $(obj).parent().parent().remove();
}
</script>