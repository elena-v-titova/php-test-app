<?php

/**
 * The Validation class
 */
class Validation
{
    /**
     * The validation value
     */
    private $value;

    /**
     * The type of the validation value
     */
    private $type;

    public function __construct($value, $type)
    {
        $this->value = $value;
        $this->type = $type;

        return $this;
    }

    /**
     * Clean the value.
     */
    private function clean()
    {
        $this->value = trim($this->value);
        $this->value = stripslashes($this->value);
        $this->value = strip_tags($this->value);
        $this->value = htmlspecialchars($this->value);
    }

    /**
     * Validate the value.
     *
     * @return mixed|null
     */
    public function validate()
    {
        $this->clean();

        if (!empty($this->value)) {
            switch ($this->type) {
                case 'string':
                    $val = filter_var($this->value,
                        FILTER_VALIDATE_REGEXP,
                        array('options'=>array('regexp' => '/[\p{L}\s\d]+/'))
                    );
                    break;
                case 'int':
                    $val = filter_var($this->value, FILTER_VALIDATE_INT);
                    break;
                case 'float':
                    $val = filter_var($this->value, FILTER_VALIDATE_FLOAT);
                    break;
            }

            if ($val) {
                return $val;
            }
        }
        return NULL;
    }
}

