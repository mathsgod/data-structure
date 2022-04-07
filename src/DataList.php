<?php

namespace R;

use PHP\Util\Lists;

class DataList extends Lists
{
    public function asArray()
    {
        return $this->all();
    }

    // -- RList
    public function first()
    {
        return $this->all()[0];
    }

    public function top(int $num)
    {
        return new self(array_slice($this->all(), 0, $num));
    }

    public function reverse()
    {
        return new self(array_reverse($this->all()));
    }

    public function slice($offset, $length = null)
    {
        return new self(array_slice($this->all(), $offset, $length));
    }

    public function page($page, $page_size)
    {
        return $this->slice(($page - 1) * $page_size, $page_size);
    }

    public function usort($callback)
    {
        $data = $this->all();
        usort($data, $callback);
        return new self($data);
    }

    public function single()
    {
        $first = $this->first();
        return array_shift(array_slice($first, 0, 1));
    }



    public function udiff($array, $callback)
    {
        return new self(array_udiff($this->all(), (array) $array, $callback));
    }

    public function substract($array, $callback)
    {
        $data = $this->filter(function ($o) use ($array, $callback) {
            foreach ($array as $a) {
                if ($callback($o, $a)) {
                    return false;
                }
            }
            return true;
        });
        return $data;
    }

    public function each(callable $callback)
    {
        return array_walk($this, $callback);
        foreach ($this as $k => $v) {
            $callback($v, $k);
        }
    }

    public function implode($glue)
    {
        return implode($glue, $this->asArray());
    }
}
