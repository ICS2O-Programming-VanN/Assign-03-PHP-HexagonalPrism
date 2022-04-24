<html>
  <head>
    <!-- 	Meta Data	 -->
    <meta charset="UTF-8">
    <meta name="Van" content="My website in PHP">
    <meta name="keywords" content="immaculata, ics2o">
    <meta name="DESCRIPTION" content="website for calculating volume and surface of a hexagonal prism">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./fav_index/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="./fav_index/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="./fav_index/favicon-16x16.png" />
    <link rel="manifest" href="./fav_index/site.webmanifest" />
    <title>My PHP website calculating the Surface Area and Volume of a cylinder</title>
    <!-- Google's MDL -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-green.min.css" />
    <!-- CSS file link -->
    <link rel="stylesheet" href="./css/style.css">
  </head>
  <body>
    <!-- MDL Header -->
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <header class="mdl-layout__header">
        <div class="mdl-layout-title">
          <span class="mdl-layout-title">Surface Area & Volume of a Hexagonal Prism Program, Using PHP</span>
        </div>
      </header>
    <!-- Animated Background -->
    <div class="animated-background">
      <div id="background">
      <!-- Heading -->
      <h2>Enter the Following Below:</h2>
      <!-- Text fields and button (User Input)-->
      <form method = "post">
        <p>Enter the Base Edge Length:</p> <input type="number" step="any" min="0" name="baseEdge" placeholder="Length of Base">
        <br><br>   
        <p>Enter the Height:</p> <input type="number" step="any" min="0" name="height" placeholder="Height">
        <br><br>
        <p>Unit (mm/cm/dm/m/hm/km):</p> <input type="text" name="unit" placeholder="Metric Units"><br>
        <br><br>
        <!-- Submit Button -->
        <input type="submit" class="button" name="submit" value="Calculate Volume and Surface Area">
      </form>
      <!-- Calculations for Surface Area and Volume (With User Input) -->
      <?php
        if(isset($_POST['submit'])) {	// if submit pressed
          if($_POST['baseEdge'] != "" && $_POST['height'] != "" && $_POST['unit'] != "") { // Checks if all fields have input
          
          // Variables
          $baseEdge = ($_POST["baseEdge"]); // takes user input 
          $height = ($_POST["height"]); // takes user input
          $unit = ($_POST["unit"]); // takes user input

          // Calcalates Volume and Surface Area
          $volume = 3 * sqrt(3) / 2 * pow($baseEdge, 2) * $height; // Calculates volume
          $surface_area = 6 * $baseEdge * $height + 3 * sqrt(3) * pow($baseEdge, 2); // Calculates Surface Area
          
          // Number formatting (Rounds each value to second decimal point)
          $volume = number_format($volume, 2);  
          $surface_area = number_format($surface_area, 2);
            
            if($baseEdge == 0 or $height == 0) { // Ensures that 0 was not inputted
              echo "<h5>An Input of Zero results to nothing!</h5>";                                    
              echo "<h6>Length of Base Inputted: " . $baseEdge . "</h6>";
              echo "<h6>Height Inputted: " . $height . "</h6>";
              echo "<h6>Units Inputted: " . $unit . "</h6>";
            } elseif ($unit === "mm" or $unit === "cm" or $unit === "dm" or 
                      $unit === "m" or $unit === "hm" or $unit === "km") { // If baseEdge and height are not equal to zero and proper units are inputted
              echo "<br><br><h5>The volume of this Hexagonal Prism is " . $volume . $unit . "<sup>3</sup><br> The surface area of this Hexagonal Prism is " . $surface_area . $unit . "<sup>2</sup></h5>";
            } else { // If Invalid units are inputted
              echo "<h5>Invalid Units!</h5>";
              echo "<h6>Length of Base Inputted: " . $baseEdge . "</h6>";
              echo "<h6>Height Inputted: " . $height . "</h6>";
              echo "<h6>Units Inputted: " . $unit . "</h6>";
            }
          } else { // If all fields do not have an input
            echo "<h5>Please Fill in ALL fields!</h5>";
          }
        }
        // Image of the Formula for Volume
        echo '<br><br><img src="./images/hexagonal-prism-volume.png" alt="Hexagonal Prism Volume Formula">';
        // Image of the Formula for Surface Area
        echo '<br><br><img src="./images/hexagonal-prism-surface-area.png" alt="Hexagonal Prism Surface Area Formula">';
      ?>
      <!-- Radio Button Header -->
      <h5>Do you like my website?</h5>
      <!-- Radio button -->
      <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
        <!-- Option 1 -->
        <input type="radio" id="option-1" class="mdl-radio__button" name="options" value="1" checked>
        <span class="mdl-radio__label">Of course!</span>
      </label>
      <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
        <!-- Option 2 -->
        <input type="radio" id="option-2" class="mdl-radio__button" name="options" value="2">
        <span class="mdl-radio__label">It's the best!</span>
      </label>
      </div>
    </div>
    </div>
  </body>
</html>