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
    │       ├── asset_manager
    │       │   └── asset_manager.php
    │       └── context
    │           └── context.php
    ├── api
    │   ├── health
    │   │   └── handler.php
    │   └── routes.php
    ├── autoloader.php
    ├── frontend
    │   ├── core
    │   │   ├── base
    │   │   │   └── component.php
    │   │   ├── components
    │   │   │   └── router_outlet
    │   │   │       └── router_outlet.php
    │   │   ├── frames
    │   │   ├── scripts
    │   │   │   ├── common
    │   │   │   │   └── default.js
    │   │   │   ├── global-store
    │   │   │   │   └── global-store.js
    │   │   │   └── router
    │   │   │       ├── router-events.js
    │   │   │       └── router.js
    │   │   └── styles
    │   │       └── _normalize.css
    │   ├── features
    │   │   ├── crm
    │   │   │   ├── core
    │   │   │   │   └── scripts
    │   │   │   ├── frame
    │   │   │   │   ├── components
    │   │   │   │   │   ├── header
    │   │   │   │   │   │   ├── header.css
    │   │   │   │   │   │   └── header.php
    │   │   │   │   │   ├── sidebar
    │   │   │   │   │   │   ├── sidebar.css
    │   │   │   │   │   │   └── sidebar.php
    │   │   │   │   │   ├── sidebar_action
    │   │   │   │   │   │   ├── sidebar_action.css
    │   │   │   │   │   │   └── sidebar_action.php
    │   │   │   │   │   └── user_card
    │   │   │   │   │       ├── user_card.css
    │   │   │   │   │       └── user_card.php
    │   │   │   │   ├── frame.css
    │   │   │   │   ├── frame.js
    │   │   │   │   └── frame.php
    │   │   │   ├── modules
    │   │   │   │   ├── home
    │   │   │   │   │   ├── home.css
    │   │   │   │   │   └── home.php
    │   │   │   │   └── persons
    │   │   │   │       ├── persons.css
    │   │   │   │       └── persons.php
    │   │   │   └── routes.php
    │   │   └── landing
    │   │       ├── landing.php
    │   │       └── routes.php
    │   └── shared
    │       ├── avatar
    │       │   ├── avatar.css
    │       │   └── avatar.php
    │       ├── html
    │       │   ├── aside.php
    │       │   ├── button.php
    │       │   ├── div.php
    │       │   ├── document.php
    │       │   ├── h1.php
    │       │   ├── header.php
    │       │   ├── link.php
    │       │   ├── main.php
    │       │   ├── nav.php
    │       │   ├── p.php
    │       │   └── span.php
    │       ├── icons
    │       │   ├── base
    │       │   │   └── icon.php
    │       │   └── catalog
    │       │       ├── circle_check.php
    │       │       ├── file.php
    │       │       ├── gear.php
    │       │       ├── home.php
    │       │       ├── people_multiple.php
    │       │       └── plant.php
    │       ├── logo
    │       │   ├── logo.css
    │       │   └── logo.php
    │       └── ripple
    │           ├── ripple.css
    │           ├── ripple.js
    │           └── ripple.php
    ├── index.php
    └── ports
        ├── asset_manager.php
        └── context.php

45 directories, 62 files
```