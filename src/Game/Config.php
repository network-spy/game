<?php

declare(strict_types=1);

namespace Game;

/**
 * Class Config
 * @package Game
 */
class Config
{
    /**
     * @var array
     */
    private $config;

    /**
     * Config constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $param
     * @return mixed
     */
    public function get(string $param)
    {
        $params = \explode('.', $param);
        $value = $this->getValue($params, $this->config);

        return $value;
    }

    /**
     * @param array $params
     * @param array $config
     * @param int $level
     * @return mixed
     */
    private function getValue(array $params, array $config, int $level = 0)
    {
        $param = $params[$level];
        $value = $config[$param];
        $nextLevel = $level + 1;
        if (\is_array($value) && isset($params[$nextLevel]) && $this->isArrayAssoc($value)) {
            $value = $this->getValue($params, $value, $nextLevel);
        }

        return $value;
    }

    /**
     * @param array $array
     * @return bool
     */
    private function isArrayAssoc(array $array): bool
    {
        foreach ($array as $key => $value) {
            if (!\is_int($key)) {
                return true;
            }
        }

        return false;
    }
}
