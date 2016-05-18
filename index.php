<html>
<head>
  <script src="jquery.js"></script>
  <script src="bootstrap.min.js"></script>
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
  <link href="freelancer.css" rel="stylesheet">
  <link href="font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
  <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
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
                    document.getElementById("stationname").innerHTML="Select Station";
                    if (true) {document.getElementById("menu").innerHTML = xmlhttp.responseText;};
                    if (which1==1) {document.getElementById("menu1").innerHTML = xmlhttp.responseText;
                    document.getElementById("header-title").innerHTML = $('input[type=radio][name=city]:checked').attr('id');};
                  }
                };
                xmlhttp.open("GET","getstation.php?q="+str+"&ch="+which1,true);
                xmlhttp.send();
              }
            }
            function setstation(sid,which2) {
        // body...
        if (which2==0) {document.getElementById("stationname").innerHTML=document.getElementById("abc"+sid).innerHTML;};
        if (which2==1) {document.getElementById("stationname1").innerHTML=document.getElementById("abc"+sid).innerHTML;};
        document.getElementById("sname").value=sid;
        $('#myIframe').attr('src', "reading.php?c="+sid); 
      }

      function setframe (a) {
          // body...
        }
  </script>
</head>
<body>
<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">Database Project</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="active">
                        <a href="index.php">Home</a>
                    </li>
                    <li >
                        <a href="builder.php" >Search</a>
                    </li>
                    <li >
                        <a href="singleins.php">Insert</a>
                    </li>
                    <li >
                        <a href="patientinfo.php">Statistics</a> 
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header style="height:100%">
        <div class="container">
            <div class="row" >
                <div class="col-lg-12">
                    <img class="img-responsive img-circle" src="pic.png" style="border: 5px solid #23FFB2;width: 100px;box-shadow: 0 3px 10px black;height: 100px;" alt="">
                    <div class="intro-text">
                        <span class="name">Database Systems</span>
                        <hr class="">
                        <span class="skills">Vipulkumar Mahadik<br>Yuvraj Kadam<br>Rohit Chawla<br></span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap.min.js"></script>

</body>
</body>
</html>