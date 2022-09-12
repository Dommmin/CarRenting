<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Car;
use App\Models\Rent;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin1234')
        ]);

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('user1234')
        ]);

        Car::factory()->create([
            'name' => 'Lamborghini Urus',
            'year' => 2021,
            'fuel' => 'Benzyna',
            'fuel_consumption' => 12.7,
            'seats' => 5,
            'gearbox' => 'Automatyczna',
            'price' => 5000,
            'horsepower' => 650,
            'torque' => 850,
            'acceleration' => 3.6,
            'engine' => 3996,
            'drivetrain' => 'AWD',
            'images' => ['lamborghini-urus-1.jpg', '1113721.jpg', '906001.jpg', '906000.jpg', '905999.jpg'],
            'main' => 'lamborghini-urus-1.jpg',
            'description' => 'Luksusowy i superszybki SUV z bykiem na masce, to naprawdę auto oferujące sporo miejsca a przy tym praktyczne. Urus ma 5112 mm długości, 2016 mm szerokości i 1638 mm wysokości. Lamborghini postawiło na ostrą i agresywną stylistykę, pomimo tego udało wygospodarować się spory bagaznik o pojemności 616l w konfiguracji 5 miejscowej i 574l przy wyposażeniu w dwa osobne fotele zamiast tylniej kanapy.',
        ]);

        Car::factory()->create([
            'name' => 'BMW M5 G30',
            'year' => 2021,
            'fuel' => 'Benzyna',
            'fuel_consumption' => 11.3,
            'seats' => 5,
            'gearbox' => 'Automatyczna',
            'price' => 3000,
            'horsepower' => 600,
            'torque' => 750,
            'acceleration' => 3.4,
            'engine' => 4395,
            'drivetrain' => 'AWD',
            'images' => ['bmw-m5-1.jpg'],
            'main' => 'bmw-m5-1.jpg',
            'description' => 'Siódma, obecnie produkowana generacja modelu (oznaczona symbolem G30), wprowadzona na rynek w 2017 roku. W porównaniu do poprzednika, przeprowadzono w nim nieznaczne zmiany stylistyczne. Samochód zbudowano na płycie podłogowej BMW OKL Platform, którą wcześniej zastosowano w Serii 7. Dzięki większemu zastosowaniu aluminium, nowa Seria 5 jest 100 kg lżejsza od modelu poprzedniej generacji.',
            'available' => false,
        ]);

        Car::factory()->create([
            'name' => 'Audi RS7 II',
            'year' => 2021,
            'fuel' => 'Benzyna',
            'fuel_consumption' => 12.8,
            'seats' => 5,
            'gearbox' => 'Automatyczna',
            'price' => 3500,
            'horsepower' => 600,
            'torque' => 800,
            'acceleration' => 3.6,
            'engine' => 3996,
            'drivetrain' => 'AWD',
            'images' => ['1070842.jpg', '1070848.jpg', '1070850.jpg', '1070851.jpg'],
            'main' => '1070850.jpg',
            'description' => 'Audi RS7 jest swoistym sprzedawcą uśmiechu. Sprzedawcą uśmiechu, który poprawia humor po każdym mocniejszym wciśnięciu pedału gazu. Dodatkową atrakcją, którą docenią prawdziwi fani motoryzacji i którą przeklną wielbiciele ciszy i spokoju, jest układ wydechowy, a konkretnie dźwięk, jaki potrafi z siebie wydobyć ten samochód.',
        ]);

        Car::factory()->create([
            'name' => 'Tesla S plaid',
            'year' => 2022,
            'fuel' => 'Elektryk',
            'fuel_consumption' => 0,
            'seats' => 5,
            'gearbox' => 'Automatyczna',
            'price' => 2500,
            'horsepower' => 1020,
            'torque' => 1420,
            'acceleration' => 2.1,
            'engine' => 0,
            'drivetrain' => 'AWD',
            'images' => ['tesla_model_s_plaid.jpg'],
            'main' => 'tesla_model_s_plaid.jpg',
            'description' => 'Tesla Model S jako drugi samochód elektryczny na świecie dysponuje trzema silnikami. Zbudowano je z wykorzystaniem włókna węglowego. Elon Musk stwierdził, że nie było to łatwe, ze względu na różnicę w rozszerzalności cieplnej pomiędzy włóknem węglowym a miedzią, ale w końcu się udało. Taka konstrukcja ma także inną zaletę - silniki Tesli są lekkie - ponoć da się je bez problemu unieść. Całość potrafi rozkręcić się do 20 tys. obr./min. Zmodernizowana bryła nadwozia ma także rekordowo niski współczynnik oporu aerodynamicznego - 0,208.',
            'available' => false,
        ]);

        Car::factory()->create([
            'name' => 'Audi RS E-tron GT',
            'year' => 2021,
            'fuel' => 'Elektryk',
            'fuel_consumption' => 0,
            'seats' => 4,
            'gearbox' => 'Automatyczna',
            'price' => 3200,
            'horsepower' => 598,
            'torque' => 830,
            'acceleration' => 3.3,
            'engine' => 0,
            'drivetrain' => 'AWD',
            'images' => ['audi_rs_e_tron_gt.jpg'],
            'main' => 'audi_rs_e_tron_gt.jpg',
            'description' => 'Audi e-tron to pierwszy w pełni elektryczny samochód spod znaku czterech pierścieni. Potężnie zbudowany sportowy SUV umiejętnie łączy dużą przestrzeń z komfortem samochodu luksusowego. Jego baterie mają zapewniać zasięg powyżej 400 km oraz możliwość szybkiego ładowania w czasie krótszym niż 30 minut.'
        ]);

        Car::factory()->create([
            'name' => 'Porsche Taycan Turbo S',
            'year' => 2021,
            'fuel' => 'Elektryk',
            'fuel_consumption' => 0,
            'seats' => 4,
            'gearbox' => 'Automatyczna',
            'price' => 2800,
            'horsepower' => 761,
            'torque' => 1050,
            'acceleration' => 2.8,
            'engine' => 0,
            'drivetrain' => 'AWD',
            'images' => ['taycan-turbo-s.jpg'],
            'main' => 'taycan-turbo-s.jpg',
            'description' => 'W przypadku Taycana Turbo S mówimy o naprawdę szybkim aucie z Zuffenhausen. Przyspiesza do setki w 2,8 sekundy i – jak dowiedziałem się nieoficjalnie – wytrzymuje prawie 30 prób sprintu od 0 do 200 kilometrów na godzinę zanim poprosi o chwilę przerwy.',
            'available' => false,
        ]);

        Rent::factory(10)->create();
    }
}
