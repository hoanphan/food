<?php

use app\controllers\CategoryController;
use app\widgets\Sidebar;

use dektrium\user\controllers\AdminController;
use navatech\language\Translate;
use navatech\role\controllers\DefaultController;
use navatech\role\helpers\RoleChecker;
use yii\helpers\Url;
use yii\widgets\Menu;

?>
<div id="page-sidebar">
    <div class="scroll-sidebar">
        <div id="page-sidebar">
            <div class="scroll-sidebar">
                <ul id="sidebar-menu">
                    <li class="header"><span>Điều khiển</span></li>
                    <li class="<?= Sidebar::isActive('site') ?>">
                        <a href="<?= Url::to(['site/index']) ?>" title="Admin Dashboard">
                            <i class="glyph-icon icon-linecons-tv"></i>
                            <span>Admin dashboard</span>
                        </a>
                    </li>
                    <li class="header"><span>Tác vụ</span></li>

                    <li class="<?= Sidebar::isActive('category') ?>">
                        <a href="#" title="Elements">
                            <i class="glyph-icon  icon-iconic-layers"></i>
                            <span><?=Translate::category()?></span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="<?= Url::to(['/category/index']) ?>"
                                       title="List User"><span><?=Translate::list()?> </span></a></li>

                                <li><a href="<?= Url::to(['/category/create']) ?>"
                                       title="Create user"><span><?=Translate::create()?></span></a>

                                </li>

                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li class="<?= Sidebar::isActive('product') ?>">
                        <a href="#" title="Elements">
                            <i class="glyph-icon icon-iconic-box"></i>
                            <span><?=Translate::product()?></span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="<?= Url::to(['/product/index']) ?>"
                                       title="List User"><span><?=Translate::list()?> </span></a></li>

                                <li><a href="<?= Url::to(['/product/create']) ?>"
                                       title="Create user"><span><?=Translate::create()?></span></a>

                                </li>

                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li class="<?= Sidebar::isActive('distributor') ?>">
                        <a href="#" title="Elements">
                            <i class="glyph-icon icon-elusive-picasa"></i>
                            <span><?=Translate::distributor()?></span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="<?= Url::to(['/distributor/index']) ?>"
                                       title="List User"><span><?=Translate::list()?> </span></a></li>

                                <li><a href="<?= Url::to(['/distributor/create']) ?>"
                                       title="Create user"><span><?=Translate::create()?></span></a>

                                </li>

                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                    <li class="<?= Sidebar::isActive('language') ?>">
                        <a href="#" title="Elements">
                            <i class="glyph-icon  icon-language"></i>
                            <span><?=Translate::language()?></span>
                        </a>
                        <div class="sidebar-submenu">

                            <ul>
                                <li><a href="<?= Url::to(['/language/index']) ?>"
                                       title="List User"><span><?=Translate::language()?> </span></a></li>

                                <li><a href="<?= Url::to(['/language/phrase']) ?>"
                                       title="Create user"><span><?=Translate::phrase()?></span></a>

                                </li>

                            </ul>

                        </div><!-- .sidebar-submenu -->
                    </li>
                </ul><!-- #sidebar-menu -->


            </div>
        </div>

    </div>
</div>