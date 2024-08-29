<?php 
require_once("../classes/Campuses.class.php");
$id=$_GET['id'];
// var_dump($id);exit;
$Campuses = new Campuses();
$allCampuses = $Campuses->getCampusbyid($id);
// var_dump($allCampuses);
// exit;
foreach ($allCampuses as $key){
    $name=$key['name'];
$location=$key['location'];}
    ?>

<!DOCTYPE html>
<html lang="en">
<?php require('common/head.php');?>
<style>
    /* slider section */
.slider {
    height: 100vh;
    margin-top: -50px;
    width: 100vw;
    overflow: hidden;
    position: relative;
}

.slider .list .item {
    width: 100%;
    height: 100%;
    position: absolute;
    inset: 0 0 0 0;
}

.slider .list .item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.slider .list .item .content {
    position: absolute;
    top: 20%;
    width: 1140px;
    max-width: 80%;
    left: 50%;
    transform: translateX(-50%);
    padding-right: 30%;
    box-sizing: border-box;
    color: #EEF7FF;
    text-shadow: 0 5px 10px rgba(0, 0, 0, 0.4);
}

.slider .list .item .content .title,
.slider .list .item .content .type {
    font-size: 5em;
    font-weight: bold;
    line-height: 1.3em;
}

.slider .list .item .type {
    color: #4D869C;
}

.slider .list .item .button {
    display: grid;
    grid-template-columns: repeat(2, 130px);
    grid-template-rows: 40px;
    gap: 5px;
    margin-top: 20px;
}

.slider .list .item .button button {
    border: none;
    background-color: #EEF7FF;
    font-family: Poppins;
    font-weight: 500;
    cursor: pointer;
    transition: 0.4s;
    letter-spacing: 2px;
    color: #4D869C;
}

.slider .list .item .button button:hover {
    letter-spacing: 3px;
}

.slider .list .item .button button:nth-child(2) {
    background-color: transparent;
    border: 1px solid #4D869C;
    color: #4D869C;
}

/* Thumbnail Section */
.thumbnail {
    position: absolute;
    bottom: 50px;
    left: 50%;
    width: max-content;
    z-index: 100;
    display: flex;
    gap: 20px;
}

.thumbnail .item {
    width: 150px;
    height: 220px;
    flex-shrink: 0;
    position: relative;
}

.thumbnail .item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 20px;
    box-shadow: 5px 0 15px rgba(0, 0, 0, 0.3);
}

/* nextPrevArrows Section */
.nextPrevArrows {
    position: absolute;
    top: 80%;
    right: 52%;
    z-index: 100;
    width: 300px;
    max-width: 30%;
    display: flex;
    gap: 10px;
    align-items: center;
}

.nextPrevArrows button {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #4D869C;
    border: none;
    color: #EEF7FF;
    font-family: monospace;
    font-weight: bold;
    transition: 0.5s;
    cursor: pointer;
}

.nextPrevArrows button:hover {
    background-color: #EEF7FF;
    color: #4D869C;
}

/* Animation Part */
.slider .list .item:nth-child(1) {
    z-index: 1;
}

/* animation text in first item */
.slider .list .item:nth-child(1) .content .title,
.slider .list .item:nth-child(1) .content .type,
.slider .list .item:nth-child(1) .content .description,
.slider .list .item:nth-child(1) .content .buttons {
    transform: translateY(50px);
    filter: blur(20px);
    opacity: 0;
    animation: showContent 0.5s 1s linear 1 forwards;
}

@keyframes showContent {
    to {
        transform: translateY(0px);
        filter: blur(0px);
        opacity: 1;
    }
}

.slider .list .item:nth-child(1) .content .title {
    animation-delay: 0.4s !important;
}

.slider .list .item:nth-child(1) .content .type {
    animation-delay: 0.6s !important;
}

.slider .list .item:nth-child(1) .content .description {
    animation-delay: 0.8s !important;
}

