<?php

namespace App\Cart;

class Cart
{
    /**
     * Create a new class instance.
     */
    public $items=[];//Lưu trữ các sản phẩm
    public $totalPrice=0;//Tổng giá tiền
    public $totalItem=0;//Tổng sản phẩm

    public function __construct()
    {
        $this->items=session('cart')?session('cart'):[];
        $this->totalPrice=$this->getTotalPrice();
        $this->totalItem=$this->getTotalItem();
    }
    
    //Tạo hàm thêm giỏ hàng
    public function Add($model,$sl=1)
    {
        $Id=$model->Id;
        //Nếu có sản phẩm rồi
        if(isset($this->items[$Id]))
        {
            $this->items[$Id]->soluong+=$sl;//Cộng thêm số lượng
        }
        else
        {
            //Khởi tạo giỏ hàng
            $item=[
           'id'=>$model->Id,
            'name'=>$model->ProName,
            'image'=>$model->Images,
            'gia'=>$model->Price,
            'soluong'=>$sl
            ];
            $this->items[$Id]=(object)$item;
        }
        //Gán giỏ hàng vào session
        session(['cart'=>$this->items]);
    }
    //Tạo hàm xóa giỏ hàng
    public function Delete($id)
    {
        if(isset($this->items[$id]))
        {
            //Xóa hàng khỏi giỏ hàng
            unset($this->items[$id]);
            //Lưu lại session
            session(['cart'=>$this->items]);
        }
    }
    //Tạo hàm update giỏ hàng
    public function Update($id,$sl=1)
    {
        if(isset($this->items[$id]))
        {
            $this->items[$id]->soluong=$sl;
        }
    }
    //Tạo hàm hủy đơn hàng
    public function Clear()
    {
        session(['cart'=>null]);
    }
    //Xây dựng phương thức tính tổng tiền
    protected function getTotalPrice()
    {
        $total=0;
        foreach($this->items as $item)
        {
            $total+=$item->soluong*$item->gia;
        }
        return $total;
    }
    protected function getTotalItem()
    {
        $total=0;
        foreach($this->items as $item)
        {
            $total+=$item->soluong;
        }
        return $total;
    }
}
