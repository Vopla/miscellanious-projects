<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Website with Vue.js</title>
  <meta name="description" content="Testing Vue.js">
  <meta name="author" content="Vopla">
  <link rel="stylesheet" href="css/styles.css">

</head>

<body>

<?php

    $Urls = array('http://twitch.tv/', 'https://github.com/');
    function RandImg($dir)
    {
    $images = glob($dir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    
    $randomImage = $images[array_rand($images)];
    return $randomImage;
    }
    
    $randImage = RandImg('images/');
?>

  <div class="navigation">
    <button v-on:click="addNew()" id="left">{{ message }}</button>
    <button v-on:click="removeClock()" id="right">{{ message }}</button>

  </div>  

    <div id="container">
      <ul>

        <div id="test-2" class="section">
          <current-time v-for="n in range" v-bind:key="n.id" text="Tällä hetkellä kello on "></current-time>
        </div>

      </ul> 
    </div>
  
  <div id ="images">
  <?php
       if ($randImage === "images/TwitchLogo.png"){
        echo '<a href="'. $Urls[0] . '"><img src="' . $randImage . '" alt="Twitch"></a>';

       }
       elseif($randImage === "images/github.png"){
        echo '<a href="'. $Urls[1] . '"><img src="' . $randImage . '" alt="Github"></a>';
       }
       else {
        echo '<img src="' . $randImage . '" alt="random image"></a>';
       }
      
  ?>
  </div>

  <script src="js/moment.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="js/script.js"></script> 
</body>
</html>