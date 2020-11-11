<?php

declare(strict_types=1);

namespace Auth\Form;

use Laminas\Form\Form;
use Laminas\InputFilter\InputFilter;

class LoginForm extends Form
{
    public function init()
    {
        $this->setName('frm-login');
        $this->setAttribute('method', 'post');
        $this->addElements();
        $this->addInputFilter();
    }

    private function addElements()
    {
        $this->add([
            'type' => 'text',
            'name' => 'username',
            'options' => [
                'label' => 'Username',
            ],
            'attributes' => [
                'id' => 'txtusername',
                'required' => true,
                'class' => 'form-control shadow-sm px-3 py-4',
                'tabindex' => 1
            ]
        ]);

        $this->add([
            'type' => 'password',
            'name' => 'password',
            'options' => [
                'label' => 'Password',
            ],
            'attributes' => [
                'id' => 'txtpassword',
                'required' => true,
                'class' => 'form-control shadow-sm px-3 py-4',
                'tabindex' => 2
            ]
        ]);
    }

    private function addInputFilter()
    {
        $inputFilter = new InputFilter();
        $this->setInputFilter($inputFilter);

        $inputFilter->add([
            'name'     => 'username',
            'required' => true,
            'filters'  => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
                ['name' => 'StripNewlines'],
            ],                
            'validators' => [
                ['name'    => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 255
                    ],
                ],
            ],
        ]);

        $inputFilter->add([
            'name'     => 'password',
            'required' => true,
            'filters'  => [
                ['name' => 'StringTrim'],
                ['name' => 'StripTags'],
                ['name' => 'StripNewlines'],
            ],                
            'validators' => [
                ['name'    => 'StringLength',
                    'options' => [
                        'min' => 1,
                        'max' => 255
                    ],
                ],
            ],
        ]);
    }
}
