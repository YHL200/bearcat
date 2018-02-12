<?php

class IndexController extends CommonController
{
    /***
     * 显示首页的模板
     */
    public function index()
    {
//      对留言人进行筛选
        $user = Factory::M('Index');
        $res=$user->sel();
//        echo "<pre/>";
       $res = $this->reform_arr($res);

          $this->assign('res',$res);
         $this->display('_index.html');

      }


    /**
     * @brief   reform_arr  重组数组
     * --------------------------------------------
     *  $arr = array(
     *              array('line_id'  =>  11, 'title'    =>  '标题1',),
     *              array('line_id'  =>  22, 'title'    =>  '标题2',),
     *          );
     *  $new_arr = $this->share->reform_arr($arr);
     * ----得到------------------------------------
     *  array(
     *          11=>array('line_id'  =>  11, 'title'    =>  '标题1',),
     *          22=>array('line_id'  =>  22, 'title'    =>  '标题2',),
     *      );
     * --------------------------------------------
     * @Param   $arr
     * @Param   $field
     *
     * @Returns Array
     */
    public function reform_arr($arr = array(array('id'=>1, 'other'=>''),), $field = 'id')
    {
        $new_arr = array();
        if (!is_array($arr)) {
            return $new_arr;
        }
        foreach ($arr as $av) {
            if (!is_array($av)) {
                break;
            }
            if (!array_key_exists($field, $av)) {
                break;
            }
            if (!isset($new_arr[$av[$field]])) {
                $new_arr[$av[$field]] = $av;
            }
        }
        return $new_arr;
    }


}

?>