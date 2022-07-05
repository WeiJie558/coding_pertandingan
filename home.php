<html>
<head>
    <style>
	  
      h3 {
            font-family: verdana;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            color: #565b5c; 
        }
		
	  div.home {
			width:500px;
			padding: 20px;
			border-radius:10px;
			margin:40px auto;
			background-color:#d2d4d5;
			 /* box-shadow: inset 2px 2px 8px rgba(96, 96, 96, 1); */
		}
        div.mySlides {
            border-radius: 10px;
        }
        div#slide1 {
            background-image: url("imej/tajuk1.png");
            background-size: cover;
            width: 400px;
            height: 250px;
        }
        div#slide2 {
            background-image: url("imej/tajuk2.png");
            background-size: cover;
            width: 400px;
            height: 250px;
        }
        div#slide3 {
            background-image: url("imej/tajuk3.png");
            background-size: cover;
            width: 400px;
            height: 250px;
        }
        div#slide4 {
            background-image: url("imej/tajuk4.png");
            background-size: cover;
            width: 400px;
            height: 250px;
        }
    </style>
</head>
<body>
<div class="home">
    <center>
    <div class="slides" >

        <!-- Slide 1 -->
        <div id="slide1" class="mySlides fade">
            
        </div>

        <!-- Slide 2 -->
        <div id="slide2" class="mySlides fade">
            
        </div>

        <!-- Slide 3 -->
        <div id="slide3" class="mySlides fade">
            
        </div>

        <!-- Slide 4 -->
        <div id="slide4" class="mySlides fade">
            
        </div>

        </div>
        <h3>
            TARIKH MULA : 12/2/2021 TARIKH TAMAT : 15/2/2021<br><br>
            DIANJURKAN OLEH : HSM BASKETBALL CLUB
        </h3>
    </center>
</div>
<script>
    var slideIndex = 0;

    // Call the function and it will run infinitely
    showSlides();

    // Change slides function
    function showSlides() {
        var i;
        // Get all slides and dots
        var slides = document.getElementsByClassName("mySlides");
        

        // Loop through every slides and set its display = 'none'
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        
        // Increase slideIndex every time, return its to 1 if exceed slides.length
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
    

        // For each turn of slides, show the 
        //slides(display = block) and dots(+ class name active)
        slides[slideIndex-1].style.display = "block";  
        
        
        // Auto change slide every 2 seconds (infinitely)
        setTimeout(showSlides, 2000);
    }
    
    
</script>
</body>

</html>