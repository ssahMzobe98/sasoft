<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="Author: Msizi Samuel Mzobe. saSoft Description">
<meta name="keywords" content="SaSoft Keywords">
<meta name="author" content="Mr M.S Mzobe">
<meta property="og:title" content="Sasoft project Athor: Msizi Samuel Mzobe"/>
<link rel='dns-prefetch' href='https://sasoft.co.za//s0.wp.com' />
<link rel='dns-prefetch' href='https://sasoft.co.za/'/>
<link rel='dns-prefetch' href='https://sasoft.co.za//fonts.googleapis.com' />
<link rel='dns-prefetch' href='https://sasoft.co.za//s.w.org' />
<link rel="alternate" type="application/rss+xml" title="SaSoft Projec  &raquo; Feed" href="https://sasoft.co.za//feed/" />
<link rel="alternate" type="application/rss+xml" title="Slindimpilo Electric Appliance Supply Company &raquo; Comments Feed" href="https://sasoft.co.za/feed/" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../model/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" href="../model/css/bootstrap.min.css" />
  <!-- <link rel="stylesheet" href="../model/css/style.css" /> -->
  <link rel="icon" href="../model/img/icon.jpg">  
  <script>
  $(document).ready(function () {
      $('#tableComposition').DataTable();
      $('#tableCompositiona').DataTable();
  });
</script>
  <style>
    *{
      margin: 0;
      padding: 0;
    }
    body{
      margin: 0;
      padding: 0;
      width: 100%;
      background: url("../model/img/bg.jpg");
    }
    .no-employee-window{
      width: 100%;
      /*border: 1px solid red;*/
      padding: 30px 80px;
    }
    .no-employee-window .no-employee-title{
      width: 80%;
      /*border: 2px solid white;*/
    }
    .no-employee-window .add-employee-btn{
      width: 30%;
      /*border: 1px solid blue;*/
      padding: 15px 8px;
      font-size: 15px;
      background: purple;
      border-radius: 100px;
      box-shadow: -3px -3px 2px 1px #212121;
      cursor: pointer;
    }
    .no-employee-window .add-employee-btn .icon-tag{
      
      padding: 7px 13px;

      border-radius: 50px;
      background: white;
      color: purple;

    }
    .no-employee-window .add-employee-btn .text-tag{
      padding: 7px 10px;
    }
    .modal-content{
      background: url("../model/img/mob-toggle-bg.jpg");
      border-radius: 30px;
    }
    .text-purple{
      color: purple;
    }
    .padding-0-10{
      padding: 0 10px;
    }
    .phase1,.phase2,.phase3{
      width: 100%;
      padding: 10px 0;
    }
    .phase1 .group-input,.phase2 .group-input, .phase3 .group-input{
        width: 100%;
    }
    input, select{
      background: lightgrey;
      border: none;
      color: purple;
      border-radius: 10px;
    }
    .group-input .input-fname{
      width: 40%;
      padding: 5px 5px;
    }
    .group-input .input-fname input{
        width: 100%;
        padding: 5px 5px;
    }
    .group-input .input-lname{
      width: 60%;
      padding: 5px 5px;
    }
    .group-input .input-lname input{
      width: 100%;
      padding: 5px 5px;
    }
    .group-input .input-phone,.group-input .input-email{
      width: 100%;
      padding: 5px 5px;
    }
    .group-input .input-phone input,.group-input .input-email input{
      width: 100%;
      padding: 5px 5px;
    }
    .group-input .input-date{
      width: 40%;
      padding: 5px 5px;
    }
    .group-input .input-date input{
      width: 100%;
      padding: 5px 5px;
    }
    .group-input .input-address{
      width: 100%;
      padding: 5px 5px;
    }
    .group-input .input-address select{
      width: 100%;
      padding: 5px 5px;
    }
    .group-input .input-city,.group-input .input-code,.group-input .input-country{
      padding: 5px 5px;
      width: 100%;
    }
    .group-input .input-city select,.group-input .input-code select,.group-input .input-country select{
      width: 100%;
      padding: 5px 5px;
    }
    .group-input .input-skill{
      width: 100%;
      padding: 5px 5px;
    }
    .group-input .input-skill input{
      width: 100%;
      padding: 5px 5px;
    }
    .group-input .input-experience{
      width: 50%;
      padding: 5px 5px;
    }
    .group-input .input-experience select{
      width: 100%;
      padding: 5px 5px;
    }
    .group-input .input-seniority{
      width: 100%;
      padding: 5px 5px;
    }
    .group-input .input-seniority select{
      width: 100%;
      padding: 5px 5px;
    }
    .group-input .input-btn{
      width: 100%;
      padding: 5px 5px;
    }
    .group-input .input-btn button{
      width: 100%;
      padding: 5px 5px;
      border-radius: 10px;
      background: lightgrey;
      color: purple;
    }
    .group-input .input-btn button:hover{
      background: none;
      color: white;
      border: 2px solid purple;
    }
    .group-input .input-right-source button{
      background: purple;
      border-radius: 50px;
    }
    .serch-div-nav{
      width: 100%;
      /*border: 2px solid red;*/
      height: 50px;
      padding: 5px 5px;
    }
    form{
      width: 80%;
    }
    .serch-div-nav .input-search-map{
      width: 70%;
      padding: 5px 5px;

    }
    .serch-div-nav .input-search-map input{
      width: 100%;
      padding: 5px 5px;
    }
    .serch-div-nav .select-search-map{
      width: 30%;
      padding: 5px 5px;
    }
    .serch-div-nav .select-search-map select{
      width: 100%;
      padding: 5px 5px;
      background: none;
      color: purple;

    }
    .serch-div-nav .searchBtn i{
      color: white;
    }
    .serch-div-nav .searchBtn i:hover{
      color: red;
    }
    .body-container{
      width: 100%;
      /*border: 1px solid white;*/
    }
    .body-container .left-side-bar{
      width: 9%;
      /*border: 1px solid red;*/
    }
    .body-container .right-data-display{
      width: 81%;
      /*border: 1px solid green;*/
    }
    .body-container .right-data-display .do-over{
      width: 100%;
      border: 1px solid purple;
      border-radius: 10px;
      padding: 10px 10px;
      color: white;
      /*margin-right: -30px;*/
    }
    .card-body{
      border-radius: 10px;
      border: 1px solid purple;
      /*width: 98%;
      height: 98%;*/
    }
    .bg-purple{
      background: purple;
    }
    .error-px-v{
      width: 50%;
      border: 1px solid purple;
      border-radius: 20px;
    }
    .round-counter-tag{
      width: 40px;
      height: 40px;
      border: 1px solid purple;
      color: purple;
      padding: 8px 8px;
      border-radius: 100%;
      text-align: center;
    }
    .sudo-mass{
      background: lightgrey;
    }
    .asap_remove,.asap_remove_employee{
      color: white;
      font-size: 10px;
      cursor: pointer;
    }
  </style>
</head>
<body>
