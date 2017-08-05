 <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="./" class="navbar-brand">
            <?=$title?>   
          </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
          <?php 
          if ($levelLog == "3") {
          $actv = $function->get("h");
          switch ($actv) {
            case 'pendaftaran':
                $active2 = "active";
              break;
            
            default:
                $active1 = "active";
              break;
          }
            ?>
              <li class="<?=$active1?>"><a href="./" ><i class="fa fa-circle-o text-red "></i> <span>Data Pasien</span></a></li>
              <li class="<?=$active2?>"><a href="?h=pendaftaran"><i class="fa fa-circle-o text-red"></i> <span>Data Pendaftaran</span></a></li>
            <?php
          }
           ?>
          </ul>
        </div>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
          <li>
              <?php 
              switch ($levelLog) {
                case '1':
                  ?>
                      <a href="" onclick="history.go(0)" title="Pasien Hari ini">
                        <i class="fa fa-ambulance"></i>
                        <span class="label label-info" id="not" ></span> 
                      </a>
                  <?php
                  break;
                
                case '2':
                  ?>
                      <a href="" onclick="history.go(0)" title="Pasien Hari ini">
                        <i class="fa fa-ambulance"></i>
                        <span class="label label-danger" id="notApotek" ></span> 
                      </a>
                  <?php
                  break;
                
                
                case '5':
                  ?>
                      <a href="" onclick="history.go(0)" title="Pasien Hari ini">
                        <i class="fa fa-ambulance"></i>
                        <span class="label label-info" id="notKasir" ></span> 
                      </a>
                  <?php
                  break;
                
              }
               ?>
          </li>

          <li><a><span class="hidden-xs"><?=$namaLog?></span></a></li>
          <li>
            <a style="cursor: pointer;" data-href="../logout.php" title="Log out" data-toggle="modal" data-target="#logout">
              <i class="fa fa-power-off text-white"></i>
              <span>Log out</span>
            </a>
          </li>
          </ul>
        </div>
      </div>
    </nav>