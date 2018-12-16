<?php $witty_statement = "Welcome back, $name!"; ?>

<div class="bg-dark text-light">
    <nav class="container navbar navbar-dark navbar-expand-sm" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= $_SERVER['PHP_SELF'] ?>"><h2>DynAggelos</h2></a>
            </div><!-- navbar-header -->

            <div class="navbar-body">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#website-navbar">
                    <span class="navbar-toggler-icon" aria-label="Toggle navigation"></span>
                </button>
            </div><!-- navbar-body -->

            <div class="collapse navbar-collapse" id="website-navbar">
                <ul class="navbar-nav">
                  <li class="nav-item<?php if (!isset($_GET['page']) || $_GET['page'] === 'home') {echo ' active';} ?>"><a class="nav-link" href="<?= $_SERVER['PHP_SELF'] ?>">Home</a></li>
                  <li class="nav-item<?php if (isset($_GET['page']) && $_GET['page'] === 'images') {echo ' active';} ?>"><a class="nav-link" href="<?= $_SERVER['PHP_SELF'] . '?page=images' ?>">Images</a></li>
                  <li class="nav-item<?php if (isset($_GET['page']) && $_GET['page'] === 'forum') {echo ' active';} ?>"><a class="nav-link" href="<?= $_SERVER['PHP_SELF'] . '?page=forum' ?>">Forum</a></li>
                </ul>

                <div class="ml-auto">
                    <button id="settings-button" class="btn bg-light mx-2">Settings</button>
                    <div id="settings-window" class="window hidden">
                        <form id="settings-form" name="settings-form" method="post" action="" class="form-group ml-auto">
                            <label for="style-selector">Site Theme</label>
                            <select id="style-selector" name="style-selector" class="mb-2">
                                <option value="default">Default</option>
                                <option value="light">Light</option>
                                <option value="dark">Dark</option>
                                <option value="no-blue">Don't Sing the Blues</option>
                            </select>
                            <button class="btn bg-light my-2 my-sm-0" type="submit">Update</button>
                        </form>
                    </div>

                    <?php
                        if (!isset($_SESSION['name']))
                        {
                            ?><button id="login-button" class="btn bg-light mx-2">User Login</button>
                            <div id="login-window" class="window hidden">
                                <form id="login-form" name="login-form" method="post" action="form/login.php?page=<?= $page ?>" class="form-group ml-auto">
                                    <input id="username" name="username" class="form-control mb-3" type="search" placeholder="Username" aria-label="Username">
                                    <input id="password" name="password" class="form-control mb-3" type="search" placeholder="Password" aria-label="Password">
                                    <button class="btn bg-light my-2 my-sm-0" type="submit">Login</button>
                                </form>
                            </div><?php
                        }
                        else
                        {
                            ?><form id="logout-form" name="logout-form" method="post" action="form/logout.php?page=<?= $page ?>" class="form-inline ml-auto" style="display: inline;">
                              <button class="btn bg-light my-2 my-sm-0" type="submit">Logout</button>
                            </form><?php
                        }
                    ?>
                </div>

            </div><!-- navbar-collapse -->
        </div><!-- container-fluid -->
    </nav>
    <div class="container d-flex flexbox-fluid px-3">
        <?php
            if (!isset($_SESSION['name']))
            {
                ?><div class="pb-2 ml-auto"><a href="<?= $_SERVER['PHP_SELF']; ?>?page=create-account">Create Account</a></div><?php
            }
            else
            {
                // ToDo: Add witty statements
                ?>
                <div class="pb-2"><?= $witty_statement; ?></div>
                <?php
            }
        ?>
    </div>
</div>
