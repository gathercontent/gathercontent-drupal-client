<?php

namespace Cheppers\GatherContent\DataTypes;

class ElementOptions extends Element
{
    /**
     * @var array
     */
    public $options = [];

    /**
     * {@inheritdoc}
     */
    public function getValue()
    {
        $value = [];
        foreach ($this->options as $option) {
            $value[$option['name']] = $option['selected'];
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     */
    public function setValue($value)
    {
        foreach ($value as $name => $selected) {
            foreach ($this->options as $key => $option) {
                if ($option['name'] === $name) {
                    $this->options[$key]['selected'] = $selected;

                    break;
                }
            }
        }

        return $this;
    }

    public function getOptions(): array
    {
        $options = [];
        foreach ($this->options as $option) {
            $options[$option['name']] = $option['label'];
        }

        return $options;
    }

    /**
     * {@inheritdoc}
     */
    protected function initPropertyMapping()
    {
        $this->propertyMapping += [
            'options' => 'options',
        ];

        return parent::initPropertyMapping();
    }
}
