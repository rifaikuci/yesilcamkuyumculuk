<?php

function getButton($params = [])
{
    // Set default values
    $style = $params['style'] ?? "btn btn-outline-dark";
    $align = $params['align'] ?? null;
    $title = $params['title'] ?? "Title";
    $name = $params['name'] ?? "";
    $disabled = $params['disabled'] ?? false;

    // Add alignment class if provided
    if ($align) {
        $style .= " float-" . htmlspecialchars($align);
    }

    // Prepare the disabled attribute
    $disabledAttr = $disabled ? " disabled " : "";

    // Build the button HTML
    $html = '<button name="' . htmlspecialchars($name) . '" type="submit" class="' . htmlspecialchars($style) . '"' . $disabledAttr . '>' . htmlspecialchars($title) . '</button>';

    echo $html;
}

?>
