

<script>
var pagecode = <?php print json_encode($data, JSON_UNESCAPED_UNICODE); ?>;
console.log(pagecode);
</script>
<!-- Swiper -->
<div class="swiper-container swiper-container-h">
    <div class="swiper-wrapper">
        <div class="swiper-slide">Horizontal Slide 1</div>
        <div class="swiper-slide">
            <div class="swiper-container swiper-container-v">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">Vertical Slide 1</div>
                    <div class="swiper-slide">Vertical Slide 2</div>
                    <div class="swiper-slide">Vertical Slide 3</div>
                    <div class="swiper-slide">Vertical Slide 4</div>
                    <div class="swiper-slide">Vertical Slide 5</div>
                </div>
                <div class="swiper-pagination swiper-pagination-v"></div>
            </div>
        </div>
        <div class="swiper-slide">Horizontal Slide 3</div>
        <div class="swiper-slide">Horizontal Slide 4</div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination swiper-pagination-h"></div>
</div>

<!-- Initialize Swiper -->
<script>
	var swiperH = new Swiper('.swiper-container-h', {
	    pagination: '.swiper-pagination-h',
	    paginationClickable: true,
	    spaceBetween: 50,
	    direction: 'vertical'
	});
	var swiperV = new Swiper('.swiper-container-v', {
	    pagination: '.swiper-pagination-v',
	    paginationClickable: true,
	    spaceBetween: 50
	});
</script>