.slider .list .item:nth-child(1) .content .buttons {
    animation-delay: 1s !important;
}

/* Animation for next button click */
.slider.next .list .item:nth-child(1) img {
    width: 150px;
    height: 220px;
    position: absolute;
    bottom: 50px;
    left: 50%;
    border-radius: 30px;
    animation: showImage 0.5s linear 1 forwards;
}

@keyframes showImage {
    to {
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border-radius: 0;
    }
}

.slider.next .thumbnail .item:nth-last-child(1) {
    overflow: hidden;
    animation: showThumbnail 0.5s linear 1 forwards;
}

.slider.prev .list .item img {
    z-index: 100;
}

@keyframes showThumbnail {
    from {
        width: 0;
        opacity: 0;
    }
}

.slider.next .thumbnail {
    animation: effectNext 0.5s linear 1 forwards;
}

@keyframes effectNext {
    from {
        transform: translateX(150px);
    }
}

/* Animation for prev button click */
.slider.prev .list .item:nth-child(2) {
    z-index: 2;
}

.slider.prev .list .item:nth-child(2) img {
    animation: outFrame 0.5s linear 1 forwards;
    position: absolute;
    bottom: 0;
    left: 0;
}

@keyframes outFrame {
    to {
        width: 150px;
        height: 220px;
        bottom: 50px;
        left: 50%;
        border-radius: 20px;
    }
}

.slider.prev .thumbnail .item:nth-child(1) {
    overflow: hidden;
    opacity: 0;
    animation: showThumbnail 0.5s linear 1 forwards;
}

.slider.next .nextPrevArrows button,
.slider.prev .nextPrevArrows button {
    pointer-events: none;
}

.slider.prev .list .item:nth-child(2) .content .title,
.slider.prev .list .item:nth-child(2) .content .type,
.slider.prev .list .item:nth-child(2) .content .description,
.slider.prev .list .item:nth-child(2) .content .buttons {
    animation: contentOut 1.5s linear 1 forwards !important;
}

@keyframes contentOut {
    to {
        transform: translateY(-150px);
        filter: blur(20px);
        opacity: 0;
    }
}

/* Media Queries for Responsiveness */
@media screen and (max-width: 1200px) {
    .slider .list .item .content {
        width: 90%;
        padding-right: 20%;
    }
    .slider .list .item .content .title {
        font-size: 4em;
    }
    .slider .list .item .content .type {
        font-size: 3em;
    }
}

@media screen and (max-width: 992px) {
    .slider .list .item .content {
        width: 80%;
        padding-right: 10%;
    }
    .slider .list .item .content .title {
        font-size: 3em;
    }
    .slider .list .item .content .type {
        font-size: 2.5em;
    }
    .slider .list .item .button {
        grid-template-columns: repeat(2, 100px);
    }
}

@media screen and (max-width: 768px) {
    .slider .list .item .content {
        width: 90%;
        padding-right: 0;
        text-align: center;
    }
    .slider .list .item .content .title {
        font-size: 2.5em;
    }
    .slider .list .item .content .type {
        font-size: 2em;
    }
    .slider .list .item .button {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
    }
    .slider .list .item .button button {
        width: 100%;
    }
    .thumbnail {
        bottom: 20px;
        gap: 10px;
    }
    .thumbnail .item {
        width: 120px;
        height: 180px;
    }
}

@media screen and (max-width: 576px) {
    .slider .list .item .content .title {
        font-size: 1.8em;
    }
    .slider .list .item .content .type {
        font-size: 1.5em;
    }
    .thumbnail .item {
        width: 100px;
        height: 150px;
    }
    .nextPrevArrows {
        width: 200px;
        right: 0;
    }
    .nextPrevArrows button {
        width: 30px;
        height: 30px;
    }
}


        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Black overlay with 50% opacity */
            pointer-events: none; /* Allow clicks to pass through */
        }

