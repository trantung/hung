@include('hung.header')
<div class="layui-container">
	<div class="layui-main">

<div class="slider_khach_hang">
	<div class="item active">
		<div class="images_kh">
			<img src="config/TRH21.jpg">
		</div>
		<div class="contebt_kh">
			<span>Bic thủy từ đồng tháp vừa đặt vòng <span>
			<i>(5 phút trước)</i>
		</div>
	</div>
	<div class="item">
		<div class="images_kh">
			<img src="config/TRH21.jpg">
		</div>
		<div class="contebt_kh">
			<span>Anh long từ đồng tháp vừa đặt vòng </span>
			<i>(9 phút trước)</i>
		</div>
	</div>
	<div class="item">
		<div class="images_kh">
			<img src="config/TRH21.jpg">
		</div>
		<div class="contebt_kh">
			<span>Chị Hằngtừ đồng tháp vừa đặt vòng </span>
			<i>(6 phút trước)</i>
		</div>
	</div>
	<div class="item">
		<div class="images_kh">
			<img src="config/TRH21.jpg">
		</div>
		<div class="contebt_kh">
			<span>Bic thủy từ đồng tháp vừa đặt vòng </span>
			<i>(9 phút trước)</i>
		</div>
	</div>
	<div class="item">
		<div class="images_kh">
			<img src="config/TRH21.jpg">
		</div>
		<div class="contebt_kh">
			<span>Chị Thắm từ đồng tháp vừa đặt vòng </span>
			<i>(10 phút trước)</i>
		</div>
	</div>
	
</div>
<script>
jQuery(function() {

  
  // Loop the notification
  (function loop() {
      var rand = Math.round(Math.random() * 5000 ) + 8000;
      setTimeout(function() {
        changeNotification();
        loop();  
      }, rand);
  }());

  // Change notification
  function changeNotification() {
    showNotification();
    setTimeout(function() {
      hideNotification();
    }, 6000) // duration
  }
  
  // Show notification
  function showNotification() {
    jQuery(".slider_khach_hang").addClass("active");

    if(jQuery('.slider_khach_hang .item:first-child').hasClass('active')  ){
	 	jQuery('.slider_khach_hang').find('.item.active').next().addClass('active');
	   	jQuery('.slider_khach_hang').find('.item.active').prev().removeClass('active');
    }else if(jQuery('.slider_khach_hang .item:last-child').hasClass('active') ){
    	jQuery('.slider_khach_hang').find('.item.active').next().removeClass('active');
	   	jQuery('.slider_khach_hang .item:first-child').addClass('active');
	   	jQuery('.slider_khach_hang .item:last-child').removeClass('active');
    }else{
    	jQuery('.slider_khach_hang').find('.item.active').next().addClass('active');
	   	jQuery('.slider_khach_hang').find('.item.active').prev().removeClass('active');
    }

  }
  
  // Hide notification
  function hideNotification() {
    jQuery(".slider_khach_hang").removeClass("active");
    jQuery('.slider_khach_hang .item').first().remove('active');
  }

});
</script>

<style>
	.slider_khach_hang{
		position: relative;
		z-index: 9999999999999999;
		left: -100%;
		transition: all 2s ease;
		opacity: 0;
	}
	.slider_khach_hang.active{
		left: 0;
		opacity: 1;
	}
	
		.slider_khach_hang .items span{
			display: block;
			text-transform: uppercase;
		}

.contebt_kh {

    max-width: 200px;

}

.contebt_kh span {

    color: 

    #F7BC3E;
    text-transform: uppercase;
    display: block;
    padding: 0 15px;

}
	.slider_khach_hang .item.active{
		opacity: 1;
	}
	.slider_khach_hang .item {
	    background: 

	    #07519B;
	    width: 400px;
	    position: absolute;
	    top: 0;
	    left: 0;
	    opacity: 0;
	    display: flex;
	    padding: 10px;
	    max-width: 248px;

	}
		.slider_khach_hang .item img{
			min-width: 60px;
		}
	.contebt_kh i {
	    color:   #fff; 
	    padding: 5px 10px;
	    display: block;

	}
	
