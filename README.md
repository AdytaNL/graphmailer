# GraphMailer – Microsoft Graph e-mail plugin voor Drupal

Deze module voegt een mailplugin toe aan Drupal die e-mails verzendt via de Microsoft Graph API. Ze is bedoeld om te gebruiken als mailsysteem voor Webforms of andere modules die Drupal’s mail API gebruiken.

---

## ✅ Functies

- Verstuurt e-mails via Microsoft Graph
- Ondersteunt HTML-body’s
- Eenvoudige configuratie via Drupal UI
- Te gebruiken als mailsysteem in combinatie met `Webform`

---

## 📦 Installatie

1. Plaats de `graphmailer` modulemap in `/modules/custom` van je Drupal-installatie.
2. Activeer de module via **Beheer > Uitbreidingen**.
3. Ga naar **Beheer > Configuratie > GraphMailer** (`/admin/config/graphmailer`) en vul het volgende in:
   - Tenant ID
   - Client ID
   - Client Secret *(wordt niet zichtbaar weergegeven na opslaan)*
   - Afzender e-mailadres (moet een geldig account zijn binnen de tenant)

4. Ga naar **Beheer > Configuratie > E-mail systeem** (`/admin/config/system/mailsystem`) en stel in:
   - **Formatter**: `DefaultFormatter`
   - **Sender**: `GraphMailer`

5. Sla de instellingen op.

---

## 🔐 Microsoft Azure – Vereisten

Deze module werkt met de **Client Credentials Flow**. De volgende configuratie is nodig in Azure:

- **App-registratie** met rechten:
  - `Mail.Send` (application permission)
- Een **client secret**
- Toestemming moet **geadministreerd** zijn door een global admin via Azure portal

---

## ⚠️ Opmerkingen

- De module slaat access tokens op in cache (`cache.default`) voor ~55 minuten
- Foutmeldingen verschijnen in de Drupal log (`admin/reports/dblog`)
- Alleen HTML-mails worden ondersteund
- `client_secret` is beveiligd: wordt niet weergegeven na opslaan

---

## 🧪 Testen

De module bevat een testformulier op `/admin/config/graphmailer/test` (optioneel beschikbaar). Gebruik dit om te testen of het verzenden werkt.

---

## 🧑‍💻 Ondersteuning

Deze module is ontwikkeld op maat voor een specifieke klant. Voor support, contacteer de originele leverancier of beheerder van deze code.
