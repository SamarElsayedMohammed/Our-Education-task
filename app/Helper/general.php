<?php
function printTreeArray($array, $allMenu = "", $tree = false)
{
    $sideMenu = "";
    foreach ($array as $value) {

        if (is_array($value['sub_menu']) && count($value['sub_menu']) > 0) {
            $sideMenu .= <<<SIDEMENU
                                <li class="treeview">
                                    <a class="app-menu__item" href="{$value['route']}" data-toggle="treeview"><i
                                            class="app-menu__icon {$value["icon"]}"></i><span class="app-menu__label">{$value["title"]}</span><i
                                            class="treeview-indicator fa fa-angle-right"></i></a>
                                    <ul class="treeview-menu">            
                            SIDEMENU;
            $sideMenu .= printTreeArray($value['sub_menu'], $sideMenu, $tree = true);
            $sideMenu .= '</ul></li>';
            $allMenu = $sideMenu;
        } else {
            if ($tree == true) {
                $sideMenu .= <<<INNERBRANCH
                    <li>
                        <a class="treeview-item" href="{$value["route"]}"><i class="icon {$value['icon']}"></i>
                            <span>{$value["title"]}</span></a>
                    </li>
                INNERBRANCH;
                $allMenu = $sideMenu;
            } else {
                $sideMenu .= <<<INNER
                                    <li>
                                    <a class="app-menu__item active" href="{$value["route"]}"
                                        ><i class="app-menu__icon {$value['icon']}"></i
                                        ><span class="app-menu__label">{$value["title"]}</span></a
                                    >
                                    </li>
                                INNER;
                $allMenu = $sideMenu;

            }
        }
    }
    return $allMenu;
}