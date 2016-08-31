
<div class="dreambox">

	<div class="burger">
		<div class="burger_con"></div>
	</div>
	<div class="menu" id="menu">
		<ul></ul>
	</div>

	<!-- Swiper -->
	<div class="swiper-container swiper-container-h">
	    <div class="swiper-wrapper" id="maxmaraBox">
	        
	    </div>
	</div>

	<span class="arr"></span>

</div>
<!-- Initialize Swiper -->
<script>

	
$(function(){
	function changeTitle(v){
		var $body = $('body');
        var $iframe = $('<iframe src="/favicon.ico"></iframe>');

        document.title = v;
        // hack在微信等webview中无法修改document.title的情况
        $iframe.on('load',function() {
          setTimeout(function() {
              $iframe.off('load').remove();
          }, 0);
        }).appendTo($body);
	}

	$(".burger").click(function(event){
		$(".burger").addClass("open");
		$(".menu").fadeIn();
		event.stopPropagation();
	})

	$(".swiper-container-h").on("touchstart", function(){
		if($(".burger").hasClass("open")){
			$(".burger").removeClass("open");
			$(".menu").hide();
		};
		event.stopPropagation();
	})


	var pagecode = <?php print json_encode($data, JSON_UNESCAPED_UNICODE); ?>,
		boxVal = {
			"allImg": [],
			"nav": []
		},
		contentVal = {
			"maxmaraBox": ""
		};
		//console.log(pagecode);
	contentVal["maxmaraBox"] = $.map(pagecode, function(a, b){
		boxVal["allImg"].push(a.img);
		boxVal["nav"].push(a.title);
		if(a.son){
			contentVal["album"+b] = $.map(a.son, function(c, d){
				boxVal["allImg"].push(c.img);
				return '<div class="swiper-slide"><div class="prolist"><img src="'+c.img+'" width="100%" /><span>'+c.comment+'</span></div></div>';
			}).join("");

			return '<div class="albumlist swiper-slide"><div class="swiper-container swiper-container-v"><div class="swiper-wrapper" id="album'+b+'" data-num="'+b+'"><div class="swiper-slide swiperCover"><img src="'+a.img+'" width="100%" /></div></div></div><div class="swiper-button-next albumArr'+b+'"></div><div class="swiper-button-prev albumArr'+b+'"></div></div>';
		}else{
			return '<div class="swiper-slide"><img src="'+a.img+'" width="100%" /></div>';
		}

		
	}).join("");

	//console.log(boxVal);
	$.map(contentVal,function(f, g){
		//console.log(f + ":" + g);
		$("#" + g).append(f);

	})

	//$("#maxmaraBox").html(contentVal["maxmaraBox"]);


	pfun.loadingFnDoing(boxVal["allImg"], function(e){
		var swiperH = new Swiper('.swiper-container-h', {
		    paginationClickable: true,
		    spaceBetween: 50,
		    direction: 'vertical',
		    pagination: '#menu ul',
		    paginationBulletRender: function (index, className) {
	            return '<li class="' + className + '">'+boxVal["nav"][index]+'</li>';
	        },
	        onSlideChangeEnd: function(swiper){
	        	//console.log(swiperV.length);
	        	if(swiperV){
	        		$.map(swiperV, function(v, k){
		        		swiperV[k].slideTo(1, 200, false);
		        	})
	        	}
	        	changeTitle(boxVal["nav"][swiper.activeIndex]);
        		//$(".albumlist .swiper-wrapper").attr("style", "transform: translate3d(-446px, 0px, 0px); transition-duration: 0ms;");
        	}
		});

		var swiperV = new Swiper('.swiper-container-v', {
		    paginationClickable: true,
		    spaceBetween: 50,
		    loop: true
		});

		$(".loading").fadeOut();

		$(".swiperCover").on("click", function(){
			var swiperNum = parseInt($(this).parent(".swiper-wrapper").attr("data-num")-1);
			//swiperV[swiperNum].slideTo(1, 600, false);  //切换到第一个slide，速度为1秒//切换到第一个slide，速度为1秒
			swiperV[swiperNum].slideTo(2, 200, false);
		})

	});

	

    
});






	
</script>


