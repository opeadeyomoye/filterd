<?php

declare(strict_types=1);

namespace App\Form;

use Cake\Form\Schema;
use Cake\Validation\Validator;
use Closure;
use Psr\Http\Message\UploadedFileInterface;

class AnnotateImageForm extends Form
{
    /**
     * Mapping of supported file extensions to their MIME type names.
     */
    const SUPPORTED_FILE_TYPES = [
        'png' => 'image/png',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg'
    ];

    /**
     * Maximum size of uploaded image in Mebibytes.
     */
    const IMAGE_MAX_SIZE = 5;

    /**
     * {@inheritDoc}
     */
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema
            ->addField('image', 'string');
    }

    /**
     * {@inheritDoc}
     */
    public function validationDefault(Validator $validator): Validator
    {
        return $validator
            ->notEmptyString('image')
            ->requirePresence('image')

            ->uploadedFile('image', [
                'types' => $this->supportedMimeTypes(),
                'maxSize' => $this->imageMaxSizeInBytes(),
            ], sprintf(
                'Image must be a PNG or JPG, not larger than %d MiB',
                self::IMAGE_MAX_SIZE
            ))

            ->add('image', 'validFileExtension', [
                'rule' => Closure::fromCallable([$this, 'isValidFileExtension']),
                'message' => 'Unsupported file type'
            ]);
    }

    /**
     * Custom validation method used to see if the uploaded
     * file has a valid file extension.
     *
     * @param UploadedFileInterface $value
     *
     * @return boolean
     */
    public function isValidFileExtension(UploadedFileInterface $value): bool
    {
        return in_array(
            pathinfo($value->getClientFilename(), PATHINFO_EXTENSION),
            $this->supportedFileExtensions()
        );
    }

    /**
     * Returns the maximum allowed size of a single image in bytes.
     *
     * @return integer
     */
    public function imageMaxSizeInBytes(): int
    {
        return self::IMAGE_MAX_SIZE * 1024 * 1024;
    }

    /**
     * Returns a list of MIME types currently supported for images.
     *
     * @return array
     */
    public function supportedMimeTypes(): array
    {
        return array_unique(
            array_values(self::SUPPORTED_FILE_TYPES)
        );
    }

    /**
     * Returns a list of file extensions currently supported.
     *
     * @return array
     */
    public function supportedFileExtensions(): array
    {
        return array_keys(self::SUPPORTED_FILE_TYPES);
    }
}
