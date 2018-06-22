<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>LivePoll</title>
  <link rel="stylesheet" href="./css/normalize.css" type="text/css">
  <style>
  body,html{
	  font-family:Helvetica,Arial,sans-serif;
	  height:100%;
  }
  #header{
	  background-color:#eee;
	  padding-left:0.5%;
	  position:absolute;
	  top:0px;
	  left:0px;
	  right:0px;
    z-index:2;
  }
  #main{
	  border-top: thin solid #eee;
	  position:relative;
	  padding:1%;
	  top:20%;
	  left: 0px;
	  right:0px;
	  bottom:0px
  }
  .btn-nav{
	  cursor:pointer;
	  font-size:1.2em;
	  padding-right:1%;
	  margin-right:1%;
	  border-right: 2px solid #ab2341;
  }
  .btn-nav.active{
	  font-weight:bold;
  }
  #livepollcontainer{
	  position:relative;
	  height:100%;
  }
  
  #inp_frage{
	  width:100%;
	  text-align:center;
  }
  #list_antworten{
	  list-style:none;
  }
   #list_antworten li{
	  display:block;
	  width:80%;
	  font-size:1.1em;
	  padding:1%;
  }
  li label{
	  margin-right:10px;
  }
  </style>
  </head>
  <body>
  <script src="./js/jquery.js" type="text/javascript"></script>
   <script src="./js/chart.js" type="text/javascript"></script>
  <?php
  include('nav.php');
  ?>
  
  <div id="main">
  
  
  </div>
  
  
  
  </body>
</html>