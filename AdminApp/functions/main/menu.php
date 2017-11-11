 <ul class="sidebar-menu" data-widget="tree">
     <li class="header" style="text-align: center; background-color:#222d32;">
         <a href="admin.php?m=acasa&a=activ1"><img src="functions/images/logo/logo_debbie2.png" style="width:140px;"></a>
     </li>
        <!-- Optionally, you can add icons to the links -->
<!--        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>-->
        
        <li class="<?php echo meniuActiv($_GET['a'])?>"><a href="?m=acasa&a=activ1"><i class="fa fa-globe" aria-hidden="true"></i> &nbsp; <span>Statistici</span></a></li>
        <li class="<?php echo meniuActiv($_GET['b'])?>"><a href="?m=rezervari&b=activ2"><i class="fa fa-cutlery" aria-hidden="true"></i> &nbsp; <span>Rezervări</span>
             <span class="pull-right-container">
              <small class="label pull-right bg-red">10</small>
            </span></a></li>
        <li><a href="#"><i class="fa fa-cutlery" aria-hidden="true"></i> &nbsp; <span>Rezervări mese</span> <span class="pull-right-container">
              <small class="label pull-right bg-green">în dezvoltare</small>
            </span></a></li>
        <li><a href="#"><i class="fa fa-cutlery" aria-hidden="true"></i> &nbsp; <span>Comenzi</span> 
                <span class="pull-right-container">
              <small class="label pull-right bg-green">în dezvoltare</small>
            </span></a></li>
        <li class="treeview <?php echo meniuActiv($_GET['d'])?>">
          <a href="?m=acasa&d=activ4"><i class="fa fa-commenting"></i> <span>Marketing</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
             
            <li><a href="admin.php?m=newsletter&e=activ5&d=activ4"><i class="fa fa-circle-o"></i>Newsletter</a></li>
            <li><a href="admin.php?m=hostes&f=active6&d=activ4"><i class="fa fa-circle-o"></i>Hostes Marketing</a></li>
          </ul>
        </li>
        <li class="<?php echo meniuActiv($_GET['c'])?>"><a href="?m=gestiune&c=activ3"><i class="fa fa-tachometer"></i> <span>Produse și categorii</span></a></li>
        
        <li><a href="#"><i class="fa fa-building" aria-hidden="true"></i> <span>Magazin</span> <span class="pull-right-container">
              <small class="label pull-right bg-green">în dezvoltare</small>
            </span></a></li>
          <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> <span>Setări</span> <span class="pull-right-container">
              <small class="label pull-right bg-green">în dezvoltare</small>
            </span></a></li>
             <li><a href="#"><i class="fa fa-cog" aria-hidden="true"></i> <span>Parerea clienților</span> <span class="pull-right-container">
              <small class="label pull-right bg-green">în dezvoltare</small>
            </span></a></li>
      </ul>



<?php 
    function meniuActiv($val){
        
        switch($val){
            case "activ1":
                return "active";
            break;
            case "activ2":
                return "active";
            break;
            case "activ3":
                return "active";
            break;
            case "activ4":
                return "active menu-open";
            break;
        case "activ5":
                return "active";
            break;
        case "activ6":
                return "active";
            break;
        
    }
    }


?>