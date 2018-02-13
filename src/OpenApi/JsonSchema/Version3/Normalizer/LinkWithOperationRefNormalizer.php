<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Jane\OpenApi\JsonSchema\Version3\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class LinkWithOperationRefNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\LinkWithOperationRef';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Jane\OpenApi\JsonSchema\Version3\Model\LinkWithOperationRef;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException();
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['document-origin']);
        }
        $object = new \Jane\OpenApi\JsonSchema\Version3\Model\LinkWithOperationRef();
        $data = clone $data;
        if (property_exists($data, 'operationRef')) {
            $object->setOperationRef($data->{'operationRef'});
            unset($data->{'operationRef'});
        }
        if (property_exists($data, 'parameters')) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'parameters'} as $key => $value) {
                $values[$key] = $value;
            }
            $object->setParameters($values);
            unset($data->{'parameters'});
        }
        if (property_exists($data, 'requestBody')) {
            $object->setRequestBody($data->{'requestBody'});
            unset($data->{'requestBody'});
        }
        if (property_exists($data, 'description')) {
            $object->setDescription($data->{'description'});
            unset($data->{'description'});
        }
        if (property_exists($data, 'server')) {
            $object->setServer($this->denormalizer->denormalize($data->{'server'}, 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\Server', 'json', $context));
            unset($data->{'server'});
        }
        foreach ($data as $key_1 => $value_1) {
            if (preg_match('/^x-/', $key_1)) {
                $object[$key_1] = $value_1;
            }
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getOperationRef()) {
            $data->{'operationRef'} = $object->getOperationRef();
        }
        if (null !== $object->getParameters()) {
            $values = new \stdClass();
            foreach ($object->getParameters() as $key => $value) {
                $values->{$key} = $value;
            }
            $data->{'parameters'} = $values;
        }
        if (null !== $object->getRequestBody()) {
            $data->{'requestBody'} = $object->getRequestBody();
        }
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
        }
        if (null !== $object->getServer()) {
            $data->{'server'} = $this->normalizer->normalize($object->getServer(), 'json', $context);
        }
        foreach ($object as $key_1 => $value_1) {
            if (preg_match('/^x-/', $key_1)) {
                $data->{$key_1} = $value_1;
            }
        }

        return $data;
    }
}
