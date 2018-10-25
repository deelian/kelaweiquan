<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    public function welcome()
    {
        $this->display();
    }

    public function index(){
//        p(M('weiquan'));
        $this->display();
    }

    public function qList()
    {
        $where = [];
        $model = M('question');
        $list = $model->where($where)->select();
        $sum = $model->where($where)->count();
//        p($sum,1);
        $this->assign('list', $list);
        $this->assign('sum', $sum);
        $this->display();
    }

    public function qAdd()
    {
        if (IS_POST) {
            $req = I('post.');
            $now = time();
            if (!empty($req)) {
                $req = array_merge($req, [
                    'updatetime'    => $now,
                    'addtime'       => $now
                ]);
                $res = M('question')->add($req);
                if ($res) {
                    $this->ajaxReturn([
                       'code'   => 200,
                       'msg'    => '[提交成功] 热心如你,克拉因你更美丽!'
                    ]);
                } else {
                    $this->ajaxReturn([
                        'code'   => 500,
                        'msg'    => '添加失败,请稍后重试!'
                    ]);
                }
            }
            exit();
        }

        $this->display();
    }
}