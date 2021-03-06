<?php
namespace MailPoetVendor\Symfony\Component\Validator\Constraints;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Symfony\Component\Validator\Constraint;
use MailPoetVendor\Symfony\Component\Validator\ConstraintValidator;
use MailPoetVendor\Symfony\Component\Validator\Exception\UnexpectedTypeException;
class TypeValidator extends ConstraintValidator
{
 public function validate($value, Constraint $constraint)
 {
 if (!$constraint instanceof Type) {
 throw new UnexpectedTypeException($constraint, Type::class);
 }
 if (null === $value) {
 return;
 }
 $types = (array) $constraint->type;
 foreach ($types as $type) {
 $type = \strtolower($type);
 $type = 'boolean' === $type ? 'bool' : $type;
 $isFunction = 'is_' . $type;
 $ctypeFunction = 'ctype_' . $type;
 if (\function_exists($isFunction) && $isFunction($value)) {
 return;
 } elseif (\function_exists($ctypeFunction) && $ctypeFunction($value)) {
 return;
 } elseif ($value instanceof $type) {
 return;
 }
 }
 $this->context->buildViolation($constraint->message)->setParameter('{{ value }}', $this->formatValue($value))->setParameter('{{ type }}', \implode('|', $types))->setCode(Type::INVALID_TYPE_ERROR)->addViolation();
 }
}
