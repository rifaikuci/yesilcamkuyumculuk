<?php

function getSelect($options = [])
{
    // Set default values using array_merge for flexibility
    $defaults = [
        'size' => 6,
        'data' => ['' => "Seçiniz"],
        'label' => "Label",
        'name' => "",
        'color' => "blue",
        'multiple' => false,
        'selected' => "",
        'required' => false,
        'disabled' => false
    ];

    // Merge provided options with defaults
    $config = array_merge($defaults, $options);

    // Prepare HTML attributes
    $multipleAttr = $config['multiple'] ? 'multiple ' : '';
    $requiredAttr = $config['required'] ? ' required ' : '';
    $disabledAttr = $config['disabled'] ? ' disabled ' : '';

    // Begin building the select HTML
    $html = '<div class="col-sm-' . $config['size'] . '">
                <div class="select2-' . $config['color'] . '">
                    <div class="form-group">
                        <label>' . htmlspecialchars($config['label']) . '</label>
                        <select name="' . htmlspecialchars($config['name']) . '" class="form-control select2"
                                data-dropdown-css-class="select2-' . $config['color'] . '"
                                style="width: 100%;" ' . $multipleAttr . $requiredAttr . $disabledAttr . '>';

    // Generate options
    foreach ($config['data'] as $key => $value) {
        $selectedAttr = ($key == $config['value']) ? ' selected' : '';
        $html .= '<option value="' . htmlspecialchars($key) . '"' . $selectedAttr . '>' . htmlspecialchars($value) . '</option>';
    }

    // Close the select and div tags
    $html .= '   </select>
                    </div>
                </div>
            </div>';

    echo $html;
}

?>
