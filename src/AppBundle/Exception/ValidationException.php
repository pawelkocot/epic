<?php

namespace AppBundle\Exception;

use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class ValidationException extends \Exception
{
    /**
     * @var ConstraintViolationListInterface
     */
    private $errors = array();

    public function __construct(ConstraintViolationListInterface $errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return array
     */
    public function getErrorMessages()
    {
        $errors = [];
        foreach ($this->errors as $error) {
            /** @var ConstraintViolationInterface $error */
            $errors[$error->getPropertyPath()] = $error->getMessage();
        }

        return $errors;
    }
}