</style>
<body class="index-page">

  <main class="main">

    <!-- Hero Section -->
    <section id="cumpus" class="campus section accent-background">
      
  <?php require('common/navbar.php');?>

    </section><!-- /Hero Section -->
  <br><br>
          <div class="container-fluid px-0">
    <div class="slider">


<div class="list">

    <div class="item">
    <div class="image-container">
        <img src="./assets/img/campus1.jpg" alt="Campus Image">
        <div class="overlay"></div>
    </div>
       

        <div class="content">
            <div class="title">Welcome to</div>
          
            <div class="type"><?php echo $name?></div>
            <div class="description">
               <?php echo $location ?>
            </div>
            <div class="button">
                <button>SEE MORE</button>
            </div>
        </div>
    </div>

    <div class="item">
    <div class="image-container">
        <img src="./assets/img/campus2.jpg" alt="Campus Image">
        <div class="overlay"></div>
    </div>
        <div class="content">
            <div class="title">MAGIC SLIDER</div>
            <div class="type">NATURE</div>
            <div class="description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, aut.
            </div>
          
        </div>
    </div>

    <div class="item">
    <div class="image-container">
        <img src="./assets/img/campus3.jpg" alt="Campus Image">
        <div class="overlay"></div>
    </div>

        <div class="content">
            <div class="title">MAGIC SLIDER</div>
            <div class="type">PLANT</div>
            <div class="description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, aut.
            </div>
            <div class="button">
                <button>SEE MORE</button>
            </div>
        </div>
    </div>

    <div class="item">
    <div class="image-container">
        <img src="./assets/img/campus4.jpg" alt="Campus Image">
        <div class="overlay"></div>
    </div>

        <div class="content">
            <div class="title">MAGIC SLIDER</div>
            <div class="type">NATURE</div>
            <div class="description">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti temporibus quis eum consequuntur voluptate quae doloribus distinctio. Possimus, sed recusandae. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi, aut.
            </div>
            <div class="button">
                <button>SEE MORE</button>
            </div>
        </div>
    </div>

</div>


<div class="thumbnail">

    <div class="item">
        <img src="./assets/img/campus1.jpg" alt="">
    </div>
    <div class="item">
        <img src="./assets/img/campus2.jpg" alt="">
    </div>
    <div class="item">
        <img src="./assets/img/campus3.jpg" alt="">
    </div>
    <div class="item">
        <img src="./assets/img/campus4.jpg" alt="">
    </div>

</div>


<div class="nextPrevArrows">
    <button class="prev"> < </button>
    <button class="next"> > </button>
</div>


</div>
          </div>
  </main><br>
<?php require('./common/footer.php')
?>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
  <?php require('./common/scripts.php')
?>

</body>

</html>
<script>let nextBtn = document.querySelector('.next')
let prevBtn = document.querySelector('.prev')

let slider = document.querySelector('.slider')
let sliderList = slider.querySelector('.slider .list')
let thumbnail = document.querySelector('.slider .thumbnail')
let thumbnailItems = thumbnail.querySelectorAll('.item')

thumbnail.appendChild(thumbnailItems[0])

// Function for next button 
nextBtn.onclick = function() {
    moveSlider('next')
}


// Function for prev button 
prevBtn.onclick = function() {
    moveSlider('prev')
}


function moveSlider(direction) {
    let sliderItems = sliderList.querySelectorAll('.item')
    let thumbnailItems = document.querySelectorAll('.thumbnail .item')
    
    if(direction === 'next'){
        sliderList.appendChild(sliderItems[0])
        thumbnail.appendChild(thumbnailItems[0])
        slider.classList.add('next')
    } else {
        sliderList.prepend(sliderItems[sliderItems.length - 1])
        thumbnail.prepend(thumbnailItems[thumbnailItems.length - 1])
        slider.classList.add('prev')
    }


    slider.addEventListener('animationend', function() {
        if(direction === 'next'){
            slider.classList.remove('next')
        } else {
            slider.classList.remove('prev')
        }
    }, {once: true}) // Remove the event listener after it's triggered once
}</script>