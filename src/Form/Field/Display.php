<?php

namespace Encore\Admin\Form\Field;

use Closure;
use Encore\Admin\Form\Field;

class Display extends Field
{
    protected $callback;

    public function format(Closure $callback)
    {
        $this->callback = $callback;
    }

    public function render()
    {
        if ($this->callback instanceof Closure) {
            $this->value = call_user_func($this->callback, $this->value);
        }

        return parent::render();
    }
}
