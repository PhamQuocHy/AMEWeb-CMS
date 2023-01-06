<style>
	* {
		box-sizing: inherit;
	}
	:root {
  --background: #4285f4;
  --icon-color: #344955;
  --width: 50px;
  --height: 50px;
  --border-radius: 100%;
  
}
	.wrapper {
  width: var(--width);
  height: var(--height);
  position: relative;
  border-radius: var(--border-radius);
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 6rem;
  margin-left: 98%;
  margin-top: -10%;
  position: fixed;
  bottom: 25px;
  right: 25px;

}
.wrapper .fab {
  background: var(--background);
  width: var(--width);
  height: var(--height);
  position: relative;
  z-index: 3;
  border-radius: var(--border-radius);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  display: flex;
  
  justify-content: center;
  align-items: center;
  animation: fab-animation-reverse 0.4s ease-out forwards;
}
.wrapper .fab::before, .wrapper .fab::after {
  content: "";
  display: block;
  position: absolute;
  border-radius: 4px;
  background: #fff;
}
.wrapper .fab::before {
  width: 4px;
  height: 18px;
}
.wrapper .fab::after {
  width: 18px;
  height: 4px;
}
.wrapper .fac {
  width: 32px;
  height: 150px;
  border-radius: 64px;
  position: absolute;
  
  z-index: 2;
  padding: 0.5rem 0.5rem;
  /* box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4); */
  opacity: 0;
  top: -110px;
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  align-items: center;
  /* margin-top: -40px; */
  transition: opacity 0.2s ease-in, top 0.2s ease-in, width 0.1s ease-in;
  
}
.wrapper .fac a {
  color: var(--icon-color);
  /* opacity: 0.8; */

}
.wrapper .fac a:hover {
  transition: 0.2s;
  opacity: 1;
  /* color: #30444f; */
}
.wrapper input {
  height: 100%;
  width: 100%;
  border-radius: var(--border-radius);
  cursor: pointer;
  position: absolute;
  z-index: 5;
  opacity: 0;
}
.wrapper input:checked ~ .fab {
  animation: fab-animation 0.4s ease-out forwards;
}
.wrapper input:checked ~ .fac {
  width: 32px;
  height: 150px;
  animation: fac-animation 0.4s ease-out forwards 0.1s;
  top: -180px;
  opacity: 1;
}

