<?php
require_once "date.php";

function getDatetime($params = [])
{
    // Set default values using null coalescing operator
    $size = $params['size'] ?? 4;
    $label = $params['label'] ?? "label2";
    $name = $params['name'] ?? "name23";
    $value = $params['value'] ?? '';
    $required = $params['required'] ?? false;
    $disabled = $params['disabled'] ?? false;

    // Determine the value for the date input
    if ($value === 'notToday') {
        $value = '';
    } elseif ($value) {
        $value = dateValue($value);
    } else {
        $value = date("Y-m-d");
    }

    // Prepare required and disabled attributes
    $requiredAttr = $required ? " required" : "";
    $disabledAttr = $disabled ? " disabled" : "";

    // Build the HTML output
    $html = '<div class="col-sm-' . htmlspecialchars($size) . '">
                <div class="form-group">
                    <label>' . htmlspecialchars($label) . '</label>
                    <input type="date"
                           value="' . htmlspecialchars($value) . '"
                           class="form-control form-control-lg"
                           name="' . htmlspecialchars($name) . '"' .
        $requiredAttr .
        $disabledAttr . '>
                </div>
            </div>';

    echo $html;
}
?>
