

<nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow sticky-top">
  <!-- Brand -->
  
  <a class="navbar-brand" href="/bluepaw/welcome"><img src="/bluepaw/public/img/mainLogo.png" width="120px"/></a>

  
  <?php if($this->ion_auth->logged_in()): ?>
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="nav navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link" href="/bluepaw/region"><?php echo lang('menu_region_page'); ?></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/bluepaw/building"><?php echo lang('menu_building_page'); ?></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/bluepaw/office"><?php echo lang('menu_office_page'); ?></a>
      </li>
      
            <li class="nav-item">
        <a class="nav-link" href="/bluepaw/employee"><?php echo lang('menu_employee_page'); ?></a>
      </li>
      
      
      <li class="nav-item">
        <a class="nav-link" href="/bluepaw/dog"><?php echo lang('menu_dog_page'); ?></a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link" href="/bluepaw/position"><?php echo lang('menu_position_page'); ?></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/bluepaw/responsibilities"><?php echo lang('menu_responsibilities_page'); ?></a>
      </li>
      
    </ul>

    <ul class="nav navbar-nav ml-auto">
      <li>
          <div class="btn-nav">
              <?php echo '<a href="/bluepaw/auth/logout" class="btn btn-warning form-control">'. lang('logout') .'</a>'; ?>
          </div>
      </li>
    </ul>  
      
    </div>
  



  <?php endif; ?>
</nav> 