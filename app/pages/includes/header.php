<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head><script src="<?=ROOT?>/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Home - <?=APP_NAME?></title>

<link href="<?=ROOT?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <style>

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }
    </style>
    
    <!-- Custom styles for this template -->
    <link href="<?=ROOT?>/assets/css/headers.css" rel="stylesheet">
    
 
  <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
          <img class="bi me-2" src="<?=ROOT?>/assets/images/pngegg (7).png" width="60" height="52" style="object-fit: cover;">
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="<?=ROOT?>" class="nav-link px-2 link-secondary">Home</a></li>
          <li><a href="<?=ROOT?>/blog" class="nav-link px-2 link-body-emphasis">Blog</a></li>
          <li><a href="<?=ROOT?>/contact" class="nav-link px-2 link-body-emphasis">Contact</a></li>

          <span class="nav-link px-2 link-dark dropdown text-end">
              <a href="#" class="d-block <?=$url[0] =='category' ? 'link-primary':'link-dark'?> text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                Category
              </a>
              <ul class="dropdown-menu text-small">
               
               <?php  

                  $query = "select * from categories order by id desc";
                  $categories = query($query);
                ?>
                <?php if(!empty($categories)):?>
                  <?php foreach($categories as $cat):?>
                    <li><a class="dropdown-item" href="<?=ROOT?>/category/<?=$cat['slug']?>"><?=$cat['category']?></a></li>
                  <?php endforeach;?>
                <?php endif;?>

                
              
              </ul>
            </span>
          </li>
        </ul>
        <form action="<?=ROOT?>/search" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3"role="Search">
            <div class="input-group">
               <input value="<?=$_GET['find'] ?? ''?>" name="find" type="search" class="from-control"placeholder="Search..."aria-label="Search">
               <button class="btn btn-primary">Find</button>
            </div>
        </form>


        <?php if(logged_in()):?>
        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="<?=get_image(user('image'))?>" alt="mdo" style="object-fit: cover;" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="#">Hi, <?=user('username')?></a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><a class="dropdown-item" href="<?=ROOT?>/admin">Admin</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?=ROOT?>/logout">Sign out</a></li>
          </ul>
        </div>
        <?php endif;?>

      </div>
    </div>
  </header>

<?php
  if($url[0] == 'home')
  include '../app/pages/includes/slider.php'

?>
  
  <main class="p-2">
    
