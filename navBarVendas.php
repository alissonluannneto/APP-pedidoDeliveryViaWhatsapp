<!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }
      
      .rounded-circles {
             
                padding-right: 1em;
                padding-bottom: 5px;
                border-radius:5px 15px 40px;
        }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
<!-- navbar navbar-expand-md navbar-dark bg-dark bg-primary-->
<!-- navbar navbar-dark bg-primary navbar-expand-md fixed-top-->
<nav class="navbar navbar-dark navbar-expand-md fixed-top" style="background-color: #1E88E5;">
  <img class="rounded-circles" src="IMG/LOGOMARCA.jpeg" height="75" width="200">
  <div class="scrollmenu">
  <?php 
          $ativo ="sim";
          
          while ( $NomeCategotia = mysqli_fetch_array($res)) {
            if($ativo == "sim" ){?>
           
            <a  href='#<?php echo $NomeCategotia['sub']; ?>'><button type='button' class='btn  btn-warning '><?php echo $NomeCategotia['sub'];
              ?></button></a>
             <?php $ativo ="nao";  }else{?>
           
          
              <a  href='#<?php echo $NomeCategotia['sub']; ?>'><button type='button' class='btn  btn-warning'><?php echo $NomeCategotia['sub'];
              ?></button></a>
           

           <?php }?>
          <?php } ?>
          </div>
          
</nav>
