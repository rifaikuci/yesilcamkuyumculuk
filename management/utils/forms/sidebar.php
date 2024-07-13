<?php

function menuTreeTitle($title = "Dashboard", $classIcon = "fas fa-tachometer-alt")
{
    echo '<a href="#" class="nav-link">
            <i class="nav-icon ' . htmlspecialchars($classIcon) . '"></i>
            <p>' . htmlspecialchars($title) . '
                <i class="right fas fa-angle-left"></i>
            </p>
          </a>';
}

function menuTreeSubTitle($title = "Alt Title 1", $classIcon = "fas fa-tachometer-alt", $link = "", $target = "_parent", $badge = "")
{
    $active = $link && isUrlActive($link) > 0 ? "active" : "";
    $link = $link ? baseUrlBack() . $link : baseUrlBack() . "#";

    echo '<li class="nav-item">
            <a href="' . htmlspecialchars($link) . '" class="nav-link ' . $active . '" target="' . htmlspecialchars($target) . '">
                <i class="nav-icon ' . htmlspecialchars($classIcon) . '"></i>
                <p>' . htmlspecialchars($title) . '</p>' . $badge . '
            </a>
          </li>';
}

function menuLabel($title = "Alt Title 1", $color = "")
{
    echo '<li class="nav-header text-' . htmlspecialchars($color) . '">' . htmlspecialchars($title) . '</li>';
}

function badge($title = "", $type = "danger")
{
    return '<span class="right badge badge-' . htmlspecialchars($type) . '">' . htmlspecialchars($title) . '</span>';
}

function menuTitleWithDot($title = "", $color = "", $link = "#", $pageType = "")
{
    echo '<li class="nav-item">
            <a href="' . htmlspecialchars($link) . '" target="' . htmlspecialchars($pageType) . '" class="nav-link">
                <i class="nav-icon far fa-circle text-' . htmlspecialchars($color) . '"></i>
                <p class="text">' . htmlspecialchars($title) . '</p>
            </a>
          </li>';
}
?>
