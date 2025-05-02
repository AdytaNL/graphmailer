# GraphMailer – Microsoft Graph email plugin for Drupal

This module provides a mail plugin for Drupal that sends emails using the Microsoft Graph API. It is designed to serve as the mail system for Webforms or other modules that rely on Drupal's Mail API.

---

## ✅ Features

- Sends emails using Microsoft Graph
- Supports HTML body content
- Easy configuration via Drupal UI
- Integrates with the `Webform` module or others using Drupal's Mail API

---

## 📦 Installation

1. Place the `graphmailer` module folder in `/modules/custom` within your Drupal installation.
2. Enable the module via **Manage > Extend**.
3. Go to **Manage > Configuration > GraphMailer** (`/admin/config/graphmailer`) and fill in the following:
   - Tenant ID
   - Client ID
   - Client Secret *(will not be displayed after saving)*
   - From email address (must be a valid account in your tenant)

4. Then go to **Manage > Configuration > Mail System** (`/admin/config/system/mailsystem`) and configure:
   - **Formatter**: `DefaultFormatter`
   - **Sender**: `GraphMailer`

5. Save your settings.

---

## 🔐 Microsoft Azure – Requirements

This module uses the **Client Credentials Flow**. In Azure, the following setup is required:

- An **App Registration** with the following permissions:
  - `Mail.Send` (application permission)
- A **client secret**
- Consent must be **granted by a global administrator** through the Azure portal

---

## ⚠️ Notes

- The module caches access tokens (`cache.default`) for approximately 55 minutes
- Errors are logged in the Drupal log (`/admin/reports/dblog`)
- Only HTML emails are supported
- The `client_secret` is securely stored and not displayed after saving

---

## 🧪 Testing

The module optionally includes a test form at `/admin/config/graphmailer/test` to verify mail delivery functionality.

---

## 🧑‍💻 Support

This module was developed for a specific client use case. For support, please contact the original developer or maintainer. No official support is provided.
