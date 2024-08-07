..  include:: /Includes.rst.txt

..  _configuration:

=============
Configuration
=============

..  toctree::
   :maxdepth: 5
   :titlesonly:

   General/Index

Configuration and Customization

Templates
You can override the default Fluid templates by copying them from:
Copy

EXT:taskhub/Resources/Private/Templates/
EXT:taskhub/Resources/Private/Partials/
EXT:taskhub/Resources/Private/Layouts/
to your site package extension and adjusting the TypoScript setup accordingly.


Styling
The extension uses Bootstrap classes for styling. You can override these styles in your site package CSS file.

Troubleshooting
If you encounter any issues:

Clear all TYPO3 caches.
Ensure that all database updates have been performed.
Check that your TypoScript setup is correct and included in your template.
Verify that frontend users have the necessary permissions to view and interact with tasks.

Contributing
Contributions to the Taskhub extension are welcome. Please submit pull requests to the GitHub repository.

Support
For support, please create an issue on the GitHub repository or contact the extension author.

License
This extension is released under the GNU General Public License version 2 or later. See the LICENSE file for details.
