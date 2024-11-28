<?php

$page = "Gallery";
$page2 = "Photo gallery";

  include_once "pwdi_db.php";
  // $page='gallary.php';
  include "header.php";
?>
<html>
    <body>
              <!-- ======= Breadcrumbs ======= -->
      <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Our Gallary</h2>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->
   
    <!--------- Gallary ------->
    <main id="main">
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
  <div class="container">
    <div class="row" data-aos="fade-up">
      <div class="col-lg-12 d-flex justify-content-center">
        <ul id="portfolio-flters">
          <li data-filter="*" class="filter-active">All</li>
           <?php
                          $sqli="SELECT * FROM `gallery` AS g JOIN `category` AS c ON c.category_id=g.category_id WHERE g.gallery_status='enable' GROUP BY c.category_name";
                           $result=mysqli_query($conn,$sqli);
                           $count=mysqli_num_rows($result);
                           $i=1;
                           while ($i<=$count){
                           while ($row=mysqli_fetch_assoc($result)){
                              ?>
          <li data-filter=".filter-<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></li>
        <?php 
        $i++;
            }
        } 
      ?>
          <hr>
        </ul>
      </div>
    </div>

    <div class="row portfolio-container" data-aos="fade-up">
       <?php
                          $sqlia="SELECT * FROM `gallery` WHERE gallery_status='enable' ORDER BY gallery_title ASC ";
                           $resulta=mysqli_query($conn,$sqlia);
                           $count=mysqli_num_rows($resulta);
                           $i=1;
                           while ($i<=$count){
                           while ($rowa=mysqli_fetch_assoc($resulta)){
                            $photo='gallery/'.$rowa['gallery_photo'];
                            ?>
       <div class="col-lg-4 col-md-6 portfolio-item filter-<?php echo $rowa['category_id']; ?>">
        <img src="<?php echo $photo; ?>" class="img-fluid" alt="" 
        style="height: 35vh;
               width: 80vh;
               ">
        <div class="portfolio-info">
          <h4><?php echo $rowa['gallery_title']; ?></h4>
          <?php
            // Example usage with your gallery description
            $description = $rowa['gallery_description'];
            $limitedDescription = limitWords($description,10);
            ?>
            <p><?php echo $limitedDescription; ?></p>
           <a href="<?php echo $photo; ?>" data-gallery="portfolioGallery" class="btn btn-sm btn-success portfolio-lightbox mt-2" title="<?php echo $rowa['gallery_title'].' : '.$rowa['gallery_description']; ?>">Read more</a>
        </div>
      </div>
    <?php
    $i++;
        }
     } 
  ?>
    </div>
  </div>
</section><!-- End Portfolio Section -->

</main><!-- End #main -->


    <?php
    include "footer.php"
    ?>
</body>
</html>
<?php
   function limitWords($text, $limit) {
    // Split the text into an array of words
    $words = explode(' ', $text);

    // Check if the word count exceeds the limit
    if (count($words) > $limit) {
        // Join only the first $limit words and append "..." to indicate truncation
        return implode(' ', array_slice($words, 0, $limit)) . '...';
    }

    // If the word count is within the limit, return the original text
    return $text;
}
?>
