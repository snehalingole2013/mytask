<ul class="navbar-nav ml-auto">
  <li class="nav-item" id="i_product">
    <a class="nav-link" href="<?php echo PROJECT_URL; ?>/product/selectprod.php"> Products <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item" id="i_users">
    <a class="nav-link" href="<?php echo PROJECT_URL; ?>/user/list.php">Users</a>
  </li>
  <li class="nav-item" id="i_product_report">
    <a class="nav-link" href="<?php echo PROJECT_URL; ?>/report/product-report.php">Product Report</a>
  </li>

  <li class="nav-item" id="i_category">
    <a class="nav-link" href="<?php echo PROJECT_URL; ?>/product/category.php">Category</a>
  </li>
  
  <?php
    if (!isset($_SESSION['user'])){ ?>
      <li class="nav-item" id="i_signin">
        <a class="nav-link" href="<?php echo PROJECT_URL; ?>/user/userlogin/login.php">
        Log In</a>
      </li>  
    <?php   
    }
    else
    { ?>
      <li class="nav-item" id="i_logout">
        <a class="nav-link" href="<?php echo PROJECT_URL; ?>/user/userlogin/logout.php">Log Out</a>
      </li>  
    <?php
      }
    ?>

</ul>

<form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search">
  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>