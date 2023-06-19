<?php
include "header.php"; ?>

<main >
<h1> Sent your children to camp and want to know how they are doing?</h1>
<h2>If yes this is the site for you!</h2>
<h1>We are So excited for an amazing summer!!</h1>

<div id="slideshow">

<ul class="rslides">
  <li><img src="pic1.jpg" alt="" width="700" height="400"></li>
  <li><img src="pic6.jpg" alt="" width="700" height="400"></li>
  <li><img src="pic5.jpg" alt="" width="700" height="400"></li>
  <li><img src="pic7.jpg" alt="" width="700" height="400"></li>
  
</ul>
    
</div>

<script>
  $(function() {
    $(".rslides").responsiveSlides({auto:true,timeout:4000,pager:false, nav:false});
  });
</script>






</main>
<?php include "footer.php"; ?>
