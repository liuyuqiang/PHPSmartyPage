<?php
class Page
{
    public $count;      //结果总数
    public $page;       //当前页
    public $page_size;   //每页结果数
    public $page_count;  //翻页数
    public $base_url;    //url
    public $page_list_size;   //每翻页数
    public $result;     //结果数组集

    function __construct( $count , $page , $page_size , $page_list_size=6 , $base_url = false )
    {
        $this->count     = $count;
        $this->page      = $page;
        $this->page_size  = $page_size;
        $this->base_url   = !empty($base_url) ? $base_url : $this->getUrl();
        $this->page_list_size = $page_list_size;
    }

    function getUrl()
    {
        $url = preg_replace("/[&]page=\d/","", $_SERVER['REQUEST_URI']);
        $url = preg_replace("/\?page=\d[&]/","?", $url);
        $url = preg_replace("/\?page=\d/","?", $url);
        $url = rtrim($url, '&?');
        if(substr($url, -1)!='?')
        {
            if(substr($url, -1)=='/')
            {
                $url .='?';
            }
            else
            {
                $url .='&';
            }
        }
        return $url;
    }

    function getPageList()
    {
        $this->result['count'] = $this->count;
        $this->result['page'] = $this->page;
        $this->result['page_size'] = $this->page_size;
        $this->result['page_count'] = ceil($this->count/$this->page_size);
        //只有一页以下
        if($this->result['page_count']<=1)
        {
            $this->result['page_list'] = array();
        }
        else //一页以上
        {
            #前一页，第一页的算法
            $this->result['first'] = ($this->page == 1) ? 0 : 1;
            $this->result['pre'] = ($this->page == 1) ? 0 : 1;
            #后一页，最后一页的算法
            $this->result['next'] = ($this->page == $this->result['page_count'] ) ? 0 : 1;
            $this->result['last'] = ($this->page == $this->result['page_count'] ) ? 0 : 1;

            #起始
            $totalPage = $this->result['page_count'];
            $page_array = array();
            $num = $this->page-floor($this->page_list_size/2);
            if($num > 0)
            {
                if(($totalPage-$num) < $this->page_list_size)
                {
                    $tmp = $totalPage - $this->page_list_size;
                    $num = $tmp< 0 ? 1 : ++$tmp;
                }
            }
            else
            {
                $num = 1;
            }

            for($i=1; $i<=$this->page_list_size;$i++,$num++)
            {
                if($num > $totalPage) break;
                $page_array[$i]['page']= $num;
                if($num != $this->page)
                {
                    $page_array[$i]['link'] = 1;
                }
            }

            #分页导航列表
            $this->result['page_list'] = $page_array;
            $this->result['base_url'] = $this->base_url;
        }
    }
}