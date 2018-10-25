<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/25
 * Time: 10:53
 */

namespace Home\Controller;


use Think\Controller;
use Think\Model;
use Think\Template\Driver\Mobile;

class WeiquanController extends Controller
{

    public function index()
    {
        $where = [];
        $Model = M('weiquan');
        $list = $Model->where($where)->select();
        $sum = $Model->where($where)->count();
//        p($list,1);
        $this->assign('list', $list);
        $this->assign('sum', $sum);
        $this->display();
    }

    public function add()
    {
        if (IS_POST) {
            $req = I('post.');
            if (!empty($req)) {
                $res = M('weiquan')->add($req);
                if ($res) {
                    $this->ajaxReturn([
                        'code'   => 200,
                        'msg'    => '[报名成功] 克拉二期的所有业主,我们是一个整体!'
                    ]);
                } else {
                    $this->ajaxReturn([
                        'code'   => 500,
                        'msg'    => '添加失败,请稍后重试!'
                    ]);
                }
            }
//            p($req,1);
        }
        $this->display();
    }
}