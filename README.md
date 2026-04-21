# clean-arch-blog

app/
├── Http/                        ← Presentation layer
│   ├── Controllers/
│   │   ├── Controller.php
│   │   ├── Auth/                ← Breeze drops everything here
│   │   │   ├── AuthenticatedSessionController.php
│   │   │   ├── RegisteredUserController.php
│   │   │   ├── PasswordResetLinkController.php
│   │   │   └── ...
│   │   └── Post/                ← your blog controllers go here
│   │       └── PostController.php
│   ├── Requests/
│   │   ├── Auth/                ← Breeze form requests
│   │   │   └── LoginRequest.php
│   │   └── Post/                ← your blog requests go here
│   │       └── CreatePostRequest.php
│   └── Resources/
│       └── Post/
│           └── PostResource.php
│
├── Domain/
├── Application/
├── Infrastructure/
└── Providers/