# Support client

## General information
The information below aims to manage the support tickets, and their comments and attachments.

## Entities

### Issue
An issue is managed by the ```Issue``` entity.

| Field          | Type          | Example                                                                         | Description                         |
|----------------|---------------|---------------------------------------------------------------------------------|-------------------------------------|
| createdBy      | ```Contact``` | see below                                                                       | The person who created the issue    |
| description    | ```string```  | Hi, I would Like to reset my password, how can I do this?<br>Thanks in advance! | The body of the issue               |
| endCustomerRef | ```string```  | XSP12345                                                                        | The reference of the end customer   |
| language       | ```string```  | en                                                                              | The language to use with this issue |
| offer          | ```Offer```   | see below                                                                       | The offer the ticket is related to  |
| priority       | ```int```     | 2                                                                               | The priority of the issue           |
| resellerRef    | ```string```  | XSP54321                                                                        | The reference of the reseller       |
| title          | ```string```  | [Platform issue] How to reset my Microsoft Password ?                           | The title of the issue              |

### Contact
The ```Contact``` entity represents the person who created an issue:

| Field     | Type         | Example          | Description  |
|-----------|--------------|------------------|--------------|
| email     | ```string``` | test@example.com | E-mail       |
| firstName | ```string``` | Bruce            | First name   |
| lastName  | ```string``` | Wayne            | Last name    |
| phone     | ```string``` | 1-800-555-1234   | Phone number |

### Offer
The ```Offer``` entity represents which offer the ticket is related to:

| Field  | Type         | Example                              | Description             |
|--------|--------------|--------------------------------------|-------------------------|
| name   | ```string``` | Office 365 Business Essentials       | The name of the offer   |
| sku    | ```string``` | 031C9E47-4802-4248-838E-778FB1D2CC05 | The sku of the offer    |
| vendor | ```string``` | Microsoft                            | The vendor of the offer |

## Usage

### Initialization
The "support" client is simply called ```SupportClient```.
You can get it through the main entry point ```PublicApiClient``` and its method ```getSupportClient()```, or instanciate it directly:
```php
<?php

use ArrowSphere\PublicApiClient\Support\SupportClient;

const URL = 'https://your-url-to-arrowsphere.example.com';
const API_KEY = 'your API key in ArrowSphere';

$client = (new SupportClient())
    ->setUrl(URL)
    ->setApiKey(API_KEY);

```

### List all the issues
You can list all the issues by calling the ```getIssues()``` method.

This method returns a ```Generator``` and yields instances of the ```Issue``` entity.

Example:
```php
<?php

/** @var ArrowSphere\PublicApiClient\Support\SupportClient $client */
$issues = $client->getIssues();
foreach ($issues as $issue) {
    echo 'Issue #' . $issue->getId() . ' title is: ' . $issue->getTitle() . PHP_EOL;
}
```

### Get an issue
You can get a single issue by calling the ```getIssue()``` method.

this method returns an instance of the ```Issue``` entity.

Example:
```php
<?php

$myIssueId = 12345;

/** @var ArrowSphere\PublicApiClient\Support\SupportClient $client */
$issue = $client->getIssue($myIssueId);
echo $issue->getTitle() . PHP_EOL;
```

### Create an issue
You can create a customer by calling the ```createIssue()``` method.

This method returns the id of the newly created issue.

Example:

```php
<?php

use ArrowSphere\PublicApiClient\Support\Entities\Contact;
use ArrowSphere\PublicApiClient\Support\Entities\Issue;
use ArrowSphere\PublicApiClient\Support\Entities\Offer;

$issue = new Issue([
    Issue::COLUMN_CREATED_BY      => [
        Contact::COLUMN_EMAIL     => 'nobody@example.com',
        Contact::COLUMN_FIRST_NAME => 'Bruce',
        Contact::COLUMN_LAST_NAME  => 'Wayne',
        Contact::COLUMN_PHONE     => '1-800-555-4321',
    ],
    Issue::COLUMN_DESCRIPTION    => 'Hi, I would Like to reset my password, how can I do this?<br>Thanks in advance!',
    Issue::COLUMN_END_CUSTOMER_REF => 'XSP12345',
    Issue::COLUMN_LANGUAGE       => 'en',
    Issue::COLUMN_OFFER          => [
        Offer::COLUMN_NAME   => 'Office 365 Business Essentials',
        Offer::COLUMN_SKU    => '031C9E47-4802-4248-838E-778FB1D2CC05',
        Offer::COLUMN_VENDOR => 'Microsoft',
    ],
    Issue::COLUMN_PRIORITY       => 2,
    Issue::COLUMN_RESELLER_REF    => 'XSP54321',
    Issue::COLUMN_TITLE          => '[Platform issue] How to reset my Microsoft Password ?',
]);

/** @var ArrowSphere\PublicApiClient\Support\SupportClient $client */
$id = $client->createIssue($issue);

echo "New issue's id is: " . $id . PHP_EOL;
```
