<?php
declare(strict_types=1);

namespace CreatorIq\Social\Exception;

use InvalidArgumentException;

class UnsupportedTypeException extends InvalidArgumentException
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @param string $type
     */
    public function __construct(string $type)
    {
        parent::__construct('Unsupported class: '.$type);

        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
