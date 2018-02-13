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

class OpenApiNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\OpenApi';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Jane\OpenApi\JsonSchema\Version3\Model\OpenApi;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException();
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['document-origin']);
        }
        $object = new \Jane\OpenApi\JsonSchema\Version3\Model\OpenApi();
        $data = clone $data;
        if (property_exists($data, 'openapi')) {
            $object->setOpenapi($data->{'openapi'});
            unset($data->{'openapi'});
        }
        if (property_exists($data, 'info')) {
            $object->setInfo($this->denormalizer->denormalize($data->{'info'}, 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\Info', 'json', $context));
            unset($data->{'info'});
        }
        if (property_exists($data, 'externalDocs')) {
            $object->setExternalDocs($this->denormalizer->denormalize($data->{'externalDocs'}, 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\ExternalDocumentation', 'json', $context));
            unset($data->{'externalDocs'});
        }
        if (property_exists($data, 'servers')) {
            $values = [];
            foreach ($data->{'servers'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\Server', 'json', $context);
            }
            $object->setServers($values);
            unset($data->{'servers'});
        }
        if (property_exists($data, 'security')) {
            $values_1 = [];
            foreach ($data->{'security'} as $value_1) {
                $values_2 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
                foreach ($value_1 as $key => $value_2) {
                    $values_3 = [];
                    foreach ($value_2 as $value_3) {
                        $values_3[] = $value_3;
                    }
                    $values_2[$key] = $values_3;
                }
                $values_1[] = $values_2;
            }
            $object->setSecurity($values_1);
            unset($data->{'security'});
        }
        if (property_exists($data, 'tags')) {
            $values_4 = [];
            foreach ($data->{'tags'} as $value_4) {
                $values_4[] = $this->denormalizer->denormalize($value_4, 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\Tag', 'json', $context);
            }
            $object->setTags($values_4);
            unset($data->{'tags'});
        }
        if (property_exists($data, 'paths')) {
            $values_5 = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'paths'} as $key_1 => $value_5) {
                if (preg_match('/^\\//', $key_1) && is_object($value_5)) {
                    $values_5[$key_1] = $this->denormalizer->denormalize($value_5, 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\PathItem', 'json', $context);
                    continue;
                }
                if (preg_match('/^x-/', $key_1) && isset($value_5)) {
                    $values_5[$key_1] = $value_5;
                    continue;
                }
            }
            $object->setPaths($values_5);
            unset($data->{'paths'});
        }
        if (property_exists($data, 'components')) {
            $object->setComponents($this->denormalizer->denormalize($data->{'components'}, 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\Components', 'json', $context));
            unset($data->{'components'});
        }
        foreach ($data as $key_2 => $value_6) {
            if (preg_match('/^x-/', $key_2)) {
                $object[$key_2] = $value_6;
            }
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getOpenapi()) {
            $data->{'openapi'} = $object->getOpenapi();
        }
        if (null !== $object->getInfo()) {
            $data->{'info'} = $this->normalizer->normalize($object->getInfo(), 'json', $context);
        }
        if (null !== $object->getExternalDocs()) {
            $data->{'externalDocs'} = $this->normalizer->normalize($object->getExternalDocs(), 'json', $context);
        }
        if (null !== $object->getServers()) {
            $values = [];
            foreach ($object->getServers() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'servers'} = $values;
        }
        if (null !== $object->getSecurity()) {
            $values_1 = [];
            foreach ($object->getSecurity() as $value_1) {
                $values_2 = new \stdClass();
                foreach ($value_1 as $key => $value_2) {
                    $values_3 = [];
                    foreach ($value_2 as $value_3) {
                        $values_3[] = $value_3;
                    }
                    $values_2->{$key} = $values_3;
                }
                $values_1[] = $values_2;
            }
            $data->{'security'} = $values_1;
        }
        if (null !== $object->getTags()) {
            $values_4 = [];
            foreach ($object->getTags() as $value_4) {
                $values_4[] = $this->normalizer->normalize($value_4, 'json', $context);
            }
            $data->{'tags'} = $values_4;
        }
        if (null !== $object->getPaths()) {
            $values_5 = new \stdClass();
            foreach ($object->getPaths() as $key_1 => $value_5) {
                if (preg_match('/^\\//', $key_1) && is_object($value_5)) {
                    $values_5->{$key_1} = $this->normalizer->normalize($value_5, 'json', $context);
                    continue;
                }
                if (preg_match('/^x-/', $key_1) && !is_null($value_5)) {
                    $values_5->{$key_1} = $value_5;
                    continue;
                }
            }
            $data->{'paths'} = $values_5;
        }
        if (null !== $object->getComponents()) {
            $data->{'components'} = $this->normalizer->normalize($object->getComponents(), 'json', $context);
        }
        foreach ($object as $key_2 => $value_6) {
            if (preg_match('/^x-/', $key_2)) {
                $data->{$key_2} = $value_6;
            }
        }

        return $data;
    }
}
