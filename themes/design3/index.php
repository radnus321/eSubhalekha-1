<?php 
// errors(1);


$wedding = new Wedding();
$weddingData = $wedding->getWedding($_REQUEST['id'], $_REQUEST['lang']);

$story = json_decode($weddingData['story'], true);
$timeline = json_decode($weddingData['timeline'], true);

$gallery = new Gallery();
$eventsGallery=$gallery->getEventGallery($_REQUEST['id']);
$preweddingGallery=$gallery->getPreWedGallery($_REQUEST['id']);

function getImgURL($name){
  $gallery = new Gallery();
  $row=$gallery->getGalleryImg($_REQUEST['id'],$name);

  if($row['imageURL']){
    return $row['imageURL'];
  }
  else{
    return false;
  }
  
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?= $weddingData['groomName'] ?> & <?= $weddingData['brideName'] ?> </title>
    <link rel="stylesheet" href="./index.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lenis@1.0.45/dist/lenis.min.js"></script>

    <style>
      @import url("https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=La+Belle+Aurore&family=League+Spartan:wght@100..900&family=Orbitron:wght@400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Public+Sans:ital,wght@0,100..900;1,100..900&family=Staatliches&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=La+Belle+Aurore&family=Orbitron:wght@400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Staatliches&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap");
      @import url("https://fonts.googleapis.com/css2?family=Julius+Sans+One&family=La+Belle+Aurore&family=Orbitron:wght@400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Public+Sans:ital,wght@0,100..900;1,100..900&family=Staatliches&family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap");
    </style>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
    <link rel="stylesheet" href="./index.css" />
    <style>
      #container {
        position: relative;
        width: 351px;
        height: 618px;
      }
  
      .path-div {
        position: absolute;
        transform: translate(-50%, -50%);
      }
  
      .circle {
        width: 90px;
        height: 90px;
        background-color: #fff;
      
        border-radius: 50%;
      }
    </style>
  </head>
  <body
    class="w-screen h-auto relative normalfont flex flex-col overflow-x-hidden bg-[#F9F3E4]"
  >
    <nav
      class="h-[100px] bg-[#A16772] text-sm text-[#F9F3E4] w-full flex justify-between items-center px-3 sm:px-5 lg:px-[50px] normalfont sticky z-40 top-0 left-0"
    >
    
      <ul class="flex justify-center w-full sm:w-auto items-center gap-[40px] relative ">
        <h1 class="absolute sm:hidden -top-[30px] right-[50%] translate-x-[50%] text-xl"><?= $weddingData['groomName'] ?>&<?= $weddingData['brideName'] ?></h1>
        <li class="hidden sm:block"><?= $weddingData['groomName'] ?>&<?= $weddingData['brideName'] ?></li>
        <li>gallery.</li>
        <li>venue.</li>
        <li>brideandgroom.</li>
        <button class="absolute sm:hidden top-[20px] px-3 py-1 bg-[#EDD6C1] text-[#A16772]">
            save the date
        </button>
      </ul>
      <ul class="flex flex-col gap-1 hidden sm:block">
        <li>
          <button class="px-3 py-1 bg-[#EDD6C1] text-[#A16772]">
            save the date
          </button>
        </li>
        <li><p>October 12 | 2024</p></li>
      </ul>
    </nav>
    <div
      class="h-[600px] sm:h-[700px] gap-[30px] flex flex-col justify-center items-center bg-[#A16772] relative"
    >
      <div class="w-[200px]">
        <p class="text-center text-[#EDD6C1] text-xs lg:text-sm">
          Yeah, its happening
        </p>
      </div>
      <div
        class="w-[400px] sm:w-full px-auto flex flex-col sm:flex-row justify-center items-center relative cursivefont gap-[90px] sm:gap-[130px] lg:gap-[250px] lg:my-[150px] text-[#EDD6C1]"
      >
        <p
          class="text-left sm:text-center text-[40pt] sm:text-[50pt] pl-[50px] w-full sm:w-auto sm:pl-0"
        >
          <?= $weddingData['brideName'] ?>
        </p>

        <img
          class="absolute h-[180px] lg:h-[350px] top-[50%] right-[50%] translate-x-[50%] -translate-y-[55%]"
          src="<?php themeAssets('design3','images/herodecor.png') ?>"
          alt=""
        />

        <p
          class="text-right sm:text-center text-[40pt] sm:text-[50pt] pr-[50px] w-full sm:w-auto sm:pr-0"
        >
          <?= $weddingData['groomName'] ?>
        </p>
      </div>
      <div class="w-full flex flex-col justify-center items-center">
        <p class="text-center text-[#EDD6C1] text-xs lg:text-sm w-[300px]">
          We are getting married on October 12, 2024. We are so excited to share
        </p>
      </div>
    </div>
    <!-- wedding date container -->
    <div
      class="w-full py-[75px] flex flex-col justify-center items-center text-4xl sm:text-[40pt] text-[#D197A2]"
    >
      <p><span class="text-[#A16772]">When? </span><span>October 13</span></p>
      <p class="text-sm">We can't wait to share this day with you.</p>
    </div>
    <!-- the countdown to the wedding goes here -->
    <div
      class="w-full py-[50px] flex flex-col gap-5 bg-[#A16772] text-[#EDD6C1]" id="countdown"
    >
      <div class="w-full flex justify-center items-center text-4xl font-light">
        Countdown
      </div>
      <div
        class="w-full flex justify-center items-center gap-[70px] sm:gap-[100px] font-thin"
      >
        <div class="flex flex-col justify-center items-center h-full">
          <p class="text-4xl"><span class="days">03</span></p>
          <p class="text-sm">days</p>
        </div>
        <div class="flex flex-col justify-center items-center h-full">
          <p class="text-4xl"><span class="hours">05</span></p>
          <p class="text-sm">hrs</p>
        </div>
        <div class="flex flex-col justify-center items-center h-full">
          <p class="text-4xl"><span class="min">15</span></p>
          <p class="text-sm">mins</p>
        </div>
        <div class="flex flex-col justify-center items-center h-full">
          <p class="text-4xl"><span class="sec">15</span></p>
          <p class="text-sm">secs</p>
        </div>
      </div>
    </div>
    <div class="w-full flex justify-center items-center">
      <div
        class="w-full max-w-6xl px-3 lg:px-[100px] sm:grid grid-cols-2 py-[50px]"
      >
        <div class="col-span-2 sm:col-span-1 flex flex-col">
          <div class="flex flex-col">
            <p>
              <span class="text-3xl font-thin text-[#CF99A3]">From the</span
              ><br /><span class="text-3xl sm:text-4xl text-[#CF99A3]"
                >Bride and Groom</span
              >
            </p>
            <!-- here goes the Bride's story -->
            <div class="w-full flex flex-col mt-5">
              <p class="text-5xl sm:text-6xl text-[#A16772] leading-tight">
                <?= $weddingData['brideName'] ?>
              </p>
              <p class="max-w-[400px] leading-tight font-thin">
                <?= $weddingData['brideQualifications'] ?>
                          <?= $weddingData['brideBio'] ?>
              </p>
            </div>
            <!-- here goes the Groom's story-->
            <div class="w-full flex flex-col mt-5">
              <p class="text-5xl sm:text-6xl text-[#A16772] leading-tight">
                <?= $weddingData['groomName'] ?>
              </p>
              <p class="max-w-[400px] leading-tight font-thin">
                 <?= $weddingData['groomQualifications'] ?>
                          <?= $weddingData['groomBio'] ?>
              </p>
            </div>
            <!-- this contains the story of the couples -->
            <div class="w-full flex flex-col mt-5">
              <p class="max-w-[400px] leading-tight font-thin">
                 since the 1500s, when an unknown printer took a galley of type
                and scrambled it to make a type specimen book. It has survived
                not only five centuries, but also the since the 1500s, when an
                unknown printer took a galley of type and scrambled it to make a
                type specimen book. It has survived not only five centuries, but
                also the
              </p>
            </div>
          </div>
        </div>
       
        <!-- image container of bride and groom -->
        <div class="col-span-2 sm:col-span-1 flex flex-col">
          <div
            class="w-full lg:w-[500px] rounded-[20px] overflow-hidden sm:pl-5 mt-5 sm:mt-0"
          >
            <img src="<?php if(getImgURL('couple')){echo getImgURL('couple');}else{ echo assets('img/upload.png');} ?>" alt="" />
          </div>
        </div>
      </div>
    </div>
     <!-- Our story section -->
     <div class="w-full bg-[#A16772] py-[30px] lg:py-[60px] relative">
      <div class="absolute w-[200px] lg:w-[300px] -top-[200px] -left-[100px]">
        <img src="<?php themeAssets('design3','images/ourstorydecor.png') ?>" alt="">
      </div>
      <div class="absolute w-[200px] lg:w-[300px] -bottom-[200px] -right-[100px] ">
        <img src="<?php themeAssets('design3','images/ourstorydecor.png') ?>" alt="">
      </div>
        <div class="w-[400px] sm:pb-[50px] lg:pb-[100px] flex flex-col justify-center items-center mx-auto">
          <div class="w-full flex justify-center items-center text-[#EDD6C1] text-[30pt] pb-[40px] lg:pb-[80px]">
            Our story
          </div >
          <div id="container" class="scale-[50%] sm:scale-[90%] lg:scale-100">
            <svg width="351" height="618" viewBox="0 0 351 618" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path id="svg-path" d="M1.25766 1C-2.57567 77.1667 34.8577 234.8 215.258 256C396 256 413.3 397.7 148.5 616.5" stroke="#EDD6C1" stroke-width="2"/>
            </svg>
            <div class="path-div" data-index="0" data-percentage="1">
              <div class="circle relative overflow-hidden px-1 py-1 bg-[#EDD6C1]">
                <div class="w-full h-full bg-[#EDD6C1] rounded-full overflow-hidden">
                  <img src="<?php if(getImgURL('couple')){echo getImgURL('couple');}else{ echo assets('img/upload.png');} ?>" class="object-cover w-full " alt="">
                </div>
              </div>
              <div class="absolute flex flex-col gap-1 left-[100px] top-[50%] -translate-y-[50%] w-[340px] px-3 py-2  rounded-lg bg-[rgb(243,243,243,0.27)] border-[rgb(243,243,243,0.27)] border-[1px] text-[#EDD6C1] backdrop-blur-[6px]">
                <div class="w-full text-2xl text-center">How we met...</div>
                <p class="w-full px-1 text-sm text-center font-light"> <?= $story['whenWeMet'] ?>- <?= $story['howWeMet'] ?> </p>
              </div>
            </div>
            <div class="path-div" data-index="1" data-percentage="40">
              <div class="circle relative overflow-hidden px-1 py-1 bg-[#EDD6C1]">
                <div class="w-full h-full bg-[#EDD6C1] rounded-full overflow-hidden">
                  <img src="<?php if(getImgURL('couple')){echo getImgURL('couple');}else{ echo assets('img/upload.png');} ?>" class="object-cover w-full " alt="">
                </div>
              </div>
              <div class="absolute flex flex-col gap-1 right-[100px] top-[50%] -translate-y-[50%] w-[340px] px-3 py-2  rounded-lg bg-[rgb(243,243,243,0.27)] border-[rgb(243,243,243,0.27)] border-[1px] text-[#EDD6C1] backdrop-blur-[6px]">
                <div class="w-full text-2xl text-center">little love....</div>
                <p class="w-full px-1 text-sm text-center font-light"> <?= $story['memorableMoments'] ?></p>
              </div>
            </div>
            <div class="path-div" data-index="2" data-percentage="100">
              <div class="circle relative overflow-hidden px-1 py-1 bg-[#EDD6C1]">
                <div class="w-full h-full bg-[#EDD6C1] rounded-full overflow-hidden">
                  <img src="<?php if(getImgURL('couple')){echo getImgURL('couple');}else{ echo assets('img/upload.png');} ?>" class="object-cover w-full " alt="">
                </div>
              </div>
              <div class="absolute flex flex-col gap-1 left-[100px] top-[50%] -translate-y-[50%] w-[340px] px-3 py-2  rounded-lg bg-[rgb(243,243,243,0.27)] border-[rgb(243,243,243,0.27)] border-[1px] text-[#EDD6C1] backdrop-blur-[6px]">
                <div class="w-full text-2xl text-center">We are engaged...</div>
                <p class="w-full px-1 text-sm text-center font-light"> <?= $story['engagementYear'] ?> - <?= $story['engagement'] ?> </p>
              </div>
            </div>
        </div>
     </div>
     </div></div>
     <!-- Our story ends here -->
    <!-- here starts the event section -->
    <div class="w-full bg-[#EDD6C1]  flex justify-center items-center">
      <div class="w-full flex flex-col py-[50px] px-2 max-w-6xl mx-auto">
        <div class="w-full flex flex-col justify-start items-start">
          <p class="text-6xl text-[#A16772]">Events.</p>
        </div>
        <div class="w-full h-[300px] sm:h-[400px] mt-5">
          <div
            id="carouselExampleIndicators"
            class="carousel slide"
            data-ride="carousel"
          >
            <ol class="carousel-indicators">
              <?php if ($timeline != null){ for ($i = 0; $i < count($timeline); $i++){ ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?php if($i==0){ echo 'active';} ?>"></li>
            <?php }} ?>

            </ol>
            <div class="carousel-inner">
               <?php if ($timeline != null){
                            for ($i = 0; $i < count($timeline); $i++){
                              $datetimeObj1 = new DateTime($timeline[$i]['startTime']);
                              $datetimeObj2 = new DateTime($timeline[$i]['endTime']);
                              $from=$datetimeObj1->format("d-m-Y")." ".$datetimeObj1->format("H:i");
                              $to=$datetimeObj2->format("d-m-Y")." ".$datetimeObj2->format("H:i");
              ?>
                            
            <div class="carousel-item <?php if($i==0){ echo 'active';} ?>">
              <div class="w-full h-full flex flex-col">
                <div class="w-full h-[300px] overflow-hidden">
                  <img class="h-full w-full object-cover" src="<?php echo getImgURL($timeline[$i]['event']); ?>" alt="">
                </div>
                <div
                    class="w-full flex justify-start items-start absolute bottom-0 left-3"
                  >
                    <p class="text-[45pt] pl-3 text-[#D8B5BC]"><?= $timeline[$i]['event'] ?></p>
                    <p class=""> <?php echo $from."To".$to; ?><br>
                  <?= $timeline[$i]['venue'] ?><br> 
                  <?= str_replace("<br>", "\r\n", $timeline[$i]['address']) ?> </p>
                  </div>

              </div>
            </div>

     <?php }} ?>

          
              
            </div>
            <a
              class="carousel-control-prev"
              href="#carouselExampleIndicators"
              role="button"
              data-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="sr-only">Previous</span>
            </a>
            <a
              class="carousel-control-next"
              href="#carouselExampleIndicators"
              role="button"
              data-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full h-[300px] relative normalfont">
      <div
        class="w-full h-full flex flex-col gap-5 justify-center items-center"
      >
        <p class="text-4xl lg:text-5xl text-[#A16772]">Are you attending?</p>
        <p class="max-w-[500px] text-sm text-center leading-tight font-thin">
          We kindly request your gracious company as we exchange vows and begin
          our new chapter as husband and wife.
        </p>
        <button
          class="px-5 py-2 bg-[#A16772] text-[#FFFFFF] font-light text-sm hover:bg-[#B57C87] ease-in-out duration-300"
        >
          I'm attending
        </button>
      </div>
    </div>
    <div
      class="w-full flex flex-col justify-center items-center py-[50px] text-[#A16772]"
    >
      <div class="flex flex-col justify-center items-center">
        <p class="text-xl font-thin">Getting there...</p>
        <p class="text-4xl lg:text-5xl mt-3">Accomadation.</p>
        <p class="max-w-[450px] font-thin leading-tight text-center mt-3">
           <?= $weddingData['accommodation'] ?>
        </p>
      </div>
      <div class="flex flex-col justify-center items-center mt-5">
        <p class="text-4xl lg:text-5xl mt-3">Travel.</p>
        <p class="max-w-[450px] font-thin leading-tight text-center mt-3">
          <?= $weddingData['travel'] ?>
        </p>
      </div>
    </div>
    <div class="w-full bg-[#A16772] py-[80px] normalfont">
      <div
        class="max-w-6xl mx-auto h-full grid grid-cols-2 flex justify-center"
      >
        <div
          class="col-span-2 lg:col-span-1 h-full flex justify-center items-center"
        >
          <img src="<?php themeAssets('design3','images/venue.png') ?>" alt="" />
        </div>
        <div
          class="col-span-2 lg:col-span-1 h-full flex justify-start sm:justify-center lg:justify-start items-center px-4"
        >
          <div class="flex flex-col justify-start text-[#EDD6C1]">
            <p class="text-[45pt]">Venue.</p>
            <p
              class="text-xs w-full sm:w-[500px] lg:w-[300px] text-left lg:text-right"
            >
              simply dummy text of the printing and typesetting industry. Lorem
              Ipsum has been the industry's standard dummy text ever since the
              1500s
            </p>
            <button
              class="w-[100px] py-1 bg-[#EDD6C1] text-[#A16772] rounded-r-full rounded-l-full text-sm mt-[30px] hover:bg-[#FDDEC1] ease-in-out duration-300"
            >
              locate
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="w-full bg-[#EDD6C1]">
      <div
        class="max-w-6xl mx-auto relative flex flex-col justify-center items-center normalfont relative mt-3 overflow-hidden"
      >
        <!-- Gallery -->
        <div class="row h-[400px] sm:flex">

          


  <?php 
    if (!$preweddingGallery['error']){
        for ($i = 0; $i < count($preweddingGallery); $i++){ ?>
<div class="h-full col-4 mb-1 mb-lg-0 px-1 sm:px-1">
      <img src="<?= $preweddingGallery[$i]['imageURL'] ?>"
        class="w-100 h-full object-cover shadow-1-strong rounded mb-1 sm:mb-2" />
</div>
    <?php 
            }
        }
    ?>

          

        </div>
        <!-- Gallery -->
        <div
          class="absolute -bottom-[70px] bottom-2 right-[50%] translate-x-[50%]"
        >
          <p class="text-[#A16772] text-xl">Gallery</p>
          <button
            class="px-5 py-2 bg-[#A16772] text-[#FFFFFF] font-light text-sm hover:bg-[#B57C87] ease-in-out duration-300"
          >
            see more
          </button>
        </div>
      </div>
    </div>

    <div class="w-full flex flex-col justify-center items-center font-thin">
      <p>all copy rights reserved @esubhaleka.com</p>
    </div>
  </body>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const lenis = new Lenis();

      lenis.on("scroll", (e) => {
        console.log(e);
      });

      function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
      }

      requestAnimationFrame(raf);
    });
  </script>
   <script>
    function getPathPosition(path, percentage) {
      const length = path.getTotalLength();
      return path.getPointAtLength(length * percentage);
    }

    function placeDivs() {
      const path = document.getElementById('svg-path');
      const divs = document.querySelectorAll('.path-div');

      divs.forEach(div => {
        const percentage = div.dataset.percentage / 100;
        const { x, y } = getPathPosition(path, percentage);

        div.style.left = `${x}px`;
        div.style.top = `${y}px`;
      });
    }

    window.onload = placeDivs;
  </script>

  <script>
                
                  // Set the end time for the countdown (year, month (0-indexed), day, hour, minute, second)
                  var endTime = new Date("2024-12-11T12:00:00Z").getTime();
                    var now = new Date().getTime();
                   // Calculate the time difference
                    var timeDifference = endTime - now;

                     // If the countdown is over, display a message
                    if (timeDifference < 0) {
                      clearInterval(x);
                      document.getElementById("countdown").innerHTML = "Wedding Done!";
                    }

                  // Update the countdown every second
                  var x = setInterval(function() {
                    // Get the current time
                    var now = new Date().getTime();

                    // Calculate the time difference
                    var timeDifference = endTime - now;

                     // If the countdown is over, display a message
                    if (timeDifference < 0) {
                      clearInterval(x);
                      document.getElementById("countdown").innerHTML = "Wedding Done!";
                    }

                    // Calculate days, hours, minutes, and seconds
                    var days = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((timeDifference % (1000 * 60)) / 1000);

                    if(days<10){
                        days="0"+days;
                    }
                     if(hours<10){
                        hours="0"+hours;
                    }
                     if(minutes<10){
                        minutes="0"+minutes;
                    }
                     if(seconds<10){
                        seconds="0"+seconds;
                    }

                    // Display the countdown
                   let daysselcted= document.querySelectorAll(".days");
                      for (var i = 0; i < daysselcted.length; i++) {
                          daysselcted[i].innerHTML = days;
                      }

                    let hoursselected=document.querySelectorAll(".hours");
                    for (var i = 0; i < hoursselected.length; i++) {
                          hoursselected[i].innerHTML = hours;
                      }

                    let minselected=document.querySelectorAll(".min");
                    for (var i = 0; i < minselected.length; i++) {
                          minselected[i].innerHTML = minutes;
                      }

                    let secselected= document.querySelectorAll(".sec");
                    for (var i = 0; i < secselected.length; i++) {
                          secselected[i].innerHTML = seconds;
                      }
                   
                  }, 1000);

                </script>

</html>