</style>













		<!-- <div class="swiper-container">
			<div class="swiper-wrapper"> 
				<iframe width="100%" height="" src="{{ $config->link_video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div> -->
		 <div class="swiper-container">
            <div class="swiper-wrapper"> 
                <div class="item">
                    <iframe width="100%" height="auto" src="https://www.youtube.com/embed/zxqfZ2e6BNM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="item">
                   <iframe width="100%" height="auto" src="https://www.youtube.com/embed/zxqfZ2e6BNM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div> 
            </div>
        </div>

		<div class="layui-product-info">
			<div class="layui-product-meta">
				<h1 class="layui-product-name">{{$config->text_header}}</h1>

				<div class="layui-product-price"> 
					<span class="market-price"> <del>{{$config->price_header}}</del> </span>
					<span class="sale-price"> {{$config->sale_price_header}}</span>
				</div>
			</div>

			<div class="layui-buys">
				<span class="layui-right btn-100 ">{{$config->text_header_common}}</span>
				<span class="layui-right btn-100 ">{{$config->text_header_common}}</span>
				<span class="layui-right btn-100 ">{{$config->text_header_common}}</span>
			</div>
			<hr>
		</div>

		<div class="layui-product-info">
			<div class="layui-product-size">
				<div class="layui-product-images"> <img src="{{ !empty($config->image_body) ? url($config->image_body) : NO_IMG }}" alt="" /> </div>
			</div>
		</div>

		<!--  slider tesmon -->

		<div class="layui-product-info infor-bottom">
			<h2 class="title_tesmon">Đánh giá của khách hàng</h2>
			<div class="tesmon_items">
				<div class="tesmon_item">
					<figure>
						<img src="config/cam-nhan-khach-hang.jpg" alt="cảm nhận khách hàng">
					</figure>
				</div>
				<div class="tesmon_item">
					<figure>
						<img src="config/cam-nhan-khach-hang.jpg" alt="cảm nhận khách hàng">
					</figure>
				</div>
				<div class="tesmon_item">
					<figure>
						<img src="config/cam-nhan-khach-hang.jpg" alt="cảm nhận khách hàng">
					</figure>
				</div>
				<div class="tesmon_item">
					<figure>
						<img src="config/cam-nhan-khach-hang.jpg" alt="cảm nhận khách hàng">
					</figure>
				</div>
				<div class="tesmon_item">
					<figure>
						<img src="config/cam-nhan-khach-hang.jpg" alt="cảm nhận khách hàng">
					</figure>
				</div>
			</div>
		</div>

		
		
		<div class="layui-footer layui-product-footer">
			<div class="layui-buy">
				<a href="{{$config->message_to}}"><span class="layui-right" style="margin-right: 2%;">{{$config->text_footer_left}}</span></a>
				<a href="{{ action('LandingController@getBuy') }}" class="layui-btn layui-btn-danger layui-btn2" style="text-decoration:none"><span class="layui-right">{{$config->text_footer_right}}</span></a>
			</div>
		</div>
		
		<div id="totop"></div>
	
	<script type="text/javascript">
		function chooseProduct(product_id)
		{
			$.ajax({
		        url: "/ajax/product",
		        type: "post",
		        data: {
		        	product_id : product_id
		        } ,
		        success: function (data) {
		        	console.log(data);
		        	$('#remove_product').remove();
		        	// $('#number_default').remove();
		        	// $('#number_default').val() = 1;
		        	// $('input[name="number"]').val(1);
		           var text = '<input id="price" type="hidden" name="price" value="'+data['price']+'">' + '<input id="color" type="hidden" name="product_id" value="'+product_id+'">'+
		           '<input type="hidden" id="price_first" name="price_first" value="'+data['price']+'">'
		           ;
					$('#input-hidden').html(text);               

		        },
		        error: function(jqXHR, textStatus, errorThrown) {
		           console.log(textStatus, errorThrown);
		        }
		    });
		}

	</script>
	<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '192099611408702'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=192099611408702&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
@include('hung.footer')


	
