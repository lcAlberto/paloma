<?php

namespace Database\Seeders;

use App\Models\Models\Address\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create(
            [
                'id' => 1,
                'name' => 'Brazil',
                'iso3' => 'BRA',
                'iso2' => 'BR',
                'phonecode' => '55',
                'capital' => 'Brasilia',
                'currency' => 'BRL',
                'currency_symbol' => 'R$',
                'tld' => '.br',
                'native' => 'Brasil',
                'region' => 'Americas',
                'subregion' => 'South America',
                'timezones' => '[{"zoneName":"America\\/Araguaina","gmtOffset":-10800,"gmtOffsetName":"UTC-03:00","abbreviation":"BRT","tzName":"Bras\\u00edlia Time"},{"zoneName":"America\\/Bahia","gmtOffset":-10800,"gmtOffsetName":"UTC-03:00","abbreviation":"BRT","tzName":"Bras\\u00edlia Time"},{"zoneName":"America\\/Belem","gmtOffset":-10800,"gmtOffsetName":"UTC-03:00","abbreviation":"BRT","tzName":"Bras\\u00edlia Time"},{"zoneName":"America\\/Boa_Vista","gmtOffset":-14400,"gmtOffsetName":"UTC-04:00","abbreviation":"AMT","tzName":"Amazon Time (Brazil)[3"},{"zoneName":"America\\/Campo_Grande","gmtOffset":-14400,"gmtOffsetName":"UTC-04:00","abbreviation":"AMT","tzName":"Amazon Time (Brazil)[3"},{"zoneName":"America\\/Cuiaba","gmtOffset":-14400,"gmtOffsetName":"UTC-04:00","abbreviation":"BRT","tzName":"Brasilia Time"},{"zoneName":"America\\/Eirunepe","gmtOffset":-18000,"gmtOffsetName":"UTC-05:00","abbreviation":"ACT","tzName":"Acre Time"},{"zoneName":"America\\/Fortaleza","gmtOffset":-10800,"gmtOffsetName":"UTC-03:00","abbreviation":"BRT","tzName":"Bras\\u00edlia Time"},{"zoneName":"America\\/Maceio","gmtOffset":-10800,"gmtOffsetName":"UTC-03:00","abbreviation":"BRT","tzName":"Bras\\u00edlia Time"},{"zoneName":"America\\/Manaus","gmtOffset":-14400,"gmtOffsetName":"UTC-04:00","abbreviation":"AMT","tzName":"Amazon Time (Brazil)"},{"zoneName":"America\\/Noronha","gmtOffset":-7200,"gmtOffsetName":"UTC-02:00","abbreviation":"FNT","tzName":"Fernando de Noronha Time"},{"zoneName":"America\\/Porto_Velho","gmtOffset":-14400,"gmtOffsetName":"UTC-04:00","abbreviation":"AMT","tzName":"Amazon Time (Brazil)[3"},{"zoneName":"America\\/Recife","gmtOffset":-10800,"gmtOffsetName":"UTC-03:00","abbreviation":"BRT","tzName":"Bras\\u00edlia Time"},{"zoneName":"America\\/Rio_Branco","gmtOffset":-18000,"gmtOffsetName":"UTC-05:00","abbreviation":"ACT","tzName":"Acre Time"},{"zoneName":"America\\/Santarem","gmtOffset":-10800,"gmtOffsetName":"UTC-03:00","abbreviation":"BRT","tzName":"Bras\\u00edlia Time"},{"zoneName":"America\\/Sao_Paulo","gmtOffset":-10800,"gmtOffsetName":"UTC-03:00","abbreviation":"BRT","tzName":"Bras\\u00edlia Time"}]',
                'translations' => '{"br":"Brasil","pt":"Brasil","nl":"Brazilië","hr":"Brazil","fa":"برزیل","de":"Brasilien","es":"Brasil","fr":"Brésil","ja":"ブラジル","it":"Brasile"}',
                'latitude' => '-10.00000000',
                'longitude' => '-55.00000000',
                'emoji' => '🇧🇷',
                'emojiU' => 'U+1F1E7 U+1F1F7',
                'created_at' => '2018-07-20 20:11:03',
                'updated_at' => '2021-02-20 14:24:49',
                'flag' => 1,
                'wikiDataId' => 'Q155',
            ],
            [
                'id' => 2,
                'name' => 'Portugal',
                'iso3' => 'PRT',
                'iso2' => 'PT',
                'phonecode' => '351',
                'capital' => 'Lisbon',
                'currency' => 'EUR',
                'currency_symbol' => '€',
                'tld' => '.pt',
                'native' => 'Portugal',
                'region' => 'Europe',
                'subregion' => 'Southern Europe',
                'timezones' => '[{"zoneName":"Atlantic\\/Azores","gmtOffset":-3600,"gmtOffsetName":"UTC-01:00","abbreviation":"AZOT","tzName":"Azores Standard Time"},{"zoneName":"Atlantic\\/Madeira","gmtOffset":0,"gmtOffsetName":"UTC\\u00b100","abbreviation":"WET","tzName":"Western European Time"},{"zoneName":"Europe\\/Lisbon","gmtOffset":0,"gmtOffsetName":"UTC\\u00b100","abbreviation":"WET","tzName":"Western European Time"}]',
                'translations' => '{"br":"Portugal","pt":"Portugal","nl":"Portugal","hr":"Portugal","fa":"پرتغال","de":"Portugal","es":"Portugal","fr":"Portugal","ja":"ポルトガル","it":"Portogallo"}',
                'latitude' => '39.50000000',
                'longitude' => '-8.00000000',
                'emoji' => '🇵🇹',
                'emojiU' => 'U+1F1F5 U+1F1F9',
                'created_at' => '2018-07-20 20:11:03',
                'updated_at' => '2021-02-20 14:24:49',
                'flag' => 1,
                'wikiDataId' => 'Q45',
            ],
            [
                'id' => 3,
                'name' => 'Colombia',
                'iso3' => 'COL',
                'iso2' => 'CO',
                'phonecode' => '57',
                'capital' => 'Bogota',
                'currency' => 'COP',
                'currency_symbol' => '$',
                'tld' => '.co',
                'native' => 'Colombia',
                'region' => 'Americas',
                'subregion' => 'South America',
                'timezones' => '[{"zoneName":"America\\/Bogota","gmtOffset":-18000,"gmtOffsetName":"UTC-05:00","abbreviation":"COT","tzName":"Colombia Time"}]',
                'translations' => '{"br":"Colômbia","pt":"Colômbia","nl":"Colombia","hr":"Kolumbija","fa":"کلمبیا","de":"Kolumbien","es":"Colombia","fr":"Colombie","ja":"コロンビア","it":"Colombia"}',
                'latitude' => '4.00000000',
                'longitude' => '-72.00000000',
                'emoji' => '🇨🇴',
                'emojiU' => 'U+1F1E8 U+1F1F4',
                'created_at' => '2018-07-20 20:11:03',
                'updated_at' => '2021-02-20 14:24:49',
                'flag' => 1,
                'wikiDataId' => 'Q739',

            ]
        );
    }
}
