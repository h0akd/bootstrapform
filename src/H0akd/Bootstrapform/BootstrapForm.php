<?php

namespace H0akd\Bootstrapform;

use Illuminate\Html\FormBuilder;

class BootstrapForm extends FormBuilder {

    public function __construct(\Illuminate\Html\HtmlBuilder $html, \Illuminate\Routing\UrlGenerator $url, $csrfToken) {
        parent::__construct($html, $url, $csrfToken);
    }

    public function open(array $options = array()) {
        $defaults = array("role" => "form");
        $options = array_merge($defaults, $options);
        return parent::open($options);
    }

    public function input($type, $name, $value = null, $options = array()) {
        $defaults = array();
        if ($type !== "file") {
            if (array_key_exists("class", $options)) {
                $options["class"] = "form-control " . $options['class'];
            } else {
                $defaults["class"] = "form-control";
            }
        }
        $options = array_merge($defaults, $options);
        return parent::input($type, $name, $value, $options);
    }

    public function checkbox2($label, $name, $value = 1, $checked = null, $options = array()) {
        $html = '<div class="checkbox">';
        $html .= '<label>';
        $html .= '<input type="checkbox" name="' . $name . '" value="' . $value . '" ' . $this->html->attributes($options) . ($checked ? " checked" : "") . '>' . $label;
        $html .= '</label>';
        $html .= '</div>';
        return $html;
    }

    public function button($value = null, $level = "default", $options = array()) {
        if (array_key_exists('class', $options)) {
            $options['class'] = "btn btn-$level " . $options['class'];
        } else {
            $options['class'] = "btn btn-$level";
        }
        return parent::button($value, $options);
    }

    public function submit($value = null, $options = array()) {
        $defaults = array("type" => "submit");
        $options = array_merge($defaults, $options);
        return $this->button($value, "primary", $options);
    }

    public function reset($value = null, $options = array()) {
        $defaults = array("type" => "reset");
        $options = array_merge($defaults, $options);
        return $this->button($value, "primary", $options);
    }

    public function actionButtons($submitValue = "Submit", $resetValue = "Reset") {
        return $this->submit($submitValue) . "&nbsp;&nbsp;&nbsp;" . $this->reset($resetValue);
    }

    public function help($text) {
        return "<p class=\"help-block\">$text</p>";
    }

    public function select($name, $list = array(), $selected = null, $options = array()) {
        $defaults = array("class" => "form-control");
        $options = array_merge($defaults, $options);
        return parent::select($name, $list, $selected, $options);
    }

    public function radio2($label, $name, $value = null, $checked = null, $options = array()) {
        $html = '<div class="radio">';
        $html .= '<label>';
        $html .= '<input type="radio" name="' . $name . '" value="' . $value . '" ' . $this->html->attributes($options) . ($checked ? " checked" : "") . '>' . $label;
        $html .= '</label>';
        $html .= '</div>';
        return $html;
    }

    public function startGroup($has = "") {
        return '<div class="form-group ' . ($has !== "" ? "has-$has" : "") . '"\>';
    }

    public function endGroup() {
        return $this->closeTag("div");
    }

    public function closeTag($tag) {
        return "</$tag>";
    }

}
