<?php

namespace Entity;

class Hydrator
{
    /**
     * @param Model\ModelInterface $model
     * @param array $data
     *
     * @return Model\ModelInterface
     */
    public function hydrate(Model\ModelInterface $model, array $data)
    {
        foreach ($data as $name => $value) {
            $setterName = preg_replace_callback(
                '/_./',
                function($matches) {
                    return ucfirst(substr($matches[0], 1));
                },
                sprintf('set%s', ucfirst($name))
            );

            if (!is_callable([$model, $setterName])) {
                continue;
            }

            call_user_func([$model, $setterName], $value);
        }

        return $model;
    }
}