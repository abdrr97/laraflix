This project is made by **Hadar Abderrahmane** 😁

    git cloni had  lproject
    cd laraflix
    composer install
    npm install
    npm run dev
    cp .env.example .env
    php artisan storage:link
    php artisan key:generate

**_ ⚠ zid had les 3 line f .env_**

-   **STRIPE_KEY**=[stripe key dialk]
-   **STRIPE_SECRET**=[stripe secret dialk]
-   **IPGEOLOCATION_KEY**=[ip gealocation dyalk]

**_sir l phpmyadmin cree une base de donne smiha kif mabghiti_**

-   **DB_DATABASE**=[nom dyal db]
-   **DB_USERNAME**=[username]
-   **DB_PASSWORD**=[password]

**_F terminal ktb_**

    php artisan migrate --seed

**_ila bghiti t3amr database d data ktb_**

    php artisan tinker
    factory(App\Episode::class,15)->create();
    factory(App\Movie::class,15)->create();

**_mn ba3d lence application b_**

    php artisan serve

**_to login as an admin_**

compte: **_admin@admin.com_**

mdp: **_password_**
# laraflix
# laraflix
