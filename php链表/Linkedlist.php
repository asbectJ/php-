<?php

/**
 * Created by PhpStorm.
 * User: tjj
 * Date: 18-1-15
 * Time: 上午10:45
 */
class link_list
{


    private $data;
    private $next; //下一指针
    private $pre; //前一指针

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
        $this->pre = null;
    }

    public function setNext($next)
    {
        $this->next = $next;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setPre($pre)
    {
        $this->pre = $pre;
    }

    public function getPre()
    {
        return $this->pre;
    }

    public function setData($data)
    {
        return $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    //顺序访问链表
    public function visitLinkList($head)
    {
        if ($head == null) {
            return;
        }
        while ($head) {
            print($head->data);
            $head = $head->next;
        }
        return;
    }

    //顺序反转链表，三指针法
    public function revLinkList1($head)
    {

        if (!$head->next || !$head) {
            return $head;
        }

        $cur = $head;
        $pre = $head;

        $next = $cur->next;
        $cur = $next;

        while ($cur) {
            // var_dump($cur);
            $next = $next->next;
            $cur->next = $pre;
            $pre = $cur;
            $cur = $next;
        }
        $head->next = null; //原来的头结点变成最后一个
        return $pre;
    }

    //递归法 反转
    public function revLinkList2($head)
    {

        if (!$head->next) {
            return $head;
        }
        $ret = $this->revLinkList2($head->next);
        $head->next->next = $head;
        $head->next = null;
        return $ret;
    }

    //删除倒数第N个结点：设置两个指针，第一个先走，第二个到和第一个相差N的时候开始走
    public function delNNote($head, $N)
    {
        if ($head == null) {
            return $head;
        }
        $i = 0;
        $result = $cur = $head;
        $pre_result = null;
        while ($cur->next) {
            $i++;
            if ($i >= $N) {
                $pre_result = $result; //要删除结点的前一个结点
                $result = $result->next; //result为要删除的结点
            }
            $cur = $cur->next;
        }
        if ($i == 1) { //只有一个结点,
            $head = null;
        } elseif ($i == $N - 1) { //删除的为第一个结点
            $head = $head->next;
        } elseif ($pre_result && $result) {
            $pre_result->next = $result->next;
            $result->next = null;
        }
        return $head;
    }
}

$l1 = new link_list('L5');
$l2 = new link_list('L2');
$l3 = new link_list('L3');
$l4 = new link_list('L2');
$l5 = new link_list('L5');


$l1->setNext($l2);
$l2->setNext($l3);
$l3->setNext($l4);
$l4->setNext($l5);


$l1->visitLinkList($l1);
echo '<br>';

$revl = $l1->delNNote($l1, 4);
$l1->visitLinkList($revl);
echo '<br>';










