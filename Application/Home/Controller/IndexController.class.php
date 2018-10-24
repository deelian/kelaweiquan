<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

    private $qModel;
    private $wModel;

    public function __construct()
    {
        parent::__construct();
        $this->qModel = M('question');
        $this->wModel = M('weiquan');
    }

    public function index()
    {
//        p($this->qModel);
        $this->display();
    }

    public function addQuestion()
    {

    }

    public function weiquan()
    {

    }

    public function addWeiquan()
    {

    }
}