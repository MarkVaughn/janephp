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

class MediaTypeWithExampleNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\MediaTypeWithExample';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Jane\OpenApi\JsonSchema\Version3\Model\MediaTypeWithExample;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException();
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['document-origin']);
        }
        $object = new \Jane\OpenApi\JsonSchema\Version3\Model\MediaTypeWithExample();
        $data = clone $data;
        if (property_exists($data, 'schema')) {
            $value = $data->{'schema'};
            if (is_object($data->{'schema'})) {
                $value = $this->denormalizer->denormalize($data->{'schema'}, 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\Schema', 'json', $context);
            }
            if (is_object($data->{'schema'}) and isset($data->{'schema'}->{'$ref'})) {
                $value = $this->denormalizer->denormalize($data->{'schema'}, 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\Reference', 'json', $context);
            }
            $object->setSchema($value);
            unset($data->{'schema'});
        }
        if (property_exists($data, 'example')) {
            $object->setExample($data->{'example'});
            unset($data->{'example'});
        }
        if (property_exists($data, 'encoding')) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'encoding'} as $key => $value_1) {
                $values[$key] = $this->denormalizer->denormalize($value_1, 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\Encoding', 'json', $context);
            }
            $object->setEncoding($values);
            unset($data->{'encoding'});
        }
        foreach ($data as $key_1 => $value_2) {
            if (preg_match('/^x-/', $key_1)) {
                $object[$key_1] = $value_2;
            }
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getSchema()) {
            $value = $object->getSchema();
            if (is_object($object->getSchema())) {
                $value = $this->normalizer->normalize($object->getSchema(), 'json', $context);
            }
            if (is_object($object->getSchema())) {
                $value = $this->normalizer->normalize($object->getSchema(), 'json', $context);
            }
            $data->{'schema'} = $value;
        }
        if (null !== $object->getExample()) {
            $data->{'example'} = $object->getExample();
        }
        if (null !== $object->getEncoding()) {
            $values = new \stdClass();
            foreach ($object->getEncoding() as $key => $value_1) {
                $values->{$key} = $this->normalizer->normalize($value_1, 'json', $context);
            }
            $data->{'encoding'} = $values;
        }
        foreach ($object as $key_1 => $value_2) {
            if (preg_match('/^x-/', $key_1)) {
                $data->{$key_1} = $value_2;
            }
        }

        return $data;
    }
}
