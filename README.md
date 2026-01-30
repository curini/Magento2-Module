# CustomForm_Email

Magento 2 module that adds email domain autocompletion using jQuery UI Autocomplete.

## Installation

1. Copy the module to:
   app/code/CustomForm/Email

2. Enable the module:

```bash
bin/magento setup:upgrade
bin/magento cache:flush
```

3. Verify the installation

```bash
bin/magento module:status
```

You will see `CustomForm_Email` on the list of enabled modules.

## Usage

The module automatically adds domain autocompletion to email input fields
(e.g. @gmail.com, @yahoo.com) on customer account edit form.

## Development

You can use the docker installation:
[docker](docker/README.md)
