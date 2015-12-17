<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{

    public function index()
    {
    	header('Content-Type:text/html;charset=utf-8');
    	$app_id = I('app_id', 0, 'intval');

        $appData = M('app')->where(array('id' => $app_id))->find();
    	if ($appData['status'] != 1) {
    		exit( '项目接口不存在或被禁止访问！' );
    	}

        $Face = M('face');

        $map = array('app_id' => $app_id, 'status' => 1, 'pid' => 0);
        $field = array(
            'id', 'pid', 'method', 'title'
        );
    	$list = $Face->field($field)->where($map)->select();

        foreach ($list as $key => $val) {
            $map['pid'] = $val['id'];
            $list[$key]['_child'] = $Face->field($field)->where($map)->select();
        }

        $uid = $this->is_login();
        $this->assign('is_login', $uid ?: 0);
        $this->assign('app_id', $app_id);
        $this->assign('_list', $list);
        $this->assign('_title', $appData['title']);
        $this->display();
    }

    public function right()
    {
        $id = I('id', 0, 'intval');
        $data = M('face')->where(array('id' => $id, 'status' => 1))->find();
        if (!$data) {
            exit( '接口不存在或被禁止访问' );
        }
        $data['data'] = empty($data['data']) ? [] : unserialize($data['data']);

        $this->assign('data', $data);
    	$this->display();
    }

    /**
     * 创建项目目录
     */
    public function addDir()
    {
        $this->is_login() || exit;
        if (($app_id = I('app_id', 0, 'intval')) > 0 && ($title = I('title', '', 'trim'))) {
            $data = [
                'pid' => 0,
                'title' => $title,
                'app_id' => $app_id
            ];
            M('face')->add($data);
        }
        $this->redirect('index', array('app_id' => $app_id));
    }

    /**
     * 加载新增/编辑接口的表单
     * @param $id
     */
    public function face($id)
    {
        $this->is_login() || exit;
        $this->assign('id', $id);
        $this->display();
    }

    /**
     * 加载编辑的表单
     * @param $id
     */
    public function faces($id)
    {
        header('Content-Type:text/html;charset=utf-8');

        $this->is_login() || exit;
        $data = M('face')->find($id);
        $data || exit('编辑的接口数据不存在~');

        $data['data'] = $data['data'] ? unserialize($data['data']) : [];
        $this->assign('data', $data);
        $this->assign('id', $id);
        $this->assign('app_id', I('app_id', 0));
        $this->display();
    }

    /**
     * 新增/编辑接口post数据提交处理
     */
    public function addFace()
    {
        $this->is_login() || exit;
        if (IS_POST) {
            $app_id = I('app_id');
            // 组合data集合
            $data = [];
            if ($_POST['param'] && is_array($_POST['param'])) {
                foreach ($_POST['param'] as $key => $val) {
                    if ($val !== '') {
                        $data[] = [
                            'param' => $val,
                            'type' => $_POST['type'][$key],
                            'is_must' => $_POST['is_must'][$key],
                            'remark' => $_POST['remark'][$key]
                        ];
                    }
                }
            }
            $_POST['data'] = $data ? serialize($data) : '';

            if (($id = I('id', 0, 'intval')) == 0) { // 新增
                if ($_POST['title'] && $_POST['url']) {

                    M('face')->add($_POST);
                }
            } else { // 编辑
                unset($_POST['app_id']);
                if ($_POST['title'] && $_POST['url']) {
                    M('face')->save($_POST);
                }
            }
            $this->redirect('index', array('app_id' => $app_id));
        } else {
            header('Content-Type:text/html;charset=utf-8');
            exit( '不支持的请求方式' . $_SERVER['REQUEST_METHOD'] );
        }
    }

    /**
     * 参数表单的HTML
     */
    public function paramTable()
    {
        $this->display();
    }

    /**
     * 登录表单
     */
    public function login()
    {
        if (IS_AJAX) {
            $this->assign('app_id', I('app_id', 0));
            $this->display();
        } else {
            header('Content-Type:text/html;charset=utf-8');
            exit( '不支持的请求方式' . $_SERVER['REQUEST_METHOD'] );
        }
    }

    /**
     * 登录用户
     * @param $app_id
     */
    public function formLogin($app_id = null)
    {
        header('Content-Type:text/html;charset=utf-8');
        if (IS_POST) {
            // 处理登录
            if ($_POST['username'] && $_POST['password']) {
                $map = [
                    'username' => $_POST['username'],
                    'password' => $_POST['password'],
                    'status' => 1
                ];
                if ($user = M('user')->where($map)->find()) {
                    session('uid', $user['id']);
                    $this->redirect('index', ['app_id' => $app_id]);
                } else {
                    exit( '用户不存在或被禁用~' );
                }
            } else {
                exit( '参数有错误~' );
            }
        } else {
            exit( '不支持的请求方式' . $_SERVER['REQUEST_METHOD'] );
        }
    }

    /**
     * 是否登录 ，登录返回用户id，未登录false
     * @return bool|mixed
     */
    public function is_login()
    {
        $uid = session('uid');
        return $uid === null ? false : $uid;
    }

    /**
     * 退出登录
     * @param $app_id
     */
    public function logout($app_id = null)
    {
        session('uid', null);
        $this->redirect('index', ['app_id' => $app_id]);
    }

}