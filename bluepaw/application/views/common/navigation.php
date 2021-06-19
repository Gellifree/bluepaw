 <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow">
  <!-- Brand -->
  
  <a class="navbar-brand" href="/bluepaw/welcome"><img src="/bluepaw/public/img/mainLogo.png" width="120px"/></a>

  
  <?php if($this->ion_auth->logged_in()): ?>
  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link" href="/bluepaw/region/list"><?php echo lang('menu_region_page'); ?></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/bluepaw/building/list"><?php echo lang('menu_building_page'); ?></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/bluepaw/office/list"><?php echo lang('menu_office_page'); ?></a>
      </li>
      
            <li class="nav-item">
        <a class="nav-link" href="/bluepaw/employee/list"><?php echo lang('menu_employee_page'); ?></a>
      </li>
      
      
      <li class="nav-item">
        <a class="nav-link" href="/bluepaw/dog/list"><?php echo lang('menu_dog_page'); ?></a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link" href="/bluepaw/position/list"><?php echo lang('menu_position_page'); ?></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/bluepaw/responsibilities/list"><?php echo lang('menu_responsibilities_page'); ?></a>
      </li>
      
      <?php if($this->ion_auth->logged_in()): ?>
      <?php
        echo '<li>  <a href="/bluepaw/auth/logout" class="btn btn-warning">'. lang('logout') .'</a></li>';
      ?>
      <?php endif; ?>
    </ul>
  </div>
  <?php endif; ?>
</nav> 