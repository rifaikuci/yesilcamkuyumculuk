<?php

function createAttributes($params) {
    return [
        'required' => !empty($params['required']) ? " required" : "",
        'disabled' => !empty($params['disabled']) ? " disabled" : ""
    ];
}

function getTextInput($params)
{
    $size = $params['size'] ?? 6;
    $label = $params['label'] ?? "label";
    $placeholder = $params['placeholder'] ?? $label;
    $name = $params['name'] ?? "name";
    $value = $params['value'] ?? "";
    $attributes = createAttributes($params);

    echo '<div class="col-lg-' . $size . '">
            <div class="form-group">
                <label>' . htmlspecialchars($label) . '</label>
                <input type="text" class="form-control form-control-lg"
                       name="' . htmlspecialchars($name) . '"
                       value="' . htmlspecialchars($value) . '"
                       placeholder="' . htmlspecialchars($placeholder) . '"' .
        $attributes['required'] . $attributes['disabled'] . '>
            </div>
          </div>';
}

function getNumberInput($params)
{
    $size = $params['size'] ?? 6;
    $label = $params['label'] ?? "label";
    $placeholder = $params['placeholder'] ?? "0";
    $name = $params['name'] ?? $label;
    $step = $params['step'] ?? "1";
    $min = $params['min'] ?? 0;
    $max = $params['max'] ?? 1000000;
    $value = $params['value'] ?? "";
    $attributes = createAttributes($params);

    echo '<div class="col-lg-' . $size . '">
            <div class="form-group">
                <label>' . htmlspecialchars($label) . '</label>
                <input type="number" class="form-control form-control-lg"
                       name="' . htmlspecialchars($name) . '"
                       value="' . htmlspecialchars($value) . '"
                       step="' . htmlspecialchars($step) . '"
                       min="' . htmlspecialchars($min) . '"
                       max="' . htmlspecialchars($max) . '"
                       placeholder="' . htmlspecialchars($placeholder) . '"' .
        $attributes['required'] . $attributes['disabled'] . '>
            </div>
          </div>';
}

function getTextHidden($params)
{
    $name = $params['name'] ?? "";
    $value = $params['value'] ?? "";
    echo '<input type="hidden" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '"/>';
}

function getInputFile($params)
{
    $size = $params['size'] ?? 6;
    $label = $params['label'] ?? "label";
    $name = $params['name'] ?? $label;
    $isLabelAlso = $params['isLabelAlso'] ?? false;
    $attributes = createAttributes($params);

    $labelText = $isLabelAlso ? '<label style="color: #0c84ff; font-weight: 500">Relgi güncellemek için Resim seçiniz</label><br>' : '';

    echo '<div class="col-lg-' . $size . '">
            <div class="form-group">
                ' . $labelText . '
                <label>' . htmlspecialchars($label) . '</label>
                <input type="file" class="form-group" name="' . htmlspecialchars($name) . '"' .
        $attributes['required'] . $attributes['disabled'] . '>
            </div>
          </div>';
}

function getViewFile($params)
{
    $size = $params['size'] ?? 6;
    $label = $params['label'] ?? "";
    $path = $params['path'] ? baseUrlBack() . $params['path'] : "#";

    echo '<div class="col-lg-' . $size . '">
            <a href="' . htmlspecialchars($path) . '" data-toggle="lightbox" data-title="' . htmlspecialchars($label) . '" data-gallery="gallery">
                <img src="' . htmlspecialchars($path) . '" class="img-fluid mb-' . $size . '" alt="' . htmlspecialchars($label) . '"/>
            </a>
          </div>';
}

function getPdfLink($params)
{
    getViewFile($params); // Reusing the getViewFile function for PDF links
}

function getTextArea($params)
{
    $size = $params['size'] ?? 12;
    $label = $params['label'] ?? "";
    $placeHolder = $params['placeHolder'] ?? $label;
    $rows = $params['rows'] ?? 3;
    $value = $params['value'] ?? "";
    $name = $params['name'] ?? "";
    $attributes = createAttributes($params);

    echo '<div class="col-lg-' . $size . '">
            <div>
                <label>' . htmlspecialchars($label) . '</label>
                <textarea name="' . htmlspecialchars($name) . '" class="form-control"
                          rows="' . htmlspecialchars($rows) . '"
                          placeholder="' . htmlspecialchars($placeHolder) . '"' .
        $attributes['required'] . $attributes['disabled'] . '>' . htmlspecialchars($value) . '</textarea>
            </div>
          </div>';
}

function getCKEditor($params)
{
    $size = $params['size'] ?? 12;
    $label = $params['label'] ?? "";
    $placeHolder = $params['placeHolder'] ?? $label;
    $value = $params['value'] ?? "";
    $name = $params['name'] ?? "";
    $attributes = createAttributes($params);

    echo '<div class="col-lg-' . $size . '">
            <div>
                <label>' . htmlspecialchars($label) . '</label>
                <textarea class="editorler" id="' . uniqid() . '"' .
        $attributes['required'] . $attributes['disabled'] . '
                          name="' . htmlspecialchars($name) . '"
                          class="form-control"
                          placeholder="' . htmlspecialchars($placeHolder) . '">' . htmlspecialchars($value) . '</textarea>
            </div>
          </div>';
}

function getLinkView($params)
{
    $size = $params['size'] ?? 4;
    $label = $params['label'] ?? "";
    $link = $params['link'] ?? '#';
    $fileArray = explode("/", $link);
    $name = end($fileArray);

    echo '<div class="col-lg-' . $size . '">
            <label>' . htmlspecialchars($label) . '</label>
            <br>
            <a target="_blank" href="' . baseUrlBack() . htmlspecialchars($link) . '">' . htmlspecialchars($name) . '</a>
          </div>';
}
?>
