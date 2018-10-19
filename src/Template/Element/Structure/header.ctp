<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php if(!empty($this->request->action) && ($this->request->action!='dashboard') ): ?>
                <a class="navbar-brand ml-2" href="#" onclick="javascript:history.back()">
                    <i class="pe-7s-angle-left-circle" style="position:relative;top:2px;"></i>
                </a>
            <?php endif; ?>
        </div>
        <div class="collapse navbar-collapse">
<!--             <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-dashboard"></i>
                    </a>
                </li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                            <b class="caret"></b>
                            <span class="notification">5</span>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Notification 1</a></li>
                        <li><a href="#">Notification 2</a></li>
                        <li><a href="#">Notification 3</a></li>
                        <li><a href="#">Notification 4</a></li>
                        <li><a href="#">Another notification</a></li>
                      </ul>
                </li>
                <li>
                   <a href="">
                        <i class="fa fa-search"></i>
                    </a>
                </li>
            </ul> -->

            <ul class="nav navbar-nav navbar-right">

                <li>
                </li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user-circle-o" style="font-size:1em;position:relative;top:-1px;"></i>
                            <?= $this->ExtendedUser->displayName();?>
                            <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                            <a href="/profiles/edit/<?= $this->request->session()->read('Auth.User.id'); ?>">Profile</a>
                        </li>
                        <li>
                            <a href="/users/users/change_password/">Change Password</a>
                        </li>
                        <li>
                            <?= $this->ExtendedUser->logout();?>
                        </li>
                      </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>