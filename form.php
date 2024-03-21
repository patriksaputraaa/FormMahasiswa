<?php
class Form
{
    private $action;
    private $judul;
    private $kontrol = array();

    public function __construct($action, $judul)
    {
        $this->action = $action;
        $this->judul = $judul;
    }

    public function show()
    {
        echo "<br>\n<form action='$this->action' method='post'>\n";
        echo "<table border=1>\n";
        echo "<caption>\n$this->judul</caption>\n";
        foreach ($this->kontrol as $field => $input) {
            echo "<tr>\n";
            echo "<td>" . ucwords($field) . "</td>\n";
            echo "<td>$input</td>\n";
            echo "</tr>\n";
        }
        echo "<tr>\n";
        echo "<td colspan=2 align=center>\n";
        echo "<input type='submit' value='Submit'> <input type='reset' value='Reset'>\n";
        echo "</td>\n";
        echo "</tr>\n";
        echo "</table>\n<br>\n";
        echo "</form>";
    }

    public function addTextBox($name, $width = "50", $default_value = "")
    {
        $this->kontrol[$name] = $this->textBox($name, $width, $default_value);
    }

    private function textBox($name, $width = "50", $default_value = "")
    {
        $text_box = "<input type='text' name='$name'size='$width' value='$default_value'>";
        return $text_box;
    }

    public function addComboBox($name, $elements, $active_status)
    {
        $this->kontrol[$name] = $this->comboBox($name, $elements, $active_status);
    }

    private function comboBox($name, $elements, $active_status)
    {
        $combo_box = "<select name='$name'>\n";
        foreach ($elements as $element) {
            if ($element == $active_status) {
                $combo_box = $combo_box . "<option selected>$element</option>\n";
            } else {
                $combo_box = $combo_box . "<option>$element</option>\n";
            }
        }
        $combo_box = $combo_box . "</select>";
        return $combo_box;
    }

    public function addCheckBox($names, $values, $default_value)
    {
        $this->kontrol[$names] = $this->checkBox($names, $values, $default_value);
    }


    private function checkBox($names, $values, $default_values)
    {
        $check_box = "";
        foreach ($values as $value){
            if(strpos($default_values,$value) === FALSE){
                $check_box .= "<input type='checkbox' id='$names' name='" . $names . "[]' value='$value'>\n";
                $check_box .= "<label for='" . $names . "[]'>$value</label>\n";
            }else{
                $check_box .= "<input type='checkbox' id='$names' name='" . $names . "[]' value='$value' checked>\n";
                $check_box .= "<label for='" . $names . "[]'>$value</label>\n";
            }
        }
        return $check_box;
    }

    public function addRadioButton($names, $values, $default_value)
    {
        $this->kontrol[$names] = $this->radioButton($names, $values, $default_value);
    }

    private function radioButton($names, $values, $default_value)
    {
        $radio_button = "";
        foreach ($values as $value) {
            if ($value == $default_value) {
                $radio_button .= "<input type='radio' id='$value' name='$names' value='$value' checked>";
                $radio_button .= "<label for='$value'>$value</label><br>";
            } else {
                $radio_button .= "<input type='radio' id='$value' name='$names' value='$value'>";
                $radio_button .= "<label for='$value'>$value</label><br>";
            }
        }
        return $radio_button;
    }
}
