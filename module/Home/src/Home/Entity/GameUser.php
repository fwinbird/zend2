<?php

namespace Home\Entity;

use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
//use Wall\Entity\Link;
//use Wall\Entity\Image;
//use Wall\Entity\Status;

class GameUser
{
    const GENDER_MALE = 1;
    
    protected $id;
    protected $username;
    protected $name;
    protected $location;
    protected $gender;
    protected $password;
    
    public function setId($id)
    {
        $this->id = (int)$id;
    }
    
    public function setUsername($username)
    {
        $this->username = $username;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
 
    public function setLocation($location)
    {
        $this->location = $location;
    }
    
    public function setGender($gender)
    {
        $this->gender = (int)$gender;
    }
    
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getUsername()
    {
        return $this->username;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
   
    public function getLocation()
    {
        return $this->location;
    }
    
    public function getGender()
    {
        return $this->gender;
    }
    
    
    public function getGenderString()
    {
        return $this->gender == self::GENDER_MALE? 'Male' : 'Female';
    }
    
    
    /**
     * Return the configuration of the validators and filters for this form
     *
     * @return InputFilter
     */
/*    
    public static function getInputFilter()
    {
        $inputFilter = new InputFilter();
        $factory = new InputFactory();
        
        $inputFilter->add($factory->createInput(array(
            'name'     => 'username',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true
                ),
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 1,
                        'max' => 50
                    ),
                ),
            ),
        )));
        
        $inputFilter->add($factory->createInput(array(
            'name'     => 'email',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true
                ),
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 6,
                        'max' => 254
                    ),
                    'break_chain_on_failure' => true
                ),
                array(
                    'name' => 'EmailAddress',
                    'options' => array(
                        'messages' => array(
                            \Zend\Validator\EmailAddress::INVALID_FORMAT => 'The input is not a valid email address',
                        )
                    )
                ),
            ),
        )));
        
        $inputFilter->add($factory->createInput(array(
            'name'     => 'password',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true
                ),
            ),
        )));
        
        $inputFilter->add($factory->createInput(array(
            'name'     => 'repeat_password',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true
                ),
                array(
                    'name' => 'Identical',              //�����֮ǰ��passwordһ��
                    'options' => array(
                        'token' => 'password'
                    )
                ),
            ),
        )));
        
        $inputFilter->add($factory->createInput(array(
            'name'     => 'name',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name' => 'NotEmpty',
                    'break_chain_on_failure' => true
                ),
                array(
                    'name' => 'StringLength',
                    'options' => array(
                        'min' => 1,
                        'max' => 25
                    )
                ),
            ),
        )));
        

                        
        $inputFilter->add($factory->createInput(array(
            'name'     => 'location',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
        )));
        
        $inputFilter->add($factory->createInput(array(
            'name'     => 'gender',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
                array('name' => 'Int'),
            ),
            'validators' => array(
                array(
                    'name' => 'InArray',
                    'options' => array(
                        'haystack' => array('0', '1')
                    )
                ),
            ),
        )));
        
        return $inputFilter;
    }
    
*/    
}