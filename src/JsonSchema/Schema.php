<?php

namespace Jane\JsonSchema;

use Jane\JsonSchema\Generator\File;
use Jane\JsonSchema\Guesser\Guess\ClassGuess;

class Schema
{
    /** @var string Origin of the schema (file or url path) */
    private $origin;

    /** @var string Namespace wanted for this schema */
    private $namespace;

    /** @var string Directory where to put files */
    private $directory;

    /** @var string Name of the root object in the schema (if needed) */
    private $rootName;

    /** @var ClassGuess[] List of classes associated to this schema */
    private $classes = [];

    /** @var string[] A list of references this schema is registered to */
    private $references;

    /** @var File[] A list of references this schema is registered to */
    private $files = [];

    /** @var mixed Parsed schema */
    private $parsed;

    /** @var int Version of this schema */
    private $version;

    public function __construct(string $origin, string $namespace, string $directory, string $rootName, int $version)
    {
        $this->origin = $this->fixPath($origin);
        $this->namespace = $namespace;
        $this->directory = $directory;
        $this->rootName = $rootName;
        $this->references = [$this->origin];
        $this->version = $version;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function getOrigin(): string
    {
        return $this->origin;
    }

    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function getDirectory(): string
    {
        return $this->directory;
    }

    public function getRootName(): string
    {
        return $this->rootName;
    }

    public function addClass(string $reference, ClassGuess $class)
    {
        $this->classes[urldecode($reference)] = $class;
    }

    public function getClass($reference): ?ClassGuess
    {
        $reference = urldecode($reference);

        if (array_key_exists($reference, $this->classes)) {
            return $this->classes[$reference];
        }

        if (array_key_exists($reference . '#', $this->classes)) {
            return $this->classes[$reference . '#'];
        }

        return null;
    }

    /**
     * @return ClassGuess[]
     */
    public function getClasses(): array
    {
        return $this->classes;
    }

    public function addFile(File $file): void
    {
        $this->files[] = $file;
    }

    public function getFiles(): array
    {
        return $this->files;
    }

    public function addReference(string $reference): void
    {
        $this->references[] = $reference;
    }

    public function hasReference(string $reference): bool
    {
        return in_array($reference, $this->references, true);
    }

    /**
     * @return mixed
     */
    public function getParsed()
    {
        return $this->parsed;
    }

    /**
     * @param mixed $parsed
     */
    public function setParsed($parsed)
    {
        $this->parsed = $parsed;
    }

    private function fixPath(string $path): string
    {
        $path = preg_replace('#([^:]){1}/{2,}#', '$1/', $path);

        if ('/' === $path) {
            return '/';
        }

        $pathParts = [];
        foreach (explode('/', rtrim($path, '/')) as $part) {
            if ('.' === $part) {
                continue;
            }

            if ('..' === $part && count($pathParts) > 0) {
                array_pop($pathParts);
                continue;
            }

            $pathParts[] = $part;
        }

        return implode('/', $pathParts);
    }
}