@keyframes fab-animation {
  0% {
    transform: rotate(0) scale(1);
  }
  20% {
    transform: rotate(60deg) scale(0.93);
  }
  55% {
    transform: rotate(35deg) scale(0.97);
  }
  80% {
    transform: rotate(48deg) scale(0.94);
  }
  100% {
    transform: rotate(45deg) scale(0.95);
  }
}
@keyframes fab-animation-reverse {
  0% {
    transform: rotate(45deg) scale(0.95);
  }
  20% {
    transform: rotate(-15deg);
  }
  55% {
    transform: rotate(10deg);
  }
  80% {
    transform: rotate(-3deg);
  }
  100% {
    transform: rotate(0) scale(1);
  }
}
@keyframes fac-animation {
  0% {
    transform: scale(1, 1);
  }
  33% {
    transform: scale(0.95, 1.05);
  }
  66% {
    transform: scale(1.05, 0.95);
  }
  100% {
    transform: scale(1, 1);
  }
} 
	.grid {
		width: 100%;
		display: block;
		padding: 0;
	}


	.row {
		display: flex;
		flex-wrap: wrap;
		margin-left: -12px;
		margin-right: -12px;
	}

	.col {
		padding-left: 12px;
		padding-right: 12px;
	}

	.l-6 {
		flex: 0 0 50%;
		max-width: 50%;
		margin: 10px 0;
	}

	.l-4 {
		flex: 0 0 33.33333%;
		max-width: 33.33333%;
		margin: 10px 0;
	}

	.pd-20 {
		padding: 20px 0;
	}

	.about-wrap {
		max-width: unset;
	}

	.wrap-content {
		padding: 20px 40px;
		background-color: #fff;
		box-shadow: 0px 1px 2px 0px rgb(0 0 0 / 30%);
		margin: 20px 0;
	}

	.wrap-content__noBG {
		/* padding: 20px 40px; */
		/* background-color: #fff;
		box-shadow: 0px 1px 2px 0px rgb(0 0 0 / 30%); */
		margin: 20px 0;
	}

	.flex-block {
		display: flex;
		align-items: center;

		justify-content: center;
	}

	.icon-noti {
		font-size: 60px;
		margin-right: 40px;
	}

	.sub-content {
		line-height: 18px;
		font-size: 15px;
		color: #555;
	}

	.noti-content {
		flex: 1;
	}

	.noti-content h3 {
		line-height: 2rem;
		margin: 0;
	}

	.title__col,
	.title {
		text-transform: uppercase;
		font-size: 15px;
	}

	.title__col {
		padding: 10px 0;

	}

	.item__block {
		height: 100%;
		overflow: hidden;
	}

	.title {
		/* text-transform: capitalize; */
		font-weight: 500;
		font-size: 18px;
		padding-top: 20px;
	}

	.quict__item {
		background-color: #fff;
		display: block;
		width: 100%;
		padding: 20px 0;
		color: #333;
		text-decoration: none;
		text-align: center;
		border: 2px solid transparent;
		overflow: hidden;
		box-shadow: 0px 1px 2px 0px rgb(0 0 0 / 30%);
	}

	.noti__col--block {
		background-color: #fff;
		display: block;
		width: 100%;
		height: 100%;
		padding: 20px 0;
		color: #333;
		text-decoration: none;
		text-align: center;
		overflow: hidden;
		box-shadow: 0px 1px 2px 0px rgb(0 0 0 / 30%);
	}

	.noti__col--list {
		min-height: 200px;
		padding: 0 20px;
	}

	.noti__social--list {}

	.noti__social--item {
		display: flex;
		align-items: center;
		justify-content: flex-start;
		text-decoration: none;
		color: #333;
		padding: 6px 0;
	}

	.social__img {
		width: 40px;
		height: 40px;
		margin-right: 20px;
	}

	.social__title {}

	.noti__col--item {
		text-decoration: none;
		color: #333;
		/* padding: 0; */
		display: flex;
		padding: 10px 0;
		align-items: center;
	}

	.noti__col--item:hover .noti__col--title h3 {
		color: var(--e-context-primary-color);
	}

	.noti__col--item+.noti__col--item {
		margin-top: 4px;
		/* padding-top: 10px; */
		border-top: 1px solid #eee;
	}

	.noti__col--img img {
		width: 50px;
		height: 50px;
		object-fit: cover;
		margin-right: 20px;

	}

	.noti__col--title h3 {
		font-size: 15px;
		line-height: 20px;
		margin: 0;
		overflow: hidden;
		display: -webkit-box;
		-webkit-box-orient: vertical;
		-webkit-line-clamp: 1;
		--webkit-user-select: none;
	}

	.quict__item:hover {
		color: transparent;
		border: 2px solid var(--e-context-primary-color);
	}

	.quict__item--img {
		text-align: center;
		margin-bottom: 20px;
	}

	.quict__item--img img {
		width: 60%;
		height: 160px;
		object-fit: contain;
	}


	.quict__item--title p {
		text-transform: capitalize;
		font-weight: 500;
		font-size: 18px;
		color: #333;
		margin: 4px;
	}

	.quict__item--link {
		display: flex;
		align-items: center;
		justify-content: center;
		color: var(--e-context-primary-color);
	}

	.quict__item--link p {
		margin: 0;
		text-transform: capitalize;
	}

	.quict__item--icon {
		position: relative;
		top: 1px;
	}

	.banner__item {
		height: 300px;
		object-fit: cover;
	}

	/* SLide */
	* {
		box-sizing: border-box;
		padding: 0;
		margin: 0;
	}

	.slider {
		max-width: 100%;
		margin: 20px auto;
		position: relative;
	}

	.slider-wrap {
		width: 100%;
		overflow: hidden;
		position: relative;
	}

	.slider-main {
		display: flex;
		align-items: center;
		position: relative;
		transition: transform 0.5s linear;
	}

	.slider-item {
		width: 100%;
		flex: 1 0 100%;
		cursor: pointer;
	}

	.slieder-img {
		width: 100%;
		/* border-radius: 8px; */
		height: 300px !important;
		object-fit: cover;
	}

	.btn-icon {
		width: 30px;
		height: 30px;
		padding: unset !important;
		/* display: none; */
		text-align: center;
	}

	.btn {
		font-size: 20px;
		background-color: #fff;
		position: absolute;
		padding: 10px 14px;
		border-radius: 50%;
	}

	.btn:hover {
		color: #BDC3C7;
		cursor: pointer;
	}

	.prev-btn {
		top: 50%;
		left: 0;
		transform: translateX(-50%);
	}

	.next-btn {
		top: 50%;
		right: 0;
		transform: translateX(50%);
	}

	.icon {
		position: relative;
		top: 4px;
	}

	.doct-slider {
		position: absolute;
		bottom: 40px;
		width: 100%;
		text-align: center;
	}

	.list-doct {
		padding: 0;
		list-style: none;
	}

	.doct-item {
		display: inline-block;
		width: 14px;
		height: 14px;
		background-color: #95A5A6;
		border-radius: 50%;
		margin: 0 6px;
		cursor: pointer;
		display: none;
	}

	.doct-item.active {
		background-color: #27AE60;
	}
