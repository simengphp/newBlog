<?php
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2018/10/23
     * Time: 16:11
     */

namespace App\Http\Controllers\Website;


use App\Model\Website\Stack;
use Illuminate\Http\Request;

class StackController extends BaseController
{
    protected $model = null;
    public function __construct()
    {
        $this->model = new Stack();
    }

    public function stackList(Request $request)
    {
        /**获取贡献者*/
        $stack_list = $this->model->stackList(16,$request->all());
        return view('website.stack.stack', ['stack_list'=>$stack_list]);
    }
}