# GraphMailer for Drupal

A simple mail plugin for Drupal that sends mail via Microsoft Graph API.

---

## ⚠️ Disclaimer

> This module was developed for internal use. You are free to use or adapt it under the license below, but:
>
> - It is **not actively maintained**
> - **No support** is provided
> - Use at your own risk

Feel free to submit pull requests if you find ways to improve it — but please understand there is no guarantee of response.

---

## ✅ Features

- Sends mail using Microsoft Graph via Client Credentials Flow
- Plug-and-play integration with the Drupal Mail System
- Configuration via admin UI
- Supports Webform and other modules using the Mail API

---

## 📦 Installation

1. Create a directory called `graphmailer` and copy these files into this directory,
2. Place the `graphmailer` module folder in `/modules/custom` within your Drupal installation.
3. Enable the module via **Manage > Extend**.
4. Go to **Manage > Configuration > GraphMailer** (`/admin/config/graphmailer`) and fill in the following:
   - Tenant ID
   - Client ID
   - Client Secret *(will not be displayed after saving)*
   - From email address (must be a valid account in your tenant)

5. Then go to **Manage > Configuration > Mail System** (`/admin/config/system/mailsystem`) and configure:
   - **Formatter**: `DefaultFormatter`
   - **Sender**: `GraphMailer`

6. Save your settings.

---

## 🔐 Microsoft Azure – Requirements

This module uses the **Client Credentials Flow**. In Azure, the following setup is required:

- An **App Registration** with the following permissions:
  - `Mail.Send` (application permission)
- A **client secret**
- Consent must be **granted by a global administrator** through the Azure portal

---

## 🧪 Testing

The module optionally includes a test form at `/admin/config/graphmailer/test` to verify mail delivery functionality.

---

## 🧑‍💻 Support

This module was developed for a specific client use case. No official support is provided.

---

## 👤 Author

Lambert

[`Adyta.nl`](https://adyta.nl)
---

## 📄 License

MIT License
