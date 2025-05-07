<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Double Glazed Window Unit',
                'Composite Front Door',
                'Standard Radiator (1200x600)',
                'Electric Boiler (10kW)',
                'Thermostatic Shower Kit',
                'Wall-Mounted Air Conditioning Unit',
                'Underfloor Heating Mat (5m²)',
                'PVC Drainage Pipe (4m)',
                'Copper Piping (15mm, 10m Roll)',
                'LED Downlight Pack (10 Units)',
                'External Wall Insulation Board (100mm)',
                'Roof Tile Replacement Pack',
                'Electrical Consumer Unit (12 Way)',
                'Vinyl Flooring (Per m²)',
                'Kitchen Worktop (Laminate, 3m)',
                'Bathroom Vanity Unit (600mm)',
                'Smoke Alarm (Hardwired)',
                'Smart Thermostat',
                'Loft Insulation Roll (100mm, 10m²)',
                'Motion Sensor Light (Outdoor)',
                'Wooden Fence Panel (6ft x 5ft)',
                'Central Heating Pump',
                'Wall-Mounted Towel Radiator',
                'Flush Ceiling Speaker Pair',
                'Extractor Fan (Bathroom)',
                'Waterproof LED Strip (5m)',
                'Programmable Timer Switch',
                'Exterior Security Camera',
                'High-Efficiency Toilet Unit',
                'Composite Decking Board (3.6m)',
                'Electrical Cable Reel (100m)',
                'Circuit Breaker (32A)',
                'Concrete Repair Compound (10kg)',
                'Smart Light Switch (WiFi Enabled)',
                'Ceiling Fan with Remote',
                'Garden Tap Kit',
                'Hose Bib Vacuum Breaker',
                'Waterproof Socket (Outdoor, Double)',
                'Expansion Vessel (12L)',
                'Cable Trunking (2m, White)',
                'Gravel Bag (20kg)',
                'Silicone Sealant (White, 310ml)',
                'Pipe Insulation Foam (1m, 22mm)',
                'Wireless Doorbell Kit',
                'Carbon Monoxide Detector',
                'Fire Rated Downlight',
                'Scaffold Board (3.9m)',
                'Paving Slab (450x450mm)',
                'Door Closer Mechanism',
                'Manhole Cover (Cast Iron, 600mm)',
            ]),
            'quantity' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->randomFloat(2, 5, 1000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
} 