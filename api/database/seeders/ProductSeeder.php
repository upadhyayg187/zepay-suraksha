<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate(); // Clear the table before seeding

        $products = [
            [
                'name' => 'Arogya Sanjeevani',
                'slug' => 'arogya-sanjeevani',
                'category' => 'Health Insurance',
                'provider' => 'Tata AIG',
                'summary' => 'Comprehensive health coverage for you and your family.',
                'description' => 'A standard health insurance policy that provides coverage for basic hospitalisation expenses up to Rs. 5 lakhs.',
                'features' => json_encode(['Cashless Treatment', 'No Claim Bonus', 'Lifetime Renewability']),
                'base_premium' => 5000.00,
            ],
            [
                'name' => 'Click 2 Protect Life',
                'slug' => 'click-2-protect-life',
                'category' => 'Term Life Insurance',
                'provider' => 'HDFC Life',
                'summary' => 'A comprehensive term plan with multiple cover options.',
                'description' => 'Secure your family\'s future with a high cover at an affordable premium. Options for critical illness rider available.',
                'features' => json_encode(['High Sum Assured', 'Multiple Payout Options', 'Tax Benefits']),
                'base_premium' => 8000.00,
            ],
            [
                'name' => 'DriveSmart',
                'slug' => 'drivesmart',
                'category' => 'Motor Insurance',
                'provider' => 'Bajaj Allianz',
                'summary' => 'Complete protection for your car against all odds.',
                'description' => 'Covers own damage, third-party liability, and personal accident cover. Add-ons like zero depreciation available.',
                'features' => json_encode(['Zero Depreciation', '24x7 Roadside Assistance', 'Cashless Garage Network']),
                'base_premium' => 12000.00,
            ],
            // Add 12 more products for variety
            [
                'name' => 'MediCare Premier',
                'slug' => 'medicare-premier',
                'category' => 'Health Insurance',
                'provider' => 'ICICI Lombard',
                'summary' => 'Premium health plan with global coverage.',
                'description' => 'A high-end health insurance policy with international coverage, wellness benefits, and high sum insured options.',
                'features' => json_encode(['International Cover', 'Wellness Program', 'High Sum Insured']),
                'base_premium' => 15000.00,
            ],
            [
                'name' => 'iTerm Smart',
                'slug' => 'iterm-smart',
                'category' => 'Term Life Insurance',
                'provider' => 'Max Life Insurance',
                'summary' => 'Affordable term plan with flexible payout options.',
                'description' => 'A pure protection plan that offers financial security to your loved ones in your absence.',
                'features' => json_encode(['Affordable Premiums', 'Critical Illness Rider', 'Multiple Death Benefit Options']),
                'base_premium' => 7500.00,
            ],
             [
                'name' => 'Bike Secure',
                'slug' => 'bike-secure',
                'category' => 'Motor Insurance',
                'provider' => 'Go Digit',
                'summary' => 'All-round protection for your two-wheeler.',
                'description' => 'Comprehensive coverage for your bike, including theft, accident, and third-party liability.',
                'features' => json_encode(['Quick Claim Settlement', 'Customizable IDV', 'Third-Party Liability']),
                'base_premium' => 2500.00,
            ],
            [
                'name' => 'Travel Secure',
                'slug' => 'travel-secure',
                'category' => 'Travel Insurance',
                'provider' => 'Reliance General',
                'summary' => 'Worry-free travel with comprehensive coverage.',
                'description' => 'Covers medical emergencies, trip cancellations, lost baggage, and other travel-related risks.',
                'features' => json_encode(['Medical Emergency Cover', 'Baggage Loss Cover', 'Trip Cancellation']),
                'base_premium' => 1200.00,
            ],
            [
                'name' => 'Sanchay Plus',
                'slug' => 'sanchay-plus',
                'category' => 'Investment Plans',
                'provider' => 'SBI Life',
                'summary' => 'A guaranteed income savings plan.',
                'description' => 'A non-linked, non-participating life insurance plan that offers guaranteed returns.',
                'features' => json_encode(['Guaranteed Returns', 'Life Cover', 'Tax Benefits']),
                'base_premium' => 50000.00,
            ],
            [
                'name' => 'Optima Restore',
                'slug' => 'optima-restore',
                'category' => 'Health Insurance',
                'provider' => 'HDFC Ergo',
                'summary' => 'Restore your sum insured automatically.',
                'description' => 'A unique health plan that restores your basic sum insured 100% after your first claim.',
                'features' => json_encode(['100% Restore Benefit', 'Preventive Health Check-ups', 'E-opinion']),
                'base_premium' => 9000.00,
            ],
            [
                'name' => 'Smart Term Plan',
                'slug' => 'smart-term-plan',
                'category' => 'Term Life Insurance',
                'provider' => 'Tata AIA',
                'summary' => 'Term insurance with whole life cover option.',
                'description' => 'Provides coverage up to 100 years of age, ensuring lifelong protection.',
                'features' => json_encode(['Whole Life Cover', 'Return of Premium Option', 'Inbuilt Riders']),
                'base_premium' => 10000.00,
            ],
            [
                'name' => 'Commercial Vehicle Protect',
                'slug' => 'commercial-vehicle-protect',
                'category' => 'Motor Insurance',
                'provider' => 'New India Assurance',
                'summary' => 'Comprehensive cover for your commercial vehicle.',
                'description' => 'Protects goods-carrying and passenger-carrying vehicles from various risks.',
                'features' => json_encode(['Goods & Passenger Cover', 'Legal Liability', 'Personal Accident Cover']),
                'base_premium' => 25000.00,
            ],
            [
                'name' => 'Home Shield',
                'slug' => 'home-shield',
                'category' => 'Home Insurance',
                'provider' => 'ICICI Lombard',
                'summary' => 'Complete protection for your home and its contents.',
                'description' => 'Covers your home structure and belongings against fire, burglary, and natural calamities.',
                'features' => json_encode(['Structure & Content Cover', 'Burglary & Theft Cover', 'Natural Calamity Cover']),
                'base_premium' => 3000.00,
            ],
             [
                'name' => 'ProHealth Protect',
                'slug' => 'prohealth-protect',
                'category' => 'Health Insurance',
                'provider' => 'ManipalCigna',
                'summary' => 'Affordable health plan with smart features.',
                'description' => 'A comprehensive yet affordable health plan that covers hospitalization and other medical expenses.',
                'features' => json_encode(['In-patient Hospitalization', 'Day Care Procedures', 'Pre & Post Hospitalization']),
                'base_premium' => 6500.00,
            ],
             [
                'name' => 'eTerm',
                'slug' => 'eterm',
                'category' => 'Term Life Insurance',
                'provider' => 'LIC',
                'summary' => 'A pure online term assurance policy.',
                'description' => 'A traditional term plan from India\'s most trusted insurer, available online.',
                'features' => json_encode(['High Rebates', 'Trusted Brand', 'Pure Protection']),
                'base_premium' => 9500.00,
            ],
             [
                'name' => 'Motor Secure',
                'slug' => 'motor-secure',
                'category' => 'Motor Insurance',
                'provider' => 'United India',
                'summary' => 'Reliable car insurance from a public sector giant.',
                'description' => 'Comprehensive motor insurance policy covering all your basic needs.',
                'features' => json_encode(['Wide Garage Network', 'Third-Party Cover', 'Personal Accident Cover']),
                'base_premium' => 11000.00,
            ],
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
