<html>
<head>
  <!--<script src="jquery-1.11.0.min.js"></script>-->
  <script src="jquery-2.1.1.js"></script>
  <script src="bootstrap.min.js"></script>
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  
  <link href="font-awesome.min.css" rel="stylesheet">
  <link rel='stylesheet' id='MD_icons-css'  href='https://fonts.googleapis.com/icon?family=Material+Icons&#038;ver=4.4.2' type='text/css' media='all' />

<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
  <title>DOCTOR - Responsive HTML &amp; Bootstrap Template</title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
  <script src="js/modernizr.js"></script>
<link href="star/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />

<!-- optionally if you need to use a theme, then include the theme file as mentioned below -->
<link href="star/css/theme-krajee-svg.css" media="all" rel="stylesheet" type="text/css" />

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
<script src="star/js/star-rating.js" type="text/javascript"></script>

<!-- optionally if you need translation for your language then include locale file as mentioned below -->
<script src="star/js/star-rating_locale_LANG.js"></script>
  <style type="text/css">
  .toph{box-shadow: 0px 0px 15px;    background: #FACCFF !important; margin-bottom: 30px;padding-bottom: 10px;}
  .navbar-default .navbar-nav>.active>a {background-color: #fff;}
  .navbar-default .navbar-nav>li>a {font-size: 14px;}
  .nav-bar {
    margin-top: 20px;
}
.card {
    padding: 5px 10px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.49);
    border-radius: 7px;
    margin-bottom: 25px;
}
  </style>

  <script src="js/modernizr.js"></script>





  <script type="text/javascript">
  function showStation(str,which1) {
    if (str == "") {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } else { 
      if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp = new XMLHttpRequest();
                } else {
                  // code for IE6, IE5
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("stationname").innerHTML="Select Diagnosis Code";
                    if (true) {document.getElementById("menu").innerHTML = xmlhttp.responseText;};
                    if (which1==1) {document.getElementById("menu1").innerHTML = xmlhttp.responseText;
                    document.getElementById("header-title").innerHTML = $('input[type=radio][name=city]:checked').attr('id');};
                  }
                };
                xmlhttp.open("GET","getdiagnosis.php?q="+str+"&ch="+which1,true);
                xmlhttp.send();
              }
            }
            function setstation(sid,which2) {
            // body...
            if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
            } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("infos").innerHTML= xmlhttp.responseText;
                document.getElementById("stationname").innerHTML=sid;
                setframe(sid);
              }
            };
            xmlhttp.open("GET","getinfo.php?c="+sid,true);
            xmlhttp.send();

          }
          function setframe (a) {
            if (window.XMLHttpRequest) {
                  // code for IE7+, Firefox, Chrome, Opera, Safari
                  xmlhttp = new XMLHttpRequest();
                } else {
                  // code for IE6, IE5
                  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  document.getElementById("diaginfos").innerHTML = xmlhttp.responseText;
                  }
                };
                xmlhttp.open("GET","getdiaginfos.php?q="+a,true);
                xmlhttp.send();
            }
  </script>
</head>
<body>



  <div class="row toph" >
    <div class="col-md-4 header-logo">
      <a href="index.html"><img src="img/logo.png" style="margin-left: 25px;" alt="" class="img-responsive logo"></a>
    </div>

    <div class="col-md-8">
      <nav class="navbar navbar-default">
        <div class="container-fluid nav-bar">
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <ul class="nav navbar-nav navbar-right">
              <li><a class="menu " href="index.html" >Home</a></li>
              <li><a class="menu active" href="patientinfo.php">our services </a></li>
            </ul>
          </div><!-- /navbar-collapse -->
        </div><!-- / .container-fluid -->
      </nav>
    </div>
  </div>
  <div class="row" style="margin:20px;">
        
    <!-- <div class="row rowdeep" style=""> -->
      <div class="col-xs-12 col-sm-6 col-lg-4 animated fadeIn" style="animation-duration: 2s;">
        <div class="" style="float: none;  padding: 15px; background-color: white; box-shadow: 0px 2px 5px;border-radius: 10px;">
          <h4>Hospital Information</h4>
          <form action="getinfo.php" method="post" enctype="multipart/form-data">
            <div class="btn-group" style="margin: 20px 0;width:100%;" data-toggle="buttons">
                      <label class="btn btn-default" >
                          <input type="radio" id="q156" name="quality[25]" value="1" onchange="showStation(this.value,0)" /> Admission Diagnosis Code
                      </label> 
                  </div>
            <div class="dropdown" style="margin-bottom:20px;">
              <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" ><span id="stationname" name="stationname">Select Diagnosis Code</span>
              <span class="caret"></span></button>
              <ul class="dropdown-menu" id="menu" style="height: auto;max-height: 200px;overflow-x: hidden;">
                <li><a href="#" >Select the diagnosis code</a></li>
              </ul>
            </div>
          
          <input type="text" name="s" id="sname" onchange="setframe(this.value)" hidden>
          </form>
        </div>
        <div class="" style="float: none; margin-top:15px;  padding: 15px; background-color: white; box-shadow: 0px 2px 5px;border-radius: 10px;">
          <h4>Statistics</h4>
          <div id="diaginfos"></div>
        </div>

        </div>
        <div class="col-xs-6 col-lg-8 animated fadeIn" style="animation-duration: 2s;" id="infos">
    </div>
</div>


<script type="text/javascript">

<script type="text/javascript">
$("#input-2").rating();

// with plugin options (do not attach the CSS class "rating" to your input if using this approach)
$("#input-2").rating({'size':'lg'});
</script></script>
</body>
</html>
