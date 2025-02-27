===  GiroCheckout Plug-in for WooCommerce ===
Contributors: girosolution
Tags: woocommerce, payment
Requires at least: 4.5
Tested up to: 6.0.2
Requires PHP: 5.4
WC requires at least: 3.0.0
WC tested up to: 6.9.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Plugin to integrate the GiroCheckout payment methods into WooCommerce.

== Description ==

Bieten Sie mit GiroCheckout Ihren Kunden den perfekten Payment Mix. Denn mit den richtigen Bezahlverfahren reduzieren Sie Kaufabbrüche. Sie wählen
aus allen relevanten Zahlarten - national wie international.

Ihre Kunden profitieren von sicheren und bequemen Zahlungsmöglichkeiten, und Sie schaffen die richtige Basis für Kundenvertrauen und damit die
Grundlage für eine hohe Konversionsrate. Vorgefertigte Plug-ins vereinfachen die schnelle technische Integration in Ihren Online-Shop. Ihren
gesamten Zahlungsverkehr verwalten Sie bequem und übersichtlich im GiroCockpit, unserem Backend-System. Höchste Sicherheitsstandards sowie
faire und transparente Preise zeichnen GiroCheckout aus.

== Installation ==

1. Melden Sie sich im Admin-Bereich Ihres Wordpress-Shops als Administrator an.
2. Gehen Sie zu 'Plugins' und klicken auf den Button "Installieren", ganz oben auf der Seite
3. Geben Sie rechts oben im Suchfeld "girocheckout" ein, es erscheint dann in den Ergebnissen das "GiroCheckout Plug-in for WooCommerce".
4. Klicken Sie auf den Button "Installieren" und dann auf "Aktivieren".
5. Für jede Zahlungsart, die Sie von GiroCheckout verwenden wollen ("giropay", "Lastschrift", "Kreditkarte", "iDEAL", "eps",
"Paydirekt", "Sofort-Überweisung", folgen Sie den folgenden Anweisungen:
* Gehen Sie zu 'WooCommerce -> Einstellungen -> Kasse' und wählen Sie die gewünschte Zahlungsart.
* Markieren Sie dann die entsprechende 'Aktivieren'-Checkbox und geben Sie die Zugangsdaten für diese Zahlungsart ein. Speichern Sie dann.
* Die Informationen zu Verkäufer-ID, Projekt-ID und Projektpasswort können Sie in Ihrem Girocockpit
unter https://www.girocockpit.de/user finden.

= Manuelle Installation =

Falls Sie das Plugin manuell installieren wollen, können Sie es entweder unter https://wordpress.org/plugins/girocheckout/ oder unter
https://www.girosolution.de/tools-support/shop-plug-ins/woocommerce-plug-in/ herunterladen und dann wie folgt installieren:
1. Melden Sie sich im Admin-Bereich Ihres Wordpress-Shops als Administrator an.
2. Gehen Sie zu 'Plugins' und klicken auf den Button "Installieren", ganz oben auf der Seite
3. Klicken Sie nun auf den Button "Plugin hochladen", ebenfalls ganz oben.
4. Wählen Sie nun über den Button "Datei auswählen" (oder ähnlich, je nach Browser) die Datei "GiroCheckout_Woocommerce_x.y.z.zip" aus
und klicken Sie "Installieren".  Die Datei wird nun hochgeladen und installiert.
5. Klicken Sie dann auf die Option "Aktiviere dieses Plugin", um das Plugin für die Verwendung freizugeben.
6. Für jede Zahlungsart, die Sie von GiroCheckout verwenden wollen ("giropay", "Lastschrift", "Kreditkarte", "iDEAL", "eps",
"Paydirekt", "Sofort-Überweisung", folgen Sie den folgenden Anweisungen:
* Gehen Sie zu 'WooCommerce -> Einstellungen -> Kasse' und wählen Sie die gewünschte Zahlungsart.
* Markieren Sie dann die entsprechende 'Aktivieren'-Checkbox und geben Sie die Zugangsdaten für diese Zahlungsart ein. Speichern Sie dann.
* Die Informationen zu Verkäufer-ID, Projekt-ID und Projektpasswort können Sie in Ihrem Girocockpit
unter https://www.girocockpit.de/user finden.

== Changelog ==

= 4.1.9 =
* Fixed bug that caused invalid customerId error in giropay payments
* Added SDK version 2.3.14

= 4.1.8 =
* Fixed bug that caused hash error in giropay payments
* Added SDK version 2.3.13

= 4.1.7 =
* Changes in purpose validation for new giropay

= 4.1.6 =
* Implemented support for new giropay
* Changed the iDEAL logo.
* Added SDK version 2.3.8

= 4.1.5 =
* Fixed bug that prevented certain purpose strings with special characters from being correctly processed by the API.
* Changed name of paydirekt payment method from „paydirekt“ to „giropay/paydirekt“.
* Replaced the paydirekt logo with the new one.
* Updated text mentions of 'GiroSolution' with 'S-Public Services'.

= 4.1.4 =
* Fixed another bug regarding the new 3-D Secure 2.0 address fields for credit card payments for the case of empty shipping address.

= 4.1.3 =
* Fixed a bug regarding the new 3-D Secure 2.0 address fields for credit card payments.

= 4.1.2 =
* Added support for the mandatory 3-D Secure 2.0 address fields. Address data is now sent to payment server for credit card payments, so it is not requested upon credit card data entry.

= 4.1.1 =
* Fixed a problem where a failed payment could prevent the order from allowing a consecutive successful payment attempt.

= 4.1.0 =
* Handled case where certain settings in Germanized can cause an order number to remain the same for two consecutive payment attempts, where the first one failed. This caused the subsequent successful payment not to be registered in the order.

= 4.0.9 =
* Fixed problem with duplicate payment processing due to race condition between notification and redirect.

= 4.0.8 =
* Fixed problem with tax values for Paydirekt.
* Added more debugging info in certain exceptions.
* For iDEAL and direct debit, removed the field(s) for entering the BIC and/or IBAN. All transactions will now be initialized without BIC/IBAN so the external form service is used. Entering the bank data within the plugin is not supported anymore.

= 4.0.7 =
* Completed German translations.

= 4.0.6 =
* Made order number change of previous release optional through a new configuration setting ("Support alternative order numbers"), because it caused problems for some customers. Default for this setting is off which maintains the behaviour of V. 4.0.4.

= 4.0.5 =
* Order numbers are now compatible with custom formats and may differ from orderid

= 4.0.4 =
* Added support for Bluecode E-Commerce payment method

= 4.0.3 =
* Fixed a problem with incorrect status options being offered for the new capture feature (ch1125).
* Removed internal form and JS widget for giropay and eps, which are now both always handled via the external form service (ch1785).
* Fixed PHP warning on login or logout when using iDEAL (ch913).
* Better handling of misconfigurations of the plugin settings (through update to latest SDK 2.1.24)

= 4.0.2 =
* Bugfix: Purpose was not being applied correctly

= 4.0.1.1 =
* Added missing language files for formal German

= 4.0.1 =
* Bugfix: Faulty tax calculation for paydirekt
* Bugfix: Error message "GiroCheckout error: missing Merchant-ID" on successful transactions when only certain payment methods are active
* Added language files for formal German

= 4.0.0 =
* Implemented support for payment method Maestro
* giropay, eps and direct debit: Support for usage with form service, in case the built-in forms cause problems on the site.
* Paydirekt: Support for digital carts
* New logos for Visa/MC, direct debit and Sofort
* Allow reservations and captures: reservation is now configurable in backend as default transaction type for credit card, direct debit and paydirekt.  If reservation is configured, all payments are made with that type and the capture is then made when the order state is changed to the one configured.
* Allow refunds: In order overview in the shop system, allow the merchant to initiate a refund.
* Fixed failure in the notification for giropay+giropay-id when ObvName is transmitted back (hash mismatch).
* Fixed problem setting the CUSTOMERNAME in the purpose on guest purchases.
* Removed PHP notices from redirect methods in all payment methods.
* Fixed problem with taxes and configurable products in paydirekt payment.
* Validate for empty BIC in directdebit.
* Removed notice from the paydirekt payment, use the methods from wc_abstract_order class, in older version use directly the variable. In the last version of this class the variables are protected and generate notice message if used directly.
* Implemented multi-language support

== Upgrade Notice ==

= 4.0.2 =
This release fixes a bug in the purpose field handling. Updating is recommended.

= 4.0.1 =
Some important bugfixes were made in this release, updating is highly recommended.

= 4.0.0 =
Many bugfixes and enhancements were made in this release, also several important new features, see change log for details.
