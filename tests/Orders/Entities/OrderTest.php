<?php

namespace ArrowSphere\PublicApiClient\Tests\Orders\Entities;

use ArrowSphere\PublicApiClient\Orders\Entities\Order;
use ArrowSphere\PublicApiClient\Tests\AbstractEntityTest;

class OrderTest extends AbstractEntityTest
{
    protected const CLASS_NAME = Order::class;

    public function providerSerialization(): array
    {
        return [
            'standard' => [
                'fields' => [
                    'order_reference' => 'O_ARWS-V7-0bcb4c79-88037',
                    'reference' => 'XSPO1434944',
                    'status' => 'Fulfilled',
                    'dateStatus' => '2021-03-02 16:20:42',
                    'dateCreation' => '2021-03-02 16:20:41',
                    'ponumber' => 'WNA4789',
                    'partner' => [
                        'companyName' => 'CDW',
                        'contact' => [
                            'email' => 'trash@arrowcloud.org',
                            'firstName' => 'User120755',
                            'lastName' => 'Lastname120755'
                        ],
                    ],
                    'customer' => [
                        'reference' => 'XSP705830',
                    ],
                    'products' => [
                        [
                            'sku' => 'SAAS||IBM||IBM_SPSS_Statistics_Service||D1QWVLL|DK-SPSS-Statistics-Cloud-Base|12M',
                            'name' => 'IBM SPSS Statistics - Base - 12M',
                            'classification' => 'SAAS',
                            'program' => [
                                'legacyCode' => 'ibm'
                            ],
                            'identifiers' => [
                                'vendor' => [
                                    'sku' => 'D1QWVLL|DK-SPSS-Statistics-Cloud-Base|12M'
                                ]
                            ],
                            'quantity' => 2,
                            'status' => 'Provisioned',
                            'dateStatus' => '',
                            'isAddon' => false,
                            'isTrial' => false,
                            'arrowSubCategories' => [
                                'IBM_API'
                            ],
                            'detailedStatus' => '',
                            'prices' => [
                                'buy' => 1862.18,
                                'sell' => 2376,
                                'currency' => 'USD',
                                'periodicity' => 'per Year',
                                'term' => '1 Year',
                                'periodicityCode' => 8640,
                                'termCode' => 8640
                            ],
                            'subscription' => [
                                'reference' => 'XSPS61851',
                            ],
                            'license' => [
                                'reference' => 'XSP4064158',
                            ]
                        ],
                        [
                            'sku' => 'SAAS||IBM||IBM_SPSS_Statistics_Service_Addon_yearly||D1QWWLL|DK-SPSS-Statistics-Cloud-Base|12M',
                            'name' => 'IBM SPSS Statistics - Custom Tables & Advanced Statistics addOn - 12M',
                            'classification' => 'SAAS',
                            'program' => [
                                'legacyCode' => 'ibm'
                            ],
                            'identifiers' => [
                                'vendor' => [
                                    'sku' => 'D1QWWLL|DK-SPSS-Statistics-Cloud-Base|12M'
                                ]
                            ],
                            'quantity' => 2,
                            'status' => 'Provisioned',
                            'dateStatus' => '',
                            'isAddon' => true,
                            'isTrial' => false,
                            'arrowSubCategories' => [
                                'IBM_API'
                            ],
                            'detailedStatus' => '',
                            'prices' => [
                                'buy' => 1486,
                                'sell' => 1896,
                                'currency' => 'USD',
                                'periodicity' => 'per Year',
                                'term' => '1 Year',
                                'periodicityCode' => 8640,
                                'termCode' => 8640
                            ],
                            'subscription' => [
                                'reference' => 'XSPS61851',
                            ],
                            'license' => [
                                'reference' => 'XSP4064165',
                            ]
                        ],
                        [
                            'sku' => 'SAAS||IBM||IBM_SPSS_Statistics_Service_Addon_yearly||D1QWYLL|DK-SPSS-Statistics-Cloud-Base|12M',
                            'name' => 'IBM SPSS Statistics - Forecasting & Decision Trees addOn - 12M',
                            'classification' => 'SAAS',
                            'program' => [
                                'legacyCode' => 'ibm'
                            ],
                            'identifiers' => [
                                'vendor' => [
                                    'sku' => 'D1QWYLL|DK-SPSS-Statistics-Cloud-Base|12M'
                                ]
                            ],
                            'quantity' => 2,
                            'status' => 'Provisioned',
                            'dateStatus' => '',
                            'isAddon' => true,
                            'isTrial' => false,
                            'arrowSubCategories' => [
                                'IBM_API'
                            ],
                            'detailedStatus' => '',
                            'prices' => [
                                'buy' => 1486,
                                'sell' => 1896,
                                'currency' => 'USD',
                                'periodicity' => 'per Year',
                                'term' => '1 Year',
                                'periodicityCode' => 8640,
                                'termCode' => 8640
                            ],
                            'subscription' => [
                                'reference' => 'XSPS61851',
                            ],
                            'license' => [
                                'reference' => 'XSP4064172',
                            ]
                        ],
                    ],
                    'extraInformation' => [
                        'programs' => [
                            'IBM-3PM' => []
                        ]
                    ],
                ],
                'expected' => <<<JSON
{
    "order_reference": "O_ARWS-V7-0bcb4c79-88037",
    "reference": "XSPO1434944",
    "status": "Fulfilled",
    "dateStatus": "2021-03-02 16:20:42",
    "dateCreation": "2021-03-02 16:20:41",
    "ponumber": "WNA4789",
    "partner": {
        "companyName": "CDW",
        "contact": {
            "email": "trash@arrowcloud.org",
            "firstName": "User120755",
            "lastName": "Lastname120755"
        }
    },
    "customer": {
        "reference": "XSP705830"
    },
    "products": [
        {
            "sku": "SAAS||IBM||IBM_SPSS_Statistics_Service||D1QWVLL|DK-SPSS-Statistics-Cloud-Base|12M",
            "name": "IBM SPSS Statistics - Base - 12M",
            "classification": "SAAS",
            "program": {
                "legacyCode": "ibm"
            },
            "identifiers": {
                "vendor": {
                    "sku": "D1QWVLL|DK-SPSS-Statistics-Cloud-Base|12M"
                }
            },
            "quantity": 2,
            "status": "Provisioned",
            "dateStatus": "",
            "isAddon": false,
            "isTrial": false,
            "arrowSubCategories": [
                "IBM_API"
            ],
            "detailedStatus": "",
            "prices": {
                "buy": 1862.18,
                "sell": 2376,
                "currency": "USD",
                "periodicity": "per Year",
                "term": "1 Year",
                "periodicityCode": 8640,
                "termCode": 8640
            },
            "subscription": {
                "reference": "XSPS61851"
            },
            "license": {
                "reference": "XSP4064158"
            }
        },
        {
            "sku": "SAAS||IBM||IBM_SPSS_Statistics_Service_Addon_yearly||D1QWWLL|DK-SPSS-Statistics-Cloud-Base|12M",
            "name": "IBM SPSS Statistics - Custom Tables & Advanced Statistics addOn - 12M",
            "classification": "SAAS",
            "program": {
                "legacyCode": "ibm"
            },
            "identifiers": {
                "vendor": {
                    "sku": "D1QWWLL|DK-SPSS-Statistics-Cloud-Base|12M"
                }
            },
            "quantity": 2,
            "status": "Provisioned",
            "dateStatus": "",
            "isAddon": true,
            "isTrial": false,
            "arrowSubCategories": [
                "IBM_API"
            ],
            "detailedStatus": "",
            "prices": {
                "buy": 1486,
                "sell": 1896,
                "currency": "USD",
                "periodicity": "per Year",
                "term": "1 Year",
                "periodicityCode": 8640,
                "termCode": 8640
            },
            "subscription": {
                "reference": "XSPS61851"
            },
            "license": {
                "reference": "XSP4064165"
            }
        },
        {
            "sku": "SAAS||IBM||IBM_SPSS_Statistics_Service_Addon_yearly||D1QWYLL|DK-SPSS-Statistics-Cloud-Base|12M",
            "name": "IBM SPSS Statistics - Forecasting & Decision Trees addOn - 12M",
            "classification": "SAAS",
            "program": {
                "legacyCode": "ibm"
            },
            "identifiers": {
                "vendor": {
                    "sku": "D1QWYLL|DK-SPSS-Statistics-Cloud-Base|12M"
                }
            },
            "quantity": 2,
            "status": "Provisioned",
            "dateStatus": "",
            "isAddon": true,
            "isTrial": false,
            "arrowSubCategories": [
                "IBM_API"
            ],
            "detailedStatus": "",
            "prices": {
                "buy": 1486,
                "sell": 1896,
                "currency": "USD",
                "periodicity": "per Year",
                "term": "1 Year",
                "periodicityCode": 8640,
                "termCode": 8640
            },
            "subscription": {
                "reference": "XSPS61851"
            },
            "license": {
                "reference": "XSP4064172"
            }
        }
    ],
    "extraInformation": {
        "programs": {
            "IBM-3PM": []
        }
    }
}
JSON
            ],
        ];
    }
}
