# Estructura del proyecto

```bash
.
├── README.md
└── src
    ├── adapters
    │   ├── in
    │   │   └── router
    │   │       ├── base
    │   │       │   ├── handler.php
    │   │       │   └── router_group.php
    │   │       └── router.php
    │   └── out
    │       └── asset_loader
    │           └── asset_loader.php
    ├── api
    │   ├── health
    │   │   └── health.php
    │   └── routes.php
    ├── frontend
    │   ├── core
    │   │   ├── base
    │   │   │   └── component.php
    │   │   ├── frames
    │   │   │   └── crm
    │   │   │       ├── components
    │   │   │       │   ├── sidebar.css
    │   │   │       │   └── sidebar.php
    │   │   │       ├── crm.css
    │   │   │       └── crm.php
    │   │   ├── scripts
    │   │   └── styles
    │   │       └── _normalize.css
    │   ├── features
    │   │   ├── crm
    │   │   │   ├── core
    │   │   │   │   └── scripts
    │   │   │   │       └── router.js
    │   │   │   ├── modules
    │   │   │   │   └── home
    │   │   │   │       ├── home.css
    │   │   │   │       └── home.php
    │   │   │   └── routes.php
    │   │   └── landing
    │   │       └── index.php
    │   └── shared
    │       ├── button
    │       │   ├── button.css
    │       │   └── button.php
    │       ├── logo
    │       │   ├── logo.css
    │       │   └── logo.php
    │       └── ripple
    │           ├── ripple.css
    │           ├── ripple.js
    │           └── ripple.php
    ├── index.php
    └── ports
        └── asset_loader.php

30 directories, 27 files
```