..  include:: /Includes.rst.txt

..  _installation:

============
Installation
============

This extension can be installed using the TYPO3 `extension manager
<https://extensions.typo3.org/extension/taskhub>`__ or by `composer
<https://packagist.org/packages/rzt/taskhub>`__.

..  code-block:: shell

    composer req rzt/taskhub



Extension settings
------------------

taskhub does not provide any extensions settings. Configuration is made in TypoScript setup.


TypoScript settings
-------------------

Make sure to include the TypoScript **taskhub (required)** to your template.

Because taskhub is based on **Bootstrap CSS framework**. Styling is shiped via Assets in the Templates

Plugins:
Create a new page and add the Taskhub plugin to it. We have a List and New Task Plugin.

Add the following TypoScript setup to configure the extension:

```typoscript
plugin.tx_taskhub {
 settings {
     # PID of the storage folder for tasks
     storagePid =
     # Number of tasks to display per page in list view
     itemsPerPage = 10
 }
}
