<!doctype html>
<html lang="en">
<head>
<meta name="description" content="Calculates the chance on a successful relationship between two people">
<meta name="keywords" content="love,valentine,relation,relations,success,successful,happy,cool,calculate,calculator,love calculator,date">
<meta name="author" content="Thijs Kinkhorst &amp; Matthijs Sypkens Smit">
<meta name="viewport" content="width=480" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<style>
.result {
    position: relative;
}

.result__score {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 50px; /* Adjust font size as needed */
}

</style>
<link rel="stylesheet" href="dist/styles/main.css" type="text/css" media="all">
<script type="text/javascript">
<!-- get out of frames
if (top.frames.length!=0)
    top.location=self.document.location;
//-->
</script>

<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<body>
<header class="header">
  <div class="container">
    <div class="row row--justify-content-between row--menu">
      <div class="title">
        <a href="/"><img src="dist/images/lovecalculator-logo.svg" alt="The Love Calculator"></a>
      </div> <!-- end header -->
      <div class="nav-toggle">
        <span class="nav-toggle-stripe"></span>
        <span class="nav-toggle-stripe"></span>
        <span class="nav-toggle-stripe"></span>
      </div>
      <div class="menu">
        <nav>
          <ul>
            <li><a href="about.php">About the Love Calculator</a></li>
          </ul>
        </nav>
      </div> <!-- end menu -->
    </div>
  </div>
</header>
<section class="content love">
    <div class="container container--small">
    <?php
if (isset($_GET['name1']) && isset($_GET['name2'])) {
    $name1 = trim(strtolower($_GET['name1']));
    $name2 = trim(strtolower($_GET['name2']));

    $combinedName = $name1 . $name2;
    $score = 0;

    // Calculate score based on character count
    for ($i = 0; $i < strlen($combinedName); $i++) {
        $score += ord($combinedName[$i]);
    }

    // Generate a percentage score
    $lovePercentage = $score % 101; // Ensures the result is between 0 and 100

    // Display the love percentage inside the heart image
    echo "<div class='result'>";
    echo "</div>";
}
?>

<div class="result">
   <center>
    <img class="result" src="dist/images/lovecalculator-heart.svg" alt="test">
   </center>
    <div class="result__score">
        <?php echo $lovePercentage; ?>%
    </div>
</div>
<div class="row">
            <div class="result-text">
                                    artificial intelligence thinks that a relationship between your and your partner has a reasonable
                    chance of working out, but on the other hand, it might not. Your relationship may
                    suffer good and bad times. If things might not be working out as you would like
                    them to, do not hesitate to talk about it with the person involved. Spend time
                    together, talk with each other.

                            </div>

            <div class="socialmedia">
                <div class="icons">
                    <a href="https://facebook.com/sharer/sharer.php?u=https%3A%2F%2Flovecalculator.com%2Flove.php%3Fname1%3DCyber android%26name2%3DHrishikesh"
                       target="_blank" rel="noopener" aria-label="Share on Facebook"
                       class="d-flex align-items-center btn btn--small btn--facebook">
                        <i class="fa fa-facebook"></i><span>Share</span></a>
                    <a href="https://twitter.com/intent/tweet/?text=Cyber android%20and%20Hrishikesh%20have%20a%20match%20of%2059%25!%20Check%20your%20match%20now.%20%23love&amp;url=https%3A%2F%2Flovecalculator.com%2Flove.php%3Fname1%3DCyber android%26name2%3DHrishikesh"
                       target="_blank" rel="noopener" aria-label="Share on Twitter"
                       class="d-flex align-items-center btn btn--small btn--twitter">
                        <i class="fa fa-twitter"></i><span>Share</span></a>
                    <a href="whatsapp://send?text=Cyber android%20and%20Hrishikesh%20have%20a%20match%20of%2059%25!%20Check%20your%20match%20now.%20%23love%20https%3A%2F%2Flovecalculator.com%2Flove.php%3Fname1%3DCyber android%26name2%3DHrishikesh"
                       target="_blank" rel="noopener" aria-label="Share on WhatsApp"
                       class="d-flex align-items-center btn btn--small btn--whatsapp">
                        <i class="fa fa-whatsapp"></i><span>Share</span></a>
                    <a href="mailto:?subject=Cyber android%20and%20Hrishikesh%20have%20a%20match%20of%2059%25!%20Check%20your%20match%20now.%20%23love&amp;body=https%3A%2F%2Flovecalculator.com%2Flove.php%3Fname1%3DCyber android%26name2%3DHrishikesh"
                       target="_self" rel="noopener" aria-label="Share by E-Mail"
                       class="d-flex align-items-center btn btn--small btn--mail">
                        <i class="fa fa-envelope-o"></i><span>Share</span></a>
                    <a href="#" id="shareLink" class="d-flex align-items-center btn btn--small btn--share">
                        <i class="fa fa-link"></i><span>Share</span>
                        <input type="text" style="width: 1px; height:1px; opacity: 0;" id="shareLinkInput" value="https://lovecalculator.com/love.php?name1=Cyber android&name2=Hrishikesh">
                    </a>
                </div>
            </div>
        </div>

        <a href="/" class="btn btn--primary">Make another calculation</a>
  <!-- respons-1 -->
        </div>
    </div>
</section>

<footer class="footer d-flex align-items-center">
  <div class="container">
    <div class="row align-items-center row--justify-content-between">
      <p class="footer__copyright">&copy; Real love Calculator 2024</p>
      <div class="footer__menu">
        <nav>
          <ul>
            <li>
              <a href="/about.php">About real Love Calculator</a>
            </li>
            <li>
              <a href="/privacy.php">Privacy</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="dist/scripts/main.js"></script>
</body>