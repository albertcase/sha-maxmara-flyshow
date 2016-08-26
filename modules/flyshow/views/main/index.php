
<!-- Swiper -->
<div class="swiper-container swiper-container-h">
    <div class="swiper-wrapper" id="maxmaraBox">
        
    </div>
</div>

<span class="arr"></span>
<!-- Initialize Swiper -->
<script>

	
$(function(){

	var pagecode = <?php print json_encode($data, JSON_UNESCAPED_UNICODE); ?>,
		boxVal = {
			"allImg": [],
			"nav": []
		},
		contentVal = {
			"maxmaraBox": ""
		};

	contentVal["maxmaraBox"] = $.map(pagecode, function(a, b){
		boxVal["allImg"].push(a.img);
		boxVal["nav"].push(a.title);
		if(a.son){
			contentVal["album"+b] = $.map(a.son, function(c, d){
				boxVal["allImg"].push(c.img);
				return '<div class="swiper-slide"><img src="'+c.img+'" width="100%" /></div>';
			}).join("");

			return '<div class="swiper-slide"><div class="swiper-container swiper-container-v"><div class="swiper-wrapper" id="album'+b+'"><div class="swiper-slide"><img src="'+a.img+'" width="100%" /></div></div></div><div class="swiper-button-next"></div><div class="swiper-button-prev"></div></div>';
		}else{
			return '<div class="swiper-slide" id="album'+b+'"><img src="'+a.img+'" width="100%" /></div>';
		}

		
	}).join("");

	//console.log(boxVal);
	$.map(contentVal,function(f, g){
		//console.log(f + ":" + g);
		$("#" + g).append(f);
	})


	pfun.loadingFnDoing(boxVal["allImg"], function(e){

		var swiperH = new Swiper('.swiper-container-h', {
		    paginationClickable: true,
		    spaceBetween: 50,
		    direction: 'vertical'
		});
		var swiperV = new Swiper('.swiper-container-v', {
		    paginationClickable: true,
		    spaceBetween: 50
		});

	});

    
});






	
</script>