</style>

<?php

/**
 * Our custom dashboard page
 */

/** WordPress Administration Bootstrap */
require_once(ABSPATH . 'wp-load.php');
require_once(ABSPATH . 'wp-admin/admin.php');
require_once(ABSPATH . 'wp-admin/admin-header.php');
?>

<?php
$getAPi = curl_init();
$mediaUrl = 'https://amedigital.vn/wp-json/wp/v2/media';
curl_setopt($getAPi, CURLOPT_URL, $mediaUrl);
curl_setopt($getAPi, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($getAPi);
// echo $resp;
if ($e = curl_error($getAPi)) {
	print_r($e);
} else {
	$listImage = json_decode($resp);
	// var_dump($decode);
}
curl_close($getAPi);
?>

<?php
$getAPi = curl_init();
$postUrl = 'https://amedigital.vn/wp-json/wp/v2/posts';
curl_setopt($getAPi, CURLOPT_URL, $postUrl);
curl_setopt($getAPi, CURLOPT_RETURNTRANSFER, true);

$resp = curl_exec($getAPi);
if ($e = curl_error($getAPi)) {
	print_r($e);
} else {
	$listPost = json_decode($resp);
}
curl_close($getAPi);
?>


<div class="wrap about-wrap">
	<div class="wrap-content flex-block">
	<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
	<lottie-player src="https://assets10.lottiefiles.com/packages/lf20_5bdohwx8.json"  background="transparent"  speed="1"  style="width: 100px; height: 100px; margin-left: -20px; padding-right: 20px;"  loop autoplay></lottie-player>
		<div class="noti-content">
			<h3><?php _e("You haven't finished setting up your site."); ?></h3>

			<div class="sub-content">
				<?php _e('Donec id elit non mi porta gravida at eget metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'); ?>
			</div>
		</div>
	</div>

	<div class="wrap-content">
		<h1 style="color: black; font-size: 30px; font-weight: 600; text-transform:uppercase;"><?php _e('Chào mừng bạn đến với trang quản trị AME WEB'); ?></h1>

		<div class="about-text">
			<?php _e('Donec id elit non mi porta gravida at eget metus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'); ?>
		</div>
	</div>

	<div class="wrap-content__noBG">
		<div class="grid">
			<div class="row">

				<div class="col l-6">
					<div class="item__block">
						<div class="title__col">
							<h3>
								Giới thiệu về AME WEBSITE
							</h3>
						</div>
						<div href="#" class="noti__col--block">
							<div href="#" class="noti__col--list">

							</div>
						</div>
					</div>
				</div>
				<div class="col l-6">
					<div class="item__block">
						<div class="title__col">
							<h3>
								Tin tức
							</h3>
						</div>
						<div class="noti__col--block">
							<div class="noti__col--list">
							<?php if (!empty($listImage)) {
							foreach ($listImage as $key => $item) {
						?>
							
						<?php
						

					}}?>
								<?php if (!empty($listPost)) {
									foreach ($listPost as $key => $post) {
										if ($key <= 2) {
								?>
								
											<a href="#" class="noti__col--item">
												<div class="noti__col--img">
													<img src=<?php echo $item->guid->rendered ?> alt="">
												</div>
												<div class="noti__col--title">
													<h3><?php echo $post->title->rendered ?></h3>
												</div>
											</a>
								<?php }
									}
								} ?>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>


	<div>
		<div class="title">
			<h3>
				Các chức năng
			</h3>
		</div>
		<div class="wrap-content__noBG">
			<div class="grid">
				<div class="row">
					<div class="col l-4">
						<a href="#" class="quict__item">
							<div class="quict__item--img">
								<img src=<?php echo plugins_url('/img/text.png', __FILE__) ?> />
							</div>
							<div class="quict__item--title">
								<p>Tùy biến nội dung</p>
							</div>
							<div class="quict__item--link">
								<p>
									<span>
										Xem
									</span>
									<i class="fa-solid fa-arrow-right-long quict__item--icon"></i>
								</p>
							</div>
						</a>
					</div>

					<div class="col l-4">
						<a href="#" class="quict__item">
							<div class="quict__item--img">
								<img src="<?php echo plugins_url('/img/code.png', __FILE__) ?>" />
							</div>
							<div class="quict__item--title">
								<p>Chèn code vào Website</p>
							</div>
							<div class="quict__item--link">
								<p>
									<span>
										Xem
									</span>
									<i class="fa-solid fa-arrow-right-long quict__item--icon"></i>
								</p>
							</div>
						</a>
					</div>

					<div class="col l-4">
						<a href="#" class="quict__item">
							<div class="quict__item--img">
								<img src="<?php echo plugins_url('/img/css.png', __FILE__) ?>" />
							</div>
							<div class="quict__item--title">
								<p>Thay đổi CSS</p>
							</div>
							<div class="quict__item--link">
								<p>
									<span>
										Xem
									</span>
									<i class="fa-solid fa-arrow-right-long quict__item--icon"></i>
								</p>
							</div>
						</a>
					</div>

					<div class="col l-4">
						<a href="#" class="quict__item">
							<div class="quict__item--img">
								<img src="<?php echo plugins_url('/img/image.png', __FILE__) ?>" />
							</div>
							<div class="quict__item--title">
								<p>Media </p>
							</div>
							<div class="quict__item--link">
								<p>
									<span>
										Xem
									</span>
									<i class="fa-solid fa-arrow-right-long quict__item--icon"></i>
								</p>
							</div>
						</a>
					</div>

					<div class="col l-4">
						<a href="#" class="quict__item">
							<div class="quict__item--img">
								<img src="<?php echo plugins_url('/img/user.png', __FILE__) ?>" />
							</div>
							<div class="quict__item--title">
								<p>User</p>
							</div>
							<div class="quict__item--link">
								<p>
									<span>
										Xem
									</span>
									<i class="fa-solid fa-arrow-right-long quict__item--icon"></i>
								</p>
							</div>
						</a>
					</div>

					<div class="col l-4">
						<a href="#" class="quict__item">
							<div class="quict__item--img">
								<img src="<?php echo plugins_url('/img/setting.png', __FILE__) ?> " />
							</div>
							<div class="quict__item--title">
								<p>Cài đặt</p>
							</div>
							<div class="quict__item--link">
								<p>
									<span>
										Xem
									</span>
									<i class="fa-solid fa-arrow-right-long quict__item--icon"></i>
								</p>
							</div>
						</a>
					</div>



				</div>
			</div>

		</div>
	</div>


	<div>
		<div class="wrap-content__noBG pd-20">
			<div class="slider">
				<div class="slider-wrap">
					<div class="slider-main">
						<?php if (!empty($listImage)) {
							foreach ($listImage as $item) {
						?>
								<div class="slider-item">
									<img src=<?php echo $item->guid->rendered ?> alt="" class="slieder-img">
								</div>
						<?php }
						} ?>
					</div>
				</div>
				<div class="btn btn-icon prev-btn">
					<i class="fa-solid fa-arrow-left-long icon icon-slider icon-slider-left"></i>
				</div>
				<div class="btn btn-icon next-btn">
					<i class="fa-solid fa-arrow-right-long icon icon-slider icon-slider-right"></i>
				</div>
				<div class="doct-slider">
					<ul class="list-doct">
						<?php if (!empty($listImage)) {
							foreach ($listImage as $key => $item) {
						?>
								<li data-index="<?php echo $key ?>" class="doct-item <?php if ($key == 0) echo 'active' ?>"></li>
						<?php }
						} ?>

					</ul>
				</div>
			</div>



		</div>
	</div>

	<!-- <div class="wrap-content__noBG pd-20">
		<div class="banner__item">
			<img src="https://duynh404.cf/api/files/view/ip14-pro-2880-80002-1920x533_1672068638.png" />

		</div>
	</div> -->

	<div class="wrap-content__noBG pd-20">
		<div class="grid">
			<div class="row">

				<div class="col l-6">
					<div class="item__block">
						<div class="title__col">
							<h3>
								THÔNG TIN LIÊN HỆ
							</h3>
						</div>
						<div href="#" class="noti__col--block">
							<div href="#" class="noti__col--list">

							</div>
						</div>
					</div>
				</div>
				<div class="col l-6">
					<div class="item__block">
						<div class="title__col">
							<h3>
								THEO DÕI CHÚNG TÔI
							</h3>
						</div>
						<div href="#" class="noti__col--block">
							<div href="#" class="noti__col--list">
								<div href="#" class="noti__social--list">
									<a href="https://www.facebook.com/amedigital.vn" class="noti__social--item">
										<div class="social__img">
											<img src=<?php echo plugins_url('/img/icon_face.png', __FILE__) ?> />
										</div>
										<div class="social__title">
											<p>AME Digital Marketing</p>
										</div>
									</a>
									<a href="https://www.youtube.com/channel/UC6NmmjmlmMznsrO-2AdTjQw" class="noti__social--item">
										<div class="social__img">
											<img src=<?php echo plugins_url('/img/icon_youtube.png', __FILE__) ?> />
										</div>
										<div class="social__title">
											<p>AME Digital</p>
										</div>
									</a>
									<a href="https://www.linkedin.com/company/amedigital/" class="noti__social--item">
										<div class="social__img">
											<img src=<?php echo plugins_url('/img/icon_likein.png', __FILE__) ?> />
										</div>
										<div class="social__title">
											<p>AME Digital</p>
										</div>
									</a>
									<a href="https://www.instagram.com/amedigital.vn/" class="noti__social--item">
										<div class="social__img">
											<img src=<?php echo plugins_url('/img/icon_insta.png', __FILE__) ?> />
										</div>
										<div class="social__title">
											<p>AME Digital Vn</p>
										</div>
									</a>
									<a href="https://www.linkedin.com/company/amedigital/" class="noti__social--item">
										<div class="social__img">
											<img src=<?php echo plugins_url('/img/icon_likein.png', __FILE__) ?> />
										</div>
										<div class="social__title">
											<p>AME Digital</p>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
		<div class="wrapper">
				<input type="checkbox" />
				<div class="icon" style="margin-top:-50px"><lottie-player src="https://assets3.lottiefiles.com/packages/lf20_KYGZ3gt17d.json"  background="transparent"  speed="1"  style="width: 80px; height: 80px;"  loop  autoplay></lottie-player></div>
				<div class="fac" style="margin-top: -50px">
					<a href="https://amedigital.vn"><img style="width: 40px; height: 40px; margin-bottom: 20px" src="<?php echo plugins_url('/img/icon-book.png', __FILE__) ?>"/></a>
					<a href="https://www.facebook.com/amedigital.vn"><img style="width: 40px; height: 40px; margin-bottom: 20px" src="<?php echo plugins_url('/img/icon-face.png', __FILE__) ?>"/></a>
					<a href="tel: 0292 8881 929"><img style="width: 40px; height: 40px; margin-bottom: 20px" src="<?php echo plugins_url('/img/icon-phone.png', __FILE__) ?>"/></a>
					<a href="https://www.facebook.com/messages/t/305273516225421"><img style="width: 40px; height: 40px;" src="<?php echo plugins_url('/img/icon-mess.png', __FILE__) ?>"/></a>
				</div>
					</div>
					</div>
</div>
	</div>
	

<footer>
	<script type="text/javascript">
		window.addEventListener('load', function() {
			const $ = document.querySelector.bind(document);
			const $$ = document.querySelectorAll.bind(document);
			const slider = $('.slider');
			const sliderMain = $('.slider-main');
			const nextBtn = $('.next-btn');
			const prevBtn = $('.prev-btn');
			const sliderItems = $$('.slider-item');
			const doctItem = $$('.doct-item');
			let positionX = 0;
			let index = 0;

			const sliderItemWidth = sliderItems[0].offsetWidth;
			const slidersItemLenght = sliderItems.length;
			const slidersLenght = sliderItemWidth * slidersItemLenght;



			nextBtn.onclick = function() {
				nextSlider();
			}

			prevBtn.onclick = function() {
				prevSlider();
			}

			setInterval(function() {
				nextSlider();
			}, 3000);

			sliderItems.forEach(function(sliderItem) {
				sliderItem.onclick = function() {
					nextSlider();
				}
			})

			doctItem.forEach(function(e) {
				e.onclick = function() {
					let docActive = Number(e.dataset.index);
					positionX = (-(docActive * sliderItemWidth) + sliderItemWidth);
					index = docActive - 1;
					nextSlider();
					console.log(positionX, index)
				}

			})

			function nextSlider() {
				index++;
				positionX -= sliderItemWidth;
				if (index >= slidersItemLenght) {
					index = 0;
					positionX = 0;
				}
				dotActiveSlider();
				sliderMain.style.transform = `translateX(${positionX}px)`;

			}

			function prevSlider() {
				index--;
				positionX += sliderItemWidth;
				if (index < 0) {
					index = slidersItemLenght - 1;
					positionX = -(slidersLenght - sliderItemWidth);
				}
				dotActiveSlider();
				sliderMain.style.transform = `translateX(${positionX}px)`;
			}

			function dotActiveSlider() {
				doctItem.forEach(function(e) {
					let docActive = Number(e.dataset.index);
					if (index === (docActive)) {
						$('.doct-item.active').classList.remove('active');

						e.classList.add('active')
					}

				})
			}
		})
	</script>
</footer>

<?php include(ABSPATH . 'wp-admin/admin-footer.php');
