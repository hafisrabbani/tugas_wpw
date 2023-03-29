<?php

class Validation
{
    private $input;
    private $rules = [];
    private $messages = [];
    public function __construct($input, $rules = [], $messages = [])
    {
        $this->input = $input;
        $this->rules = $rules;
        $this->messages = $messages;
    }

    public function validate()
    {
        $errors = [];
        foreach ($this->rules as $key => $rule) {
            $rules = explode('|', $rule);
            foreach ($rules as $rule) {
                $rule = explode(':', $rule);
                $method = $rule[0];
                $param = $rule[1] ?? null;
                if (!$this->$method($key, $param)) {
                    $errors[$key][] = $this->messages[$key][$method];
                }
            }
        }
        return $errors;
    }

    private function required($key)
    {
        return isset($this->input[$key]) && !empty($this->input[$key]);
    }

    private function numeric($key)
    {
        return is_numeric($this->input[$key]);
    }

    private function isAlphabet($key)
    {
        return ctype_alpha($this->input[$key]);
    }

    private function min($key, $param)
    {
        return $this->input[$key] >= $param;
    }

    private function max($key, $param)
    {
        return $this->input[$key] <= $param;
    }
}
