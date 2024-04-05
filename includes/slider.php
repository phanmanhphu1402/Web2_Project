<div class="slider">
		<div class="slide-Show-Container">
			<div class="slide-Show">
				<div class="slide-image">
					<img src="http://localhost/myPhoneShop/pic/picbanner/samsungbanner3.jpeg" alt="iphone 14 pro">
				</div>
				<div class="slide-detail">
					<h2>Iphone 14 promax</h2>
					<div class="slide-subinfo">Lorem ipsum dolor sit amet</div>
					<div class="slide-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio praesentium unde eligendi et aut vero eos non vitae itaque, eum hic porro. Animi dolores veniam sed nesciunt, perspiciatis, vel iste.</div>
					<div class="btn-shopping"><button>Shop now</button></div>
				</div>
			</div>
			<div class="slide-Show">
				<div class="slide-image">
					<img src="http://localhost/myPhoneShop/pic/picbanner/vivo.webp" alt="iphone 14 pro">
				</div>
				<div class="slide-detail">
					<h2>Iphone 14 promax</h2>
					<div class="slide-subinfo">Lorem ipsum dolor sit amet</div>
					<div class="slide-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio praesentium unde eligendi et aut vero eos non vitae itaque, eum hic porro. Animi dolores veniam sed nesciunt, perspiciatis, vel iste.</div>
					<div class="btn-shopping"><button>Shop now</button></div>
				</div>
			</div>
			<div class="slide-Show">
				<div class="slide-image">
					<img src="http://localhost/myPhoneShop/pic/picbanner/banner.jpg" alt="iphone 14 pro">
				</div>
				<div class="slide-detail">
					<h2>Iphone 14 promax</h2>
					<div class="slide-subinfo">Lorem ipsum dolor sit amet</div>
					<div class="slide-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio praesentium unde eligendi et aut vero eos non vitae itaque, eum hic porro. Animi dolores veniam sed nesciunt, perspiciatis, vel iste.</div>
					<div class="btn-shopping"><button>Shop now</button></div>
				</div>
			</div>
			<div class="slide-Show">
				<div class="slide-image">
					<img src="http://localhost/myPhoneShop/pic/picbanner/maxresdefault.jpg" alt="iphone 14 pro">
				</div>
				<div class="slide-detail">
					<h2>Iphone 14 promax</h2>
					<div class="slide-subinfo">Lorem ipsum dolor sit amet</div>
					<div class="slide-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio praesentium unde eligendi et aut vero eos non vitae itaque, eum hic porro. Animi dolores veniam sed nesciunt, perspiciatis, vel iste.</div>
					<div class="btn-shopping"><button>Shop now</button></div>
				</div>
			</div>
			<div class="slide-Show">
				<div class="slide-image">
					<img src="http://localhost/myPhoneShop/pic/picbanner/vivoslider4.jpg" alt="iphone 14 pro">
				</div>
				<div class="slide-detail">
					<h2>Iphone 14 promax</h2>
					<div class="slide-subinfo">Lorem ipsum dolor sit amet</div>
					<div class="slide-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio praesentium unde eligendi et aut vero eos non vitae itaque, eum hic porro. Animi dolores veniam sed nesciunt, perspiciatis, vel iste.</div>
					<div class="btn-shopping"><button>Shop now</button></div>
				</div>
			</div>
			<div class="slide-Show">
				<div class="slide-image">
					<img src="http://localhost/myPhoneShop/pic/picbanner/samsungslider3.jpg" alt="iphone 14 pro">
				</div>
				<div class="slide-detail">
					<h2>Iphone 14 promax</h2>
					<div class="slide-subinfo">Lorem ipsum dolor sit amet</div>
					<div class="slide-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio praesentium unde eligendi et aut vero eos non vitae itaque, eum hic porro. Animi dolores veniam sed nesciunt, perspiciatis, vel iste.</div>
					<div class="btn-shopping"><button>Shop now</button></div>
				</div>
			</div>
		
			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(1)">&#10095;</a>
			<div class="row">
				<div class="column">
				  <img class="demo cursor" src="http://localhost/myPhoneShop/pic/picbanner/samsungbanner3.jpeg" style="width:100%" onclick="currentSlide(1)">
				</div>
				<div class="column">
				  <img class="demo cursor" src="http://localhost/myPhoneShop/pic/picbanner/vivo.webp" style="width:100%" onclick="currentSlide(2)">
				</div>
				<div class="column">
				  <img class="demo cursor" src="http://localhost/myPhoneShop/pic/picbanner/banner.jpg" style="width:100%" onclick="currentSlide(3)">
				</div>
				<div class="column">
				  <img class="demo cursor" src="http://localhost/myPhoneShop/pic/picbanner/maxresdefault.jpg" style="width:100%" onclick="currentSlide(4)">
				</div>
				<div class="column">
				  <img class="demo cursor" src="http://localhost/myPhoneShop/pic/picbanner/vivoslider4.jpg" style="width:100%" onclick="currentSlide(5)" >
				</div>
				<div class="column">
				  <img class="demo cursor" src="http://localhost/myPhoneShop/pic/picbanner/samsungslider3.jpg" style="width:100%" onclick="currentSlide(6)" >
				</div>
			</div>
		</div>
	</div>
	<script>
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("slide-Show");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
	slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
	dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>