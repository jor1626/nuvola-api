<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Tables.
     *
     * @var array
     */
    public $countries = [
        [
           'name' => 'Colombia',
           'departaments' => [
                [
                   'name' => 'Atlanticó',
                   'municipalities' => [
                       [
                           'name' => 'Barranquilla',
                           'name' => 'Soledad'
                       ]
                   ]
                ], [
                    'name' => 'Guajirá',
                    'municipalities' => [
                        [
                            'name' => 'Rioacha'
                        ]
                    ]
                ], [
                    'name' => 'Norte de santander',
                    'municipalities' => [
                        [
                            'name' => 'Bucaramanga'
                        ]
                    ]
                ],[
                    'name' => 'Antioquia',
                    'municipalities' => [
                        [
                            'name' => 'Medellín'
                        ]
                    ]
                ]
            ]
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->countries as $country) {
            $countrySave = new Country();
            $countrySave->name = $country['name'];
            $countrySave->save();
            foreach ($country['departaments'] as $departament) {
                $departamentSave =  $countrySave->departaments()->create([
                                        "name" => $departament['name']
                                    ]);
                $departamentSave->save();
                foreach ($departament['municipalities'] as $municipality) {
                    $departamentSave->municipalities()->create([
                        "name" => $municipality['name']
                    ])->save();
                }
            }
        }
    }
}
