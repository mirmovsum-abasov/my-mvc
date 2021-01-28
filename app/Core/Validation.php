<?php

namespace App\Core\Validation;

use app\Core\Session\Session;

class Validation
{
    protected $value;
    protected $method;
    protected $input;
    protected $label;

    public $errors = [];

    public function check($method, $input, $label)
    {
        $this->value  = $method["$input"];
        $this->label  = $label;
        $this->input  = $input;
        $this->method = $method;
        return $this;
    }

    public function required()
    {
        if (empty($this->method["$this->input"])) {
            $this->errors[] = $this->label . ' bosdur';
        }
        return $this;
    }

    public function string()
    {
        if (!is_string($this->method["$this->input"])) {
            $this->errors[] = $this->label . ' bolmesinde xeta var';
        }
        return $this;
    }

    public function alpha()
    {

        if (!ctype_alpha($this->method["$this->input"])) {
            $this->errors[] = $this->label . ' bolmesi hərflərdən ibarət deyil';
        }
        return $this;
    }

    public function max($max)
    {
        if (strlen($this->value) > $max) {
            $this->errors[] = $this->label . ' ' . $max . ' simvoldan coxdur.';
        }
        return $this;
    }

    public function min($min)
    {
        if (strlen($this->value) < $min) {
            $this->errors[] = $this->label . ' ' . $min . ' simvoldan azdir.';
        }
        return $this;
    }

    public function email()
    {
        if (!filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = $this->label . ' adressi duzgun formatda deyil.';
        }
        return $this;
    }

    public function unique($table, $column)
    {
        $table = ucfirst($table);
        $find  = $table::where($column, '=', $this->value)->first();
        if (!empty($find)) {
            $this->errors[] = $this->label . ' bazada movcuddur.';
        }
        return $this;
    }

    public function exists($table, $column)
    {
        $table = ucfirst($table);
        $find  = $table::where($column, '=', $this->value)->first();
        if (empty($find)) {
            $this->errors[] = $this->label . 'də qeyd etdiyiniz məlumatlar bazada movcud deyil.';
        }
        return $this;
    }

    public function confirm($input_name)
    {
        if ($this->method["$this->input"] !== $this->method["$input_name"]) {
            $this->errors[] = $this->label . 'lər uyğun deyil.';
        }
        return $this;
    }

    public function numeric()
    {
        if (!is_numeric($this->value)) {
            $this->errors[] = $this->label . ' ədədlərdən ibarət deyil.';
        }
    }

    public function hasError()
    {
        if (!empty($this->errors)) {
            return true;
        } else {
            return false;
        }
    }

}