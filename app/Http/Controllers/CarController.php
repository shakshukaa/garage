<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarRental;
use App\Models\Customer;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::paginate(15);

        return view('cars', [
            'cars' => $cars
        ]);
    }

    public function car($id)
    {
        $car = Car::find($id);
        $rentals = CarRental::where('car_id', $id)->with(['customer'])->get();

        return view('car', [
            'car' => $car,
            'rentals' => $rentals,
        ]);
    }

    public function delete($id)
    {
        Car::find($id)->delete();

        $cars = Car::paginate(15);

        return redirect()->route('cars', [
            'cars' => $cars
        ]);
    }

    public function edit($id)
    {
        $car = Car::find($id);

        return view('carEdit', [
            'car' => $car
        ]);
    }

    public function saveEdit($id, Request $request)
    {
        $car = Car::find($id);
        $car->fill($request->all());
        $car->save();

        return view('carEdit', [
            'car' => $car
        ]);
    }

    public function create()
    {
        return view('carCreate');
    }

    public function saveCreate(Request $request)
    {
        $images = [];

        if($request->hasFile('image'))
        {
            foreach ($request->file('image') as $image)
            {
                $extension = $image->guessClientExtension();
                $hash = md5_file($image->getRealPath());
                $name = "$hash.$extension";

                $image->move(public_path().'/image/', $name);

                $images[] = '/image/'.$name;
            }
        }

        $car = new Car();
        $car->name = $request->name;
        $car->description = $request->description;
        $car->price = $request->price;
        $car->images = $images;

        $car->save();
    }

    public function rental($id)
    {
        $car = Car::find($id);
        $customers = Customer::all();

        return view('carRental', [
            'car' => $car,
            'customers' => $customers
        ]);
    }

    public function saveRental(Request $request, $id)
    {
        $rental = new CarRental();
        $rental->fill($request->all());

        $startDate = $rental->start;
        $endDate = $rental->end;

        if (strtotime($endDate) <= strtotime($startDate))
        {
            $car = Car::find($id);
            $customers = Customer::all();

            return view('carRental', [
                'car' => $car,
                'customers' => $customers,
                'start_greater_than_end' => true,
            ]);
        }

        $matchingRentalCount = CarRental::where('car_id', $id)
            // ->where('customer_id', $rental->customer_id)
            ->where(function($query) use ($startDate, $endDate) {
                $query->where(function($query) use($startDate) {
                    $query->where('start', '<=', $startDate)
                        ->where('end', '>=', $startDate);
                })->orWhere(function($query) use ($endDate) {
                    $query->where('start', '<=', $endDate)
                        ->where('end', '>=', $endDate);
                })->orWhere(function($query) use ($startDate, $endDate) {
                    $query->where('start', '>=', $startDate)
                        ->where('end', '<=', $endDate);
                });
            })->count();

        if ($matchingRentalCount > 0)
        {
            $car = Car::find($id);
            $customers = Customer::all();

            return view('carRental', [
                'car' => $car,
                'customers' => $customers,
                'dates_overlap' => true,
            ]);
        }
        else
        {
            $rental->save();
            return redirect()->route('car', ['id' => $id]);
        }
    }

    public function deleteRental(Request $request, $carId, $rentalId) {
        CarRental::find($rentalId)->delete();

        $car = Car::find($carId);
        $rentals = CarRental::where('car_id', $carId)->with(['customer'])->get();

        return view('car', [
            'car' => $car,
            'rentals' => $rentals,
        ]);
    }

    public function completeRental(Request $request, $carId, $rentalId) {
        $rental = CarRental::find($rentalId);
        $rental->is_completed = true;
        $rental->save();

        $car = Car::find($carId);
        $rentals = CarRental::where('car_id', $carId)->with(['customer'])->get();

        return view('car', [
            'car' => $car,
            'rentals' => $rentals,
        ]);
    }
}
