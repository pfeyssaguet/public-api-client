<?php

namespace ArrowSphere\PublicApiClient\Tests\Support\Entities;

use ArrowSphere\PublicApiClient\Support\Entities\Attachment;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

/**
 * Class AttachmentTest
 */
class AttachmentTest extends AbstractEntityTest
{
    protected const CLASS_NAME = Attachment::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields'   => [
                    Attachment::COLUMN_ID        => 123456,
                    Attachment::COLUMN_FILENAME  => 'file.png',
                    Attachment::COLUMN_MIME_TYPE => 'image/png',
                ],
                'expected' => <<<JSON
{
    "id": 123456,
    "fileName": "file.png",
    "mimeType": "image\/png"
}
JSON
                ,
            ],
        ];
    }
}
