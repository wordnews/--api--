<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>接口内容</title>
    <link rel="stylesheet" href="/Online-Api-Document/Public/css/bootstrap.min.css"/>

    <script type="application/javascript" src="/Online-Api-Document/Public/js/jquery.min.js"></script>
    <script type="application/javascript" src="/Online-Api-Document/Public/js/bootstrap.min.js"></script>
    <style type="text/css">
        .label-method-GET, .label-method-get {
            background-color: #4DAB58;
        }
        .label-method-POST, .label-method-post {
            background-color: #CC9900;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="row" style="padding-top: 20px">
                <div class="col-xs-12">
                    <?php if ($data['method'] == 'get') { echo "<span class='label label-method-GET' >GET</span>"; } elseif ($data['method'] == 'post') { echo "<span class='label label-method-POST'>POST</span>"; } else { echo ''; } ?>
                    <?php echo ($data["title"]); ?>
                </div>
            </div>

            <div class="row" style="padding-top: 20px">
                <div class="col-xs-12">
                    <span style="font-weight: bold; font-size: 16px">接口地址：</span>
                    <pre><?php echo ($data["url"]); ?></pre>
                </div>
            </div>

            <?php if($data['note']): ?><div class="row" style="padding-top: 20px">
                <div class="col-xs-12">
                    <span style="font-weight: bold; font-size: 16px; color: red">特别说明：</span>
                    <pre style="color: red"><?php echo ($data["note"]); ?></pre>
                </div>
            </div><?php endif; ?>

            <div class="row" style="padding-top: 20px">
                <div class="col-xs-12">
                    <span style="font-weight: bold; font-size: 16px">参数说明：</span>
                    <table class="table table-bordered">
                        <tr>
                            <th>参数</th>
                            <th>类型</th>
                            <th>是否必填</th>
                            <th>说明</th>
                        </tr>
                        <?php if($data['data']): if(is_array($data["data"])): $i = 0; $__LIST__ = $data["data"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($val["param"]); ?></td>
                                <td><?php echo ($val["type"]); ?></td>
                                <td><img src="/Online-Api-Document/Public/image/<?php echo ($val["is_must"]); ?>.gif" alt=""/></td>
                                <td><?php echo ($val["remark"]); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </table>
                </div>
            </div>

            <div class="row" style="padding-top: 20px">
                <div class="col-xs-12">
                    <span style="font-weight: bold; font-size: 16px">返回说明：</span>
                    <pre><?php echo ($data["return"]); ?></pre>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>