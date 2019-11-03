@include('hung.header')
      <div class="layui-container">
        <h1 class="title_oder"> Chi tiết thanh toán</h1>
        <div class="layui-main" style="padding-bottom: 0;">
          <!-- <form class="layui-form layui-form-pane" name="addorder" action="http://localhost/ionlinei.com/thong-bao.php" method="POST"> -->
            {{ Form::open(array('action' => array('OrderController@order'), 'method' => "POST", 'class' => 'layui-form layui-form-pane')) }}
            <input type="hidden" name="title" value="{{$product->text}}">
            <input type="hidden" name="code" value="{{$product->code}}">
            <input type="hidden" name="color" value="{{$product->color}}">
            <input type="hidden" name="number" value="{{$number}}">
            <input type="hidden" name="product_id" value="{{$product->id}}">
          	<div class="newAddress">
	            <div class="layui-form-item">
	              	<label> <b>Họ Và tên </b><span style="color: red">*</span> <i>(bắt buộc)</i></label>
	                <input type="text" name="fullname" lay-filter="name" autocomplete="off" class="layui-input" placeholder="Họ và tên" id = "ab_hoten_1553008285380">
	            </div>
	            <div class="layui-form-item">
	              	<label><b> Số điện thoại</b><span style="color: red">*</span> <i>(bắt buộc)</i></label>
	                <input type="text" name="phone" autocomplete="off" class="layui-input" placeholder="Số điện thoại" id ="ab_sodt_1553008285380">
	            </div>
	            <div class="layui-form-item">
	              	<label><b> Địa chỉ cụ thể</b><span style="color: red">*</span> <i>(bắt buộc)</i></label>
	              	<span class="note"><i>( Chú ý: địa chỉ càng cụ thể, nhân viên giao hàng càng dễ tìm)</i></span>
	              	<textarea id="address" placeholder=" Nhập địa chỉ..."></textarea>
	          	</div>
	          	<h2>Gi chú của khách hàng</h2>
	          	<div class="layui-form-item">
	              	<span class="note"><i>(không bắt buộc)</i></span>
	              	<textarea id="content" placeholder="Ghi chú..."></textarea>
	          	</div>
	   
          	</div>
           <h2 class="title_oders" style="font-weight: bold">Đơn hàng của bạn</h2>
          <div class="cartItems">
            <ul>
              <li class="list-item">
                <div class="item-inner" style="overflow:hidden;">
                  <div class="item-thumb"><img src="{{$product->image_url}}"></div>
                  <div class="item-info">
                    <h4 class="title">{{$product->text}}</h4>
                    <?php
                   
                          function format_price($money, $cur){
                              $str = "";
                              if($money != 0){
                                  $num = (float)$money;
                                  //$str = sprintf("%01.0d", $num);
                                  $str = number_format($num,0,'.',',');
                                  $str .= $cur;
                                  $str = "<span>".$str."</span>";
                              }
                              return $str;
                          }

                           // // $n = $_GET["n"]; 
                           // $n = 8; 
                           // // $color = $_GET["color"];
                           // $color = 'xanh';
                           // $gia = 250000;
                           $total_price =  $number*$product->price;
                           $discount_number = $discount->number;
                           if ($number >= $discount_number) {
                            $percent = $discount->percent;
                            $money_discount = $total_price * $percent/100;
                            $money_pay =  $total_price - $money_discount;
                           } else {
                            $money_discount = 0;
                            $money_pay =  $total_price;
                            $percent = 0;
                           }
                           
                      ?>
                    <!-- <p class="size">{{ $product->color }}-</p> -->
                    <p class="price"><!-- {{$product->price}} x --> {{$number}}</p>
                  </div>
                </div>
              </li>
            </ul>

          </div>
          <div class="cartOrder">
            <span id="allmoney">Giá trị đơn hàng<span> <?php echo  format_price($total_price, 'VNĐ'); ?> </span></span>
            <ul class="checkout-money" style="overflow: hidden;">
              <li class="item-money">{{$config->text_discount_payment}} <span>{{$percent}}%</span></li>
              <li class="item-money text-center" id="yf">Miễn phí giao hàng</li>
              <li class="item-money">Tổng tiền <span class="price_total"><?php echo  format_price($money_pay, 'VNĐ'); ?></span></li>
            </ul>
            <input type="hidden" name="total_price" value="{{$total_price}}">
            <input type="hidden" name="money_pay" value="{{$money_pay}}">
              <p class="thong_b">
          Bạn đang mua sắm an toàn.</br> Toàn bộ thông tin của khách hàng đặt tại trang Web này đều được bảo mật tuyệt đối.</br>
          Xin cảm ơn
          	
          </p>
          </div>

         
          <div class="cart-footer">
            <!-- <a id="sbm" href="http://localhost/ionlinei.com/thong-bao.php?n=<?php //echo $tong_tien ; ?> ">Xác nhận đặt hàng</a> -->
            <button id="button" type="submit" class="layui-btn btn_vipshop layui-btn-danger">Xác nhận đặt hàng</button>
          </div>
        <!-- </form> -->
        {{ Form::close() }}
      
        <!-- <div class="timetips layui-row">
          <ul>
            <li style="text-align: center; width:100%; color: #000000">{{$config->text_footer_order}}</li>
          </ul>
        </div> -->
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function submitAbit()
    {
      $.ajax({
            url: "https://new.abit.vn/invoices/createInvoiceFromPartner/2/vinstore/Zxb9yNn2TC5fTXL",
            type: "post",
            data: [
              {
                "name": "Hoang Xuan Du",
                "telephone": "0123456789",
                "name_receiver": "Mr Du",
                "invoicestatus": "AutoCreated",
                "city": "",
                "district": "",
                "address": "203 Minh Khai",
                "note": "",
                "hinhthucvc": "Chuyenthuong",
                "discount_percent": "0.000",
                "discount_amount": "0.000",
                "s_h_amount": "0.000",
                "ghichu1": "",
                "ghichu2": "",
                "notevanchuyen": "",
                "giamgia": "0",
                "phuthu": "0",
                "phivanchuyen": "0",
                "adjustment": "0.000",
                "taxtype": "individual",
                "deposits": 0,
                "subtotal": 450000,
                "taxtotal_invoice": "0.000",
                "total": 450000,
                "accountid": 0,
                "list_pageitem": "289582808317941",
                "listProduct": [
                    {
                        "price": "250000",
                        "amount": "2",
                        "productName": "SP Xoay 3 vòng",
                        "productcode": "xoay-3-vong11",
                        "weight": "100",
                        "discount_percent_product": "0",
                        "discount_amount_product": "0",
                        "tax1": "0",
                        "qtyinstock": "0"
                    },
                    {
                        "price": "298000",
                        "amount": "3",
                        "storeId": 1,
                        "productName": "Giày Boot Nam Cao Cổ Khâu Đế Màu Đen Da Sần M89-38",
                        "productcode": "M89-38222",
                        "weight": "100",
                        "discount_percent_product": "0",
                        "discount_amount_product": "0",
                        "tax1": "0",
                        "qtyinstock": "0"
                    }
                ]
            }
            ] ,
            success: function (data) {
              console.log('tunglaso1');
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    }

  </script>

@include('hung.footer')
