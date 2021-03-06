<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Serie;
use Faker\Generator as Faker;

$factory->define(Serie::class, function (Faker $faker) {
    $movie_images_url = [
        "https://resizing.flixster.com/GhMshF07vdPOtsz4l3ZFClgp81o=/180x267/v1.bTsxMzE1ODk4ODtqOzE4NTEwOzIwNDg7MTIwMDsxNzc4",
        "https://resizing.flixster.com/yZF5ofhcGkuXG5vHmi0uWXWCP6s=/180x267/v1.bTsxMzA1MTMzNTtqOzE4NDk2OzIwNDg7MjYwMDszODUy",
        "https://resizing.flixster.com/bhn8yaFba405AEJ9QDxd0U7Qc3U=/180x265/v1.bTsxMzAzNzA3NztqOzE4NTAyOzIwNDg7ODI1MDsxMjE1MA",
        "https://resizing.flixster.com/ar5Z0qPeN674owBHH6fRXY2ZP7w=/180x267/v1.bTsxMjk2OTMyMTtqOzE4NDcxOzIwNDg7MTA4MDsxNjAw",
        "https://resizing.flixster.com/-Htwx-HeLIFAkPOOgxUUEExjeZY=/180x267/v1.bTsxMjk3MzU4OTtqOzE4NTA5OzIwNDg7MTk0NDsyODgw",
        "https://resizing.flixster.com/9OhtCgGfpioeuc8E6FMdTojwJKs=/180x267/v1.bTsxMzI1MzQ4MDtqOzE4NTAzOzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/TiIxTjKZ_Ydm_oCTw2LkznQTFtU=/180x266/v1.bTsxMzA2NjYyNTtqOzE4NDg2OzIwNDg7NDUwOzY2NQ",
        "https://resizing.flixster.com/eX1HFHVnp1DdOg0jiiv42gQeQms=/180x267/v1.bTsxMzIyNTY2MjtqOzE4NDk1OzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/7OZdDskHeXFidou8CjZlx6OKG9E=/180x267/v1.bTsxMzA1OTEwOTtqOzE4NDg1OzIwNDg7NDA1Mjs2MDAy",
        "https://resizing.flixster.com/ZmP1LgaE1FFobQAoMI3K7x11ShQ=/180x270/v1.bTsxMzIwMzIxODtqOzE4NTA1OzIwNDg7NTQwOzgxMA",
        "https://resizing.flixster.com/BiqV85eUs7yoW0x8CdLOkm4NIQ0=/180x269/v1.bTsxMjkwNzQ3MDtqOzE4NDk0OzIwNDg7NzM3OzExMDA",
        "https://resizing.flixster.com/n6NXoXk1qznuYlzbElosVt0yh-g=/180x259/v1.bTsxMzA3MjAwNztqOzE4NDY4OzIwNDg7MjAwMDsyODgx",
        "https://resizing.flixster.com/-bGNy7b5oRzu9QVPj6pl7TYO0ds=/180x267/v1.bTsxMjkxMDQ4NztqOzE4NDk2OzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/GMiAfh3j1h17A57fecD9iDcbVcQ=/180x267/v1.bTsxMzA5MjQwMjtqOzE4NDc4OzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/jDoBVU__7BaSOrh-x-Gys1Hivi0=/180x267/v1.bTsxMjkyNjcxNjtqOzE4NDgwOzIwNDg7MTY4ODsyNTAw",
        "https://resizing.flixster.com/92T2Gvnf1mBlwRTBev4wtlTc-0U=/180x267/v1.bTsxMzExODE2MTtqOzE4NDk3OzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/fHUmy4VsPBDMGsfH3oKFfGAbrNI=/180x267/v1.bTsxMzEyNDc0MjtqOzE4NTA4OzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/oK6jA7hQHALYp3FqQIEeB588wrc=/180x267/v1.bTsxMjk3NDkxMTtqOzE4NDgxOzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/8F2a0bqqmSb_CEQOq9Uc4Ikpo6U=/180x267/v1.bTsxMzA4MDg1MztqOzE4NDk0OzIwNDg7NDAwMDs1OTMz",
        "https://resizing.flixster.com/UEbhxK2kmE3Ha9EVtXYudV0Ey94=/180x270/v1.bTsxMzE3NjU1ODtqOzE4NDg1OzIwNDg7MTMzNDsyMDAw",
        "https://resizing.flixster.com/wDvnsV-V03km7I15_YncIDnmxjg=/180x270/v1.bTsxMzExNTMzOTtqOzE4NTEwOzIwNDg7NTQwOzgxMA",
        "https://resizing.flixster.com/1JmS9ARkDX9kgQ2rZ7vicQUijSk=/180x267/v1.bTsxMjk0MjEzODtqOzE4NDY3OzIwNDg7MjIyODszMzAw",
        "https://resizing.flixster.com/FP4d1EtCJJMl_5scQYlK87UNX2Q=/180x266/v1.bTsxMjk3NDA0NjtqOzE4NDcxOzIwNDg7MjAwMDsyOTU0",
        "https://resizing.flixster.com/N3OL8GtYKyQHh26FJOqU56l8AXg=/180x267/v1.bTsxMzE4MzY3NztqOzE4NDk0OzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/ZAZxGz2RDsB_AoJZNOHPUmGB9HU=/180x264/v1.bTsxMzE2MTUxMjtqOzE4NDY5OzIwNDg7MTAwMDsxNDY0",
        "https://resizing.flixster.com/ovMMbg2WbNPXJyeSMF88Lwev0r8=/180x267/v1.bTsxMzA2MjY2MztqOzE4NDg0OzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/9NKE919XMM6ITC4aIR2LAQMCTdY=/180x267/v1.bTsxMzI3Mjg3NjtqOzE4NTA0OzIwNDg7Mjc2NDs0MDk2",
        "https://resizing.flixster.com/bSk32a27D9S-C5hFgfWZ7F411uc=/180x266/v1.bTsxMzE5MTEzOTtqOzE4NDg2OzIwNDg7MTY5MzsyNTAw",
        "https://resizing.flixster.com/9KASFaA7AEU0w-IlWODY8NghOf8=/180x267/v1.bTsxMzEwMjMxNztqOzE4NDkzOzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/2wyXc4XjfakjFNCUHRg9OnQjMak=/180x270/v1.bTsxMzIwNDU4MTtqOzE4NDczOzIwNDg7ODA4OzEyMTI",
        "https://resizing.flixster.com/vHfuAeTbCXBmoYbOkoSVT_kb8Rc=/180x270/v1.bTsxMjk2NTMxMDtqOzE4NDY1OzIwNDg7MjAwMDszMDAw",
        "https://resizing.flixster.com/56knvoj9cjnGP2-45ACNyvwPJIs=/180x267/v1.bTsxMzAxOTA3MTtqOzE4NDk2OzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/1XVWRpLhtUPTfUSEhfSfJ02g4eA=/180x267/v1.bTsxMzIxNjYwODtqOzE4NDg1OzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/tAP5X_3v6CibFg-kwWiCRYCrXlM=/180x270/v1.bTsxMzE1MDg4NDtqOzE4NTA2OzIwNDg7MjAwMDszMDAw",
        "https://resizing.flixster.com/hwbv4a6dyW07H5lvqw5A-aitE3s=/180x267/v1.bTsxMzE1MDg4NTtqOzE4NTA3OzIwNDg7ODEwMDsxMjAwMA",
        "https://resizing.flixster.com/NKN2NWKeQI2teqpmkvxV2njiV5s=/180x265/v1.bTsxMjk3NzMwODtqOzE4NDkzOzIwNDg7MjUwMDszNjg1",
        "https://resizing.flixster.com/cxRbKm3fc9V02babG6Qm9moJfzg=/180x267/v1.bTsxMzE4MjI1NTtqOzE4NDY3OzIwNDg7MjcwMDs0MDAw",
        "https://resizing.flixster.com/jODHSvBHP87WqCDv8VHvEAAP7-c=/180x265/v1.bTsxMzAxOTkzNDtqOzE4NTA0OzIwNDg7MTAwMDsxNDcz",
        "https://resizing.flixster.com/JUC22QTRDsuwh4RAwtTv_tlGjuU=/180x267/v1.bTsxMzE0NDM5OTtqOzE4NTAxOzIwNDg7MzM3NTs1MDAw",
        "https://resizing.flixster.com/7D-_Dg2sEGiYiwZZHyDIFrmhLCU=/180x267/v1.bTsxMzAxOTA1ODtqOzE4NDgzOzIwNDg7MTcwMDsyNTE5",
        "https://resizing.flixster.com/icEqh4qQyaMf4jBnqr2NBxLa1e8=/180x270/v1.bTsxMzIxOTQ4NjtqOzE4NDg0OzIwNDg7MTgzNDsyNzUx",
        "https://resizing.flixster.com/D4xQiouKD4885FXoM90UxkmDqVE=/180x267/v1.bTsxMjk2Mzk2NTtqOzE4NDcwOzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/xdWleIuEm-1MS2TYIHMVZ7Re1FU=/180x270/v1.bTsxMzIxOTQ4NTtqOzE4NDgzOzIwNDg7MjAwMDszMDAw",
        "https://resizing.flixster.com/5-z9WGWvTPUKCEXMOJrHH5xp6nU=/180x267/v1.bTsxMzA2OTgxMjtqOzE4NDc4OzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/sxuEvN3wNkbfP-534VAeSmxtCsk=/180x268/v1.bTsxMzI3Mjg2NTtqOzE4NDkzOzIwNDg7MTg3MjsyNzkw",
        "https://resizing.flixster.com/vhRdeMRI-mlfvPhz3WASXCq71to=/180x267/v1.bTsxMzI3ODg2NTtqOzE4NTA4OzIwNDg7OTcyOzE0NDA",
        "https://resizing.flixster.com/vuFrtnFNbtderklYFiwa8-AFr7M=/180x252/v1.bTsxMzAzNzA4NTtqOzE4NDY1OzIwNDg7MTYwODsyMjU0",
        "https://resizing.flixster.com/bEbhk_2G_4RMXW3K69YiRA4mGXU=/180x267/v1.bTsxMzE2MzcwNjtqOzE4NTAzOzIwNDg7MTcwMDsyNTE5",
        "https://resizing.flixster.com/ZYK6saLjo6eXKLYu5W-I4lxzry8=/180x267/v1.bTsxMzAyNTI4NztqOzE4NTAyOzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/tJNbBShCrdxbhwqKbhmlvmEGJJM=/180x266/v1.bTsxMjk3MDEyNTtqOzE4NDY1OzIwNDg7MTY5MzsyNTAw",
        "https://resizing.flixster.com/uBDvHtpKMW3ApDGzZQvt9A3P1NQ=/173x270/v1.bTsxMzEzMjc3NDtqOzE4NDg1OzIwNDg7MTgyODsyODUz",
        "https://resizing.flixster.com/XDkeRzzgdhL22SdUpiuSUsj_Smg=/180x267/v1.bTsxMzA4MDg1NTtqOzE4NDk2OzIwNDg7MjAwMDsyOTYz",
        "https://resizing.flixster.com/tXDCC0ZGvrYUYGjJ7Mry2rKe_8Y=/180x267/v1.bTsxMzEzNTgwNTtqOzE4NTAyOzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/1efFn6OKqOL5SRDwgCaoVWNVDKs=/180x270/v1.bTsxMzEzMTgyNjtwOzE4NDgyOzIwNDg7OTAwOzEzNTA",
        "https://resizing.flixster.com/uDDkyLzHXQ3IXBmDls5AkcQcYiE=/180x267/v1.bTsxMzEyMjIxNDtqOzE4NTAwOzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/sruqvVGNMMD-F9lCe6kR6tyYb0s=/180x267/v1.bTsxMjk3NzIzNjtqOzE4NDY2OzIwNDg7MjE2MDszMjAw",
        "https://resizing.flixster.com/DzJYomBrpKLsWmU5x5-emz-wMLA=/180x267/v1.bTsxMjkxNDAyMTtqOzE4NDc1OzIwNDg7ODEwOzEyMDA",
        "https://resizing.flixster.com/8B2DPam1lsAW3xFJ7-n7AalSPwE=/169x250/v1.bTsxMzEwMTEzNDtqOzE4NDgwOzIwNDg7MTY5OzI1MA",
        "https://resizing.flixster.com/LKY6vnito6kk4_8ucSJERxRlQVY=/180x267/v1.bTsxMzIwNTIyMDtqOzE4NDgyOzIwNDg7MTM4MjsyMDQ4",
        "https://resizing.flixster.com/rpJNLUGpgId-cJOF5BQ3C743akQ=/180x270/v1.bTsxMzE0OTMxOTtqOzE4NDcxOzIwNDg7NzE2OzEwNzU",
        "https://resizing.flixster.com/7-MYSqlS6prHhG2RHZ7XS8Abx0s=/180x267/v1.bTsxMzA0NDkzMTtqOzE4NDgxOzIwNDg7ODEwMDsxMjAwMA",
        "https://resizing.flixster.com/9TFOHKEbeMMipQNoj35VS2rqU1U=/180x267/v1.bTsxMzEzMzYzNDtqOzE4NDkxOzIwNDg7MTk0NDsyODgw",
        "https://resizing.flixster.com/n6mIYy8AzDectBbKukkZ5rsZU1k=/180x267/v1.bTsxMzEzNzY3MztqOzE4NDgwOzIwNDg7MTM1MDsyMDAw",
        "https://resizing.flixster.com/hVPdabt9CD01Ms2sfVrP1HkkYGw=/180x266/v1.bTsxMzE0MzgwNztqOzE4NDk0OzIwNDg7MjcxMjs0MDEy",
        "https://resizing.flixster.com/bqZJphqfOZlp5ftFVMY1u3pzG18=/180x265/v1.bTsxMzE1OTQxMjtqOzE4NDg0OzIwNDg7MTY5ODsyNTAw",
        "https://resizing.flixster.com/s-jCnruRHB2XZUixSXj9WujTaRo=/180x267/v1.bTsxMzAzMTY0OTtqOzE4NDc0OzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/GdY3ILN_umPbS32j4hVjQ7-w9XQ=/180x267/v1.bTsxMzAzOTU3MjtqOzE4NDc3OzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/5kmR1fXfUT5Bdlm3Qzt6RoPRHPI=/180x267/v1.bTsxMzA4MDg1NDtqOzE4NDk1OzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/f0729nlE8Ap0sFwK01z610_1RFQ=/180x267/v1.bTsxMzE2MTEyMjtqOzE4NDg0OzIwNDg7MTM4MjsyMDQ4",
        "https://resizing.flixster.com/K2e-Ga4OvImuoFQZAgB8ti4NoiY=/180x267/v1.bTsxMzE2MzcwOTtqOzE4NTA2OzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/Pvww9DtLYh5KKuQ1hRthyn0bf0k=/180x267/v1.bTsxMzExNzYzNztqOzE4NDY4OzIwNDg7MTk0NDsyODgw",
        "https://resizing.flixster.com/7u4rmttrQxBv11BTcv9YeilJdow=/180x267/v1.bTsxMzEyNjU1NztqOzE4NDc4OzIwNDg7NDMyOzY0MA",
        "https://resizing.flixster.com/zOGHVu1JLlDYW2onsC9STRBS0Ek=/180x267/v1.bTsxMzEzNzY3NjtqOzE4NDgzOzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/lXGKiMkNcKaJdqjjUhFD9rmSabM=/180x268/v1.bTsxMzE1NzQzNDtqOzE4NDg2OzIwNDg7NDM2OzY1MA",
        "https://resizing.flixster.com/gx4HlaSVevG-1u2Q1ZQPboVZEBY=/180x267/v1.bTsxMjkxMDQ3OTtqOzE4NDg4OzIwNDg7MTQ0MDsyMTMz",
        "https://resizing.flixster.com/8va6OsO20XghwGE99Npoj5q9SCA=/180x267/v1.bTsxMzA3OTIyMTtqOzE4NDgyOzIwNDg7NjQ4Ozk2MA",
        "https://resizing.flixster.com/XVOAyvTIUWnc5T3FEjTyZ2STguE=/180x267/v1.bTsxMjk0MTY2NDtqOzE4NDg4OzIwNDg7MTM1MDsyMDAw",
        "https://resizing.flixster.com/uPTadibFkhu1CdAouzI7eiEO4EM=/180x267/v1.bTsxMjg5OTUwMztqOzE4NDkyOzIwNDg7ODAwOzExODU",
        "https://resizing.flixster.com/bMXurS8ANaL1UZJtIBWwCvTNAJk=/180x267/v1.bTsxMjkwMjUzOTtqOzE4NDY4OzIwNDg7ODA3MTsxMTk5Mw",
        "https://resizing.flixster.com/tiGhd8U_4i9LDeL7I7cQu5t0U4Q=/180x267/v1.bTsxMzE1ODc2OTtqOzE4NDcxOzIwNDg7MjQzMDszNjAw",
        "https://resizing.flixster.com/PKRbLUTfuS2aUmEg2A_iZv75T8E=/180x266/v1.bTsxMjk0NzUxNztqOzE4NDkxOzIwNDg7ODAwOzExODI",
        "https://resizing.flixster.com/ggG-nVjbNvkjt-557e7RRqM067Y=/180x267/v1.bTsxMzE1NzQ0NDtqOzE4NDk2OzIwNDg7Mjc2NDs0MDk2",
        "https://resizing.flixster.com/8riZa31EmtrB6e5nedL0PcbE5fY=/180x270/v1.bTsxMzE2ODAxNTtqOzE4NDkyOzIwNDg7MjAwMDszMDAw",
        "https://resizing.flixster.com/klOl8M1LSJsFk9Edb3Xvmw2rooM=/180x267/v1.bTsxMzE5MTE0MTtqOzE4NDg4OzIwNDg7NzI5OzEwODA",
        "https://resizing.flixster.com/bl4c6ujir8iqJM9SjDsEp6bcJcI=/180x267/v1.bTsxMzA4MjIwOTtqOzE4NTAwOzIwNDg7MTA4MDsxNjAw",
        "https://resizing.flixster.com/JBBn3qRoLYFGPIB2DPzuMZaec5Q=/180x267/v1.bTsxMzIxNjQ0NTtqOzE4NTAyOzIwNDg7MjM5MjszNTQz",
        "https://resizing.flixster.com/tpZB5mfIXzy0lI1YCE6WzwoXfKk=/180x266/v1.bTsxMzAxNzc3NjtqOzE4NTA2OzIwNDg7NDA4ODs2MDM4",
        "https://resizing.flixster.com/JfRmYE-u4yiFRI36avDtQZ7SbxM=/180x267/v1.bTsxMzEyNDczNTtqOzE4NTAxOzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/LPS2iianLSunK6dsqmCezei8v5k=/180x267/v1.bTsxMzAwMDE1OTtqOzE4NDg0OzIwNDg7MjAwMDsyOTYz",
        "https://resizing.flixster.com/L_wvI-TUiZyCJ6oJVkthttaoMW4=/171x270/v1.bTsxMjc1NjU5NztqOzE4NTA0OzIwNDg7NDgwOzc2MA",
        "https://resizing.flixster.com/MImkYVfSaPyV2tUPvlJB3TaGoMg=/180x270/v1.bTsxMzE5NjQyNjtqOzE4NTA4OzIwNDg7MzYwMDs1NDAw",
        "https://resizing.flixster.com/3R9ajlpxwCWvNXombKbvtU88KTM=/180x267/v1.bTsxMzAxODU5MTtqOzE4NDY2OzIwNDg7Mjc2NDs0MDk2",
        "https://resizing.flixster.com/Plg3U_04Pn5JEMJw3TT56H6glwo=/180x267/v1.bTsxMzIwMzIxOTtqOzE4NTA2OzIwNDg7Mjc2NTs0MDk2",
        "https://resizing.flixster.com/0JjaB6OwIIx4sUClQWdBk_y2CRk=/180x267/v1.bTsxMzA0NjcwMjtqOzE4NDk4OzIwNDg7NjA3Mjs5MDAw",
        "https://resizing.flixster.com/T5ysHRS-IWeYpfJ2kEkTNmP_0d8=/180x267/v1.bTsxMzE1ODc3ODtqOzE4NDgwOzIwNDg7MTk0NDsyODgw",
        "https://resizing.flixster.com/JyqACcBipy-kMFS1Zott-CSGxVQ=/175x270/v1.bTsxMzAzNjU0MjtqOzE4NTA3OzIwNDg7MzYwMDs1NTUw",
        "https://resizing.flixster.com/8BfGDdbvCgqkKj4djqGFqfHZpqA=/180x240/v1.bTsxMjkwNzQ3OTtqOzE4NTAzOzIwNDg7MzAwOzQwMA",
        "https://resizing.flixster.com/gM1PRkLcEnwqDBjB1YairfLp64Q=/180x267/v1.bTsxMzE5MDI4NztqOzE4NDg5OzIwNDg7NDA1OzYwMA",
        "https://resizing.flixster.com/mUSS1uIsy-9rDh-veWA3eGfR5Es=/180x266/v1.bTsxMzI1Njg2MTtqOzE4NTA5OzIwNDg7ODE3NTsxMjA3NQ",
        "https://resizing.flixster.com/vbuJghh7ViUkFr_CFNN8wMDSeQ8=/180x266/v1.bTsxMzIxMTI4NztqOzE4NDc0OzIwNDg7NTAwOzc0MA",
        "https://resizing.flixster.com/OrEgmUUUrkdfR_6Uc22GAKjcb_M=/180x267/v1.bTsxMzAyMjc3NztqOzE4NDY3OzIwNDg7MjU0OzM3Nw",
        "https://resizing.flixster.com/EABYulXIfeP54pLACge7OQTM5n8=/180x267/v1.bTsxMzE4MDM2NDtqOzE4NTExOzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/S8-fcHHtcqEUiHo8uAJ-dAniXJs=/180x270/v1.bTsxMzAxNTQwNztqOzE4NDc3OzIwNDg7MjAwMDszMDAw",
        "https://resizing.flixster.com/0M0iREjql63GYfSCVN9QDe-dgOM=/180x266/v1.bTsxMzAzODIxNDtqOzE4NDY5OzIwNDg7ODE3NTsxMjA3NQ",
        "https://resizing.flixster.com/pINIjSm0Udm-XaNIUIaIAx4DxVo=/180x263/v1.bTsxMzA5MjM5NztqOzE4NDczOzIwNDg7MjY4MTszOTE4",
        "https://resizing.flixster.com/T8E-o0B0S3Z9uHk6HeKWSgeKoVE=/180x267/v1.bTsxMzEyNDczMztqOzE4NDk5OzIwNDg7MTk0NDsyODgw",
        "https://resizing.flixster.com/OOdj4Jg2QocmEyHciq9PO8X3wYs=/180x267/v1.bTsxMjkzNDIyNjtqOzE4NDc1OzIwNDg7MzcxMzs1NTAw",
        "https://resizing.flixster.com/WXI3UlD9VPpSddL4ijVAKcaLbU4=/180x267/v1.bTsxMzE4OTE2NztqOzE4NDk0OzIwNDg7MTk4MTsyOTMz",
        "https://resizing.flixster.com/Engh3ab4np1de9F3g6XDhxq_r1A=/180x267/v1.bTsxMzE5MTE0NztqOzE4NDk0OzIwNDg7MjU5MjszODQw",
        "https://resizing.flixster.com/FYVGlKQt119bOjvX-7D5Po8EPvA=/173x270/v1.bTsxMzE5NDc1OTtqOzE4NTA2OzIwNDg7OTYxOzE1MDA",
        "https://resizing.flixster.com/ciz4-oyoS9vM8I-dA1nLXWEdPHw=/180x267/v1.bTsxMjk4NTcyMjtqOzE4NDkyOzIwNDg7MTIxNTsxODAw",
        "https://resizing.flixster.com/UnP3-9gkqmWcwgvhOQI2AV_P6c8=/180x267/v1.bTsxMjk2OTMxODtqOzE4NDY4OzIwNDg7MTUwMDsyMjIy",
        "https://resizing.flixster.com/0iIFrPD6jC75CbK3Y3BrTe0GfKc=/180x267/v1.bTsxMzAyNTI5MTtqOzE4NTA2OzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/PxuFmzBTLb5yllm0unmhyh1vrbg=/180x267/v1.bTsxMjk5Mzk5NjtqOzE4NDg2OzIwNDg7MTY4ODsyNTAw",
        "https://resizing.flixster.com/CmUYhTrMg613Fobg3SWECRaCTCY=/180x267/v1.bTsxMzAzNjU0MztqOzE4NTA4OzIwNDg7MzAwMDs0NDQ0",
        "https://resizing.flixster.com/q6nVaCI-AuZh5EKqW9P5BKs8aP4=/180x270/v1.bTsxMzA3Njg2NjtwOzE4NDY3OzIwNDg7OTAwOzEzNTA",
        "https://resizing.flixster.com/FqV1-vkQDhw_7qC0p8AXAETeOkI=/171x270/v1.bTsxMzAyNTI3OTtqOzE4NDk0OzIwNDg7MzYwMDs1NzAw",
        "https://resizing.flixster.com/FixxAgXF2lwvMPfNCLbgMYZAjZo=/180x265/v1.bTsxMzExNTMzMjtqOzE4NTAzOzIwNDg7MTY5ODsyNTAw",
        "https://resizing.flixster.com/UVtsxOjrC3WJ1pdgQdN05EnQzoU=/180x267/v1.bTsxMzEzMTA4NDtqOzE4NTA1OzIwNDg7MjAxNzsyOTky",
        "https://resizing.flixster.com/E4I0DzwjTvEVwNvAr7jeXWSYLFQ=/180x267/v1.bTsxMzE3NzcxNTtqOzE4NDcyOzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/swzvUVXCQxeuQjbgUB6dSjMVPuQ=/180x266/v1.bTsxMjk3NzMwNztqOzE4NDkyOzIwNDg7MjQzNDszNjAw",
        "https://resizing.flixster.com/NdJbnmFjI9rzNPANFprTV4rlQT0=/180x267/v1.bTsxMjk3ODk1ODtqOzE4NDc4OzIwNDg7MTA4MDsxNjAw",
        "https://resizing.flixster.com/o9AWU1lXrygJoCLvueEKJ9t9ydg=/180x267/v1.bTsxMjk2MDAwNztqOzE4NDcyOzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/cgkuZw-qq9bDgvq1rdsQiFIMVbk=/180x266/v1.bTsxMjk0MDM5NjtqOzE4NDgwOzIwNDg7Mzc4OzU1OQ",
        "https://resizing.flixster.com/2bGuywEr4aj1Qx3TEtYq3nN9lho=/180x267/v1.bTsxMzA4OTMwNDtqOzE4NDg1OzIwNDg7MjAyNjszMDAx",
        "https://resizing.flixster.com/og0t8d3A1IE-pWOVvXgeAtgW82I=/180x267/v1.bTsxMzAxNTY5NjtqOzE4NDk2OzIwNDg7MTM4MjsyMDQ4",
        "https://resizing.flixster.com/e6UFY8sydgrDM02uDK0FQmNLT9Q=/180x267/v1.bTsxMjk0MjE1NDtqOzE4NDgzOzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/rvXSK_5LHFbHiMfGWN3F4c76440=/180x265/v1.bTsxMzA4ODU0NTtqOzE4NDkxOzIwNDg7ODI1MDsxMjE1MA",
        "https://resizing.flixster.com/pLtysDhiT7OQC6qaHv0Ty2_i_VM=/180x262/v1.bTsxMjk2MDAxMDtqOzE4NDc1OzIwNDg7MTk4MDsyODgw",
        "https://resizing.flixster.com/hje8x5oaFfz3gJ380JRgACSkeDc=/180x267/v1.bTsxMzAxOTkzMjtqOzE4NTAyOzIwNDg7MTY4ODsyNTAw",
        "https://resizing.flixster.com/kaRBn4s0f31Fcs9TGsXWr6SCMsQ=/180x267/v1.bTsxMzE4NTUzOTtqOzE4NTExOzIwNDg7Mjc2NDs0MDk2",
        "https://resizing.flixster.com/dQt17a-YFfvfy_MrpqKPFhHFU4c=/180x254/v1.bTsxMjgxNzIyMDtqOzE4NDY4OzIwNDg7MzAwOzQyMw",
        "https://resizing.flixster.com/-03MGgrXlpR_ASrrYHAthBCBCuw=/180x266/v1.bTsxMzIyNzMzMDtqOzE4NDk4OzIwNDg7Mjc2OzQwOA",
        "https://resizing.flixster.com/4_rcyclw2BRb8jfU3LzIddPj2gs=/180x267/v1.bTsxMzE1ODIwMjtqOzE4NDg5OzIwNDg7Njc0Ozk5OA",
        "https://resizing.flixster.com/kOZTw3m3wvbEu4KqmrQD5P1-Jk0=/180x267/v1.bTsxMzI0NzQyNztqOzE4NDgwOzIwNDg7NjA3Mjs5MDAw",
        "https://resizing.flixster.com/Nq5liH8ntGtdlk6cyDs80DfxmiE=/180x267/v1.bTsxMzIxOTQ4NztqOzE4NDg1OzIwNDg7MTUwMDsyMjIy",
        "https://resizing.flixster.com/E4yA9709eKXXpgxxaOVTQ74JyYw=/180x267/v1.bTsxMzIzMzkwOTtqOzE4NTA3OzIwNDg7NjA3Mjs5MDAw",
        "https://resizing.flixster.com/vWrNQc_Dq9QDn2ljv9Ze_3aXHj0=/180x267/v1.bTsxMjk3Mjc1NTtqOzE4NDg1OzIwNDg7MTAwMDsxNDgx",
        "https://resizing.flixster.com/6K9iZ9-riiKg9BD7vDcjsBbzmD4=/180x257/v1.bTsxMjg0MTY4MDtqOzE4NDkzOzIwNDg7MzI2OzQ2NQ",
        "https://resizing.flixster.com/7JDCuJhYT_wOCuZH2pYPx2c2ufQ=/180x263/v1.bTsxMzIzODU5NjtqOzE4NDY5OzIwNDg7ODEwMDsxMTg1MA",
        "https://resizing.flixster.com/RzEUsR3g1eQzI6hIP12R7z9JA4k=/180x267/v1.bTsxMzIwODY1MjtqOzE4NDk0OzIwNDg7MTM1MDsyMDAw",
        "https://resizing.flixster.com/Mx0yV2Q5EIp_YxZzTu3_PPVxJMg=/180x265/v1.bTsxMjk2Mzk1NztwOzE4NTA3OzIwNDg7NDE3OzYxNA",
        "https://resizing.flixster.com/FSUu2hjlC85Y8r52mwEzRq9pAdY=/180x267/v1.bTsxMjk4MjE1NztqOzE4NDgyOzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/JQI49fD22fFcfdq8yKXEll7TKbY=/180x267/v1.bTsxMjkxNDAzMDtqOzE4NDg0OzIwNDg7NDA1MDs2MDAw",
        "https://resizing.flixster.com/sck7NntDzH6Bv1BFGxddaiT01t4=/180x264/v1.bTsxMzE4OTE2NTtqOzE4NDkyOzIwNDg7MjAwMDsyOTI5",
        "https://resizing.flixster.com/VkQl4Zjfy_3aS0K0GMIDVX32Cpc=/180x270/v1.bTsxMzIxMTI4OTtqOzE4NDc2OzIwNDg7NzUwOzExMjM",
        "https://resizing.flixster.com/PFSqGEzPTxEiENpPu4C4AX3f1Es=/180x260/v1.bTsxMzIwNDU4NTtqOzE4NDc3OzIwNDg7ODEwMDsxMTcwMA",
        "https://resizing.flixster.com/TUDXFgRyEAcQTkwJUSHir8r8MSU=/180x267/v1.bTsxMzE4MjI0NjtqOzE4NTAzOzIwNDg7MTM4MjsyMDQ4",
        "https://resizing.flixster.com/LeK_KcGpgFr2AU_crMZQrCVZw0A=/180x270/v1.bTsxMzE0MzgwMDtqOzE4NDg3OzIwNDg7NzE2OzEwNzU",
        "https://resizing.flixster.com/nGloK-2BAUAKEH1n8TLujhzc_N4=/180x267/v1.bTsxMzA2MTgzNDtqOzE4NTEwOzIwNDg7MjE2MDszMjAw",
        "https://resizing.flixster.com/Z4JX1UgCNouDGP2y7mhwMEr_9-g=/180x264/v1.bTsxMzI5Nzg5MDtqOzE4NDk4OzIwNDg7MTAwMDsxNDY0",
        "https://resizing.flixster.com/0-H0q2GrRKw5ff-DsGwovcTqx_k=/180x267/v1.bTsxMzE5MDI4NjtqOzE4NDg4OzIwNDg7MTk0NDsyODgw",
        "https://resizing.flixster.com/xyGiffsjfntUFsOAX_uW5iFwREk=/180x266/v1.bTsxMjg5NzMxODtqOzE4NDY3OzIwNDg7ODE0OTsxMjA0Nw",
        "https://resizing.flixster.com/kJ1bej39gVMyJD0OBLNY9P8APcs=/180x266/v1.bTsxMzE0MzgxMjtwOzE4NDk5OzIwNDg7ODAwOzExODI",
        "https://resizing.flixster.com/heuW6lr88Fzc9xIchiZha0cntPI=/180x267/v1.bTsxMjk2NzEzMjtqOzE4NDg3OzIwNDg7Mjc2NDs0MDk2",
        "https://resizing.flixster.com/WtE_uw9Nhb4GpA5ez-Af_oryMn4=/180x265/v1.bTsxMzE4MDM2MztqOzE4NTEwOzIwNDg7MjAwMDsyOTQ1",
        "https://resizing.flixster.com/-h20FGaP418xyTHzCknoU3zxFIY=/180x267/v1.bTsxMzE1NzE5MztqOzE4NDcwOzIwNDg7NzI5OzEwODA",
        "https://resizing.flixster.com/LpOv7dpLgVVEDmIjvdP9osjVsHw=/180x267/v1.bTsxMzEzNTk5NTtqOzE4NDY3OzIwNDg7MTk0NDsyODgw",
        "https://resizing.flixster.com/hyySmHj6NUwFh6HEHrxsoADoLrQ=/180x267/v1.bTsxMzAxNzc1MjtqOzE4NDgyOzIwNDg7MjAyNjszMDAx",
        "https://resizing.flixster.com/t427O_m8ZcWuS4lL-PDnmyLs2Z0=/180x267/v1.bTsxMzAyMzkxNjtqOzE4NDgxOzIwNDg7MTA4NjsxNjA5",
        "https://resizing.flixster.com/VpUM0I0FZz2G0imQKRTAakoJoYI=/180x267/v1.bTsxMzIxNjQ1MjtqOzE4NTA5OzIwNDg7MTYwMDsyMzcw",
        "https://resizing.flixster.com/cJL9m76v_zXycTSgQTJzAPt5q2s=/180x257/v1.bTsxMjg0NDEzNjtqOzE4NDc0OzIwNDg7MTAwMDsxNDI5",
        "https://resizing.flixster.com/0JOeGSxZw8FJo0SEusAsAI16Lc8=/180x270/v1.bTsxMzA1Nzc4MztqOzE4NTA5OzIwNDg7NTAwOzc1MA",
        "https://resizing.flixster.com/rBP7p1B-2ahuRVVOr0hRpWkUv8g=/180x258/v1.bTsxMzExODE4MjtqOzE4NDczOzIwNDg7NDUwMDs2NDUw",
        "https://resizing.flixster.com/qK3RADw54DNoleZ9jRoFq5_SE4c=/180x267/v1.bTsxMjk3NDA0NTtqOzE4NDcwOzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/foxmL1DAoDTbTqpuv8FR1Gj4ZGs=/180x267/v1.bTsxMzA2NjY1MjtqOzE4NDY4OzIwNDg7MjAyNTszMDAw",
        "https://resizing.flixster.com/JeN9Rb8qjDzb1WBRV6TnT0UlsRM=/180x267/v1.bTsxMzAxOTkzNjtqOzE4NTA2OzIwNDg7MTk0NDsyODgw",
        "https://resizing.flixster.com/MIz3t0cpXvQ9g8FuphkroqAotPI=/180x240/v1.bTsxMjk5MjM1NTtqOzE4NDY1OzIwNDg7MjgzNTszNzgw",
        "https://resizing.flixster.com/p9Gg15gGsyShBrU96_iHN-HWKT8=/180x267/v1.bTsxMzEzMDY1MztqOzE4NDc5OzIwNDg7NDM4OzY1MA",
        "https://resizing.flixster.com/qgkGWSq5kb0D7H5HzQcEymu31h4=/180x267/v1.bTsxMzA5MzQwMjtqOzE4NDg4OzIwNDg7MTY4ODsyNTAw",
        "https://resizing.flixster.com/jScQd-zaew8Wst-TAMOVt3JAlD4=/180x267/v1.bTsxMzAxNDI3MztqOzE4NDY4OzIwNDg7MjAwMDsyOTYz",
        "https://resizing.flixster.com/BIHuARZ3M8Hh0O0WHhIfgEB7j3g=/180x267/v1.bTsxMjk4MDMxNDtqOzE4NDg0OzIwNDg7ODA5NTsxMTk5OA",
        "https://resizing.flixster.com/WZfaOzjfqJG5dJWxB4ch87NBbrg=/180x267/v1.bTsxMjk3ODk2MjtqOzE4NDgyOzIwNDg7ODEwOzEyMDA",
        "https://resizing.flixster.com/OTvXHQ1BdkE6XSyc9P5l_tLix2A=/180x267/v1.bTsxMzIyNDEwMjtqOzE4NTEwOzIwNDg7MjQwMDszNTU2",
        "https://resizing.flixster.com/vQQGx9AZy6OW9-ZzEp9hoiyQeT0=/177x270/v1.bTsxMzE4OTE4NTtwOzE4NDY3OzIwNDg7Nzc5OzExODU",
        "https://resizing.flixster.com/XTMhKUGJaCUXzEdFbTxEBPN08RA=/180x267/v1.bTsxMzEzMTA4NjtqOzE4NTA3OzIwNDg7MTM1MDsyMDAw",
        "https://resizing.flixster.com/RpZphXTJgNnTlaoTxVktwpbC-P0=/180x267/v1.bTsxMzA4OTMxNDtqOzE4NDk1OzIwNDg7MTM1MDsyMDAw",
        "https://resizing.flixster.com/4ttCz95gV4H6phjMNstYcn5K_Hg=/180x258/v1.bTsxMjY5MjE4MztqOzE4NDg0OzIwNDg7NjcwOzk2MA",
    ];

    $maturity_ratings = [
        'G',
        'PG',
        'PG-13',
        'R',
        'NC-17'
    ];
    $quality = [
        'HD',
        'FULL HD',
        '4K'
    ];

    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'cover' => $faker->randomElement($movie_images_url),
        'year' => $faker->year,
        'is_premium' => $faker->numberBetween(0, 1),
        'is_new' => $faker->boolean,
        'trailer_url' => 'https://www.youtube.com/embed/vOUVVDWdXbo',
        'maturity_ratings' => $faker->randomElement($maturity_ratings),
        'rate' => $faker->numberBetween(0.0, 10.0),
        'publish_date' => now(),
        'running_time' => $faker->numberBetween(1.1, 4.5),
        'quality' => $faker->randomElement($quality),
    ];
});
